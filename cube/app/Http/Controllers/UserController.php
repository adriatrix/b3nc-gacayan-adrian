<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\User;

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
}
