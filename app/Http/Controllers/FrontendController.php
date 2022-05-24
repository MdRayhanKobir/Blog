<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Brand;
use App\Models\MultipleImage;
use App\Models\Slider;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
      public function Home(){
          $slider=Slider::all();
          $multipleImage=MultipleImage::all();
          $about=About::all();
          $brand=Brand::all();
          return view('fronend.home',compact('brand','slider','about','multipleImage'));
      }


}
