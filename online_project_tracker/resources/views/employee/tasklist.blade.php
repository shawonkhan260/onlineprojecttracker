@extends('employee.base')

@section('content')


      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <table class="table table-hover table-bordered text-center" id="sampleTable">
                <thead class="bg-primary">
                  <tr>
                    <th>serial</th>
                    <th>Task Name</th>
                    <th>status</th>
                    <th>submission date</th>
                    <th>Action</th>
                    
                    
                  </tr>
                </thead>
                <tbody>
                <?php $id=1 ?>  
                @foreach($tasks as $task)
                @if($g!=1)
                    @if($task->status!='submitted' and $task->status!='varified' )
                  <tr>
                    <td>{{$id}}</td>
                    <td>{{$task->name}}</td>
                    <td>{{$task->status}}</td>
                    <td>{{$task->submission}}</td>
                    <td style="width: 400px;">
                    <a href="{{route('employeetask.edit',[$task->id])}}" class="btn btn-md btn-info fa fa-edit fa-lg" > submit </a> 
                    <a href="{{route('employeetask.show',[$task->id])}}" class="btn btn-md btn-success fa fa-eye fa-lg" > details </a> 
                    </td>
                  </tr>
                  @else
                  @endif
                    @else
                    @if($task->status=='submitted')
                    <tr>
                    <td>{{$id}}</td>
                    <td>{{$task->name}}</td>
                    <td>{{$task->status}}</td>
                    <td>{{$task->submission}}</td>
                    <td style="width: 400px;">
                    <a href="{{route('employeetask.edit',[$task->id])}}" class="btn btn-md btn-info fa fa-edit fa-lg" > varify </a> 
                    <a href="{{route('employeetask.show',[$task->id])}}" class="btn btn-md btn-success fa fa-eye fa-lg" > details </a> 
                    </td>
                    </tr>
                    @endif
                    @endif
                 
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