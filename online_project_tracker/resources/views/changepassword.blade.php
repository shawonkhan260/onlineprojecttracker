@extends('header')

@section('base')

<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Department head dashboard</h1>
          <p>Start a beautiful journey here</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Blank Page</a></li>
        </ul>
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
      <input type="password" class="form-control" id="name" placeholder="Enter password" name="password">
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