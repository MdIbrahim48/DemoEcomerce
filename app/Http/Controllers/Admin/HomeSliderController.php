<?php

namespace App\Http\Controllers\Admin;

use App\HomeSlider;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeSliderController extends Controller
{
    public function index(){
        $home_sliders = HomeSlider::get();
        return view('admin.home_slider.index',[
            'home_sliders' => $home_sliders
        ]);
    }

    public function create(){
        return view('admin.home_slider.create');
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required',
            'sub_title' => 'required',
            'links' => 'required',
            'image' => 'required',
            'image.*' => 'image|mimes:jpeg,png,jpg|max:2048',
            'status' => 'required',
        ]);
        $home_sliders = HomeSlider::create([
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'links' => $request->links,
            'status' => $request->status,
            'created_by' => Auth::user()->email,
        ]);
        if($request->hasFile('image')){
            $image = $request->file('image');
            $name = $home_sliders->id.'.'.$image->getClientOriginalExtension();
            $destination = public_path('photo/slider/');
            $image->move($destination , $name);
            HomeSlider::where('id',$home_sliders->id)->update([
                'image' => $name
            ]);
        }
        return back()->with('alert-success','Slider Added Successfully');
    }

    public function edit($id){
        $home_slider = HomeSlider::where('id',$id)->first();
        return view('admin.home_slider.edit',[
            'home_slider' => $home_slider
        ]);
    }

    public function update(Request $request , $id){
        $request->validate([
            'title' => 'required',
            'sub_title' => 'required',
            'links' => 'required',
            'image' => 'nullable',
            'image.*' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);
        $home_sliders = HomeSlider::where('id',$id)->first();
        HomeSlider::where('id',$id)->update([
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'links' => $request->links,
            'status' => $request->status,
            'edited_by' => Auth::user()->email,
        ]);
        if($request->hasFile('image')){
            // old image delete
            $old_image = $home_sliders->image;
            $old_lcoation = public_path('photo/slider/').$old_image;
            unlink($old_lcoation);

            // new image
            $image = $request->file('image');
            $name = $home_sliders->id.'.'.$image->getClientOriginalExtension();
            $destination = public_path('photo/slider/');
            $image->move($destination , $name);
            HomeSlider::where('id',$home_sliders->id)->update([
                'image' => $name
            ]);
        }
        return back()->with('alert-success','Slider Update Successfully');
    }

    public function destroy($id){
        $home_slider = HomeSlider::where('id',$id)->first();
        // old image delete
        $old_image = $home_slider->image;
        $old_lcoation = public_path('photo/slider/').$old_image;
        unlink($old_lcoation);
        $home_slider->delete();
        return back()->with('alert-danger','Slider Delete Successfully');
    }


}
