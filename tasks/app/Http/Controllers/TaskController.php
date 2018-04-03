<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Task;


class TaskController extends Controller
{
      function showTasks() {
         $tasks = Task::all();
         return view('tasks_list', compact('tasks'));
      }

      function create(Request $request) {
         $rules = array (
            'name' => 'required'
         );
         $this->validate($request,$rules);

         $new_task= new Task();
         $new_task->name = $request->name;
         $new_task->save();

         Session::flash('create_task_success','Task Successfully Added');

         return redirect('/');
      }

      function delete($id) {
         $task_tbd= Task::find($id);
         $task_tbd->delete();

         return redirect('/');
      }
}
