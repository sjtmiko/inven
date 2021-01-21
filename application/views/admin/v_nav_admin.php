<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('index.php/admin/index') ?>">
        
        <div class="sidebar-brand-text mx-3">Dashboard Admin</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('stk_barang') ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Inventaris</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('out_barang') ?>">
          <i class="fa fa-youtube-play"></i>
          <span>Mutasi Barang</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">
      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->