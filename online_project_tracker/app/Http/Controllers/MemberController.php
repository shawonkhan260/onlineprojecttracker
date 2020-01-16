<?php

namespace App\Http\Controllers;
use App\Group;
use App\User;
use App\Role;
Use DB;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index($id)
    {
        $id=$id;
        $members=Group::with('users')->find($id);
        $employees=Role::with('users')->find(4);
        return view('head.memberlist',compact(['employees','id','members']));
    }
    public function update(Request $request)
    {
        $data=User::findorFail($request->user_id);
        //detach use for single access without detach , attach will add multiple access
        $data->groups()->detach();
        $data->groups()->attach($request->group_id);
        return redirect()->route('memberlist',$request->group_id);
    }
    public function destroy($id)
    {
        $data=User::findorFail($id);
        $data->groups()->detach();
        return back();
    }
}
