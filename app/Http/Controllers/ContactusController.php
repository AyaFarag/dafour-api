<?php

namespace App\Http\Controllers;


use App\Http\Requests\ContactusRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactUs;
use App\Models\Contact;

class ContactusController extends Controller
{
    public function sendMessage(ContactusRequest $request)
    {
        $email = Contact::firstOrFail() -> email;

        Mail::to($email)->send(new ContactUs($request->all()));

        if(empty(Mail::failures()))
        {
            $request->session()->flash('success', __('site.send-mail-success'));
        }
        else{
            $request->session()->flash('errors',[ __('site.send-mail-error')]);

        }
        return redirect()->back();
    }
}
