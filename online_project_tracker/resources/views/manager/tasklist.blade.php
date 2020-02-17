
@extends('manager.base')

@section('content')

    <div class="tile">
    <h3 class="tile-title">Module Information</h3>
    <div class="tile-body">
        <form class="form-horizontal" action="{{route('task.create')}}" method="GET" >
        {{csrf_field()}}
        <div class="form-group row">
            <label class="control-label col-md-3">Module Name</label>
            <div class="col-md-8">
            {{$data->name}}
            </div>
        </div>
        <div class="form-group row">
            <label class="control-label col-md-3">Details</label>
            <div class="col-md-8">
            {{$data->details}}
            </div>
        </div>
        <input type="hidden" value="{{$data->id}}" name="id">

        <?php 
        $a=Auth::user()->id;
        $user=App\Group::where('manager_id',$a)->first();
        ?>
        @if($user->division_id!='1')
        <div class="form-group">        
            <button type="submit" class="btn btn-primary">Add new task</button>
        </div>
        @endif
        </form>
        </div>
    </div>


      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <table class="table table-hover table-bordered text-center" id="sampleTable">
                <thead class="bg-primary">
                  <tr>
                    <th>serial</th>
                    <th>task Name</th>
                    <th>Assigned to</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php $id=1?> 
                @foreach($tasks as $task)
                  <tr>
                    <td>{{$id}}</td>
                    <td>{{$task->name}}</td>
                    <td>
                    @if($user->division_id!='1')
                    @if($task->user_id!="")
                    {{ App\User::findOrFail($task->user_id)->name }}
                    @else
                    empty
                    @endif

                    @else
                    @if($task->qa!="")
                    {{ App\User::findOrFail($task->qa)->name }}
                    @else
                    empty
                    @endif
                    @endif
                    </td>

                   
                    <td style="width: 500px;">
                    @if($user->division_id!='1')
                    @if($task->user_id!="")
                     @else 
                     <a href="{{route('taskassign',[$task->id])}}" class="btn btn-md btn-success fa fa-chain fa-lg" >  Assign </a> 
                     @endif 
                    <a href="{{route('task.edit',[$task->id])}}" class="btn btn-md btn-info fa fa-edit fa-lg" > Edit</a> 
                    @if($task->status!="varified")
                    <form style="display:inline" action="{{route('task.destroy',[$task->id])}}" method="post">
                        @csrf   
                        @method('DELETE')
                        <button class="btn btn-danger fa fa-trash fa-lg" type="submit"> Delete </button>
                    </form>
                    @endif
                    @else
                    <a href="{{route('taskassign',[$task->id])}}" class="btn btn-md btn-success fa fa-chain fa-lg" >  Assign </a> 
                    @endif
                    <a href="{{route('employeetask.show',[$task->id])}}" class="btn btn-md btn-success fa fa-eye fa-lg" > details </a> 
                    </td>
                  </tr>
                  <?php ++$id?>
                @endforeach  
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    
           
@endsection
@section('extra')
    <script type="text/javascript" src="{{asset('/template/js/plugins/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/template/js/plugins/dataTables.bootstrap.min.js')}}"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
@endsection