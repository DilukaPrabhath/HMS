@extends('backend.admin.layout.master') 
@section('content')
<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"></h1> </div>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-dark">Release Room</h6> </div>
    <div class="card-body">
      <style type="text/css">
    .lb {
        text-align: center;
        color: blue;
      }
      
      .lb2 {
        color: black;
      }
    }
      </style>
      <form method="post" action="{{url('admin/room/edit/update')}}/{{$rooms[0]->id}}" enctype="multipart/form-data"> 
        {{ csrf_field() }}
        <label class="lb">Previous Room Details</label>
        <div class="form-group row">
          <div class="col-sm-6 mb-3 mb-sm-0">
            <label class="lb2">Customer Name</label>
            <input type="text" class="form-control" id="exampleFirstName" name="fname" value="{{$rooms[0]->fname}}" disabled> </div>
          <div class="col-sm-6">
            <label class="lb2">Customer NIC</label>
            <input type="text" class="form-control " id="exampleLastName" name="lname" value="{{$rooms[0]->nic}}" disabled> </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-6 mb-3 mb-sm-0">
            <label class="lb2">Room Type</label>
            <br> @if ($rooms[0]->room_type_id == 1) 
            <span class="badge badge-success">Single</span> 
            @elseif ($rooms[0]->room_type_id == 2) 
            <span class="badge badge-warning">Double</span> 
            @elseif ($rooms[0]->room_type_id == 3) 
            <span class="badge badge-secondary">Family</span> 
            @elseif ($rooms[0]->room_type_id == 4) 
            <span class="badge badge-danger">Suite</span> 
            @else ($rooms[0]->room_type_id == 5) 
            <span class="badge badge-primary">Double Extra</span> 
          @endif 
          </div>
          <div class="col-sm-6">
            <label class="lb2">Room No</label>
            <br> {{$rooms[0]->room_name}}
            <input type="hidden" class="form-control" id="oldroom" name="oldroom" value="{{$rooms[0]->room_no}}"> </div>
        </div>
        <label class="lb">Reserve New Room</label>
        <div class="form-group row">
          <div class="col-sm-6 mb-3 mb-sm-0">
            <select class="form-control dynamic" name="roomtype" id="room_type_id" type="select" data-dependent="room_no" required>
              <option>Select a Room Type</option> 
              @foreach(App\room_type::all() as $data)
              <option value="{{$data->id}}">{{$data->room_type}}</option> 
            @endforeach 
          </select>
          </div>
          <div class="col-sm-6">
            <select class="form-control" name="room_no" id="room_no" type="select">
              <option value="" selected="">Select Room No</option>
            </select>
          </div>
        </div>
        <div class="form-group"> </div>
        <button type="submit" class="btn btn-dark">Submit</button>
      </form>
    </div>
  </div>
</div>
<script>
$(document).ready(function() {
  $('.dynamic').change(function() {
    if($(this).val() != '') {
      var select = $(this).attr("id");
      var value = $(this).val();
      var dependent = $(this).data('dependent');
      var _token = $('input[name="_token"]').val();
      $.ajax({
        url: "{{ route('dynamicdependent.fetchroom') }}",
        method: "POST",
        data: {
          select: select,
          value: value,
          _token: _token,
          dependent: dependent
        },
        success: function(result) {
          $('#' + dependent).html(result);
        }
      })
    }
  });
});
</script> @stop