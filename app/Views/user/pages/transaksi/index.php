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
                    <!-- <div class="card mb-5"> -->
                    <!-- <div class="bg-neo card-header pb-3 px-3">
                            <h6 class="mb-0 text-white"><i class="fa fa-diamond"></i> Paket Diamond</h6>
                        </div> -->
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
                                            <button type="button" class="btn detail-button read" data-id="<?= $item->id ?>" data-name="<?= $item->name ?>" data-price="<?= $item->price ?>" data-amount="<?= $item->amount ?>" data-description="<?= $item->description ?>">Detail</a>
                                                <!-- <a href=" #" class="read">Beli</a> -->
                                        </div>
                                    </div>
                                </div>
                            <?php
                                $no1++;
                            endforeach; ?>
                        </div>
                    </div>
                    <!-- </div> -->
                <?php } ?>
            </div>
            <!-- <div class="col-md-12 mt-4">
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
            </div> -->
        </div>
    </div>
</div>
<div class="modal fade" id="modalDetail" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="block block-rounded block-transparent mb-0">
                <div class="block-header block-header-ne">
                    <h3 class="block-title text-white">Paket Diamond : </h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option-white" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content fs-sm">
                    <form id="formPaketDiamond">
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <div class="col-12 col-md-12 py-2">
                                    <span class="tittle-neo"> Nama Paket :</span>
                                    <div class=" mb-4 pt-2">
                                        <span hidden id="id-paket" name="id_paket" style="font-size: 15px; font-weight: bold;">
                                        </span>
                                        <span id="nama-paket" name="nama" style="font-size: 15px; font-weight: bold;">
                                        </span>
                                    </div>
                                </div>
                                <div class="col-12 col-md-12 py-2">
                                    <span class="tittle-neo"> Jumlah Diamond :</span>
                                    <div class=" mb-4 pt-2">
                                        <span id="nama-amount" name="jumlah" style="font-size: 15px; font-weight: bold;">
                                        </span>
                                    </div>
                                </div>
                                <div class="col-12 col-md-12 py-2">
                                    <span class="tittle-neo"> Harga :</span>
                                    <div class=" mb-4 pt-2">
                                        <span id="nama-price" name="harga" style="font-size: 15px; font-weight: bold;">
                                        </span>
                                    </div>
                                </div>
                                <div class="col-12 col-md-12 py-2">
                                    <span class="tittle-neo"> Deskripsi :</span>
                                    <div class=" mb-4 pt-2">
                                        <span id="nama-description" name="deskripsi" style="font-size: 15px; font-weight: bold;">
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="block-content block-content-full text-end bg-body">
                    <button type="button" class="btn btn-sm btn-primary beli-diamond" data-bs-dismiss="modal">Beli</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $(document).on('click', '.detail-button', function() {
            let data_id = $(this).data("id");
            let data_name = $(this).data("name");
            let data_amount = $(this).data("amount");
            let data_price = $(this).data("price");
            let data_description = $(this).data("description");

            window.id_paketDiamond = data_id;
            // console.log(data_id);
            $('#id-paket').text(data_id);
            $('#nama-paket').text(data_name);
            $('#nama-amount').text(data_amount);
            $('#nama-price').text(data_price);
            $('#nama-description').text(data_description);
            $('#modalDetail').modal('show');
        });

        $(document).on('click', '.beli-diamond', function() {
            let paket_id = window.id_paketDiamond;
            console.log(paket_id);

            // tes_beli(paket_id);
            document.location.href = '/transaksi/beli_diamond/' + paket_id;
            // document.location.href = '/transaksi/beli_diamond';
            // console.log($data_id);
        });
    });
</script>
<?= $this->endSection() ?>