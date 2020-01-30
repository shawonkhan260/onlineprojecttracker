<?php

namespace App\Http\Controllers;
use DB;
use App\Project;
use App\Client;
use App\Role;
use App\User;
use App\Division;
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

    public function completeproject()
    {
        $data=Project::where('status','completed')->latest()->get();
        $client= new client();
        $notify=Project::where('head_notify','3')->get();
        foreach($notify as $no){
            $no->head_notify="0";
            $no->save();

        }
        return view('admin.completeproject',['datas'=>$data]);
    }

    public function printproject(Request $request)
    {
        if($request->date!="")
        {
            $data=Project::where('created_at','like',$request->date."%")->latest()->get();
        }
        else{
            $data=Project::latest()->get();
        }
        $client= new client();
        return view('admin.printproject',['datas'=>$data,'date'=>$request->date]);
    }

    public function printcompleteproject(Request $request)
    {
        if($request->date!="")
        {
            $data=Project::where('updated_at','like',$request->date."%")->where('status','completed')->latest()->get();
        }
        else{
            $data=Project::where('status','completed')->latest()->get();
        }
        $client= new client();
        return view('admin.printcompleteproject',['datas'=>$data,'date'=>$request->date]);
    }

    public function printspecificproject($id)
    {
        $project=Project::find($id);
        $client= new Client();
        return view('admin.printspecificproject', ['id'=>$project,'client'=>$client]);
    }


    public function create()
    {
        // datas for client dropdown list form database
        $datas=Client::all(); 
        //$head=Role::with('users')->find(2);
        $head=Division::all();
        return view('admin.projectadd',compact(['datas','head']));
    }

    public function store(Request $request)
    {
        $data= new project();
        $data->name=$request->name;
        $data->details=$request->details;
        $data->client_id=$request->client;
        $data->user_id=$request->user_id;
        $data->status="new";
        $data->submission=$request->submission;
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
        //$head=Role::with('users')->find(2);
        $head=Division::all();
        return view('admin.projectedit', ['id'=>$project,'datas'=>$datas,'head'=>$head]);
    }

    public function update(Request $request, Project $project)
    {
        $project->name=$request->name;
        $project->details=$request->details;
        $project->client_id=$request->client;
        $project->user_id=$request->user_id;
        $project->submission=$request->submission;
        $project->save();
        return redirect()->route('project.index');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return back();
    }


}
