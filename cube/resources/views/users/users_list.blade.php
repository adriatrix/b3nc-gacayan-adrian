@extends('layouts.app')

@section('title')
Users List
@endsection

@section('content')
<div class="container">
   <div class="row justify-content-center mb-5">
      <div class="col">
         <div class="form-row">
            <div class="col-2 mb-1">
               <!-- <button class="btn btn-dark createbutton form-control" data-toggle="modal" data-target="#createCustomerModal">Create new Customer</button> -->
               <a class="btn btn-secondary" href='{{url("/home")}}'>Home</a>
            </div>
            <div class="col-sm-1 col-md-6 col-lg-6 mb-1">
            </div>
            <div class="col">
               <input type="text" class="form-control" id="userSearch" name="search" placeholder="Search Users" autocomplete="off">
            </div>
         </div>
      </div>
   </div>
   <div class="row justify-content-center">
      <div class="col">
         <div class="h4 border border-info p-1 rounded" id="userList">
            @foreach($users as $user)
            <button data-index="{{$user->id}}" class="badge badge-info mb-1 userbutton" data-toggle="button" aria-pressed="false" autocomplete="off">{{$user->name}} aka {{$user->nickname}}</button>&nbsp;
            @endforeach
            </div>
         </div>
      </div>
      <div class="row justify-content-center">
         <div class="col">
            <table class="table table-hover table-sm my-table text-center table-bordered">
               <thead class="thead-dark">
                  <tr>
                     <th style="width: 3%" scope="col"><i class="fas fa-tasks"></i></th>
                     <th scope="col">SO#</th>
                     <th scope="col">Created by</th>
                     <th scope="col">PO#</th>
                     <th scope="col">Tags</th>
                     <th style="width: 12%" scope="col">Status</th>
                     <th style="width: 30%" scope="col" class="my-align">Notes</th>
                  </tr>
               </thead>
               <tbody id="userOrderList">
                  <tr>
                     <td colspan="7">
                        <p class="h4">Select a user from the list above...</p>
                     </td>
                  </tr>
               </tbody>
            </table>
         </div>
      </div>
</div>
@endsection
