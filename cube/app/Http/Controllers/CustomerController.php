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

    public function searchCustomers(Request $request) {
         $output='';
         $customers = Customer::where('name','LIKE','%'.$request->search.'%')->get();

         if($customers) {
            foreach ($customers as $customer) {
               $output .= '<a href="/customers/'.$customer->id.'" class="badge badge-info mb-1">'.$customer->name.'</a>&nbsp;';
            }
            return Response($output);
         }
   }

   public function showCustomer($id) {
      $customer = Customer::find($id);
      $get_comments = Comment::all();
      $comments = $get_comments->where('customer_id',$id)->sortBy('created_at');
      return view ('customers/single_customer', compact('customer','comments'));
   }
}
