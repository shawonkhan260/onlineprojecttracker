<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\User;
use App\role;
use DB;

class UserController extends Controller
{
    
    public function index()
    {
        
        $datas=User::with('roles')->paginate();
        return view('admin.userlist',compact(['datas']));
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
        //
    }

    public function edit($id)
    {
        $data=User::with('roles')->find($id);
        $roles=Role::get();
        return view('admin.useredit',compact(['data','roles']));
    }

    public function update(Request $request, $id)
    {
        $data=User::findorFail($id);
        //detach use for single access without detach , attach will add multiple access
        $data->roles()->detach();
        $data->roles()->attach($request->role_id);
        return redirect()->route('user.index');
    }

    public function destroy($id)
    {
        $data=User::findorfail($id);
        $data->delete();
        return redirect()->route('user.index');
    }
}
