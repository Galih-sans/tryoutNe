<?= $this->extend('user/layout/app-no-navbar') ?>

<?= $this->section('content') ?>
<div id="page-loader" class="show"></div>
<div class="container-fluid">
    <div class="row items-push ">
        <div class="content content-boxed">
            <div class="row">
                <div class="col-12 col-xl-9">
                <?=form_open(route_to('user.test.submit'), array('id'=>'ujian'), array('id'=> $data['test']->id));?>
                    <div class="block block-rounded shadow-sm " id="asd">
                        <div class="block-header block-content-full bg-neo-dark ribbon ribbon-modern ribbon-glass">
                            <h3 class="block-title text-white"><?= $data['test']->test_name ?></h3>
                            <div class="text-right">
                                <div class="ribbon-box">
                                    <a class="badge link-fx text-white " id="timer"></a>
                                </div>
                            </div>
                        </div>
                        <div class="block-content fs-sm block-content-full ribbon ribbon-light ribbon-left ribbon-modern">
                            <div class="box box-primary">
                                <div class="ribbon-box">
                                <i class="fa-solid fa-bars-staggered"><span class="badge bg-blue text-dark">Soal #<span id="soalke"></span></i>
                                </div>
                                <div class="px-3 text-justify py-4 data">
                                    
                                </div>
                                <div class="box-footer text-center text-white">
                                    <a class="action back btn btn-sm btn-flat prevBtn" rel="1"
                                        onclick="back(); return false"><i class="fa-solid fa-angle-left"></i>
                                        Sebelumnya</a>
                                    <a class="ragu_ragu btn btn-sm bg-city text-white rg-btn" rel="1" onclick="return tidak_jawab();"
                                        >Ragu-ragu</a>
                                    <a class="action next btn btn-sm btn-flat" rel="1" onclick="next(); return false">
                                        Selanjutnya <i class="fa-solid fa-angle-right"></i></a>
                                    <input type="hidden" name="jml_soal" id="jml_soal" value="">
                                    <input type="hidden" name="begin_time" id="begin_time" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <?=form_close();?>
                </div>
                <div class="col-12 col-xl-3">
                    <div class="block block-rounded shadow-sm">
                        <div class="block-header block-content-full bg-neo-dark ribbon ribbon-modern ribbon-glass">
                            <h3 class="block-title text-white">Peserta</h3>
                        </div>
                        <div class="block-content">
                            <div class="row">
                                <div class="col-12 col-md-12 py-2 border-bottom">
                                    <div class="row text-left bg-body-light  rounded-top">
                                        <div class="col-4 col-md-3">
                                            <img class="avatar avatar-lg"
                                                src="<?= base_url('assets-front/img/avatar.png')?>" alt="">
                                        </div>
                                        <div class="col-8 col-md-9 px-4">
                                            <span
                                                class="mt-2 mb-0 fw-medium h6"><?= ucwords(session('name')) ; ?></span>
                                        </div>
                                            <div class="col-12 col-md-12 text-center py-4">
                                                <a class="selesai action submit btn btn-sm btn-flat btn-block text-white w-100 mb-2" onclick="return simpan_akhir();">Selesai</a>
                                            </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-12 border-bottom">
                                    <div class="row text-left bg-body-light rounded-top">
                                        <div class="col-12 col-md-12 text-center">
                                            <div class="box box-primary">
                                                <div class="box-header with-border ">
                                                    <span class="fw-medium h5">Navigasi Soal</span>
                                                </div>
                                                <div class="box-body text-center row overflow-auto mb-2"
                                                    id="tampil_jawaban" style="height: 330px;">
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
<script type="text/javascript">
    var base_url        = "<?=base_url(); ?>";
    var id_tes          = "<?=$data['test']->id; ?>";
    var widget;
    var total_widget;
    var durasi    = "<?=$data['test'] -> duration; ?>";
    var url = "<?= route_to('user.test.get_test') ?>";
</script>

<script src="<?=base_url('assets-front\js\pages\sheet.js')?>"></script>
<?= $this->endSection() ?>