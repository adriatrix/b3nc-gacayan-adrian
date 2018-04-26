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
use App\TaskState;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $id = \Auth::user()->id;
      $user = \Auth::user()->nickname;

      $get_orders = Order::latest()->get();
      $orders = $get_orders->where('user_id',$id)->sortBy('received_date');

      $get_order_states = OrderState::all();

      // $orders_received = $get_order_states->where('name','Received')->first();
      // $orders_entered = $get_order_states->where('name','Entered')->first();
      // $orders_onhold = $get_order_states->where('name','On Hold')->first();
      // $orders_booked = $get_order_states->where('name','Booked')->first();
      // $orders_acknowledged = $get_order_states->where('name','Acknowledged')->first();
      // $orders_cancelled = $get_order_states->where('name','Cancelled')->first();
      // $orders_closed = $get_order_states->where('name','Closed')->first();

      // $received = $orders->where('order_state_id','$order->get_status->id');
      // $entered = $orders->where('order_state_id',$order->get_status->id);

      $tags = Tag::all();

      $get_task_states = TaskState::all();
      $tasks_states = $get_task_states->where('name','Pending')->first();
      $tasks_states_id = $tasks_states->id;

      $get_tasks = Task::latest()->get();
      $tasks = $get_tasks->where('task_state_id',$tasks_states_id)->sortBy('due_date');

      return view ('home', compact('orders','tasks_states_id','tasks','user','received'));
    }

}
