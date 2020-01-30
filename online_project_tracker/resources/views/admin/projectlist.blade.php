
@extends('admin.base')

@section('content')

<a href="{{route('project.create')}}" class="btn btn-lg btn-success m-3 fa fa-plus fa-lg" >Add new Project</a>
<form action="{{route('print')}}">
<div class="col-md-6">
<table>
<tr>
  <td><input class="form-control" type="month" name="date"></td>
  <td><button class="form-control btn btn-success " type="submit">print specific months data</button></td>
</tr>
</table>
</div>

</form>

      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <table class="table table-hover table-bordered text-center" id="sampleTable">
                <thead class="bg-primary">
                  <tr>
                    <th>serial</th>
                    <th>Project Name</th>
                    <th>Status</th>
                    <th>Assigned Department</th>
                    <th>client</th>
                    <th>Entry date</th>
                    <th>Action</th>
                    
                    
                  </tr>
                </thead>
                <tbody>
                <?php $id=1?>  <!--  $id=$datas->firstItem() without that serial will not appear and for that in controller use paginate()-->
                @foreach($datas as $data)
                @if($data->status!="completed")
                  <tr>
                    <td>{{$id}}</td>
                    <td>{{$data->name}}</td>

                    <td>
                    @if($data->status=="new")
                    @if($data->user_id!="")
                    Assigned
                    @else
                    Not Assigned
                    @endif
                    @else
                    {{$data->status}}
                    @endif
                   </td>
                   <td>
                    @if($data->user_id!="")
                    {{ App\Division::findOrFail($data->user_id)->name }}
                    @else
                    empty
                    @endif
                   </td>
                   <td>
                   @if($data->client_id!="")
                   {{App\Client::find($data->client_id)->name}}
                   @endif
                   </td>
                    <td>{{$data->created_at->toDateString()}}</td>

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
                  @endif
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