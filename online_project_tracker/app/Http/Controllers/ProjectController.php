<?php

namespace App\Http\Controllers;
use DB;
use App\Project;
use App\Client;
use App\Role;
use App\User;
use Auth;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    
    public function index()
    {
        //$data=DB::table('projects')->latest()->paginate();
        $data=Project::latest()->get();
        $client= new client();
        return view('admin.projectlist',['datas'=>$data]);
    }

    public function create()
    {
        // datas for client dropdown list form database
        $datas=Client::all(); 
        $head=Role::with('users')->find(2);
        return view('admin.projectadd',compact(['datas','head']));
    }

    public function store(Request $request)
    {
        $data= new project();
        $data->name=$request->name;
        $data->details=$request->details;
        $data->client_id=$request->client;
        $data->user_id=$request->user_id;
        //if logic for null value assign by default value
        /*if($request->client!="")
        {
            $data->client_id=$request->client;
        } */
        $data->save();
        return redirect()->route('project.index');
    }

  
    public function show(Project $project)
    {
        $client= new Client();
        return view('admin.projectshow', ['id'=>$project,'client'=>$client]);
    }

    public function edit(Project $project)
    {
        $datas=Client::all(); 
        $head=Role::with('users')->find(2);
        return view('admin.projectedit', ['id'=>$project,'datas'=>$datas,'head'=>$head]);
    }

    public function update(Request $request, Project $project)
    {
        $project->name=$request->name;
        $project->details=$request->details;
        $project->client_id=$request->client;
        $project->user_id=$request->user_id;
        $project->save();
        return redirect()->route('project.index');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('project.index');
    }


}
