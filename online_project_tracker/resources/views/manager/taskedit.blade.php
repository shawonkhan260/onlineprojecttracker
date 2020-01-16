@extends('manager.base')

@section('content')

<div class="container">
<div class="row">
<div class="offset-sm-2 col-sm-8">
  <h2>Task Information</h2>
  <form class="form-horizontal" action="{{route('task.update', $task->id)}}" method="POST">
  {{csrf_field()}}
  @method('PATCH')
    <div class="form-group">
      <label class="control-label col-sm-2" for="name">Task Name:</label>
      <input type="text" class="form-control" id="name" value="{{$task->name}}" name="name">
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Details:</label>
      <textarea class="form-control" id="details" rows="5" name="details">{{$task->details}}</textarea>
    </div>
    <input type="hidden" value="{{$task->module_id}}" name="module_id" >
    
    <div class="form-group">        
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
</div>
</div>
</div>
           
@endsection

