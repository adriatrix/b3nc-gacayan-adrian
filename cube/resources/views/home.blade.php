@extends('layouts.app')

@section('title')
Home
@endsection

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col">
      <div class="jumbotron">
        <h1 class="display-4">Hello, world!</h1>
        <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
        <hr class="my-4">
        <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
        <p class="lead">
          <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
        </p>
      </div>
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col">
      <div class="row justify-content-center">
        <div class="col-sm col-md-12 col-lg-6">
          <table class="table table-hover table-sm my-table text-center table-bordered">
            <thead class="thead-dark">
              <tr>
                <th style="width: 3%" scope="col"><i class="fas fa-tasks"></i></th>
                <th scope="col">SO#</th>
                <th scope="col">Customer Name</th>
                <th scope="col">PO#</th>
                <th style="width: 12%" scope="col">Status</th>
              </tr>
            </thead>
            <tbody id="">
              @foreach($orders as $order)
              @if($order->get_status->name == 'Received' OR $order->get_status->name == 'Entered' OR $order->get_status->name == 'On Hold')
                <tr>
                  @if ($order->tasks()->where('task_state_id',$tasks_states_id)->count())
                  <td data-title="Tasks" class="align-middle">
                    <button class="badge badge-pill badge-warning text-hand" disabled>{{$order->tasks()->where('task_state_id',$tasks_states_id)->count()}}</button>
                  </td>
                  @else
                  <td></td>
                  @endif
                  <td data-title="SO#" class="align-middle"><a href='{{url("/orders/$order->id")}}'><strong class="text-emerson">{{$order->so_num}}</strong></a></td>
                  <td data-title="Customer" class="align-middle">{{$order->get_customer->name}}</td>
                  <td data-title="PO#" class="align-middle">{{$order->po_num}}</td>
                  <td data-title="Status" class="align-middle">{{$order->get_status->name}}</td>
                  </td>
                </tr>
                @endif
                @endforeach
              </tbody>
            </table>
          </div>
          <div class="col-sm col-md-12 col-lg-6">
            <table class="table table-hover table-sm my-table text-center table-bordered">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">Due</i></th>
                  <th scope="col">SO#</th>
                  <th scope="col">Task</th>
                  <th scope="col">Notes</th>
                </tr>
              </thead>
              <tbody id="">
                @foreach($tasks as $task)
                  <tr>
                    <td data-title="SO#" class="align-middle">{{$task->due_date}}</td>
                    @php
                      $order_id = $task->get_order->id;
                    @endphp
                    <td data-title="SO#" class="align-middle"><a href='{{url("/orders/$order_id")}}'><strong class="text-emerson">{{$task->get_order->so_num}}</strong></a></td>
                    <td data-title="Task" class="align-middle">{{$task->description}}</td>
                    <td data-title="Notes" class="align-middle">{{$task->notes}}</td>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>

            </div>
          </div>
        </div>
      </div>
    </div>
    @endsection
