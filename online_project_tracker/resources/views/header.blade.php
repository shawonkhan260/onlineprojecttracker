<!DOCTYPE html>
<html lang="en">
  <head>
    
    @yield('title')
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('template/css/main.css')}}">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="{{asset('logintemplate/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">



    
    <link href="{{ asset('css/chat.css') }}" rel="stylesheet">
    <!--<script src="{{ asset('js/app.js') }}" defer></script>-->
  </head>
  <body class="app sidebar-mini rtl">
    <!-- Navbar header-->
    <header class="app-header"><a class="app-header__logo" href="{{route('home')}}">Vali</a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu-->
      <ul class="app-nav">
        
        <!--Notification Menu-->
        @if(Auth::user()->hasRole('head'))
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications">
        <i class="fa fa-bell-o fa-lg"></i> <span style=" position:absolute; right:4px; top:10px;" class="badge badge-danger">
        <?php
        $a=Auth::user()->id;
        $qa=App\Division::where('user_id',$a)->first();
        if($qa->id!=1){
          $data=App\Project::where('user_id',$qa->id)->where('head_notify',1)->count();
        }
        else{
          $data=App\Project::where('head_notify',2)->count();
        }
        
        ?>
        {{$data}}</span></a>
          <ul class="app-notification dropdown-menu dropdown-menu-right">
            <li class="app-notification__title"><a href="{{route('headproject')}}">You have {{$data}} new Project.</a></li>
            
          </ul>
        </li>

        @elseif(Auth::user()->hasRole('admin'))
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications">
        <i class="fa fa-bell-o fa-lg"></i> <span style=" position:absolute; right:4px; top:10px;" class="badge badge-danger">
        <?php
        $data=App\Project::where('head_notify',3)->count();
        ?>
        {{$data}}</span></a>
          <ul class="app-notification dropdown-menu dropdown-menu-right">
            <li class="app-notification__title"><a href="{{route('completeproject')}}">You have {{$data}} new Project.</a></li>
            
          </ul>
        </li>

        @elseif(Auth::user()->hasRole('manager'))
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications">
        <i class="fa fa-bell-o fa-lg"></i> <span style=" position:absolute; right:4px; top:10px;" class="badge badge-danger">
        <?php
        $a=Auth::user()->id;
        $qa=App\Group::where('manager_id',$a)->first();
        if($qa->division_id!=1)
        {
          $data=App\Module::where('group_id',$qa->id)->where('manager_notify',1)->count();
        }
        
        else
        {
          $data=App\Module::where('qa',$qa->id)->where('manager_notify',2)->count();
        }

        ?>
        {{$data}}</span></a>
          <ul class="app-notification dropdown-menu dropdown-menu-right">
            <li class="app-notification__title"><a href="{{route('managermodule')}}">You have {{$data}} new Module.</a></li>
            
          </ul>
        </li>

        @elseif(Auth::user()->hasRole('employee'))
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications">
        <i class="fa fa-bell-o fa-lg"></i> <span style=" position:absolute; right:4px; top:10px;" class="badge badge-danger">
        <?php
        $a=Auth::user()->id;
        $groupuser=DB::table('group_user')->where('user_id',$a)->first();
        $group=App\Group::where('id',$groupuser->group_id)->first();
        if($group->division_id!=1)
        {
          $data=App\Task::where('user_id',$a)->where('employee_notify',1)->count();
        }
        else{
          $data=App\Task::where('qa',$a)->where('employee_notify',2)->count();
        }
        ?>
        {{$data}}</span></a>
          <ul class="app-notification dropdown-menu dropdown-menu-right">
            <li class="app-notification__title"><a href="{{route('employeetask.index')}}">You have {{$data}} new task.</a></li>
            
          </ul>
        </li>
        @endif












        <li class="dropdown"><a class="app-nav__item" href="{{route('messagelist')}}" ><i class="fa fa-envelope-o fa-lg"></i> <span style=" position:absolute; right:4px; top:10px;" class="badge badge-danger">{{App\Message::where('to',Auth::user()->id)->where('is_read','0')->count()}}</span></a></li>
        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
            
            <li><a class="dropdown-item" href="{{route('profile')}}"><i class="fa fa-user fa-lg"></i> Profile</a></li>
             <!-- Rnogout code -->
            <li><a class="dropdown-item" href="{{ route('logout') }}" 
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            <i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">  @csrf </form>
          </ul>
        </li>
      </ul>
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar"><!-- user picture --><a href="{{route('profile')}}">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="{{Storage::url(Auth::user()->picture)}}" width="48px" height="48px" alt="User Image">
      <div>
          <p class="app-sidebar__user-name">{{Auth::user()->name}}</p>
          <p class="app-sidebar__user-designation">{{Auth::user()->skill}}</p>
      </div>
      </div> </a>
      <ul class="app-menu">
      <li><a class="app-menu__item {{ (request()->is('/')) ? 'active' : '' }}" href="{{route('home')}}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
      
      @if(Auth::user()->hasRole('admin'))
     <li><a class="app-menu__item {{ (request()->is('client*')) ? 'active' : '' }}" href="{{route('client.index')}}"><i class="app-menu__icon fa fa-address-book"></i><span class="app-menu__label">Client</span></a></li>
      <li><a class="app-menu__item {{ (request()->is('project*')) ? 'active' : '' }}" href="{{route('project.index')}}"><i class="app-menu__icon fa fa-tasks"></i><span class="app-menu__label">Running Project list</span></a></li>
      <li><a class="app-menu__item {{ (request()->is('completeproject*')) ? 'active' : '' }}" href="{{route('completeproject')}}"><i class="app-menu__icon fa fa-server"></i><span class="app-menu__label">Completed Project list</span></a></li>

      <li><a class="app-menu__item {{ (request()->is('division*')) ? 'active' : '' }}" href="{{route('division.index')}}"><i class="app-menu__icon fa fa-institution"></i><span class="app-menu__label">department</span></a></li>
      <li><a class="app-menu__item {{ (request()->is('user*')) ? 'active' : '' }}" href="{{route('user.index')}}"><i class="app-menu__icon fa fa-user"></i><span class="app-menu__label">User Access</span></a></li>
      @elseif(Auth::user()->hasRole('head'))
      <li><a class="app-menu__item {{ (request()->is('headproject*')) ? 'active' : '' }}" href="{{route('headproject')}}"><i class="app-menu__icon fa fa-briefcase"></i><span class="app-menu__label">Project</span></a></li>
      <li><a class="app-menu__item {{ (request()->is('group*')) ? 'active' : '' }}" href="{{route('group.index')}}"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">team</span></a></li>
      @elseif(Auth::user()->hasRole('manager'))
      <li><a class="app-menu__item" href="{{route('managermodule')}}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Running Module list</span></a></li>
      <li><a class="app-menu__item" href="{{route('managercompletemodule')}}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Complete Module list</span></a></li>
      @elseif(Auth::user()->hasRole('employee'))
      <li><a class="app-menu__item {{ (request()->is('employeetask*')) ? 'active' : '' }}" href="{{route('employeetask.index')}}"><i class="app-menu__icon fa fa-tasks"></i><span class="app-menu__label">Running task list</span></a></li>
      <li><a class="app-menu__item {{ (request()->is('completetask*')) ? 'active' : '' }}" href="{{route('completetask')}}"><i class="app-menu__icon fa fa-server"></i><span class="app-menu__label">Completed Task list</span></a></li>

      @endif
     

      </ul>
    </aside>
	  <!-- main content-->
    @yield('base')
    <!-- Essential javascripts for application to work-->
    <script src="{{asset('/template/js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('/template/js/popper.min.js')}}"></script>
    <script src="{{asset('/template/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('/template/js/main.js')}}"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="{{asset('/template/js/plugins/pace.min.js')}}"></script>
    <!-- Page specific javascripts-->
    @yield('extra')
    <!-- Google analytics script-->




  </body>
</html>

