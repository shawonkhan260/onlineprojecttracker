<?php

namespace App\Http\Controllers;

use App\Group;
use App\User;
use App\Role;
Use DB;
use Illuminate\Http\Request;

class GroupController extends Controller
{

    public function index()
    {
        $data=DB::table('groups')->paginate();
        $user= new user();
        return view('head.grouplist',['datas'=>$data,'user'=>$user]);
    }

    public function create()
    {
        $users=Role::with('users')->find(3);
        return view('head.groupadd',compact('users'));
    }

    public function store(Request $request)
    {
        $data= new Group;
        $data->name=$request->name;
        $data->manager_id=$request->manager_id;
        $data->save();
        return redirect()->route('group.index');
    }

    public function show(Group $group)
    {
        //
    }

    public function edit(Group $group)
    {
        $datas=Role::with('users')->find(3);
        return view('head.groupedit', ['id'=>$group,'datas'=>$datas]);
    }

    public function update(Request $request, Group $group)
    {
        $group->name=$request->name;
        $group->manager_id=$request->manager_id;
        $group->save();
        return redirect()->route('group.index');
    }

    public function destroy(Group $group)
    {
        $group->delete();
        return redirect()->route('group.index');
    }
}
