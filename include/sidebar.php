
<aside class="main-sidebar elevation-4 sidebar-light-info">
  
  <a href="index.php" class="brand-link text-black navbar-light">
    <img src="dist/img/sie.png" alt="SILAYAR Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light"><b>SILAYAR</b></span>
  </a>
  <div class="sidebar os-host os-host-resize-disabled os-host-transition os-theme-dark os-host-overflow os-host-overflow-y os-host-scrollbar-horizontal-hidden">
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column nav-collapse-hide-child nav-legacy text-sm" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
        <hr>
        <li class="nav-item">
          <a href="index.php?page=home" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <?php
        if ($level == 'admin') {
        ?>

          <li class="nav-item menu-is-opening menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Menu Data Utama
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: block;">
              <li class="nav-item">
                <a href="index.php?page=tingkat" class="nav-link">
                  &nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-school nav-icon"></i>
                  <p>Data Tingkatan Sekolah</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview" style="display: block;">
              <li class="nav-item">
                <a href="index.php?page=kelas" class="nav-link">
                  &nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-house-user nav-icon"></i>
                  <p>Data Kelas</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview" style="display: block;">
              <li class="nav-item">
                <a href="index.php?page=rombel" class="nav-link">
                  &nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-users-viewfinder nav-icon"></i>
                  <p>Data Rombel</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item menu-is-opening menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-money-bill-transfer"></i>
              <p>
                Master Data
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: block;">
              <li class="nav-item">
                <a class="nav-link" href="index.php?page=siswa">
                  &nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-user-graduate nav-icon"></i>
                  <p>Data Siswa</p>
                </a>
              </li>
              <li class="nav-item menu-is-opening menu-open">
                <a href="#" class="nav-link">
                  &nbsp;&nbsp;&nbsp;&nbsp;<i class="nav-icon fas fa-list"></i>
                  <p>
                    Kategori Pembayaran
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview" style="display: block;">
                  <li class="nav-item">
                    <a href="index.php?page=ktgr-baju" class="nav-link">
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-tshirt nav-icon"></i>
                      <p>Baju Seragam</p>
                    </a>
                  </li>
                </ul>
                <ul class="nav nav-treeview" style="display: block;">
                  <li class="nav-item">
                    <a href="index.php?page=ktgr-antar" class="nav-link">
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-bus-simple nav-icon"></i>
                      <p>Antar Jemput </p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item menu-is-opening menu-open">
                <a href="#" class="nav-link">
                &nbsp;&nbsp;&nbsp;&nbsp;<i class="nav-icon far fa-file-invoice-dollar"></i>
                  <p>
                    Input Pembayaran
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview" style="display: block;">
                  <li class="nav-item">
                    <a href="index.php?page=bayar-baju" class="nav-link">
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-tshirt nav-icon"></i>
                      <p>Seragam</p>
                    </a>
                  </li>
                </ul>
                <ul class="nav nav-treeview" style="display: block;">
                  <li class="nav-item">
                    <a href="index.php?page=bayar-antar" class="nav-link">
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-bus-simple nav-icon"></i>
                      <p>Antar Jemput</p>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>

          </li>
          <hr>
        <?php  } else {
        } ?>
        <li class="nav-item">
          <a href="index.php?page=laporan-baju" class="nav-link">
            <i class="fas fa-file-invoice nav-icon"></i>
            <p>Laporan Seragam</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="index.php?page=laporan-antar" class="nav-link">
            <i class="fas fa-file-invoice nav-icon"></i>
            <p>Laporan Antar</p>
          </a>
        </li>
        <hr>
        <li class="nav-item">
          <a href="index.php?page=pengaturan" class="nav-link">
            <i class=" nav-icon fa fa-cog fa-spin fa-3x fa-fw"></i>
            <p>
              Pengaturan
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
</aside>