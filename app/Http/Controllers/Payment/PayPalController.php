<?php

namespace App\Http\Controllers\Payment;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 

use App\Models\Plan;

use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;

use PayPal\Rest\ApiContext;

use PayPal\Auth\OAuthTokenCredential;

use App\Events\PlanPaymentSucceeded;

use App\Models\Student;

use Config;
use Session;
use Redirect;
use URL;

class PayPalController extends Controller
{
	public function __construct() {
		$paypal_conf = Config::get("paypal");
		$this -> _api_context = new ApiContext(new OAuthTokenCredential(
			$paypal_conf["client_id"],
			$paypal_conf["secret"])
		);
		$this -> _api_context -> setConfig($paypal_conf["settings"]);
	}

	public function payWithpaypal(Request $request) {
		if (!(auth() -> user() instanceof Student)) {
			Session::flash("errors", [trans("site.student_account_required")]);
			return response() -> json(["message" => "student_account_required"], 500);
		}
		$plan = Plan::whereId($request -> input("plan_id")) -> first();

		if (!$plan) {
			Session::flash("errors", [trans("site.errors_occurred")]);
			return response() -> json(["error" => "errors_occurred"], 500);
		}

		$payer = new Payer();
		$payer -> setPaymentMethod("paypal");
		$item_1 = new Item();
		$item_1 -> setName($plan-> {"title_" . app()->getLocale()})
			-> setCurrency("USD")
			-> setQuantity(1)
			-> setPrice($plan -> price * 0.266);
		$item_list = new ItemList();
		$item_list -> setItems(array($item_1));
		$amount = new Amount();
		$amount -> setCurrency("USD")
			-> setTotal($plan -> price * 0.266);
		$transaction = new Transaction();
		$transaction -> setAmount($amount)
			-> setItemList($item_list)
			-> setDescription(trans("site.dafour_subscription_payment"));
		$redirect_urls = new RedirectUrls();
		$redirect_urls -> setReturnUrl(URL::route("payment.paypal.status")) /** Specify return URL **/
			-> setCancelUrl(URL::route("payment.paypal.status"));
		$payment = new Payment();
		$payment -> setIntent("Sale")
			-> setPayer($payer)
			-> setRedirectUrls($redirect_urls)
			-> setTransactions(array($transaction));
		try {
			$payment -> create($this -> _api_context);
		} catch (\PayPal\Exception\PayPalConnectionException $ex) {
			Session::flash("errors", [trans("site.errors_occurred")]);
			return response() -> json(["error" => "errors_occurred"], 500);
		}
		foreach ($payment -> getLinks() as $link) {
			if ($link -> getRel() == "approval_url") {
				$redirect_url = $link -> getHref();
				break;
			}
		}
		Session::put("paypal_payment_id", $payment -> getId());
		Session::put("paypal_plan_id", $plan -> id);
		if (isset($redirect_url)) {
			return Redirect::away($redirect_url);
		}
		Session::flash("errors", [trans("site.errors_occurred")]);
		return response() -> json(["error" => "errors_occurred"], 500);
	}

	public function getPaymentStatus(Request $request)
	{
		$payment_id = Session::get("paypal_payment_id");
		$plan_id    = Session::get("paypal_plan_id");
		Session::forget("paypal_payment_id");
		Session::forget("paypal_plan_id");
		if (empty($request -> input("PayerID")) || empty($request -> input("token"))) {
			Session::flash("errors", [trans("site.payment_failed")]);
			return response() -> json(["error" => "faild"], 500);
		}
		if (empty($payment_id)) {
			return Redirect::route("home");
		}

		$payment = Payment::get($payment_id, $this -> _api_context);
		$execution = new PaymentExecution();
		$execution -> setPayerId($request -> input("PayerID"));
		try {
			$result = $payment -> execute($execution, $this -> _api_context);
			if ($result -> getState() == "approved") {
				Session::flash("success", trans("site.payment_succeeded"));
				event(new PlanPaymentSucceeded(auth() -> user(), Plan::whereId($plan_id) -> first()));
				return response() -> json(["message" => "success"], 200);
			}
			Session::flash("errors", [trans("site.payment_failed")]);
		} catch (\PayPal\Exception\PayPalConnectionException $ex) {
			
			Session::flash("errors", [trans("site.payment_failed")]);
			return response() -> json(["error" => "faild"], 500);
		}
		return response() -> json(["message" => "success"], 200);
	}
}
