<?php

namespace App\Http\Controllers;
use Auth;
use DB;
use App\User;
use App\Task;
use App\Module;
use App\Project;
use App\Group;
use App\submittask;
use Illuminate\Http\Request;

class EmployeetaskController extends Controller
{

    public function index()
    {
        $id=Auth::user()->id;
        $groupuser=DB::table('group_user')->where('user_id',$id)->first();
        $group=Group::where('id',$groupuser->group_id)->first();
        $g=$group->division_id;
        if($g!=1){
            $notify=Task::where('user_id',$id)->where('employee_notify',1)->get();
            foreach($notify as $no){
                $no->employee_notify="0";
                $no->save();
    
            }
    
            $tasks=Task::where('user_id',$id)->get();
        }
        else{
            $notify=Task::where('qa',$id)->where('employee_notify',2)->get();
            foreach($notify as $no){
                $no->employee_notify="0";
                $no->save();
    
            }
            $tasks=Task::where('qa',$id)->get();
        }
        return view ('employee.tasklist',compact(['tasks','g']));
        
    }


    public function completetask()
    {
        $id=Auth::user()->id;
        $groupuser=DB::table('group_user')->where('user_id',$id)->first();
        $group=Group::where('id',$groupuser->group_id)->first();
        $g=$group->division_id;
        if($g!=1){
            $tasks=Task::where('user_id',$id)->get();
        }
        else{
            $tasks=Task::where('qa',$id)->get();
        }
        return view ('employee.completetask',compact(['tasks']));
        
    }
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $data=Task::findorfail($id);
        return view('employee.taskshow',compact(['data']));
    }

    public function edit($id)
    {
        return view('employee.tasksubmit',compact('id'));
    }

    public function update(Request $request, $id)
    {
        if($request->g!=1)
        {
        $task=Task::findorfail($id);
        $task->status="submitted";
        $task->employee_notify="2";
        $task->save();
        $data= new submittask();
        $data->task_id=$id;
        $data->file=$request->file('file')->store('public/file');
        $data->details=$request->details;
        $data->save();
        $module=Module::findorfail($task->module_id);
        $module->status="submitted";
        $module->save();
        $project=Project::findorfail($module->project_id);
        $project->status="submitted";
        $project->head_notify="2";
        $project->save();
        return redirect()->route('employeetask.index');
        }
        else
        {

            $data=submittask::where('task_id',$id)->latest()->first();    //for the last submitted task file
            if($request->bug!="")
            {
                $data->bug=$request->bug;
                $data->save();
                $task=Task::findorfail($id);
                $task->status="bug";
                $task->employee_notify="1";
                $task->save();
            }
            else{
                $task=Task::findorfail($id);
                $task->status="varified";
                $task->save();
                $module=$task->module_id; //this code for change module status if all task is varified
                $tasknum=Task::where('module_id',$module)->count();
                $completetask=Task::where('module_id',$module)->where('status','varified')->count();
                if($tasknum==$completetask)
                {
                    $completemodule=Module::findorfail($module);
                    $completemodule->status="completed";
                    $completemodule->save();
                    $project=Module::findorfail($module)->project_id;
                    $modulecount=Module::where('project_id',$project)->count();
                    $completemc=Module::where('project_id',$project)->where('status','completed')->count();
                    if($modulecount==$completemc)
                    {
                    $completeproject=Project::findorfail($project);
                    $completeproject->status="completed";
                    $completeproject->head_notify="3";
                    $completeproject->save();
                    }

                }
            }
            return redirect()->route('employeetask.index');
        }
    }

    public function destroy($id)
    {
        //
    }
}
