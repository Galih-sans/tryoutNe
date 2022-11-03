<?= $this->extend('user/layout/app-no-navbar') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="row items-push">
        <div class="content content-boxed">
            <div class="row">
                <div class="col-xl-8">
                    <!-- Lessons -->
                    <div class="block block-rounded">
                        <div
                            class="block-header block-content-full bg-neo-dark ribbon ribbon-modern ribbon-glass text-white">
                            Hasil Test
                        </div>
                        <div class="block-content fs-sm row py-4">
                            <div class="block block-rounded row g-0">
                                <ul class="nav nav-tabs nav-tabs-block flex-md-column col-md-4" role="tablist">
                                    <li class="nav-item d-md-flex flex-md-column" role="presentation">
                                        <button class="nav-link text-md-start active btn-block" id="btabs-vertical-home-tab"
                                            data-bs-toggle="tab" data-bs-target="#btabs-vertical-home" role="tab"
                                            aria-controls="btabs-vertical-home" aria-selected="false" tabindex="-1">
                                            <i
                                                class="fa-solid fa-chart-simple opacity-50 me-1 d-none d-sm-inline-block"></i>
                                            Peringkat
                                        </button>
                                    </li>
                                    <li class="nav-item d-md-flex flex-md-column" role="presentation">
                                        <button class="nav-link text-md-start btn-block" id="btabs-vertical-profile-tab"
                                            data-bs-toggle="tab" data-bs-target="#btabs-vertical-profile" role="tab"
                                            aria-controls="btabs-vertical-profile" aria-selected="false" tabindex="-1">
                                            <i
                                                class="fa-solid fa-file-pen opacity-50 me-1 d-none d-sm-inline-block"></i>
                                            Jawaban
                                        </button>
                                    </li>
                                    <li class="nav-item d-md-flex flex-md-column" role="presentation">
                                        <button class="nav-link text-md-start btn-block"
                                            id="btabs-vertical-settings-tab" data-bs-toggle="tab"
                                            data-bs-target="#btabs-vertical-settings" role="tab"
                                            aria-controls="btabs-vertical-settings" aria-selected="true">
                                            <i
                                                class="fa-solid fa-square-poll-vertical opacity-50 me-1 d-none d-sm-inline-block"></i>
                                            Pembahasan
                                        </button>
                                    </li>
                                </ul>
                                <div class="tab-content col-md-8">
                                    <div class="block-content tab-pane  active show" id="btabs-vertical-home" role="tabpanel"
                                        aria-labelledby="btabs-vertical-home-tab" tabindex="0">
                                        <h5 class="fw-semibold text-center">Peringkat Test</h5>
                                        <table class="table table-striped   table-vcenter table-hover">
                                                <tr class="bg-neo">
                                                    <th class="text-center text-white fs-sm" style="width: 50px;">#</th>
                                                    <th class="text-center text-white fs-sm" >Nama</th>
                                                    <th class="text-center text-white fs-sm" style="width: 100px;">Skor</th>
                                                </tr>
                                            <tbody>
                                                <?php 
                                                $numItems = count($data['data']['test_result1']);
                                                $i = 0;
                                                ?>
                                                <?php foreach ( $data['data']['test_result1'] as $item):?>
                                                    <?php 
                                                       if($i++ > 2) { ?>
                                                        <tr >
                                                        <th class="text-center" scope="row">...</th>
                                                        <td class="fw-semibold fs-sm">...</td>
                                                        <td class="text-center">
                                                            ...
                                                        </td>
                                                    </tr>
                                                    <?php
                                                      }
                                                    ?>
                                                    <tr>
                                                    <th class="text-center" scope="row"><?= $item['Rank'] ?></th>
                                                    <td class="fw-semibold fs-sm"><?= $item['full_name'] ?></td>
                                                    <td class="text-center">
                                                    <span><?= $item['score'] ?></Span>

                                                    </td>
                                                </tr>
                                                <?php endforeach;?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="block-content tab-pane" id="btabs-vertical-profile" role="tabpanel"
                                        aria-labelledby="btabs-vertical-profile-tab" tabindex="0">
                                        <h5 class="fw-semibold">Jawaban</h5>
                                        <p class="fs-sm">
                                           
                                        </p>
                                    </div>
                                    <div class="block-content tab-pane" id="btabs-vertical-settings"
                                        role="tabpanel" aria-labelledby="btabs-vertical-settings-tab" tabindex="0">
                                        <h5 class="fw-semibold">Pembahasan</h5>
                                        <p class="fs-sm">
                                                      
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 ">
                    <!-- Subscribe -->
                    <div class="block block-rounded">
                        <div class="block-content">
                            <div class="row">
                                <div class="col-12 col-md-12 py-3 border-bottom">
                                    <div class="row text-left  rounded-top">
                                        <div class="col-4 col-md-3">
                                            <img class="avatar avatar-xl"
                                                src="<?= base_url('assets-front/img/avatar.png')?>" alt="">
                                        </div>
                                        <div class="col-8 col-md-9">
                                            <span class="mt-2 mb-0 fw-medium"><?= ucwords(session('name')); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="py-2">
                                    <label for="">Hasil Test Anda</label>
                                    <input type="text" class="form-control disabled text-center fw-bold h5" id=""
                                        readonly value="<?= $data['data']['test_result'] ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END Subscribe -->
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>