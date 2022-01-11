<?php

namespace App\Http\Controllers\Frontend;
use App\BillingAddress;
use App\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BillingAddressController extends Controller
{

    public function billingAddressUpdate(Request $request){
        $data = $request->all();
        $data['customer_email'] = Auth::User()->email;
        $billingAddress = BillingAddress::where('customer_email',Auth::User()->email)->first();
        if($billingAddress){
            $billingAddress->update($data);
        }else{
            BillingAddress::create($data);
        }
        return back()->with('alert-success', 'Billing Address Updated Successfully');
    }
}
