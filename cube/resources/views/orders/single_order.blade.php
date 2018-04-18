@extends('layouts.app')

@section('title')
Order # {{$order->so_num}}
@endsection

@section('content')
<div class="container">
   <div class="row justify-content-center mb-5">
      <div class="col-sm-10">
         <div class="d-flex justify-content-between">
            <a class="btn btn-secondary" href='{{url("/orders")}}'>Back to Orders</a>
         </div>
      </div>
   </div>
   <div class="row justify-content-center">
      <div class="col-sm-10">
         <div class="text-center">
           <h1 class="display-5"><span class="border-bottom">Order # {{$order->so_num}}</span></h1>
           <p class="card-text">{{$order->get_customer->name}} &nbsp;&nbsp;<a class="text-info" href='{{url("/customers/$order->customer_id")}}'><i class="fas fa-folder-open"></i></a> - PO # {{$order->po_num}}</p>
         </div>
      </div>
   </div>
   <div class="row justify-content-center">
    <p>&nbsp;</p>
   </div>
   <div class="row justify-content-center">
      <div class="col-sm-10">
         <div class="card">
         <form class="" action='{{url("/orders/$order->id/task")}}' method="post">
            {{ csrf_field() }}
            <div class="card-header pb-0">
               <div class="form-group row">
                <div class="col-sm-1">
                </div>
                <div class="col-sm-4">
                    <input type="text" class="task-input form-control text-info" value="" name="description" placeholder="Enter Task" required>
                </div>
                <div class="col-sm-4">
                    <input type="text" class="task-input form-control text-info" value="" name="notes" placeholder="Enter Notes">
                </div>
                <div class="col-sm-3">
                    <input type="date" class="task-input form-control text-info" value="@php echo date('Y-m-d'); @endphp" name="due_date" required>
                </div>
                <input type="submit" style="position: absolute; left: -9999px; width: 1px; height: 1px;" tabindex="-1" />
                </div>
            </div>
           <div class="card-body">
                <table class="table table-hover my-table table-striped">
                    <thead>
                    <tr>
                        <th style="width: 8%"></th>
                        <th style="width: 34%"></th>
                        <th style="width: 35%"></th>
                        <th style="width: 25%"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($order->tasks as $task)
                    @if ($task->get_status->name == 'Done')
                    <tr style="text-decoration:line-through;">
                    <td>
                        <input type="checkbox" class="task-input form-control-md" data-index="{{$task->id}}" checked>
                    </td>
                    <td>{{$task->description}}</td>
                    <td>{{$task->notes}}</td>
                    <td>{{$task->due_date}}</td>
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
                    <!-- <hr> -->
                    @endforeach
                    </tbody>
                <table>
           </div>
        </div>
         </form>
         <!-- <hr> -->
      </div>
   </div>
   <div class="row justify-content-center">
      <div class="col">
      </div>
   </div>
</div>
@endsection
