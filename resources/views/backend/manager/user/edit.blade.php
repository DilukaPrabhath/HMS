@extends('backend.manager.master_manager')
@section('content')
<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"></h1>
   </div>
  <div class="card shadow mb-6">
    <div class="card-header py-4">
      <h5 class="m-0 font-weight-bold text-primary">Edit Employee!</h5> </div>
    <div class="card-body">
      <form class="user" method="post" action="{{url('manager/users/edit/update')}}/{{$user->id}}" enctype="multipart/form-data"> {{csrf_field()}}
        <label for="inputZip"> <b>Basic Details</b> </label>
        <div class="form-group row">
          <div class="col-sm-6 mb-3 mb-sm-0">
            <input type="text" class="form-control " id="exampleFirstName" name="fname" placeholder="First Name" value="{{$user->fname}}">
             @error('fname')
                  
              <div class="alert" style="color: red;padding-left: 0px;">First Name field is required</div>
                  @enderror</div>
          <div class="col-sm-6">
            <input type="text" class="form-control " id="exampleLastName" name="lname" placeholder="Last Name" value="{{$user->lname}}">
             @error('lname')
                  
              <div class="alert" style="color: red;padding-left: 0px;">Last Name field is required</div>
                  @enderror</div>
        </div>
        <div class="form-group row">
          <div class="col-sm-6 mb-3 mb-sm-0">
            <input type="text" class="form-control " id="examplenic" name="nic" placeholder="NIC No" value="{{$user->nic}}"> 
            @error('nic')
                  
              <div class="alert" style="color: red;padding-left: 0px;">NIC is required</div>
                  @enderror
          </div>
          <div class="col-sm-6">
            <input type="date" class="form-control " id="exampledob" name="dob" placeholder="Date Of Birth" value="{{$user->dob}}"> 
            @error('dob')
                  
              <div class="alert" style="color: red;padding-left: 0px;">DOB is required</div>
                  @enderror
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-6">
            <select id="inputState" class="form-control" name="gender">
              <option value="1" {{$user->gender=='1'?'selected':''}}>Male</option>
              <option value="0" {{$user->gender=='0'?'selected':''}}>Female</option>
            </select>
           @error('dob')
                  
              <div class="alert" style="color: red;padding-left: 0px;">Gender is required</div>
                  @enderror
          </div>
          <div class="col-sm-6">
            <input type="text" class="form-control " id="exampletp" name="mobile_no" placeholder="Mobile No" value="{{$user->mobile_no}}"> 
            @error('mobile_no')
                  
              <div class="alert" style="color: red;padding-left: 0px;">Mobile is required</div>
                  @enderror
          </div>
        </div>
        <label for="inputZip"> <b>Address</b> </label>
        <div class="form-group row">
          <div class="col-sm-6 mb-3 mb-sm-0">
            <input type="text" class="form-control " id="exampleFirstName" name="line1" placeholder="Line 1" value="{{$user->line1}}">
               @error('line1')
                  
              <div class="alert" style="color: red;padding-left: 0px;">Line1 is required</div>
                  @enderror
          </div>
          <div class="col-sm-6">
            <input type="text" class="form-control " id="exampleLastName" name="line2" placeholder="Line 2" value="{{$user->line2}}"> 
              @error('line2')
                  
              <div class="alert" style="color: red;padding-left: 0px;">Line2 is required</div>
                  @enderror
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-6 mb-3 mb-sm-0">
            <input type="text" class="form-control " id="exampleFirstName" name="line3" placeholder="Line 3" value="{{$user->line3}}"> 
              @error('line3')
                  
              <div class="alert" style="color: red;padding-left: 0px;">Line3 is required</div>
                  @enderror
          </div>
          <div class="col-sm-6">
            <input type="text" class="form-control " id="exampleLastName" name="city" placeholder="City" value="{{$user->city}}"> 
              @error('city')
                  
              <div class="alert" style="color: red;padding-left: 0px;">City is required</div>
                  @enderror
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-6 mb-3 mb-sm-0">
            <input type="text" class="form-control " id="exampleFirstName" name="district" placeholder="District" value="{{$user->district}}"> 
              @error('district')
                  
              <div class="alert" style="color: red;padding-left: 0px;">District is required</div>
                  @enderror
          </div>
          <div class="col-sm-6">
            <input type="text" class="form-control " id="exampleLastName" name="province" placeholder="Province" value="{{$user->province}}"> 
              @error('province')
                  
              <div class="alert" style="color: red;padding-left: 0px;">Province is required</div>
                  @enderror
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-6 mb-3 mb-sm-0">
            <input type="text" class="form-control " id="exampleFirstName" name="country" placeholder="County" value="{{$user->country}}"> 
              @error('country')
                  
              <div class="alert" style="color: red;padding-left: 0px;">Country is required</div>
                  @enderror
          </div>
          <div class="col-sm-6">
            <input type="text" class="form-control " id="exampleLastName" name="zip" placeholder="Zip Code" value="{{$user->zip}}"> 
              @error('zip')
                  
              <div class="alert" style="color: red;padding-left: 0px;">Zipcode is required</div>
                  @enderror
          </div>
        </div>
        <label for="inputZip"> <b>Advance Details</b> </label>
        <div class="form-group row">
          <div class="col-sm-6 mb-3 mb-sm-0">
            <select class="form-control " name="usertype" type="select"> @foreach($data as $value)
              <option value="{{$value->id}}" {{$user->user_type_id==$value->id?'selected':''}}>{{$value->user_type}}</option> @endForeach 
                @error('usertype')
                  
              <div class="alert" style="color: red;padding-left: 0px;">User Type is required</div>
                  @enderror
            </select>
          </div>
          <div class="col-sm-6">
            <input type="text" class="form-control " id="exampleempno" name="empno" placeholder="Employee No" value="{{$user->emp_no}}" readonly=""> </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-6">
            <select id="inputState" class="form-control" name="status">
              <option value="1" {{$user->status=='1'?'selected':''}}>Active</option>
              <option value="0" {{$user->status=='0'?'selected':''}}>Inactive</option>
                @error('status')
                  
              <div class="alert" style="color: red;padding-left: 0px;">Status is required</div>
                  @enderror
            </select>
          </div>
          <div class="col-sm-6"> <a href="{{url('admin/users/change/password')}}/{{$user->id}}" class="btn btn-danger">Change Password</a> </div>
        </div>
        <div class="form-group row">
          <div class="form-group col-sm-6">
            <input type="email" class="form-control " id="exampleInputEmail" name="email" placeholder="Email Address" value="{{$user->email}}">
            @error('email')
                  
              <div class="alert" style="color: red;padding-left: 0px;">Email is required</div>
                  @enderror 
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-6 mb-3 mb-sm-0">
            <label for="inputZip"> <b>User Image</b> </label>
            <input type="file" name="userimg" style="text-align: center;" id="input-file-now-custom-2 " class="dropify" data-max-file-size="1M" data-max-height="3000" data-height="200" value="{{$user->userimg}}" data-default-file="{{url('Upload/UserImages/'.$user->userimg)}}" /> </div>
        </div>
        <br>
        <div class="form-group row">
          <div class="col-sm-6 mb-3 mb-sm-0">
            <div class="col-mb-12">
              <input class="btn btn-primary " value="Update Employee" type="submit" />
              <input class="btn btn-danger " value="Clear" onclick=reset() /> </div>
          </div>
          <div class="col-sm-6"></div>
        </div>
    </div>
  </div>
  </form>
</div>
</div>
</div>
</div> 
@stop