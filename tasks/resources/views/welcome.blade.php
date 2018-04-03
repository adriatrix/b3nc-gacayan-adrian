@extends('layout/app')

@section('title')
   Tasks List
@endsection

@if(Session::has('create_task_success'))
  {{ Session::get('create_task_success')}}
@endif

@section('main_content')
   <ddiv class="columns">
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
                        <input class="input" type="text" name="" value="">
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
   <div class="columns">
      <div class="column is-8 is-offset-2 box">
         <ul>
            @foreach($tasks as $task)
               <li>{{$task->name}}</li>
            @endforeach
         </ul>
      </div>

   </div>
@endsection
