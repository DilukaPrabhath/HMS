@extends('backend.admin.layout.master') 
@section('content')

<style type="text/css">

.date-card{
  border:1px solid #ddd;
  width:200px;
  background: rgb(250,245,245);
  background: linear-gradient(90deg, rgba(250,245,245,1) 100%, rgba(230,236,238,1) 100%, rgba(47,50,50,1) 100%); 
  padding:10px;
  display:flex;
  align-items:center;
}

.date-card .year{
  font-size:20px;
  margin:0px 10px;
  color:#2ab6b6;
}

.date-card .month{
  font-weight:bold;
}




}
</style>
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"></h1> </div>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <table width="100%">
        <tr>
          <td>
            <h5 class="m-0 font-weight-bold text-dark col-md-4">Filtered Reports - Order Wise</h5></td>
        </tr>
      </table>
    </div>
    <div class="card-body">
      <div class="form-row">
        <div class="form-group col-md-6">
          <div class="container-fluid">
            <div class="d-sm-flex align-items-center justify-content-between mb-4"> </div>
            <div class="card-body">
              <div class="table-responsive">
                <div class="form-group col-md-18">
                  <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between ">
                      <h6 class="m-0 font-weight-bold text-dark" style="padding-top:10px">Total Revenue by Year</h6>
                      <br> </div>
                    <div class="card-body">
                      <div class="table-responsive">
                         <table>
                         
                          <tr>
                            <td>       
                              <div class="date-card">
                              <div class="day"></div>
                              <div>
                                 <div class="month">January</div>
                                <div class="year">Rs. {{\DB::table('checkout_histories')->whereBetween('created_at', ['2021-01-01 00:00:00','2021-01-31 23:59:59'])->sum('order_price')}}</div>
                              </div>
                            </div>
                          </td>
                            <td><div class="date-card">
                              <div class="day"></div>
                              <div>
                                 <div class="month">February</div>
                                <div class="year">Rs. {{\DB::table('checkout_histories')->whereBetween('created_at', ['2021-02-01 00:00:00','2021-02-28 23:59:59'])->sum('order_price')}}</div>
                              </div>
                            </div></td>
                            <td><div class="date-card">
                              <div class="day"></div>
                              <div>
                                 <div class="month">March</div>
                                <div class="year">Rs. {{\DB::table('checkout_histories')->whereBetween('created_at', ['2021-03-01 00:00:00','2021-03-31 23:59:59'])->sum('order_price')}}</div>
                              </div>
                            </div></td>
                          </tr>
                          <tr>
                            <td><div class="date-card">
                              <div class="day"></div>
                              <div>
                                 <div class="month">April</div>
                                <div class="year">Rs. {{\DB::table('checkout_histories')->whereBetween('created_at', ['2021-04-01 00:00:00','2021-04-30 23:59:59'])->sum('order_price')}}</div>
                              </div>
                            </div></td>
                            <td><div class="date-card">
                              <div class="day"></div>
                              <div>
                                 <div class="month">May</div>
                                <div class="year">Rs. {{\DB::table('checkout_histories')->whereBetween('created_at', ['2021-05-01 00:00:00','2021-05-31 23:59:59'])->sum('order_price')}}</div>
                              </div>
                            </div>
                          </td>
                            <td><div class="date-card">
                              <div class="day"></div>
                              <div>
                                 <div class="month">June</div>
                                <div class="year">Rs. {{\DB::table('checkout_histories')->whereBetween('created_at', ['2021-06-01 00:00:00','2021-06-31 23:59:59'])->sum('order_price')}}</div>
                              </div>
                            </div></td>
                          </tr>
                          <tr>
                            <td><div class="date-card">
                              <div class="day"></div>
                              <div>
                                 <div class="month">July</div>
                                <div class="year">Rs. {{\DB::table('checkout_histories')->whereBetween('created_at', ['2021-07-01 00:00:00','2021-07-31 23:59:59'])->sum('order_price')}}</div>
                              </div>
                            </div></td>
                            <td><div class="date-card">
                              <div class="day"></div>
                              <div>
                                 <div class="month">August</div>
                                <div class="year">Rs. {{\DB::table('checkout_histories')->whereBetween('created_at', ['2021-08-01 00:00:00','2021-08-31 23:59:59'])->sum('order_price')}}</div>
                              </div>
                            </div></td>
                            <td><div class="date-card">
                              <div class="day"></div>
                              <div>
                                 <div class="month">September</div>
                                <div class="year">Rs. {{\DB::table('checkout_histories')->whereBetween('created_at', ['2021-09-01 00:00:00','2021-09-30 23:59:59'])->sum('order_price')}}</div>
                              </div>
                            </div></td>
                          </tr>
                          <tr>
                            <td><div class="date-card">
                              <div class="day"></div>
                              <div>
                                 <div class="month">October</div>
                                <div class="year">Rs. {{\DB::table('checkout_histories')->whereBetween('created_at', ['2021-10-01 00:00:00','2021-10-31 23:59:59'])->sum('order_price')}}</div>
                              </div>
                            </div></td>
                            <td><div class="date-card">
                              <div class="day"></div>
                              <div>
                                 <div class="month">November</div>
                                <div class="year">Rs. {{\DB::table('checkout_histories')->whereBetween('created_at', ['2021-11-01 00:00:00','2021-11-30 23:59:59'])->sum('order_price')}}</div>
                              </div>
                            </div></td>
                            <td><div class="date-card">
                              <div class="day"></div>
                              <div>
                                 <div class="month">December</div>
                                <div class="year">Rs. {{\DB::table('checkout_histories')->whereBetween('created_at', ['2021-12-01 00:00:00','2021-12-31 23:59:59'])->sum('order_price')}}</div>
                              </div>
                            </div></td>
                          </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group col-md-6">
          <div class="table-responsive">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
              <h6 class="m-0 font-weight-bold text-dark" style="padding-top:10px">All Orders Report</h6><br> </div>
              <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                  <thead style="background-color:#F5F5F5;">
                    <tr style="color:black;">
                      <th></th>
                      <th>Report Name</th>
                      <th>Report Type</th>
                      <th>Status</th>
                      <th>Download</th>
                    </tr>
                  </thead>
                  <tr>
                    <td>1</td>
                    <td>All orders</td>
                    <td>Document</td>
                    <td>Active</td>
                    <td>
                      <div class="dropdown">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"> Download File </button>
                        <div class="dropdown-menu"> <a class="dropdown-item" href="{{ route('allorders',['download'=>'pdf']) }}" target="_blank">PDF</a> <a class="dropdown-item" href="{{ url('csv_export_all_orders')}}">Excel</a> </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Complete Orders</td>
                    <td>Document</td>
                    <td>Active</td>
                    <td>
                      <div class="dropdown">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"> Download File </button>
                        <div class="dropdown-menu"> <a class="dropdown-item" href="{{ route('completeorders',['download'=>'pdf']) }}" target="_blank">PDF</a> <a class="dropdown-item" href="{{url('csv_export_complete_orders')}}">Excel</a> </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>Pending Orders</td>
                    <td>Document</td>
                    <td>Active</td>
                    <td>
                      <div class="dropdown">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"> Download File </button>
                        <div class="dropdown-menu"> <a class="dropdown-item" href="{{ route('pendingorders',['download'=>'pdf']) }}" target="_blank">PDF</a> <a class="dropdown-item" href="{{url('csv_export_pendingorders')}}">Excel</a> </div>
                      </div>
                    </td>
                  </tr>
                  </tbody>
                </table><br>
              </div>
          </div>
        </div>
      </div>
      <div class="form-row"> </div>
      <div class="form-row"> </div>
      <div class="form-group"> </div>
      </form>
    </div>
  </div>
</div>





<!-- <script type="text/javascript">
    $(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ],
       initComplete: function() {
         var $buttons = $('.dt-buttons').hide();
         $('#exportLink').on('change', function() {
            var btnClass = $(this).find(":selected")[0].id 
               ? '.buttons-' + $(this).find(":selected")[0].id 
               : null;
            if (btnClass) $buttons.find(btnClass).click(); 
         })
       } 
    } );
} );

</script> -->
@stop