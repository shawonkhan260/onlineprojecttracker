@extends('admin.base')

@section('content')

<div class="container">
<div class="row">
<div class="offset-sm-2 col-sm-8">
  <h2>Edite Division</h2>
  <form class="form-horizontal" action="{{route('user.update', $data->id)}}" method="POST">
  {{csrf_field()}}
  @method('PATCH')
    <div class="form-group">
      <label class="control-label col-sm-3" for="name">Name:</label>
      <input type="text" class="form-control" id="name" value="{{$data->name}}" name="name">
    </div>
    <div class="form-group">
    <label class="control-label col-sm-3" for="role_id">Role:</label>
    <select class="form-control"  name="role_id" id="demoselect">
    <option></option>
    <!--which role user has-->
    @foreach($data->roles as $role)
    @if($role!="")
    <option value="{{$role->id}}" selected>{{  $role->name}}<option>
    @else
    @endif
    @endforeach
    <!--for role list-->
    @foreach($roles as $role)
    <!--for hide admin role list-->
    @if($role->name!='admin' )
    <option value="{{$role->id}}">{{$role->name}}</option>
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
    placeholder: 'Select a Name',
    allowClear: true
});
</script>
@endsection

