<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    public function orderProduct(){
        return $this->hasMany('App\OrderProduct','order_id','order_id');
    }

    public function billingAddress(){
        return $this->belongsTo('App\BillingAddress','email','customer_email');
    }

    public function shippingAddress(){
        return $this->belongsTo('App\ShippingAddress','email','customer_email');
    }
}
