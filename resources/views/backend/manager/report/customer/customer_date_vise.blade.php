@extends('backend.manager.layout.master') @section('content')
<style type="text/css">

.badge1 {
  width: 90px;
  height: 20px;
  border-radius: 10px;
  top: 0;
}

.blue {
  background: dodgerblue;
  color: deepskyblue;
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
            <h5 class="m-0 font-weight-bold text-dark col-md-4">Filtered Reports - Date Vise</h5></td>
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
                      <h6 class="m-0 font-weight-bold text-dark" style="padding-top:10px">Distribution by 2021</h6>
                      <br> </div>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                          <thead style="background-color:#F5F5F5;">
                            <tr style="color:black;">
                              <th>Month</th>
                              <th>Customer Count</th>
                              <th>Month</th>
                              <th>Customer Count</th>
                            </tr>
                          </thead>
                          <tr>
                            <td>January</td>
                            <td><span class="badge badge-info">{{\DB::table('customers')->whereBetween('created_at', ['2021-01-01 00:00:00','2021-01-31 23:59:59'])->count()}}</span></td>
                            <td>July</td>
                            <td><span class="badge badge-info">{{\DB::table('customers')->whereBetween('created_at', ['2021-07-01 00:00:00','2021-07-31 23:59:59'])->count()}}</span></td>
                          </tr>
                          <tr>
                            <td>February</td>
                            <td><span class="badge badge-info">{{\DB::table('customers')->whereBetween('created_at', ['2021-02-01 00:00:00','2021-02-28 23:59:59'])->count()}}</span></td>
                            <td>August</td>
                            <td><span class="badge badge-info">{{\DB::table('customers')->whereBetween('created_at', ['2021-08-01 00:00:00','2021-08-31 23:59:59'])->count()}}</span></td>
                          </tr>
                          <tr>
                            <td>March</td>
                            <td><span class="badge badge-info">{{\DB::table('customers')->whereBetween('created_at', ['2021-03-01 00:00:00','2021-03-31 23:59:59'])->count()}}</span></td>
                            <td>September</td>
                            <td><span class="badge badge-info">{{\DB::table('customers')->whereBetween('created_at', ['2021-09-01 00:00:00','2021-09-30 23:59:59'])->count()}}</span></td>
                          </tr>
                          <tr>
                            <td>April</td>
                            <td><span class="badge badge-info">{{\DB::table('customers')->whereBetween('created_at', ['2021-04-01 00:00:00','2021-04-30 23:59:59'])->count()}}</span></td>
                            <td>October</td>
                            <td><span class="badge badge-info">{{\DB::table('customers')->whereBetween('created_at', ['2021-10-01 00:00:00','2021-10-31 23:59:59'])->count()}}</span></td>
                          </tr>
                          <tr>
                            <td>May</td>
                            <td><span class="badge badge-info">{{\DB::table('customers')->whereBetween('created_at', ['2021-05-01 00:00:00','2021-05-31 23:59:59'])->count()}}</span></td>
                            <td>November</td>
                            <td><span class="badge badge-info">{{\DB::table('customers')->whereBetween('created_at', ['2021-11-01 00:00:00','2021-11-30 23:59:59'])->count()}}</span></td>
                          </tr>
                          <tr>
                            <td>June</td>
                            <td><span class="badge badge-info">{{\DB::table('customers')->whereBetween('created_at', ['2021-06-01 00:00:00','2021-06-31 23:59:59'])->count()}}</span></td>
                            <td>December</td>
                            <td><span class="badge badge-info">{{\DB::table('customers')->whereBetween('created_at', ['2021-12-01 00:00:00','2021-12-31 23:59:59'])->count()}}</span></td>
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
            <div class="container">
              <h6 class="m-0 font-weight-bold text-dark" style="padding-top:10px">Select Date Range</h6>
              <br />
              <div class="row input-daterange">
                <div class="col-md-4">
                  <input type="text" name="from_date" id="from_date" class="form-control" placeholder="From Date" readonly /> </div>
                <div class="col-md-4">
                  <input type="text" name="to_date" id="to_date" class="form-control" placeholder="To Date" readonly /> </div>
                <div class="col-md-4">
                  <button type="button" name="filter" id="filter" class="btn btn-primary">Filter</button>
                  <button type="button" name="refresh" id="refresh" class="btn btn-success">Refresh</button>
                </div>
              </div>
              <br>
              <div class="card shadow mb-4">
                <div class="card-body">
                  <div class="table-responsive">
                    <div>
                    <button type="button" class="btn btn-dark" id="csv"> Export Data </button>
                  </div><br>
                    <table class="table table-bordered" id="order_table">
                      <thead style="background-color:#F5F5F5;">
                        <tr style="color:black;">
                          <th>First Name</th>
                          <th>Last Name</th>
                          <th>NIC</th>
                          <th>Mobile No</th>
                          <th>Created Date</th>
                        </tr>
                      </thead>
                    </table>
                  </div>
                </div>
              </div>
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
<script>
$(document).ready(function() {
  $('.input-daterange').datepicker({
    todayBtn: 'linked',
    format: 'yyyy-mm-dd',
    autoclose: true
  });
  load_data();

  function load_data(from_date = '', to_date = '') {
    $('#order_table').DataTable({
      processing: true,
      serverSide: true,
      responsive: true,
      ajax: {
        url: '{{ route("daterange1.index") }}',
        data: {
          from_date: from_date,
          to_date: to_date
        }
      },
      columns: [
      {
        data: 'fname',
        name: 'fname'
      }, 
      {
        data: 'lname',
        name: 'lname'
      }, 
      {
        data: 'nic',
        name: 'nic'
      }, 
      {
        data: 'mobile',
        name: 'mobile'
      }, 
      {
        data: 'created_at',
        name: 'created_at'
      }]
    });
  }
  $('#filter').click(function() {
    var from_date = $('#from_date').val();
    var to_date = $('#to_date').val();
    if(from_date != '' && to_date != '') {
      $('#order_table').DataTable().destroy();
      load_data(from_date, to_date);
    } else {
      alert('Both Date is required');
    }
  });
  $('#refresh').click(function() {
    $('#from_date').val('');
    $('#to_date').val('');
    $('#order_table').DataTable().destroy();
    load_data();
  });
});
$(document).ready(function() {
  $('#csv').click(function(e) {
    console.log("Hi");
    getdate();
  });
});

function getdate() {
  var from_date = $("#from_date").val();
  var to_date = $("#to_date").val();
  if(from_date != '') {
    $.ajax({
      type: "get",
      url: "{{ url('/csv_export_select_data') }}",
      async: false,
      data: {
        "from_date": from_date,
        "to_date": to_date
      },
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      beforeSend: function() {},
      success: function(data) {
        console.log("Success!");
      },
      error: function() {
        console.log("Error!");
      }
    });
  } else {
    $.ajax({
      type: "get",
      url: "{{ url('/csv_export_all_data') }}",
      async: false,
      data: {
        "from_date": from_date,
        "to_date": to_date
      },
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      beforeSend: function() {},
      success: function(data) {
        console.log("Success!");
      },
      error: function() {
        console.log("Error!");
      }
    });
  }
}
</script> 
@stop