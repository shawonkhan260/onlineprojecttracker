@extends('head.base')

@section('content')

<div class="container">
<div class="row">
<div class="offset-sm-2 col-sm-8">
  <h2>Assign Module</h2>
  <form class="form-horizontal" action="{{route('moduleassignupdate', $module->id)}}" method="POST">
  {{csrf_field()}}
  @method('PATCH')
    <div class="form-group">
      <label class="control-label col-sm-2" for="name">Module Name:</label>
      <input type="text" class="form-control" id="name" value="{{$module->name}}" name="name" readonly>
    </div>
    
    <div class="form-group">
    <label class="control-label col-sm-2" for="user_id">Assigned to:</label>
    <select class="form-control" placeholder="select a name" name="user_id"  id="demoselect1">
    <option></option>
    @foreach($managers as $group)
    <option value="{{$group->id}}"  >{{$group->name}}</option>
    @endforeach

    </select>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-3" for="name">Submission Date:</label>
      <input type="date" class="form-control" id="name" value="{{$module->submission}}" name="submission" >
    </div>
    <input type="hidden"  value="{{$module->project_id}}" name="project_id" >
    <div class="form-group">        
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
</div>
</div>
</div>
           
@endsection

@section('extra')
<script type="text/javascript" src="{{asset('/template/js/plugins/select2.min.js')}}"></script>
<script type="text/javascript">
$("#demoselect1").select2({
    
    allowClear: true
});
</script>
@endsection

