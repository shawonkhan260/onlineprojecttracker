@extends('admin.base')

@section('content')


<div class="col-md-8 offset-md-2" style="font-size:1.5em">
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
            <label class="control-label col-md-3">Assigned to</label>
            <div class="col-md-8">
            @if($id->user_id!='')
            {{ App\User::findorFail($id->user_id)->name}}
            @else
            Not Assigned
            @endif
            </div>
        </div>
        </form>
        </div>
    </div>
</div>
@endsection