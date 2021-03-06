@extends('admin.base')

@section('content')


<div class="col-md-12" style="font-size:1.5em">
    <div class="row d-print-none mt-2">
        <div class="col-12 text-left"><a class="btn btn-primary" onclick="window.print()"  target="_blank"><i class="fa fa-print"></i> Print</a></div>
        <!--href="javascript:window.print();"-->
    </div>
    <div class="tile">
    <h3 class="tile-title">Project Information</h3>
    <div class="tile-body">
        <form class="form-horizontal" >
        <div class="form-group row">
            <label class="control-label col-md-3">Project Name</label>
            <div class="col-md-8">
            {{$id->name}}
            </div>
        </div>
        <div class="form-group row">
            <label class="control-label col-md-3">Details</label>
            <div class="col-md-8">
            {{$id->details}}
            </div>
        </div>
        <div class="form-group row">
            <label class="control-label col-md-3">Client</label>
            <div class="col-md-8">
            @if($id->client_id!='')
            {{$client->findorFail($id->client_id)->name}}
            @else
            No Client
            @endif
            </div>
        </div>
        <div class="form-group row">
            <label class="control-label col-md-3">Department</label>
            <div class="col-md-8">
            @if($id->user_id!='')
            {{ App\Division::findorFail($id->user_id)->name}}
            @else
            Not Assigned
            @endif
            </div>
        </div>
        <div class="form-group row">
            <label class="control-label col-md-3">Submission Date</label>
            <div class="col-md-8">
            {{$id->submission}}
            </div>
        </div>
        </form>
        </div>
    </div>
</div>
@if($id->status=="completed")
<div class="col-md-12" style="font-size:1.5em">
    <div class="tile " style="background-color:slategray;-webkit-print-color-adjust: exact;">
    <h3 class="tile-title text-white">Project Work</h3>
    <div class="tile-body ">
       <?php $modules=App\Module::where('project_id',$id->id)->get() ?>
       @foreach($modules as $module)
       <div class="tile">
       
       <p>Module Name: {{$module->name}} </p>
       <p>Team: {{App\Group::find($module->group_id)->name}}</p>
       <hr  style="border: 3px solid green;">
       
       
       <?php $tasks=App\Task::where('module_id',$module->id)->get() ?>
       @foreach($tasks as $task)
       <p>Task Name: {{$task->name}} </p>
       <p>Done by: {{App\User::find($task->user_id)->name}}</p>
       <hr>
       @endforeach
       </div>
       @endforeach
    </div>
    </div>
</div>
@endif
@endsection