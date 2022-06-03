@extends('backend.admin.layout.master') @section('content')
<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"></h1> </div>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Add Room Facilities</h6> </div>
    <div class="card-body">
      <form method="post" action="{{url('admin/facility/save')}}" enctype="multipart/form-data"> {{ csrf_field() }}
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputEmail4">Facility Type</label>
            <input type="text" class="form-control" id="name" name="facility" placeholder=""> @error('facility')
            <div class="alert" style="color: red;padding-left: 0px;">{{ $message }}</div> @enderror </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputZip">Icon</label>
            <input type="file" name="icon" style="text-align: center;" id="input-file-now-custom-2 " class="dropify" data-max-file-size="1M" data-max-height="3000" data-height="200" /> @error('image')
            <div class="alert" style="color: red;padding-left: 0px;">{{ $message }}</div> @enderror </div>
        </div>
        <div class="form-group"> </div>
        <button type="submit" class="btn btn-primary">Submit</button> <a href="{{url('admin/portfolio')}}" class="btn btn-info">Back</a> </form>
    </div>
  </div>
</div>
@stop