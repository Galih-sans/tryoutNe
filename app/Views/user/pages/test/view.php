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
                            <h3 class="block-title text-white"><?= $data['testData']->test_name ?></h3>
                            <div class="text-right">
                                <div class="ribbon-box">
                                    <?= ucfirst($data['testData']->type) ?>
                                </div>
                            </div>
                        </div>
                        <div class="block-content fs-sm row py-4">
                            <div class="co-12 col-md-5">
                                <div class="border-right">
                                    <p class="fw-bold">Tanggal Test Dimulai</p>
                                    <p class="text-neo"><?= date("d M Y H:i", $data['testData']->begin_time) ?></p>
                                </div>
                            </div>
                            <div class="co-12 col-md-5">
                                <div class="border-right">
                                    <p class="fw-bold">Tanggal Test Ditutup</p>
                                    <p class="text-neo"><?= date("d M Y H:i", $data['testData']->end_time) ?></p>
                                </div>
                            </div>
                            <div class="co-12 col-md-2">
                                <div class="border-right">
                                    <p class="fw-bold">Durasi Test</p>
                                    <p class="text-neo"><?= $data['testData']->duration ?> Menit</p>
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
                                <?php $i=0;?>
                                <?php foreach ( $data['testData']->question_compositon as $item):?>
                                <?php $i++;?>
                                <thead>
                                    <tr class="table-active bg-neo text-white ">
                                        <th style="width: 50px;"><?= $i ?></th>
                                        <th class="fw-medium fs-lg"><?= $item['subject'] ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $j=0;?>
                                    <?php foreach ( $item['topic'] as $topica):?>
                                    <?php $j++;?>
                                    <tr>
                                        <td class="table-info text-center">
                                            <i class="fa-solid fa-bookmark"></i>
                                        </td>
                                        <td>
                                            <a class="fw-semibold link-fx text-secondary"><?= $i.'.'.$j.' '.$topica ?></a>
                                        </td>
                                    </tr>
                                    <?php endforeach;?>
                                </tbody>
                                <?php endforeach;?>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 ">
                    <!-- Subscribe -->
                    <div class="block block-rounded">
                        <div class="block-content">
                        <div class="block-header block-header-default text-center">
                            <h3 class="block-title">Peserta Ujian</h3>
                        </div>
                            <div class="row">
                                <div class="col-12 col-md-12 py-3 border-bottom">
                                    <div class="row text-left rounded-top">
                                        <div class="col-4 col-md-3">
                                            <img class="avatar avatar-xl"
                                                src="<?= base_url('assets-front/img/avatar.png')?>" alt="">
                                        </div>
                                        <div class="col-8 col-md-9">
                                            <span class="mt-2 mb-0 fw-bold"><?= session('name'); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row py-2">
                                    <div class="col-12 col-md-6 text-center">
                                        <a class="btn btn-dark btn-block w-100 mb-2"
                                            href="<?= route_to('user.test.index') ?>">Kembali</a>
                                    </div>
                                    <div class="col-12 col-md-6 text-center">
                                        <a class="btn btn-success btn-block w-100 mb-2"
                                            href="<?= route_to('user.test.sheet', strtr(base64_encode($data['encrypter']->encrypt($data['testData']->id)),array('+' => '.', '=' => '-', '/' => '~')))?>">Mulai
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
                                            <i class="fa fa-fw fa-book me-1"></i> <?= $data['testData']->composition ?>
                                            Materi
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <i class="fa fa-fw fa-clock me-1"></i> <?= $data['testData']->duration ?>
                                            Menit
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <i class="fa fa-fw fa-heart me-1"></i> 16850 Peserta
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <i class="fa fa-fw fa-calendar me-1"></i>
                                            <?= date("d M Y", $data['testData']->begin_time) ?> -
                                            <?= date("d M Y", $data['testData']->end_time) ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <i class="fa fa-fw fa-tags me-1"></i>
                                            <?php foreach ( $data['testData']->question_compositon as $item):?>
                                            <a class="fw-semibold link-fx text-success"><?= $item['subject'] ?></a>,
                                            <?php endforeach;?>
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