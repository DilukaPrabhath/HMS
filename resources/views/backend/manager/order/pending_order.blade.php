@extends('backend.manager.master_manager') 
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
              <h5 class="m-0 font-weight-bold text-dark col-md-4">Pending Orders</h5></td>
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
                <td><img src="{{asset('Upload/Meals/'.$value->icon)}}" alt="" alt="" width="100px" height="100px"></td>
                <td>{{$value->order_id}}</td>
                <td>{{$value->item_name}}</td>
                <td>Rs. {{$value->total_price}}</td>
                <td>{{$value->quantity}}</td>
                <td>Kosala Bandara</td>
                <td>Saman (Roomboy)</td>
                <td>{{ \Carbon\Carbon::parse($value->created_at)->format('d/m/Y H:i:s A')}}</td>
                <td> @if ($value->order_status == 0) <span class="badge badge-warning">Pending</span> @else @endif
                  <td class="project-actions">
                    <a class="btn btn-danger btn-circle btn-sm" href="{{url('manager/FeedbackOrder')}}/{{$value->id}}"> <i class="fa fa-edit" aria-hidden="true"></i> </i>
                    </a>
                  </td>
              </tr> @endforeach </tbody>
          </table>
        </div>
      </div>
    </div>
  </div> 
  @stop