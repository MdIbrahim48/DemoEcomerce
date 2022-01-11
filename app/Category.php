<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    public function subCategory(){
        return $this->hasMany('App\SubCategory','category_id','id');
    }

    public function product(){
        return $this->hasMany('App\Product','category_id','id');
    }


}
