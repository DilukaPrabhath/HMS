
@extends('backend.admin.layout.master')

@section('content')

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="src/pc-system.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">


<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12" style="color:rgba(255,205,25,1)">
                <h3 class="text-center">Sri Lanka National Identity Card Validation</h3>
                <hr />
                <h6 class="text-left">GitHUb Repositary:<a href="https://github.com/lathindu1/SL-Nic-Validate"></a></h6>
            </div>
        </div>
        <div class="row justify-content-md-center nic-card">
            <div class="col-lg-4 col-md-4 col-sm-12 col-12 card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">NIC Number</label>
                        <input type="text" class="nic-validate form-control" autofocus placeholder="Enter Your NIC No">
                        <small class="form-text text-danger nic-validate-error"></small>
                    </div>
                    <div class="form-group">
                          <input type="text" class="nic-birthday form-control" readonly=""> <br>
                          <input type="text" class="nic-gender form-control" readonly="">
                    </div>

                    <h6 class="text-center">
                        <button class="btn btn-success mx-auto nic-validate-btn">Validate</button>
                        <button class="btn btn-warning mx-auto nic-clear-btn">Clear</button>
                    </h6>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12" style="color:rgba(255,255,255,1)">
                <hr />
                <h6 class="text-center">
                    <strong>Classes</strong>
                </h6>
                <ul>
                    <li>.nic-validate -----> This class used for nic input</li>
                    <li>.nic-validate-btn -----> This class used for validate nic</li>
                    <li>.nic-clear-btn -----> This class used for clear button (clear all)</li>
                    <li>.nic-validate-error -----> This class used for show validation error</li>
                    <li>.nic-birthday -----> This class used for show birthday</li>
                    <li>.nic-gender -----> This class used for show gender</li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12" style="color:rgba(255,255,255,1)">
                <hr />
                <h6 class="text-right">
                    <small>Developed By</small> PantherCodes</h6>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <script src="{{asset('hms2020/js/nic.js')}}"></script>
</body>

  @stop