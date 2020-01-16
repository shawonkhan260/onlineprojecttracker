<?php

namespace App\Http\Controllers;
use Auth;
use App\User;
use App\Task;
use App\Module;
use Illuminate\Http\Request;

class EmployeetaskController extends Controller
{

    public function index()
    {
        $id=Auth::user()->id;
        $tasks=Task::where('user_id',$id)->get();
        return view ('employee.tasklist',compact('tasks'));
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
        $data=Task::findorfail($id);
        return view('employee.taskshow',compact(['data']));
    }

    public function edit($id)
    {
        return view('employee.tasksubmit',compact('id'));
    }

    public function update(Request $request, $id)
    {
        $data=Task::findorfail($id);
        $data->file=$request->file('file')->store('public/file');
        $data->save();
        return back();
    }

    public function destroy($id)
    {
        //
    }
}
