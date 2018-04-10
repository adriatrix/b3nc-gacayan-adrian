@extends('layouts.app')

@section('title')
Orders List
@endsection

@section('content')
<div class="container">
    <div class="row">
      <div class="col">
        <button class="btn btn-dark btn-sm createbutton"><i class="fas fa-plus text-white"></i></button>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <p> </p>
      </div>
    </div>
    <div class="row justify-content-center">
        <div class="col">
           <table class="table table-hover table-sm my-table text-center">
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
              <tbody>
                 @foreach($user->orders as $order)
                 <tr id="showRow{{$order->id}}">
                    @if (count($order->tasks))
                    <td data-title="Tasks">
                      <button class="badge badge-pill badge-warning taskbutton" data-index="{{$order->id}}">{{count($order->tasks)}}</button>
                    </td>
                    @else
                    <td></td>
                    @endif
                    <td data-title="SO#"><strong>{{$order->so_num}}</strong></td>
                    <td data-title="Customer">{{$order->get_customer->name}}</td>
                    <td data-title="PO#">{{$order->po_num}}</td>
                    @if (count($order->tags))
                       <td data-title="Tags">
                          @foreach($order->tags as $tag)
                          <a href="#" class="badge badge-primary">{{$tag->name}}</a>
                          @endforeach
                       </td>
                    @else
                       <td></td>
                    @endif
                    <td data-title="Status">
                       <span id="status{{$order->id}}" class="show-status" ondblclick="showStatus({{$order->id}})">{{$order->get_status->name}}</span>
                       <select id="showStatusOptions{{$order->id}}" class="show-status-options form-control form-control-sm" onchange="updateStatus({{$order->id}})" data-index="{{$order->id}}" name="status" style="display:none">
                          @foreach($order_states as $order_state)
                          @if($order_state->name == $order->get_status->name)
                          <option value="{{$order->get_status->name}}" selected>{{$order->get_status->name}}</option>
                          @else
                          <option value="{{$order_state->name}}">{{$order_state->name}}</option>
                          @endif
                          @endforeach
                        </select>
                    </td>
                    <td class="my-align">{{$order->notes}}</td>
                 </tr>
                 <form action="" method="post">
                 <tr id="editRow{{$order->id}}" class="hidden">
                    <td></td>
                    <td>
                       <input type="text" class="form-control form-control-sm text-center" value="{{$order->so_num}}">
                    </th>
                    <td>
                       <input type="text" class="form-control form-control-sm text-center" value="{{$order->get_customer->name}}">
                    </td>
                    <td>
                       <input type="text" class="form-control form-control-sm text-center" value="{{$order->po_num}}">
                    </td>
                    <td>
                       <input type="text" class="form-control form-control-sm text-center" value="{{$order->received_date}}">
                    </td>
                    <td>
                       <input type="text" class="form-control form-control-sm text-center" value="@foreach($order->tags as $tag){{$tag->name}} @endforeach">
                    </td>
                    <td>
                       <textarea class="form-control form-control-sm my-align" rows="1" id="note">{{$order->notes}}</textarea>
                    </td>
                    <td>
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
                  @foreach ($order->tasks as $task)
                  <tr class="showtask{{$order->id}} hidden table-warning">
                    <td><i class="fas fa-caret-right fa-2x"></i></td>
                    <td colspan="3" class="my-align bg-warning text-center"><strong>{{$task->description}}</strong></td>
                    <td><small>{{$task->due_date}}</small></td>
                    <td></td>
                    <td class="my-align">{{$task->notes}}</td>
                    <td>{{$task->get_status->name}}</td>
                    <td>
                      <button class="btn btn-info btn-sm editbutton" data-index="{{$order->id}}"><i class="fas fa-pencil-alt text-white"></i></button>
                      <button class="btn btn-danger btn-sm deletebutton" data-index="{{$order->id}}"><i class="fas fa-trash-alt text-white"></i></button>
                    </td>
                  </tr>
                  @endforeach
                 @endforeach
              </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
