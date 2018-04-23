@extends('layouts.app')

@section('title')
{{$customer->name}}
@endsection

@section('content')
<div class="container">
   <div class="row justify-content-center mb-5">
      <div class="col-sm-10">
         <div class="d-flex justify-content-between">
            <a class="btn btn-secondary" href='{{url("/home")}}'>Home</a>
            <button class="btn btn-dark" data-toggle="modal" data-target="#createCommentModal">Post</button>
         </div>
      </div>
   </div>
   <div class="row justify-content-center">
      <div class="col-sm-10">
         <div class="text-center">
           <h1 class="display-5"><span class="border-bottom">{{$customer->name}}</span></h1>
         </div>
      </div>
   </div>
   <div class="row justify-content-center">
      <p>&nbsp;</p>
   </div>
   <div class="row justify-content-center">
      <div class="col-sm-10">
         @foreach ($comments as $comment)
         <div class="card border-dark">
            <div class="card-body text-dark" style="white-space: pre-wrap;">
               <h5 class="text-center">{{$comment->comment}}</h5>
            </div>
            <div class="card-footer text-right">
               <h6 class="mt-0 mb-1 card-title"><small>contributed by:</small> <strong>{{$comment->get_user->nickname}}</strong> <small class="text-muted">({{$comment->get_user->team}})</small></h6>
               <p class="mt-0 mb-1"><small>{{$comment->updated_at->diffForHumans()}}</small></p>
            </div>
         </div>
         &nbsp;
         @endforeach
      </div>
   </div>
</div>

<div class="modal fade" id="createCommentModal" tabindex="-1" role="dialog" aria-labelledby="add Comment" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="createOrder">Create a comment for {{$customer->name}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form action='{{url("/comments/create")}}' method="post">
            {{ csrf_field() }}
            <div class="modal-body">
               <div class="form-group row">
                  <div class="col">
                     <textarea class="form-control form-control-sm my-align" name="comment" rows="10"></textarea>
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <input type="hidden" id="customer_id" name="customer_id" value="{{$customer->id}}">
               <input class="btn btn-primary" type="submit" name="create" value="Create">
            </div>
         </form>
      </div>
   </div>
</div>
@endsection
