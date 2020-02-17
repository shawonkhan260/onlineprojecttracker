@extends('employee.base')

@section('content')
<div class="container">
<div class="row">
<div class="offset-sm-2 col-sm-8">
  <h2>submit task file</h2>
  <form class="form-horizontal" action="{{route('employeetask.update',$id)}}" method="POST" enctype="multipart/form-data">
  {{csrf_field()}}
  @method('PATCH')
  <?php
  $id=Auth::user()->id;
  $groupuser=DB::table('group_user')->where('user_id',$id)->first();
  $group=App\Group::where('id',$groupuser->group_id)->first();
  $g=$group->division_id;     
  ?>
  @if($g!=1)
    <div class="form-group">
      <label class="control-label col-sm-2" >file:</label>
      <input type="file" class="form-control" required name="file">
    </div>  

    <div class="form-group">
      <label class="control-label col-sm-2" >Comment:</label>
      <input type="text" class="form-control" required name="details">
    </div> 
    <input type="hidden" value="{{$g}}" name="g">
    <div class="form-group">        
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
@else
<div class="form-group">
      <label class="control-label col-sm-12" >If any bug or error found or any change need please write it down</label>
      <label class="control-label col-sm-12" >If there is no bug or no need any modification then leave the box empty</label>
      <input type="text" class="form-control" name="bug">
    </div> 
    <input type="hidden" value="{{$g}}" name="g">
    <div class="form-group">        
      <button type="submit" class="btn btn-primary">Submit as varified</button>
      <button type="submit" class="btn btn-danger">Need modification</button>
    </div>
    @endif
    
  </form>
</div>
</div>
</div>
@endsection