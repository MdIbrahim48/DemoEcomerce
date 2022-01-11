<?php

namespace App\Http\Controllers\Admin;

use App\AdminProfile;
use App\Http\Controllers\Controller;
use App\Mail\VerifyUserMail;
use App\User;
use App\VerifyUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index(){
        $users = User::where('role', '!=', 'Customer')->get();
        return view('admin.user.index',[
            'users' => $users,
        ]);
    }

    public function create(){
        return view('admin.user.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'min:8|required|confirmed',
            'role' => 'required',
            'status' => 'required',
        ]);

        $users = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'status' => $request->status,
        ]);

       $admin =  AdminProfile::create([
            'name' => $request->name,
            'email' => $request->email,
            'created_by' => Auth::user()->email,
        ]);

        if ($request->hasFile('image')) {
            // photo update
            $image = $request->file('image');
            $name = $request->name.'_'.Auth::User()->id.".".$image->getClientOriginalExtension();
            $destination = public_path('photo/profile_photo/');
            $image->move($destination,$name);
            AdminProfile::where('id',$admin->id)->update([
                'image' => $name,
            ]);

        }

        VerifyUser::create([
            'token' => Str::random(60),
            'user_id' => $users->id,
        ]);

        Mail::to($request->email)->send(new VerifyUserMail($users));
        return back()->with('alert-success','User Added Successfully');
    }

    public function edit($id){
        $user = User::where('id',$id)->first();
        return view('admin.user.edit',[
            'user' =>$user
        ]);
    }

    public function update(Request $request , $id){
         User::where('id',$id)->update([
             'role' => $request->role,
             'status' => $request->status,
         ]);

         return back()->with('alert-success','User update Successfully');
    }


}
