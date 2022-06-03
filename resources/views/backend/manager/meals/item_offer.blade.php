@extends('backend.manager.master_manager')
@section('content')
<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"></h1> </div>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h5 class="m-0 font-weight-bold text-dark">Add Offer</h5> </div>
    <div class="card-body">
      <form method="post" action="{{url('manager/offer/save')}}" enctype="multipart/form-data"> {{ csrf_field() }}
        <input style="display: none" type="email" name="fakeusernameremembered" />
        <input style="display: none" type="password" name="fakepasswordremembered" />
        <div class="form-row">
          <div class="form-group col-md-6">
            <div class="form-row">
              <div class="form-group col-md-10">
                <label for="inputEmail4">Offer Name</label>
                <input type="text" class="form-control" id="name" name="offername" placeholder=""> @error('offername')
                <div class="alert" style="color: red;padding-left: 0px;">{{ $message }}</div> @enderror </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-10">
                <label for="inputEmail4">Offer Price</label>
                <input type="currency" class="form-control" id="name" name="offerprice" placeholder=""> @error('offerprice')
                <div class="alert" style="color: red;padding-left: 0px;">{{ $message }}</div> @enderror </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-10">
                <label for="inputEmail4">Offer Type</label>
                <select class="form-control" name="offertype" id="offer_type">
                  <option selected=""></option>
                  <option>Meal</option>
                  <option>Service</option>
                </select>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-10">
                <label for="inputEmail4">Start Date</label>
                <input type="date" class="form-control" id="start" name="start" placeholder=""> @error('start')
                <div class="alert" style="color: red;padding-left: 0px;">{{ $message }}</div> @enderror </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-10">
                <label for="inputEmail4">End Date</label>
                <input type="date" class="form-control" id="end" name="end" placeholder=""> @error('end')
                <div class="alert" style="color: red;padding-left: 0px;">{{ $message }}</div> @enderror </div>
            </div>
            <button type="submit" class="btn btn-dark">Submit</button> {{-- <a href="" class="btn btn-info">Back</a> --}} </div>
          <div class="form-group col-md-6">
            <div class="table-responsive">
              <table class="table table-bordered" id="example2" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th></th>
                    <th>Offer Name</th>
                    <th>Offer Price</th>
                    <th>Offer Type</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead> @foreach($offer as $value)
                <tr>
                  <td></td>
                  <td>{{$value->offer_name}}</td>
                  <td>{{$value->offer_price}}</td>
                  <td>{{$value->offer_type}}</td>
                  <td>{{$value->start_date}}</td>
                  <td>{{$value->end_date}}</td>
                  <td> @if ($value->status == 1) <span class="badge badge-success">Active</span> @elseif ($value->status == 0) <span class="badge badge-danger">Inactive</span> @endif </td>
                  <td class="project-actions">
                    <a class="btn btn-danger btn-circle btn-sm" href="{{url('manager/offer/view')}}/{{$value->id}}"> <i class="fa fa-edit">
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