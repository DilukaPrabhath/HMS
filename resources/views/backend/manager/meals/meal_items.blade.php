@extends('backend.manager.master_manager') 
@section('content')
<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"></h1> </div>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <table width="100%">
        <tr>
          <td>
            <h5 class="m-0 font-weight-bold text-dark col-md-4">Add Meals</h5></td>
        </tr>
      </table>
    </div>
    <div class="card-body">
      <form method="post" action="{{url('manager/meals/save')}}" enctype="multipart/form-data"> 
        {{ csrf_field() }}
        <input style="display: none" type="email" name="fakeusernameremembered" />
        <input style="display: none" type="password" name="fakepasswordremembered" />
        <div class="form-row">
          <div class="form-group col-md-6">
            <div class="form-row">
              <div class="form-group col-md-10">
                <label for="inputEmail4">Item Name</label>
                <input type="text" class="form-control" id="name" name="itemname" placeholder=""> @error('itemname')
                <div class="alert" style="color: red;padding-left: 0px;">{{ $message }}</div> @enderror </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-10">
                <label for="inputEmail4">Item Description</label>
                <input type="text" class="form-control" id="name" name="itemdes" placeholder=""> @error('itemdes')
                <div class="alert" style="color: red;padding-left: 0px;">{{ $message }}</div> @enderror </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-10">
                <label for="inputEmail4">Item Price</label>
                <input type="number" class="form-control" id="name" name="itemprice" placeholder=""> @error('itemprice')
                <div class="alert" style="color: red;padding-left: 0px;">{{ $message }}</div> @enderror </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-10">
                <label for="inputEmail4">Categoty</label>
                <select class="form-control" name="category" id="offer_name">
                  <option selected="">Select Category </option>
                  <option>Breakfast</option>
                  <option>Lunch</option>
                  <option>Dinner</option>
                  <option>Dessert</option>
                  <option>Beverages</option>
                  <option>Snack</option>
                </select> @error('category')
                <div class="alert" style="color: red;padding-left: 0px;">{{ $message }}</div> @enderror </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-10">
                <label for="inputEmail4">Offer Name</label>
                <select class="form-control" name="offername" id="offer_name">
                  <option selected="">Select Offer Name </option> @foreach(App\offers::all() as $data)
                  <option value="{{$data->id}}">{{$data->offer_name}}</option> @endforeach </select> @error('offername')
                <div class="alert" style="color: red;padding-left: 0px;">{{ $message }}</div> @enderror </div>
            </div>
          </div>
          <div class="form-group col-md-6">
            <div class="form-row">
              <div class="form-group col-md-10">
                <label for="inputZip">Image</label>
                <input type="file" name="icon" style="text-align: center;" id="input-file-now-custom-2 " class="dropify" data-max-file-size="1M" data-max-height="3000" data-height="200" /> @error('icon')
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