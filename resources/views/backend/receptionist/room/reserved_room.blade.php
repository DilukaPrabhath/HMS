@extends('backend.receptionist.master_receptionist') 
@section('content')
<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"></h1> </div>
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"></h1>
   </div>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <table width="100%">
        <tr>
          <td>
            <h5 class="m-0 font-weight-bold text-dark col-md-4">Reserved Rooms</h5></td>
        </tr>
      </table>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="example2" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th></th>
              <th>Customer Name</th>
              <th>Customer NIC</th>
              <th>Room Type</th>
              <th>Room No</th>
              <th>Room Availability</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody> @foreach($rooms as $value)
            <tr>
              <td></td>
              <td>{{$value->fname}} {{$value->lname}}</td>
              <td>{{$value->nic}}</td>
              <td> @if ($value->room_type_id == 1) 
                <span class="badge badge-success">Single</span> 
                @elseif ($value->room_type_id == 2) 
                <span class="badge badge-warning">Double</span> 
                @elseif ($value->room_type_id == 3) 
                <span class="badge badge-secondary">Family</span> 
                @elseif ($value->room_type_id == 4) 
                <span class="badge badge-danger">Suite</span> 
                @else ($value->room_type_id == 5) 
                <span class="badge badge-primary">Double Extra</span> 
              @endif 
              </td>
              <td>{{$value->room_name}}</td>
              <td> @if ($value->status == 1) 
                <span class="badge badge-success">Available</span> 
                @elseif ($value->status == 0) 
                <span class="badge badge-danger">Not Available</span> 
              @endif 
              </td>
              <td class="project-actions">
                <a class="btn btn-danger btn-circle btn-sm" href="{{url('receptionist/reserveroom/edit')}}/{{$value->id}}"> <i class="fa fa-edit" aria-hidden="true"></i> </i>
                </a>
              </td>
            </tr> @endforeach </tbody>
        </table>
      </div>
    </div>
  </div>
</div> @stop