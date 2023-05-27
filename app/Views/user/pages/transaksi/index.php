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
                    <div class="content content-boxed">
                        <div class="row items-push">
                            <?php $no1 = 1; ?>
                            <?php foreach ($data['paketDiamond'] as $item) : ?>
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
                                        </div>
                                    </div>
                                </div>
                            <?php
                                $no1++;
                            endforeach; ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalDetail" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body ">
                <div class="text-right"> <i class="fa fa-close close" data-bs-dismiss="modal"></i> </div>
                
                <div class="px-4 py-5">
                <input type="hidden" id="id-paket" name="id_paket">
                    <h5 class="text-uppercase" id="nama-paket" name="nama">Nama Paket</h5>
                <h4 class="mt-5 theme-color mb-5" style="color:blue" id="description" name="deskripsi">Deskripsi</h4>
                <span class="theme-color" style="color:blue">Rincian Paket</span>
                <div class="mb-3">
                    <hr class="new1">
                </div>
                <div class="d-flex justify-content-between">
                    <span class="font-weight-bold">Jumlah Diamond</span>
                    <span class="text-muted" id="amount" name="jumlah"></span>
                </div>
                <div class="d-flex justify-content-between">
                    <small>Harga</small>
                    <small id="price"></small>
                </div>
                <div class="d-flex justify-content-between">
                    <small>Diskon</small>
                    <small>-</small>
                </div>
                
                <div class="d-flex justify-content-between mt-3">
                    <span class="font-weight-bold">Total</span>
                    <span id="total" name="harga" class="font-weight-bold" style="color:blue"></span>
                </div>  
                <div class="text-center mt-5">
                    <button class="btn btn-primary beli-diamond">Beli Sekarang</button>
                </div>                   
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <div class="modal fade" id="modalDetail" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                        <span id="amount" name="jumlah" style="font-size: 15px; font-weight: bold;">
                                        </span>
                                    </div>
                                </div>
                                <div class="col-12 col-md-12 py-2">
                                    <span class="tittle-neo"> Harga :</span>
                                    <div class=" mb-4 pt-2">
                                        <span id="price" name="harga" style="font-size: 15px; font-weight: bold;">
                                        </span>
                                    </div>
                                </div>
                                <div class="col-12 col-md-12 py-2">
                                    <span class="tittle-neo"> Deskripsi :</span>
                                    <div class=" mb-4 pt-2">
                                        <span id="description" name="deskripsi" style="font-size: 15px; font-weight: bold;">
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
</div> -->
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
            $('#amount').text(data_amount);
            $('#price').text('Rp' + data_price);
            $('#total').text('Rp' + data_price); // harga - diskon
            $('#description').text(data_description);
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