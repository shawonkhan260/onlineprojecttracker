<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->hasRole('manager')){
            return view('manager.base');
        }
        if(Auth::user()->hasRole('employee')){
            return view('employee.base');
        }
        if(Auth::user()->hasRole('admin')){
            return view('admin.base');
        }
        
    }
}
