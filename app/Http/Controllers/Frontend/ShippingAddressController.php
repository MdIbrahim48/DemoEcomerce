<?php

namespace App\Http\Controllers\Frontend;

use App\BillingAddress;
use App\Http\Controllers\Controller;
use App\ShippingAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShippingAddressController extends Controller
{
    public function shippingAddressUpdate(Request $request){
        $data = $request->all();
        $data['customer_email'] = Auth::User()->email;
        $shippingAddress = ShippingAddress::where('customer_email',Auth::User()->email)->first();
        if($shippingAddress){
            $shippingAddress->update($data);
        }else{
            ShippingAddress::create($data);
        }
        return back()->with('alert-success', 'Shipping Address Updated Successfully');
    }
}
