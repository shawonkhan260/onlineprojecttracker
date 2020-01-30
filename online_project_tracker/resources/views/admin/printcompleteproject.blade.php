@extends('admin.base')
<style>
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  text-align: center;
  width: 100%;
}
#customers tr:nth-child(even)
{
    background-color: #f2f2f2;
    -webkit-print-color-adjust: exact;
    }
#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: center;
  background-color: #4CAF50;
  color: white;
  -webkit-print-color-adjust: exact;
}
</style>
@section('content')

            <div class="row d-print-none mt-2">
                <div class="col-12 text-left"><a class="btn btn-primary"  href="javascript:window.print();" target="_blank"><i class="fa fa-print"></i> Print</a></div>
            </div>
          <h2 style="text-align:center">Completed Project list {{$date}}</h2>
            <div class="tile-body">
              <table  id="customers">
                <thead >
                  <tr >
                    <th>serial</th>
                    <th>Project Name</th>
                    <th>Status</th>
                    <th>Assigned Department</th>
                    <th>client</th>
                    <th>Entry date</th>
                    <th>Completed date</th>
                    
                    
                  </tr>
                </thead>
                <tbody>
                <?php $id=1?>  <!--  $id=$datas->firstItem() without that serial will not appear and for that in controller use paginate()-->
                @foreach($datas as $data)
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
                    @endif
                   <td>
                   @if($data->client_id!="")
                   {{App\Client::find($data->client_id)->name}}
                   @endif
                   </td>
                    <td>{{$data->created_at->toDateString()}}</td>
                    <td>{{$data->updated_at->toDateString()}}</td>
                  </tr>
                  <?php ++$id?>
                
                @endforeach  
                  
                </tbody>
              </table>
            </div>
          
          
      
@endsection
@section('extra')
@endsection

