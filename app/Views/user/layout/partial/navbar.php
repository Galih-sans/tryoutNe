<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-white" id="sidenav-main">
  <div class="sidenav-header">
    <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
    <a class="navbar-brand m-0" href="" target="_blank">
      <img src="<?= base_url('assets/favicon/logo-ne.ico') ?>" class="navbar-brand-img h-100" alt="">
      <span class="ms-1 font-weight-bold">Neo Edukasystem</span>
    </a>
  </div>
  <hr class="horizontal dark mt-0">
  <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link text-dark" href="<?= route_to('user.dashboard') ?>">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <div role="separator" class="dropdown-divider m-0"></div>
        <a class="nav-link text-dark" href="<?= route_to('user.test.index') ?>">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-chart-bar-32 text-danger text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Daftar Test</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-dark" href="<?= route_to('user.performance.index') ?>">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-trophy text-warning text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Riwayat Test</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-dark" href="<?= route_to('user.transaksi.index') ?>">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-credit-card text-info text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Pembelian</span>
        </a>
      </li>
    </ul>
  </div>
</aside>