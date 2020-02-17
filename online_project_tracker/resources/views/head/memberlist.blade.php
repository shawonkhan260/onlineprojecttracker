@extends('head.base')

@section('content')




 
  <!-- Button to Open the Modal -->
  <button type="button" class="btn btn-primary fa fa-plus fa-lg" data-toggle="modal" data-target="#myModal">
    Add New Team Member
  </button>
  <hr>

  <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">add member</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="container">
        <form class="form-horizontal" action="{{route('memberadd')}}" method="POST">
  {{csrf_field()}}

  <!--Drop down for employee-->
    <div class="form-group">
    <label class="control-label col-sm-2" for="user_id">Select member:</label>
    <select class="form-control" style="width:100%" placeholder="select a name" required name="user_id" id="demoselect1">
    <option></option>
    <!--for employee list-->
    @foreach($employees->users as $user)

    @if(!App\User::has('groups')->find($user->id)) <!--skip assigned employee list from all group-->
    <option value="{{$user->id}}"  >{{$user->name}}</option>
    @else
    
    @endif
    @endforeach
    </select>
    </div>
    <input type="hidden"  value="{{$id}}" name="group_id" >

    <div class="modal-footer">
    <div class="form-group">        
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
        </div>
        <form>
        </div>
        
        
        
      </div>
    </div>
  </div>
  

  <h2>Team Member List</h2>
<!-- Member list-->
<div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <table class="table table-hover table-bordered text-center" id="sampleTable">
                <thead class="bg-primary">
                  <tr>
                    <th>serial</th>
                    <th>Member name</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php $id=1?>  
                @foreach( $members->users as $user)
                  <tr>
                    <td>{{$id}}</td>
                    <td>
                    {{$user->name}}
                    </td>
                    <td><a href="{{route('memberdestroy',[$user->id])}}" class="btn btn-md btn-danger fa fa-trash fa-lg" > delete </a> </td>
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

    <script type="text/javascript" src="{{asset('/template/js/plugins/select2.min.js')}}"></script>
<script type="text/javascript">
//$("#demoselect1").select2();
$("#demoselect1").select2({
    placeholder: 'Select a Name',
    allowClear: true
});
</script>
@endsection