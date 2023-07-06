<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image as Image;

class BrandController extends Controller
{
    
    //All Brand List
    public function allBrand(){
        // $brands = Brand::latest()->
        $brands = DB::table('brands')->get();
        return view('backend.brand.brand_all', compact('brands'));
    }

    //Add Brand
    public function addBrand(){
        return view('backend.brand.add_brand');
    }

    //Store Brand
    public function storeBrand(Request $request){
        
        $brands = new Brand();

        if ($file = $request->file('photo')) {

            $customName =  uniqid().'.'.$file->getClientOriginalExtension();
            @unlink(public_path("upload/brand/".$brands->brand_image));
            $path = public_path("upload/brand/".$customName);
            $image = Image::make($file)->resize(300, 200)->save($path);

        } else {
            $customName = $brands->brand_image;
        }

        $brands->brand_name = $request->brand_name;
        $brands->brand_slug = strtolower(str_replace(' ', '-', $request->brand_name));
        $brands->brand_image = $customName;
        $brands->save();

        $notification = array(
            'message' => "Brand Added Successfully!",
            'alert-type' => "success",
        ); 
        return redirect()->route('all.brand')->with($notification);

    }



}
