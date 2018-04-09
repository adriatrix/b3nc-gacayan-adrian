<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    // The orders that belong to the tag.
    function orders() {
        return $this->belongsToMany('App\Order');
     }
}