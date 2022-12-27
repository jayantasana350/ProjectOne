<?php

namespace App;

use Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Color extends Model
{
    use SoftDeletes;

    function attributes(){
        return $this->hasMany( Attribute::class, 'color_id');
    }
}
