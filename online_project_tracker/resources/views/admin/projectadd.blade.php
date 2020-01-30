@extends('admin.base')

@section('content')
<div class="container">
<div class="row">
<div class="offset-sm-2 col-sm-8">
  <h2>Project form</h2>
  <form class="form-horizontal" action="{{route('project.store')}}" method="POST">
  {{csrf_field()}}

    <div class="form-group">
    <label class="control-label col-sm-2" for="client">client:</label>
    <select class="form-control" placeholder="select a client" name="client" id="demoselect">
    <option><option>
    @foreach($datas as $data)
        <option value="{{$data->id}}"  > {{$data->name}}</option>
    @endforeach
    </select>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="name">Name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter full name" name="name">
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="details">Details:</label>
      <textarea class="form-control" id="details" rows="4" placeholder="Enter Project details.." name="details"></textarea>
    </div>

    <div class="form-group">
    <label class="control-label col-sm-2" for="user_id">Assigned to:</label>
    <select class="form-control" placeholder="select a name" name="user_id" id="demoselect1">
    <option><option>
    <!--for head list-->
    @foreach($head as $user)
    @if($user->id!=1)
    <option value="{{$user->id}}"  >{{$user->name}}</option>
    @endif
    @endforeach
    </select>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-3" for="name">Submission Date:</label>
      <input type="date" class="form-control" id="name"  name="submission" >
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
$("#demoselect1").select2({
    placeholder: 'Select a Name',
    allowClear: true
});
</script>
@endsection