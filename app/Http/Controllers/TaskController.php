<?php
/**
 * Created by PhpStorm.
 * User: rasool
 * Date: 5/14/17
 * Time: 8:59 PM
 */

namespace App\Http\Controllers;


use App\Group;
use App\Http\Requests\StoreTask;
use App\Task;
use Illuminate\Http\Request;

class TaskController
{
    public function newTask(StoreTask $request)
    {
        $task= new Task();
        $task->title = $request->title ;
        $task->state = $request->state ;
        $task->group_id = $request->group_id;
        $task->deadline= $request->deadline;
        $task->save();
        $request->session()->flash('status', 'Task successfully added!');
        return redirect('/');
    }
    public function showTask()
    {
        $tasks= Task::all();
        $groups= Group::all();
        return view('welcome',compact('tasks','groups'));
    }

}