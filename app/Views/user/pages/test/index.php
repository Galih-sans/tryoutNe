<?= $this->extend('user/layout/app') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
  <div class="row items-push mt-4">
    <div class="block block-rounded shadow-sm bg-success">
      <div class="content content-full text-center pt-7 pb-5">
        <h1 class="h2 text-white mb-2">
          Raih Mimpimu Bersama Neoedukasi.
        </h1>
        <h2 class="h4 fw-normal text-white-75">
          kami menyediakan lebih dari 1000+ tryout untuk perkembangan kamu.
        </h2>
      </div>
    </div>
    <?php if ($data['testData'] == false) { ?>
      <div class="block block-rounded shadow-sm bg-success">
        <div class="content content-full text-center pt-5 pb-5">
          <h2 class="h3 fw-normal text-white-75">
            Belum ada test saat ini..
          </h2>
        </div>
      </div>
    <?php } else { ?>
      <div class="content content-boxed">
        <div class="row items-push">
          <?php foreach ($data['testData'] as $item) : ?>
            <!-- Course -->
            <?php if ($item->type == 'free') { ?>
            <!-- jika gratis langsung ke detail -->
            <div class="col-12 col-md-4 col-lg-3 col-xl-3">
              <!-- <a class="block block-rounded block-link-pop h-100 mb-0 detail-button"> -->
              <a class="block block-rounded block-link-pop h-100 mb-0" href="<?= route_to('user.test.view', strtr(base64_encode($data['encrypter']->encrypt($item->id)), array('+' => '.', '=' => '-', '/' => '~'))) ?>">
                <div class="block-content block-content-full ribbon ribbon-danger ribbon-left text-center bg-flat">
                  <div class="ribbon-box <?= ($item->type == 'free') ? 'd-none' : ''; ?>">
                    <?= $item->price ?> Diamond
                  </div>
                  <div class="item item-2x item-circle bg-white-10 py-3 my-3 mx-auto">
                    <i class="fab fa- fa-2x text-white-75"></i>
                  </div>
                  <div class="fs-sm text-white-75">
                    <?= $item->composition ?> Materi &bull; <?= $item->duration ?> Menit
                  </div>
                </div>
                <div class="block-content block-content-full">
                  <h4 class="h5 mb-1">
                    <?= $item->test_name ?>
                  </h4>
                  <div class="fs-sm text-muted"><?= date("d-m-Y H:i", $item->begin_time); ?></div>
                  <span class="badge badge-sm <?= ($item->type == 'free') ? 'bg-gradient-success' : 'bg-gradient-warning'; ?> "><?= $item->type ?></span>
                </div> 
              </a>
            </div>
            <?php } else { ?>
              <!-- jika berbayar muncul modal beli -->
              <div class="col-12 col-md-4 col-lg-3 col-xl-3">
              <a class="block block-rounded block-link-pop h-100 mb-0 detail-button" href="#" data-test_id="<?= strtr(base64_encode($data['encrypter']->encrypt($item->id)), array('+' => '.', '=' => '-', '/' => '~')) ?>" data-duration="<?= $item->duration ?>" data-composition="<?= $item->composition ?>" data-name="<?= $item->test_name ?>" data-price="<?= $item->price ?>" data-begin="<?= date("d M Y H:i", $item->begin_time); ?>">
                <div class="block-content block-content-full ribbon ribbon-danger ribbon-left text-center bg-flat">
                  <div class="ribbon-box <?= ($item->type == 'free') ? 'd-none' : ''; ?>">
                    <?= $item->price ?> Diamond
                  </div>
                  <div class="item item-2x item-circle bg-white-10 py-3 my-3 mx-auto">
                    <i class="fab fa- fa-2x text-white-75"></i>
                  </div>
                  <div class="fs-sm text-white-75">
                    <?= $item->composition ?> Materi &bull; <?= $item->duration ?> Menit
                  </div>
                </div>
                <div class="block-content block-content-full">
                  <h4 class="h5 mb-1">
                    <?= $item->test_name ?>
                  </h4>
                  <div class="fs-sm text-muted"><?= date("d-m-Y H:i", $item->begin_time); ?></div>
                  <span class="badge badge-sm <?= ($item->type == 'free') ? 'bg-gradient-success' : 'bg-gradient-warning'; ?> "><?= $item->type ?></span>
                </div>
              </a>
            </div>
            <?php } ?>
            <!-- END Course -->
          <?php
          endforeach; ?>
        <div class="modal fade" id="modalDetail" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body ">
                        <div class="text-right">
                        <i class="fa fa-close close" data-bs-dismiss="modal"></i>
                        </div>
                        <div class="px-3 py-4">
                          <h4 class="text-uppercase" id="nama-paket" name="nama">Nama Test</h4>
                          <h4 class="mt-5 theme-color mb-5" style="color:blue" id="description" name="deskripsi">Waktu</h4>
                          <span class="theme-color" style="color:blue">Rincian Test</span>
                          <div class="mb-3">
                              <hr class="new1">
                          </div>
                          <div class="d-flex justify-content-between">
                              <span class="font-weight-bold">Harga</span>
                              <span class="theme-color" style="color:blue" id="price" name="harga"></span>
                          </div>
                          <div class="d-flex justify-content-between">
                              <span class="font-weight-bold">Komposisi Soal</span>
                              <span class="text-muted" id="composition" name="komposisi"></span>
                          </div>
                          <div class="d-flex justify-content-between">
                              <span class="font-weight-bold">Durasi</span>
                              <span class="text-muted" id="duration" name="durasi"></span>
                          </div>
                          <div class="d-flex justify-content-between">
                              <span class="font-weight-bold">Maksimal Pengerjaan</span>
                              <span class="text-muted" id="duration" name="durasi"></span>
                          </div>
                          <div class="d-flex justify-content-between pb-3">
                            <span class="font-weight-bold">Kode Voucher :</span>
                            </div>
                            <div class="input-group">
                                <input type="text" id="input_kode_voucher" class="form-control" placeholder="Masukan Kode Voucher" autocomplete="off" name="kode_voucher" aria-label="Masukan Kode Voucher" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-info" type="button" onclick="cek_voucher()">Gunakan</button>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <small class="text-danger" id="error-string"></small>
                                <small class="text-success" id="success-string"></small>
                            </div>
                            <div class="d-flex justify-content-between">
                                <span class="font-weight-bold">Diskon</span>
                                <small class="text-success" id="discount"></small>
                            </div>
                            <div class="d-flex justify-content-between">
                                <span class="font-weight-bold">Total</span>
                                <span id="total" name="harga" class="font-weight-bold" style="color:blue"></span>
                            </div>  
                          </div>
                          <!-- <span class="theme-color" style="color:blue">( note : Dengan masuk test, anda akan menggunakan diamond berdasarkan jumlah tertera, jika sudah membeli diamon tidak akan berkurang )</span> -->
                          <div class="text-center mt-5">
                              <button class="btn btn-primary buy_premium" data-test_id="<?= $item->id ?>" >Beli</button>
                          </div>                   
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
        </div>
      </div>
      <!-- END Page Content -->
  </div>
</div>
<script>
      $(document).ready(function() {
        $(document).on('click', '.detail-button', function() {
          // sblm muncul cek apakah sudah beli, jika sudah langsung ke pengerjaan / result
            let test_id = $(this).data("test_id");
            let data_name = $(this).data("name");
            // let data_amount = $(this).data("amount");
            let data_price = $(this).data("price");
            let data_begin = $(this).data("begin"); 
            let data_duration = $(this).data("duration"); 
            let data_composition = $(this).data("composition"); 

            cek_test_transaction(test_id);
            window.test_id = test_id;
            window.price = data_price;
            // window.test_id = test_id;
            // console.log(test_id);
            // window.price = data_price;
            // // console.log(data_id);
            // $('#test_id').text(test_id);
            $('#number_of_question').text(data_duration);
            $('#duration').text(data_duration + ' Menit');
            $('#nama-paket').text(data_name);
            $('#composition').text(data_composition + ' Materi');
            $('#price').text(data_price + ' Diamond');
            $('#total').text(data_price + ' Diamond'); // harga - diskon
            $('#description').text(data_begin);
            $('#discount').text('-');
            $('#input_kode_voucher').val('');
            window.code_offer = 'undefined';
            window.finalPrice = 'undefined';
            
            const list = document.getElementById("error-string");
                while (list.hasChildNodes()) {
                list.removeChild(list.firstChild);
            }
            const list2 = document.getElementById("success-string");
                while (list2.hasChildNodes()) {
                    list2.removeChild(list2.firstChild);
            }
        });

        $(document).on('click', '.buy_premium', function() {
        	let test_id = $(this).data("test_id");
          buy_test(test_id);
        });
    });

    function cek_test_transaction(test_id){
    // 
    $.ajax({
      url: "<?= route_to('user.test.cek_test_transaction') ?>",
      type: "POST",
      data: 'test_id=' + test_id,
      success: function(d) {
        var d = JSON.parse(d);
        if (d.success == true) {
        document.location.href = '/test/detail/' + test_id;
        } else {  
        $('#modalDetail').modal('show');
        console.log(d);
        }
      },
      error: function(error) {
        console.log(error);
      }
    });
    }

    function cek_voucher() {
      console.log('cek voucher');
        let data_price = window.price;
        let test_id = window.test_id;
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
                url: "<?= route_to('user.test.check_voucher') ?>",
                type: "POST",
                data: 'kode_voucher=' + $("input[name=kode_voucher]").val()  + "&test_id=" + test_id,
                success: function(d) {
                    var d = JSON.parse(d);
                    if (d.success == true) {
                        $('#success-string').append().text(d.string);
                        $('#discount').text('Rp' + d.potongan);
                        $('#total').text('Rp' + (data_price - d.potongan));
                        window.finalPrice = (data_price - d.potongan);
                    } else {
                        $('#error-string').append().text(d.string);
                        $('#discount').text('-');
                        $('#total').text('Rp' + data_price);
                        window.finalPrice = 'undefined';
                    }
                    // console.log(d);
                    window.code_offer = d.code; 
                    console.log(window.code_offer);
                    console.log(d);
                    console.log(window.finalPrice);
                    console.log('total=' + (data_price - d.potongan));
                },
                error: function(error) {
                    console.log(error);
                }
            });
    }

    function buy_test(test_id){
      $.ajax({
                url: "<?= route_to('user.test.buy_test') ?>",
                type: "POST",
                data: 'test_id=' + test_id + "&final_price=" + window.finalPrice + "&kode_voucher=" + window.code_offer,
                success: function(d) {
                    var d = JSON.parse(d);
                    if (d.success == true) {
                      // jika sudah beli langsung ke detail
                      var data = '';
                      data+='';
                      Swal.fire({
                      title: 'Test Terbeli',
                      icon: 'info',
                      html: data,
                      showCloseButton: true,
                      showCancelButton: false,
                      confirmButtonText: 'Ok',
                      confirmButtonColor: "#198754"
                      });
                      window.location.reload();
                      $('#modalDetail').modal('hide');
                      // alert('terbeli');
                    } else {
                      if (d.messege == 'Diamond Kurang') {
                        // diamond kurang
                        $('#modalDetail').modal('hide');
                        var data = '';
                        data+='';
                        Swal.fire({
                        title: 'Diamond Anda Tidak Mencukupi',
                        icon: 'warning',
                        html: data,
                        showCloseButton: true,
                        showCancelButton: false,
                        confirmButtonText: 'Ok',
                        confirmButtonColor: "#198754"
                        });
                        window.location.reload();
                      } else {
                        // gagal transaksi
                        $('#modalDetail').modal('hide');
                        console.log(d);
                        var data = '';
                        data+='';
                        Swal.fire({
                        title: 'Test Gagal Terbeli',
                        icon: 'error',
                        html: data,
                        showCloseButton: true,
                        showCancelButton: false,
                        confirmButtonText: 'Ok',
                        confirmButtonColor: "#198754"
                        });
                        window.location.reload();
                      }
                    }
                    console.log(d);
                },
                error: function(error) {
                    console.log(error);
                }
            });
    };

</script>
<?= $this->endSection() ?>