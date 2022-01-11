<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    public function category(){
        return $this->belongsTo('App\Category','category_id','id');
    }
    public function subCategory(){
        return $this->belongsTo('App\SubCategory','subcategory_id','id');
    }
    public function images(){
        return $this->hasMany('App\ProductGallery','product_id','id');
    }
    public function coupon(){
        return $this->belongsTo('App\Product','id','product_id');
    }

}
