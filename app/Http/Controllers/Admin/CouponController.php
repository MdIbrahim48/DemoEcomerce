<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Coupon;
use App\Product;
use Illuminate\Support\Facades\Auth;

class CouponController extends Controller
{
    public function index(){
        $coupons = Coupon::where('status','1')->get();
        return view('admin.coupon.index',[
            'coupons' => $coupons,
        ]);
    }

    public function create(){
        $products = Product::where('status','1')->get();
        return view('admin.coupon.create',[
            'products' => $products
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'product_id' => 'required',
            'discount_type' => 'required',
            'coupon_amount' => 'required',
            'expire_date' => 'required',
            'min_spend' => 'required',
            'indivitual_use' => 'required',
        ]);
        Coupon::create([
            'name' => $request->name,
            'product_id' => $request->product_id,
            'description' => $request->description,
            'discount_type' => $request->discount_type,
            'coupon_amount' => $request->coupon_amount,
            'expire_date' => $request->expire_date,
            'min_spend' => $request->min_spend,
            'indivitual_use' => $request->indivitual_use,
            'usage_limit_per_coupon' => $request->usage_limit_per_coupon,
            'status' => $request->status,
            'created_by' => Auth::user()->email,
        ]);
        return back()->with('alert-success','Coupon Added Successfully');
    }

    public function edit($id){
        $coupon = Coupon::where('id',$id)->first();
        $products = Product::where('status','1')->get();
        return view('admin.coupon.edit',[
            'coupon' => $coupon,
            'products' => $products
        ]);
    }

    public function update(Request $request,$id){
        $request->validate([
            'name' => 'required',
            'product_id' => 'required',
            'discount_type' => 'required',
            'coupon_amount' => 'required',
            'expire_date' => 'required',
            'min_spend' => 'required',
            'indivitual_use' => 'required',
        ]);
        Coupon::where('id',$id)->update([
            'name' => $request->name,
            'product_id' => $request->product_id,
            'description' => $request->description,
            'discount_type' => $request->discount_type,
            'coupon_amount' => $request->coupon_amount,
            'expire_date' => $request->expire_date,
            'min_spend' => $request->min_spend,
            'indivitual_use' => $request->indivitual_use,
            'usage_limit_per_coupon' => $request->usage_limit_per_coupon,
            'status' => $request->status,
            'edited_by' => Auth::user()->email,
        ]);
        return back()->with('alert-success','Coupon Update Successfully');
    }

    public function destroy($id){
        Coupon::where('id',$id)->first()->delete();
        return back()->with('alert-danger','Coupon Delete Successfully');
    }


}
