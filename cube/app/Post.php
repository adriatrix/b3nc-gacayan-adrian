<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
   function get_poster() {
      return $this->belongsTo('App\User','poster_id');
   }

   function get_user() {
      return $this->belongsTo('App\User','user_id');
   }
}
