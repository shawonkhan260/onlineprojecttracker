@extends('admin.base')

@section('content')


<div class="col-md-8 offset-md-2" style="font-size:1.5em">
    <div class="tile">
    <h3 class="tile-title">Task Information</h3>
    <div class="tile-body">
        <form class="form-horizontal" >
        <div class="form-group row">
            <label class="control-label col-md-3">Task Name</label>
            <div class="col-md-8">
            {{$data->name}}
            </div>
        </div>
        <div class="form-group row">
            <label class="control-label col-md-3">Details</label>
            <div class="col-md-8">
            {{$data->details}}
            </div>
        </div>

        <div class="form-group row">
            <label class="control-label col-md-3">submission date</label>
            <div class="col-md-8">
            {{$data->submission}}
            </div>
        </div>
        </form>
        </div>
    </div>
</div>
@endsection