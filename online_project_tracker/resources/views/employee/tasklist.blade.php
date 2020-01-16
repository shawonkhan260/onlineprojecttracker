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
                    <th>submission date</th>
                    <th>Action</th>
                    
                    
                  </tr>
                </thead>
                <tbody>
                <?php $id=1 ?>  
                @foreach($tasks as $task)
                  <tr>
                    <td>{{$id}}</td>
                    <td>{{$task->name}}</td>
                    <td>{{$task->submission}}</td>
                    <td style="width: 400px;">
                    @if($task->file!='')
                    <a href="{{route('employeetask.edit',[$task->id])}}" class="btn btn-md btn-warning fa fa-edit fa-lg" > Resubmit </a> 
                    @else
                    <a href="{{route('employeetask.edit',[$task->id])}}" class="btn btn-md btn-info fa fa-edit fa-lg" > submit </a> 
                    @endif
                    <a href="{{route('employeetask.show',[$task->id])}}" class="btn btn-md btn-success fa fa-comment fa-lg" > details </a> 
                    
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