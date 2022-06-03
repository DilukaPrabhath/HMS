@extends('backend.chef.master_chef') 
@section('content')
<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" />
<style type="text/css">
	
.panel-order .row {
	border-bottom: 1px solid #ccc;
}
.panel-order .row:last-child {
	border: 0px;
}
.panel-order .row .col-md-1  {
	text-align: center;
	padding-top: 10px;
}
.panel-order .row .col-md-1 img {
	width: 80px;
	max-height: 80px;
}
.panel-order .row .row {
	border-bottom: 0;
}
.panel-order .row .col-md-11 {
	border-left: 1px solid #ccc;
}
.panel-order .row .row .col-md-12 {
	padding-top: 7px;
	padding-bottom: 7px; 
}
.panel-order .row .row .col-md-12:last-child {
	font-size: 11px; 
	color: #555;  
	background: #efefef;
}
.panel-order .btn-group {
	margin: 0px;
	padding: 0px;
}
.panel-order .panel-body {
	padding-top: 0px;
	padding-bottom: 0px;
}
.panel-order .panel-deading {
	margin-bottom: 0;
}                    
</style>
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
              <h5 class="m-0 font-weight-bold text-dark col-md-4">Pending Orders List</h5></td> @if (session('status'))
            <div class="alert alert-success" role="alert"> {{session ('status')}} </div> @endif </tr>
        </table>
      </div>
      <div class="card-body">
        <div class="table-responsive">
         <div class="table table-bordered"  width="100%" cellspacing="0">
    <div class="panel panel-default panel-order">
        <div class="panel-heading">
            <strong>Order history</strong>
            <div class="btn-group pull-right">
            </div>
        </div>
		
        <div class="panel-body">
            <div class="row">
            	@foreach($list as $value)
                <div class="col-md-1"><img src="{{asset('Upload/Meals/'.$value->icon)}}" alt="" alt="" width="100px" height="100px"></div>
                <div class="col-md-11">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="pull-right"> @if ($value->status == 0) <span class="badge badge-warning">Pending</span> 
                  				@elseif ($value->status == 1) 
                  				<span class="badge badge-success">Completed</span> 
                				@endif</label></div>
                            <span><strong>{{$value->oid}}: </strong></span> <span class="label label-info">{{$value->item_name}}</span><br />
                            Quantity : {{$value->qty}}, cost: Rs. {{$value->all_price}} <br />
                        </div>
                        <div class="col-md-12">order made on: <?php echo(strftime("%m/%d/%Y %H:%M")); ?> by <a href="#">{{ Auth::user()->fname }} {{ Auth::user()->lname }} </a></div>
                    </div>
                </div>

                   @endforeach
            </div><br>
            <div style="float: right;">
            @if ($value->status == 0)
                  <button class="btn btn-outline-primary btn-sm" onclick='f1(this)' value="{{ $value->id }}" type="submit">Confirm</button> 
                  @elseif ($value->status == 1)
                  <button class="btn btn-outline-danger btn-sm" disabled="disabled">Reserved</button> 
                @endif
                </div>
        </div>
      </div>
  </div>
</div>

</div>
</div>
</div>
</div>
<script src="http://code.jquery.com/jquery.js"></script>
<script type="text/javascript">
function f1(objButton) {
  var id = objButton.value;
  console.log(id);
  let _url = `/chef/order/edit/update/${id}`;
  console.log(_url);
  if(confirm("Did you want to complete this order..?")) {
    txt = "Yes";
    $.ajax({
      type: "get",
      url: _url,
      success: function(data) {

      	 
        console.log(data);
        if(data.sts == 1){
         // var x = "/chef/order/edit/update/".data.oid;
         var urlx = window.location.pathname;
         // var id = url.substring(url.lastIndexOf('/') + 1);
          window.location.href = urlx;
          
        }

      },
      error: function(data) {
        console.log('Error:', data);
      }
    });
  } else {
    txt = "You pressed Cancel!";
  }
}
</script> 
@stop