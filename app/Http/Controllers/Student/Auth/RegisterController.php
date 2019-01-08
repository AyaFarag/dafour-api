<?php

namespace App\Http\Controllers\Student\Auth;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Http\Resources\StudentResource;

class RegisterController extends Controller
{
    use RegistersUsers;
    
   
   
    public function register(Request $request) {
   
        $user = new Student($request -> all());
        $user -> api_token = str_random(60);
        $user -> save();
        return new StudentResource($user);
    }
    
    
    // public $redirectTo = '/s/home';
    
    // public function __construct()
    // {
        //     $this->redirectTo = app()->getLocale().$this->redirectTo;
        //     $this->middleware('student.guest');
        // }

    // public function validator(array $data)
    // {
    //     return Validator::make($data, [
    //         'first_name' => 'required|max:191',
    //         'middle_name' => 'sometimes|max:191',
    //         'last_name' => 'required|max:191',
    //         'email' => [
    //             'required',
    //             'email',
    //             'max:191',
    //             Rule::unique('students')->where(function ($query) {
    //                 return $query->whereNull('deleted_at');
    //             })
    //         ],
    //         'password' => 'required|min:6|max:191|confirmed',
    //         'phone' => 'sometimes|max:191',
    //         'country' => 'required|max:2|min:2',
    //     ]);
    // }

    // public function create(array $data)
    // {
    //     return Student::create([
    //         'first_name' => $data['first_name'],
    //         'middle_name' => $data['middle_name'] ?? NULL,
    //         'last_name' => $data['last_name'],
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
    //     return Auth::guard('student');
    // }

    // /**
    //  * Handle a registration request for the application.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function register(Request $request)
    // {
    //     $validator = $this->validator($request->all());

    //     if ($validator->fails()) {
    //         return redirect()->back()->withErrors($validator, 'student')->withInput()->with(['actor' => 'student']);
    //     }

    //     event(new Registered($user = $this->create($request->all())));

    //     $this->guard()->login($user);

    //     return $this->registered($request, $user)
    //                     ?: redirect($this->redirectPath());
    // }


}
