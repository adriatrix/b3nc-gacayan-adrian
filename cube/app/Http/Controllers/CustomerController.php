<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Order;
use Auth;
use App\User;
use App\Customer;
use App\Comment;

class CustomerController extends Controller
{
   public function __construct() {
      $this->middleware('auth');
   }

   public function showCustomer($id) {
      $customer = Customer::find($id);
      $get_comments = Comment::all();
      $comments = $get_comments->where('customer_id',$id)->sortBy('created_at');
      return view ('customers/single_customer', compact('customer','comments'));
   }
}
