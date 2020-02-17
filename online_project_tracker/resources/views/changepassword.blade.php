@extends('header')

@section('base')

<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Change Password</h1>
        
        </div>
        
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">


<div class="container">
<div class="row">
<div class="offset-sm-2 col-sm-8">
  <h2>change password</h2>
  <form class="form-horizontal" action="{{route('changepass',$id)}}" method="POST">
  {{csrf_field()}}
  @method('PATCH')
    <div class="form-group">
      <label class="control-label" for="name">Input new password:</label>
      <input type="password" class="form-control" id="name" placeholder="Enter password"  required name="password">
    </div>
    
    <div class="form-group">        
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
</div>
</div>
</div>
@endsection
</div>
</div>
</div>