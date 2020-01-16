<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if(Auth::user()->hasRole('manager')){
            return view('manager.base');
        }
        if(Auth::user()->hasRole('employee')){
            return view('employee.base');
        }
        if(Auth::user()->hasRole('admin')){
            return view('admin.dashboard');
        }
        if(Auth::user()->hasRole('head')){
            return view('head.dashboard');
        }
        return view('wait');
        
    }
}
