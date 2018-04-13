@extends('layouts.app')

@section('title')
Tasks List
@endsection

@section('content')
<div class="container">
   <div class="row">
      <div class="col">
         <button class="btn btn-dark btn-sm createbutton" data-toggle="modal" data-target="#createOrderModal"><i class="fas fa-plus text-white"></i></button>
      </div>
   </div>
   <div class="row">
      <div class="col">
         <p> </p>
      </div>
   </div>
   <div class="row justify-content-center">
      <div class="col">
         <table class="table table-hover table-sm my-table text-center table-bordered">
            <thead class="thead-dark">
               <tr>
                  <th style="width: 3%" scope="col"><i class="fas fa-tasks"></i></th>
                  <th scope="col">SO# <button class="badge badge-secondary float-right"><i class="fas fa-sort"></i></button></th>
                  <th scope="col">Customer Name <button class="badge badge-secondary float-right"><i class="fas fa-sort"></i></button></th>
                  <th scope="col">PO# <button class="badge badge-secondary float-right"><i class="fas fa-sort"></i></button></th>
                  <th scope="col">Tags <button class="badge badge-secondary float-right"><i class="fas fa-sort"></i></button></th>
                  <th style="width: 12%" scope="col">Status <button class="badge badge-secondary float-right"><i class="fas fa-sort"></i></button></th>
                  <th style="width: 30%" scope="col" class="my-align">Notes</th>
                  <th style="width: 3%" scope="col">Actions</th>
               </tr>
            </thead>
            <tbody>
               @foreach($orders as $order)
                     @if (count($order->tasks) > 0)
                     <tr id="showRow{{$order->id}}">
                     <td data-title="Tasks" class="align-middle">
                        <button class="badge badge-pill badge-warning taskbutton" disabled>{{count($order->tasks)}}</button>
                     </td>
                     <td data-title="SO#" class="align-middle"><strong>{{$order->so_num}}</strong></td>
                     <td data-title="Customer" class="align-middle">{{$order->get_customer->name}}</td>
                     <td data-title="PO#" class="align-middle">{{$order->po_num}}</td>
                     @if (count($order->tags))
                     <td data-title="Tags" class="align-middle">
                        @foreach($order->tags as $tag)
                        <a href="#" class="badge badge-primary">{{$tag->name}}</a>
                        @endforeach
                     </td>
                     @else
                     <td></td>
                     @endif
                     <td data-title="Status" class="align-middle">{{$order->get_status->name}}</td>
                     <td class="my-align align-middle">{{$order->notes}}
                     </td>
                     <td data-title="Actions" class="align-middle">
                        <button class="btn btn-info btn-sm editbutton center-block" value="{{$order->id}}" data-index="{{$order->id}}" data-toggle="modal" data-target="#editOrderModal{{$order->id}}"><i class="fas fa-pencil-alt text-white"></i></button>
                     </td>
                     </tr>
                     @foreach ($order->tasks as $task)
                     <tr class="showtask{{$order->id}} table-warning">
                        <td><i class="fas fa-caret-right"></i></td>
                        <td colspan="4" class="my-align"><strong>{{$task->description}}</strong></td>
                        <td>{{$task->get_status->name}}</td>
                        <td class="my-align">{{$task->notes}}</td>
                        <td>
                           <button class="btn btn-info btn-sm editbutton center-block" value="{{$order->id}}" data-index="{{$order->id}}" data-toggle="modal" data-target="#editOrderModal{{$order->id}}"><i class="fas fa-pencil-alt text-white"></i></button>
                        </td>
                     </tr>
                     @endforeach
                     @endif
                  @endforeach
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

            <div class="modal fade" id="createOrderModal" tabindex="-1" role="dialog" aria-labelledby="edit Order {{$order->id}}" aria-hidden="true">
               <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                     <div class="modal-header">
                        <h5 class="modal-title" id="createOrder">Create Order</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                        </button>
                     </div>
                     <form action='{{url("/orders/create")}}' method="post">
                        {{ csrf_field() }}
                        <div class="modal-body">
                           <div class="form-group row">
                              <label class="col-sm-4 col-form-label form-control-sm font-weight-bold">Sales Order No.:</label>
                              <div class="col-sm-8">
                                 <input type="text" class="form-control" value="" name="so_num" required>
                              </div>
                           </div>
                           <div class="form-group row">
                              <label class="col-sm-4 col-form-label form-control-sm font-weight-bold">Customer Name:</label>
                              <div class="col-sm-8">
                                 <input type="text" class="form-control" value="" name="customer" required>
                              </div>
                           </div>
                           <div class="form-group row">
                              <label class="col-sm-4 col-form-label form-control-sm font-weight-bold">Purchase Order No.:</label>
                              <div class="col-sm-8">
                                 <input type="text" class="form-control" value="" name="po_num" required>
                              </div>
                           </div>
                           <div class="form-group row">
                              <label class="col-sm-4 col-form-label form-control-sm font-weight-bold">Tags:</label>
                              <div class="col-sm-8">
                                 <input type="text" class="form-control" value="" name="tags">
                                 <small class="form-text text-muted">Separate each tags by a space.</small>
                              </div>
                           </div>
                           <div class="form-group row">
                              <label class="col-sm-4 col-form-label form-control-sm font-weight-bold">Notes:</label>
                              <div class="col-sm-8">
                                 <textarea class="form-control form-control-sm my-align" name="notes" rows="4"></textarea>
                              </div>
                           </div>
                           <input type="hidden" class="form-control" name="status" value="Received">
                           <hr>
                           <div class="form-group row">
                              <label class="col-sm-4 col-form-label form-control-sm font-weight-bold">Received Date/Time:</label>
                              <div class="col-sm-8">
                                 <input type="text" class="form-control form-control-sm" value="" name="received_date" required>
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
