<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Brand;
use App\Models\MultipleImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function Brands()
    {
        $brand = Brand::latest()->paginate(5);
        return view('admin.brand.index', compact('brand'));
    }

    public function addBrand(Request $request)
    {
        $validatedData = $request->validate(
            [
                'brand_name' => 'required|unique:brands',
                'brand_image' => 'required|mimes:jpg,jpeg,png',
            ],
            [
                'brand_name.require' => 'please fillup barand name',
                'brand_image.require' => 'please select barand image',
            ]

        );


        $brandImage = $request->file('brand_image');
        // $imageUniqueNameGen=hexdec(uniqid());
        // $imageExtention=strtolower( $brandImage->getClientOriginalExtension());
        // $finalImageName=$imageUniqueNameGen.'.'.$imageExtention;
        // $imageUploadLocatio='image/brand/';
        // $lastImage=$imageUploadLocatio.$finalImageName;
        // $brandImage->move($imageUploadLocatio,$finalImageName);

        $imgNamegen = hexdec(uniqid()) . '.' . $brandImage->getClientOriginalExtension();
        Image::make($brandImage)->resize(300, 200)->save('image/brand/' . $imgNamegen);
        $lastImage = 'image/brand/' . $imgNamegen;



        $brand = new Brand();
        $brand->brand_name = $request->brand_name;
        $brand->brand_image = $lastImage;
        $brand->created_at = Carbon::now();
        // dd($brand);
        $brand->save();

        // Brand::insert([
        //     'brand_name'=>$request->brand_name,
        //     'brand_image'=>$lastImage,
        // ]);
        $notification=[
            'message'=>'successfully Brand Added',
            'alert-type'=>'success'
        ];

        return redirect()->back()->with($notification);
    }

    public function editBrand($id)
    {
        $brands = Brand::find($id);
        return view('admin.brand.edit', compact('brands'));
    }
    public function UpdateBrand(Request $request, $id)
    {
        $validatedData = $request->validate(
            [
                'brand_name' => 'required',

            ],
            [
                'brand_name.require' => 'please fillup barand name',
                'brand_image.require' => 'please select barand image',
            ]

        );

        $old_img = $request->old_img;
        $brandImage = $request->file('brand_image');
        if ($brandImage) {
            $imageUniqueNameGen = hexdec(uniqid());
            $imageExtention = strtolower($brandImage->getClientOriginalExtension());
            $finalImageName = $imageUniqueNameGen . '.' . $imageExtention;
            $imageUploadLocatio = 'image/brand/';
            $lastImage = $imageUploadLocatio . $finalImageName;
            $brandImage->move($imageUploadLocatio, $finalImageName);

            unlink($old_img);

            // Brand::find($id)->update([
            //     'brand_name'=>$request->brand_name,
            //     'brand_image'=>$lastImage,
            //     'created_at'=>Carbon::now()
            // ]);
            $brand = Brand::find($id);
            $brand->brand_name = $request->brand_name;
            $brand->brand_image = $lastImage;
            $brand->created_at = Carbon::now();
            // dd($brand);
            $brand->save();

            $notification=[
                'message'=>'successfully brand updated',
                'alert-type'=>'success'
            ];

            return redirect('all/brand')->with($notification);
        } else {

            // Brand::find($id)->update([
            //     'brand_name'=>$request->brand_name,
            //     'created_at'=>Carbon::now()
            // ]);
            $brand = Brand::find($id);
            $brand->brand_name = $request->brand_name;
            $brand->created_at = Carbon::now();
            $brand->save();

            $notification=[
                'message'=>'successfully brand updated',
                'alert-type'=>'success'
            ];

            return redirect('all/brand')->with($notification);
        }
    }

    public function DeleteBrand($id)
    {
        $deleteBrand = Brand::find($id);
        $old_img = $deleteBrand->brand_image;
        unlink($old_img);
        $deleteBrand->delete();
        $notification=[
            'message'=>'successfully brand deleted',
            'alert-type'=>'success'
        ];

        return redirect()->back()->with($notification);
    }








    // multipleImage
    public function MultipleImage()
    {
        $multipleImage = MultipleImage::all();
        return view('admin.multiimage.index', compact('multipleImage'));
    }

    public function AddMultiimage(Request $request)
    {
        $validatedData = $request->validate(
            [
                'multiple_img' => 'required',

            ],
            [

                'multiple_img.require' => 'please select barand image',
            ]

        );

        $multipleImage = $request->file('multiple_img');
        foreach ($multipleImage as $multiimage) {
            $imgNamegen = hexdec(uniqid()) . '.' . $multiimage->getClientOriginalExtension();
            Image::make($multiimage)->resize(300, 200)->save('image/multiimage/' . $imgNamegen);
            $lastImage = 'image/multiimage/' . $imgNamegen;



            $brand = new MultipleImage();
            $brand->multiple_img = $lastImage;
            $brand->created_at = Carbon::now();
            $brand->save();
        }

        $notification=[
            'message'=>'successfully multiple image  added',
            'alert-type'=>'success'
        ];

        return redirect()->back()->with($notification);
    }

    // logout
    public function Logout(){
        Auth::logout();
        $notification=[
            'message'=>'successfully logout',
            'alert-type'=>'success'
        ];

        return redirect()->route('login')->with($notification);

    }
}
