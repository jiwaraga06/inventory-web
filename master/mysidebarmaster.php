<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../index.php">
    <div class="sidebar-brand-icon">
      <!-- <img src="img/logo/LOGOPT3.png"> -->
    </div>
    <div class="sidebar-brand-text mx-3" style="font-size: 14px;">PT GUDANG PARCEL</div>
  </a>
  <hr class="sidebar-divider my-0">
  <li class="nav-item active">
    <a class="nav-link" href="../index.php">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>
  <hr class="sidebar-divider">
  <div class="sidebar-heading"> Features </div>
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap"
      aria-expanded="true" aria-controls="collapseBootstrap">
      <i class="far fa-fw fa-window-maximize"></i>
      <span>Master Data</span>
    </a>
    <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Master Data</h6>
        <a class="collapse-item" href="./kategori.php">Kategori Barang</a>
        <a class="collapse-item" href="./status.php">Status Barang</a>
        <a class="collapse-item" href="./satuan.php">Satuan Barang</a>
        <a class="collapse-item" href="./user.php">User</a>
      </div>
    </div>
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseForm" aria-expanded="true"
      aria-controls="collapseForm">
      <i class="fab fa-fw fa-archive"></i>
      <span>Inventory</span>
    </a>
    <div id="collapseForm" class="collapse" aria-labelledby="headingForm" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Inventory</h6>
        <a class="collapse-item" href="../inventory/databarang.php">Data Barang</a>
        <a class="collapse-item" href="../inventory/barangmasuk.php">Data Barang Masuk</a>
        <a class="collapse-item" href="../inventory/barangkeluar.php">Data Barang Keluar</a>

      </div>
    </div>
  </li>

  <hr class="sidebar-divider">
  <div class="version" id="version-ruangadmin"></div>
</ul>