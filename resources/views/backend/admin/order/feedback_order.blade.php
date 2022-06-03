@extends('backend.admin.layout.master') 
@section('content')
<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"></h1> </div>
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <table width="100%">
        <tr>
          <td>
            <h5 class="m-0 font-weight-bold text-dark col-md-4">Feedback</h5></td>
          <td>
            <h6 class="m-0 font-weight-bold text-dark col-md-4 float-right" id="empname"></h6></td>
        </tr>
      </table>
    </div>
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
      <form method="post" action="{{url('admin/feedback/save')}}" enctype="multipart/form-data"> {{ csrf_field() }}
        <div class="form-group row">
          <div class="col-sm-6 mb-3 mb-sm-0">
            <label for="inputEmail4">User Type</label>
            <select class="form-control dynamic" name="user_type_id" id="user_type_id" type="select" data-dependent="emp_no" required>
              <option>Job Role</option> @foreach(App\user_type::all() as $data)
              <option value="{{$data->id}}">{{$data->user_type}}</option> @endforeach </select>
          </div>
          <div class="col-sm-6">
            <label for="inputEmail4">User ID</label>
            <select class="form-control" name="emp_no" id="emp_no" type="select">
              <option value="" selected="">Select User ID</option>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <div class="form-group col-md-6">
            <label for="inputEmail4">Message</label>
            <textarea rows="3" cols="50" name="message" class="form-control"></textarea>
            <!-- <input type="text" class="form-control" id="name" name="des" placeholder=""> -->@error('message')
            <div class="alert" style="color: red;padding-left: 0px;">{{ $message }}</div> @enderror </div> @foreach($feedback as $value)
          <div class="col-sm-6">
            <label for="inputEmail4">Order Id</label>
            <input type="text" class="form-control " id="orderid" name="orderid" placeholder="Order ID" readonly="" value="{{$value->orderidview}}"> </div>
        </div> @endforeach
        <div class="form-row">
          <button type="submit" class="btn btn-dark">Send</button>
        </div>
        <div class="form-group"> </div>
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
        url: "/dynamic_dependent/fetchuser",
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
$(document).ready(function() {
  $('#emp_no').change(function() {
    if($(this).val() != '') {
      var select = $(this).val();
      console.log(select);
      var _token = $('input[name="_token"]').val();
      $.ajax({
        url: "/dynamic_dependent/fetchname",
        method: "POST",
        data: {
          select: select,
          _token: _token
        },
        success: function(result) {
          console.log(result);
          document.getElementById('empname').innerHTML = result;
        }
      })
    }
  });
});
</script> 
@stop