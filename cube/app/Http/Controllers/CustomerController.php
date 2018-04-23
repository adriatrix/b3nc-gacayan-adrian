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
use App\Comment;

class CustomerController extends Controller
{
   public function __construct() {
      $this->middleware('auth');
   }

   public function showCustomers() {
      $get_customers = Customer::latest()->get();
      $customers = $get_customers->sortBy('name');

      return view ('customers/customers_list', compact('customers'));
    }

    public function searchCustomers(Request $request) {
         $output='';
         $customers = Customer::where('name','LIKE','%'.$request->search.'%')->get();

         if($customers) {
            foreach ($customers as $customer) {
               $output .= '<button data-index="'.$customer->id.'" class="badge badge-info mb-1 customerbutton" data-toggle="button" aria-pressed="false" autocomplete="off">'.$customer->name.'</button>&nbsp;';
            }
            return Response($output);
         }
   }

   public function searchOrders(Request $request) {
    $id = \Auth::user()->id;
    $cust = $request->cust;

    $get_orders = Order::latest()->get();
    $orders = $get_orders->where('customer_id',$cust)->sortBy('order_state_id');

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
          $output .= '<td class="my-align align-middle">'.$order->notes.'</td>';
          $output .= '</td></tr>';
        }
      } else {
        $output = '<tr><td colspan="8"><p class="h4 text-danger">No orders entered yet under this customer...</p></td></tr>';
      }
      return Response($output);
}

   public function showCustomer($id) {
      $customer = Customer::find($id);
      $get_comments = Comment::all();
      $comments = $get_comments->where('customer_id',$id)->sortBy('created_at');
      return view ('customers/single_customer', compact('customer','comments'));
   }
}
