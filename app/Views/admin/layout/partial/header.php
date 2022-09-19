<header id="page-header">

<div class="content-header">

    <div class="d-flex align-items-center">
        <button type="button" class="btn btn-sm btn-alt-secondary me-2 d-none d-lg-inline-block"
            data-toggle="layout" data-action="sidebar_mini_toggle">
            <i class="fa fa-fw fa-ellipsis-v"></i>
        </button>
    </div>

    <div class="d-flex align-items-center">
        <div class="dropdown d-inline-block ms-2">
            <button type="button" class="btn btn-sm btn-alt-secondary d-flex align-items-center"
                id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                <!-- <img class="rounded-circle" src="assets/media/avatars/avatar10.jpg" alt="Header Avatar"
                    style="width: 21px;"> -->
                <span class="d-none d-sm-inline-block ms-2"><?= session('name'); ?></span>
                <i class="fa fa-fw fa-angle-down d-none d-sm-inline-block ms-1 mt-1"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-md dropdown-menu-end p-0 border-0"
                aria-labelledby="page-header-user-dropdown">
                <div class="p-3 text-center bg-body-light border-bottom rounded-top">
                    <!-- <img class="img-avatar img-avatar48 img-avatar-thumb"
                        src="assets/media/avatars/avatar10.jpg" alt=""> -->
                    <p class="mt-2 mb-0 fw-medium"><?= session('name'); ?></p>
                </div>
                <div class="p-2">
                    <a class="dropdown-item d-flex align-items-center justify-content-between"
                        href="be_pages_generic_profile.html">
                        <span class="fs-sm fw-medium">Profil</span>
                        <span class="badge rounded-pill bg-primary ms-2">1</span>
                    </a>
                </div>
                <div role="separator" class="dropdown-divider m-0"></div>
                <div class="p-2">
                    <a class="dropdown-item d-flex align-items-center justify-content-between"
                        href="<?= base_url('logout')?>">
                        <span class="fs-sm fw-medium">Keluar</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="dropdown d-inline-block ms-2">
            <button type="button" class="btn btn-sm btn-alt-secondary"
                id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                <i class="fa fa-fw fa-bell"></i>
                <span class="text-primary">•</span>
            </button>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0 border-0 fs-sm"
                aria-labelledby="page-header-notifications-dropdown">
                <div class="p-2 bg-body-light border-bottom text-center rounded-top">
                    <h5 class="dropdown-header text-uppercase">Pemberitahuan</h5>
                </div>
                <ul class="nav-items mb-0">
                    <li>
                        <a class="text-dark d-flex py-2" href="javascript:void(0)">
                            <div class="flex-shrink-0 me-2 ms-3">
                                <i class="fa fa-fw fa-check-circle text-success"></i>
                            </div>
                            <div class="flex-grow-1 pe-2">
                                <div class="fw-semibold">You have a new follower</div>
                                <span class="fw-medium text-muted">15 min ago</span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a class="text-dark d-flex py-2" href="javascript:void(0)">
                            <div class="flex-shrink-0 me-2 ms-3">
                                <i class="fa fa-fw fa-plus-circle text-primary"></i>
                            </div>
                            <div class="flex-grow-1 pe-2">
                                <div class="fw-semibold">1 new sale, keep it up</div>
                                <span class="fw-medium text-muted">22 min ago</span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a class="text-dark d-flex py-2" href="javascript:void(0)">
                            <div class="flex-shrink-0 me-2 ms-3">
                                <i class="fa fa-fw fa-times-circle text-danger"></i>
                            </div>
                            <div class="flex-grow-1 pe-2">
                                <div class="fw-semibold">Update failed, restart server</div>
                                <span class="fw-medium text-muted">26 min ago</span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a class="text-dark d-flex py-2" href="javascript:void(0)">
                            <div class="flex-shrink-0 me-2 ms-3">
                                <i class="fa fa-fw fa-plus-circle text-primary"></i>
                            </div>
                            <div class="flex-grow-1 pe-2">
                                <div class="fw-semibold">2 new sales, keep it up</div>
                                <span class="fw-medium text-muted">33 min ago</span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a class="text-dark d-flex py-2" href="javascript:void(0)">
                            <div class="flex-shrink-0 me-2 ms-3">
                                <i class="fa fa-fw fa-user-plus text-success"></i>
                            </div>
                            <div class="flex-grow-1 pe-2">
                                <div class="fw-semibold">You have a new subscriber</div>
                                <span class="fw-medium text-muted">41 min ago</span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a class="text-dark d-flex py-2" href="javascript:void(0)">
                            <div class="flex-shrink-0 me-2 ms-3">
                                <i class="fa fa-fw fa-check-circle text-success"></i>
                            </div>
                            <div class="flex-grow-1 pe-2">
                                <div class="fw-semibold">You have a new follower</div>
                                <span class="fw-medium text-muted">42 min ago</span>
                            </div>
                        </a>
                    </li>
                </ul>
                <div class="p-2 border-top text-center">
                    <a class="d-inline-block fw-medium" href="javascript:void(0)">
                        <i class="fa fa-fw fa-arrow-down me-1 opacity-50"></i> Load More..
                    </a>
                </div>
            </div>
        </div>
    </div>

</div>


<div id="page-header-loader" class="overlay-header bg-body-extra-light">
    <div class="content-header">
        <div class="w-100 text-center">
            <i class="fa fa-fw fa-circle-notch fa-spin"></i>
        </div>
    </div>
</div>
</header>