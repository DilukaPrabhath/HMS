@extends('backend.chef.master_chef') 
@section('content')
<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"></h1> </div>
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"></h1></div>
  <div class="msgs">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <table width="100%">
          <tr>
            <td>
              <h5 class="m-0 font-weight-bold text-dark col-md-4">Orders</h5></td> 
        </tr>
        </table>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="example2" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th></th>
                <th>Customer Name</th>
                <th>User Name</th>
                <th>Initiate Date</th>
                <th>Order Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody> @foreach($orders as $value)
              <tr>
                <td></td>
               
                <td>{{$value->fname}} {{$value->lname}}</td>
                <td>{{$value->rfname}} {{$value->rlname}}</td>
                <td>{{ \Carbon\Carbon::parse($value->created_at)->format('d/m/Y H:i:s A')}}</td>
                <td> @if ($value->status == 0) <span class="badge badge-warning">Pending</span> 
                  @elseif ($value->status == 1) 
                  <span class="badge badge-success">Completed</span> 
                @endif </td>
                <td class="project-actions"> 
                  <a class="btn btn-danger btn-circle btn-sm" href="{{url('chef/pending/list')}}/{{$value->id}}"> <i class="fa fa-edit">
                              </i> </a>
                               </div>
        </td>
        </tr> @endforeach </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

@stop