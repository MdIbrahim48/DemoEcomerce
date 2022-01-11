<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'user_name',
        'first_name',
        'last_name',
        'email',
        'phone',
        'image',
    ];
    public function user(){
        return $this->hasOne('App\User','email','email');
    }
}
