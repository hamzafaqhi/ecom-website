<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = [
        'pr_name','pr_price','pr_status','pr_quantity','pr_rating','pr_pic','category_id',
    ];

    public function categories()
    {
        return $this->belongsTo('App\Category');
    }
}
