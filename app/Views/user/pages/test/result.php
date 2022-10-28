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

                        </div>
                        <div class="block-content fs-sm row py-4">

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
                                        <input type="text" class="form-control disabled text-center fw-bold h5" id="" readonly value="<?= $data['output']['test_result'] ?>">
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