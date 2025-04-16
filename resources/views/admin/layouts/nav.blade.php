<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>
    <ul class="navbar-nav ml-auto">
        
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="btn btn-info btn-sm mt_20" href="{{ url('/') }}" target="_blank">
                {{ __('Visit Website') }}
            </a>
        </li>

        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600">{{ Auth::guard('admin')->user()->name }}</span>
                @if(Auth::guard('admin')->user()->photo == '')
                <img class="img-profile rounded-circle" src="{{ asset('uploads/default_photo.jpg') }}">
                @else
                <img class="img-profile rounded-circle" src="{{ asset('uploads/'.Auth::guard('admin')->user()->photo) }}">
                @endif
            </a>
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"  data-bs-popper="static" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{ route('admin_profile') }}">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i> {{ __('Edit Profile') }}
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('admin_logout') }}">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> {{ __('Logout') }}
                </a>
            </div>
        </li>
    </ul>
</nav>