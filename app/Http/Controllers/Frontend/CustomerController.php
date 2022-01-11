<?php

namespace App\Http\Controllers\Frontend;

use App\BillingAddress;
use App\Customer;
use App\Http\Controllers\Controller;
use App\Orders;
use App\ShippingAddress;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    public function customerProfile(){
        $customer = Customer::where('email',Auth::User()->email)->first();
        $billingAddress = BillingAddress::where('customer_email',Auth::User()->email)->first();
        $shippingAddress = ShippingAddress::where('customer_email',Auth::User()->email)->first();
        $orders = Orders::where('email',Auth::user()->email)->get();
        return view('frontend.customer.profile',[
            'customer' => $customer,
            'billingAddress' => $billingAddress,
            'shippingAddress' => $shippingAddress,
            'orders' => $orders,
        ]);
    }

    public function customerProfileUpdate(Request $request ,$id){
        $request->validate([
            'user_name' => 'required',
            'phone' => 'required',
            'email' => 'required',
        ]);

        if($request->email != Auth::user()->email){
            $request->validate([
                'email' => 'required|unique:users,email',
            ]);
            User::where('id',Auth::user()->id)->update([
                'email' => $request->email
            ]);
            Customer::where('email',Auth::user()->email)->update([
                'email' => $request->email
            ]);
        }
        $customer = Customer::where('email',Auth::user()->email)->first();
        Customer::where('email',Auth::user()->email)->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'user_name' => $request->user_name,
            'phone' => $request->phone,
        ]);

        if(Hash::check($request->previous_password, Auth::user()->password)){
            User::where('email',Auth::user()->email)->update([
                'password' => Hash::make($request->password),

            ]);
        }

        if ($request->hasFile('image')) {
            // old photo delete if it is not default photo

            $old_photo_name = Customer::where('email',Auth::user()->email)->first();
            if($old_photo_name->image != 'default.png'){
                $old_photo_location = public_path('photo/customer_profile/').$old_photo_name;
                unlink($old_photo_location);
            }
            // photo update
            $image = $request->file('image');
            $name = $customer->user_name.$customer->id.".".$image->getClientOriginalExtension();
            $destination = public_path('photo/customer_profile/');
            $image->move($destination,$name);
            Customer::where('email',$customer->email)->update([
                'image' => $name,
            ]);
        }
        return back()->with('alert-success','Profile Update Successfully');

    }

}
