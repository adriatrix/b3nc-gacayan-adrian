@extends('layouts.app')

@section('title')
Customers List
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
               <input type="text" class="form-control" id="customerSearch" name="search" placeholder="Search Customers" autocomplete="off">
            </div>
         </div>
      </div>
   </div>
   <div class="row justify-content-center">
      <div class="col">
         <div class="h4 border border-info p-1 rounded" id="customerList">
            @foreach($customers as $customer)
            <button data-index="{{$customer->id}}" class="badge badge-info mb-1 customerbutton" data-toggle="button" aria-pressed="false" autocomplete="off">{{$customer->name}}</button>&nbsp;
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
                     <th scope="col">Customer Name</th>
                     <th scope="col">PO#</th>
                     <th scope="col">Tags</th>
                     <th style="width: 12%" scope="col">Status</th>
                     <th style="width: 30%" scope="col" class="my-align">Notes</th>
                  </tr>
               </thead>
               <tbody id="customerOrderList">
                  <tr>
                     <td colspan="7">
                        <p class="h4">Select a customer from the list above...</p>
                     </td>
                  </tr>
               </tbody>
            </table>
         </div>
      </div>
</div>
@endsection
