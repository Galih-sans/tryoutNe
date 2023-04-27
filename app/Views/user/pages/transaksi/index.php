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
                    <div class="card mb-5">
                        <div class="bg-neo card-header pb-3 px-3">
                            <h6 class="mb-0 text-white"><i class="fa fa-diamond"></i> Paket Diamond</h6>
                            <!-- <button class="text-right btn btn-danger">Add to cart</button> -->
                        </div>
                        <div class="content content-boxed">
                            <div class="row items-push">
                                <?php $no1 = 1; ?>
                                <?php foreach ($data['paketDiamond'] as $item) : ?>
                                    <!-- new -->
                                    <div class="col-md-3 col-sm-6">
                                        <div class="pricingTable10">
                                            <div class="pricingTable-header">
                                                <h3 class="heading">Paket <?= $no1 ?></h3>
                                                <span class="price-value">
                                                    <?= $item->amount ?>
                                                </span>
                                            </div>
                                            <div class="pricing-content">
                                                <ul>
                                                    <li></li>
                                                    <li>Rp. <?= $item->price ?> ,-</li>
                                                    <li>
                                                        J<?= $item->description ?>
                                                    </li>
                                                </ul>
                                                <a href="#" class="read">Detail</a>
                                                <a href="#" class="read">Beli</a>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                    $no1++;
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
                    <div class="card">
                        <div class="bg-neo card-header pb-3 px-3">
                            <h6 class="mb-0 text-white"><i class="fa fa-clipboard-list"></i> Paket Test</h6>
                        </div>
                        <div class="content content-boxed">
                            <div class="row items-push">
                                <?php $no = 1; ?>
                                <?php foreach ($data['tests'] as $item) : ?>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="pricingTable10">
                                            <div class="pricingTable-header">
                                                <h3 class="heading">Paket <?= $no ?></h3>
                                                <span class="price-value">
                                                    <?= $item->test_name ?>
                                                </span>
                                            </div>
                                            <div class="pricing-content">
                                                <ul>
                                                    <li></li>
                                                    <li class="badge badge-md"><?= $item->type ?></li>
                                                    <li <?= ($item->type == 'free') ? 'hidden' : ''; ?>><?= $item->price ?> Neo Diamond</li>
                                                    <li>
                                                        Tanggal Mulai :<br> <?= date("d-m-Y H:i", $item->begin_time); ?>
                                                    </li>
                                                    <li>
                                                        Tanggal Selesai :<br> <?= date("d-m-Y H:i", $item->end_time); ?>
                                                    </li>
                                                    <li>
                                                        Durasi : <?= $item->duration ?> Menit
                                                    </li>
                                                    <li>
                                                        Jumlah Pertanyaan : <?= $item->number_of_question ?>
                                                    </li>
                                                </ul>
                                                <a href="#" class="read">Detail</a>
                                                <a href="#" class="read">Beli</a>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                    $no++;
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