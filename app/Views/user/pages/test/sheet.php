<?= $this->extend('user/layout/app-no-navbar') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="row items-push">
        <div class="content content-boxed">
            <div class="row">
                <div class="col-xl-8">
                    <div class="block block-rounded">
                        <div class="block-header block-content-full bg-neo ribbon ribbon-modern ribbon-glass">
                            <h3 class="block-title text-white">Halaman Test #Nama Test</h3>
                            <div class="text-right">
                                <div class="ribbon-box">
                                    <span class="badge bg-red">Sisa Waktu - 1 Jam<span class="sisawaktu"
                                            data-time=""></span></span> 
                                </div>
                            </div>
                        </div>
                        <div class="block-content fs-sm">
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title"><span class="badge bg-blue text-dark">Soal #<span
                                                id="soalke"></span>
                                        </span></h3>

                                </div>
                                <div class="box-body">
                                </div>
                                <div class="box-footer text-center text-white">
                                    <a class="action back btn btn-info" rel="0" onclick="return back();"><i
                                            class="glyphicon glyphicon-chevron-left"></i> Back</a>
                                    <a class="ragu_ragu btn btn-warning" rel="1"
                                        onclick="return tidak_jawab();">Ragu-ragu</a>
                                    <a class="action next btn btn-info" rel="2" onclick="return next();"><i
                                            class="glyphicon glyphicon-chevron-right"></i> Next</a>
                                    <a class="selesai action submit btn btn-danger" onclick="return simpan_akhir();"><i
                                            class="glyphicon glyphicon-stop"></i> Selesai</a>
                                    <input type="hidden" name="jml_soal" id="jml_soal" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 ">
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
                                <div class="col-12 col-md-12 py-3 border-bottom">
                                    <div class="row text-left bg-body-light  rounded-top">
                                        <div class="col-12 col-md-12 text-center">
                                            <div class="box box-primary">
                                                <div class="box-header with-border">
                                                    <span class="mt-2 mb-4 fw-medium h4">Navigasi Soal</span>
                                                    <div class="box-tools pull-right row">
                                                        <?php for($i=1;$i<=30;$i++){ ?>
                                                        <div class="col-2 text-center">
                                                            <button type="button"
                                                                class="btn btn-block btn-box-tool bg-neo text-white text-center"
                                                                data-widget="collapse"><?= $i ?>
                                                            </button>
                                                        </div>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                                <div class="box-body text-center" id="tampil_jawaban">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>