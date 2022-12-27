<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductGallery extends Model
{
    function product(){
        return $this->belongsTo( Product::class, 'product_id');
    }
}
