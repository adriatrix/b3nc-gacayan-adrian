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
                  <th style="width: 10%" scope="col">SO#</th>
                  <th style="width: 20%" scope="col">Customer Name</th>
                  <th style="width: 15%" scope="col">PO#</th>
                  <!-- <th scope="col">Created by</th> -->
                  <th style="width: 30%" scope="col">Notes</th>
                  <th style="width: 12%" scope="col">Status</th>
                  <th style="width: 5%" scope="col">Actions</th>
                </tr>
              </thead>
              <tbody>
                 @foreach($user->orders as $order)
                 <tr id="showRow{{$order->id}}">
                    <td data-title="Received Date"><small>{{$order->created_at}}</small></td>
                    <td data-title="Sales Order Number"><strong>{{$order->so_num}}</strong></td>
                    <td data-title="Customer Name">{{$order->get_customer->name}}</td>
                    <td data-title="Purchase Order Number">{{$order->po_num}}</td>
                    <!-- <td>{{$order->get_user->name}}</td> -->
                    <td data-title="Notes">{{$order->notes}}</td>
                    <td data-title="Status">{{$order->get_status->name}}</td>
                    <td data-title="Actions"><button class="btn btn-info btn-sm form-control editbutton" data-index="{{$order->id}}">Edit</button></td>
                 </tr>
                 <tr id="editRow{{$order->id}}" class="hidden">
                    <td data-title="Received Date">
                       <input type="text" class="form-control form-control-sm text-center" value="{{$order->created_at}}">
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
                    <td data-title="Notes">
                       <textarea class="form-control form-control-sm text-center" rows="1" id="note">{{$order->notes}}</textarea>
                    </td>
                    <form class="" action="" method="post">
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
                          <button type="submit" class="btn btn-success btn-sm form-control savebutton" data-index="{{$order->id}}">Save</button>
                       </td>
                    </form>
                 </tr>
                 @endforeach
              </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
