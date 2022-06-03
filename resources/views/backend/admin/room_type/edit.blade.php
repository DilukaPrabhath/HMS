@extends('backend.admin.layout.master') 
@section('content')
<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"></h1> </div>
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-dark">Edit Room Type</h6> </div>
    <div class="card-body">
      <form method="post" action="{{url('admin/room_type/edit/update')}}/{{$data->id}}" enctype="multipart/form-data"> {{ csrf_field() }}
        <input style="display: none" type="email" name="fakeusernameremembered" />
        <input style="display: none" type="password" name="fakepasswordremembered" />
        <div class="form-row">
          <div class="form-group col-md-6">
            <div class="form-row">
              <div class="form-group col-md-10">
                <label for="inputEmail4">Edit Room Type</label>
                <input type="text" class="form-control" id="name" name="typename" placeholder="" value="{{ $data->room_type}}"> @error('typename')
                <div class="alert" style="color: red;padding-left: 0px;">{{ $message }}</div> @enderror </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-10">
                <label for="inputZip">Icon</label> {{--
                <input type="file" name="icon" style="text-align: center;" id="input-file-now-custom-2 " class="dropify" data-max-height="3000" data-height="200" data-max-file-size="1M" /> --}}
                <input type="file" name="icon" style="text-align: center;" id="input-file-now-custom-2 " class="dropify" data-max-height="3000" data-height="250" data-max-file-size="1M" data-default-file="{{url('Upload/RoomTypes/'.$data->icon)}}" /> @error('icon')
                <div class="alert" style="color: red;padding-left: 0px;">{{ $message }}</div> @enderror </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-10" style="padding-bottom: 10px;">
                <label for="inputState">State</label>
                <select id="inputState" class="form-control" name="status">
                  <option value="">Choose ...</option>
                  <option value="1" {{$data->status=='1'?'selected':''}}>Active</option>
                  <option value="0" {{$data->status=='0'?'selected':''}}>Inactive</option>
                </select> @error('status')
                <div class="alert" style="color: red;padding-left: 0px;">{{ $message }}</div> @enderror </div>
            </div>
            <button type="submit" class="btn btn-dark">Submit</button> <a href="{{url('superadmin/room_type')}}" class="btn btn-info">Back</a> </div>
          <div class="form-group col-md-6">
            <div class="table-responsive">
              <table class="table table-bordered" id="example2" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th></th>
                    <th>Room type</th>
                    <th>Icon</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead> @foreach($roomtype as $value)
                <tr>
                  <td></td>
                  <td>{{$value->room_type}}</td>
                  <td><img src="{{asset('Upload/RoomTypes/'.$value->icon)}}" width="20px" height="20px"></td>
                  <td> @if ($value->status == 1) 
                    <span class="badge badge-success">Active</span> 
                    @elseif ($value->status == 0) <span class="badge badge-danger">Inactive</span> 
                  @endif 
                  </td>
                  <td class="project-actions">
                    <a class="btn btn-info btn-circle btn-sm" href="{{url('admin/room_type/view')}}/{{$value->id}}"> <i class="fa fa-eye">
                                     </i> </a>
                    <a class="btn btn-danger btn-circle btn-sm" href="{{url('admin/room_type/edit')}}/{{$value->id}}"> <i class="fa fa-edit">
                                     </i> </a>
                  </td>
                </tr> @endforeach </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="form-row"> </div>
        <div class="form-row"> </div>
        <div class="form-group"> </div>
      </form>
    </div>
  </div>
</div>
@stop