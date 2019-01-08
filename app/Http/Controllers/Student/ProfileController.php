<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Student\UpdateProfileRequest;

class ProfileController extends Controller
{
    public function update(Request $request)
    {
        auth()->user()->update($request->all());

        return response()-> json(["message" => "data updated successfully"], 200);

    }

    public function confirm($token)
    {
        $student = Student::where('confirmation_code',$token)->first();
        if(!empty($student) && $student->confirmed == 0){
            $student->confirmed = 1;
            $student->confirmation_code = '';
            $student->save();
            session()->flash('success',trans('site.Account activated successfully'));
        }
        return redirect()->route('student.home');
    }

    public function resendCode(Request $request)
    {
        $request -> validate(["phone" => "required"]);
        $user = auth("student") -> user();
        $user -> phone = $request -> input("phone");
        event(new Registered($user));
        session()->flash('success',trans('site.Activation Code Sent'));
        return redirect()->route('needs-confirmation');
    }

    public function phoneConfirm(Request $request) {
        $request -> validate([ "code" => "required" ]);

        $student = auth("student") -> user();

        if ($student -> phone_confirmation_code === $request -> input("code")) {
            $student->confirmed = 1;
            $student->confirmation_code = '';
            $student->phone_confirmation_code = null;
            $student->save();
            session()->flash('success',trans('site.Account activated successfully'));
            return redirect()->route('student.home');
        }

        session()->flash('errors', [trans('site.Invalid activation code')]);
        return redirect()->route('needs-confirmation');
    }
}
