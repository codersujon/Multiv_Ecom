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
        
        // For Image
        $customName="";
        if ($file = $request->file('photo')) {

            $customName =  uniqid().'.'.$file->getClientOriginalExtension();
            @unlink(public_path("upload/brand/".$brands->brand_image));
            $path = public_path("upload/brand/".$customName);
            $image = Image::make($file)->resize(300, 200)->save($path);

        } else {
            $customName = $brands->brand_image;
        }

        // Using Query Builder
        DB::table('brands')->insert([
            "brand_name"=> $request->brand_name,
            "brand_slug"=> strtolower(str_replace(' ', '-', $request->brand_name)),
            "brand_image"=> $customName,
        ]);

        // For Message
        $notification = array(
            'message' => "Brand Added Successfully!",
            'alert-type' => "success",
        ); 
        return redirect()->route('all.brand')->with($notification);

    }

    //Edit Brand
    public function editBrand($id){
        // Using Query Builder
        $brand = DB::table('brands')->find($id);
        return view('backend.brand.brand_edit', compact('brand'));
    }

    //Update Brand
    public function updateBrand(Request $request, $id){
        $brand = new Brand();

        $customName="";
        if ($file = $request->file('photo')) {

            $customName =  uniqid().'.'.$file->getClientOriginalExtension();
            @unlink(public_path("upload/brand/".$brand->brand_image));
            $path = public_path("upload/brand/".$customName);
            $image = Image::make($file)->resize(300, 200)->save($path);

        } else {
            $customName = $brand->brand_image;
        }

        // Using Query Builder
        DB::table('brands')
            ->where('id', $id)
            ->update([
                "brand_name" => $request->brand_name,
                "brand_slug" => strtolower(str_replace(' ', '-', $request->brand_name)),
                "brand_image" => $customName,
            ]);


        // For Message
        $notification = array(
            'message' => "Brand Updated Successfully!",
            'alert-type' => "success",
        ); 
        return redirect()->route('all.brand')->with($notification);
    }
    

     //Delete Brand
     public function deleteBrand($id){
        $brand = Brand::findOrFail($id);
        @unlink(public_path("upload/brand/".$brand->brand_image));

        DB::table('brands')
            ->where('id', $id)
            ->delete();

        $notification = array(
            'message' => "Brand Deleted Successfully!",
            'alert-type' => "success",
        ); 
        return redirect()->route('all.brand')->with($notification);
    }
}
