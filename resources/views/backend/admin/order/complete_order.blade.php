@extends('backend.admin.layout.master') 
@section('content')
<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"></h1> </div>
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"></h1>
</div>
  <div class="msgs">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <table width="100%">
          <tr>
            <td>
              <h5 class="m-0 font-weight-bold text-dark col-md-4">Complete Orders</h5></td>
          </tr>
        </table>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="example2" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th></th>
                <th>Preview</th>
                <th>Order ID</th>
                <th>Item Name</th>
                <th>Total Price</th>
                <th>Quantity</th>
                <th>Customer Name</th>
                <th>Deliver Person</th>
                <th>Initiate Time</th>
                <th>Order Status</th>
                <th>FeedBack</th>
              </tr>
            </thead>
             <tbody> @foreach($orders as $value)
              <tr>
                <td></td>
                <td><img src="{{asset('Upload/Meals/'.$value->icon)}}" alt="" alt="" width="80px" height="80px"></td>
                <td>{{$value->oid}}</td>
                <td>{{$value->item_name}}</td>
                <td>Rs. {{$value->total_price}}</td>
                <td>{{$value->qty}}</td>
                <td>{{$value->fname}} {{$value->lname}}</td>
                <td>{{$value->rfname}} {{$value->rlname}}</td>
                <td>{{ \Carbon\Carbon::parse($value->created_at)->format('d/m/Y H:i:s A')}}</td>
                <td> @if ($value->status == 1) <span class="badge badge-success">Completed</span> @else @endif
                  <td class="project-actions">
                    <a class="btn btn-danger btn-circle btn-sm" href="#"> <i class="fa fa-edit" aria-hidden="true"></i> </i>
                    </a>
                  </td>
              </tr> @endforeach </tbody>
          </table>
        </div>
      </div>
    </div>
  </div> 
  @stop