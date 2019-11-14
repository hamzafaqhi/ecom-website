<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'first_name','last_name','order_status','customer_id','cart_id','address','phone','postal_code','provincial_id','city_id',    
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


