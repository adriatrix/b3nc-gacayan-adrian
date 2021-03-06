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
use Carbon\Carbon;



class OrderController extends Controller
{
   public function __construct() {
       $this->middleware('auth');
   }

   public function showOrders() {
      $id = \Auth::user()->id;

      $get_orders = Order::latest()->get();
      $orders = $get_orders->where('user_id',$id)->sortBy('order_state_id');

      $order_states = OrderState::all();
      $tags = Tag::all();

      $get_task_states = TaskState::all();
      $tasks_states = $get_task_states->where('name','Pending')->first();
      $tasks_states_id = $tasks_states->id;

      return view ('orders/orders_list', compact('orders','order_states','tags','tasks_states_id'));
   }

   public function showOrder($id) {
    $order = Order::find($id);
    $order_states = OrderState::all();

    $get_tasks = Task::latest()->get();
    $tasks = $get_tasks->where('order_id',$id)->sortBy('task_state_id');

    return view ('orders/single_order', compact('order','order_states','tasks'));
  }

  public function searchNumbers(Request $request) {
      $output='';
      $orders = Order::where('so_num','LIKE','%'.$request->search.'%')->orWhere('po_num','LIKE','%'.$request->search.'%')->get();

      if($orders) {
          foreach ($orders as $order) {
             $output .= '<button data-index="'.$order->id.'" class="badge badge-info mb-1 orderbutton" data-toggle="button" aria-pressed="false" autocomplete="off">'.$order->so_num.' - '.$order->po_num.'</button>&nbsp;';
          }
      } else {
         $output .= '&nbsp;';
      }
      return Response($output);
}

  public function suggestOrders(Request $request) {
      $output='';
      $orders = Order::where('so_num','LIKE','%'.$request->suggest.'%')->latest()->take(3)->get();

      if($orders) {
          foreach ($orders as $order) {
             if ($order->get_status->name == 'Received' OR $order->get_status->name == 'Entered' OR $order->get_status->name == 'On Hold') {
                $output .= '<button data-index="'.$order->so_num.'" class="badge badge-info suggestorderbutton font-weight-normal" data-toggle="button" aria-pressed="false" autocomplete="off">'.$order->so_num.'</button>&nbsp;';
             } else {
                $output .= '&nbsp;';
             }
          }
      } else {
         $output .= '&nbsp;';
      }
      return Response($output);
}


  public function searchOrders(Request $request) {
      $id = \Auth::user()->id;
      $odor = $request->odor;

      $get_orders = Order::latest()->get();
      $orders = $get_orders->where('id',$odor)->sortBy('created_at');

      $order_states = OrderState::all();
      $tags = Tag::all();

      $get_task_states = TaskState::all();
      $tasks_states = $get_task_states->where('name','Pending')->first();
      $tasks_states_id = $tasks_states->id;

      $output='';

      if(count($orders) > 0) {
          foreach ($orders as $order) {
             if($order->get_status->name == 'Cancelled' OR $order->get_status->name == 'Closed') {
                $output .= '<tr class="text-secondary">';
             } else {
                $output .= '<tr>';
             }
             if ($order->tasks()->where('task_state_id',$tasks_states_id)->count()) {
               $output .= '<td data-title="Tasks" class="align-middle"><button class="badge badge-pill badge-warning text-hand" disabled>'.$order->tasks()->where('task_state_id',$tasks_states_id)->count().'</button></td>';
             } else {
               $output .= '<td></td>';
             }
             $output .= '<td data-title="SO#" class="align-middle"><a href="/orders/'.$order->id.'"><strong class="text-emerson">'.$order->so_num.'</strong></a></td>';
             $output .= '<td data-title="Customer" class="align-middle">'.$order->get_customer->name.'</td>';
             $output .= '<td data-title="PO#" class="align-middle">'.$order->po_num.'</td>';
            if (count($order->tags)) {
              $output .= '<td data-title="Tags" class="align-middle">';
              foreach ($order->tags as $tag) {
                $output .= '<a href="/orders/tags/'.$tag->name.'" class="badge badge-primary">'.$tag->name.'</a>&nbsp;';
              }
              $output .= '</td>';
            } else {
              $output .= '<td></td>';
            }
            $output .= '<td data-title="Status" class="align-middle">'.$order->get_status->name.'</td>';
            $output .= '<td data-title="Notes" class="my-align align-middle">'.$order->notes.'</td>';
            $output .= '</td></tr>';
          }
          return Response($output);
      }
}

  public function showTaggedOrders(Tag $tag) {
     $id = \Auth::user()->id;

     $get_orders = $tag->orders;
     $orders = $get_orders->where('user_id',$id)->sortBy('order_state_id');


     $order_states = OrderState::all();
     $tags = Tag::all();

     $get_task_states = TaskState::all();
     $tasks_states = $get_task_states->where('name','Pending')->first();
     $tasks_states_id = $tasks_states->id;

     return view ('orders/tagged_list', compact('orders','order_states','tags','tasks_states_id'));
  }

   public function createOrders(Request $request) {
      $rules = array (
        'so_num' => 'required',
        'customer' => 'required',
        'received_date' => 'required'
    );
      $this->validate($request,$rules);

      $new_order= new Order();
      $new_order->so_num = $request->so_num;
      $new_order->po_num = $request->po_num;
      $new_customer = Customer::firstOrCreate(['name' => $request->customer]);
      $customers = Customer::all();
      $get_customer = $customers->where('name',$request->customer)->first();
      $new_order->customer_id = $get_customer->id;
      $order_states = OrderState::all();
      $get_state = $order_states->where('name',$request->status)->first();
      $new_order->order_state_id = $get_state->id;
      $new_order->user_id = \Auth::user()->id;
      $new_order->notes = $request->notes;
      $new_order->received_date = $request->received_date;
      $new_order->save();

      $tagNames = explode(" ", $request->get('tags'));
      $tagIds = [];
      foreach($tagNames as $tagName)
      {
          $tag = Tag::firstOrCreate(['name'=>$tagName]);
          if($tag)
          {
            $tagIds[] = $tag->id;
          }

      }
      $new_order->tags()->sync($tagIds);

      Session::flash('alert-success', 'Order successfully created');

      return redirect('/home');
   }

   public function editOrder(Request $request) {
      $rules = array (
        'so_num' => 'required',
        'customer' => 'required',
        'received_date' => 'required'
    );
      $this->validate($request,$rules);

      $id = $request->order_id;

      $order = Order::find($id);
      $order->so_num = $request->so_num;
      $order->po_num = $request->po_num;

      $new_customer = Customer::firstOrCreate(['name' => $request->customer]);
      $customers = Customer::all();
      $get_customer = $customers->where('name',$request->customer)->first();
      $order->customer_id = $get_customer->id;

      $order_states = OrderState::all();
      $get_state = $order_states->where('name',$request->status)->first();
      $order->order_state_id = $get_state->id;

      $order->notes = $request->notes;
      $order->received_date = $request->received_date;
      $order->booked_date = $request->booked_date;

      if ($get_state->name == 'Booked') {
        $order->booked_date = Carbon::now('America/Chicago');
      }

      $order->save();

      $tagNames = explode(" ", $request->get('tags'));
      $tagIds = [];
      foreach($tagNames as $tagName)
      {
          $tag = Tag::firstOrCreate(['name'=>$tagName]);
          if($tag)
          {
            $tagIds[] = $tag->id;
          }

      }
      $order->tags()->sync($tagIds);

      Session::flash('alert-info', 'Order successfully updated');

      return redirect('/orders/'.$id);
   }
}
