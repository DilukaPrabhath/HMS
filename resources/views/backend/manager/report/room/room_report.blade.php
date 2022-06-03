@extends('backend.manager.layout.master') 

@section('content')

<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"></h1> </div>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <table width="100%">
        <tr>
          <td>
            <h5 class="m-0 font-weight-bold text-dark col-md-4">Common Reports</h5></td>
        </tr>
      </table>
    </div>
    <div class="card-body">
      <div class="form-row">
        <div class="form-group col-md-6">
          <div class="container-fluid">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
              <h6 class="m-0 font-weight-bold text-dark" style="padding-top:10px">All Rooms Report</h6><br> </div>
            <div class="card-body">
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
                    <td>All Room Data</td>
                    <td>Document</td>
                    <td>Active</td>
                    <td>
                      <div class="dropdown">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"> Download File </button>
                        <div class="dropdown-menu"> <a class="dropdown-item" href="{{url('manager/pdfviewallroom')}}" target="_blank">PDF</a> <a class="dropdown-item" href="{{ url('manager/csv_file/export/allroom')}}">Excel</a> </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Available Room</td>
                    <td>Document</td>
                    <td>Active</td>
                    <td>
                      <div class="dropdown">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"> Download File </button>
                        <div class="dropdown-menu"> <a class="dropdown-item" href="{{url('manager/pdfviewavailableroom')}}" target="_blank">PDF</a> <a class="dropdown-item" href="{{url('manager/csv_file/export/availableroom')}}">Excel</a> </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>Not Available Room</td>
                    <td>Document</td>
                    <td>Active</td>
                    <td>
                      <div class="dropdown">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"> Download File </button>
                        <div class="dropdown-menu"> <a class="dropdown-item" href="{{url('manager/pdfviewnotavailableroom')}}" target="_blank">PDF</a> <a class="dropdown-item" href="{{url('manager/csv_file/export/notavailableroom')}}">Excel</a> </div>
                      </div>
                    </td>
                  </tr>
                  </tbody>
                </table><br>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group col-md-6">
          <div class="container-fluid">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
              <h6 class="m-0 font-weight-bold text-dark" style="padding-top:10px">Individual Customer Report</h6><br> </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered"  width="100%" cellspacing="0">
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
                    <td>Individual Room Data</td>
                    <td>Document</td>
                    <td>Active</td>
                    <td>
                  <a href="{{url('#')}}" class=" btn btn-block btn-success">Report</a>
                    </td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Room History</td>
                    <td>Document</td>
                    <td>Active</td>
                    <td>
                  <a href="{{url('manager/room_vise')}}" class=" btn btn-block btn-success">Report</a>
                    </td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>Date Vise</td>
                    <td>Document</td>
                    <td>Active</td>
                    <td>
                    <a href="{{url('manager/moredetails')}}" class=" btn btn-block btn-success">Report</a>
                    </td>
                  </tr>
                  </tbody>
                </table>
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

@stop