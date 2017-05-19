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
       if ($request->group_id == 0 ){
           if($request->group==''){
               dd('plz select group !!');
           }
           $group = new Group();
           $group->name =$request->group;
           $group->save();
           $task->group_id = $group->id;
       }else{
           $task->group_id = $request->group_id;
       }
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
    public function filterGroupTask($id)
    {
        $tasks= Task::all()->where('group_id','=',$id);
        $groups= Group::all();
        return view('welcome',compact('tasks','groups'));
    }
}