
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
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse6" aria-expanded="true" aria-controls="collapse6">
          <i class="fas fa-fw fa-cog"></i>
          <span>Employee Registration</span>
        </a>
        <div id="collapse6" class="collapse" aria-labelledby="heading" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Employee Registration:</h6>
            <a class="collapse-item" href="{{url('/admin/users')}}">System Employees</a>
            <a class="collapse-item" href="{{url('admin/roomboy')}}">Non-System Employees</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse" aria-expanded="true" aria-controls="collapse">
          <i class="fas fa-fw fa-cog"></i>
          <span>Manage Customers</span>
        </a>
        <div id="collapse" class="collapse" aria-labelledby="heading" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Manage Customers:</h6>
            <a class="collapse-item" href="{{url('/admin/customers/add')}}">Customer Registration</a>
            <a class="collapse-item" href="{{url('admin/customers')}}">Registered Customers</a>
            <a class="collapse-item" href="{{url('admin/add/section/customer')}}">Add Service For Customers</a>
            <a class="collapse-item" href="{{url('admin/customers/checkinlist')}}">CheckIn List</a>
            <a class="collapse-item" href="{{url('admin/customers/checkoutlist')}}">CheckOut List</a>
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
            <a class="collapse-item" href="{{url('admin/room_type')}}">Add Room Types</a>
            <!-- a class="collapse-item" href="{{url('admin/facility')}}">Room Facilities</a> -->
            <a class="collapse-item" href="{{url('admin/rooms')}}">Add Rooms</a>
            <a class="collapse-item" href="{{url('admin/reserve')}}">Reserved Rooms</a>
            <a class="collapse-item" href="{{url('admin/available')}}">Available Rooms</a>
          </div>
        </div>
       <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
          <i class="fas fa-fw fa-cog"></i>
          <span>Meals & Offers</span>
        </a>
        <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Meals & Offers:</h6>
            <a class="collapse-item" href="{{url('admin/category')}}">All Category</a>
            <a class="collapse-item" href="{{url('admin/offer')}}">Add Offers</a>
          </div>
        </div>
      </li>
     <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse4" aria-expanded="true" aria-controls="collapse4">
          <i class="fas fa-fw fa-cog"></i>
          <span>View Orders</span>
        </a>
        <div id="collapse4" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">View Orders:</h6>
            <a class="collapse-item" href="{{url('admin/pendingOrder')}}">Pending Orders</a>
            <a class="collapse-item" href="{{url('admin/completeOrder')}}">Complete Orders</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse5" aria-expanded="true" aria-controls="collapse5">
          <i class="fas fa-fw fa-cog"></i>
          <span>Services</span>
        </a>
        <div id="collapse5" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Section:</h6>
            <a class="collapse-item" href="{{url('admin/add/section')}}">Add Services</a>
            <a class="collapse-item" href="{{url('admin/view/section')}}">Manage Services</a>
          </div>
        </div>
      </li>
       <li class="nav-item active">
        <a class="nav-link" href="{{url('admin/report')}}">
          <i class="fas fa-briefcase"></i>
          <span>Generate Report</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{url('admin/messages')}}">
          <i class="fas fa-copy"></i>
          <span>Messages</span></a>
      </li>
       <li class="nav-item active">
        <a class="nav-link" href="{{url('events')}}" target="_blank">
          <i class="fas fa-globe"></i>
          <span>Events</span></a>
      </li>
       <li class="nav-item active">
        <a class="nav-link" href="{{url('admin/payment')}}">
          <i class="fas fa-briefcase"></i>
          <span>Payments</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{url('website/site')}}" target="_blank">
          <i class="fas fa-globe"></i>
          <span>Official Site</span></a>
      </li>
      <hr class="sidebar-divider d-none d-md-block">
      <div class="text-center d-none d-md-inline"> 
      </div>
    </ul>
   