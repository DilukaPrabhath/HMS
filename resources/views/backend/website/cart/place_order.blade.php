<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="img/fav-icon.png" type="image/x-icon" />
  <title>Hotel Grand Opera</title>
 
  <link href="{{asset('site/css/font-awesome.min.css')}}" rel="stylesheet">
  <link href="{{asset('site/vendors/linearicons/style.css')}}" rel="stylesheet">
  <link href="{{asset('site/vendors/flat-icon/flaticon.css')}}" rel="stylesheet">
  <link href="{{asset('site/appcss/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('site/vendors/revolution/css/settings.css')}}" rel="stylesheet">
  <link href="{{asset('site/vendors/revolution/css/layers.css')}}" rel="stylesheet">
  <link href="{{asset('site/vendors/revolution/css/navigation.css')}}" rel="stylesheet">
  <link href="{{asset('site/vendors/animate-css/animate.css')}}" rel="stylesheet">
  <link href="{{asset('site/vendors/stroke-icon/style.css')}}" rel="stylesheet">
  <link href="{{asset('site/vendors/owl-carousel/owl.carousel.min.css')}}" rel="stylesheet">
  <link href="{{asset('site/vendors/magnifc-popup/magnific-popup.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <link href="{{asset('site/appcss/style.css')}}" rel="stylesheet">
  <link href="{{asset('site/appcss/responsive.css')}}" rel="stylesheet">
  <link href="{{asset('hms2020/order/place.css')}}" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
</head>

<body>
  
  <header class="main_header_area">
    <div class="main_menu_area">
      <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <a class="navbar-brand" href="index.html"> </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="my_toggle_menu">
                              <span></span> <span></span> <span></span> </span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="dropdown submenu "> <a class="dropdown-toggle" data-toggle="dropdown" href="{{url('website/site')}}" role="button" aria-haspopup="true" aria-expanded="false">Home</a>
                <ul class="dropdown-menu"> </ul>
              </li>
              <li><a href="{{url('website/recipe')}}">Menu</a></li>
              <li><a href="{{url('website/roomlist')}}">Rooms</a></li>
              </li>
            </ul>
            <ul class="navbar-nav justify-content-end">
              <li class="dropdown submenu"> <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Services</a> </li>
              <li class="dropdown submenu"> <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false" class="active">Shop</a>
                <ul class="dropdown-menu">
                  <li><a href="{{url('cart')}}">Cart Page</a></li>
                  <li><a href="{{url('website/placeorder')}}">Place Order</a></li>
                </ul>
              </li>
              <li><a href="#">Contact Us</a></li>
            </ul>
          </div>
          <h5>
                <a href="{{url('cart')}}">
                <i class="fa fa-shopping-cart" style="padding-left: 40px;"><span class="badge badge-danger badge-counter">{{ count((array) session('cart')) }}</span></i>
              </a>
            </h5> </nav>
      </div>
    </div>
  </header>

  <section class="banner_area">
    <div class="container">
      <div class="banner_text">
        <h3>Place Order</h3> </div>
    </div>
  </section>
  @php
  $cart = session()->get('cart');
      $totalCost = 0;
        foreach($cart as $c){
           $totalCost +=  $c['price'] * $c['quantity'];;
            
        }
       
  @endphp
 
  <section class="our_cakes_area p_100">
    <div class="container">
      <div class="main_title">
        <!-- <h2>Place Order</h2> -->
        @if (session('status'))
    <div class="alert alert-success" role="alert"> 
    {{session ('status')}} </div> 
    @endif
     <div class="row">
          <form method="post" action="{{url('store')}}" enctype="multipart/form-data"> {{ csrf_field() }}
          <div class="col-7 col">
            <h3 class="topborder"><span>Billing Details</span></h3>
            <p id="niclbl" style="color: red;font-weight: bold;"></p>
             <div class="width50 padright">
              <label for="postcode"s>NIC</label>
              <input type="text" name="nic" id="nic" placeholder="" autocomplete="off">
            </div>
            <div class="width50">
              <label for="fname">First Name</label>
              <input type="text" name="fname" id="fname" readonly="" >
            </div>
            <div class="width50 padright">
              <label for="lname">Last Name</label>
              <input type="text" name="lname" id="lname" readonly="">
            </div>
            <div class="width50">
              <label for="tel">Email</label>
              <input type="text" name="email" id="email" readonly="">
            </div>
          </div>
          <div class="col-5 col order">
            <h3 class="topborder"><span>Your Order</span></h3>
              <h6 class="inline difwidth">Sub Total: Rs.{{ $totalCost }}</h6>
            <div>
              <h6 class="inline difwidth">Shipping :</h6>
              <h6 class="alignright center">Free Delivery</h6>
            </div>
            <input type="submit" name="submit" value="Place Order" id="plcorder" class="redbutton">
          </div>
        </form>
      </div>
    </div>
 <!-- order -->
          </div>
        </div>
  </section>

  <footer class="footer_area">
    <div class="footer_widgets">
      <div class="container"> </div>
    </div>
  </footer>

  <script src="{{asset('site/js/jquery-3.2.1.min.js')}}"></script>
  <script src="{{asset('site/js/popper.min.js')}}"></script>
  <script src="{{asset('site/js/bootstrap.min.js')}}"></script>

  <script src="{{asset('site/vendors/revolution/js/jquery.themepunch.tools.min.js')}}"></script>
  <script src="{{asset('site/vendors/revolution/js/jquery.themepunch.revolution.min.js')}}"></script>
  <script src="{{asset('site/vendors/revolution/js/extensions/revolution.extension.actions.min.js')}}"></script>
  <script src="{{asset('site/vendors/revolution/js/extensions/revolution.extension.video.min.js')}}"></script>
  <script src="{{asset('site/vendors/revolution/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
  <script src="{{asset('site/vendors/revolution/js/extensions/revolution.extension.layeranimation.min.js')}}"></script>
  <script src="{{asset('site/vendors/revolution/js/extensions/revolution.extension.navigation.min.js')}}"></script>
  <script src="{{asset('site/vendors/owl-carousel/owl.carousel.min.js')}}"></script>
  <script src="{{asset('site/vendors/magnifc-popup/jquery.magnific-popup.min.js')}}"></script>
  <script src="{{asset('site/vendors/datetime-picker/js/moment.min.js')}}"></script>
  <script src="{{asset('site/vendors/datetime-picker/js/bootstrap-datetimepicker.min.js')}}"></script>
  <script src="{{asset('site/vendors/nice-select/js/jquery.nice-select.min.js')}}"></script>
  <script src="{{asset('site/vendors/jquery-ui/jquery-ui.min.js')}}"></script>
  <script src="{{asset('site/vendors/lightbox/simpleLightbox.min.js')}}"></script>
  <script src="{{asset('site/js/theme.js')}}"></script>
  <script src="{{asset('site/js/bootstrap.min.js')}}"></script>


  <script type="text/javascript">
     

    $(document).ready(function(){
    $('#nic').blur(function(){
      if($(this).val() != '')
        {

            var select = $(this).val();
            console.log(select);
          
          var _token = $('input[name="_token"]').val();
          $.ajax({
            url:"{{ route('dynamicdependent.fetchdetails') }}",
            method:"POST",
            data:{select:select, _token:_token},
            success:function(result)
            {
             console.log(result);
             if (result == 0) {
               document.getElementById("plcorder").disabled = true;
               document.getElementById('niclbl').innerHTML = "Enter Valied NIC !";
               
             }else{
                document.getElementById('fname').value = result.fname;
                document.getElementById('lname').value = result.lname;
                document.getElementById('email').value   = result.email;
                document.getElementById("plcorder").disabled = false;
                document.getElementById('niclbl').innerHTML = "";


             }
            
             console.log("Success!!");

            }
          })
        }
      });
        });


        </script>
            
</body>



</html>