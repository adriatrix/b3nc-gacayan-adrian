<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Order;
use Auth;
use App\User;
use App\Customer;
use App\Comment;
use DB;

class CustomerController extends Controller
{
   public function __construct() {
      $this->middleware('auth');
   }

   public function showCustomers() {
      $get_customers = Customer::all();
      $customers = $get_customers->sortBy('name');

      return view ('customers/customers_list', compact('customers'));
   }

   public function showCustomer($id) {
      $customer = Customer::find($id);
      $get_comments = Comment::all();
      $comments = $get_comments->where('customer_id',$id)->sortBy('created_at');
      return view ('customers/single_customer', compact('customer','comments'));
   }

   public function search(Request $request) {
      // if ($request->ajax()) {
         $output = "";
         $results = DB::table('customers')->where('name','LIKE','%'.$request->search."%")->get();
         if ($results) {
            foreach ($results as $result)  {
               $output = '<a href="#" class="badge badge-info">'.$result->name.'</a>&nbsp;';
            }
            dd($output);
            return Response($output);
         }
      // }
   }
}
