@extends('backend.receptionist.master_receptionist')

@section('content')

      <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Dashboard-Receptionist</h1>
        </div>
<style type="text/css">
  .card {
    background-color: #fff;
    border-radius: 10px;
    border: none;
    position: relative;
    margin-bottom: 30px;
    box-shadow: 0 0.46875rem 2.1875rem rgba(90,97,105,0.1), 0 0.9375rem 1.40625rem rgba(90,97,105,0.1), 0 0.25rem 0.53125rem rgba(90,97,105,0.12), 0 0.125rem 0.1875rem rgba(90,97,105,0.1);
}
.l-bg-cherry {
    background: linear-gradient(to right, #493240, #f09) !important;
    color: #fff;
}

.l-bg-blue-dark {
    background: linear-gradient(to right, #373b44, #4286f4) !important;
    color: #fff;
}

.l-bg-green-dark {
    background: linear-gradient(to right, #0a504a, #38ef7d) !important;
    color: #fff;
}

.l-bg-orange-dark {
    background: linear-gradient(to right, #a86008, #ffba56) !important;
    color: #fff;
}

.card .card-statistic-3 .card-icon-large .fas, .card .card-statistic-3 .card-icon-large .far, .card .card-statistic-3 .card-icon-large .fab, .card .card-statistic-3 .card-icon-large .fal {
    font-size: 110px;
}

.card .card-statistic-3 .card-icon {
    text-align: center;
    line-height: 50px;
    margin-left: 15px;
    color: #000;
    position: absolute;
    right: -5px;
    top: 20px;
    opacity: 0.1;
}

.l-bg-cyan {
    background: linear-gradient(135deg, #289cf5, #84c0ec) !important;
    color: #fff;
}

.l-bg-green {
    background: linear-gradient(135deg, #23bdb8 0%, #43e794 100%) !important;
    color: #fff;
}

.l-bg-orange {
    background: linear-gradient(to right, #f9900e, #ffba56) !important;
    color: #fff;
}

.l-bg-cyan {
    background: linear-gradient(135deg, #289cf5, #84c0ec) !important;
    color: #fff;
}
</style>
        <!-- Content Row -->
        <div class="row">

          <div class="col-md-12 ">
    <div class="row ">
        <div class="col-xl-3 col-lg-6">
            <div class="card l-bg-cherry">
                <div class="card-statistic-3 p-4">
                    
                    <div class="mb-4">
                        <h6 class="card-title mb-0">Monthly Earnings (Orders)</h6>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h3 class="d-flex align-items-center mb-0">
                               Rs. {{$data2}}
                            </h3>
                        </div>
                        <div class="col-4 text-right">
                            <!-- span>12.5% <i class="fa fa-arrow-up"></i></span> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6">
            <div class="card l-bg-blue-dark">
                <div class="card-statistic-3 p-4">
                    
                    <div class="mb-4">
                        <h6 class="card-title mb-0">Total Customers</h6>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h3 class="d-flex align-items-center mb-0">
                               <h3 class="d-flex align-items-center mb-0">{{\DB::table('customers')->where('status','=','1')->count()}}</h3>
                            </h3>
                        </div>
                        <div class="col-4 text-right">
                         <!--    <span>9.23% <i class="fa fa-arrow-up"></i></span> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6">
            <div class="card l-bg-green-dark">
                <div class="card-statistic-3 p-4">
                    
                    <div class="mb-4">
                        <h6 class="card-title mb-0">Room Available Count</h6>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h3 class="d-flex align-items-center mb-0">
                                {{ \DB::table('rooms')->where('status','=','1')->count()}}/{{ \DB::table('rooms')->count()}}
                            </h3>
                        </div>
                        <div class="col-4 text-right">
                            <!-- <span>10% <i class="fa fa-arrow-up"></i></span> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
           <div class="col-xl-3 col-lg-6">
                    <div class="card l-bg-orange-dark">
                        <div class="card-statistic-3 p-4">
                            <div class="mb-4">
                                <h6 class="card-title mb-0">Orders</h6> </div>
                            <div class="row align-items-center mb-2 d-flex">
                                <div class="col mb-2">
                                    <h5 class="d-flex align-items-center mb-0">Complete: 
                               {{\DB::table('orders')->where('status','=','1')->count()}}
                            </h5> </div>
                             <div class="col mb-2">
                                    <h5 class="d-flex align-items-right mb-0">
                                Pending: {{\DB::table('orders')->where('status','=','0')->count()}}
                            </h5> </div>
                                <!-- <div class="col-4 text-right"> <span>2.5% <i class="fa fa-arrow-up"></i></span> </div> -->
                            </div>
                            </div>
                    </div>
                </div>
    </div>
</div>
</div>


<div class="row">
</div>
</div>
@stop