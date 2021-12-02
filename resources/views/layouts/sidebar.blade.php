    <!-- Brand Logo -->
    <p href="index3.html" class="brand-link">
      <img src="AdminLTE-3.1.0/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle" style="opacity: .8">
      <span class="brand-text font-weight-light">MAK-JANG</span>
    </p>

    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        {{-- @if (Auth::user()->role == "admin") --}}


          <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <!--a href="./index.html" class="nav-link active"-->
                <a href="{{url('home')}}" class="nav-link">
                  <i class="fas fa-home"></i>
                  <p>Dashboard</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('siswa')}}" class="nav-link">
                  <i class="fas fa-user-edit"></i>
                  <p>Siswa</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('guru')}}" class="nav-link">
                  <i class="fas fa-user-edit"></i>
                  <p>Guru</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('kelas')}}" class="nav-link">
                  <i class="fas fa-user-edit"></i>
                  <p>Kelas</p>
                </a>
              </li>
            </ul>
          </li>
        {{-- @endif --}}
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
