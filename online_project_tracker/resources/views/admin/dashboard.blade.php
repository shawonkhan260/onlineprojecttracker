@extends('admin.base')

@section('content')

<div class="row">
        <div class="col-md-2">
          <div class="widget-small primary"><i class="icon fa fa-users fa-3x"></i>
            <div class="info text-center">
              <h4>Users</h4>
              <p><b>{{App\User::all()->count()}}</b></p>
            </div>
          </div>
        </div>
        <div class="col-md-2">
          <div class="widget-small info  text-center "><i class="icon fa fa-institution fa-3x"></i>
            <div class="info">
              <h4>Department</h4>
              <p><b>{{App\Division::all()->count()}}</b></p>
            </div>
          </div>
        </div>
        <div class="col-md-2">
          <div class="widget-small bg-secondary text-center"><i class="icon fa fa-sitemap fa-3x"></i>
            <div class="info">
              <h4>Team</h4>
              <p><b>{{App\group::all()->count()}}</b></p>
            </div>
          </div>
        </div>
        <div class="col-md-2">
          <div class="widget-small bg-dark text-center"><i class="icon fa fa-address-book fa-3x"></i>
            <div class="info">
              <h4>Client</h4>
              <p><b>{{App\Client::all()->count()}}</b></p>
            </div>
          </div>
        </div>
        <div class="col-md-2">
          <div class="widget-small warning text-center"><i class="icon fa fa-tasks fa-3x"></i>
            <div class="info">
              <h4>Running Project</h4>
              <p><b>{{App\Project::where('status',"!=","completed")->count()}}</b></p>
            </div>
          </div>
        </div>
        <div class="col-md-2">
          <div class="widget-small bg-success text-center"><i class="icon fa fa-server fa-3x"></i>
            <div class="info">
              <h4>completed Project</h4>
              <p><b>{{App\Project::where('status',"=","completed")->count()}}</b></p>
            </div>
          </div>
        </div>
</div>  
@endsection