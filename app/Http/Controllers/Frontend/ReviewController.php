<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Product;
use App\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request,$id){
        $product = Product::where('id',$id)->first();
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'comment' => 'required',
            'reting' => 'required',
        ]);
        Review::create([
            'product_id' => $product->id,
            'name' => $request->name,
            'email' => $request->email,
            'comment' => $request->comment,
            'reting' => $request->reting,
        ]);
        return back()->with('alert-success','Review Successfully');
    }
}
