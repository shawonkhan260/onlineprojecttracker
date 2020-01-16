@extends('admin.base')

@section('content')
<div class="container">
<div class="row">
<div class="offset-sm-2 col-sm-8">
  <h2>Add division</h2>
  <form class="form-horizontal" action="{{route('division.store')}}" method="POST">
  {{csrf_field()}}
    <div class="form-group">
      <label class="control-label col-sm-3" for="name">Division Name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter full name" name="name">
    </div>

    <div class="form-group">
    <label class="control-label col-sm-3" for="head">Division Head:</label>
    <select class="form-control"  name="user_id" id="demoselect">
    <option><option>
    <!--for hide assigning head-->
    @foreach($users->users as $user)
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
//$("#demoselect").select2();
$("#demoselect").select2({
    placeholder: 'Select a Name',
    allowClear: true
});
</script>
@endsection