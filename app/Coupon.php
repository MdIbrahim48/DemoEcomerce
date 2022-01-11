<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $guarded = [];

    public function product(){
        return $this->hasMany('App\Product','product_id','id');
    }

}
