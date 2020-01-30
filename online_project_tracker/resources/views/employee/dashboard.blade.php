@extends('employee.base')

@section('content')

<div class="row">
        <?php
        $id=Auth::user()->id;
        $group=DB::table('group_user')->where('user_id',$id)->first()->group_id;
        $d=App\Group::find($group)->division_id;
        ?>
        @if($d!=1)
        <div class="col-md-4 offset-md-1">
          <div class="widget-small warning text-center"><i class="icon fa fa-tasks fa-3x"></i>
            <div class="info">
              <h4>Running Task</h4>
              <p><b>{{App\Task::where('status',"!=","varified")->where('user_id',Auth::user()->id)->count()}}</b></p>
            </div>
          </div>
        </div>
        <div class="col-md-4 offset-md-2">
          <div class="widget-small bg-success text-center"><i class="icon fa fa-server fa-3x"></i>
            <div class="info">
              <h4>completed Task</h4>
              <p><b>{{App\Task::where('status',"=","varified")->where('user_id',Auth::user()->id)->count()}}</b></p>
            </div>
          </div>
        </div>
        @else
        <div class="col-md-4 offset-md-1">
          <div class="widget-small warning text-center"><i class="icon fa fa-tasks fa-3x"></i>
            <div class="info">
              <h4>Running Task</h4>
              <p><b>{{App\Task::where('status',"!=","varified")->where('qa',Auth::user()->id)->count()}}</b></p>
            </div>
          </div>
        </div>
        <div class="col-md-4 offset-md-2">
          <div class="widget-small bg-success text-center"><i class="icon fa fa-server fa-3x"></i>
            <div class="info">
              <h4>completed Task</h4>
              <p><b>{{App\Task::where('status',"=","varified")->where('qa',Auth::user()->id)->count()}}</b></p>
            </div>
          </div>
        </div>
        @endif

</div>  
@endsection