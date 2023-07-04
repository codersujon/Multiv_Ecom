<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    
    //All Brand List
    public function allBrand(){
        $brands = Brand::latest()->get();
        return view('backend.brand.brand_all', compact('brands'));
    }

    //Add Brand
    public function addBrand(){
        return view('backend.brand.add_brand');
    }



}
