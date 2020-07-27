<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    public function orderProducts()
    {
        return $this->hasMany('App\order_product','o_id','id');
    }
    public function userDetails()
    {
        return $this->hasOne('App\User','id','u_id');
    }
}
