<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Order;
use Auth;
use App\User;
use App\Customer;
use App\OrderState;


class OrderController extends Controller
{
   public function __construct() {
       $this->middleware('auth');
   }

   public function showOrders() {
      $id = \Auth::user()->id;
      $user = User::find($id);
      $order_states = OrderState::all();
      return view ('orders/orders_list', compact('user','order_states'));
   }
}
