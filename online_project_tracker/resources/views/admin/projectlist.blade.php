
@extends('admin.base')

@section('content')

<a href="{{route('project.create')}}" class="btn btn-lg btn-success m-3 fa fa-plus fa-lg" >Add new Project</a>


      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <table class="table table-hover table-bordered text-center" id="sampleTable">
                <thead class="bg-primary">
                  <tr>
                    <th>serial</th>
                    <th>Project Name</th>
                    <th>Client name</th>
                    <th>Assigned to</th>
                    <th>Action</th>
                    
                    
                  </tr>
                </thead>
                <tbody>
                <?php $id=1?>  <!--  $id=$datas->firstItem() without that serial will not appear and for that in controller use paginate()-->
                @foreach($datas as $data)
                  <tr>
                    <td>{{$id}}</td>
                    <td>{{$data->name}}</td>

                    <td>
                    @if($data->client_id!="")
                    {{ App\Client::findOrFail($data->client_id)->name }}
                    @else
                    empty
                    @endif
                   </td>
                   <td>
                    @if($data->user_id!="")
                    {{ App\User::findOrFail($data->user_id)->name }}
                    @else
                    empty
                    @endif
                   </td>

                    <td style="width: 400px;">
                    <a href="{{route('project.show',[$data->id])}}" class="btn btn-md btn-info fa fa-eye fa-lg" > view </a> 
                    <a href="{{route('project.edit',[$data->id])}}" class="btn btn-md btn-success fa fa-edit fa-lg" > edit </a> 
                    
                    <form style="display:inline" action="{{route('project.destroy',[$data->id])}}" method="post">
                        @csrf   
                        @method('DELETE')
                        <button class="btn btn-danger fa fa-trash fa-lg" type="submit">Delete</button>
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