<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" id="css-main" href="<?= base_url('css/bootstrap.css') ?>">
    <link rel="stylesheet" id="css-main" href="<?= base_url('css/bootstrap.min.css') ?>">
    <link rel="stylesheet" id="css-main" href="<?= base_url('css/admin_main.css') ?>">
    <link rel="icon" type="image/x-icon" href="<?= base_url('assets/favicon/logo-ne.ico') ?>">
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