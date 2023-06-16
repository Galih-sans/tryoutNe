<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/x-icon" href="<?= base_url('assets/favicon/logo-ne.ico') ?>">
    <title>
        <?= $data['title'] ?>
    </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link href="<?= base_url('assets-front/css/nucleo-icons.css') ?>" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/b2509b26f8.js" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <link id="pagestyle" href="<?= base_url('css/admin_main.css') ?>" rel="stylesheet" />
    <!-- CSS Files -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="<?= base_url('js/main.js') ?>" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <link id="pagestyle" href="<?= base_url('assets-front/css/material-dashboard.css?v=3.0.4') ?>" rel="stylesheet" />
    <?= $this->renderSection('css') ?>
</head>

<body class="g-sidenav-show fixed-top bg-gray-200">
    <div class="min-height-60 bg-neo-dark position-absolute w-100 neodark-header"></div>
    <div id="page-container" class="sidebar-light enable-page-overlay side-scroll page-header-fixed main-content-narrow">
        <?= $this->include('user/layout/partial/navbar') ?>
        <main class="main-content max-height-vh-100 border-radius-lg ">
            <?= $this->include('user/layout/partial/navhead') ?>
            <!-- Navbar -->

            <!-- End Navbar -->
            <!-- Container -->
            <?= $this->renderSection('content') ?>
        </main>
        <?= $this->include('user/layout/partial/footer') ?>
    </div>
    <!--   Core JS Files   -->

    <script src="<?= base_url('assets-front/js/plugins/perfect-scrollbar.min.js') ?>"></script>
    <script src="<?= base_url('assets-front/js/plugins/smooth-scrollbar.min.js') ?>"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>

    <?= $this->renderSection('js') ?>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="<?= base_url('assets-front/js/material-dashboard.min.js?v=3.0.4') ?>"></script>
</body>

</html>