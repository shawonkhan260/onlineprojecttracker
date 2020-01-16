@extends('admin.base')

@section('content')

<a href="{{route('client.create')}}" class="btn btn-lg btn-success m-3 fa fa-plus fa-lg" >Add new client</a>


      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <table class="table table-hover table-bordered text-center" id="sampleTable">
                <thead class="bg-primary">
                  <tr>
                    <th>serial</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Action</th>
                    
                    
                  </tr>
                </thead>
                <tbody>
                <?php $id=$datas->firstItem()?>  
                @foreach($datas as $data)
                  <tr>
                    <td>{{$id}}</td>
                    <td>{{$data->name}}</td>
                    <td>{{$data->phone}}</td>
                    <td style="width: 400px;">
                    
                    <a href="{{route('client.edit',[$data->id])}}" class="btn btn-md btn-success fa fa-edit fa-lg" > edit </a> 
                    
                    <form style="display:inline" action="{{route('client.destroy',[$data->id])}}" method="post">
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