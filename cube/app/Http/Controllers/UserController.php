<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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

class UserController extends Controller
{
  public function showProfile() {
     $id = \Auth::user()->id;
     $user = User::where('id',$id)->first();

     // dd($user);

     return view ('users/profile', compact('user'));
  }

  public function editUser(Request $request) {
     $rules = array (
       'nickname' => 'required',
       'password' => 'required',
   );
     $this->validate($request,$rules);

     $id = $request->user_id;

     $user = User::find($id);
     $user->nickname = $request->nickname;
     $user->save();

     if (Hash::check($request->password, $user->password)) {
       $request->user()->fill([
           'password' => Hash::make($request->password)
       ])->save();
     }

     return redirect('/profile');
  }

  public function showUsers() {
     $get_users = User::latest()->get();
     $users = $get_users->sortBy('name');

     return view ('users/users_list', compact('users'));
   }

   public function searchUsers(Request $request) {
        $output='';
        $users = User::where('name','LIKE','%'.$request->search.'%')->get();

        if($users) {
           foreach ($users as $user) {
              $output .= '<button data-index="'.$user->id.'" class="badge badge-info mb-1 userbutton" data-toggle="button" aria-pressed="false" autocomplete="off">'.$user->name.' aka '.$user->nickname.'</button>&nbsp;';
           }
           return Response($output);
        }
  }

  public function searchOrders(Request $request) {
   $id = \Auth::user()->id;
   $user = $request->user;

   $get_orders = Order::latest()->get();
   $orders = $get_orders->where('user_id',$user)->sortBy('order_state_id');

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
          $output .= '<td data-title="Created by" class="align-middle">'.$order->get_user->name.'</td>';
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
       $output = '<tr><td colspan="8"><p class="h4 text-danger">No orders created yet by this user...</p></td></tr>';
     }
     return Response($output);
}

  public function showUser($id) {
     $user = User::where('id',$id)->first();

     return view ('users/user', compact('user'));
  }
}
