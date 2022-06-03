@extends('backend.manager.layout.master') 
@section('content')
<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"></h1> </div>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h5 class="m-0 font-weight-bold text-dark">Edit Room</h5> </div>
    <div class="card-body">
      <form method="post" action="{{url('manager/room/details/update')}}/{{$room[0]->id}}" enctype="multipart/form-data"> {{ csrf_field() }}
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputState">Room Type</label>
            <select id="inputState" name="type" class="form-control" value="{{$room[0]->room_type_id}}">
              <option>Select a Room Type</option>
                <option value="Single" {{$data->room_type_id=='1'?'selected':''}}>Single</option>
                  <option value="Double" {{$data->room_type_id=='2'?'selected':''}}>Double</option>
                  <option value="Family" {{$data->room_type_id=='3'?'selected':''}}>Family</option>
                  <option value="Suite" {{$data->room_type_id=='4'?'selected':''}}>Suite</option>
                  <option value="Double extra" {{$data->room_type_id=='5'?'selected':''}}>Double extra</option>
                  </select> 
              @error('type')
            <div class="alert" style="color: red;padding-left: 0px;">{{ $message }}</div> @enderror </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputEmail4">Price</label>
            <input type="text" class="form-control" id="price" name="price" placeholder="" value="{{$room[0]->price}}"> @error('price')
            <div class="alert" style="color: red;padding-left: 0px;">{{ $message }}</div> @enderror </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputEmail4">Description</label>
          <input type="text"class="form-control" id="des" name="des" placeholder="" value="{{$room[0]->description}}"> 
            <!-- <textarea rows="4" cols="50" name="des" class="form-control" value="{{$room[0]->description}}"></textarea> -->
            <!-- <input type="text" class="form-control" id="name" name="des" placeholder=""> -->@error('des')
            <div class="alert" style="color: red;padding-left: 0px;">{{ $message }}</div> @enderror </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputEmail4">Facilities</label>
            <input type="text"class="form-control" id="facility" name="facility" placeholder="" value="{{$room[0]->facilities}}">
            <!-- textarea rows="3" cols="50" name="facility" class="form-control" value="{{$room[0]->facilities}}"></textarea> -->
            <!-- <input type="text" class="form-control" id="name" name="des" placeholder=""> -->@error('facility')
            <div class="alert" style="color: red;padding-left: 0px;">{{ $message }}</div> @enderror </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputZip">Room Image</label>
            <input type="file" name="image" style="text-align: center;" id="input-file-now-custom-2 " class="dropify" data-max-file-size="1M" data-max-height="3000" data-height="200" data-default-file="{{url('Upload/Rooms/'.$room[0]->image)}}"/> @error('image')
            <div class="alert" style="color: red;padding-left: 0px;">{{ $message }}</div> @enderror </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputEmail4">Room No</label>
            <input type="text" class="form-control" id="name" name="room_no" placeholder="" value="{{$room[0]->room_no}}"> @error('room_no')
            <div class="alert" style="color: red;padding-left: 0px;">{{ $message }}</div> @enderror </div>
        </div>
        <div class="form-group"></div>
        <button type="submit" class="btn btn-dark">Submit</button>
        </form>
    </div>
  </div>
</div>
@stop