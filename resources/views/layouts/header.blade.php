<nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
  <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
    <div class="text-center d-none d-md-inline"><button class="btn" id="sidebarToggle" type="button"><i class="fa fa-exchange"></i></button></div>
    <form class="form-inline d-none d-sm-inline-block mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
      <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ...">
        <div class="input-group-append"><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
      </div>
    </form>
    <ul class="nav navbar-nav flex-nowrap ml-auto">
      <style>
      @media only screen and (max-width: 992px) {
        .mobileHide{ display: none;;}
      }
      </style>
      <div class="d-none d-sm-block topbar-divider "></div>
      <li class="nav-item pulse animated dropdown no-arrow" role="presentation" style="padding-top: 5px;">
        <div class="row mobileHide">
          <div class="col" style="padding-right: 1px;padding-left: 1px;padding-bottom: 0px;">
            <a href="#" onclick="event.preventDefault();" id="link-goblue"><i class="fa fa-circle" data-bs-hover-animate="pulse" style="color: #4285f4;margin: 2px;"></i>
            </a>
          </div>
          <div class="col" style="padding-right: 1px;padding-left: 1px;padding-bottom: 0px;"><a href="#" onclick="event.preventDefault();" id="link-gored"><i class="fa fa-circle" data-bs-hover-animate="pulse" style="color: #db4437;margin: 2px;"></i></a></div>
          <div class="col" style="padding-right: 1px;padding-left: 1px;padding-bottom: 0px;"><a href="#" onclick="event.preventDefault();" id="link-goyellow"><i class="fa fa-circle" data-bs-hover-animate="pulse" style="color: #f4b400;margin: 2px;"></i></a></div>
          <div class="col" style="padding-right: 1px;padding-left: 1px;padding-bottom: 0px;"><a href="#" onclick="event.preventDefault();" id="link-gogreen"><i class="fa fa-circle" data-bs-hover-animate="pulse" style="color: #0f9d58;margin: 2px;"></i></a></div>
        </div>
      </li>
    </ul>
    <ul class="nav navbar-nav">
      <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><i class="fas fa-search" style="margin-left: 2px;"></i></a>
        <div class="dropdown-menu dropdown-menu-right p-3 animated--grow-in" role="menu"
        aria-labelledby="searchDropdown">
        <form class="form-inline mr-auto navbar-search w-100">
          <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ...">
            <div class="input-group-append"><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
          </div>
        </form>
      </div>
    </li>
    <div class="d-none d-sm-block topbar-divider"></div>
    <li class="nav-item dropdown no-arrow" role="presentation">
      <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><span class="d-none d-lg-inline mr-2 text-gray-600 small">{{ strtoupper(Auth::user()->username) }}</span><img class="border rounded-circle img-profile" src="{{asset(Storage::disk('local')->url(Auth::user()->image))}}"></a>
        <div
        class="dropdown-menu shadow dropdown-menu-right animated--grow-in" role="menu"><a class="dropdown-item" role="presentation" href="#"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Profile</a><a class="dropdown-item" role="presentation" href="#"><i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Settings</a>
        <a
        class="dropdown-item" role="presentation" href="#"><i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Activity log</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" role="presentation" href="{{ route('logout') }}"
        onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2" style="color:#db4437"></i>&nbsp;Logout
      </a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
      </form>
      {{-- <a class="dropdown-item" role="presentation" href="{{ route('logout') }}"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Logout</a> --}}
    </div>
  </div>
</li>
</ul>
</div>
</nav>
@section('header')

@show
