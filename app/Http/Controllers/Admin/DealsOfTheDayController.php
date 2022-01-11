<?php

namespace App\Http\Controllers\Admin;

use App\DealOfTheDay;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DealsOfTheDayController extends Controller
{
    public function index(){
        $dealsOfTheDays = DealOfTheDay::get();
        return view('admin.deal_of_the_day.index',[
            'dealsOfTheDays' => $dealsOfTheDays
        ]);
    }

    public function create(){
        $products = Product::where('status','1')->get();
        return view('admin.deal_of_the_day.create',[
            'products' => $products
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'date' => 'required',
            'product_id' => 'required',
            'status' => 'required',
        ]);
        DealOfTheDay::create([
            'date' => $request->date,
            'product_id' => $request->product_id,
            'status' => $request->status,
            'created_by' => Auth::user()->email,
        ]);
        return back()->with('alert-success','DealOfTheDay Added Successfully');
    }

    public function edit($id){
        $dealsOfTheDay = DealOfTheDay::where('id',$id)->first();
        $products = Product::where('status','1')->get();
        return view('admin.deal_of_the_day.edit',[
            'dealsOfTheDay' => $dealsOfTheDay,
            'products' => $products,
        ]);
    }

    public function update(Request $request , $id){
        $request->validate([
            'date' => 'required',
            'product_id' => 'required',
            'status' => 'required',
        ]);
        DealOfTheDay::where('id',$id)->update([
            'date' => $request->date,
            'product_id' => $request->product_id,
            'status' => $request->status,
            'edited_by' => Auth::user()->email,
        ]);
        return back()->with('alert-success','DealOfTheDay Update Successfully');
    }

    public function destroy($id){
        DealOfTheDay::where('id',$id)->delete();
        return back()->with('alert-danger','DealOfTheDay Delete Successfully');
    }



}
