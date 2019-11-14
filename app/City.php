<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = [
        'city_name','pro_id',    
    ];
    public function provinces()
    {
        return $this->belongsTo('App\Province');
    }
}
