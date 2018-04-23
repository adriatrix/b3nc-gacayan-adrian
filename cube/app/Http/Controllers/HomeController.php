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
      $orders = $get_orders->where('user_id',$id)->sortBy('order_state_id');
      $tags = Tag::all();

      $get_task_states = TaskState::all();
      $tasks_states = $get_task_states->where('name','Pending')->first();
      $tasks_states_id = $tasks_states->id;

      $get_tasks = Task::latest()->get();
      $tasks = $get_tasks->where('task_state_id',$tasks_states_id)->sortBy('due_date');

      return view ('home', compact('orders','tasks_states_id','tasks','user'));
    }

    public function autocomplete(Request $request)
    {
      $term=$request->term;
        $data = stationary::where('item','LIKE','%'.$term.'%')
        ->take(10)
        ->get();
        $result=array();
        foreach ($data as $key => $v){
           $result[]=['value' =>$value->item];
        }
        return response()->json($results);
     }
}
