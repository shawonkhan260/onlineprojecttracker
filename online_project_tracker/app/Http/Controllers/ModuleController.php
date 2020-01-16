<?php

namespace App\Http\Controllers;
use Auth;
use App\Module;
use App\Project;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    public function index()
    {
        
    }
    Public function modulelist($id)
    {
        
        $data=Project::find($id); //for project details
        $modules=Module::where('project_id',$id)->get(); //for module list 
        return view('head.modulelist',compact(['data','modules']));
    }

    public function create(Request $request)
    {
        $id=$request->id; //create module
        return view('head.moduleadd',compact('id'));
    }

    public function store(Request $request)
    {
        $data= new Module();
        $data->name=$request->name;
        $data->details=$request->details;
        $data->project_id=$request->project_id;
        $data->save();
        $id=$request->project_id; //its for reload module list page wiht details of project
        return redirect()->route('modulelist',compact('id'));
    }

    public function show(Module $module)
    {
        //
    }

    public function edit(Module $module)
    {
        return view('head.moduleedit', compact('module'));
    }

    public function update(Request $request, Module $module)
    {
        $module->name=$request->name;
        $module->details=$request->details;
        $module->save();
        $id=$request->project_id; //its for reload module list page wiht details of project
        return redirect()->route('modulelist',compact('id'));
    }

    public function destroy(Module $module)
    {
        $module->delete();
        return back();
    }

    public function headproject()
    {
        //$data=DB::table('projects')->latest()->paginate();
        $a=Auth::user()->id;
        $data=Project::where('user_id',$a)->get();
        return view('head.projectlist',['datas'=>$data]);
    }
}
