<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" id="css-main" href="<?= base_url('css/bootstrap.css') ?>">
    <link rel="stylesheet" id="css-main" href="<?= base_url('css/bootstrap.min.css') ?>">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="icon" type="image/x-icon" href="<?= base_url('assets/favicon/logo-ne.ico') ?>">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    <?= $this->renderSection('header') ?>
    <link rel="stylesheet" id="css-main" href="<?= base_url('css/admin_main.css') ?>">
    <link rel="stylesheet" id="css-main" href="<?= base_url('css/themes/modern.css') ?>">
    <script src="<?= base_url('js/bootstrap.bundle.js')?>"></script>
</head>

<body>
    <div id="page-container"
        class="sidebar-o sidebar-light enable-page-overlay side-scroll page-header-fixed main-content-narrow">
        <?= $this->include('admin/layout/partial/left_sidebar') ?>
        <?= $this->include('admin/layout/partial/header') ?>
        <main id="main-container">
            <?= $this->renderSection('content') ?>
        </main>
        <?= $this->include('admin/layout/partial/footer') ?>
    </div>
    <script src="https://kit.fontawesome.com/b2509b26f8.js" crossorigin="anonymous"></script>
</body>

</html>