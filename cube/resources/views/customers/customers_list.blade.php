@extends('layouts.app')

@section('title')
Customers List
@endsection

@section('content')
<div class="container">
   <div class="row justify-content-center mb-5">
      <div class="col">
         <div class="form-row">
            <div class="col-2.5 mb-1">
               <button class="btn btn-dark createbutton form-control" data-toggle="modal" data-target="#createCustomerModal">Create new Customer</button>
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
         <div class="h5" id="customerList">
            @foreach($customers as $customer)
              <a href='{{url("/customers/$customer->id")}}' class="badge badge-info mb-1">{{$customer->name}}</a>&nbsp;
            @endforeach
         </div>

            <div class="modal fade" id="createCustomerModal" tabindex="-1" role="dialog" aria-labelledby="create new Customer" aria-hidden="true">
               <div class="modal-dialog" role="document">
                  <div class="modal-content">
                     <div class="modal-header">
                        <h5 class="modal-title" id="createOrder">Create Order</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                        </button>
                     </div>
                     <form action='{{url("/customers/create")}}' method="post">
                        {{ csrf_field() }}
                        <div class="modal-body">
                           <div class="form-group row">
                              <div class="col">
                                 <input type="text" class="form-control" value="" name="name" required>
                              </div>
                           </div>
                        </div>
                        <div class="modal-footer">
                           <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
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
