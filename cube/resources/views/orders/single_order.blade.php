@extends('layouts.app')

@section('title')
Order # {{$order->so_num}}
@endsection

@section('content')
<div class="container">
   <div class="row justify-content-center">
      <div class="col">
      <div class="card text-center">
        <div class="card-body">
            <h5 class="card-title">Special title treatment</h5>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
        </div>   
      </div>
   </div>
   <div class="row justify-content-center">
    <p>&nbsp;</p>
   </div>
   <div class="row justify-content-center">
      <div class="col">
         <div class="card">
         <form class="" action='{{url("/orders/$order->id/task")}}' method="post">
            {{ csrf_field() }}
            <div class="card-header pb-0">
               <div class="form-group row">
                <div class="col-sm-1">
                    <!-- <i class="fas fa-plus text-secondary align-middle"></i> -->
                </div>
                <div class="col-sm-4">
                    <input type="text" class="task-input form-control text-primary" value="" name="description" placeholder="Enter Task" required>
                </div>
                <div class="col-sm-4">
                    <input type="text" class="task-input form-control text-primary" value="" name="notes" placeholder="Enter Notes">
                    <!-- <textarea class="form-control form-control-sm" rows="1" name="notes"></textarea> -->
                </div>
                <div class="col-sm-3">
                    <input type="date" class="task-input form-control text-primary" value="@php echo date('Y-m-d'); @endphp" name="due_date" required>
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
                    <tr>
                    <td>
                        <input type="checkbox" class="task-input form-control-md" data-index="{{$task->id}}" checked>
                    </td>
                    <td><del>{{$task->description}}</del></td>
                    <td><del>{{$task->notes}}</del></td>
                    <td><del>{{$task->due_date}}</del></td>
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
