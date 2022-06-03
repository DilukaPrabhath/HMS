@extends('backend.manager.master_manager')
@section('content')
<style type="text/css">
body {
  color: #1a202c;
  text-align: left;
  background-color: #e2e8f0;
}

.main-body {
  padding: 15px;
}

.card {
  box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
}

.card {
  position: relative;
  display: flex;
  flex-direction: column;
  min-width: 0;
  word-wrap: break-word;
  background-color: #fff;
  background-clip: border-box;
  border: 0 solid rgba(0, 0, 0, .125);
  border-radius: .25rem;
}

.card-body {
  flex: 1 1 auto;
  min-height: 1px;
  padding: 1rem;
}

.gutters-sm {
  margin-right: -8px;
  margin-left: -8px;
}

.gutters-sm>.col,
.gutters-sm>[class*=col-] {
  padding-right: 8px;
  padding-left: 8px;
}

.mb-3,
.my-3 {
  margin-bottom: 1rem!important;
}

.bg-gray-300 {
  background-color: #e2e8f0;
}

.h-100 {
  height: 100%!important;
}

.shadow-none {
  box-shadow: none!important;
}
</style>
<form method="POST" action="{{url('manager/customers/edit/update')}}/{{$data[0]->id}}" enctype="multipart/form-data"> {{csrf_field()}}
  <div class="container">
    <div class="main-body">
      <!-- Breadcrumb -->
      <nav aria-label="breadcrumb" class="main-breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page">Edit Customer Details</li>
        </ol>
      </nav>
      
      <div class="row gutters-sm">
        <div class="col-md-4 mb-3">
          <div class="card">
            <div class="card-body">
              <div class="d-flex flex-column align-items-center text-center"> <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" style="border-radius: 25px;" width="150">
                <div class="mt-3">
                  <h4> {{ $data[0]->fname}}</h4> </div>
              </div>
            </div>
          </div>
          <div class="card mt-3">
            <ul class="list-group list-group-flush">
              <h6 align="center" style="color: blue;"> Address </h6>
              <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Line 1</h6> </div>
                  <div class="col-sm-9 text-secondary">
                  <input type="text" class="form-control" name="line1" value="{{$data[0]->line1}}" style="width: 230px;">
                   @error('line1')
                  
              <div class="alert" style="color: red;padding-left: 0px;">Line1 is required</div>
                  @enderror
                   </div>
                </div>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Line 2</h6> </div>
                  <div class="col-sm-9 text-secondary">
                  <input type="text" class="form-control" name="line2" value="{{$data[0]->line2}}" style="width: 230px;">
                    @error('line2')
                  
                    <div class="alert" style="color: red;padding-left: 0px;">Line2 is required</div>
                    @enderror
                   </div>
                </div>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Line 3</h6> </div>
                  <div class="col-sm-9 text-secondary">
                  <input type="text" class="form-control" name="line3" value="{{$data[0]->line3}}" style="width: 230px;"> 
                   @error('line3')
                  
                <div class="alert" style="color: red;padding-left: 0px;">Line3 is required</div>
                  @enderror
                </div>
                </div>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Country</h6> </div>
                  <div class="col-sm-9 text-secondary">
              <input type="text" class="form-control" name="country" value="{{$data[0]->country}}" style="width: 230px;">
               @error('country')
                  
              <div class="alert" style="color: red;padding-left: 0px;">Country is required</div>
                  @enderror
               </div>
                </div>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">province</h6> </div>
                  <div class="col-sm-9 text-secondary">
                    <input type="text" class="form-control" name="province" value="{{$data[0]->province}}" style="width: 230px;"> 
                  @error('province')
                  
                <div class="alert" style="color: red;padding-left: 0px;">Province is required</div>
                  @enderror
                  </div>
                </div>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">District</h6> </div>
                  <div class="col-sm-9 text-secondary">
                    <input type="text" class="form-control" name="district" value="{{$data[0]->district}}" style="width: 230px;"> 
                     @error('district')
                  
                <div class="alert" style="color: red;padding-left: 0px;">District is required</div>
                  @enderror
                  </div>
                </div>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">City</h6> </div>
                  <div class="col-sm-9 text-secondary">
                    <input type="text" class="form-control" name="city" value="{{$data[0]->city}}" style="width: 230px;">
                     @error('city')
                  
                <div class="alert" style="color: red;padding-left: 0px;">City is required</div>
                  @enderror
                     </div>
                </div>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Zipcode</h6> </div>
                  <div class="col-sm-9 text-secondary">
                    <input type="text" class="form-control" name="zip" value="{{$data[0]->zipcode}}" style="width: 230px;"> 
                     @error('zip')
                  
                <div class="alert" style="color: red;padding-left: 0px;">Zipcode is required</div>
                  @enderror
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-md-8">
          <div class="card mb-3">
            <div class="card-body">
              <h6 align="center" style="color: blue;"> Basic Details </h6>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">First Name</h6> </div>
                <div class="col-sm-9 text-secondary">
                  <input type="text" class="form-control" name="fname" value="{{$data[0]->fname}}"> </div>
                   @error('fname')
                  
              <div class="alert" style="color: red;padding-left: 0px;">First Name field is required</div>
                  @enderror
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Last  Name</h6> </div>
                <div class="col-sm-9 text-secondary">
                  <input type="text" class="form-control" name="lname" value="{{$data[0]->lname}}"> </div>
                   @error('lname')
                  
              <div class="alert" style="color: red;padding-left: 0px;">Last Name field is required</div>
                  @enderror
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Email</h6> </div>
                <div class="col-sm-9 text-secondary">
                  <input type="text" class="form-control" name="email" value="{{$data[0]->email}}"> </div>
                   @error('email')
                  
              <div class="alert" style="color: red;padding-left: 0px;">Email is required</div>
                  @enderror
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">NIC</h6> </div>
                <div class="col-sm-9 text-secondary">
                  <input type="text" class="form-control" name="nic" value="{{$data[0]->nic}}"> </div>
                   @error('nic')
                  
              <div class="alert" style="color: red;padding-left: 0px;">NIC is required</div>
                  @enderror
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Mobile</h6> </div>
                <div class="col-sm-9 text-secondary">
                  <input type="text" class="form-control" name="mobile" value="{{$data[0]->mobile}}"> </div>
                   @error('mobile')
                  
              <div class="alert" style="color: red;padding-left: 0px;">Mobile is required</div>
                  @enderror
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Gender</h6> </div>
                <div class="col-sm-9 text-secondary">
                  <select id="inputState" class="form-control" name="gender">
                    <option value="1" {{$data[0]->gender=='1'?'selected':''}}>Male</option>
                    <option value="0" {{$data[0]->gender=='0'?'selected':''}}>Female</option>
                     @error('gender')
                  
                <div class="alert" style="color: red;padding-left: 0px;">Gender is required</div>
                  @enderror
                  </select>
                </div>
              </div>
              <hr>
              <h6 align="center" style="color: blue;"> Reservation </h6>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Check In</h6> </div>
                <div class="col-sm-9 text-secondary">
                  <input type="date" class="form-control" name="checkin" value="{{$data[0]->checkin}}"> </div>
                   @error('checkin')
                  
              <div class="alert" style="color: red;padding-left: 0px;">CheckIn date is required</div>
                  @enderror
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Check Out</h6> </div>
                <div class="col-sm-9 text-secondary">
                   <input type="date" class="form-control " id="example" name="checkout" placeholder="CheckOut" value="{{$data[0]->checkout}}"> 
                  @error('checkout')
                  
               <div class="alert" style="color: red;padding-left: 0px;">CheckOut date is required</div>
                  @enderror
              </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Room Type</h6> </div>
                <div class="col-sm-9 text-secondary"> @if ($data[0]->room_type_id == 1) Single @elseif ($data[0]->room_type_id == 2) Double @elseif ($data[0]->room_type_id == 3) Family @elseif($data[0]->room_type_id == 4) Suite @elseif($data[0]->room_type_id == 5) Double Extra @else @endif </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Room No</h6> </div>
                <div class="col-sm-9 text-secondary"> {{ $data[0]->room_name}} </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">No of Guest</h6> </div>
                <div class="col-sm-9 text-secondary">
                  <input type="text" class="form-control" name="guest" value="{{$data[0]->no_of_guest}}"> </div>
                   @error('guest')
                  
              <div class="alert" style="color: red;padding-left: 0px;">Guest count is required</div>
                  @enderror
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Status</h6> </div>
                <div class="col-sm-9 text-secondary">
                  <select id="inputState" class="form-control" name="status">
                    <option value="1" {{$data[0]->status=='1'?'selected':''}}>Active</option>
                    <option value="0" {{$data[0]->status=='0'?'selected':''}}>Inactive</option>
                     @error('status')
                  
                <div class="alert" style="color: red;padding-left: 0px;">Status is required</div>
                  @enderror
                  </select>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-12">
                  <input class="btn btn-primary " value="Update Customer" type="submit" /> </div>
              </div>
            </div>
          </div>
          <div class="row gutters-sm"> </div>
        </div>
      </div>
    </div>
  </div>
</form>
<script>
$(document).ready(function() {
  $('.dynamic').change(function() {
    if($(this).val() != '') {
      var select = $(this).attr("id");
      var value = $(this).val();
      var dependent = $(this).data('dependent');
      var _token = $('input[name="_token"]').val();
      $.ajax({
        url: "{{ route('dynamicdependent.fetch') }}",
        method: "POST",
        data: {
          select: select,
          value: value,
          _token: _token,
          dependent: dependent
        },
        success: function(result) {
          $('#' + dependent).html(result);
        }
      })
    }
  });
});
</script> 
@stop