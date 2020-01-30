<?php

namespace App\Http\Controllers;
use App\Module;
use App\Role;
use App\User;
use App\Group;
use App\Division;
use Auth;
use Illuminate\Http\Request;

class ModuleassignController extends Controller
{

    public function edit($id)
    {
        $module=Module::find($id);
        //$managers=Role::with('users')->find(3);
        $head=Auth::user()->id;
        $division=Division::where('user_id',$head)->first();
        $managers=Group::where('division_id',$division->id)->get();
        return view('head.moduleassign',compact(['module','managers']));

    }

    public function update(Request $request, $id)
    {
        $a=Auth::user()->id;
        $qa=Division::where('user_id',$a)->first();
        
        $data=Module::find($id);
        if($qa->id!='1')
        {
            $data->group_id=$request->user_id;
        }
        else{
            $data->qa=$request->user_id;
            $data->manager_notify="2";
        }
        
        $data->submission=$request->submission;
        $data->save();
        $id=$request->project_id; //its for reload module list page wiht details of project
        return redirect()->route('modulelist',compact('id'));
    }

}
