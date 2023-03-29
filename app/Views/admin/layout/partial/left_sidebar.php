<nav id="sidebar" aria-label="Main Navigation" class="smini-hidden shadow-sm">
    <!-- Side Header -->
    <div class="content-header bg-white">
        <!-- Logo -->
        <a class="font-w600 text-dual" href="">
            <span class="smini-hide">
                <img class="sidebar-logo" src="<?= base_url('assets/images/logo/logo.png') ?>" alt="logo">
            </span>
        </a>
        <div class="nav-toggle">
            <button type="button" class="btn btn-sm btn-dual mr-2 d-none d-lg-inline-block" data-toggle="layout" data-action="sidebar_close">
                <i class="fa fa-fw fa-ellipsis-v"></i>
            </button>
            <a class="d-lg-none btn-white btn btn-sm btn-alt-secondary ms-1" data-toggle="layout" data-action="sidebar_close" href="javascript:void(0)">
                <i class="fa fa-fw fa-times text-white"></i>
            </a>
        </div>
    </div>
    <!-- END Side Header -->

    <!-- Side Navigation -->
    <div class="content-side content-side-full">
        <ul class="nav-main">
            <li class="nav-main-item">
                <a class="nav-main-link <?= $pagedata['activeTab'] == "dashboard" ? 'active' : ''; ?> " href="<?= route_to('admin.dashboard') ?>">
                    <i class="nav-main-link-icon fa-brands fa-dashcube"></i>
                    <span class="nav-main-link-name">Dashboard</span>
                </a>
            </li>
            <li class="nav-main-heading">Menu</li>
            <li class="nav-main-item <?= $pagedata['activeTab'] == "class" || $pagedata['activeTab'] == "subject" || $pagedata['activeTab'] == "topic" ? 'open' : ''; ?>">
                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="true" href="#">
                    <i class="nav-main-link-icon fa-solid fa-book-open"></i>
                    <span class="nav-main-link-name">Kelas & Mata Pelajaran</span>
                </a>
                <ul <?= $data['role'][0]->ha_class == 1 ? '' : 'hidden'; ?> class="nav-main-submenu">
                    <li class="nav-main-item">
                        <a class="nav-main-link <?= $pagedata['activeTab'] == "class" ? 'color-ne' : ''; ?>" href="<?= route_to('admin.class.index') ?>">
                            <span class="nav-main-link-name">Daftar Kelas</span>
                        </a>
                    </li>
                </ul>
                <ul <?= $data['role'][0]->ha_subject == 1 ? '' : 'hidden'; ?> class="nav-main-submenu">
                    <li class="nav-main-item">
                        <a class="nav-main-link " href="<?= route_to('admin.subject.index') ?>">
                            <span class="nav-main-link-name">Mata Pelajaran</span>
                        </a>
                    </li>
                </ul>
                <ul <?= $data['role'][0]->ha_topic == 1 ? '' : 'hidden'; ?> class="nav-main-submenu">
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="<?= route_to('admin.topic.index') ?>">
                            <span class="nav-main-link-name">Topik Mata Pelajaran</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li <?= $data['role'][0]->ha_test == 1 ? '' : 'hidden'; ?> class="nav-main-item">
                <a class="nav-main-link <?= $pagedata['activeTab'] == "test" ? 'active' : ''; ?>" href="<?= route_to('admin.test.index') ?>">
                    <i class="nav-main-link-icon fa-solid fa-clipboard-list"></i>
                    <span class="nav-main-link-name">Daftar Test</span>
                </a>
            </li>

            <li <?= $data['role'][0]->ha_bank_soal == 1 ? '' : 'hidden'; ?> class=" nav-main-item ">
                <a class="nav-main-link <?= $pagedata['activeTab'] == "bank-soal" ? 'active' : ''; ?>" href="<?= route_to('admin.bank-soal.index') ?>">
                    <i class="nav-main-link-icon fa-solid fa-file-lines"></i>
                    <span class="nav-main-link-name">Bank Soal</span>
                </a>
            </li>
            <li <?= $data['role'][0]->ha_siswa == 1 ? '' : 'hidden'; ?> class="nav-main-item">
                <a class="nav-main-link <?= $pagedata['activeTab'] == "siswa" ? 'active' : ''; ?>" href="<?= route_to('admin.siswa.index') ?>">
                    <i class="nav-main-link-icon fa-solid fa-users"></i>
                    <span class="nav-main-link-name">Siswa</span>
                </a>
            </li>
            <li <?= $data['role'][0]->ha_hasil_test == 1 ? '' : 'hidden'; ?> class="nav-main-item">
                <a class="nav-main-link <?= $pagedata['activeTab'] == "hasil-test" ? 'active' : ''; ?>" href="<?= route_to('admin.hasil-test.index') ?>">
                    <i class="nav-main-link-icon fa-solid fa-file-lines"></i>
                    <span class="nav-main-link-name">Hasil Test</span>
                </a>
            </li>
            <li <?= $data['role'][0]->ha_kelola_admin == 1 ? '' : 'hidden'; ?> class="nav-main-item">
                <a class="nav-main-link <?= $pagedata['activeTab'] == "kelola-admin" ? 'active' : ''; ?>" href="<?= route_to('admin.kelola-admin.index') ?>">
                    <i class="nav-main-link-icon fa-solid fa-user-circle"></i>
                    <span class="nav-main-link-name">Kelola Admin</span>
                </a>
            </li>
            <li <?= $data['role'][0]->ha_kelola_role == 1 ? '' : 'hidden'; ?> class="nav-main-item">
                <a class="nav-main-link <?= $pagedata['activeTab'] == "kelola-role" ? 'active' : ''; ?>" href="<?= route_to('admin.kelola-role.index') ?>">
                    <i class="nav-main-link-icon fa-solid fa-universal-access"></i>
                    <span class="nav-main-link-name">Kelola Role</span>
                </a>
            </li>
        </ul>
    </div>
</nav>