<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'p_type','p_amount','order_id','customer_id',    
    ];
    public function users()
    {
        return $this->belongsTo('App\User');
    }
    public function orders()
    {
        return $this->belongsTo('App\Order');
    }
}
