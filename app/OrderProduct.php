<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $guarded = [];
    public function orderProduct(){
        return $this->belongsTo('App\OrderProduct','order_id','order_id');
    }
    public function product(){
        return $this->belongsTo('App\Product','product_id','id');
    }

}
