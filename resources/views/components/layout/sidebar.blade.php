<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ url('public/admin') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Siakad</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->




      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

       <x-layout.sidebar.menu-item label="Dashboard" icon="fas fa-home" url="admin/" />
       <x-layout.sidebar.menu-item label="Kepala Sekolah" icon="fas fa-user-tie" url="admin/kepala-sekolah" />
       <x-layout.sidebar.menu-item label="Guru" icon="fas fa-user" url="admin/guru" />
       <x-layout.sidebar.menu-item label="Siswa" icon="fas fa-users" url="admin/siswa" />
       <x-layout.sidebar.menu-item label="Mata Pelajaran" icon="fas fa-book" url="admin/mapel" />
       <x-layout.sidebar.menu-item label="Kelas " icon="fas fa-chalkboard-teacher" url="admin/kelas" />
       <x-layout.sidebar.menu-item label="Semester " icon="fas fa-chalkboard-teacher" url="admin/semester" />
       <x-layout.sidebar.menu-item label="Nilai " icon="fas fa-pager" url="admin/nilai" />
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->

  </aside>
