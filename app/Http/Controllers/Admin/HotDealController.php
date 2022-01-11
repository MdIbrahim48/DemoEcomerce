<?php

namespace App\Http\Controllers\Admin;

use App\HotDeal;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HotDealController extends Controller
{
    public function index(){
        $products = Product::where('hot_deal','yes')->get();
        return view('admin.hot_deal.index',[
            'products' => $products
        ]);
    }

    public function create(){
        $products = Product::where('status','1')->get();
        return view('admin.hot_deal.create',[
            'products' => $products
        ]);
    }

    public function store(Request $request){    
       Product::where('id',$request->product_id)->update([
        'hot_deal' => 'yes'
       ]);
        return back()->with('alert-success','Hot Deal Added Successfully');
    }

    public function removeHotDeal($id){
        Product::where('id',$id)->update([
            'hot_deal' => 'no'
           ]);
        return back()->with('alert-danger','Hot Deal Remove Successfully');
    }

    

    

   


}
