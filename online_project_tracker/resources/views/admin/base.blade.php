@extends('header')

@section('base')
<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Admin dashboard</h1>
          <p>Start a beautiful journey here</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Blank Page</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            @yield('content')
            </div>
          </div>
        </div>
      </div>
</main>
@endsection
@section('link')
<li><a class="app-menu__item" href="{{route('client.index')}}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Client</span></a></li>
<li><a class="app-menu__item" href="{{route('project.index')}}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Project</span></a></li>
<li><a class="app-menu__item" href="{{route('division.index')}}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">division</span></a></li>
<li><a class="app-menu__item" href="{{route('user.index')}}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">userlist</span></a></li>
@endsection