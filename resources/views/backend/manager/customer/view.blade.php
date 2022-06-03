@extends('backend.manager.master_manager') 
@section('content')
<style type="text/css">
body {
  color: #1a202c;
  text-align: left;
  background-color: #e2e8f0;
}

.main-body {
  padding: 15px;
}

.card {
  box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
}

.card {
  position: relative;
  display: flex;
  flex-direction: column;
  min-width: 0;
  word-wrap: break-word;
  background-color: #fff;
  background-clip: border-box;
  border: 0 solid rgba(0, 0, 0, .125);
  border-radius: .25rem;
}

.card-body {
  flex: 1 1 auto;
  min-height: 1px;
  padding: 1rem;
}

.gutters-sm {
  margin-right: -8px;
  margin-left: -8px;
}

.gutters-sm>.col,
.gutters-sm>[class*=col-] {
  padding-right: 8px;
  padding-left: 8px;
}

.mb-3,
.my-3 {
  margin-bottom: 1rem!important;
}

.bg-gray-300 {
  background-color: #e2e8f0;
}

.h-100 {
  height: 100%!important;
}

.shadow-none {
  box-shadow: none!important;
}
</style>
<form class="customer" method="POST" action="{{url('manager/customers/view')}}/{{$data[0]->id}}" enctype="multipart/form-data"> {{csrf_field()}}
  <div class="container">
    <div class="main-body">
      <nav aria-label="breadcrumb" class="main-breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page">Customer Details</li>
        </ol>
      </nav>
      <div class="row gutters-sm">
        <div class="col-md-4 mb-3">
          <div class="card">
            <div class="card-body">
              <div class="d-flex flex-column align-items-center text-center"> <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" style="border-radius: 25px;" width="150">
                <div class="mt-3">
                  <h4> {{ $data[0]->fname}}</h4>
                  <p class="text-secondary mb-1">{{ $data[0]->mobile}}</p>
                  <p class="text-muted font-size-sm">{{ $data[0]->email}}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-8">
          <div class="card mb-3">
            <div class="card-body">
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Full Name</h6> </div>
                <div class="col-sm-9 text-secondary"> {{ $data[0]->fname}} {{ $data[0]->lname}} </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Email</h6> </div>
                <div class="col-sm-9 text-secondary"> {{ $data[0]->email}} </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">NIC</h6> </div>
                <div class="col-sm-9 text-secondary"> {{ $data[0]->nic}} </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Mobile</h6> </div>
                <div class="col-sm-9 text-secondary"> {{ $data[0]->mobile}} </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Address</h6> </div>
                <div class="col-sm-9 text-secondary"> {{$data[0]->line1}}, {{$data[0]->line2}}, {{$data[0]->city}}, {{$data[0]->district}}, {{$data[0]->province}}, {{$data[0]->country}} {{$data[0]->zipcode}} </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Gender</h6> </div>
                <div class="col-sm-9 text-secondary"> @if ($data[0]->gender == 1) Male @elseif ($data[0]->gender == 0) Female @endif </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Check In</h6> </div>
                <div class="col-sm-9 text-secondary"> {{ $data[0]->checkin}} </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Check Out</h6> </div>
                <div class="col-sm-9 text-secondary"> {{ $data[0]->checkout}} </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Room Type</h6> </div>
                <div class="col-sm-9 text-secondary"> @if ($data[0]->room_type_id == 1) Single @elseif ($data[0]->room_type_id == 2) Double @elseif ($data[0]->room_type_id == 3) Family @elseif ($data[0]->room_type_id == 4) Suite @else ($data[0]->room_type_id == 5) Double Extra @endif </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Room No</h6> </div>
                <div class="col-sm-9 text-secondary"> {{ $data[0]->room_name}} </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Smoking</h6> </div>
                <div class="col-sm-9 text-secondary"> {{ $data[0]->smoking}} </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Use Wifi</h6> </div>
                <div class="col-sm-9 text-secondary"> {{ $data[0]->wifi}} </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">No of Guest</h6> </div>
                <div class="col-sm-9 text-secondary"> {{ $data[0]->no_of_guest}} </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Status</h6> </div>
                <div class="col-sm-9 text-secondary"> @if ($data[0]->status == 1) <span class="badge badge-success">Active</span> @elseif ($data[0]->status == 0) <span class="badge badge-danger">Inactive</span> @else @endif </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-12"> <a class="btn btn-info " href="{{url('manager/customers/edit')}}/{{$data[0]->id}}">Edit</a> </div>
              </div>
            </div>
          </div>
          <div class="row gutters-sm"> </div>
        </div>
      </div>
    </div>
  </div>
</form> @stop