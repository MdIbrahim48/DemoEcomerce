<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::get();
        return view('admin.category.index',[
            'categories' => $categories
        ]);
    }

    public function create(){
        return view('admin.category.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|unique:categories,name',
            'image' => 'mimes:jpeg,jpg,png|required|max:2048',
            'cat_bg_color' => 'required',
            'status' => 'required',
        ]);

        $category = Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'cat_bg_color' => $request->cat_bg_color,
            'status' => $request->status,
            'created_by' => Auth::user()->email,
        ]);

        if($request->hasFile('image')){
            $image = $request->file('image');
            $name = '_'.$category->id.'.'.$image->getClientOriginalExtension();
            $destination =  public_path('/photo/category/');
            $image->move($destination , $name);
            Category::where('id',$category->id)->update([
                'image' => $name
            ]);
        }

        return back()->with('alert-success','Category Added Successfully');
    }

    public function edit($id){
        $category = Category::where('id',$id)->first();
        return view('admin.category.edit',[
            'category' => $category
        ]);
    }

    public function update(Request $request , $id){
        $request->validate([
            'image' => 'mimes:jpeg,jpg,png|max:2048',
            'cat_bg_color' => 'required',
            'status' => 'required',
        ]);
        $category = Category::where('id',$id)->first();

        if($category->name != $request->name){
            $request->validate([
                'name' => 'required|unique:categories,name',
            ]);
        }
        Category::where('id',$id)->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'cat_bg_color' => $request->cat_bg_color,
            'status' => $request->status,
            'edited_by' => Auth::user()->email,
        ]);

        if($request->hasFile('image')){
            //photo delete
            $old_photo_name = $category->image;
            $old_photo_location = public_path('/photo/category/').$old_photo_name;
            unlink($old_photo_location);

            //update new photo
            $image = $request->file('image');
            $name = "_".$category->id.".".$image->getClientOriginalExtension();
            $destination = public_path('/photo/category/');
            $image->move($destination,$name);
            Category::where('id',$category->id)->update([
                'image' => $name,
            ]);
        }

        return back()->with('alert-success','Category update Successfully');
   }

   public function destroy($id){
       $category = Category::where('id',$id)->first();
       $old_photo_name = $category->image;
       $old_photo_location = public_path('/photo/category/').$old_photo_name;
       unlink($old_photo_location);
       $category->delete();
        return back()->with('alert-danger','Category Delete Successfully');
    }

}
