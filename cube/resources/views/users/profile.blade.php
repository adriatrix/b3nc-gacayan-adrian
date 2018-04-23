@extends('layouts.app')

@section('title')
<span class="text-uppercase">{{$user->nickname}}</span>'s Profile page
@endsection

@section('content')
<div class="container">
  <div class="row justify-content-center mb-5">
    <div class="col">
      <div class="d-flex justify-content-between">
        <a class="btn btn-secondary" href='{{url("/orders")}}'>Back</a>
        <button class="btn btn-dark editbutton" value="{{$user->id}}" data-index="{{$user->id}}" data-toggle="modal" data-target="#editUserModal">Edit</button>
      </div>
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col">
      <h1 class="display-5 text-center">{{$user->nickname}} <span class="h6 align-text-middle">joined: {{$user->created_at}}</span></h1>
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
    <div class="col">
      <div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="edit User {{$user->id}}"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="editUser">Edit User {{$user->nickname}}</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="{{url("/users/edit")}}" method="post">
              {{ csrf_field() }}
              <div class="modal-body">
                <!-- <div class="form-group row">
                  <label class="col-sm-4 col-form-label form-control-sm font-weight-bold">Name:</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" value="{{$user->name}}" name="name" disabled>
                  </div>
                </div> -->
                <!-- <div class="form-group row">
                  <label class="col-sm-4 col-form-label form-control-sm font-weight-bold">Purchase Order No.:</label>
                  <div class="col-sm-8">
                    <input type="email" class="form-control" value="{{$user->email}}" name="email" disabled>
                  </div>
                </div> -->
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label form-control-sm font-weight-bold">Nickname:</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" value="{{$user->nickname}}" name="nickname" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label form-control-sm font-weight-bold">Password:</label>
                  <div class="col-sm-8">
                    <input type="password" class="form-control" value="••••••••" name="password">
                  </div>
                </div>
                <!-- <div class="form-group row">
                  <label class="col-sm-4 col-form-label form-control-sm font-weight-bold">Role:</label>
                  <div class="col-sm-8">
                    <select class="form-control form-control-sm my-align" name="role" disabled>
                      <option value="Order Admin" selected></option>
                    </select>
                  </div>
                </div> -->
                <!-- <div class="form-group row">
                  <label class="col-sm-4 col-form-label form-control-sm font-weight-bold">Team:</label>
                  <div class="col-sm-8">
                    <select class="form-control" name="team" id="">
                      @php
                        $teams = array("name"=>"Gas Chromatograph", "name"=>"Flame and Gas", "name"=>"Instruments Domestic", "name"=>"Instruments International");
                      @endphp
                      @foreach($teams as $t => $team)
                      @if($team == $user->team)
                      <option value="{{$user->team}}" selected>{{$user->team}}</option>
                      @else
                      <option value="{{$team}}">{{$team}}</option>
                      @endif
                      @endforeach
                    </select>
                  </div>
                </div> -->
              </div>
              <div class="modal-footer">
                <input type="hidden" name="user_id" value="{{$user->id}}">
                <input class="btn btn-primary" type="submit" name="edit" value="Update">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
