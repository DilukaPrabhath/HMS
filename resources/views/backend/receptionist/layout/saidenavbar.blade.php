
    <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #000000;">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('admin/dashbord')}}">
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
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse" aria-expanded="true" aria-controls="collapse">
          <i class="fas fa-fw fa-cog"></i>
          <span>Manage Customers</span>
        </a>
        <div id="collapse" class="collapse" aria-labelledby="heading" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Manage Customers:</h6>
            <a class="collapse-item" href="{{url('receptionist/customers/add')}}">Customer Registration</a>
            <a class="collapse-item" href="{{url('receptionist/customers')}}">Registered Customers</a>
        <a class="collapse-item" href="{{url('receptionist/add/section/customer')}}">Add Service For Customers</a>
            <a class="collapse-item" href="{{url('receptionist/customers/checkinlist')}}">CheckIn List</a>
            <a class="collapse-item" href="{{url('receptionist/customers/checkoutlist')}}">CheckOut List</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Manage Rooms</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Manage Rooms:</h6>
            <a class="collapse-item" href="{{url('receptionist/reserve')}}">Reserved Rooms</a>
            <a class="collapse-item" href="{{url('receptionist/available')}}">Available Rooms</a>
          </div>
        </div>
        
        <li class="nav-item active">
        <a class="nav-link" href="{{url('receptionist/messages')}}">
          <i class="fas fa-project-diagram"></i>
          <span>Messages</span></a>
      </li>
      </li>
        <!-- <li class="nav-item active">
        <a class="nav-link" href="{{url('admin/portfolio')}}">
          <i class="fas fa-project-diagram"></i>
          <span>Payments</span></a>
      </li> -->
      <hr class="sidebar-divider d-none d-md-block">
      <div class="text-center d-none d-md-inline">  
      </div>
    </ul>
  