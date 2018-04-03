<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Article;
use Auth;
use App\User;

class ArticleController extends Controller
{
   public function __construct()
   {
      $this->middleware('auth');
   }

  function showArticles() {
    // $article1 = 'Article 1';
    // $article2 = 'Article 2';
    // return view('articles/articles_list', compact('article1','article2'));

    $articles = Article::all();
    return view ('articles/articles_list', compact('articles'));
  }

  function showProfile($user_id) {
    $user = User::find($user_id);
    // dd($user_id);
    // $articles = Article::find($user_id);
    return view ('articles/profile', compact('user'));
  }

  function create(Request $request) {
    $rules = array (
      'title' => 'required',
      'content' => 'required'
    );
    $this->validate($request,$rules);


    $new_article= new Article();
    $new_article->title = $request->title;
    $new_article->content = $request->content;
    $new_article->author_id = Auth::user()->id;
    $new_article->save();

    Session::flash('create_article_success','Article Successfully Created');

    return redirect('/articles');
  }

  function show($id) {
    $article = Article::find($id);
    $result = $article->comments();
    $related_comments = $article->comments()->get();

    return view ('articles/single_article', compact('article'));
  }

  function delete($id) {
    $article = Article::find($id);
    $article->delete();

    return redirect('/articles');
  }

  function edit(Request $request, $id) {
    $rules = array (
      'title' => 'required',
      'content' => 'required'
    );
    $this->validate($request,$rules);

    $article = Article::find($id);
    $article->title = $request->title;
    $article->content = $request->content;
    $article->save();

    return redirect()->back();
  }

}
