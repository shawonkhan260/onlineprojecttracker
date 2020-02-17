@extends('head.base')

@section('content')

<a href="{{route('group.create')}}" class="btn btn-lg btn-success m-3 fa fa-plus fa-lg" >Add new Team</a>


      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <table class="table table-hover table-bordered text-center" id="sampleTable">
                <thead class="bg-primary">
                  <tr>
                    <th>serial</th>
                    <th>Team Name</th>
                    <th>Team Leader</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php $id=$datas->firstItem()?>  
                @foreach($datas as $data)
                  <tr>
                    <td>{{$id}}</td>
                    <td>{{$data->name}}</td>
                    <td>
                    @if($data->manager_id!="")
                    {{   $user->findOrFail($data->manager_id)->name}}
                    @else
                    empty
                    @endif

                    </td>
                    <td style="width: 400px;">
                    <a href="{{route('memberlist',[$data->id])}}" class="btn btn-md btn-success fa fa-edit fa-lg" > member </a> 
                    <a href="{{route('group.edit',[$data->id])}}" class="btn btn-md btn-success fa fa-edit fa-lg" > edit </a> 
                    
                    <form style="display:inline" action="{{route('group.destroy',[$data->id])}}" method="post">
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