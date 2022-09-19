<?= $this->extend('user/layout/app-no-navbar') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="row items-push">
        <div class="content content-boxed">
            <div class="row">
                <div class="col-xl-8">
                    <!-- Lessons -->
                    <div class="block block-rounded">
                        <div class="block-header block-content-full bg-neo-dark ribbon ribbon-modern ribbon-glass">
                            <h3 class="block-title text-white">SIMAK UI</h3>
                            <div class="text-right">
                                <div class="ribbon-box">
                                    Gratis
                                </div>
                            </div>
                        </div>
                        <div class="block-content fs-sm row py-4">
                            <div class="co-12 col-md-5">
                                <div class="border-right">
                                    <p class="fw-bold">Tanggal Mulai</p>
                                    <p class="text-neo">09 Juni 2022, 10:00 WIB</p>
                                </div>
                            </div>
                            <div class="co-12 col-md-5">
                                <div class="border-right">
                                    <p class="fw-bold">Tanggal Tutup</p>
                                    <p class="text-neo">01 Juli 2022, 10:00 WIB</p>
                                </div>
                            </div>
                            <div class="co-12 col-md-2">
                                <div class="border-right">
                                    <p class="fw-bold">Durasi</p>
                                    <p class="text-neo">90 Menit</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block block-rounded">
                        <div class="block-header block-content-full bg-neo-dark ">
                            <h3 class="block-title text-white">Komposisi Soal</h3>
                        </div>
                        <div class="block-content fs-sm">
                            <table class="table table-borderless table-vcenter">
                                <thead>
                                    <tr class="table-active bg-neo text-white ">
                                        <th style="width: 50px;">1</th>
                                        <th class="fw-medium fs-lg">Mata Pelajaran 1</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="table-info text-center">
                                            <i class="fa-solid fa-bookmark"></i>
                                        </td>
                                        <td>
                                            <a class="fw-medium" href="javascript:void(0)">1.1 Topik 1</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="table-info text-center">
                                            <i class="fa-solid fa-bookmark"></i>
                                        </td>
                                        <td>
                                            <a class="fw-medium" href="javascript:void(0)">1.2 Topik 2</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-borderless table-vcenter">
                                <thead>
                                    <tr class="table-active bg-neo text-white ">
                                        <th style="width: 50px;">1</th>
                                        <th class="fw-medium fs-lg">Mata Pelajaran 2</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="table-info text-center">
                                            <i class="fa-solid fa-bookmark"></i>
                                        </td>
                                        <td>
                                            <a class="fw-medium" href="javascript:void(0)">2.1 Topik 1</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="table-info text-center">
                                            <i class="fa-solid fa-bookmark"></i>
                                        </td>
                                        <td>
                                            <a class="fw-medium" href="javascript:void(0)">2.2 Topik 2</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 ">
                    <!-- Subscribe -->
                    <div class="block block-rounded">
                        <div class="block-content">
                            <div class="row">
                                <div class="col-12 col-md-12 py-3 border-bottom">
                                    <div class="row text-left bg-body-light  rounded-top">
                                        <div class="col-4 col-md-3">
                                            <img class="avatar avatar-xl"
                                                src="<?= base_url('assets-front/img/avatar.png')?>" alt="">
                                        </div>
                                        <div class="col-8 col-md-9">
                                            <span class="mt-2 mb-0 fw-medium"><?= session('name'); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row py-2">
                                    <div class="col-12 col-md-6 text-center">
                                        <a class="btn btn-dark btn-block w-100 mb-2"
                                            href="<?= route_to('user.test.index') ?>">Kembali</a>
                                    </div>
                                    <div class="col-12 col-md-6 text-center">
                                        <a class="btn btn-success btn-block w-100 mb-2" href="<?= route_to('user.test.sheet') ?>">Mulai
                                            Test</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END Subscribe -->

                    <!-- Course Info -->
                    <div class="block block-rounded">
                        <div class="block-header block-header-default text-center">
                            <h3 class="block-title">Detail Ujian</h3>
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
                                            <a class="fw-semibold link-fx text-success">Bahasa</a>,
                                            <a class="fw-semibold link-fx text-success">Sosiografi</a>,
                                            <a class="fw-semibold link-fx text-success">Saintek</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>