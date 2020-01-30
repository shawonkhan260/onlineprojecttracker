<?php

namespace App\Http\Controllers;
use App\Task;
use App\User;
use App\Role;
use App\Group;
use Auth;
use Illuminate\Http\Request;

class TaskassignController extends Controller
{
    public function edit($id)
    {
        $a=Auth::user()->id;
        $group=Group::where('manager_id',$a)->get();
        $group=$group[0]->id;
        $employees=Group::with('users')->find($group);

        $task=Task::find($id);
        
        return view('manager.taskassign',compact(['task','employees']));
        

    }

    public function update(Request $request, $id)
    {
        $data=Task::find($id);
        $a=Auth::user()->id;
        $user=Group::where('manager_id',$a)->first();
        if($user->division_id!='1'){
            $data->user_id=$request->user_id;
        }
        else
        {
            $data->qa=$request->user_id;
        }
        $data->submission=$request->submission;
        $data->save();
        $id=$request->module_id; //its for reload task list page wiht details of project
        return redirect()->route('tasklist',compact('id'));
       
    }
}
