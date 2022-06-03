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
        <link href="{{asset('site/appcss/style.css')}}" rel="stylesheet">
        <link href="{{asset('site/appcss/responsive.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
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
                                  <a class="dropdown-toggle" data-toggle="dropdown" href="{{url('website/site')}}" role="button" aria-haspopup="true" aria-expanded="false">Home</a>
                                  <ul class="dropdown-menu">
                                   
                                  </ul>
                                </li> 
                                <li class="active"><a href="{{url('website/recipe')}}">Menu</a></li>
                                <li><a href="{{url('website/roomlist')}}">Rooms</a></li>
                                    
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
                                <li><a href="#">Contact Us</a></li>
                            </ul>
                        </div>
                        <h5>
                            <a href="">
                            <i class="fa fa-shopping-cart" style="padding-left: 40px;"><span class="badge badge-danger badge-counter">{{ count((array) session('cart')) }}</span></i>
                          </a>
                        </h5>
                    </nav>
                </div>
            </div>
        </header>
    
 
        <section class="banner_area">
            <div class="container">
                <div class="banner_text">
                    <h3>Cart</h3>  
                </div>
            </div>
        </section>
        <section class="our_cakes_area p_100">         
              
@extends('backend.website.cart.layout')

@section('title', 'Cart')

@section('content')

    @if(session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif
       <table id="cart" class="table table-hover table-condensed">
        <thead>
        <tr>
            <th style="width:50%">Product</th>
            <th style="width:10%">Price</th>
            <th style="width:8%">Quantity</th>
            <th style="width:22%" class="text-center">Subtotal</th>
            <th style="width:10%"></th>
        </tr>
        </thead>
        <tbody>

        <?php $total = 0 ?>

        @if(session('cart'))
            @foreach(session('cart') as $id => $details)

                <?php $total += $details['price'] * $details['quantity'] ?>

                <tr>
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-3 hidden-xs"><img src="{{asset('Upload/Meals/'.$details['photo'])}}" width="100" height="100" class="img-responsive"/></div>
                            <div class="col-sm-9">
                                <h4 class="nomargin">{{ $details['name'] }}</h4>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price">Rs. {{ $details['price'] }}</td>
                    <td data-th="Quantity">
                        <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity" />
                    </td>
                    <td data-th="Subtotal" class="text-center">Rs. {{ $details['price'] * $details['quantity'] }}</td>
                    <td class="actions" data-th="">
                        <button class="btn btn-info btn-sm update-cart" data-id="{{ $id }}"><i class="fa fa-refresh"></i></button>
                        <button class="btn btn-danger btn-sm remove-from-cart" data-id="{{ $id }}"><i class="fa fa-trash-o"></i></button>
                    </td>
                </tr>
            @endforeach
        @endif

        </tbody>
        <tfoot>
        <tr class="visible-xs">
            <td class="text-center"><strong>Total: Rs. {{ $total }}</strong></td>
        </tr>
        <tr>
            <td><a href="{{url('website/recipe')}}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Back To Meals Items</a></td>
            <td colspan="2" class="hidden-xs"></td>
            <td class="hidden-xs text-center"><strong>Total: Rs. {{ $total }}</strong></td>
            <td><a href="{{url('website/placeorder')}}" class="btn btn-success btn-block" >Check Out <i class="fa fa-angle-right"></i></a></td>
            
        </tr>
        </tfoot>
    </table>

@endsection
                    
                
</section>

        
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
@section('scripts')
    <script type="text/javascript">

        $(".update-cart").click(function (e) {
           e.preventDefault();

           var ele = $(this);

            $.ajax({
               url: '{{ url('update-cart') }}',
               method: "patch",
               data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity: ele.parents("tr").find(".quantity").val()},
               success: function (response) {
                   window.location.reload();
               }
            });
        });

        $(".remove-from-cart").click(function (e) {
            e.preventDefault();

            var ele = $(this);

            if(confirm("Are you sure")) {
                $.ajax({
                    url: '{{ url('remove-from-cart') }}',
                    method: "DELETE",
                    data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                    success: function (response) {
                        window.location.reload();
                    }
                });
            }
        });

    </script>

@endsection
</html>