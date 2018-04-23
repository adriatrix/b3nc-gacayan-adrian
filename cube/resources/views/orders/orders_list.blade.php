@extends('layouts.app')

@section('title')
Orders List
@endsection

@section('content')
<div class="container">
   <div class="row justify-content-center mb-5">
      <div class="col">
         <div class="form-row">
            <div class="col-2.5 mb-1">
               <!-- <button class="btn btn-outline-dark createbutton" data-toggle="modal" data-target="#createOrderModal">Create Order</button> -->
               <a class="btn btn-secondary" href='{{url("/home")}}'>Home</a>
            </div>
            <div class="col-sm-1 col-md-6 col-lg-6 mb-1">
            </div>
            <div class="col">
               <input type="text" class="form-control" id="orderSearch" name="search" placeholder="Search Orders" autocomplete="off">
            </div>
         </div>
      </div>
   </div>
   <div class="row justify-content-center">
      <div class="col">
         <div class="h4 border border-info p-1 rounded" id="numberList">
            @foreach($orders as $order)
            <button data-index="{{$order->id}}" class="badge badge-info mb-1 orderbutton" data-toggle="button" aria-pressed="false" autocomplete="off">{{$order->so_num}} - {{$order->po_num}}</button>&nbsp;
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
            <tbody id="orderList">
               <tr>
                  <td colspan="7">
                     <p class="h4">Select an order from the list above...</p>
                  </td>
               </tr>
            </tbody>
         </table>

         @foreach($orders as $order)
         <div class="modal fade" id="editOrderModal{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="edit Order {{$order->id}}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="editOrder{{$order->id}}">Edit SO# {{$order->so_num}}</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <form action="{{url("/orders/edit")}}" method="post">
                     {{ csrf_field() }}
                     <div class="modal-body">
                        <div class="form-group row">
                           <label class="col-sm-4 col-form-label form-control-sm font-weight-bold">Sales Order No.:</label>
                           <div class="col-sm-8">
                              <input type="text" class="form-control" value="{{$order->so_num}}" name="so_num" required>
                           </div>
                        </div>
                        <div class="form-group row">
                           <label class="col-sm-4 col-form-label form-control-sm font-weight-bold">Customer Name:</label>
                           <div class="col-sm-8">
                              <input type="text" class="form-control" value="{{$order->get_customer->name}}" name="customer" required>
                           </div>
                        </div>
                        <div class="form-group row">
                           <label class="col-sm-4 col-form-label form-control-sm font-weight-bold">Purchase Order No.:</label>
                           <div class="col-sm-8">
                              <input type="text" class="form-control" value="{{$order->po_num}}" name="po_num" required>
                           </div>
                        </div>
                        <div class="form-group row">
                           <label class="col-sm-4 col-form-label form-control-sm font-weight-bold">Tags:</label>
                           <div class="col-sm-8">
                              <input type="text" class="form-control" value="@foreach($order->tags as $tag){{$tag->name}} @endforeach" name="tags">
                              <small class="form-text text-muted">Separate each tags by a space.</small>
                           </div>
                        </div>
                        <div class="form-group row">
                           <label class="col-sm-4 col-form-label form-control-sm font-weight-bold">Notes:</label>
                           <div class="col-sm-8">
                              <textarea class="form-control form-control-sm my-align" rows="4" name="notes" id="note">{{$order->notes}}</textarea>
                           </div>
                        </div>
                        <div class="form-group row">
                           <label class="col-sm-4 col-form-label form-control-sm font-weight-bold">Order Status:</label>
                           <div class="col-sm-8">
                              <select class="form-control" name="status" id="state_change">
                                 @foreach($order_states as $order_state)
                                 @if($order_state->name == $order->get_status->name)
                                 <option value="{{$order->get_status->name}}" selected>{{$order->get_status->name}}</option>
                                 @else
                                 <option value="{{$order_state->name}}">{{$order_state->name}}</option>
                                 @endif
                                 @endforeach
                              </select>
                           </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                           <label class="col-sm-4 col-form-label form-control-sm font-weight-bold">Received Date/Time:</label>
                           <div class="col-sm-8">
                              <input type="text" class="form-control form-control-sm" value="{{$order->received_date}}" name="received_date" required>
                           </div>
                        </div>
                        @if ($order->booked_date)
                        <div class="form-group row">
                           <label class="col-sm-4 col-form-label form-control-sm font-weight-bold">Booked Date/Time:</label>
                           <div class="col-sm-8">
                              <input type="text" class="form-control form-control-sm" value="{{$order->booked_date}}" name="booked_date" required>
                           </div>
                        </div>
                        @endif
                     </div>
                     <div class="modal-footer">
                        <input type="hidden" id="order_id" name="order_id" value="{{$order->id}}">
                        <input class="btn btn-primary" type="submit" name="edit" value="Update">
                     </div>
                  </form>
               </div>
            </div>
         </div>
         @endforeach


      </div>
   </div>
</div>
@endsection
