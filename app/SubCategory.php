<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $guarded = [];

    public function category(){
        return $this->belongsTo('App\Category','category_id','id');
    }

    public function product(){
        return $this->hasMany('App\Product','subcategory_id','id');
    }

}
