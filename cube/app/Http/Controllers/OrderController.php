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


class OrderController extends Controller
{
   public function __construct() {
       $this->middleware('auth');
   }

   public function showOrders() {
      $id = \Auth::user()->id;
      // $user = User::find($id);
      $get_orders = Order::all();
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
    return view ('orders/single_order', compact('order'));
  }

   public function createOrders(Request $request) {
      $rules = array (
        'so_num' => 'required',
        'po_num' => 'required',
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

      return redirect('/orders');
   }

   public function editOrder(Request $request) {
      $rules = array (
        'so_num' => 'required',
        'po_num' => 'required',
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

      return redirect('/orders');
   }
}
