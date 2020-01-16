@extends('employee.base')

@section('content')
<div class="container">
<div class="row">
<div class="offset-sm-2 col-sm-8">
  <h2>submit task file</h2>
  <form class="form-horizontal" action="{{route('employeetask.update',$id)}}" method="POST" enctype="multipart/form-data">
  {{csrf_field()}}
  @method('PATCH')
    <div class="form-group">
      <label class="control-label col-sm-2" >file:</label>
      <input type="file" class="form-control" name="file">
    </div>   
    <div class="form-group">        
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
</div>
</div>
</div>
@endsection