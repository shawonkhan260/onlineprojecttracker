@extends('manager.base')

@section('content')

<div class="container">
<div class="row">
<div class="offset-sm-2 col-sm-8">
  <h2>Assign Task</h2>
  <form class="form-horizontal" action="{{route('taskassignupdate', $task->id)}}" method="POST">
  {{csrf_field()}}
  @method('PATCH')
    <div class="form-group">
      <label class="control-label col-sm-2" for="name">Task Name:</label>
      <input type="text" class="form-control" id="name" value="{{$task->name}}" name="name" readonly>
    </div>
    
    <div class="form-group">
    <label class="control-label col-sm-2" for="user_id">Assigned to:</label>
    <select class="form-control" placeholder="select a name" name="user_id" id="demoselect1">
        <?php 
        $a=Auth::user()->id;
        $user=App\Group::where('manager_id',$a)->first();
        ?>
        @if($user->division_id!='1')
    <option></option>
    @if($task->user_id!='')
    <option value="{{$task->user_id}}" selected>{{$employees->users->find($task->user_id)->name}}<option>
    @else
    @endif
    @else
    <option></option>
    @if($task->qa!='')
    <option value="{{$task->qa}}" selected>{{$employees->users->find($task->qa)->name}}<option>
    @else
    @endif
    @endif

    <!--for managers list-->
    @foreach($employees->users as $user)
    <option value="{{$user->id}}"  >{{$user->name}}</option>
    @endforeach
    </select>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-3" for="name">Submission Date:</label>
      <input type="date" class="form-control" id="name" value="{{$task->submission}}" name="submission" >
    </div>
    <input type="hidden"  value="{{$task->module_id}}" name="module_id" >
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
$("#demoselect1").select2({
    
    allowClear: true
});
</script>
@endsection

