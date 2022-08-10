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
            <button type="button" class="btn btn-sm btn-dual mr-2 d-none d-lg-inline-block" data-toggle="layout"
                data-action="sidebar_close">
                <i class="fa fa-fw fa-ellipsis-v"></i>
            </button>
            <a class="d-lg-none btn-white btn btn-sm btn-alt-secondary ms-1" data-toggle="layout"
                data-action="sidebar_close" href="javascript:void(0)">
                <i class="fa fa-fw fa-times text-white"></i>
            </a>
        </div>
    </div>
    <!-- END Side Header -->

    <!-- Side Navigation -->
    <div class="content-side content-side-full">
        <ul class="nav-main">
            <li class="nav-main-item">
                <a class="nav-main-link <?= $pagedata['activeTab'] =="dashboard"?'active':''; ?> " href="<?= route_to('admin.dashboard') ?>">
                    <i class="nav-main-link-icon fa-brands fa-dashcube"></i>
                    <span class="nav-main-link-name">Dashboard</span>
                </a>
            </li>
            <li class="nav-main-heading">Menu</li>
            <li class="nav-main-item"> 
                <a class="nav-main-link <?= $pagedata['activeTab'] =="tryout"?'active':''; ?>" href="<?= route_to('admin.tryout.index')?>">
                    <i class="nav-main-link-icon fa-solid fa-clipboard-list"></i>
                    <span class="nav-main-link-name">Try Out</span>
                </a>
            </li>

            <li
                class="nav-main-item ">
                <a class="nav-main-link <?= $pagedata['activeTab'] =="bank-soal"?'active':''; ?>" href="<?= route_to('admin.bank-soal.index')?>">
                <i class="nav-main-link-icon fa-solid fa-file-lines"></i>
                    <span class="nav-main-link-name">Bank Soal</span>
                </a>
            </li>
            <li
                class="nav-main-item">
                <a class="nav-main-link" href="#">
                <i class="nav-main-link-icon fa-solid fa-users"></i>
                    <span class="nav-main-link-name">Siswa</span>
                </a>
            </li>
            <li
                class="nav-main-item">
                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                    aria-expanded="true" href="#">
                    <i class="nav-main-link-icon fa fa-briefcase"></i>
                    <span class="nav-main-link-name">Other Menu</span>
                </a>
                <ul class="nav-main-submenu">
                    <li class="nav-main-item">
                        <a class="nav-main-link {{ request()->is('admin/vacancy/job-vacancy/*') ? 'active' : '' }}"
                            href="">
                            <span class="nav-main-link-name">Menu1</span>
                        </a>
                    </li>
                </ul>
                <ul class="nav-main-submenu">
                    <li class="nav-main-item">
                        <a class="nav-main-link {{ request()->is('admin/vacancy/vacancy-application/*') ? 'active' : '' }}"
                            href="">
                            <span class="nav-main-link-name">Menu2</span>
                        </a>
                    </li>
                </ul>
                <ul class="nav-main-submenu">
                    <li class="nav-main-item">
                        <a class="nav-main-link {{ request()->is('admin/vacancy/selected-vacancy-application/*') ? 'active' : '' }}"
                            href="">
                            <span class="nav-main-link-name">Menu3</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>