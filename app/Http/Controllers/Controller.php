<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    public function showTask()
    {
        $tasks= Task::all();
        return view('welcome',compact('tasks'));
    }
    public function newTask(Request $r)
    {
//        dd($r->done);
        $task= new Task ;
        $task->title = $r->title ;
        $task->state = $r->state ;
        $task->cat = $r->cat;
        $task->save();
        $r->session()->flash('status', 'Task successfully added!');
        return redirect('/');
    }
    public function deleteTask($id)
    {

        $t=Task::find($id);
        $t->delete();
        return redirect("/");
    }
    public function pendingTask($id)
    {
        $t=Task::find($id);
        $t->state='pending';
        $t->save();
        return redirect("/");
    }
    public function doneTask($id)
    {
        $t=Task::find($id);
        $t->state='Done';
        $t->save();

        return redirect("/");
    }
}
