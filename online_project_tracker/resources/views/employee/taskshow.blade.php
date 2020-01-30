@extends('admin.base')

@section('content')


<div class="col-md-8 offset-md-2" style="font-size:1.5em">
    <div class="tile">
    <h3 class="tile-title">Task Information</h3>
    <div class="tile-body">
        <form class="form-horizontal" >
        <div class="form-group row">
            <label class="control-label col-md-3">Task Name</label>
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

        <div class="form-group row">
            <label class="control-label col-md-3">submission date</label>
            <div class="col-md-8">
            {{$data->submission}}
            </div>
        </div>
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
                    <th>Details</th>
                    <th>Bug</th>
                    <th>submit date</th>
                    <th>Action</th>
                    
                    
                  </tr>
                </thead>
                <tbody>
                <?php $id=1 ;
                $tasks=App\submittask::where('task_id',$data->id)->get()
                ?>  
                @foreach($tasks as $task)
                  <tr>
                    <td>{{$id}}</td>
                    <td>{{$task->details}}</td>
                    <td>@if($task->bug!="")
                    {{$task->bug}}
                    @else
                    bug free
                    @endif
                    </td>
                    <td>{{$task->created_at->toDateString()}}</td>
                    <td >
                    <a href="{{Storage::url($task->file)}}" class="btn btn-md btn-success fa fa-download fa-lg" download> download </a> 
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
</div>
@endsection