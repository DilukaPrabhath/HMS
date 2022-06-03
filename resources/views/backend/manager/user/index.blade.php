@extends('backend.manager.master_manager')
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
            <h5 class="m-0 font-weight-bold text-dark col-md-4">Employee Table</h5></td>
          <td><a href="{{url('manager/users/add')}}" class="col-md-4 btn btn-block btn-dark float-right">Add Employee</a></td>
        </tr>
      </table>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="example2" width="100%" cellspacing="0">
          <thead style="background-color:#F5F5F5;">
            <tr style="color:black;">
              <th></th>
              <th>Name</th>
              <th>Mobile No</th>
              <th>User Type</th>
              <th>Employee No</th>
              <th>Email</th>
              <th>Create Date</th>
              <th>Image</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead> @foreach($users as $value)
          <tr>
            <td></td>
            <td>{{$value->fname}} {{$value->lname}}</td>
            <td>{{$value->mobile_no}}</td>
            <td> @if ($value->user_type_id == 1) <span class="badge badge-success">Admin</span> @elseif ($value->user_type_id == 2) <span class="badge badge-warning">Manager</span> @elseif ($value->user_type_id == 3) <span class="badge badge-secondary">Chef</span> @else ($value->user_type_id == 4) <span class="badge badge-danger">Receptionist</span> @endif </td>
            <td>{{$value->emp_no}}</td>
            <td>{{$value->email}}</td>
            <td>{{$value->created_at}}</td>
            <td><img src="{{asset('Upload/UserImages/'.$value->userimg)}}" width="50px" height="50px"></td>
            <td> @if ($value->status == 1) <span class="badge badge-success">Active</span> @elseif ($value->status == 0) <span class="badge badge-danger">Inactive</span> @endif </td>
            <td class="project-actions">
              <a class="btn btn-info btn-circle btn-sm" href="users/view/{{$value->id}}"> <i class="fa fa-eye">
                              </i> </a>
              <a class="btn btn-danger btn-circle btn-sm" href="users/edit/{{$value->id}}"> <i class="fa fa-edit" aria-hidden="true"></i> </i>
              </a>
            </td>
          </tr> @endforeach </tbody>
        </table>
      </div>
    </div>
  </div>
</div> 
@stop