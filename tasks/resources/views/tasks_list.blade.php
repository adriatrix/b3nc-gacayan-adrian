@extends('layout/app')

@section('title')
   Tasks List
@endsection

@if(Session::has('create_task_success'))
  {{ Session::get('create_task_success')}}
@endif

@section('main_content')
   <div class="columns">
      <div class="column is-8 is-offset-2 box">
         <div class="title">
            <p>New Task</p>
         </div>
         <form class="" action="{{url("create")}}" method="post">
            {{ csrf_field() }}
            <div class="field is-horizontal">
               <div class="field-label">
                  <label class="label">Task</label>
               </div>
               <div class="field-body">
                  <div class="field">
                     <div class="control">
                        <input class="input" type="text" name="name">
                     </div>
                  </div>
               </div>
            </div>
            <div class="field is-horizontal">
               <div class="field-label">
                  <!-- Left empty for spacing -->
               </div>
               <div class="field-body">
                  <div class="field">
                     <div class="control">
                        <input class="button is-link" type="submit" name="submit" value="Add Task">
                     </div>
                  </div>
               </div>
            </div>
         </form>
      </div>
   </div>
   <br>
   <div class="columns">
      <div class="column is-8 is-offset-2 box">
         <div class="title">
            <p>Task List</p>
         </div>
         <ul>
            @foreach($tasks as $task)
               <li class="is-size-4">{{$task->name}}<span class="is-pulled-right"><a class="button is-danger is-small is-rounded" href='{{url("delete/$task->id")}}'>Delete</a></span></li>
            @endforeach
         </ul>
      </div>
   </div>
@endsection
