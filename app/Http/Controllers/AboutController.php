<?php

namespace App\Http\Controllers;

use App\Models\About;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function AdminAbout(){
        $about=About::all();
        return view('admin.about.index',compact('about'));
    }

    public function AddAbout(Request $request){

        $validatedData = $request->validate(
            [
                'title' => 'required',
                // 'description' => 'required',
                'short_des' => 'required',
                'long_des' => 'required',
            ],
            [
                'title.require' => 'please fillup title ',
                'short_des.require' => 'please fillup your short description',
                'long_des.require' => 'please fillup your long description',
            ]

        );

        $about=new About();
        $about->title=$request->title;
        $about->short_des=$request->short_des;
        $about->long_des=$request->long_des;
        $about->created_at=Carbon::now();
        $about->save();

        $notification=[
            'message'=>'successfully about added',
            'alert-type'=>'success'
        ];

        return redirect()->back()->with($notification);

    }

    public function EditAbout($id){
        $about=About::find($id);
        return view('admin.about.edit',compact('about'));

    }

    public function UpdateAbout(Request $request,$id){
        $about=About::find($id);
        $about->title=$request->title;
        $about->short_des=$request->short_des;
        $about->long_des=$request->long_des;
        $about->save();
        $notification=[
            'message'=>'successfully about updated',
            'alert-type'=>'success'
        ];

        return redirect('all/about')->with($notification);

    }

    public function DeleteAbout($id){
        $deleteAbout=About::find($id);
        $deleteAbout->delete();
        return redirect()->back()->with('success','successfully delete');
    }

    public function About(){
        $about=About::all();
        return view('fronend.pages.about',compact('about'));
    }
}
