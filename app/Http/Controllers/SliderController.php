<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Slider;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Routing\Controller;

class SliderController extends Controller
{
    public function AdminSlider(){
        $slider=Slider::all();
        return view('admin.slider.index',compact('slider'));
    }

    public function AddSlider(Request $request){

        $validatedData = $request->validate(
            [
                'title' => 'required|unique:title',
                // 'description' => 'required',
                'image' => 'required|mimes:jpg,jpeg,png',
            ],
            [
                'title.require' => 'please fillup title ',
                'image.require' => 'please select image',
            ]

        );


        $sliderImage=$request->file('image');
        $imgNamegen = hexdec(uniqid()) . '.' . $sliderImage->getClientOriginalExtension();
        Image::make($sliderImage)->resize(1920, 1800)->save('image/slider/' . $imgNamegen);
        $lastImage = 'image/slider/' . $imgNamegen;


        $slider=new Slider();
        $slider->title=$request->title;
        $slider->description=$request->description;
        $slider->image=$lastImage;
        $slider->created_at=Carbon::now();
        $slider->save();
        return redirect()->back();

    }

    public function EditSlider($id){
        $slider=Slider::find($id);
        return view('admin.slider.edit',compact('slider'));
    }

    public function UpdateSlider(Request $request ,$id){
        $oldImage=$request->old_img;
        $sliderImage=$request->file('image');
        if($sliderImage){
            $imgNamegen = hexdec(uniqid()) . '.' . $sliderImage->getClientOriginalExtension();
            Image::make($sliderImage)->resize(1920, 1800)->save('image/slider/' . $imgNamegen);
            $lastImage = 'image/slider/' . $imgNamegen;

            unlink($oldImage);
        }


        $slider=Slider::find($id);
        $slider->title=$request->title;
        $slider->description=$request->description;
        $slider->created_at=Carbon::now();
        $slider->save();
        return redirect()->route('all.slider')->with('success','successfully slider edited');
    }

    public function DeleteSlider($id){
        $deleteSlider=Slider::find($id);
        $old_img=$deleteSlider->image;
        unlink($old_img);
        $deleteSlider->delete();
        return redirect()->back()->with('success','successfully slider deleted');

    }
}
