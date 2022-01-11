<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class SubCategoryController extends Controller
{
    public function index(){
        $subCatogories = SubCategory::get();
        return view('admin.sub_category.index',[
            'subCatogories' => $subCatogories
        ]);
    }
    public function create(){
        $catogories = Category::get();
        return view('admin.sub_category.create',[
            'catogories' => $catogories
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|unique:sub_categories,name',
            'category_id' => 'required',
            'image' => 'required',
            'image.*' => 'image|mimes:jpeg,png,jpg|max:2048',
            'status' => 'required',
        ]);

        $subCategory = SubCategory::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'category_id' => $request->category_id,
            'status' => $request->status,
            'created_by' => Auth::user()->email,
        ]);

        if($request->hasFile('image')){
            $image = $request->file('image');
            $name = '_'.$subCategory->id.'.'.$image->getClientOriginalExtension();
            $destination =  public_path('/photo/sub_category/');
            $image->move($destination , $name);
            SubCategory::where('id',$subCategory->id)->update([
                'image' => $name
            ]);
        }

        return back()->with('alert-success','SubCategory Added Successfully');
    }

    public function edit($id){
        $subCategory = SubCategory::where('id',$id)->first();
        $catogories = Category::get();
        return view('admin.sub_category.edit',[
            'subCategory' => $subCategory,
            'catogories' => $catogories
        ]);
    }

    public function update(Request $request , $id){
        $subCategory = SubCategory::where('id',$id)->first();
        $request->validate([
            'category_id' => 'required',
            'image' => 'nullable',
            'image.*' => 'image|mimes:jpeg,png,jpg|max:2048',
            'status' => 'required',
        ]);

        if($subCategory->name != $request->name){
            $request->validate([
                'name' => 'required|unique:sub_categories,name',
            ]);
        }

        SubCategory::where('id',$id)->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'category_id' => $request->category_id,
            'status' => $request->status,
            'edited_by' => Auth::user()->email,
        ]);

        if($request->hasFile('image')){
            //photo delete
            $old_photo_name = $subCategory->image;
            $old_photo_location = public_path('/photo/sub_category/').$old_photo_name;
            unlink($old_photo_location);

            //update new photo
            $image = $request->file('image');
            $name = "_".$subCategory->id.".".$image->getClientOriginalExtension();
            $destination = public_path('/photo/sub_category/');
            $image->move($destination,$name);
            Category::where('id',$subCategory->id)->update([
                'image' => $name,
            ]);
        }

        return back()->with('alert-success','SubCategory update Successfully');
   }

   public function destroy($id){
        $subCategory = SubCategory::where('id',$id)->first();
        $old_photo_name = $subCategory->image;
        $old_photo_location = public_path('/photo/sub_category/').$old_photo_name;
        unlink($old_photo_location);
        $subCategory->delete();
        return back()->with('alert-danger','SubCategory Delete Successfully');
    }

}
