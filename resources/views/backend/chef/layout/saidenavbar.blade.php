
    <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #000000;">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('chef/dashbord')}}">
        <div class="">
          <img src="{{asset('image/logo.png')}}"  width="224" height="71">
        </div>
        <div class=""></div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item active">
        <a class="nav-link" href="{{url('/home')}}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Functions
      </div>
        <li class="nav-item active">
        <a class="nav-link" href="{{url('chef/pending')}}">
          <i class="fas fa-project-diagram"></i>
          <span>Pending orders</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{url('chef/complete')}}">
          <i class="fas fa-project-diagram"></i>
          <span>Completed Orders</span></a>
      </li>
      <hr class="sidebar-divider d-none d-md-block">
      <div class="text-center d-none d-md-inline">  
      </div>
    </ul>
 