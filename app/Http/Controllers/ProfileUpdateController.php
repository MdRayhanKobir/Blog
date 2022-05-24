<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileUpdateController extends Controller
{
    public function ProfileUpdate(){
         if(Auth::user()){
             $user=User::find(Auth::user()->id);
             if($user){
                 return view('admin.profile.index',compact('user'));
             }
         }
    }

    public function UpadateUserP(Request $request){

        $user=User::find(Auth::user()->id);
        if($user){
            $user->name=$request->name;
            $user->email=$request->email;
            $user->save();
            return redirect()->back()->with('success','successfully updated profile');
        }
        else{
            return redirect()->back();
        }
    }
}
