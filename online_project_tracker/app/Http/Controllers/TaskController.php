<?php

namespace App\Http\Controllers;
use Auth;
use App\User;
use App\Task;
use App\Module;
use App\Group;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    public function index()
    {
        //
    }
    public function tasklist($id)
    {
        $data=Module::find($id); //for project details
        $tasks=Task::where('module_id',$id)->get(); //for module list 
        return view('manager.tasklist',compact(['data','tasks']));
    }

    public function create(Request $request)
    {
        $id=$request->id; //create module
        return view('manager.taskadd',compact('id'));
    }

    public function store(Request $request)
    {
        $data= new Task();
        $data->name=$request->name;
        $data->details=$request->details;
        $data->module_id=$request->module_id;
        $data->employee_notify="1";
        $data->status="new";
        $data->save();
        $id=$request->module_id; //its for reload module list page wiht details of project 
        $module=Module::find($id);
        $module->status="running";
        $module->save();// change project status
        return redirect()->route('tasklist',compact('id'));
    }

    public function show(Task $task)
    {
        //
    }

    public function edit(Task $task)
    {
        return view('manager.taskedit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $task->name=$request->name;
        $task->details=$request->details;
        $task->save();
        $id=$request->module_id; //its for reload task list page wiht details of module
        return redirect()->route('tasklist',compact('id'));
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return back();
    }

    public function managermodule(Task $task)
    {
        //$data=DB::table('projects')->latest()->paginate();

        
        $a=Auth::user()->id;
        $group=Group::where('manager_id',$a)->first();
        if($group->division_id!=1)  //for non qa department
        {
        $notify=Module::where('group_id',$group->id)->where('manager_notify',1)->get();
            foreach($notify as $no){
                $no->manager_notify="0";
                $no->save();

            }
        
        $data=Module::where('group_id',$group->id)->get(); //user_id means group id
        }
        else{
            $notify=Module::where('qa',$group->id)->where('manager_notify',2)->get();
            foreach($notify as $no){
                $no->manager_notify="0";
                $no->save();

            }
            $data=Module::where('qa',$group->id)->get();
        }
        return view('Manager.modulelist',['datas'=>$data]);
    }

    public function managercompletemodule(Task $task)
    {
        //$data=DB::table('projects')->latest()->paginate();

        
        $a=Auth::user()->id;
        $group=Group::where('manager_id',$a)->first();
        if($group->division_id!=1)  //for non qa department
        {
        $notify=Module::where('group_id',$group->id)->where('manager_notify',1)->get();
            foreach($notify as $no){
                $no->manager_notify="0";
                $no->save();

            }
        
        $data=Module::where('group_id',$group->id)->get(); //user_id means group id
        }
        else{
            $data=Module::where('qa',$group->id)->get();
        }
        return view('Manager.modulecomplete',['datas'=>$data]);
    }

}
