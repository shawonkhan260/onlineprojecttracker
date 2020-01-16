<?php

namespace App\Http\Controllers;
use App\Client;
use Illuminate\Http\Request;
use DB;
class ClientController extends Controller
{

    public function index()
    {
        $data=DB::table('clients')->paginate();
        return view('admin.clientlist',['datas'=>$data]);
    
    }

    public function create()
    {
        return view('admin.clientadd');
    }

    public function store(Request $request)
    {
        $data=request()->validate([
            'name'=>'required', 
           'phone'=>'required'
        ]);
        client::create($data);
        return redirect()->route('client.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data= client::find($id);
        return view('admin.clientedit', ['id'=>$data]);
    }

    public function update(Request $request, $id)
    {
        $data= client::find($id);
        $data->name=$request->name;
        $data->phone=$request->phone;
        $data->save();
        return redirect()->route('client.index');
    }

    public function destroy($id)
    {
        $data=client::find($id);
        $data->delete();
        return redirect()->route('client.index');
    }
}
