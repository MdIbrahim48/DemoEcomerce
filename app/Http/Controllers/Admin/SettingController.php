<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index(){
        $setting = Setting::orderBy('id','desc')->first();
        return view('admin.setting.index',[
            'setting' => $setting
        ]);
    }

    public function update(Request $request , $id){
       $request->validate([
            'email' => 'required',
            'phone' => 'required',
            'mobile' => 'required',
            'address' => 'required',
       ]);
       $setting = Setting::where('id',$id)->first();
       Setting::where('id',$id)->update([
            'email' => $request->email,
            'phone' => $request->phone,
            'mobile' => $request->mobile,
            'address' => $request->address,
            'status' => $request->status,
       ]);
       if($request->hasFile('logo')){
           $old_logo = $setting->logo;
           $old_logo_location = public_path('photo/setting/').$old_logo;
           unlink($old_logo_location);

            //new logo upload
            $logo = $request->file('logo');
            $name = $request->id.".".$logo->getClientOriginalExtension();
            $destination = public_path('/photo/setting/');
            $logo->move($destination,$name);
            Setting::where('id',$setting->id)->update([
                'logo' => $name,
            ]);

       }
       
        return back()->with('alert-success','Setting Update Successfully');
    }
}
