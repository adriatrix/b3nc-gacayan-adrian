<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;
use App\Comment;

class CommentController extends Controller
{
   public function createComment(Request $request) {
      $rules = array (
        'comment' => 'required',
    );
      $this->validate($request,$rules);

      $new_comment= new Comment();
      $new_comment->comment = $request->comment;
      $new_comment->user_id = \Auth::user()->id;
      $new_comment->customer_id = $request->customer_id;
      $new_comment->save();

      Session::flash('alert-success', 'Post successfully created');

      return redirect()->back();
   }
}
