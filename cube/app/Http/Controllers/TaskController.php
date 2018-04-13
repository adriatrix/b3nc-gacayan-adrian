<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Order;
use Auth;
use App\User;
use App\Customer;
use App\OrderState;
use App\Tag;
use App\Task;

class TaskController extends Controller
{
   public function __construct() {
      $this->middleware('auth');
  }

  public function showTasks() {
     $id = \Auth::user()->id;
     // $user = User::find($id);
     $get_orders = Order::all();
     $orders = $get_orders->where('user_id',$id)->sortBy('order_state_id');
     $order_states = OrderState::all();
     $tags = Tag::all();
     $tasks = Task::all();
     return view ('tasks/tasks_list', compact('orders','order_states','tags','tasks'));
  }
}
