@extends('backend.admin.layout.master') 
@section('content')
<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"></h1>
    </div>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <table width="100%">
        <tr>
          <td>
            <h5 class="m-0 font-weight-bold text-dark col-md-4">Meals</h5></td>
        </tr>
      </table>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="example1" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th></th>
              <th>Item Name</th>
              <th>Description</th>
              <th>Price</th>
              <th>Category</th>
              <th>Offer Name</th>
              <th>Image</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead> @foreach($meal_items as $value)
          <tr>
            <td></td>
            <td>{{$value->item_name}}</td>
            <td>{{$value->item_description}}</td>
            <td>Rs. {{$value->item_price}}</td>
            <td>{{$value->category}}</td>
            <td>{{$value->offername->offer_name}}</td>
            <td><img src="{{asset('Upload/Meals/'.$value->icon)}}" width="50px" height="50px"></td>
            <td> @if ($value->status == 1) <span class="badge badge-success">Active</span> 
              @elseif ($value->status == 0) <span class="badge badge-danger">Inactive</span> 
              @endif 
            </td>
            <td class="project-actions">
              <a class="btn btn-danger btn-circle btn-sm" href="{{url('admin/meals/edit')}}/{{$value->id}}"> <i class="fa fa-edit" aria-hidden="true"></i></a>
            </td>
          </tr> @endforeach </tbody>
        </table>
      </div>
    </div>
  </div>
</div> @stop