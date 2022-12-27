<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attributes extends Model
{
    function color(){
        return $this->belongsTo( Color::class, 'color_id');
    }

    function size(){
        return $this->belongsTo( Size::class, 'size_id');
    }

    function product(){
        return $this->belongsTo( Product::class, 'product_id');
    }
}
