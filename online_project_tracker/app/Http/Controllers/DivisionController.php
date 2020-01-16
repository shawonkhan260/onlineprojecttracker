<?php

namespace App\Http\Controllers;
use Auth;
use App\Division;
use App\User;
use App\role;
use DB;
use Illuminate\Http\Request;

class DivisionController extends Controller
{  
    public function index()
    {
        $data=DB::table('divisions')->paginate();
        $user= new user();
        return view('admin.divisionlist',['datas'=>$data,'user'=>$user]);
    }

    public function create()
    {
        $users=Role::with('users')->find(2);
        return view('admin.divisionadd',compact('users'));
    }

    public function store(Request $request)
    {
        $data= new Division;
        $data->name=$request->name;
        $data->user_id=$request->user_id;
        $data->save();
        return redirect()->route('division.index');
    }

    public function show(Division $division)
    {
        //
    }

    public function edit(Division $division)
    {
        $datas=Role::with('users')->find(2);
        return view('admin.divisionedit', ['id'=>$division,'datas'=>$datas]);
    }

    public function update(Request $request, Division $division)
    {
        $division->name=$request->name;
        $division->user_id=$request->user_id;
        $division->save();
        return redirect()->route('division.index');
    }

    public function destroy(Division $division)
    {
        $division->delete();
        return redirect()->route('division.index');
    }
}
