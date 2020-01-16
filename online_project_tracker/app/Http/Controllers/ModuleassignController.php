<?php

namespace App\Http\Controllers;
use App\Module;
use App\Role;
use App\User;
use Illuminate\Http\Request;

class ModuleassignController extends Controller
{

    public function edit($id)
    {
        $module=Module::find($id);
        $managers=Role::with('users')->find(3);
        return view('head.moduleassign',compact(['module','managers']));

    }

    public function update(Request $request, $id)
    {
        $data=Module::find($id);
        $data->user_id=$request->user_id;
        $data->submission=$request->submission;
        $data->save();
        $id=$request->project_id; //its for reload module list page wiht details of project
        return redirect()->route('modulelist',compact('id'));
    }

}
