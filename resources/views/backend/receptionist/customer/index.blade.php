@extends('backend.receptionist.master_receptionist') 
@section('content')
<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"></h1>
</div>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <table width="100%">
        <tr>
          <td>
            <h5 class="m-0 font-weight-bold text-dark col-md-4">Customer Table</h5></td>
        </tr>
      </table>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="example2" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th></th>
              <th>Name</th>
              <th>NIC</th>
              <th>Mobile No</th>
              <th>CheckIn</th>
              <th>CheckOut</th>
              <th>Room Type</th>
              <th>Room No</th>
              <th>No of Guest</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead> @foreach($customers as $value)
          <tr>
            <td></td>
            <td>{{$value->fname}} {{$value->lname}}</td>
            <td>{{$value->nic}}</td>
            <td>{{$value->mobile}}</td>
            <td>{{ \Carbon\Carbon::parse($value->checkin)->format('d/m/Y H:i:s A')}}</td>
            <td>{{ \Carbon\Carbon::parse($value->checkout)->format('d/m/Y H:i:s A')}}</td>
            <td> @if ($value->room_type_id == 1) 
              <span class="badge badge-success">Single</span> 
              @elseif ($value->room_type_id == 2) 
              <span class="badge badge-warning">Double</span> 
              @elseif ($value->room_type_id == 3) 
              <span class="badge badge-secondary">Family</span> 
              @elseif($value->room_type_id == 4) 
              <span class="badge badge-danger">Suite</span> 
              @elseif($value->room_type_id == 5) 
              <span class="badge badge-primary">Double Extra</span> 
            @else 
            @endif 
          </td>
            <td>{{$value->room_name}}</td>
            <td>{{$value->no_of_guest}}</td>
            <td> @if ($value->status == 1) <span class="badge badge-success">Active</span> @elseif ($value->status == 0) <span class="badge badge-danger">Inactive</span> @else @endif </td>
            <td class="project-actions">
              <a class="btn btn-info btn-circle btn-sm" href="{{url('receptionist/customers/view')}}/{{$value->id}}"> <i class="fa fa-eye">
                              </i> </a>
            </td>
          </tr> @endforeach </tbody>
        </table>
      </div>
    </div>
  </div>
</div> 
@stop