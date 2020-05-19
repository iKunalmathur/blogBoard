<nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion p-0 " style="background-color: #4285f4;">
  <div class="container-fluid d-flex flex-column p-0">
    <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="{!! route('home') !!}">
      <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-code"></i></div>
      <div class="sidebar-brand-text mx-3"><span><strong>blogBoard</strong></span></div>
    </a>
    <hr class="sidebar-divider my-0">
    <ul class="nav navbar-nav text-light" id="accordionSidebar">
      <li class="nav-item" role="presentation"><a class="nav-link" ><img src="{{asset('assets/img/avatars/avatar4.jpeg')}}"><span style="margin: 5px;">&nbsp;ADMINIA</span><p style="padding: 5px;padding-left: 0px;">Member Since Mar 31, 2020 Admin, writer, publisher<br></p></a></li>
      <hr class="sidebar-divider">
      <li class="nav-item" role="presentation"><a class="nav-link @yield('dashboardActive')" href="{!! route('home') !!}"><i class="fas fa-tachometer-alt"></i><span>&nbsp;Dashboard</span></a></li>
      <hr class="sidebar-divider">
      <li class="nav-item" role="presentation">
        <div><a class="btn btn-link nav-link @yield('userActive')" data-toggle="collapse" aria-expanded="false" aria-controls="collapse-1" href="#collapse-1" role="button"><i class="fas fa-user"></i>&nbsp;<span>User</span></a>
          <div class="collapse" id="collapse-1">
            <div class="bg-white border rounded py-2 collapse-inner">
              <h6 class="collapse-header">USER COMPONENTS:</h6>
              <a class="collapse-item" href="{!! route('user.index') !!}">Users</a>
              <a class="collapse-item" href="{!! route('role.index') !!}">Roles</a>
              <a class="collapse-item" href="{!! route('permission.index') !!}">Permissions</a></div>
            </div>
          </div>
        </li>
        <hr class="sidebar-divider">
        <li class="nav-item" role="presentation"><a class="nav-link @yield('postActive')" href="{!! route('post.index') !!}"><i class="fas fa-sticky-note"></i><span>&nbsp;Posts</span></a></li>
        <hr class="sidebar-divider">
        <li class="nav-item" role="presentation"><a class="nav-link @yield('categoryActive')" href="{!! route('category.index') !!}"><i class="fas fa-puzzle-piece"></i><span>&nbsp;Categories</span></a></li>
        <hr class="sidebar-divider">
        <li class="nav-item" role="presentation"><a class="nav-link @yield('tagActive')" href="{!! route('tag.index') !!}"><i class="fas fa-tags"></i><span>&nbsp;Tags</span></a></li>
        <hr class="sidebar-divider">
      </ul>
    </div>
  </nav>
  @section('sidebar')

  @show
