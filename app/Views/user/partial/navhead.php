<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="">
  <link rel="icon" type="image/png" href="<?= base_url('assets/favicon/logo-ne.ico') ?>">
  <title>
    Neoedukasi
  </title>
  <!--     Fonts and icons     -->
  <link href="<?= base_url('https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700') ?>" rel="stylesheet" />
  <!-- Icons -->
  <link href="<?=  base_url('assets-user/css/nucleo-icons.css')?>" rel="stylesheet" />
  <link href="<?= base_url('assets-user/css/nucleo-svg.css') ?>" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="'https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="<?= base_url('assets/images/logo/logo1.png') ?>" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="<?= base_url('assets-user/css/dashboard.css?v=2.0.4') ?>" rel="stylesheet" />
</head>
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            
          </ol>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            
          </div>
          <ul class="navbar-nav  justify-content-end">
          <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line bg-white"></i>
                  <i class="sidenav-toggler-line bg-white"></i>
                  <i class="sidenav-toggler-line bg-white"></i>
                </div>
              </a>
            </li>
            <li class="nav-item d-flex align-items-center">
          <div class="dropdown ">
                <span type="button" id="page-header-user-dropdown" data-bs-toggle="dropdown" class="d-sm-inline-block ms-2 text-white font-weight-light">Neodiamon <a class="text-white font-weight-bold">+125</a> </span>
                <i class="fa fa-fw fa-angle-down text-white d-sm-inline-block opacity-50 ms-1 mt-1"></i>
              <div class="dropdown-menu dropdown-menu-md dropdown-menu-end p-0 border-0" aria-labelledby="page-header-user-dropdown">                
                <div class="p-2">                  
                  <a class="dropdown-item d-flex align-items-center justify-content-between" href="javascript:void(0)">
                    <span class="fs-sm fw-medium">Beli</span>
                  </a>
                </div>
                <div role="separator" class="dropdown-divider m-0"></div>
                <div class="p-2">                  
                  <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">
                    <span class="fs-sm fw-medium">Top Up</span>
                  </a>
                </div>
              </div>
            </div>
          </li>
            <li class="nav-item d-flex align-items-center">
            <div class="dropdown ">
                <span type="button" id="page-header-user-dropdown" data-bs-toggle="dropdown" class="d-sm-inline-block ms-2 text-white font-weight-light">John</span>
                <i class="fa fa-fw fa-angle-down text-white d-sm-inline-block opacity-50 ms-1 mt-1"></i>
              <div class="dropdown-menu dropdown-menu-md dropdown-menu-end p-0 border-0" aria-labelledby="page-header-user-dropdown">
                <div class="p-3 text-center">                  
                  <p class="mt-2 mb-0 fw-medium">John Smith</p>                  
                </div>
                <div class="p-2">                  
                  <a class="dropdown-item d-flex align-items-center justify-content-between" href="<?= route_to('user.profil.index')?>">
                    <span class="fs-sm fw-medium">Settings</span>
                  </a>
                </div>
                <div role="separator" class="dropdown-divider m-0"></div>
                <div class="p-2">                  
                  <a class="dropdown-item d-flex align-items-center justify-content-between" href="<?= route_to('logout')?>">
                    <span class="fs-sm fw-medium">Log Out</span>
                  </a>
                </div>
                <div role="separator" class="dropdown-divider m-0"></div>
                <div class="p-2">                  
                  <a class="dropdown-item d-flex align-items-center justify-content-between" href="<?= route_to('reset')?>">
                    <span class="fs-sm fw-medium">Ubah Password</span>
                  </a>
                </div>
              </div>
            </div>
            </li>            
          </ul>            
        </div>
      </div>
    </nav>