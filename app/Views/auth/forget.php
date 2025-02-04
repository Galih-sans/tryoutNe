<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href=" ">
    <link rel="icon" type="image/png" href="<?= base_url('assets/favicon/logo-ne.ico')?>"">
  <title>
   <?= $pagedata['tittle'] ?>
  </title>
  <!--     Fonts and icons     -->
  <link href=" https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="<?= base_url('assets-front/css/nucleo-icons.css')?>" rel="stylesheet" />
    <link href="<?= base_url('assets-front/css/nucleo-svg.css')?>" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="<?= base_url('assets-front/css/nucleo-svg.css')?>" rel=" stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="<?= base_url('assets-front/css/auth.css?v=2.0.4')?>" rel="stylesheet" />
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
                                    <h4 class="font-weight-bolder">Lupa Kata Sandi</h4>
                                    <p class="mb-0">Silahkan Masukkan Alamat Email Anda untuk mendapatkan email tautan untuk mengatur ulang kata sandi. </p>
                                </div>
                                <div class="card-body">

                                    <?php
                                        if(session()->has('email_verification')){
                                        echo session()->getFlashdata('email_verification');
                                        }
                                        ?>
                                    <form role="form" class="" action="<?= base_url('/forgetpassword') ?>" method="post">
                                        <div class="mb-3">
                                            <input type="email" class="form-control form-control-lg" placeholder="Email"
                                                name="email" aria-label="Email">
                                        </div>
                                        <div class="text-center">
                                            <button type="submit"
                                                class="btn btn-lg bg-gradient-success btn-lg w-100 mt-4 mb-0">Kirim Email</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                    <p class="mb-4 text-sm mx-auto">
                                        <a href="<?=route_to('login')?>"
                                            class="text-primary text-gradient font-weight-bold">Kembali Ke Halaman Login</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div
                            class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
                            <div
                                class="position-relative bg-gradient-success h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden">
                                <span class="mask bg-gradient-succes opacity-6"></span>
                                <h4 class="mt-5 text-white font-weight-bolder position-relative">"Find Your Challange
                                    whit us."</h4>
                                <p class="text-white position-relative">The more effortless the writing looks, the more
                                    effort the writer actually put into the process.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!--   Core JS Files   -->
    <script src="<?= base_url('assets-front/js/core/popper.min.js')?>"></script>
    <script src="<?= base_url('assets-front/js/core/bootstrap.min.js')?>"></script>
    <script src="<?= base_url('assets-front/js/plugins/perfect-scrollbar.min.js')?>"></script>
    <script src="<?= base_url('assets-front/js/plugins/smooth-scrollbar.min.js')?>"></script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
</body>

</html>