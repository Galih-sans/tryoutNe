<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href=" ">
  <link rel="icon" type="image/png" href="">
  <title>
    Neoedukasi
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Icons -->
  <link href="<?= base_url ('assets/images/logo/logo1.png')?>" rel="stylesheet" />
  <link href="<?= base_url ('assets/images/logo/logo1.png')?>" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="<?= base_url ('assets/images/logo/logo1.png')?>" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="<?= base_url ('assets-user/css/dashboard.css?v=2.0.4')?>" rel="stylesheet" />
</head>

<body class="">
  
  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
              <div class="card card-plain">
                <div class="card-header pb-0 text-start">
                  <h4 class="font-weight-bolder">Mari lengkapi data pribadi</h4>
                  <p class="mb-0">ini penting loh buat kamu nentuin tujuan belajar kamu.</p>
                </div>
                <div class="card-body">
                  <form role="form">
                    <div class="mb-3">
                      <input type="Username" class="form-control form-control-lg" placeholder="Nama lengkap" aria-label="Username">
                    </div>                    
                    <div class="mb-3">
                        <input type="email" class="form-control form-control-lg" placeholder="Email" aria-label="Email">
                      </div>
                    <div class="mb-3">
                      <input type="Handphone" class="form-control form-control-lg" placeholder="Nomor Handphone" aria-label="Handphone">
                    </div>                    
                    <div class="text-center">
                        <a class="nav-link" href="<?=route_to('register2')?>">
                      <button type="button"  class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0"  href="<?=route_to('register2')?>">Lanjut</button>
                    </a>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
              <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden" style="">
                <span class="mask bg-gradient-primary opacity-6"></span>
                <h4 class="mt-5 text-white font-weight-bolder position-relative">"Find Your Challange whit us."</h4>
                <p class="text-white position-relative">The more effortless the writing looks, the more effort the writer actually put into the process.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <!--   Core JS Files   -->
  <script src="<?= base_url ('assets-user/js/core/popper.min.js')?>"></script>
  <script src="<?= base_url ('assets-user/js/core/bootstrap.min.js')?>"></script>
  <script src="<?= base_url ('assets-user/js/plugins/perfect-scrollbar.min.js')?>"></script>
  <script src="<?= base_url ('assets-user/js/plugins/smooth-scrollbar.min.js')?>"></script>
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
  <script src="<?= base_url ('assets-user/js/dashboard.min.js?v=2.0.4')?>"></script>
</body>

</html>