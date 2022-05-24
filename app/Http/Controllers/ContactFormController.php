<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Contactform;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactFormController extends Controller
{
    public function ContactForm(){
        $contact=DB::table('contacts')->first();
        return view('fronend.pages.contact',compact('contact'));
    }

    public function AddContactform(Request $request){
        $contact=new Contactform();
        $contact->name=$request->name;
        $contact->email=$request->email;
        $contact->message=$request->message;
        $contact->subject=$request->subject;
        $contact->save();
        return redirect()->back()->with('success','successfully contactform updated');
    }
}
