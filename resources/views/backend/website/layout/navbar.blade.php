
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <header class="main_header_area">
    
      <div class="main_menu_area">
        <div class="container">
          <nav class="navbar navbar-expand-lg navbar-light bg-light">

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="my_toggle_menu">
                              <span></span>
                              <span></span>
                              <span></span>
                            </span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                 <li class="dropdown submenu active">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="{{url('website/site')}}" role="button" aria-haspopup="true" aria-expanded="false">Home</a>
                  <ul class="dropdown-menu">
                   
                  </ul>
                </li> 
                <li><a href="{{url('website/recipe')}}">Menu</a></li>
                <li><a href="{{url('website/roomlist')}}">Rooms</a></li>
                  
                </li>
              </ul>
              <ul class="navbar-nav justify-content-end">
                <li class="dropdown submenu">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="" role="button" aria-haspopup="true" aria-expanded="false">Services</a>
                  <ul class="dropdown-menu">
                   
                  </ul>
                </li>
                <li class="dropdown submenu">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Shop</a>
                  <ul class="dropdown-menu">
                    <li><a href="{{url('cart')}}">Cart Page</a></li>
                    <li><a href="#">Checkout Page</a></li>
                  </ul>
                </li>
                <li><a href="">Contact Us</a></li>
              </ul>
        </div>

        <h5>
          <a href="{{url('cart')}}">
        <i class="fa fa-shopping-cart" style="padding-left: 40px;"><span class="badge badge-danger badge-counter">{{ count((array) session('cart')) }}</span></i>
      </a>
    </h5>
     
            </div>
          </nav>
        </div>
      </div>
    </header>
 