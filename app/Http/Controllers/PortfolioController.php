<?php

namespace App\Http\Controllers;

use App\Models\MultipleImage;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function Portfolio(){
        $portfolio=MultipleImage::all();
        return view('fronend.pages.portfolio',compact('portfolio'));
    }
}
