<?= $this->extend('user/layout/app') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="row items-push mt-4">
        <div class="row">
            <div class="col-md-12 mt-4">
                <?php if ($data['paketDiamond'] == false) {  ?>
                    <div class="block block-rounded shadow-sm bg-neo-dark">
                        <div class=" content content-full text-center pt-5 pb-5">
                            <h2 class="h3 fw-normal text-white-75">
                                Belum ada produk saat ini.. :(
                            </h2>
                        </div>
                    </div>
                <?php } else {  ?>
                    <div class="bg-warning card mb-5">
                        <div class="card-header pb-3 px-3">
                            <h6 class="mb-0"><i class="fa fa-diamond"></i> Paket Diamond</h6>
                            <!-- <button class="text-right btn btn-danger">Add to cart</button> -->
                        </div>
                        <div class="content content-boxed">
                            <div class="row items-push">
                                <?php foreach ($data['paketDiamond'] as $item) : ?>
                                    <!-- product card -->
                                    <div class="col-12 col-md-4 col-lg-3 col-xl-3">
                                        <div class="height d-flex justify-content-center align-items-center">
                                            <div class="card p-3 pb-0">
                                                <h4 class=""><?= $item->amount ?> Neo Diamond</h4>
                                                <div class="d-flex justify-content-between align-items-center ">
                                                    <div class="image">
                                                        <img src="https://png.pngtree.com/element_our/png/20181206/pngtree-green-diamond-png_262764.jpg" width="180">
                                                    </div>
                                                </div>
                                                <h6><?= $item->description ?></h6>
                                                <h4 class="">Rp. <?= $item->price ?> ,-</h4>
                                                <button class="btn detail-product" style="background-color: #611BBD; color: white;">Lihat Selengkapnya</button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end of product card -->
                                <?php
                                endforeach; ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="col-md-12 mt-4">
                <?php if ($data['tests'] == false) {  ?>
                    <div class="block block-rounded shadow-sm bg-neo-dark">
                        <div class=" content content-full text-center pt-5 pb-5">
                            <h2 class="h3 fw-normal text-white-75">
                                Belum ada test saat ini.. :(
                            </h2>
                        </div>
                    </div>
                <?php } else {  ?>
                    <div class="bg-success card">
                        <div class="card-header pb-3 px-3">
                            <h6 class="mb-0"><i class="fa fa-clipboard-list"></i> Paket Test</h6>
                            <!-- <button class="text-right btn btn-danger">Add to cart</button> -->
                        </div>
                        <div class="content content-boxed">
                            <div class="row items-push">
                                <?php foreach ($data['tests'] as $item) : ?>
                                    <!-- product card -->
                                    <div class="col-12 col-md-4 col-lg-3 col-xl-3">
                                        <div class="height d-flex justify-content-center align-items-center">
                                            <div class="card p-3 pb-0">
                                                <h4 class=""><?= $item->test_name ?></h4>
                                                <div class="d-flex justify-content-between align-items-center ">
                                                    <div class="image">
                                                        <img src="https://media.istockphoto.com/id/524069563/photo/optical-form-of-an-examination-with-pencil.jpg?s=612x612&w=0&k=20&c=H5wRQfjcWRS8hTRZpcLT7UVomjYKtggIsNopD1o5LEE=" width="180">
                                                    </div>
                                                </div>
                                                <div class="">
                                                    <h6>Tanggal Mulai : </h6>
                                                    <h5><?= date("d-m-Y H:i", $item->begin_time); ?></h5>
                                                    <h3 class="badge badge-md <?= ($item->type == 'free') ? 'bg-gradient-success' : 'bg-gradient-warning'; ?> "><?= $item->type ?></h3>
                                                    <h4 <?= ($item->type == 'free') ? 'hidden' : ''; ?>><?= $item->price ?> Neo Diamond</h4>
                                                    <button class="btn detail-product" style="background-color: #611BBD; color: white;">Lihat Selengkapnya</button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- end of product card -->
                                <?php
                                endforeach; ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {

    });
</script>
<?= $this->endSection() ?>