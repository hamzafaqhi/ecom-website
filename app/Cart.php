<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{

    protected $fillable = [
        'p_qty','t_cost','subtotal','pr_cost','product_id',    
    ];
    public function orders()
    {
        return $this->belongsTo('App\Order');
    }
}
