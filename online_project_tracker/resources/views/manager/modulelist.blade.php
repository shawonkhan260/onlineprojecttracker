
@extends('manager.base')

@section('content')
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <table class="table table-hover table-borderless text-center" id="sampleTable">
                <thead class="bg-primary">
                  <tr>
                    <th>serial</th>
                    <th>Module Name</th>
                    <th>Status</th>
                    <th>Action</th>
                    
                    
                  </tr>
                </thead>
                <tbody>
                <?php $id=1?>
                @foreach($datas as $data)
                @if($data->status!='completed')
                  <tr @if($data->status=="new") style="font-weight: bold;  background-color:rgba(255, 255, 0, 0.5)" @endif>
                    <td>{{$id}}</td>
                    <td>{{$data->name}}</td>
                    <td>{{$data->status}}</td>
                    <td style="width: 400px;">
                    <a href="{{route('tasklist',[$data->id])}}" class="btn btn-md btn-info fa fa-list fa-lg" > task List </a> 
                   
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