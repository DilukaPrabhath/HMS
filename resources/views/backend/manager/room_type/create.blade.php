@extends('backend.manager.master_manager')
@section('content')
<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"></h1> </div>
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Add Room Type</h6> </div>
    <div class="card-body">
      <form method="post" action="{{url('manager/room_type/save')}}" enctype="multipart/form-data"> {{ csrf_field() }}
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputEmail4">Room Type</label>
            <input type="text" class="form-control" id="name" name="typename" placeholder=""> @error('typename')
            <div class="alert" style="color: red;padding-left: 0px;">{{ $message }}</div> @enderror </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputZip">Icon</label>
            <input type="file" name="icon" style="text-align: center;" id="input-file-now-custom-2 " class="dropify" data-max-file-size="1M" data-max-height="3000" data-height="200" /> @error('icon')
            <div class="alert" style="color: red;padding-left: 0px;">{{ $message }}</div> @enderror </div>
        </div>
        <div class="form-group"> </div>
        <button type="submit" class="btn btn-primary">Submit</button> <a href="{{url('manager/portfolio')}}" class="btn btn-info">Back</a> </form>
    </div>
  </div>
</div>
@stop