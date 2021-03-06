
<div class="container-fluid">

<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800"></h1>
        
</div>
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <table width="100%" style="font-family: sans-serif;" cellpadding="10">
        <tr>
            <td width="100%" style="text-align: center; font-size: 20px; font-weight: bold; padding: 0px;">
              All Customer Complete Orders Report (With Items)
            </td><br>
        </tr>
    </table>
                
    <table width="100%" style="font-family: sans-serif;" cellpadding="10">
        <tr>
            <td width="49%" style="text-align: left;"><strong>Hotel Grand Opera</strong><br>Mirigama<br>Sri Lanka<br>0332275096</td>

            <td width="2%">&nbsp;</td>
            <td width="49%" style="text-align: right;"><br><strong>Generated By:</strong> {{ Auth::user()->fname }} {{ Auth::user()->lname }}<br><strong>Generated Date/Time:</strong> <?php echo(strftime("%m/%d/%Y %H:%M")); ?></td><br>
        </tr>
    </table>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="example1" width="100%" cellspacing="0" style="border: 0.1mm solid #eee;">

      <thead style="background-color:#F5F5F5; border: 0.1mm solid #eee;">
                    <tr style="color:black;">
                                <th></th>
                                <th>Name</th>
                                <th>Order ID</th>
                                <th>Item Name</th>
                                <th>Quantity</th>
                                <th>Unit Price</th>
                                <th>Total Price</th>
                                <th>Initiate Date</th>
                    </tr>
                  </thead>
                       @foreach($customers as $value)
                              <tr>
                                <td></td>
                                <td style="border: 0.1mm solid #eee;">{{$value->fname}} {{$value->lname}}</td>
                                <td style="border: 0.1mm solid #eee;">{{$value->oid}}</td>
                                <td style="border: 0.1mm solid #eee;">{{$value->item_name}}</td>
                                <td style="border: 0.1mm solid #eee;">{{$value->qty}}</td>
                                <td style="border: 0.1mm solid #eee;">Rs. {{$value->unit_price}}</td>
                                <td style="border: 0.1mm solid #eee;">Rs. {{$value->all_price}}</td>
                                <td style="border: 0.1mm solid #eee;">{{ \Carbon\Carbon::parse($value->created_at)->format('d/m/Y H:i:s A')}}</td>

                  </tr>
                  @endforeach
                 <h4 style="color:red; text-align: right;">{{ \DB::table('orders')->where('status','=','1')->count()}} Completed Order on Report</h4>
                  </tbody><br><br><br>
                </table>
                <!--  <table width="50%" align="center" style="font-family: sans-serif; font-size: 13px; text-align: center;" >
                    <tr>
                        <td style="padding: 0px; line-height: 20px;">
                            <strong>Hotel Grand Opera</strong>
                            <br>
                            Mirigama
                            <br>
                            Tel: +94 33 227 5096 | Email: hotelgrandopera8@gmail.com
                            <br>
                            Hotel Registered in Sri Lanka. Reg. 12121212.
                            <br>
                            VAT Registration No. 021021021 | No. 1234
                        </td>
                    </tr>
                </table> -->
                </div>
                 <h4 style="color:red; text-align: right;">Rs. {{ \DB::table('checkout_histories')->sum('order_price')}}</h4>
            </div>
            </div>
          </div>

        </div>

