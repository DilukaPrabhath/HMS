
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<link href="{{asset('hms2020/print/print.css')}}" rel="stylesheet">
<script src="{{asset('hms2020/print/print.min.js')}}"></script>
<style type="text/css">
	body{
    margin-top:20px;
    background:#eee;
}

.invoice {
    background: #fff;
    padding: 20px
}

.invoice-company {
    font-size: 20px
}

.invoice-header {
    margin: 0 -20px;
    background: #f0f3f4;
    padding: 20px
}

.invoice-date,
.invoice-from,
.invoice-to {
    display: table-cell;
    width: 1%
}

.invoice-from,
.invoice-to {
    padding-right: 20px
}

.invoice-date .date,
.invoice-from strong,
.invoice-to strong {
    font-size: 16px;
    font-weight: 600
}

.invoice-date {
    text-align: right;
    padding-left: 20px
}

.invoice-price {
    background: #f0f3f4;
    display: table;
    width: 100%
}

.invoice-price .invoice-price-left,
.invoice-price .invoice-price-right {
    display: table-cell;
    padding: 20px;
    font-size: 20px;
    font-weight: 600;
    width: 75%;
    position: relative;
    vertical-align: middle
}

.invoice-price .invoice-price-left .sub-price {
    display: table-cell;
    vertical-align: middle;
    padding: 0 20px
}

.invoice-price small {
    font-size: 12px;
    font-weight: 400;
    display: block
}

.invoice-price .invoice-price-row {
    display: table;
    float: left
}

.invoice-price .invoice-price-right {
    width: 25%;
    background: #2d353c;
    color: #fff;
    font-size: 28px;
    text-align: right;
    vertical-align: bottom;
    font-weight: 300
}

.invoice-price .invoice-price-right small {
    display: block;
    opacity: .6;
    position: absolute;
    top: 10px;
    left: 10px;
    font-size: 12px
}

.invoice-footer {
    border-top: 1px solid #ddd;
    padding-top: 10px;
    font-size: 10px
}

.invoice-note {
    color: #999;
    margin-top: 80px;
    font-size: 85%
}

.invoice>div:not(.invoice-footer) {
    margin-bottom: 20px
}

.btn.btn-white, .btn.btn-white.disabled, .btn.btn-white.disabled:focus, .btn.btn-white.disabled:hover, .btn.btn-white[disabled], .btn.btn-white[disabled]:focus, .btn.btn-white[disabled]:hover {
    color: #2d353c;
    background: #fff;
    border-color: #d9dfe3;
}
</style>
<div class="container">
   <div class="col-md-12">
      <div class="invoice">
         <!-- begin invoice-company -->
         <div class="invoice-company text-inverse f-w-600">
            <span class="pull-right hidden-print">
            <a href="javascript:;" class="btn btn-sm btn-white m-b-10 p-l-5"><i class="fa fa-file t-plus-1 text-danger fa-fw fa-lg"></i> Export as PDF</a>
            <a href="javascript:;" onclick="window.print()" class="btn btn-sm btn-white m-b-10 p-l-5"><i class="fa fa-print t-plus-1 fa-fw fa-lg"></i> Print</a>
            </span>
           Hotel Grand Opera
         </div>
         <!-- end invoice-company -->
         <!-- begin invoice-header -->
		
         <div class="invoice-header">
            <div class="invoice-from">
               <small>from</small>
               <address class="m-t-5 m-b-5">
                  <strong class="text-inverse">Hotel Grand Opera</strong><br>
                  Kandy Road<br>
                  Mirigama, 11200<br>
                  Phone: +(94)332275845<br>
                  Fax: +(94) 332275845
               </address>
            </div>
            <div class="invoice-to">
               <small>to</small>
               <address class="m-t-5 m-b-5">
                  <strong class="text-inverse">{{$print[0]->fname}} {{$print[0]->lname}}</strong><br>
                  {{$print[0]->district}}<br>
                  {{$print[0]->city}}, {{$print[0]->zipcode}}<br>
                  Phone:{{$print[0]->mobile}}<br>
               </address>
            </div>
            <div class="invoice-date">
               <small>Invoice / Generated By</small>
               <div class="date text-inverse m-t-5">{{ Auth::user()->fname }} {{ Auth::user()->lname }}</div>
               <div class="invoice-detail">
                  Generated Date/Time:<br>
                  <?php echo(strftime("%m/%d/%Y %H:%M")); ?>
               </div>
            </div>
         </div>
         <!-- end invoice-header -->
         <!-- begin invoice-content -->
         <div class="invoice-content">
            <!-- begin table-responsive -->
            <div class="table-responsive">
               <table class="table table-invoice">
                  <thead>
                     <tr>
                        <th>ITEMS</th>
                        <th class="text-center" width="10%">UNIT PRICE</th>
                        <th class="text-center" width="10%">QTY</th>
                        <th class="text-right" width="20%">TOTAL PRICE</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
                        <td>
                           <span class="text-inverse">Room Type: {{$print[0]->roomtype}} &amp; Room No: {{$print[0]->room_name}}</span><br>
                        </td>
                        <td class="text-center">Rs. {{$print[0]->roomprice}}</td>
                        <td class="text-center">1</td>
                        <td class="text-right">Rs. {{$print[0]->roomprice}}</td>
                     </tr>
                      <?php $total_price = 0 ?>
                    	 @foreach($print as $value)
                     <tr>
                        <td>
                           <span class="text-inverse">Order ID: {{$value->oid}}</span><br>
                           <small>{{$value->item_name}}</small>
                        </td>
                        <td class="text-center">Rs. {{$value->unit_price}}</td>
                        <td class="text-center">{{$value->qty}}</td>
                        <td class="text-right">Rs. {{$value->all_price}}</td>
                          
                     </tr>
                     <?php $total_price += $value->all_price ?>
                     @endforeach
                  </tbody>
               </table>
            </div>
            <!-- end table-responsive -->
            <!-- begin invoice-price -->
            <div class="invoice-price">
               <div class="invoice-price-left">
                  <div class="invoice-price-row">
                     <div class="sub-price">
                        <small>ROOM PRICE</small>
                        <span class="text-inverse">Rs. {{$print[0]->roomprice}}</span>
                     </div>
                     <div class="sub-price">
                        <i class="fa fa-plus text-muted"></i>
                     </div>
                     <div class="sub-price">
                        <small>ORDERS PRICE</small>
                        <span class="text-inverse">Rs. {{$total_price}}</span>
                     </div>
                  </div>
               </div>
               <div class="invoice-price-right">
                  <small>TOTAL</small> <span class="f-w-600">Rs. {{$total_price + $print[0]->roomprice}}</span>
               </div>
            </div>
            <!-- end invoice-price -->
         </div>
         </form>
         <!-- end invoice-content -->
         <!-- begin invoice-note -->
        
         <!-- begin invoice-footer -->
         <div class="invoice-footer">
            <p class="text-center m-b-5 f-w-600">
               THANK YOU FOR YOUR CHOOSED US
            </p>
            <p class="text-center">
               <span class="m-r-10"><i class="fa fa-fw fa-lg fa-phone-volume"></i> TP:033-2275845</span>
               <span class="m-r-10"><i class="fa fa-fw fa-lg fa-envelope"></i> hotelgrandopera8@gmail.com</span>
            </p>
         </div>
         <!-- end invoice-footer -->
      </div>
   </div>
</div>
