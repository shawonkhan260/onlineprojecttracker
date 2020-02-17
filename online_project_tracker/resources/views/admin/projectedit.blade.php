@extends('admin.base')

@section('content')

<div class="container">
<div class="row">
<div class="offset-sm-2 col-sm-8">
  <h2>Project Form</h2>
  <form class="form-horizontal" action="{{route('project.update', $id->id)}}" method="POST">
  {{csrf_field()}}
  @method('PATCH')

  <div class="form-group">
    <label class="control-label col-sm-2" for="client">client:</label>
    <select class="form-control"  name="client" id="demoselect">
    <option></option>
    @if($id->client_id!='')
    <option value="{{$id->client_id}}" selected>{{   App\Client::findOrFail($id->client_id)->name}}<option>
    @else
    @endif
    @foreach($datas as $data)
        <option value="{{$data->id}}"  > {{$data->name}}</option>
    @endforeach
    </select>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="name">Project Name:</label>
      <input type="text" class="form-control" id="name" value="{{$id->name}}" required name="name">
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="details">Details:</label>
      <textarea class="form-control" id="details" rows="4" value="" required name="details">{{$id->details}}</textarea>
    </div>

    <div class="form-group">
    <label class="control-label col-sm-2" for="user_id">Assigned to:</label>
    <select class="form-control" placeholder="select a name" name="user_id" id="demoselect1">
    <option></option>
    @if($id->user_id!='')
    <option value="{{$id->user_id}}" selected>{{$head->find($id->user_id)->name}}<option>
    @else
    @endif
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
      <input type="date" class="form-control" id="name"  name="submission" value="{{ $id->submission}}" >
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
$("#demoselect1").select2({
    
    allowClear: true
});
</script>
@endsection

