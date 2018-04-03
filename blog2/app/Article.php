<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
   function get_user() {
      return $this->belongsTo('App\User','author_id');
   }

   function say_hello() {
      return "hello";
   }

   function comments() {
      return $this->hasMany('App\Comment');
   }
}
