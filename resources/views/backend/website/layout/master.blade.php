<!DOCTYPE html>
<html lang="en">
    
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="icon" href="{{asset('site/img/fav-icon.png')}}" type="image/x-icon" />
        <title>Hotel Grand Opera</title>
        <link href="{{asset('site/css/font-awesome.min.css')}}" rel="stylesheet">
        <link href="{{asset('site/vendors/linearicons/style.css')}}" rel="stylesheet">
        <link href="{{asset('site/vendors/flat-icon/flaticon.css')}}" rel="stylesheet">
        <link href="{{asset('site/appcss/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('site/vendors/revolution/css/settings.css')}}" rel="stylesheet">
        <link href="{{asset('site/vendors/revolution/css/layers.css')}}" rel="stylesheet">
        <link href="{{asset('site/vendors/revolution/css/navigation.css')}}" rel="stylesheet">
        <link href="{{asset('site/vendors/animate-css/animate.css')}}" rel="stylesheet">
        <link href="{{asset('site/vendors/owl-carousel/owl.carousel.min.css')}}" rel="stylesheet">
        <link href="{{asset('site/vendors/magnifc-popup/magnific-popup.css')}}" rel="stylesheet">
        <link href="{{asset('site/appcss/style.css')}}" rel="stylesheet">
        <link href="{{asset('site/appcss/responsive.css')}}" rel="stylesheet">

    </head>
    <body>

<!--Sid NavBar -->

@include('backend.website.layout.slider')
         
@include('backend.website.layout.navbar')

@yield('content')
 

</div>
 
@include('backend.website.layout.footer')

</div>

</div>

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
