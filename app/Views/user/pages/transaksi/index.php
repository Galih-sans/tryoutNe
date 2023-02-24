<?= $this->extend('user/layout/app') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 mt-4">
            <div class="bg-warning card">
                <div class="card-header pb-3 px-3">
                    <h6 class="mb-0">Paket Promo</h6>
                    <!-- <button class="text-right btn btn-danger">Add to cart</button> -->
                </div>
                <div class="content content-boxed">
                    <div class="row items-push">
                        <!-- product card -->
                        <div class="col-12 col-md-4 col-lg-3 col-xl-3">
                            <div class="height d-flex justify-content-center align-items-center">
                                <div class="card p-3 pb-0">
                                    <h5 class="">Blanda Matt</h5>
                                    <div class="d-flex justify-content-between align-items-center ">
                                        <div class="image">
                                            <img src="https://i.imgur.com/MGorDUi.png" width="200">
                                        </div>
                                    </div>
                                    <p>A great option weather you are at office or at home. </p>
                                    <h5 class="">Rp. 50.000 - Rp. 79.000</h5>
                                    <button class="btn detail-product" style="background-color: #611BBD; color: white;">Lihat Selengkapnya</button>
                                </div>
                            </div>
                        </div>
                        <!-- end of product card -->
                        <div class="col-12 col-md-4 col-lg-3 col-xl-3">
                            <div class="height d-flex justify-content-center align-items-center">
                                <div class="card p-3 pb-0">
                                    <h5 class="">Blanda Matt</h5>
                                    <div class="d-flex justify-content-between align-items-center ">
                                        <div class="image">
                                            <img src="https://i.imgur.com/MGorDUi.png" width="200">
                                        </div>
                                    </div>
                                    <p>A great option weather you are at office or at home. </p>
                                    <h5 class="">Rp. 50.000 - Rp. 79.000</h5>
                                    <button class="btn detail-product" style="background-color: #611BBD; color: white;">Lihat Selengkapnya</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 col-lg-3 col-xl-3">
                            <div class="height d-flex justify-content-center align-items-center">
                                <div class="card p-3 pb-0">
                                    <h5 class="">Blanda Matt</h5>
                                    <div class="d-flex justify-content-between align-items-center ">
                                        <div class="image">
                                            <img src="https://i.imgur.com/MGorDUi.png" width="200">
                                        </div>
                                    </div>
                                    <p>A great option weather you are at office or at home. </p>
                                    <h5 class="">Rp. 50.000 - Rp. 79.000</h5>
                                    <button class="btn detail-product" style="background-color: #611BBD; color: white;">Lihat Selengkapnya</button>
                                </div>
                            </div>
                        </div>
                        <!-- modal detail produk -->
                        <div class="modal fade" id="detailModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                                <div class="modal-content">
                                    <div class="block block-rounded block-transparent mb-0">
                                        <div class="block-header block-header-ne">
                                            <h3 class="block-title text-white">Detail Produk : </h3>
                                            <div class="block-options">
                                                <button type="button" class="btn-block-option-white" data-bs-dismiss="modal" aria-label="Close">
                                                    <i class="fa fa-fw fa-times"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="block-content fs-sm">
                                            <form id="detail_siswa_form">
                                                <table>
                                                    <tr>
                                                        <th>Nama</th>
                                                        <td><input type="text" class="form-control" id="test_name" disabled></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Harga</th>
                                                        <td><input type="text" class="form-control" id="score" disabled></td>
                                                    </tr>
                                                </table>
                                            </form>
                                        </div>
                                        <div class="block-content block-content-full text-end bg-body">
                                            <button type="button" class="btn btn-sm btn-success me-1">Beli</button>
                                            <button type="button" class="btn btn-sm btn-secondary me-1" data-bs-dismiss="modal">Tutup</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end of modal -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $(document).on('click', '.detail-product', function() {
            // let test_name = $(this).attr("test_name");
            // let begin_time = $(this).attr("begin_time");
            // let score = $(this).attr("score");
            // let right_answer = $(this).attr("right_answer");
            // let wrong_answer = $(this).attr("wrong_answer");
            // let test_class = $(this).attr("test_class");

            // $('#test_name').val(test_name);
            // $('#begin_time').val(begin_time);
            // $('#score').val(score);
            // $('#right_answer').val(right_answer + " Soal");
            // $('#wrong_answer').val(wrong_answer + " Soal");
            // $('#test_class').val(test_class);


            $('#detailModal').modal('show');
        });
    });
</script>
<?= $this->endSection() ?>