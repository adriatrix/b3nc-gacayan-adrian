@extends('layouts.app')

@section('title')
Home
@endsection

@section('content')
<div class="container">
  <div class="row justify-content-center mb-2">
    <div class="col">
      <ul class="nav nav-tabs nav-fill" id="myTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="dashboard-tab" data-toggle="tab" href="#dashboard" role="tab" aria-controls="dashboard" aria-selected="false">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
        </li>
      </ul>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
          <div class="jumbotron">
            <h1 class="display-4">Hello, {{$user}}!</h1>
            <p class="lead">Welcome to the Cube - this is a simple yet practical Order Management System (OMS) app.</p>
            <p></p>
          </div>
        </div>
        <div class="tab-pane fade" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
          <div class="jumbotron">
            <h1 class="display-4">Dashboard</h1>
            <p class="lead">You will see your stats and reports here...</p>
            <p></p>
          </div>
        </div>
        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
          <div class="jumbotron">
            <h1 class="display-4">Contact Page</h1>
            <p class="lead">Please don't hesitate to contact me if you questions or need help in using the site.</p>
            <p></p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col">
      <div class="row justify-content-center">
        <div class="col-sm col-md-12 col-lg-6">
           <div class="d-flex justify-content-between">
             <span class="h4 highlight-red">Pending Orders</span>
             <button class="btn btn-outline-dark createbutton mb-1" data-toggle="modal" data-target="#createOrderModal">Create Order</button>
          </div>
          <table class="table table-hover table-sm my-table text-center table-bordered">
            <thead class="thead-dark">
              <tr>
                <th style="width: 3%" scope="col"><i class="fas fa-tasks"></i></th>
                <th scope="col">SO#</th>
                <th scope="col">PO#</th>
                <th style="width: 15%" scope="col">Status</th>
                <th scope="col">Elapse</th>
              </tr>
            </thead>
            <tbody id="">
              @foreach($orders as $order)
              @if($order->get_status->name == 'Received' OR $order->get_status->name == 'Entered' OR $order->get_status->name == 'On Hold')
                <tr>
                  @if ($order->tasks()->where('task_state_id',$tasks_states_id)->count())
                  <td data-title="Tasks" class="align-middle">
                    <button class="badge badge-pill badge-warning text-hand taskbutton">{{$order->tasks()->where('task_state_id',$tasks_states_id)->count()}}</button>
                  </td>
                  @else
                  <td></td>
                  @endif
                  <td data-title="SO#" class="align-middle text-emerson font-weight-bold"><a value="{{$order->so_num}}" href='{{url("/orders/$order->id")}}'>{{$order->so_num}}</a></td>
                  <td data-title="PO#" class="align-middle">{{$order->po_num}}</td>
                  <td data-title="Status" class="align-middle">{{$order->get_status->name}}</td>
                  @php
                    $rdate = Carbon\Carbon::parse($order->received_date,'America/Chicago')->diffInSeconds(Carbon\Carbon::now('America/Chicago'), false);
                    if (gmdate('z', $rdate) == 1) {
                        $showdate = gmdate('z',$rdate).' day';
                        $styledate = 'bg-danger text-white';
                    } elseif (gmdate('z', $rdate) > 1) {
                      $showdate = gmdate('z',$rdate).' days';
                      $styledate = 'bg-danger text-white';
                    } else {
                      $showdate = gmdate('H:i:s',$rdate);
                      $styledate = 'bg-success text-white';
                    }
                  @endphp
                  <td data-title="Elapse" class="align-middle {{$styledate}}">{{$showdate}}</td>
                </tr>
                @endif
                @endforeach
              </tbody>
            </table>
          </div>
          <div class="col-sm col-md-12 col-lg-6">
             <div class="d-flex justify-content-between">
                <span class="h4 highlight-yellow">Pending Tasks</span>
                <button class="btn btn-outline-dark createbutton mb-1" data-toggle="modal" data-target="#createTaskModal">Create Task</button>
             </div>
            <table class="table table-hover table-sm my-table text-center table-bordered">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">SO#</th>
                  <th scope="col">Task</th>
                  <th scope="col">Notes</th>
                  <th scope="col">Due</th>
                </tr>
              </thead>
              <tbody id="">
                @foreach($orders as $order)
                 @if(count($order->tasks) > 0)
                 @foreach($order->tasks as $task)
                  @if($task->get_status->name == 'Pending')
                  <tr>
                    <td data-title="SO#" class="align-middle"><a href='{{url("/orders/$order->id")}}'><strong class="text-emerson">{{$order->so_num}}</strong></a></td>
                    <td data-title="Task" class="align-middle">{{$task->description}}</td>
                    @if ($task->notes)
                       <td data-title="Notes" class="align-middle">{{$task->notes}}</td>
                    @else
                       <td data-title="Notes" class="align-middle">&nbsp;</td>
                    @endif
                    <td data-title="Due" class="align-middle">{{$task->due_date}}</td>
                  </tr>
                  @endif
                  @endforeach
                  @endif
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
          <!-- start of modal for creating new order -->
          <div class="modal fade" id="createOrderModal" tabindex="-1" role="dialog" aria-labelledby="create new Order" aria-hidden="true">
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
                               <input type="text" class="form-control" value="" name="customer" id="newcustomer" autocomplete="off" required>
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
                         <input class="btn btn-primary" type="submit" name="create" value="Create">
                      </div>
                   </form>
                </div>
             </div>
          </div>
          <!-- end of modal for creating new order -->
          <!-- start of modal for creating new task -->
          <div class="modal fade" id="createTaskModal" tabindex="-1" role="dialog" aria-labelledby="create new Task" aria-hidden="true">
             <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                   <div class="modal-header">
                      <h5 class="modal-title" id="createTask">Create Task</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                      </button>
                   </div>
                   <form action='{{url("/tasks/add")}}' method="post">
                      {{ csrf_field() }}
                      <div class="modal-body">
                         <div class="form-group row">
                            <label class="col-sm-4 col-form-label form-control-sm font-weight-bold">Sales Order No.:</label>
                            <div class="col-sm-8">
                               <input type="text" class="form-control" value="" name="so_num" required>
                            </div>
                         </div>
                         <div class="form-group row">
                            <label class="col-sm-4 col-form-label form-control-sm font-weight-bold">Task:</label>
                            <div class="col-sm-8">
                               <input type="text" class="form-control" value="" name="description" id="newcustomer" autocomplete="off" required>
                            </div>
                         </div>
                         <div class="form-group row">
                            <label class="col-sm-4 col-form-label form-control-sm font-weight-bold">Due date:</label>
                            <div class="col-sm-8">
                               <input type="date" class="form-control" value="@php echo date('Y-m-d'); @endphp" name="due_date" required>
                            </div>
                         </div>
                         <div class="form-group row">
                            <label class="col-sm-4 col-form-label form-control-sm font-weight-bold">Notes:</label>
                            <div class="col-sm-8">
                               <input type="text" class="form-control form-control-sm" value="" name="notes" required>
                            </div>
                         </div>
                      </div>
                      <div class="modal-footer">
                         <input class="btn btn-primary" type="submit" name="create" value="Create">
                      </div>
                   </form>
                </div>
             </div>
          </div>
          <!-- end of modal for creating new task -->

        </div>
      </div>
    </div>
    @endsection
