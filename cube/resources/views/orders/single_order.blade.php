@extends('layouts.app')

@section('title')
Order # {{$order->so_num}}
@endsection

@section('content')
<div class="container">
  <div class="row justify-content-center mb-5">
    <div class="col">
      <div class="d-flex justify-content-between">
        <a class="btn btn-secondary" href='{{url("/home")}}'>Home</a>
        <button class="btn btn-dark editbutton" value="{{$order->id}}" data-index="{{$order->id}}" data-toggle="modal" data-target="#editOrderModal">Edit</button>
        <!-- <a class="btn btn-secondary" href='{{   url()->previous() }}'>Edit</a> -->
      </div>
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col">
      <h1 class="display-5 text-center">Sales Order: {{$order->so_num}} <span class="h4 align-text-top">@foreach($order->tags as $tag)<span class="badge badge-primary ml-1">{{$tag->name}}</span>@endforeach</span></h1>
      <div class="card">
        <div class="text-center card-body">
          <div class="form-group row">
            <label class="col-lg-2 col-form-label">Customer:</label>
            <div class="col-lg-4">
              <div class="input-group">
                <input type="text" class="form-control my-align text-truncate" value="{{$order->get_customer->name}}" disabled>
                <div class="input-group-append">
                  <div class="input-group-text"><a class="text-emerson" href='{{url("/customers/$order->customer_id")}}'><i class="far fa-folder-open"></i></a></div>
                </div>
              </div>
              <!-- <span class="align-middle"><a class="text-emerson" href='{{url("/customers/$order->customer_id")}}'>{{$order->get_customer->name}}</a></span> -->
            </div>
            <label class="col-lg-2 col-form-label">PO no.:</label>
            <div class="col-lg-4">
              <input type="text" class="form-control my-align text-truncate" value="{{$order->po_num}}" disabled>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-lg-2 col-form-label">Received:</label>
            <div class="col-lg-4">
              <input type="text" class="form-control my-align text-truncate" value="{{$order->received_date}}" disabled>
            </div>
            @if($order->booked_date)
            <label class="col-lg-2 col-form-label">Booked:</label>
            <div class="col-lg-4">
              <input type="text" class="form-control my-align text-truncate" value="{{$order->po_num}}" disabled>
            </div>
            @endif
          </div>
          <div class="form-group row">
            <label class="col-lg-2 col-form-label">Created:</label>
            <div class="col-lg-4">
               <div class="input-group">
                  <input type="text" class="form-control my-align text-truncate" value="{{$order->get_user->name}}" disabled>
                  <div class="input-group-append">
                     @php $userId = $order->get_user->id; @endphp
                     <div class="input-group-text"><a class="text-emerson" href='{{url("/users/$userId")}}'><i class="far fa-folder-open"></i></a></div>
                  </div>
               </div>
            </div>
            <label class="col-lg-2 col-form-label">Status:</label>
            <div class="col-lg-4">
              <input type="text" class="form-control my-align text-truncate" value="{{$order->get_status->name}}" disabled>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-lg-2 col-form-label">Notes:</label>
            <div class="col-lg-10">
              <textarea class="form-control my-align text-truncate" rows="3" disabled>{{$order->notes}}</textarea>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row justify-content-center mt-3">
    <h4 class="highlight-yellow">Tasks List</h4>
  </div>
  <div class="row justify-content-center">
    <div class="col">
      <div class="card">
        <form action='{{url("/orders/task/$order->id")}}' method="post">
          {{ csrf_field() }}
          <div class="card-header pb-0">
            <div class="form-group row">
              <div class="col-sm-1">
                <label class="col-sm-1 col-form-label">+</label>
              </div>
              <div class="col-sm-3">
                <input type="text" class="task-input form-control text-emerson" value="" name="description" placeholder="Enter Task" required>
              </div>
              <div class="col-sm-5">
                <input type="text" class="task-input form-control text-emerson" value="" name="notes" placeholder="Enter Notes">
              </div>
              <div class="col-sm-3">
                <input type="date" class="task-input form-control text-emerson" value="@php echo date('Y-m-d'); @endphp" name="due_date" required>
              </div>
              <input type="submit" style="position: absolute; left: -9999px; width: 1px; height: 1px;" tabindex="-1" />
            </div>
         </div>
          <div class="card-body">
            <table class="table table-hover my-table table-striped">
              <thead>
                <tr>
                  <th class="border-0" style="width: 8%"></th>
                  <th class="border-0" style="width: 26%"></th>
                  <th class="border-0" style="width: 43%"></th>
                  <th class="border-0" style="width: 25%"></th>
                </tr>
              </thead>
              <tbody>
                @foreach($tasks as $task)
                @if ($task->get_status->name == 'Done')
                <tr class="text-secondary" style="text-decoration:line-through;">
                  <td class="align-middle">
                    <input type="checkbox" class="task-input form-control-md" data-index="{{$task->id}}" checked>
                  </td>
                  <td class="align-middle">{{$task->description}}</td>
                  <td class="align-middle">{{$task->notes}}</td>
                  <td class="align-middle">{{$task->due_date}}</td>
                </tr>
                @else
                <tr>
                  <td>
                     <input type="checkbox" class="task-input form-control-md" data-index="{{$task->id}}">
                  </td>
                  <td>{{$task->description}}</td>
                  <td>{{$task->notes}}</td>
                  <td>{{$task->due_date}}</td>
                </tr>
                @endif
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </form>
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col">
      <div class="modal fade" id="editOrderModal" tabindex="-1" role="dialog" aria-labelledby="edit Order {{$order->id}}"
        aria-hidden="true">
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
                      @foreach($order_states as $order_state) @if($order_state->name == $order->get_status->name)
                      <option value="{{$order->get_status->name}}" selected>{{$order->get_status->name}}</option>
                      @else
                      <option value="{{$order_state->name}}">{{$order_state->name}}</option>
                      @endif @endforeach
                    </select>
                  </div>
                </div>
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
                <input type="hidden" name="order_id" value="{{$order->id}}">
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
