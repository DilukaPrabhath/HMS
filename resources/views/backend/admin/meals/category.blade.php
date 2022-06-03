@extends('backend.admin.layout.master')

@section('content')
<div class="container-fluid">
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800"></h1>
</div>
<div class="card shadow mb-4">
  <div class="card-header py-3">
      <table width="100%">
          <tr>
            <td><h5 class="m-0 font-weight-bold text-dark col-md-4">All Category</h5></td>
            <td><a href="{{url('admin/mealitems')}}" class="col-md-4 btn btn-block btn-dark float-right">Add Meal Items</a></td>
          </tr>    
    </table>
  </div>
  <style type="text/css">
            a.nounderline {text-decoration: none; }
            .bg1{
              background-image: linear-gradient(to right, #E5E4E2, #5CB3FF);
              padding: 10px;
              border-radius: 10px;
            }
            .bg2{
              background-image: linear-gradient(to right, #E5E4E2, #52D017);
              padding: 10px;
              border-radius: 10px;
            }
            .bg3{
              background-image: linear-gradient(to right, #E5E4E2, #F62217);
              padding: 10px;
              border-radius: 10px;
            }
            .bg4{
              background-image: linear-gradient(to right, #E5E4E2, #F6358A);
              padding: 10px;
              border-radius: 10px;
            }
            .bg5{
              background-image: linear-gradient(to right, #E5E4E2, #A74AC7);
              padding: 10px;
              border-radius: 10px;
            }
            .bg6{
              background-image: linear-gradient(to right, #E5E4E2, #FFDB58);
              padding: 10px;
              border-radius: 10px;
            }
            </style>
  <table >
    <tr>
  <div class="card-body">
    <div class="table-responsive">
        <td><div class="col-xl-10 col-md-6 mb-4" >
              <a href="{{url('admin/breakfast')}}" class="nounderline">
              <div class="shadow h-100 py-2 bg1">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="h5 mb-0 font-weight-bold text-gray-800" >Breakfast</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-bread-slice fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
              </a>
            </div></td>

              <td><div class="col-xl-10 col-md-6 mb-4" >
              <a href="{{url('admin/lunch')}}" class="nounderline">
              <div class="shadow h-100 py-2 bg2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="h5 mb-0 font-weight-bold text-gray-800" >Lunch</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-cookie fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
              </a>
            </div></td>
            <td><div class="col-xl-10 col-md-6 mb-4" >
              <a href="{{url('admin/dinner')}}" class="nounderline">
              <div class="shadow h-100 py-2 bg3">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="h5 mb-0 font-weight-bold text-gray-800" >Dinner</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-bacon fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
              </a>
            </div></td>
</tr>
 <td><div class="col-xl-10 col-md-6 mb-10" >
              <a href="{{url('admin/dessert')}}" class="nounderline">
              <div class="shadow h-100 py-2 bg4">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="h5 mb-0 font-weight-bold text-gray-800" >Dessert</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-apple-alt fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
              </a>
            </div></td>
              <td><div class="col-xl-10 col-md-6 mb-10" >
              <a href="{{url('admin/drink')}}" class="nounderline">
              <div class="shadow h-100 py-2 bg5">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="h5 mb-0 font-weight-bold text-gray-800" >Beverage</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-popcorn fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
              </a>
            </div></td>
            <td><div class="col-xl-10 col-md-6 mb-10" >
              <a href="{{url('admin/snack')}}" class="nounderline">
              <div class="shadow h-100 py-2 bg6">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="h5 mb-0 font-weight-bold text-gray-800" >Snack</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-taco fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
              </a>
            </div></td>
</tr>
</table><br>
                </div>
            </div>
          
           

@stop