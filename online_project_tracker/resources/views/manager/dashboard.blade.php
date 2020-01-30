@extends('admin.base')

@section('content')

<div class="row">
<?php
        $id=Auth::user()->id;
        $div=DB::table('groups')->where('manager_id',$id)->first();
        $d=$div->division_id
        ?>
        @if($d!=1)
        <div class="col-md-4 offset-md-1">
          <div class="widget-small warning text-center"><i class="icon fa fa-tasks fa-3x"></i>
            <div class="info">
              <h4>Running Module</h4>
              <p><b>{{App\Module::where('status',"!=","completed")->where('group_id',$div->id)->count()}}</b></p>
            </div>
          </div>
        </div>
        <div class="col-md-4 offset-md-2">
          <div class="widget-small bg-success text-center"><i class="icon fa fa-server fa-3x"></i>
            <div class="info">
              <h4>completed Module</h4>
              <p><b>{{App\Module::where('status',"=","completed")->where('group_id',$div->id)->count()}}</b></p>
            </div>
          </div>
        </div>
        @else
        <div class="col-md-4 offset-md-1">
          <div class="widget-small warning text-center"><i class="icon fa fa-tasks fa-3x"></i>
            <div class="info">
              <h4>Running Module</h4>
              <p><b>{{App\Module::where('status',"!=","completed")->where('qa',$div->id)->count()}}</b></p>
            </div>
          </div>
        </div>
        <div class="col-md-4 offset-md-2">
          <div class="widget-small bg-success text-center"><i class="icon fa fa-server fa-3x"></i>
            <div class="info">
              <h4>completed Module</h4>
              <p><b>{{App\Module::where('status',"=","completed")->where('qa',$div->id)->count()}}</b></p>
            </div>
          </div>
        </div>

        @endif
</div>  
@endsection