<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePass extends Controller
{
    public function ChangePass(){

        return view( 'admin.change-pass.index');
    }

    public function UpdatePassword(Request $request){

        $validatedData = $request->validate(
            [
                'oldpassword' => 'required',
                 'password' => 'required|confirmed',
            ],[
                'oldpassword.required'=>'please fillup current password',
                'password.required'=>'please fillup new password'
            ]

        );


        $hashedPassword=Auth::user()->password;
        // dd($hashedPassword);
        if(Hash::check($request->oldpassword,$hashedPassword)){
            $user=User::find(Auth::id());
            $user->password=Hash::make($request->password);
            $user->save();
            return redirect()->route('login')->with('success','successfully update password');
        }

        else{
            return redirect()->back()->with('success','old password invalid');
        }


    }
}
