<?php

namespace App\Http\Controllers\Professional;

use App\Models\Professional;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Professional\UpdateProfileRequest;
use App\Http\Resources\ProfessionalResource;
use Illuminate\Auth\Events\Registered;
use Auth;

class ProfileController extends Controller
{
    public function update(Request $request)
    {
        auth()->user()->update($request->all());
      
      return response()-> json(["message" => "updated successfully"], 201);
    }

    public function confirm($token)
    { 
        $professional = Professional::where('confirmation_code',$token)->first();;
        if( !empty($professional)  && $professional->confirmed == 0){
            $professional->confirmed = 1;
            $professional->confirmation_code = '';
            $professional->save();
            
            return response()-> json(["message" => "confirmed successfully"], 200);
        }
        else{
            return response()-> json(["error" => "not confirmed"], 500);
        }
        
    }

    public function resendCode(Request $request)
    {
        $request -> validate(["phone" => "required"]);
        $user = auth("professional") -> user();
        $user -> phone = $request -> input("phone");
        event(new Registered($user));
        session()->flash('success',trans('site.Activation Code Sent'));
        
        return response()-> json(["message" => "need confirmation"], 200);
    }

    public function phoneConfirm(Request $request) {
        
        $request -> validate([ "code" => "required" ]);
        
        $professional = auth("professional") -> user();
        
        if ($professional -> phone_confirmation_code === $request -> input("code")) {
            $professional->confirmed = 1;
            $professional->confirmation_code = '';
            $professional->phone_confirmation_code = null;
            $professional->save();
            
            return response()-> json(["message" => "confirmed successfully"], 200);
        }
            
        return response()-> json(["message" => "need confirmation"], 500);
    }

        
            
}
            
    
    

        
        


