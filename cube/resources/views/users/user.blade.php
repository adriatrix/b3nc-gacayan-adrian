@extends('layouts.app')

@section('title')
{{$user->nickname}}'s Profile page
@endsection

@section('content')
<div class="container">
  <div class="row justify-content-center mb-5">
    <div class="col">
      <div class="d-flex justify-content-between">
        <a class="btn btn-secondary" href='{{url("/home")}}'>Home</a>
        <button class="btn btn-dark postbutton" value="{{$user->id}}" data-index="{{$user->id}}" data-toggle="modal" data-target="#postMessageModal">Post</button>
      </div>
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col">
      <h1 class="display-5 text-center">{{$user->nickname}} <span class="h6 align-middle ml-5">joined:<span class="badge badge-primary ml-1">{{date('F d, Y', strtotime($user->created_at))}}</span></span></h1>
      <div class="card">
        <div class="text-center card-body">
          <div class="form-group row">
            <label class="col-lg-2 col-form-label">Name:</label>
            <div class="col-lg-4">
              <input type="text" class="form-control text-center text-truncate" value="{{$user->name}}" disabled>
            </div>
            <label class="col-lg-2 col-form-label">Email:</label>
            <div class="col-lg-4">
              <input type="text" class="form-control text-center text-truncate" value="{{$user->email}}" disabled>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-lg-2 col-form-label">Role:</label>
            <div class="col-lg-4">
              <input type="text" class="form-control text-center text-truncate" value="Order Admin" disabled>
            </div>
            <label class="col-lg-2 col-form-label">Team:</label>
            <div class="col-lg-4">
              <input type="text" class="form-control text-center text-truncate" value="{{$user->team}}" disabled>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row justify-content-center">
     <p>&nbsp;</p>
  </div>
  <div class="row justify-content-center">
     <div class="col">
        @foreach ($posts as $post)
        <div class="card border-dark">
           <div class="card-body text-dark" style="white-space: pre-wrap;">
              <h5 class="text-center">{{$post->post}}</h5>
           </div>
           <div class="card-footer text-right">
              <h6 class="mt-0 mb-1 card-title"><small>posted by:</small> <strong>{{$post->get_poster->nickname}}</strong> <small class="text-muted">({{$post->get_poster->team}})</small></h6>
              <p class="mt-0 mb-1"><small>{{$post->updated_at->diffForHumans()}}</small></p>
           </div>
        </div>
        &nbsp;
        @endforeach
     </div>
  </div>

  <!-- modal for posting messages -->
  <div class="row justify-content-center">
    <div class="col">
      <div class="modal fade" id="postMessageModal" tabindex="-1" role="dialog" aria-labelledby="create Post {{$user->id}}"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="createPost">Post Message to {{$user->nickname}}</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="{{url("/posts/create")}}" method="post">
              {{ csrf_field() }}
              <div class="modal-body">
                 <div class="form-group row">
                    <div class="col">
                       <textarea class="form-control form-control-sm my-align" name="post" rows="10"></textarea>
                    </div>
                 </div>
              </div>
              <div class="modal-footer">
                 <input type="hidden" name="user_id" value="{{$user->id}}">
                 <input class="btn btn-primary" type="submit" name="create" value="Create">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
