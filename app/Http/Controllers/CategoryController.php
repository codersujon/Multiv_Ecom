<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image as Image;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display All Category
     */
    public function index()
    {
        $categories = DB::table('categories')->get();
        return view('backend.category.category_all',compact('categories'));
    }

    /**
     * Show Add Category Form.
     */
    public function create()
    {
        return view('backend.category.category_add');
    }

    /**
     * Store a category.
     */
    public function store(Request $request)
    {
        $category = new Category();
        
        $categoryImageName="";
        if ($file = $request->file('category_image')) {
            $categoryImageName =  uniqid().'.'.$file->getClientOriginalExtension();
            @unlink(public_path("upload/category/".$category->category_image));
            $path = public_path("upload/category/".$categoryImageName);
            $image = Image::make($file)->resize(300, 200)->save($path);
        } else {
            $categoryImageName = $category->category_image;
        }

        // Using Query Builder
        DB::table('categories')->insert([
            "category_name"=>$request->category_name,
            "category_slug"=> strtolower(str_replace(' ', '-',$request->category_name)),
            "category_image"=> $categoryImageName,
        ]);

        // For Message
        $notification = array(
            'message' => "Category Added Successfully!",
            'alert-type' => "success",
        ); 
        return redirect()->route('all.category')->with($notification);

    }

    /**
     * Display a Single Category
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        @unlink(public_path("upload/category/".$category->category_image));

        DB::table('categories')
            ->where('id', $id)
            ->delete();

        $notification = array(
            'message' => "Category Deleted Successfully!",
            'alert-type' => "success",
        ); 
        return redirect()->route('all.category')->with($notification);
    }
}
