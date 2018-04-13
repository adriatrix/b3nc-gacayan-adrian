<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name'];
    // The orders that belong to the tag.
    function orders() {
        return $this->belongsToMany('App\Order');
     }
}
