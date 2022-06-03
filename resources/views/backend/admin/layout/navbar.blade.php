
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link" href="{{url('admin/messages')}}" >
                <i class="fas fa-envelope fa-fw"></i>
                <!-- Counter - Messages -->
                <span class="badge badge-danger badge-counter">{{DB::table('messages')->where('msg_status','=',0)->where('user_id',Auth::user()->id)->count()}}</span>
              </a>
            </li>
            <div class="topbar-divider d-none d-sm-block"></div>
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->fname }} {{ Auth::user()->lname }}</span>
                <img class="img-profile rounded-circle" src="{{asset('Upload/UserImages/'.Auth::user()->userimg)}}">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                   <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <a class="dropdown-item" href="{{url('change-password')}}"> Change Password
                                    </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                    </form>
              </div>
            </li>
          </ul>
      </nav>
        