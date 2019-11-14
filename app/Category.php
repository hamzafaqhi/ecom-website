<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'ca_name','description',    
    ];
    
    public function products()
    {
        return $this->hasMany('App\Product');
    }
}
