<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
   function get_user() {
      return $this->belongsTo('App\User','user_id');
   }

   function get_customer() {
      return $this->belongsTo('App\Customer','customer_id');
   }

   function get_status() {
      return $this->belongsTo('App\OrderState','order_state_id');
   }
}
