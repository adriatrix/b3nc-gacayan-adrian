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


class OrderController extends Controller
{
   public function __construct() {
       $this->middleware('auth');
   }

   public function showOrders() {
      $id = \Auth::user()->id;
      $user = User::find($id);
      $order_states = OrderState::all();
      $tags = Tag::all();
      $tasks = Task::all();
      return view ('orders/orders_list', compact('user','order_states','tags','tasks'));
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
      $new_order->order_state_id = 1;
      $new_order->user_id = 10;
      $new_order->notes = $request->notes;
    //   $new_order->tags = $request->tags;


      $new_order->save();
  
      return redirect('/orders');
   }
}
