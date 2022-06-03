@extends('backend.manager.layout.master') 
@section('content')
<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"></h1> </div>
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h5 class="m-0 font-weight-bold text-dark">Add Offer</h5> </div>
    <div class="card-body">
      <form method="post" action="{{url('manager/offer/edit/update/')}}/{{$data->id}}" enctype="multipart/form-data"> {{ csrf_field() }}
        <input style="display: none" type="email" name="fakeusernameremembered" />
        <input style="display: none" type="password" name="fakepasswordremembered" />
        <div class="form-row">
          <div class="form-group col-md-6">
            <div class="form-row">
              <div class="form-group col-md-10">
                <label for="inputEmail4">Offer Name</label>
                <input type="text" class="form-control" id="name" name="offername" placeholder="" value="{{$data->offer_name}}"> @error('offername')
                <div class="alert" style="color: red;padding-left: 0px;">Offer Name is required</div> @enderror </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-10">
                <label for="inputEmail4">Offer Price</label>
                <input type="currency" class="form-control" id="name" name="offerprice" placeholder="" value="{{$data->offer_price}}"> @error('offerprice')
                <div class="alert" style="color: red;padding-left: 0px;">Offer Price is required</div> @enderror </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-10">
                <label for="inputEmail4">Offer Type</label>
                <select class="form-control" name="offertype" id="offer_type">
                  <option selected=""></option>
                  <option value="Meal" {{$data->offer_type=='Meal'?'selected':''}}>Meal</option>
                    <option value="Service" {{$data->offer_type=='Service'?'selected':''}}>Service</option>
                  @error('offertype')
                <div class="alert" style="color: red;padding-left: 0px;">Offer Type is required</div> @enderror
                </select>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-10">
                <label for="inputEmail4">Start Date</label>
                <input type="date" class="form-control" id="start" name="start" placeholder="" value="{{$data->start_date}}"> @error('start')
                <div class="alert" style="color: red;padding-left: 0px;">Offer Start Date is required</div> @enderror </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-10">
                <label for="inputEmail4">End Date</label>
                <input type="date" class="form-control" id="end" name="end" placeholder="" value="{{$data->end_date}}"> @error('end')
                <div class="alert" style="color: red;padding-left: 0px;">Offer End Date is required</div> @enderror </div>
            </div>
             <div class="form-row">
              <div class="form-group col-md-10">
                  <h6 class="mb-0">Status</h6> </div>
                <div class="col-sm-9 text-secondary">
                  <select id="inputState" class="form-control" name="status">
                    <option value="1" {{$data->status=='1'?'selected':''}}>Active</option>
                    <option value="0" {{$data->status=='0'?'selected':''}}>Inactive</option>
                     @error('status')
                  
                <div class="alert" style="color: red;padding-left: 0px;">Status is required</div>
                  @enderror
                  </select><br>
                </div>
              </div>
            <button type="submit" class="btn btn-dark">Submit</button> {{-- <a href="" class="btn btn-info">Back</a> --}} </div>
          <div class="form-group col-md-6">
            <div class="table-responsive">
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