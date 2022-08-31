<!DOCTYPE html>
<html lang="en">

<head>
  <!--     Fonts and icons     -->
  <link href="<?= base_url('https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700') ?>" rel="stylesheet" />
  <!-- Icons -->
  <link href="<?=  base_url('assets-user/css/nucleo-icons.css')?>" rel="stylesheet" />
  <link href="<?= base_url('assets-user/css/nucleo-svg.css') ?>" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="'https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="<?= base_url('assets/images/logo/logo1.png') ?>" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="<?= base_url('assets-user/css/test-style.min.css') ?>" rel="stylesheet" />
</head>

<body class="g-sidenav-show   bg-gray-100">
  <div class="min-height-100 bg-primary position-absolute w-100"></div>

  <?= $this->include('user/partial/navbar') ?>
 
  <main class="main-content position-relative border-radius-lg ">
    <!-- Navhead -->
    <?= $this->include('user/partial/navhead') ?>
    <!-- End Navhead -->

    <!-- content -->
    
     
        <div class="content content-boxed">
          <div class="row items-push py-4">
          <div class="content content-boxed">
    <div class="row">
      <div class="col-xl-8">
        <!-- Lessons -->
        <div class="block block-rounded">
          <div class="block-content fs-sm">
            <!-- Introduction -->
            <table class="table table-borderless table-vcenter">
              <tbody>
                <tr class="table-active">
                  <th style="width: 50px;"></th>
                  <th>1. Bahasa</th>
                  <th class="text-end">
                    <span class="text-muted">0.2 hours</span>
                  </th>
                </tr>
                <tr>
                  <td class="table-success text-center">
                    <i class="fa fa-fw fa-unlock text-success"></i>
                  </td>
                  <td>
                    <a class="fw-medium" href="be_pages_elearning_lesson.html">1.1 Analogi Dasar</a>
                  </td>
                  <td class="text-end text-muted">
                    12 min
                  </td>
                </tr>
              </tbody>
            </table>
            <!-- END Introduction -->

            <!-- Basics -->
            <table class="table table-borderless table-vcenter">
              <tbody>
                <tr class="table-active">
                  <th style="width: 50px;"></th>
                  <th>2. Sosiografi</th>
                  <th class="text-end">
                    <span class="text-muted">1.3 hours</span>
                  </th>
                </tr>
                <tr>
                  <td class="table-danger text-center">
                    <i class="fa fa-fw fa-lock text-danger"></i>
                  </td>
                  <td>
                    <a class="fw-medium" href="javascript:void(0)">2.1 Sosial Structure</a>
                  </td>
                  <td class="text-end text-muted">
                    15 min
                  </td>
                </tr>
                <tr>
                  <td class="table-danger text-center">
                    <i class="fa fa-fw fa-lock text-danger"></i>
                  </td>
                  <td>
                    <a class="fw-medium" href="javascript:void(0)">2.1 Basik Geosoial</a>
                  </td>
                  <td class="text-end text-muted">
                    25 min
                  </td>
                </tr>
                <tr>
                  <td class="table-danger text-center">
                    <i class="fa fa-fw fa-lock text-danger"></i>
                  </td>
                  <td>
                    <a class="fw-medium" href="javascript:void(0)">2.2 Economic of Bottom</a>
                  </td>
                  <td class="text-end text-muted">
                    20 min
                  </td>
                </tr>               
              </tbody>
            </table>
            <!-- END Basics -->

            <!-- Advanced -->
            <table class="table table-borderless table-vcenter">
              <tbody>
                <tr class="table-active">
                  <th style="width: 50px;"></th>
                  <th>3. Saintek</th>
                  <th class="text-end">
                    <span class="text-muted">1.5 hours</span>
                  </th>
                </tr>
                <tr>
                  <td class="table-danger text-center">
                    <i class="fa fa-fw fa-lock text-danger"></i>
                  </td>
                  <td>
                    <a class="fw-medium" href="javascript:void(0)">3.1 Analisis Biotermal</a>
                  </td>
                  <td class="text-end text-muted">
                    30 min
                  </td>
                </tr>
                <tr>
                  <td class="table-danger text-center">
                    <i class="fa fa-fw fa-lock text-danger"></i>
                  </td>
                  <td>
                    <a class="fw-medium" href="javascript:void(0)">3.2 Probabilitas</a>
                  </td>
                  <td class="text-end text-muted">
                    20 min
                  </td>
                </tr>
                <tr>
                  <td class="table-danger text-center">
                    <i class="fa fa-fw fa-lock text-danger"></i>
                  </td>
                  <td>
                    <a class="fw-medium" href="javascript:void(0)">3.3 Fisika Kuantum</a>
                  </td>
                  <td class="text-end text-muted">
                    10 min
                  </td>
                </tr>
                <tr>
                  <td class="table-danger text-center">
                    <i class="fa fa-fw fa-lock text-danger"></i>
                  </td>
                  <td>
                    <a class="fw-medium" href="javascript:void(0)">3.4 fungiology</a>
                  </td>
                  <td class="text-end text-muted">
                    14 min
                  </td>
                </tr>
                <tr>
                  <td class="table-danger text-center">
                    <i class="fa fa-fw fa-lock text-danger"></i>
                  </td>
                  <td>
                    <a class="fw-medium" href="javascript:void(0)">3.5 Biokima</a>
                  </td>
                  <td class="text-end text-muted">
                    16 min
                  </td>
                </tr>
              </tbody>
            </table>
            <!-- END Advanced -->
          </div>
        </div>
        <!-- END Lessons -->
      </div>
      <div class="col-xl-4">
        <!-- Subscribe -->
        <div class="block block-rounded">
          <div class="block-content">
            <a class="btn btn-success w-100 mb-2" href="javascript:void(0)">Masuk Ruang Ujian</a>
            <p class="fs-sm text-center">
              or <a class="link-effect text-success fw-medium" href="javascript:void(0)">Miliki Ujian ini hanya dengan Rp. 280.000</a>
            </p>
          </div>
        </div>
        <!-- END Subscribe -->

        <!-- Course Info -->
        <div class="block block-rounded">
          <div class="block-header block-header-default text-center">
            <h3 class="block-title">Ringkasan Materi Ujian</h3>
          </div>
          <div class="block-content">
            <table class="table table-striped table-borderless fs-sm">
              <tbody>
                <tr>
                  <td>
                    <i class="fa fa-fw fa-book me-1"></i> 10 materi
                  </td>
                </tr>
                <tr>
                  <td>
                    <i class="fa fa-fw fa-clock me-1"></i> 180 menit
                  </td>
                </tr>
                <tr>
                  <td>
                    <i class="fa fa-fw fa-heart me-1"></i> 16850 peserta
                  </td>
                </tr>
                <tr>
                  <td>
                    <i class="fa fa-fw fa-calendar me-1"></i> 2 - 4 November 2021
                  </td>
                </tr>
                <tr>
                  <td>
                    <i class="fa fa-fw fa-tags me-1"></i>
                    <a class="fw-semibold link-fx text-success" href="javascript:void(0)">Bahasa</a>,
                    <a class="fw-semibold link-fx text-success" href="javascript:void(0)">Sosiografi</a>,
                    <a class="fw-semibold link-fx text-success" href="javascript:void(0)">Saintek</a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <!-- END Page Content -->
  </main>
  
  <!--   Core JS Files   -->
  <script src="<?= base_url('assets-user/js/core/popper.min.js')?>"></script>
  <script src="<?= base_url('assets-user/js/core/bootstrap.min.js')?>"></script>
  <script src="<?= base_url('assets-user/js/plugins/perfect-scrollbar.min.js')?>"></script>
  <script src="<?= base_url('assets-user/js/plugins/smooth-scrollbar.min.js')?>"></script>
  <script src="<?= base_url('assets-user/js/plugins/chartjs.min.js')?>"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?= base_url('assets-user/js/dashboard.min.js?v=2.0.4')?>"></script>
</body>

</html>