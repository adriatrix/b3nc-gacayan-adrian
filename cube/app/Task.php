<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    function get_status() {
        return $this->belongsTo('App\TaskState','task_state_id');
     }

    function get_order() {
        return $this->belongsTo('App\Order','order_id');
     }
}
