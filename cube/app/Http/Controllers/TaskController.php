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

  public function addTaskById(Request $request,$id) {
    $rules = array (
      'description' => 'required|string|max:255',
      'due_date' => 'required',
      'notes' => 'required|string|max:255'
    );
    $this->validate($request,$rules);


    $description = $request->description;
    $notes = $request->notes;
    $due_date = $request->due_date;
    $order_id = $id;


     //  $task_state_id = 5;

     $task_obj = new Task;
     $task_obj->description = $description;
     $task_obj->notes = $notes;
     $task_obj->due_date = $due_date;
     $task_obj->order_id = $order_id;
     $task_states = TaskState::all();
     $get_state = $task_states->where('name','Pending')->first();
     $task_obj->task_state_id = $get_state->id;
     $task_obj->save();

     return redirect()->back();
  }

  public function addTask(Request $request) {
    $rules = array (
      'so_num' => 'required',
      'description' => 'required|string|max:255',
      'due_date' => 'required',
      'notes' => 'required|string|max:255'
    );
    $this->validate($request,$rules);

    $description = $request->description;
    $notes = $request->notes;
    $due_date = $request->due_date;

    $order = Order::where('so_num',$request->so_num)->first();
    $order_id = $order->id;


     //  $task_state_id = 5;

     $task_obj = new Task;
     $task_obj->description = $description;
     $task_obj->notes = $notes;
     $task_obj->due_date = $due_date;
     $task_obj->order_id = $order_id;
     $task_states = TaskState::all();
     $get_state = $task_states->where('name','Pending')->first();
     $task_obj->task_state_id = $get_state->id;
     $task_obj->save();

     return redirect()->back();
  }

   public function statusTask(Request $request) {
       $task = Task::find($request->idTask);
       $get_state = TaskState::where('name',$request->checkboxStatus)->first();
       $task->task_state_id = $get_state->id;
       $task->save();
  }

  public function editTask(Request $request) {

      $description = $request->description;
      $notes = $request->notes;
      $due_date = $request->due_date;
      $order_id = $request->order_id;

      $task_obj = Task::find($request->task_id);
      $task_obj->description = $request->description;
      $task_obj->notes = $request->notes;
      $task_obj->due_date = $request->due_date;
      $task_obj->save();

      return redirect()->back();
  }

  public function deleteTask(Request $request) {
    $task = Task::find($request->task_id);
    $task->delete();

    return redirect()->back();
  }

}
