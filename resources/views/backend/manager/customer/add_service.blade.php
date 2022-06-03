@extends('backend.manager.layout.master') 
@section('content')
<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"></h1> </div>
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h5 class="m-0 font-weight-bold text-dark">Initiate Section for Customer</h5> </div>
    <div class="card-body">
      <form method="post" action="{{url('manager/section/customer')}}" enctype="multipart/form-data"> {{ csrf_field() }}
        <input style="display: none" type="email" name="fakeusernameremembered" />
        <input style="display: none" type="password" name="fakepasswordremembered" />
        <div class="form-row">
          <div class="form-group col-md-6">
            <div class="form-row">
              <div class="form-group col-md-10">
                <p id="niclbl" style="color: red;font-weight: bold;"></p>
                <label for="inputEmail4">NIC</label>
                <input type="text" class="form-control" id="nic" name="nic" autocomplete="off"> @error('nic')
                <div class="alert" style="color: red;padding-left: 0px;">{{ $message }}</div> @enderror </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-10">
                <label for="inputEmail4">First Name</label>
                <input type="currency" class="form-control" id="firstname" name="firstname" readonly> @error('firstname')
                <div class="alert" style="color: red;padding-left: 0px;">{{ $message }}</div> @enderror </div>
            </div>
           <div class="form-row">
              <div class="form-group col-md-10">
                <label for="inputEmail4">Last Name</label>
                <input type="currency" class="form-control" id="lastname" name="lastname" readonly> @error('lastname')
                <div class="alert" style="color: red;padding-left: 0px;">{{ $message }}</div> @enderror </div>
            </div>
             <div class="form-row">
              <div class="form-group col-md-10">
                <label for="inputEmail4">Mobile</label>
                <input type="currency" class="form-control" id="mobile" name="mobile" readonly> @error('mobile')
                <div class="alert" style="color: red;padding-left: 0px;">{{ $message }}</div> @enderror </div>
            </div>
          </div>
          <div class="form-group col-md-6">
               <div class="form-row">
              <div class="form-group col-md-10">
                <label for="inputEmail4">Section Name</label>
                <select class="form-control " name="sectionname" id="sectionname" required>
              <option>Select Section</option> @foreach(App\section::all() as $data)
              <option value="{{$data->id}}">{{$data->section_name}}</option> @endforeach </select>  @error('nic')
                <div class="alert" style="color: red;padding-left: 0px;">{{ $message }}</div> @enderror </div>
            </div>
           <!--  <div class="form-row">
              <div class="form-group col-md-10">
                <label for="inputEmail4">Quantity</label>
                <input type="number" class="form-control" id="qty" name="qty" placeholder=""> @error('qty')
                <div class="alert" style="color: red;padding-left: 0px;">{{ $message }}</div> @enderror </div>
            </div> -->
            <div class="form-row">
              <div class="form-group col-md-10">
                <label for="inputEmail4">Initiate Date</label>
                <input type="date" class="form-control" id="date" name="date" placeholder=""> @error('date')
                <div class="alert" style="color: red;padding-left: 0px;">{{ $message }}</div> @enderror </div>
            </div>
            <button type="submit" class="btn btn-dark" id="initsection">Submit</button>
            </div>
          </div>
      </form>
    </div>
      </div>
      </div>
  </div>
</div>
<script type="text/javascript">
     

    $(document).ready(function(){
    $('#nic').blur(function(){
      if($(this).val() != '')
        {

            var select = $(this).val();
            console.log(select);
          
          var _token = $('input[name="_token"]').val();
          $.ajax({
            url:"{{ route('dynamicdependent.fetchcust1') }}",
            method:"POST",
            data:{select:select, _token:_token},
            success:function(result)
            {
             console.log(result);
             if (result == 0) {
               document.getElementById("initsection").disabled = true;
               document.getElementById('niclbl').innerHTML = "Enter Valied NIC !";
               
             }else{
                document.getElementById('firstname').value = result.fname;
                document.getElementById('lastname').value = result.lname;
                document.getElementById('mobile').value   = result.mobile;
                document.getElementById("plcorder").disabled = false;
                document.getElementById('niclbl').innerHTML = "";


             }
            
             console.log("Success!!");

            }
          })
        }
      });
        });


        </script>
@stop