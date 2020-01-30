<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\User;
use App\role;
use DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    
    public function index()
    {
        
        $datas=User::with('roles')->get();
        return view('admin.userlist',compact(['datas']));
    }

    public function create()
    {
        return view('admin.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'skill'=>['required'],
        ]); 

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'skill'=> $request->skill,
            'password' => Hash::make($request->password),
            
        ]);
        return redirect()->route('user.index');
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
