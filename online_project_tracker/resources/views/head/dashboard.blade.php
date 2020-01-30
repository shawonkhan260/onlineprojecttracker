@extends('head.base')

@section('content')

<div class="row">
        <?php 
        $id=Auth::user()->id;
        $department=App\Division::where('user_id',$id)->first()->id;
        ?>
        
        <div class="col-md-3">
          <div class="widget-small bg-primary text-center"><i class="icon fa fa-sitemap fa-3x"></i>
            <div class="info">
              <h4>Team</h4>
              <p><b>{{App\group::where('division_id',$department)->count()}}</b></p>
            </div>
          </div>
        </div>
        @if($department!=1)
        <?php
        $pro=App\Project::where('user_id',$department)->count();
        if($pro!=0)
        {
          $project=App\Project::where('user_id',$department)->first()->id;
        }
        else{
          $project=0;
        }

        ?>
        <div class="col-md-3">
          <div class="widget-small bg-info text-center"><i class="icon fa fa-briefcase fa-3x"></i>
            <div class="info">
              <h4>Project</h4>
              <p><b>{{App\Project::where('user_id',$department)->count()}}</b></p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="widget-small bg-success text-center"><i class="icon fa fa-server fa-3x"></i>
            <div class="info">
              <h4>Completed Module</h4>
              <p><b>{{App\Module::where('status',"=","completed")->where('project_id',$project)->count()}}</b></p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="widget-small warning text-center"><i class="icon fa fa-tasks fa-3x"></i>
            <div class="info">
              <h4>Running Module</h4>
              <p><b>{{App\Module::where('status',"!=","completed")->where('project_id',$project)->count()}}</b></p>
            </div>
          </div>
        </div>
        @else
        <div class="col-md-3">
          <div class="widget-small bg-info text-center"><i class="icon fa fa-briefcase fa-3x"></i>
            <div class="info">
              <h4>Project</h4>
              <p><b>{{App\Project::where('status','completed')->count() + App\Project::where('status','submitted')->count()}}</b></p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="widget-small bg-success text-center"><i class="icon fa fa-server fa-3x"></i>
            <div class="info">
              <h4>Completed Module</h4>
              <p><b>{{App\Module::where('status',"=","completed")->where('qa','!=','')->count()}}</b></p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="widget-small warning text-center"><i class="icon fa fa-tasks fa-3x"></i>
            <div class="info">
              <h4>Running Module</h4>
              <p><b>{{App\Module::where('status',"!=","completed")->where('qa','!=','')->count()}}</b></p>
            </div>
          </div>
        </div>
        @endif
</div>           
@endsection