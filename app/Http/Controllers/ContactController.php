<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Contactform;
use Carbon\Carbon;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    public function Contact()
    {
        $contact = Contact::all();
        return view('admin.contact.index', compact('contact'));
    }

    public function AddContact(Request $request)
    {
        $contact = new Contact();
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->address = $request->address;
        $contact->created_at = Carbon::now();
        $contact->save();
        return redirect()->back()->with('success', 'successfully contact added');
    }

    public function EditContact($id)
    {
        $contact = Contact::find($id);
        return view('admin.contact.edit', compact('contact'));
    }

    public function UpdatedContact(Request $request, $id)
    {
        $contact = Contact::find($id);
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->address = $request->address;
        $contact->save();
        return redirect()->route('contact')->with('success', 'successfully contact updated');
    }

    public function DeleteContact($id)
    {
        $contact = Contact::find($id);
        $contact->delete();
        return redirect()->back()->with('success', 'successfully contact deleted');
    }

    public function ShowContact()
    {
        $showContact = Contactform::all();
        return view('admin.contact.showcontact', compact('showContact'));
    }
    public function DeleteContactform($id)
    {

        $deleteContact = Contactform::find($id);
        $deleteContact->delete();
        return redirect()->back()->with('success', 'successfully deleted');
    }
}
