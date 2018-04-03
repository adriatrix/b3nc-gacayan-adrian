@extends('layout/app')

@section('title')
Articles List
@endsection

@section('main_content')

<div class="columns">
   <div class="column is-8 is-offset-2">
       <table class="table is-hoverable is-striped is-bordered is-fullwidth">
         <thead>
            <tr>
               <th>Title</th>
               <th>Created at</th>
            </tr>
         </thead>
         <tbody>
            @foreach($user->articles as $article)
            <tr>
               <td><a href='{{url("/articles/$article->id")}}'>{{$article->title}}</a></td>
               <td><span class="is-7"> {{$article->created_at}}</span></td>
            </tr>
            @endforeach
         </tbody>
      </table>
      <hr>
       <table class="table is-hoverable is-striped is-bordered is-fullwidth">
         <thead>
            <tr>
               <th>Comment</th>
               <th>Created at</th>
            </tr>
         </thead>
         <tbody>
            @foreach($user->comments as $comment)
            <tr>
               <td><a href='{{url("/comments/$comment->id")}}'>{{$comment->comment}}</a></td>
               <td><span class="is-7"> {{$comment->created_at}}</span></td>
            </tr>
            @endforeach
         </tbody>
      </table>

   </div>
</div>

@endsection
