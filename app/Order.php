<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'order_code','status','payment_type','cart_id','address','city','province','country','first_name','last_name','post_code','phone','email','user_id'
    ];
    public function users()
    {
        return $this->belongsTo('App\User');
    }
    public function feedback()
    {
        return $this->hasMany('App\Feedback');
    }
    public function payments()
    {
        return $this->hasOne('App\Payment');
    }
    public function carts()
    {
        return $this->hasOne('App\Cart');
    }
}


