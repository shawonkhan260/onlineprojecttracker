
@extends('head.base')

@section('content')

    <div class="tile">
    <h3 class="tile-title">Project Information</h3>
    <div class="tile-body">
        <form class="form-horizontal" action="{{route('module.create')}}" method="GET" >
        {{csrf_field()}}
        <div class="form-group row">
            <label class="control-label col-md-3">Project Name</label>
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
        <div class="form-group">        
            <button type="submit" class="btn btn-primary">Add new module</button>
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
                    <th>Module Name</th>
                    <th>Assigned to</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php $id=1?> 
                @foreach($modules as $module)
                  <tr>
                    <td>{{$id}}</td>
                    <td>{{$module->name}}</td>
                    <td>@if($module->user_id!="")
                    {{ App\User::findOrFail($module->user_id)->name }}
                    @else
                    empty
                    @endif</td>

                   
                    <td style="width: 400px;">
                    @if($module->user_id!="")
                    <a href="{{route('moduleassign',[$module->id])}}" class="btn btn-md btn-Warning fa fa-chain fa-lg" >  Reassign </a> 
                     @else 
                     <a href="{{route('moduleassign',[$module->id])}}" class="btn btn-md btn-success fa fa-chain fa-lg" >  Assign </a> 
                     @endif 
                    <a href="{{route('module.edit',[$module->id])}}" class="btn btn-md btn-info fa fa-edit fa-lg" > Edit</a> 
                    <form style="display:inline" action="{{route('module.destroy',[$module->id])}}" method="post">
                        @csrf   
                        @method('DELETE')
                        <button class="btn btn-danger fa fa-trash fa-lg" type="submit"> Delete </button>
                    </form>
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