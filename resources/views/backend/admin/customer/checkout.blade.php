@extends('backend.admin.layout.master') 
@section('content')

<style type="text/css">

.card {
    max-width: 1500px;
    margin: 2vh
}

.card-top {
    padding: 0.7rem 5rem
}

.card-top a {
    float: left;
    margin-top: 0.7rem
}

#logo {
    font-family: 'Dancing Script';
    font-weight: bold;
    font-size: 1.6rem
}

.card-body {
    padding: 0 5rem 5rem 5rem;
    background-size: cover;
    background-repeat: no-repeat
}

@media(max-width:768px) {
    .card-body {
        padding: 0 1rem 1rem 1rem;
        background-size: cover;
        background-repeat: no-repeat
    }

    .card-top {
        padding: 0.7rem 1rem
    }
}

.row {
    margin: 0
}

.upper {
    padding: 1rem 0;
    justify-content: space-evenly
}

#three {
    border-radius: 1rem;
    width: 22px;
    height: 22px;
    margin-right: 3px;
    border: 1px solid blue;
    text-align: center;
    display: inline-block
}

#payment {
    margin: 0;
    color: blue
}

.icons {
    margin-left: auto
}

form span {
    color: rgb(179, 179, 179)
}

form {
    padding: 2vh 0
}

input {
    border: 1px solid rgba(0, 0, 0, 0.137);
    padding: 1vh;
    margin-bottom: 4vh;
    outline: none;
    width: 100%;
    background-color: rgb(247, 247, 247)
}

input:focus::-webkit-input-placeholder {
    color: transparent
}

.header {
    font-size: 1.5rem
}

.left {
    background-color: #ffffff;
    padding: 2vh
}

.left img {
    width: 2rem
}

.left .col-4 {
    padding-left: 0
}

.right .item {
    padding: 0.3rem 0
}

.right {
    background-color: #ffffff;
    padding: 2vh
}

.col-8 {
    padding: 0 1vh
}

.lower {
    line-height: 2
}


a {
    color: black
}

a:hover {
    color: black;
    text-decoration: none
}

input[type=checkbox] {
    width: unset;
    margin-bottom: unset
}

#cvv {
    background-image: linear-gradient(to left, rgba(255, 255, 255, 0.575), rgba(255, 255, 255, 0.541)), url("https://img.icons8.com/material-outlined/24/000000/help.png");
    background-repeat: no-repeat;
    background-position-x: 95%;
    background-position-y: center
}

#cvv:hover {}
</style>
<div class="card">
    <div class="card-top border-bottom text-center"> <span id="logo">CheckOut</span> </div>
    <div class="card-body">
        <div class="row upper"></div>
        <div class="row">
            <div class="col-md-7">
                <div class="left border">
                    <div class="row"> <span class="header"><strong>Payment</strong></span>
                        <div class="icons"> <img src="https://img.icons8.com/color/48/000000/visa.png" /> <img src="https://img.icons8.com/color/48/000000/mastercard-logo.png" /> <img src="https://img.icons8.com/color/48/000000/maestro.png" /> </div>
                    </div>
                    <form method="POST" action="{{url('admin/checkoutcustomers/update')}}/{{$data[0]->id}}" enctype="multipart/form-data"> {{csrf_field()}}
                    	 <div class="form-group row">
          <div class="col-sm-6 mb-3 mb-sm-0">
              <h6>FirstName</h6>
              <input type="hidden" class="form-control " id="cid" name="cid" placeholder="Last Name" value="{{$data[0]->id}}">
            <input type="text" class="form-control " id="exampleFirstName" name="fname" placeholder="First Name" value="{{$data[0]->fname}}" readonly>
           </div>
          <div class="col-sm-6">
              <h6>LastName</h6>
            <input type="text" class="form-control " id="exampleLastName" name="lname" placeholder="Last Name" value="{{$data[0]->lname}}" readonly>
           </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-6 mb-3 mb-sm-0">
              <h6>NIC</h6>
            <input type="text" class="form-control " id="nic" name="nic" placeholder="NIC No" value="{{$data[0]->nic}}" readonly>
          </div>
          <div class="col-sm-6">
              <h6>Mobile No</h6>
            <input type="number" class="form-control " id="mobile" name="mobile" placeholder="Mobile" value="{{$data[0]->mobile}}" readonly>
             </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-6 mb-3 mb-sm-0">
              <h6>Room Type</h6>
            <input type="text" class="form-control " id="roomtype" name="roomtype" placeholder="Room Type" value="{{$data[0]->roomtype}}" readonly>
          </div>
          <div class="col-sm-6">
              <h6>Room No</h6>
            <input type="number" class="form-control " id="room_name" name="room_name" placeholder="Room No" value="{{$data[0]->room_name}}" readonly>
            <input type="hidden" class="form-control " id="type" name="type" placeholder="Room No" value="{{$data[0]->type}}" readonly>
            <input type="hidden" class="form-control" id="oldroom" name="oldroom" value="{{$data[0]->roomid}}">
             </div>
        </div>
         <div class="form-group row">
          <div class="col-sm-6 mb-3 mb-sm-0">
              <h6>Room Price Rs: </h6>
            <input type="text" class="form-control " id="roomprice" name="roomprice" placeholder="Room Price" value="{{$data[0]->roomprice}}" readonly>
          </div>
          <div class="col-sm-6">
            <h6>CheckOut Date </h6>
            <input type="date" class="form-control " id="checkout" name="checkout" placeholder="CheckOut" value="{{$data[0]->checkout}}">
             </div>
             <p><strong>Previous Checkout Date: {{$data[0]->checkout}}</strong></p>
        </div>
        <div class="row">
                <div class="col-mb-4">
                  <input class="btn btn-primary " value="Checkout Customer" type="submit" /> </div>
              </div>

        <div class="form-group row">
         
          <div class="col-sm-6">
          
       </div>
        </div>     
            </div>
            </div>
            <div class="col-md-5">
                <div class="right border">
                <div class="header"><strong>Order Summary</strong></div>
                    <p></p>
                    <?php $total_price = 0 ?>
                     @foreach($data as $value)
                    <div class="row item">
                        <div class="col-4 align-self-center"><img src="{{asset('Upload/Meals/'.$value->icon)}}" alt="" alt="" width="130px" height="130px"></div>
                        <div class="col-8">
                            <div class="row">Order ID: {{$value->oid}}</div>
                            <div class="row"><b>Rs. {{$value->all_price}}</b></div>
                            <div class="row text-muted">{{$value->item_name}}</div>
                            <div class="row">Qty: {{$value->qty}}</div>
                        </div>
                    </div>
                    <?php $total_price += $value->all_price ?>
                     @endforeach
                    <hr>
                    <div class="row lower">
                        <div class="col text-left">Order Subtotal</div>
                        <div class="col text-right">Rs. {{$total_price}}</div>
                         <input type="hidden" class="form-control" id="order" name="order" value="{{$total_price}}">
                    </div>
                    <div class="row lower">
                        <div class="col text-left"><b>Total to pay</b></div>
                        <div class="col text-right"><b>Rs. {{$total_price + $data[0]->roomprice}}</b></div>
                        <input type="hidden" class="form-control" id="total" name="total" value="{{$total_price + $data[0]->roomprice}}">
                    </div>
                    <div class="row">
                <div class="col-mb-4">
                  <a href="{{url('admin/customers/printreceipt')}}/{{$value->id}}" class="btn btn-block btn-danger float-right" target="_blank">View Receipt</a> </div>
              </div>
                    <div class="row lower"> 
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
    <div> </div>
</div>

@stop