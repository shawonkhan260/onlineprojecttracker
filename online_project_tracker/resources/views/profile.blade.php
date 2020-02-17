@extends('header')
@section('title')
<title>Profile information </title>
@endsection

@section('base')
<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Profile Information</h1>
          
        </div>
       
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
           <!--row-->
           <div class="row">
            <div class="col-md-4">
              <div class="tile">
              <!--profile pic-->
              <img  src="{{Storage::url(Auth::user()->picture)}}" class="rounded mx-auto d-block" height="400px" alt="User Image">
              <!--button-->
              </div>
                
            </div>

  <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">upuload new photo</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="container">
        <form class="form-horizontal" action="{{route('changepicture',Auth::user()->id)}}" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        @method('PATCH')
          <div class="form-group">
            <input type="file" class="form-control" required name="picture">
          </div>  
          <div class="modal-footer">
            <div class="form-group">        
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </div>
        <form>
        </div>
      </div>
    </div>
  </div>

<!--end modal-->
          <div class="col-md-8">
          <div class="tile" style="font-size:1.5em">
           <!--content-->
           <h3 class="tile-title">User Information</h3>
            
            <form class="form-horizontal" >
            <div class="form-group row">
                <label class="control-label col-md-3"> Name :</label>
                <div class="col-md-8">
                {{Auth::user()->name}}
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-md-3">Email :</label>
                <div class="col-md-8">
                {{Auth::user()->email}}
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-md-3">Skill :</label>
                <div class="col-md-8">
                {{Auth::user()->skill}}
                </div>
            </div>
            </form>
            </div>
            <!--button for change info-->
            <div>
            <a class="btn btn-lg btn-info fa fa-edit fa-lg col-md-12" data-toggle="modal" data-target="#myModal3" > change profile info</a><hr>
            <!--button for change profile-->
            <a class="btn btn-lg btn-primary fa fa-edit fa-lg col-md-12" data-toggle="modal" data-target="#myModal" > change profile picture</a><hr>

            <a class="btn btn-lg btn-warning fa fa-edit fa-lg col-md-12"  href="{{route('passwordpage',Auth::user()->id)}}" > change password</a>
          </div>
          
    
          </div>
        </div>
        </div>
        </div>


   <!-- The Modal for change info -->
  <div class="modal fade" id="myModal3">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">change info</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="container">
        <form class="form-horizontal" action="{{route('changeinfo',Auth::user()->id)}}" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        @method('PATCH')
          <div class="form-group">
          Full Name
            <input type="text" value="{{Auth::user()->name}}" class="form-control" required name="name">
          </div> 
          <div class="form-group">
          Email address
            <input type="email" class="form-control" value="{{Auth::user()->email}}" required name="email">
          </div> 

          <div class="modal-footer">
            <div class="form-group">        
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </div>
        <form>
        </div>  
      </div>
    </div>
  </div>

<!--end modal-->


      

</main>
@endsection

