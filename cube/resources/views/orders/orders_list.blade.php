@extends('layouts.app')

@section('title')
Orders List
@endsection

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col">
           <table class="table table-hover table-sm text-center my-table">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">Received</th>
                  <th scope="col">SO#</th>
                  <th scope="col">Customer Name</th>
                  <th scope="col">PO#</th>
                  <th scope="col">Tags</th>
                  <th scope="col" class="my-align">Notes</th>
                  <th style="width: 12%" scope="col">Status</th>
                  <th style="width: 10%"scope="col">Actions</th>
                </tr>
              </thead>
              <tbody>
                 @foreach($user->orders as $order)
                 <tr id="showRow{{$order->id}}">
                    <td data-title="Received Date"><small>{{$order->received_date}}</small></td>
                    <td data-title="Sales Order Number"><strong>{{$order->so_num}}</strong></td>
                    <td data-title="Customer Name">{{$order->get_customer->name}}</td>
                    <td data-title="Purchase Order Number">{{$order->po_num}}</td>
                    <td data-title="Tags">
                    @foreach($order->tags as $tag)
                      <a href="#" class="badge badge-primary">{{$tag->name}}</a>
                    @endforeach
                    </td>
                    <td data-title="Notes" class="my-align">{{$order->notes}}</td>
                    <td data-title="Status">{{$order->get_status->name}}</td>
                    <td data-title="Actions">
                      <button class="btn btn-info btn-sm editbutton" data-index="{{$order->id}}"><i class="fas fa-pen-square text-white"></i></button>
                      <button class="btn btn-danger btn-sm deletebutton" data-index="{{$order->id}}"><i class="fas fa-minus-circle text-white"></i></button>
                    </td>
                 </tr>
                 <form action="" method="post">
                 <tr id="editRow{{$order->id}}" class="hidden">
                    <td data-title="Received Date">
                       <input type="text" class="form-control form-control-sm text-center" value="{{$order->received_date}}">
                    </td>
                    <td data-title="Sales Order Number">
                       <input type="text" class="form-control form-control-sm text-center" value="{{$order->so_num}}">
                    </th>
                    <td data-title="Customer Name">
                       <input type="text" class="form-control form-control-sm text-center" value="{{$order->get_customer->name}}">
                    </td>
                    <td data-title="Purchase Order Number">
                       <input type="text" class="form-control form-control-sm text-center" value="{{$order->po_num}}">
                      </td>
                      <td data-title="Tags">
                       <input type="text" class="form-control form-control-sm text-center" value="@foreach($order->tags as $tag){{$tag->name}} @endforeach">
                    </td>
                    <td data-title="Notes" class="my-align">
                       <textarea class="form-control form-control-sm my-align" rows="1" id="note">{{$order->notes}}</textarea>
                    </td>
                    <td data-title="Status">
                      <select class="form-control form-control-sm" name="state" id="state_change">
                         @foreach($order_states as $order_state)
                         @if($order_state->name == $order->get_status->name)
                         <option value="{{$order->get_status->name}}" selected>{{$order->get_status->name}}</option>
                         @else
                         <option value="{{$order_state->name}}">{{$order_state->name}}</option>
                         @endif
                         @endforeach
                        </select>
                      </td>
                      <td data-title="Actions">
                        <div class="row">
                          <div class="col text-center">
                            <!-- <button class="btn btn-success btn-sm savebutton" data-index="{{$order->id}}" onclick="document.getElementById('updateRow').submit()"><i class="fas fa-save text-white"></i></button> -->
                            <a class="btn btn-success btn-sm savebutton center-block" href=""><i class="fas fa-check-circle text-white"></i></a>
                            <!-- <button class="btn btn-success btn-sm savebutton" data-index="{{$order->id}}"><i class="fas fa-save text-white"></i></button> -->
                            <button class="btn btn-danger btn-sm deletebutton center-block" data-index="{{$order->id}}"><i class="fas fa-times-circle text-white"></i></button>
                          </div>
                        </div>
                    </td>
                  </tr>
                  </form>
                 @endforeach
              </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
