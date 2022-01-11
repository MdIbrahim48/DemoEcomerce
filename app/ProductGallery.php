<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductGallery extends Model
{
    protected $fillable = [
        'product_id',
        'image',
    ];
    function product(){
        return $this->belongsTo('App\Product','product_id','id');
    }
}
