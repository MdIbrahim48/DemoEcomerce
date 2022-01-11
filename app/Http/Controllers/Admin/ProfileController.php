<?php

namespace App\Http\Controllers\Admin;

use App\AdminProfile;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index(){
        $user = AdminProfile::where('email',Auth::User()->email)->first();
        return view('admin.profile.index',[
            'user' => $user,
        ]);
    }

    public function profileUpdate(Request $request,$id){
        $request->validate([
            'email' => 'required',
        ]);

        if($request->email != Auth::user()->email){
            $request->validate([
                'email' => 'required|unique:users,email',
            ]);
            User::where('id',Auth::user()->id)->update([
                'email' => $request->email
            ]);
            AdminProfile::where('email',Auth::user()->email)->update([
                'email' => $request->email
            ]);
        }

        AdminProfile::where('email',Auth::user()->email)->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'edited_by' => Auth::user()->email,
        ]);

        if ($request->hasFile('image')) {
            // old photo delete if it is not default photo

            $old_photo_name = AdminProfile::where('email',Auth::user()->email)->first();
            if($old_photo_name->image != 'default.png'){
                $old_photo_location = public_path('photo/profile_photo/').$old_photo_name;
                unlink($old_photo_location);
            }

            // photo update
            $image = $request->file('image');
            $name = '_'.Auth::User()->id.".".$image->getClientOriginalExtension();
            $destination = public_path('photo/profile_photo/');
            $image->move($destination,$name);
            AdminProfile::where('email',Auth::User()->email)->update([
                'image' => $name,
            ]);

        }
        return back()->with('alert-success','Profile Update Successfully');

    }

    public function update_password(Request $request , $id){
        $request->validate([
            'previous_password' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);

        if(Hash::check($request->previous_password, Auth::user()->password)){
            User::findOrFail(Auth::user()->id)->update([
                'password' => Hash::make($request->password),

            ]);
            session()->flash('alert-success','Password Change Successfully');
            return back();
        }
        session()->flash('alert-danger','Password does not match with previous Password');
        return back();
    }

}
