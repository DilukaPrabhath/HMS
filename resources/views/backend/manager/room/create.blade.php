@extends('backend.manager.master_manager')
@section('content')
<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"></h1> </div>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h5 class="m-0 font-weight-bold text-dark">Add Room</h5> </div>
    <div class="card-body">
      <form method="post" action="{{url('manager/room/save')}}" enctype="multipart/form-data"> {{ csrf_field() }}
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputState">Room Type</label>
            <select id="inputState" name="type" class="form-control">
              <option>Select a Room Type</option> @foreach(App\room_type::all() as $data)
              <option value="{{$data->id}}">{{$data->room_type}}</option> @endforeach </select> @error('type')
            <div class="alert" style="color: red;padding-left: 0px;">{{ $message }}</div> @enderror </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputEmail4">Description</label>
            <textarea rows="4" cols="50" name="des" class="form-control"></textarea>
            <!-- <input type="text" class="form-control" id="name" name="des" placeholder=""> -->@error('des')
            <div class="alert" style="color: red;padding-left: 0px;">{{ $message }}</div> @enderror </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputEmail4">Facilities</label>
            <textarea rows="3" cols="50" name="facility" class="form-control"></textarea>
            <!-- <input type="text" class="form-control" id="name" name="des" placeholder=""> -->@error('facility')
            <div class="alert" style="color: red;padding-left: 0px;">{{ $message }}</div> @enderror </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputZip">Room Image</label>
            <input type="file" name="image" style="text-align: center;" id="input-file-now-custom-2 " class="dropify" data-max-file-size="1M" data-max-height="3000" data-height="200" /> @error('image')
            <div class="alert" style="color: red;padding-left: 0px;">{{ $message }}</div> @enderror </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputEmail4">Room No</label>
            <input type="text" class="form-control" id="name" name="room_no" placeholder=""> @error('room_no')
            <div class="alert" style="color: red;padding-left: 0px;">{{ $message }}</div> @enderror </div>
        </div>
        <div class="form-group"></div>
        <button type="submit" class="btn btn-dark">Submit</button>
    </form>
    </div>
  </div>
</div>
@stop