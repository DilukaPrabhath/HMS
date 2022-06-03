@extends('backend.manager.layout.master') @section('content')
<style>
@import "https://fonts.googleapis.com/css?family=Montserrat:400,700|Raleway:300,400";
html {
  width: 100%;
  height: 100%;
}

body {
  background: #efefef;
  color: #333;
  font-family: "Raleway";
  height: 100%;
}

body h3 {
  text-align: center;
  color: #428bff;
  font-weight: bold;
  padding: 40px 0 20px 0;
  margin: 0;
}

body h6 {
  text-align: left;
  color: black;
  font-weight: bold;
}

.tabs {
  left: 50%;
  transform: translateX(-50%);
  position: relative;
  background: white;
  padding: 50px;
  padding-bottom: 80px;
  width: 95%;
  height: 400px;
  box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
  border-radius: 5px;
  min-width: 240px;
}

.tabs input[name="tab-control"] {
  display: none;
}

.tabs .content section h2,
.tabs ul li label {
  font-family: "Montserrat";
  font-weight: bold;
  font-size: 18px;
  color: #428bff;
}

.tabs ul {
  list-style-type: none;
  padding-left: 0;
  display: flex;
  flex-direction: row;
  margin-bottom: 10px;
  justify-content: space-between;
  align-items: flex-end;
  flex-wrap: wrap;
}

.tabs ul li {
  box-sizing: border-box;
  flex: 1;
  width: 25%;
  padding: 0 10px;
  text-align: center;
}

.tabs ul li label {
  transition: all 0.3s ease-in-out;
  color: #929daf;
  padding: 5px auto;
  overflow: hidden;
  text-overflow: ellipsis;
  display: block;
  cursor: pointer;
  transition: all 0.2s ease-in-out;
  white-space: nowrap;
  -webkit-touch-callout: none;
}

.tabs ul li label br {
  display: none;
}

.tabs ul li label svg {
  fill: #929daf;
  height: 1.2em;
  vertical-align: bottom;
  margin-right: 0.2em;
  transition: all 0.2s ease-in-out;
}

.tabs ul li label:hover,
.tabs ul li label:focus,
.tabs ul li label:active {
  outline: 0;
  color: #bec5cf;
}

.tabs ul li label:hover svg,
.tabs ul li label:focus svg,
.tabs ul li label:active svg {
  fill: #bec5cf;
}

.tabs .slider {
  position: relative;
  width: 25%;
  transition: all 0.33s cubic-bezier(0.38, 0.8, 0.32, 1.07);
}

.tabs .slider .indicator {
  position: relative;
  width: 50px;
  max-width: 100%;
  margin: 0 auto;
  height: 4px;
  background: #428bff;
  border-radius: 1px;
}

.tabs .content {
  margin-top: 30px;
}

.tabs .content section {
  display: none;
  animation-name: content;
  animation-direction: normal;
  animation-duration: 0.3s;
  animation-timing-function: ease-in-out;
  animation-iteration-count: 1;
  line-height: 1.4;
}

.tabs .content section h2 {
  color: #428bff;
  display: none;
}

.tabs .content section h2::after {
  content: "";
  position: relative;
  display: block;
  width: 30px;
  height: 3px;
  background: #428bff;
  margin-top: 5px;
  left: 1px;
}

.tabs input[name="tab-control"]:nth-of-type(1):checked ~ ul > li:nth-child(1) > label {
  cursor: default;
  color: #428bff;
}

.tabs input[name="tab-control"]:nth-of-type(1):checked ~ ul > li:nth-child(1) > label svg {
  fill: #428bff;
}

@media (max-width: 600px) {
  .tabs input[name="tab-control"]:nth-of-type(1):checked ~ ul > li:nth-child(1) > label {
    background: rgba(0, 0, 0, 0.08);
  }
}

.tabs input[name="tab-control"]:nth-of-type(1):checked ~ .slider {
  transform: translateX(0%);
}

.tabs input[name="tab-control"]:nth-of-type(1):checked ~ .content > section:nth-child(1) {
  display: block;
}

.tabs input[name="tab-control"]:nth-of-type(2):checked ~ ul > li:nth-child(2) > label {
  cursor: default;
  color: #428bff;
}

.tabs input[name="tab-control"]:nth-of-type(2):checked ~ ul > li:nth-child(2) > label svg {
  fill: #428bff;
}

@media (max-width: 600px) {
  .tabs input[name="tab-control"]:nth-of-type(2):checked ~ ul > li:nth-child(2) > label {
    background: rgba(0, 0, 0, 0.08);
  }
}

.tabs input[name="tab-control"]:nth-of-type(2):checked ~ .slider {
  transform: translateX(100%);
}

.tabs input[name="tab-control"]:nth-of-type(2):checked ~ .content > section:nth-child(2) {
  display: block;
}

.tabs input[name="tab-control"]:nth-of-type(3):checked ~ ul > li:nth-child(3) > label {
  cursor: default;
  color: #428bff;
}

.tabs input[name="tab-control"]:nth-of-type(3):checked ~ ul > li:nth-child(3) > label svg {
  fill: #428bff;
}

@media (max-width: 600px) {
  .tabs input[name="tab-control"]:nth-of-type(3):checked ~ ul > li:nth-child(3) > label {
    background: rgba(0, 0, 0, 0.08);
  }
}

.tabs input[name="tab-control"]:nth-of-type(3):checked ~ .slider {
  transform: translateX(200%);
}

.tabs input[name="tab-control"]:nth-of-type(3):checked ~ .content > section:nth-child(3) {
  display: block;
}

.tabs input[name="tab-control"]:nth-of-type(4):checked ~ ul > li:nth-child(4) > label {
  cursor: default;
  color: #428bff;
}

.tabs input[name="tab-control"]:nth-of-type(4):checked ~ ul > li:nth-child(4) > label svg {
  fill: #428bff;
}

@media (max-width: 600px) {
  .tabs input[name="tab-control"]:nth-of-type(4):checked ~ ul > li:nth-child(4) > label {
    background: rgba(0, 0, 0, 0.08);
  }
}

.tabs input[name="tab-control"]:nth-of-type(4):checked ~ .slider {
  transform: translateX(300%);
}

.tabs input[name="tab-control"]:nth-of-type(4):checked ~ .content > section:nth-child(4) {
  display: block;
}

@keyframes content {
  from {
    opacity: 0;
    transform: translateY(5%);
  }
  to {
    opacity: 1;
    transform: translateY(0%);
  }
}

@media (max-width: 1000px) {
  .tabs ul li label {
    white-space: initial;
  }
  .tabs ul li label br {
    display: initial;
  }
  .tabs ul li label svg {
    height: 1.5em;
  }
}

@media (max-width: 600px) {
  .tabs ul li label {
    padding: 5px;
    border-radius: 5px;
  }
  .tabs ul li label span {
    display: none;
  }
  .tabs .slider {
    display: none;
  }
  .tabs .content {
    margin-top: 20px;
  }
  .tabs .content section h2 {
    display: block;
  }
}
</style>
<form method="POST" action="{{url('admin/roomboy/save')}}" enctype="multipart/form-data" autocomplete="off"> {{csrf_field()}}
  <h3>Non-System Employees Registration</h3>
  <div class="tabs">
    <input type="radio" id="tab1" name="tab-control" checked>
    <input type="radio" id="tab2" name="tab-control">
    <input type="radio" id="tab3" name="tab-control">
    <input type="radio" id="tab4" name="tab-control">
    <ul>
      <li title="Features">
        <label for="tab1" role="button">
          <svg viewBox="0 0 24 24">
            <path d="M14,2A8,8 0 0,0 6,10A8,8 0 0,0 14,18A8,8 0 0,0 22,10H20C20,13.32 17.32,16 14,16A6,6 0 0,1 8,10A6,6 0 0,1 14,4C14.43,4 14.86,4.05 15.27,4.14L16.88,2.54C15.96,2.18 15,2 14,2M20.59,3.58L14,10.17L11.62,7.79L10.21,9.21L14,13L22,5M4.93,5.82C3.08,7.34 2,9.61 2,12A8,8 0 0,0 10,20C10.64,20 11.27,19.92 11.88,19.77C10.12,19.38 8.5,18.5 7.17,17.29C5.22,16.25 4,14.21 4,12C4,11.7 4.03,11.41 4.07,11.11C4.03,10.74 4,10.37 4,10C4,8.56 4.32,7.13 4.93,5.82Z" /> </svg>
          <br><span>Basic Details</span></label>
      </li>
      <li title="Delivery Contents">
        <label for="tab2" role="button">
          <svg viewBox="0 0 24 24">
            <path d="M2,10.96C1.5,10.68 1.35,10.07 1.63,9.59L3.13,7C3.24,6.8 3.41,6.66 3.6,6.58L11.43,2.18C11.59,2.06 11.79,2 12,2C12.21,2 12.41,2.06 12.57,2.18L20.47,6.62C20.66,6.72 20.82,6.88 20.91,7.08L22.36,9.6C22.64,10.08 22.47,10.69 22,10.96L21,11.54V16.5C21,16.88 20.79,17.21 20.47,17.38L12.57,21.82C12.41,21.94 12.21,22 12,22C11.79,22 11.59,21.94 11.43,21.82L3.53,17.38C3.21,17.21 3,16.88 3,16.5V10.96C2.7,11.13 2.32,11.14 2,10.96M12,4.15V4.15L12,10.85V10.85L17.96,7.5L12,4.15M5,15.91L11,19.29V12.58L5,9.21V15.91M19,15.91V12.69L14,15.59C13.67,15.77 13.3,15.76 13,15.6V19.29L19,15.91M13.85,13.36L20.13,9.73L19.55,8.72L13.27,12.35L13.85,13.36Z" /> </svg>
          <br><span>Address</span></label>
      </li>
      <li title="Shipping">
        <label for="tab3" role="button">
          <svg viewBox="0 0 24 24">
            <path d="M3,4A2,2 0 0,0 1,6V17H3A3,3 0 0,0 6,20A3,3 0 0,0 9,17H15A3,3 0 0,0 18,20A3,3 0 0,0 21,17H23V12L20,8H17V4M10,6L14,10L10,14V11H4V9H10M17,9.5H19.5L21.47,12H17M6,15.5A1.5,1.5 0 0,1 7.5,17A1.5,1.5 0 0,1 6,18.5A1.5,1.5 0 0,1 4.5,17A1.5,1.5 0 0,1 6,15.5M18,15.5A1.5,1.5 0 0,1 19.5,17A1.5,1.5 0 0,1 18,18.5A1.5,1.5 0 0,1 16.5,17A1.5,1.5 0 0,1 18,15.5Z" /> </svg>
          <br><span>Advance Details</span></label>
      </li>
      <li title="Returns">
        <label for="tab4" role="button">
          <svg viewBox="0 0 24 24">
            <path d="M11,9H13V7H11M12,20C7.59,20 4,16.41 4,12C4,7.59 7.59,4 12,4C16.41,4 20,7.59 20,12C20,16.41 16.41,20 12,20M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M11,17H13V11H11V17Z" /> </svg>
          <br><span>Submit</span></label>
      </li>
    </ul>
    <div class="slider">
      <div class="indicator"></div>
    </div>
    <div class="content">
      <section>
        <div class="form-group row">
          <div class="col-sm-6 mb-3 mb-sm-0">
            <input type="text" class="form-control" id="exampleFirstName" name="fname" placeholder="First Name"> @error('fname')
            <div class="alert" style="color: red;padding-left: 0px;">The First Name field is required</div> 
          @enderror </div>
          <div class="col-sm-6">
            <input type="text" class="form-control " id="exampleLastName" name="lname" placeholder="Last Name"> @error('lname')
            <div class="alert" style="color: red;padding-left: 0px;">The Last Name field is required</div> 
          @enderror </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-6 mb-3 mb-sm-0">
            <input type="text" class="nic-validate form-control" id="examplenic" name="nic" placeholder="NIC No" maxlength="12" minlength="10"> 
            <small class="form-text text-danger nic-validate-error"></small>
            @error('nic')
            <div class="alert" style="color: red;padding-left: 0px;">{{ $message }}</div> 
          @enderror </div>
          <div class="col-sm-6">
            <input type="text" class="nic-birthday form-control" id="exampledob" name="dob" placeholder="Date Of Birth" readonly=""> 
            @error('dob')
            <div class="alert" style="color: red;padding-left: 0px;">The DOB field is required</div> 
          @enderror </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-6 mb-3 mb-sm-0">
            <input type="text" class="nic-gender form-control" id="exampledob" name="gender" placeholder="Gender" readonly=""> @error('gender')
            <div class="alert" style="color: red;padding-left: 0px;">The Gender is required</div> 
          @enderror </div>
          <div class="col-sm-6">
            <input  class="form-control" type="number" id="exampletp" name="mobile_no" placeholder="Mobile No" maxlength="10" minlength="10"> 
            @error('mobile_no')
            <div class="alert" style="color: red;padding-left: 0px;">The Mobile No is required</div> 
          @enderror </div>
        </div>
        <input class="nic-validate-btn btn btn-success" value="NIC Validate">
        <input class="nic-clear-btn btn btn-warning" value="Validation Clear"> </section>
      <section>
        <div class="form-group row">
          <div class="col-sm-6 mb-3 mb-sm-0">
            <select class="form-control" name="country" id="country">
              <option selected="">Select a Country</option>
              <option>Sri Lanka</option>
            </select> @error('country')
            <div class="alert" style="color: red;padding-left: 0px;">Country is required</div> 
          @enderror </div>
          <div class="col-sm-6">
            <select class="form-control dynamic" name="province" id="province" data-dependent="district">
              <option selected="">Select Province</option> @foreach($address as $data)
              <option value="{{$data->province}}">{{$data->province}}</option> @endforeach </select> 
              @error('province')
            <div class="alert" style="color: red;padding-left: 0px;">Province is required</div>
             @enderror </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-6 mb-3 mb-sm-0">
            <select class="form-control dynamic" name="district" id="district" data-dependent="city">
              <option value="" selected="">Select District</option>
            </select> 
            @error('district')
            <div class="alert" style="color: red;padding-left: 0px;">District is required</div> 
          @enderror </div>
          <div class="col-sm-6">
            <select class="form-control dynamic" name="city" id="city" data-dependent="zipcode">
              <option value="">Select City</option>
            </select> 
            @error('city')
            <div class="alert" style="color: red;padding-left: 0px;">City is required</div> 
          @enderror </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-6 mb-3 mb-sm-0">
            <select class="form-control dynamic" name="zipcode" id="zipcode">
              <option value="">Select Zipcode</option>
            </select> 
            @error('zipcode')
            <div class="alert" style="color: red;padding-left: 0px;">Zipcode is required</div> 
          @enderror </div>
          <div class="col-sm-6">
            <input type="text" class="form-control " id="line3" name="line3" placeholder="Line 3"> </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-6 mb-3 mb-sm-0">
            <input type="text" class="form-control " id="line2" name="line2" placeholder="Line 2"> 
            @error('line2')
            <div class="alert" style="color: red;padding-left: 0px;">The Address Line 2 is required</div> 
          @enderror </div>
          <div class="col-sm-6">
            <input type="text" class="form-control " id="line1" name="line1" placeholder="Line 1"> 
            @error('line1')
            <div class="alert" style="color: red;padding-left: 0px;">The Address Line 1 is required</div> 
          @enderror </div>
        </div>
      </section>
      <section>
        <div class="form-group row">
          <div class="col-sm-6 mb-3 mb-sm-0">
            <select class="form-control " name="usertype" type="select" required>
              <option>Select a User Type</option> @foreach(App\user_type::all()->where('id', '=', 5) as $data)
              <option value="{{$data->id}}">{{$data->user_type}}</option> @endforeach </select> 
              @error('usertype')
            <div class="alert" style="color: red;padding-left: 0px;">The User_Type is required</div> 
          @enderror </div>
          <div class="col-sm-6">
             <input type="email" class="form-control " id="exampleInputEmail" name="email" placeholder="Email Address">  @error('email')
          <div class="alert" style="color: red;padding-left: 0px;">The Email is required</div> 
        @enderror</div>
        </div>
        <div class="form-group row">
          <div class="col-sm-6 mb-3 mb-sm-0">
            <input type="password" class="form-control " id="exampleInputPassword" name="password" placeholder="Password" disabled> </div>
          <div class="col-sm-6">
            <input type="password" class="form-control " id="exampleRepeatPassword" name="repeat_password" placeholder="Repeat Password" disabled> 
            </div>
        </div>
      </section>
      <section>
        <div class="form-group row">
          <div class="col-sm-6 mb-3 mb-sm-0">
            <h6>User Image<h6>
                                <input type="file" name="userimg" style="text-align: center;" id="input-file-now-custom-2 " class="dropify" data-max-file-size="1M" data-max-height="3000" data-height="200" />
                  
                                </div>
                                <div class="col-sm-6">
                                  <input class="btn btn-primary" value="Register Employee" type="submit"  />
                                        <input class="btn btn-danger " value="Clear" onclick=reset()  />
                  
                                  </div>
                                </div>
     
                                </section>
                              </div>
                              </form>
                            </div>
                            <div class="progress-wrap">

<script>
  $(document).ready(function(){
    $('.dynamic').change(function(){
      if($(this).val() != '')
        {
          var select = $(this).attr("id");
          var value = $(this).val();
          var dependent = $(this).data('dependent');
          var _token = $('input[name="_token"]').val();
          $.ajax({
            url:"{{ route('admin/dynamic_dependent/fetch') }}",
            method:"POST",
            data:{select:select, value:value, _token:_token, dependent:dependent},
            success:function(result)
            {
              $('#'+dependent).html(result);

            }
          })
        }
      });
        });

</script>
<script src="{{asset('hms2020/js/nic.js')}}"></script>
     
        
@stop