@extends('admin.base')

@section('content')
<div class="container">
<div class="row">
<div class="offset-sm-2 col-sm-8">
  <h2>Client form</h2>
  <form class="form-horizontal" action="{{route('client.store')}}" method="POST">
  {{csrf_field()}}
    <div class="form-group">
      <label class="control-label col-sm-2" for="name">Name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter full name" name="name">
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Phone No:</label>
      <input type="text" class="form-control" id="phone" placeholder="Enter Phone No" name="phone">
    </div>
    
    <div class="form-group">        
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
</div>
</div>
</div>
@endsection