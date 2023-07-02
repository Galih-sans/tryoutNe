<?= $this->extend('user/layout/app') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="row items-push mt-4">
        <div class="row">
            <div class="col-md-12 mt-4">
                <?php if ($data['paketDiamond'] < 1) {  ?>
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
                                            <h3 class="heading mx-3"><?= $item->name ?></h3>
                                            <span class="price-value">
                                                <?= $item->amount ?>
                                            </span>
                                        </div>
                                        <div class="pricing-content">
                                            <ul>
                                                <li></li>
                                                <li>Rp. <?= $item->price ?> ,-</li>
                                                <li>
                                                    <?= $item->description ?>
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
                <div class="d-flex justify-content-between mb-2">
                    <small>Harga</small>
                    <small id="price"></small>
                </div>
                <div class="d-flex justify-content-between mb-2">
                <span class="font-weight-bold">Kode Voucher</span>
                </div>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Masukan Kode Voucher" autocomplete="off" name="kode_voucher" aria-label="Masukan Kode Voucher" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-info" type="button" onclick="cek_voucher()">Cek</button>
                    </div>
                </div>
                <div class="d-flex justify-content-between mb-2">
                    <small class="text-danger" id="error-string"></small>
                    <small class="text-success" id="success-string"></small>
                </div>
                <div class="d-flex justify-content-between">
                    <small>Diskon</small>
                    <small class="text-success" id="discount"></small>
                </div>
                
                <div class="d-flex justify-content-between mt-3">
                    <span class="font-weight-bold">Total</span>
                    <span id="total" name="harga" class="font-weight-bold" style="color:blue"></span>
                </div>  
                <div class="text-center mt-5">
                    <button class="btn btn-primary" onclick="get_token()">Beli Sekarang</button>
                    <!-- <button class="btn btn-primary beli-diamond">Beli Sekarang 2</button> -->
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
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-cLQaOuRebxfyx3Lv"></script>
<script>
    $(document).ready(function() {
        $(document).on('click', '.detail-button', function() {
            let data_id = $(this).data("id");
            let data_name = $(this).data("name");
            let data_amount = $(this).data("amount");
            let data_price = $(this).data("price");
            let data_description = $(this).data("description"); 

            window.packet_id = data_id;
            window.price = data_price;
            // console.log(data_id);
            $('#id-paket').text(data_id);
            $('#nama-paket').text(data_name);
            $('#amount').text(data_amount);
            $('#price').text('Rp' + data_price);
            $('#total').text('Rp' + data_price); // harga - diskon
            $('#description').text(data_description);
            $('#discount').text('-')
            $('#modalDetail').modal('show');

            const list = document.getElementById("error-string");
                while (list.hasChildNodes()) {
                list.removeChild(list.firstChild);
            }
            const list2 = document.getElementById("success-string");
                while (list2.hasChildNodes()) {
                    list2.removeChild(list2.firstChild);
                }
        });

        $(document).on('click', '.beli-diamond', function() {
            let paket_id = window.packet_id;
            let offer_code = window.code_offer
            console.log(paket_id);
            document.location.href = '/transaksi/beli_diamond/' + paket_id + '/' + offer_code;
        });
    });

    function cek_voucher() {
        let data_price = window.price;
        let diamond_package_id = window.packet_id;
        // console.log('kode_voucher=' + $("input[name=kode_voucher]").val());
        const list = document.getElementById("error-string");
        while (list.hasChildNodes()) {
                list.removeChild(list.firstChild);
            };
            const list2 = document.getElementById("success-string");
                while (list2.hasChildNodes()) {
                    list2.removeChild(list2.firstChild);
                }
            Swal.fire({
                text: "Memeriksa Voucher...",
                allowOutsideClick: false,
                timer: 1000
            });
            Swal.showLoading();
            $.ajax({
                url: "<?= route_to('user.transaksi.check_voucher') ?>",
                type: "POST",
                data: 'kode_voucher=' + $("input[name=kode_voucher]").val()  + "&id_paket=" + diamond_package_id,
                success: function(d) {
                    var d = JSON.parse(d);
                    if (d.success == true) {
                        $('#success-string').append().text(d.string);
                        $('#discount').text('Rp' + d.potongan);
                        $('#total').text('Rp' + (data_price - d.potongan));
                    } else {
                        $('#error-string').append().text(d.string);
                        $('#discount').text('-');
                        $('#total').text('Rp' + data_price)
                    }
                    $('input[name=kode_voucher').val('');
                    // console.log(d);
                    window.code_offer = d.code; 
                    // console.log(window.code_offer);
                    // console.log(d.potongan);
                    console.log('total=' + (data_price - d.potongan));
                },
                error: function(error) {
                    console.log(error);
                }
            });
    }

    function get_token(){
        let paket_id = window.packet_id;
        let offer_code = window.code_offer

        console.log(paket_id, offer_code);
        Swal.fire({
                text: "Silahkan Tunggu....",
                allowOutsideClick: false,
                // timer: 1000
            });
            Swal.showLoading();
            $.ajax({
                url: "<?= route_to('user.transaksi.get_token') ?>",
                type: "POST",
                data: 'paket_id=' + paket_id  + "&offer_code=" + offer_code,
                success: function(d) {
                    var d = JSON.parse(d);
                    // TARUH SCRIPT SNAP DISINI  
                    // For example trigger on button clicked, or any time you need
                    // var payButton = document.getElementById('pay-button');
                    // payButton.addEventListener('click', function () {
                        // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
                        window.snap.pay(d.snapToken, {
                        onSuccess: function(result){
                            /* You may add your own implementation here */
                            alert("payment success!"); console.log(result);
                            window.status = 'success';
                            let transaction_data = 'package_id=' + paket_id  + "&offer_code=" + offer_code + "&transaction_id=" + d.transaction_id + '&status=' + window.status;
                            save_transaction(transaction_data);
                            $('#modalDetail').modal('hide');
                        },
                        onPending: function(result){
                            /* You may add your own implementation here */
                            alert("wating your payment!"); console.log(result);
                            window.status = 'pending';
                            let transaction_data = 'package_id=' + paket_id  + "&offer_code=" + offer_code + "&transaction_id=" + d.transaction_id + '&status=' + window.status;
                            save_transaction(transaction_data);
                            $('#modalDetail').modal('hide');
                        },
                        onError: function(result){
                            /* You may add your own implementation here */
                            alert("payment failed!"); console.log(result);
                        },
                        onClose: function(){
                            /* You may add your own implementation here */
                            alert('you closed the popup without finishing the payment');
                        }
                        })
                    // });
                    Swal.close();
                    console.log(window.status);
                },
                error: function(error) {
                    console.log(error);
                }
            });
    }

    function save_transaction(transaction_data){
        console.log(transaction_data);
        $.ajax({
            url: "<?= route_to('user.transaksi.save_transaction') ?>",
            type: "POST",
            data: transaction_data,
            success: function (d) {
                var d = JSON.parse(d);
                console.log(d);
                console.log('data berhasil disimpan ke database');
            }
        });
    }

    </script>
<?= $this->endSection() ?>