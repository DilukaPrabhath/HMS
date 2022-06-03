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
            <h5 class="m-0 font-weight-bold text-dark col-md-4">Add Sections</h5></td>
        </tr>
      </table>
    </div>
    <div class="card-body">
      <form method="post" action="{{url('admin/save/section')}}" enctype="multipart/form-data"> 
        {{ csrf_field() }}
        <input style="display: none" type="email" name="fakeusernameremembered" />
        <input style="display: none" type="password" name="fakepasswordremembered" />
        <div class="form-row">
          <div class="form-group col-md-6">
            <div class="form-row">
              <div class="form-group col-md-10">
                <label for="inputEmail4">Section Name</label>
                <input type="text" class="form-control" id="sectionname" name="sectionname" placeholder=""> @error('sectionname')
                <div class="alert" style="color: red;padding-left: 0px;">{{ $message }}</div> @enderror </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-10">
                <label for="inputEmail4">Section Description</label>
                <input type="text" class="form-control" id="sectiondes" name="sectiondes" placeholder=""> @error('sectiondes')
                <div class="alert" style="color: red;padding-left: 0px;">{{ $message }}</div> @enderror </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-10">
                <label for="inputEmail4">Section Price</label>
                <input type="number" class="form-control" id="sectionprice" name="sectionprice" placeholder=""> @error('sectionprice')
                <div class="alert" style="color: red;padding-left: 0px;">{{ $message }}</div> @enderror </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-10">
                <label for="inputEmail4">Manager</label>
                <select class="form-control" name="username" id="username">
                  <option selected="">Select Manager </option>
                  @foreach(App\user::all()->where('user_type_id', '=', 2) as $data)
                  <option value="{{$data->id}}">{{$data->fname}} {{$data->lname}}</option> 
                @endforeach 
                </select> @error('username')
                <div class="alert" style="color: red;padding-left: 0px;">{{ $message }}</div> @enderror </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-10">
                <label for="inputEmail4">Offer Name</label>
                <select class="form-control" name="offername" id="offer_name">
                  <option selected="">Select Offer Name </option> 
                  @foreach(App\offers::all()->where('status', '=', 1)->where('offer_type', '=', 'Service') as $data)
                  <option value="{{$data->id}}">{{$data->offer_name}}</option> 
                @endforeach 
              </select> 
              @error('offername')
                <div class="alert" style="color: red;padding-left: 0px;">{{ $message }}</div> 
              @enderror 
            </div>
            </div>
          </div>
          <div class="form-group col-md-6">
            <div class="form-row">
              <div class="form-group col-md-10">
                <label for="inputZip">Image</label>
                <input type="file" name="image" style="text-align: center;" id="input-file-now-custom-2 " class="dropify" data-max-file-size="1M" data-max-height="3000" data-height="200" /> @error('image')
                <div class="alert" style="color: red;padding-left: 0px;">{{ $message }}</div> @enderror </div>
            </div>
            <button type="submit" class="btn btn-dark">Submit</button>
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