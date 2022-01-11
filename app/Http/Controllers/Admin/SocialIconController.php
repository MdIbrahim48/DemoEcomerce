<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\SocialIcon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SocialIconController extends Controller
{
    public function index(){
        $social_icons = SocialIcon::get();
        return view('admin.social_icon.index',[
            'social_icons' => $social_icons
        ]);
    }

    public function create(){
        return view('admin.social_icon.create');
    }

    public function store(Request $request){
        $request->validate([
            'icon' => 'required',
            'link' => 'required',
            'status' => 'required',
        ]);
        SocialIcon::create([
            'icon' => $request->icon,
            'link' => $request->link,
            'status' => $request->status,
            'created_by' =>Auth::user()->email,
        ]);
        return back()->with('alert-success','Social Icon Added Successfully');
    }

    public function edit($id){
        $socialIcon = SocialIcon::where('id',$id)->first();
        return view('admin.social_icon.edit',[
            'socialIcon' => $socialIcon
        ]);
    }

    public function update(Request $request , $id){
        $request->validate([
            'icon' => 'required',
            'link' => 'required',
            'status' => 'required',
        ]);
        SocialIcon::where('id',$id)->update([
            'icon' => $request->icon,
            'link' => $request->link,
            'status' => $request->status,
            'edited_by' =>Auth::user()->email,
        ]);
        return back()->with('alert-success','Social Icon Update Successfully');
    }

    public function destroy($id){
        SocialIcon::where('id',$id)->delete();
        return back()->with('alert-danger','Social Icon Delete Successfully');
    }


}
