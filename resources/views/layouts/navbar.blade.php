<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="#" class="nav-link">{{$judul}}</a>
    </li>
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <li class="nav-item">
      <a class="nav-link" data-widget="fullscreen" href="#" type="button">
        <i class="fas fa-expand-arrows-alt"></i>
      </a>
    </li>
    <!-- Notifications Dropdown Menu -->
    <li class="nav-item">
      <a class="nav-link" data-toggle="dropdown" href="#"3>
        <i class="fas fa-user"></i>
      </a>
      <div class="dropdown-menu  dropdown-menu-right" >
        {{-- <a href="{{url('#')}}" class="dropdown-item">
          <i class="fas fa-pen mr-2"></i>&ensp;Edit Profile
        </a> --}}
        <a href="{{url('logout')}}" class="dropdown-item">
            <i class="fas fa-arrow-left mr-2"></i>&ensp;Log Out
          </a>
      </div>
    </li>
  </ul>
</nav>
  <!-- /.navbar -->
