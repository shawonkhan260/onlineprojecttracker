<?php

namespace App\Http\Controllers;

use App\Group;
use App\User;
use App\Role;
use App\Division;
Use DB;
use Auth;
use Illuminate\Http\Request;

class GroupController extends Controller
{

    public function index()
    {
        $id=Auth::user()->id;
        $division=Division::where('user_id',$id)->first();
        $data=DB::table('groups')->where('division_id',$division->id)->paginate();
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

        $id=Auth::user()->id;
        $division=Division::where('user_id',$id)->first();
        $data= new Group;
        $data->name=$request->name;
        $data->manager_id=$request->manager_id;
        $data->division_id=$division->id;
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
