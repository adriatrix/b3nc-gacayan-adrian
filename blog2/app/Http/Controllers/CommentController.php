<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class CommentController extends Controller
{
   function addComment(Request $request,$id) {
      $comment = $request->comment;
      $user_id = Auth::user()->id;
      $article_id = $id;

      $comment_obj = new \App\Comment;
      $comment_obj->user_id = $user_id;
      $comment_obj->article_id = $article_id;
      $comment_obj->comment = $comment;
      $comment_obj->save();

      return redirect()->back();
  }
}
