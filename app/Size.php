<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Size extends Model
{
    use SoftDeletes;

    function attributes(){
        return $this->hasMany( Attribute::class, 'size_id');
    }
}
