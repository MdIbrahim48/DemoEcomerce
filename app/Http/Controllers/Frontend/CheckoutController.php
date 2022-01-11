<?php

namespace App\Http\Controllers\Frontend;

use App\BillingAddress;
use App\Http\Controllers\Controller;
use App\ShippingAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index(){
        $email = Auth::user()->email;
        $billingAddress = BillingAddress::where('customer_email', $email)->first();
        $shippingAddress = ShippingAddress::where('customer_email', $email)->first();
        return view('frontend.checkout.index',[
            'billingAddress' => $billingAddress,
            'shippingAddress' => $shippingAddress,
        ]);
    }
}
