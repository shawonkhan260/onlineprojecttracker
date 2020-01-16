@extends('admin.base')

@section('content')

<div class="container">
<div class="row">
<div class="offset-sm-2 col-sm-8">
  <h2>Edite Division</h2>
  <form class="form-horizontal" action="{{route('division.update', $id->id)}}" method="POST">
  {{csrf_field()}}
  @method('PATCH')
    <div class="form-group">
      <label class="control-label col-sm-3" for="name">Division Name:</label>
      <input type="text" class="form-control" id="name" value="{{$id->name}}" name="name">
    </div>
    <div class="form-group">
    <label class="control-label col-sm-3" for="user_id">Division head:</label>
    <select class="form-control"  name="user_id" id="demoselect">
    <option></option>
    @if($id->user_id!="")
    <option value="{{$id->user_id}}" selected>{{   App\User::findOrFail($id->user_id)->name}}<option>  
    @endif
    <!--for hide assigning head-->
    @foreach($datas->users as $user)
    @if(App\Division::where('user_id',$user->id)->count()==0)
    <option value="{{$user->id}}"  >{{$user->name}}</option>
    @else 
    @endif
    @endforeach
    </select>
    </div>
    
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
$("#demoselect").select2({
    
    allowClear: true
});
</script>
@endsection

