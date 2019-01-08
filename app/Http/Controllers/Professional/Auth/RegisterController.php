<?php

namespace App\Http\Controllers\Professional\Auth;

use App\Http\Controllers\Controller;
use App\Models\Professional;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\ProfessionalResource;

class RegisterController extends Controller
{
    use RegistersUsers;

    public function register(Request $request) {
        
        $user = new Professional($request -> all());
        $user -> api_token = str_random(60);
        $user -> save();
        return new ProfessionalResource($user);
    }

    // public $redirectTo = '/p/home';

    // public function __construct()
    // {
    //     $this->redirectTo = app()->getLocale().$this->redirectTo;
    //     $this->middleware('professional.guest');
    // }

    // public function validator(array $data)
    // {
    //     return Validator::make($data, [
    //         'first_name' => 'required|max:191',
    //         'middle_name' => 'sometimes|max:191',
    //         'last_name' => 'required|max:191',
    //         'degree' => 'required|max:191',
    //         'email' => [
    //             'required',
    //             'email',
    //             'max:191',
    //             Rule::unique('professionals')->where(function ($query) {
    //             return $query->whereNull('deleted_at');
    //         })
    //         ],
    //         'password' => 'required|min:6|max:191|confirmed',
    //         'country' => 'required|max:2|min:2',
    //         'phone' => 'sometimes|max:191',
    //     ]);
    // }

    // public function create(array $data)
    // {
    //     return Professional::create([
    //         'first_name' => $data['first_name'],
    //         'middle_name' => $data['middle_name'] ?? NULL,
    //         'last_name' => $data['last_name'],
    //         'degree' => $data['degree'],
    //         'email' => $data['email'],
    //         'password' => bcrypt($data['password']),
    //         'phone' => $data['phone'] ?? NULL,
    //         'country' => $data['country'],
    //     ]);
    // }

    // // public function showRegistrationForm()
    // // {
    // //     // return view('');
    // // }

    // public function guard()
    // {
    //     return Auth::guard('professional');
    // }

    // /**
    //  * Handle a registration request for the application.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function registerr(Request $request)
    // {
    //     $validator = $this->validator($request->all());

    //     if ($validator->fails()) {
    //         return redirect()->back()->withErrors($validator, 'professional')->withInput()->with(['actor' => 'professional']);
    //     }

    //     event(new Registered($user = $this->create($request->all())));

    //     $this->guard()->login($user);

    //     return $this->registered($request, $user)
    //                     ?: redirect($this->redirectPath());
    // }



}