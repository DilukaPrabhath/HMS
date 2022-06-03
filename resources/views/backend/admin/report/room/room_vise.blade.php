@extends('backend.admin.layout.master') 
@section('content')
<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    </div>
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"></h1>
   </div>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <table width="100%">
        <tr>
          <td>
            <h5 class="m-0 font-weight-bold text-dark col-md-4">Room History Table</h5></td>
        <td><a href="{{url('admin/room_histroy')}}" class="btn btn-primary float-right">Export Data</a>
        </tr>
      </table>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="example3" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th></th>
              <th>Room No</th>
              <th>Customer Name</th>
              <th>NIC</th>
              <th>Mobile</th>
              <th>Email</th>
              <th>CheckIn</th>
              <th>CheckOut</th>
              <th>Create Date</th>
            </tr>
          </thead>
          <tbody> @foreach($roomhistroy as $value)
            <tr>
              <td></td>
              <td>{{$value->room_no}}</td>
              <td>{{$value->cust_fname}} {{$value->cust_lname}}</td>
              <td>{{$value->cust_nic}}</td>
              <td>{{$value->cust_mobile}}</td>
              <td>{{$value->cust_email}}</td>
              <td>{{ \Carbon\Carbon::parse($value->checkin)->format('d/m/Y H:i:s A')}}</td>
              <td>{{ \Carbon\Carbon::parse($value->checkout)->format('d/m/Y H:i:s A')}}</td>
              <td>{{ \Carbon\Carbon::parse($value->created_at)->format('d/m/Y H:i:s A')}}</td>
              
            </tr> @endforeach </tbody>
        </table>
      </div>
    </div>
  </div>
</div> 

@stop