    <!-- Brand Logo -->
    <p href="index3.html" class="brand-link">
      <img src="{{ url("AdminLTE-3.1.0/dist/img/AdminLTELogo.png") }}" alt="AdminLTE Logo" class="brand-image img-circle" style="opacity: .8">
      <span class="brand-text font-weight-light">MAK-JANG</span>
    </p>

    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item menu-open">
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                    <!--a href="./index.html" class="nav-link active"-->
                    <a href="{{url('home')}}" class="nav-link">
                        <i class="nav-icon fas fa-home mr-2"></i><p>&ensp;Dashboard</p>
                    </a>
                    </li>
                </ul>
            </li>
        @if (Auth::user()->role == "admin")

          <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('admin_siswa')}}" class="nav-link">
                    <i class="nav-icon fas fa-user mr-2"></i><p>&ensp;Siswa</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('admin_guru')}}" class="nav-link">
                    <i class="nav-icon fas fa-user-tie mr-2"></i><p>&ensp;Guru</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('admin_kelas')}}" class="nav-link">
                    <i class="nav-icon fas fa-house-user mr-2"></i><p>&ensp;Kelas</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('admin_perusahaan')}}" class="nav-link">
                    <i class="nav-icon fas fa-building mr-2"></i><p>&ensp;Perusahaan</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('admin_kelompok')}}" class="nav-link">
                    <i class="nav-icon fas fa-building mr-2"></i><p>&ensp;Kelompok</p>
                </a>
              </li>
            </ul>
          </li>

        @elseif (Auth::user()->role == "siswa")
        <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
                <li class="nav-item">
                <!--a href="./index.html" class="nav-link active"-->
                <a href="{{url('home')}}" class="nav-link">
                    <i class="nav-icon fas fa-home mr-2"></i><p>&ensp;Dashboard</p>
                </a>
                </li>
            </ul>
        </li>
        <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
                <li class="nav-item">
                <!--a href="./index.html" class="nav-link active"-->
                <a href="{{url('siswa_perusahaan')}}" class="nav-link">
                    <i class="nav-icon fas fa-building mr-2"></i><p>&ensp;Perusahaan</p>
                </a>
                </li>
            </ul>
        </li>
        @endif
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
