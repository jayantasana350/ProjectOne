<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    function attributes(){
        return $this->hasMany( Attribute::class, 'product_id');
    }

    function gallery(){
        return $this->hasMany( ProductGallery::class, 'product_id');
    }
}
