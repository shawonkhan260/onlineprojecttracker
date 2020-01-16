@extends('manager.base')

@section('content')
<div class="container">
<div class="row">
<div class="offset-sm-2 col-sm-8">
  <h2>Task Information</h2>
  <form class="form-horizontal" action="{{route('task.store')}}" method="POST">
  {{csrf_field()}}
    <div class="form-group">
      <label class="control-label col-sm-2" for="name">Task Name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter  name" name="name">
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Task Details:</label>
      <input type="text" class="form-control" id="details" placeholder="Enter Details" name="details">
    </div>
    <input type="hidden" value="{{$id}}" name="module_id">
    
    <div class="form-group">        
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
</div>
</div>
</div>
@endsection