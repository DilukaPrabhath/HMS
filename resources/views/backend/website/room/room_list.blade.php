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
    </head>
    <body>
		<header class="main_header_area">
			
			<div class="main_menu_area">
				<div class="container">
					<nav class="navbar navbar-expand-lg navbar-light bg-light">
						<a class="navbar-brand" href="index.html">
						
						</a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<span class="my_toggle_menu">
                            	<span></span>
                            	<span></span>
                            	<span></span>
                            </span>
						</button>
						<div class="collapse navbar-collapse" id="navbarSupportedContent">
							<ul class="navbar-nav mr-auto">
								<li class="dropdown submenu ">
				                  <a class="dropdown-toggle" data-toggle="dropdown" href="{{url('website/site')}}" role="button" aria-haspopup="true" aria-expanded="false" >Home</a>
				                  <ul class="dropdown-menu">
				                   
				                  </ul>
				                </li> 
								<li><a href="{{url('website/recipe')}}">Menu</a></li>
								<li class="active"><a href="{{url('website/roomlist')}}">Rooms</a></li>
									
								</li>
							</ul>
							<ul class="navbar-nav justify-content-end">
								<li class="dropdown submenu">
									<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Services</a>
									
								</li>
								<li class="dropdown submenu">
									<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Shop</a>
									<ul class="dropdown-menu">
										<li><a href="{{url('cart')}}">Cart Page</a></li>
										<li><a href="#">Checkout Page</a></li>
									</ul>
								</li>
								<li><a href="contact.html">Contact Us</a></li>
							</ul>
							
						</div>
						
        		<h5>
          	<a href="{{url('cart')}}">
        	<i class="fa fa-shopping-cart" style="padding-left: 40px;"><span class="badge badge-danger badge-counter">{{ count((array) session('cart')) }}</span></i>
      		</a>
    			</h5>
					</nav>
				</div>
			</div>
		</header>
        <section class="banner_area2">
        	<div class="container">
        		<div class="banner_text">
        			<h3>Rooms</h3>
        			
        		</div>
        	</div>
        </section>
        <section class="our_cakes_area p_100">
        	<div class="container">
        		<div class="main_title">
        			<h2>Our Rooms</h2>
        		</div>
        			<div class="cake_feature_row row">
        			@foreach($rooms as $value)
					<div class="col-lg-3 col-md-4 col-6">
						<div class="cake_feature_item">
							<div class="cake_img">
								<img src="{{asset('Upload/Rooms/'.$value->image)}}" alt="" width="272px" height="226px">
							</div>
							<div class="cake_text">
								<!-- <h4>Rs.{{$value->item_price}}</h4> -->
								@if ($value->room_type_id == 1)
                          			<h3 style="color:green; margin-bottom: 5px; padding-top: 5px;">Single</h3>
                            @elseif ($value->room_type_id == 2)
                              		<h3 style="color:blue; margin-bottom: 5px; padding-top: 5px;">Double</h3>
                           
                            @elseif ($value->room_type_id == 3)
                              		<h3 style="color:yellow; margin-bottom: 5px; padding-top: 5px;">Family</h3>	
                          
                            @elseif ($value->room_type_id == 4)
                              		<h3 style="color:red; margin-bottom: 5px; padding-top: 5px;">Suite</h3>	

                              @else ($value->room_type_id == 5)
                              		<h3 style="color:hotpink; margin-bottom: 5px; padding-top: 5px;">Double Extra</h3>	
                            @endif
								<h3 style="margin-bottom: 5px; padding-top: 5px;">{{$value->room_no}}</h3>
								<h6 style="text-align: justify;">{{$value->description}}</h6>
								
									<h6 style="text-align: right;">@if ($value->status == 1)
                            <span class="badge badge-success">Available</span>
                            @elseif ($value->status == 0)
                              <span class="badge badge-danger">Not Available</span>
                          
                            @endif
								</h6>
							</div>
						</div>
					</div>
					 @endforeach
					</div>
			
				</section>

        <footer class="footer_area">
        	<div class="footer_widgets">
        		<div class="container">
        			
        		</div>
        	</div>
        </footer>
        
        <script>
function goBack() {
  window.history.back();
}
</script>
       
        
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
    </body>

</html>