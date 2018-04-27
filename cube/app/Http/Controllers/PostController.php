<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;
use App\Post;

class PostController extends Controller
{
   public function createPost(Request $request) {
      $rules = array (
        'post' => 'required',
    );
      $this->validate($request,$rules);

      $new_post= new Post();
      $new_post->post = $request->post;
      $new_post->poster_id = \Auth::user()->id;
      $new_post->user_id = $request->user_id;
      $new_post->save();

      Session::flash('alert-success', 'Post successfully created');

      return redirect()->back();
   }
}
