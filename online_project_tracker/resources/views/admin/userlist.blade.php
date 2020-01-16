@extends('admin.base')

@section('content')




      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <table class="table table-hover table-bordered text-center" id="sampleTable">
                <thead class="bg-primary">
                  <tr>
                    <th>serial</th>
                    <th>Name</th>
                    <th>Role</th>
                    <th>Action</th>
                    
                    
                  </tr>
                </thead>
                <tbody>
                <?php $id=$datas->firstItem()?>  
                @foreach($datas as $data)
                  <tr>
                    <td>{{$id}}</td>
                    <td>{{$data->name}}</td>
                    <td>@foreach($data->roles as $role)
                    {{
                        $role->name
                    }}
                    @endforeach
                    </td>
                    <td style="width: 400px;">
                    
                    @if($role->name!='admin'or $role->name='')
                    <a href="{{route('user.edit',[$data->id])}}" class="btn btn-md btn-success fa fa-edit fa-lg" > Change Role </a> 
                    
                    <form style="display:inline" action="{{route('user.destroy',[$data->id])}}" method="post">
                        @csrf   
                        @method('DELETE')
                        <button class="btn btn-danger fa fa-trash fa-lg" type="submit">Delete</button>
                        </form>
                    @else
                    @endif
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