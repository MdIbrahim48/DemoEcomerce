<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Orders;
use App\OrderProduct;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        $orders = Orders::get();
        return view('admin.order.index',[
            'orders' => $orders
        ]);
    }


    public function view($id){
        $order = Orders::where('id',$id)->first();
        Orders::where('id',$id)->update([
            'read_status' => 'read',
         ]);

        return view('admin.invoice.index',[
            'order' => $order
        ]);
    }

    public function edit($id){
        $order = Orders::where('id',$id)->first();
        Orders::where('id',$id)->update([
            'read_status' => 'read',
         ]);

        return view('admin.order.edit',[
            'order' => $order
        ]);
        return back()->with('alert-success','Order Update Successfully');
    }

    public function update(Request $request , $id){
        Orders::where('id',$id)->update([
           'status' => $request->status,
           'read_status' => 'read',
        ]);
        return back()->with('alert-success','Order Update Successfully');
    }


    public function destroy($id){
        $order = Orders::where('id',$id)->first();
        OrderProduct::where('order_id',$order->order_id)->delete();
        $order->delete();
        return back()->with('alert-danger','Order Delete Successfully');
    }

}
