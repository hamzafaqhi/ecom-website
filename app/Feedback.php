<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $fillable = [
        'order_number',    
    ];
    public function orders()
    {
        return $this->belongsTo('App\Order');
    }
}
