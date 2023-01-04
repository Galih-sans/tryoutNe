<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 border-radius-xl position-sticky mt-4 top-1 z-index-sticky bg-neo left-auto" data-scroll="true">
  <div class="container-fluid py-1 px-3">
    <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
      <div class="ms-md-auto pe-md-3 d-flex align-items-start text-light">
        <div class="nav-item d-xl-none ps-3 d-block align-items-start">
          <a href="javascript:;" class="nav-link text-light text-left p-0" id="iconNavbarSidenav">
            <div class="sidenav-toggler-inner ">
              <i class="sidenav-toggler-line text-light"></i>
              <i class="sidenav-toggler-line text-light"></i>
              <i class="sidenav-toggler-line text-light"></i>
            </div>
          </a>
        </div>
      </div>
      <ul class="navbar-nav  justify-content-end">
        <li class="nav-item dropdown pe-2 px-2 d-flex align-items-center">
          <a href="javascript:;" class="nav-link text-light font-weight-bold px-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
            <span class="d-none px-2 d-sm-inline-block ms-2">Neo Diamond</span>
            <i class="fa-regular fa-gem"></i>
          </a>
          <ul class="dropdown-menu  dropdown-menu-end  px-2 py-2 me-sm-n4" aria-labelledby="dropdownMenuButton">
            <li class="mb-2">
              <div class="py-3 text-center bg-body-light border-bottom rounded-top">
                <span class="mt-2 mb-0">Neo Diamond Jumlah</span>
              </div>
            </li>
            <li class="mb-2">
              <div role="separator" class="dropdown-divider m-0"></div>
              <div class="p-2">
                <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">
                  <span class="fs-sm fw-medium">Topup</span>
                </a>
              </div>
            </li>
          </ul>
        </li>
        <li class="nav-item dropdown pe-2 px-2 d-flex align-items-center">
          <a href="javascript:;" class="nav-link text-light font-weight-bold px-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
            <span class="d-none px-2 d-sm-inline-block ms-2"><?= ucwords($userData->full_name); ?></span>
            <i class="fa fa-user cursor-pointer"></i>
          </a>
          <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
            <li class="mb-2">
              <div class="py-3 text-center bg-body-light border-bottom rounded-top">
                <img class="avatar avatar-sm" src="<?= base_url('assets-front/img/avatar.png') ?>" alt="">
                <p class="mt-2 mb-0 fw-medium"><?= $userData->full_name ?></p>
              </div>
            </li>
            <li class="mb-2">
              <div role="separator" class="dropdown-divider m-0"></div>
              <div class="p-2">
                <a class="dropdown-item d-flex align-items-center justify-content-between" href="<?= route_to('user.profil.index') ?>">
                  <span class="fs-sm fw-medium">Profil</span>
                </a>
              </div>
            </li>
            <li>
              <div role="separator" class="dropdown-divider m-0"></div>
              <div class="p-2">
                <a class="dropdown-item d-flex align-items-center justify-content-between" href="<?= base_url('logout') ?>">
                  <span class="fs-sm fw-medium">Keluar</span>
                </a>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>