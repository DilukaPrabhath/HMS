<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Login</title>

 
  <link href="{{asset('hms2020/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  
  <link href="{{asset('hms2020/css/hms_css_2.min.css')}}" rel="stylesheet">
  
</head>
<body class="bg-gradient" style="background: linear-gradient(90deg, #1CB5E0 0%, #000851 100%);">

  <div class="container">

   
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg col-md">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
          
            <div class="row">
            
             <div><img src="{{asset('image/loginbg.png')}}" width="450" height="450"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome!</h1>
                  </div>
                  <form class="user" method="POST" action="{{ route('login') }}">
                 
                        @csrf
                    <div class="form-group">
                     
                      <input id="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter Email Address...">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <div class="form-group">
                      
                      <input id="password" type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                       <!--  <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                      </div> -->
                    </div>

                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                    {{ __('Login') }}
                                </button>
                  </form>
                  <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                  </a>
                  </th>
                </div>
              </div>
            </div>
          </div>
        

   
  


  <script src="{{asset('hms2020/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('hms2020/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  
  <script src="{{asset('hms2020/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

 
  <script src="{{asset('hms2020/js/sb-admin-2.min.js')}}"></script>

</body>

</html>
