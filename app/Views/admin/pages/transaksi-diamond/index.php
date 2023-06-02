<?= $this->extend('admin/layout/app') ?>
<?= $this->section('header') ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
<link rel="stylesheet" href="<?= base_url('css/datatables/dataTables.bootstrap4.css') ?>">
<link rel="stylesheet" href="<?= base_url('css/datatables/buttons-bs4/buttons.bootstrap4.min.css') ?>">
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.1/umd/popper.min.js" integrity="sha512-8jeQKzUKh/0pqnK24AfqZYxlQ8JdQjl9gGONwGwKbJiEaAPkD3eoIjz3IuX4IrP+dnxkchGUeWdXLazLHin+UQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="content">
    <div class="block block-rounded pb-2 shadow-sm">
        <div class="block-header block-header-default">
            <h3 class="block-title">
                Daftar Transaksi Diamond <small></small>
            </h3>
            <div class="block-options">
                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="fullscreen_toggle"></button>
                <button type="button" id="refresh" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                    <i class="si si-refresh"></i>
                </button>
            </div>
        </div>
        <div class="block-content fs-sm">
            <!-- <div class="row pb-2 mb-3 shadow-sm align-center">
                <div class="col-12 col-md-12 text-right">
                    <button type="button" class="btn btn-primary btn-sm" onclick="tambah()">
                        <i class="si si-plus"></i> Tambah Transaksi
                    </button>
                </div>
            </div> -->
            <table id="example" class="table table-bordered table-vcenter js-dataTable-full no-footer dtr-inline collapsed" style="width:100%">
                <thead>
                    <tr>
                        <th width="10%" class="fs-sm fw-normal">#</th>
                        <th width="20%" class="fs-sm fw-normal">Siswa</th>
                        <th width="20%" class="fs-sm fw-normal">Paket</th>
                        <th width="20%" class="fs-sm fw-normal">Diskon</th>
                        <th width="10%" class="fs-sm fw-normal">Id Transaksi</th>
                        <th width="10%" class="fs-sm fw-normal">Status</th>
                        <th width="20%" class="fs-sm fw-normal">Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
<!-- <div class="modal fade" id="tambahOfferModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="block block-rounded block-transparent mb-0">
                <div class="block-header block-header-ne">
                    <h3 class="block-title text-white">Tambah Transaksi : </h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option-white" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content fs-sm">
                    <form id="tambah_transaksi_form">
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <div class="col-12 col-md-12 py-2">
                                    <span class="color-ne" style="letter-spacing: -em">
                                        <meta charset="utf-8">⋮⋮⋮
                                    </span> &nbsp;
                                    <span class="tittle-neo"> Pilih Siswa</span>
                                    <div class=" mb-4 pt-2">
                                        <select name="siswa" id="siswa" title="Please select..." class="form-control selectpicker border" data-live-search="true" data-style="customSelect" data-dropup-auto="false" data-size="4">
                                            <?php if ($data['daftarSiswa']) : ?>
                                                <?php foreach ($data['daftarSiswa'] as $siswa) : ?>
                                                    <tr>
                                                        <option value="<?= $siswa->id ?>"><?= $siswa->full_name ?>
                                                        </option>
                                                    </tr>
                                            <?php
                                                endforeach;
                                            endif; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-12">
                                <div class="col-12 col-md-12 py-2">
                                    <span class="color-ne" style="letter-spacing: -em">
                                        <meta charset="utf-8">⋮⋮⋮
                                    </span> &nbsp;
                                    <span class="tittle-neo"> Pilih Paket</span>
                                    <div class=" mb-4 pt-2">
                                        <select name="paket" id="paket" title="Please select..." class="form-control selectpicker border" data-live-search="true" data-style="customSelect" data-dropup-auto="false" data-size="4">
                                            <?php if ($data['daftarPaket']) : ?>
                                                <?php foreach ($data['daftarPaket'] as $paket) : ?>
                                                    <tr>
                                                        <option value="<?= $paket->id ?>"><?= $paket->name ?>
                                                        </option>
                                                    </tr>
                                            <?php
                                                endforeach;
                                            endif; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-12">
                                <div class="col-12 col-md-12 py-2">
                                    <span class="color-ne" style="letter-spacing: -em">
                                        <meta charset="utf-8">⋮⋮⋮
                                    </span> &nbsp;
                                    <span class="tittle-neo"> Pilih Diskon</span>
                                    <div class=" mb-4 pt-2">
                                        <select name="offer" id="offer" title="Please select..." class="form-control selectpicker border" data-live-search="true" data-style="customSelect" data-dropup-auto="false" data-size="4">
                                            <?php if ($data['daftarOffer']) : ?>
                                                <?php foreach ($data['daftarOffer'] as $offer) : ?>
                                                    <tr>
                                                        <option value="<?= $offer->id ?>"><?= $offer->name ?>
                                                        </option>
                                                    </tr>
                                            <?php
                                                endforeach;
                                            endif; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-12">
                                <div class="col-12 col-md-12 py-2">
                                    <span class="color-ne" style="letter-spacing: -em">
                                        <meta charset="utf-8">⋮⋮⋮
                                    </span> &nbsp;
                                    <span class="tittle-neo"> ID Transaksi</span>
                                    <div class=" mb-4 pt-2">
                                        <input type="text" class="form-control" id="id-transaksi" name="id_transaksi">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-12">
                                <div class="col-12 col-md-12 py-2">
                                    <span class="color-ne" style="letter-spacing: -em">
                                        <meta charset="utf-8">⋮⋮⋮
                                    </span> &nbsp;
                                    <span class="tittle-neo"> Status</span>
                                    <div class=" mb-4 pt-2">
                                        <input type="text" class="form-control" id="status" name="status">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="block-content block-content-full text-end bg-body">
                    <button type="button" class="btn btn-sm btn-secondary me-1" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal" onclick="insert_data()">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</div> -->
<div class="modal fade" id="editTransaksiDiamondModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="block block-rounded block-transparent mb-0">
                <div class="block-header block-header-ne">
                    <h3 class="block-title text-white">Edit Transaksi : </h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option-white" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content fs-sm">
                    <form id="edit_transaksi_form">
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <div class="col-12 col-md-12 py-2">
                                    <span class="color-ne" style="letter-spacing: -em">
                                        <meta charset="utf-8">⋮⋮⋮
                                    </span> &nbsp;
                                    <span class="tittle-neo"> Edit Siswa</span>
                                    <div class=" mb-4 pt-2">
                                        <input type="hidden" id="edit-id" name="id">
                                        <select name="edit_siswa" id="edit-siswa" title="Pilih Siswa..." class="form-control selectpicker border" data-live-search="true" data-style="customSelect" data-dropup-auto="false" data-size="4">
                                            <?php if ($data['daftarSiswa']) : ?>
                                                <?php foreach ($data['daftarSiswa'] as $siswa) : ?>
                                                    <tr>
                                                        <option value="<?= $siswa->id ?>"><?= $siswa->full_name ?>
                                                        </option>
                                                    </tr>
                                            <?php
                                                endforeach;
                                            endif; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-md-12">
                                <div class="col-12 col-md-12 py-2">
                                    <span class="color-ne" style="letter-spacing: -em">
                                        <meta charset="utf-8">⋮⋮⋮
                                    </span> &nbsp;
                                    <span class="tittle-neo"> Edit Paket</span>
                                    <div class=" mb-4 pt-2">
                                        <select name="edit_paket" id="edit-paket" title="Pilih Paket..." class="form-control selectpicker border" data-live-search="true" data-style="customSelect" data-dropup-auto="false" data-size="4">
                                            <?php if ($data['daftarPaket']) : ?>
                                                <?php foreach ($data['daftarPaket'] as $paket) : ?>
                                                    <tr>
                                                        <option value="<?= $paket->id ?>"><?= $paket->name ?>
                                                        </option>
                                                    </tr>
                                            <?php
                                                endforeach;
                                            endif; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-12">
                                <div class="col-12 col-md-12 py-2">
                                    <span class="color-ne" style="letter-spacing: -em">
                                        <meta charset="utf-8">⋮⋮⋮
                                    </span> &nbsp;
                                    <span class="tittle-neo"> Edit Diskon</span>
                                    <div class=" mb-4 pt-2">
                                        <select name="edit_offer" id="edit-offer" title="Pilih Diskon..." class="form-control selectpicker border" data-live-search="true" data-style="customSelect" data-dropup-auto="false" data-size="4">
                                            <?php if ($data['daftarOffer']) : ?>
                                                <?php foreach ($data['daftarOffer'] as $offer) : ?>
                                                    <tr>
                                                        <option value="<?= $offer->id ?>"><?= $offer->name ?>
                                                        </option>
                                                    </tr>
                                            <?php
                                                endforeach;
                                            endif; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-12">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                        <span class="color-ne" style="letter-spacing: -em">
                                            <meta charset="utf-8">⋮⋮⋮
                                        </span> &nbsp;
                                        <span class="tittle-neo"> Edit ID Transaksi</span>
                                        <div class=" mb-4 pt-2">
                                            <input type="text" class="form-control" id="edit-id-transaksi" name="edit_id_transaksi">
                                        </div>
                                </div>
                                <div class="col-12 col-md-6">
                                        <span class="color-ne" style="letter-spacing: -em">
                                            <meta charset="utf-8">⋮⋮⋮
                                        </span> &nbsp;
                                        <span class="tittle-neo"> Edit Status</span>
                                        <div class="mb-4 pt-2">
                                            <input type="text" class="form-control" id="edit-status" name="edit_status">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="block-content block-content-full text-end bg-body">
                    <button type="button" class="btn btn-sm btn-secondary me-1" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal" onclick="update_data()">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/bootstrap-select.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
<script src="<?= base_url('css/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('css/datatables/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?= base_url('css/datatables/buttons/dataTables.buttons.min.js') ?>"></script>
<script src="<?= base_url('css/datatables/buttons/buttons.print.min.js') ?>"></script>
<script src="<?= base_url('css/datatables/buttons/buttons.html5.min.js') ?>"></script>
<script src="<?= base_url('css/datatables/buttons/buttons.flash.min.js') ?>"></script>
<script src="<?= base_url('css/datatables/buttons/buttons.colVis.min.js') ?>"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>

<!-- Page JS Code -->
<script src="<?= base_url('js/pages/tables_datatables.js') ?>"></script>
<script>
    $(document).ready(function() {
        show_dt_class();
        $('#refresh').on('click', refresh_dt)
        $(document).on('click', '.delete-button', function() {
            let id = $(this).data("id");
            // console.log(id);
            delete_data(id);
        });
        $(document).on('click', '.edit-button', function() {
            let data_id = $(this).data("id");
            // let data_full_name = $(this).data("full_name");
            // let data_package_name = $(this).data("package_name");
            // let data_offer_name = $(this).data("offer_name");
            let data_transaction_id = $(this).data("transaction_id");
            let data_status = $(this).data("status");

            $('#edit-id').val(data_id);
            // $('#edit-siswa').val(data_full_name);
            // $('#edit-paket').val(data_package_name);
            // $('#edit-offer').val(data_offer_name);
            $('#edit-id-transaksi').val(data_transaction_id);
            $('#edit-status').val(data_status);

            $('#editTransaksiDiamondModal').modal('show');

        });
    });

    function delete_data(id) {
        Swal.fire({
            title: 'Yakin Menghapus Data ini?',
            text: "data akan dihapus dan tidak dapat dikembalikan",
            icon: 'info',
            showCloseButton: true,
            showCancelButton: true,
            cancelButtonText: 'Batal',
            confirmButtonText: 'Ya, hapus data ini',
            confirmButtonColor: "#d26a5c"
        }).then((result) => {
            if (result.value) {
                Swal.fire({
                    showCloseButton: false,
                    showCancelButton: false,
                    showConfirmButton: false,
                    allowOutsideClick: false,
                    customClass: 'col-5 col-md-3',
                    imageUrl: 'https://udindym.site/loader-c.gif',
                    text: 'Silahkan Tunggu...',
                })
                $.ajax({
                    url: "<?= route_to('admin.transaksi-diamond.remove_diamond_transaction') ?>",
                    type: "POST",
                    data: {
                        id: id,
                    },
                    success: function(d) {
                        var d = JSON.parse(d);
                        Swal.fire({
                            title: 'Status :',
                            text: d.message,
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 3000
                        });
                        window.location.reload();
                        refresh_dt();
                    },
                    error: function(error) {
                        console.log(error);
                        Swal.close();
                    }
                });
            }
        });
    }

    function refresh_dt() {
        show_dt_class();
    }

    function tambah() {
        $('#tambahOfferModal').modal('show');
        // $('.selectpicker').selectpicker('refresh');
        $('#tambah_transaksi_form')[0].reset();
    }

    function insert_data() {
        // console.log($('#tambah_transaksi_form').serialize());
        Swal.fire({
            text: "Sedang Memproses Data",
            allowOutsideClick: false,
        });
        Swal.showLoading();
        $.ajax({
            url: "<?= route_to('admin.transaksi-diamond.add_diamond_transaction') ?>",
            type: "POST",
            data: $('#tambah_transaksi_form').serialize(),
            success: function(d) {
                var d = JSON.parse(d);
                if (d.success == true) {
                    Swal.fire({
                        title: 'Status :',
                        text: d.message,
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 3000
                    });
                } else {
                    Swal.fire({
                        title: 'Status :',
                        html: d.message +
                            '<br>' + JSON.stringify(d.validation),
                        icon: 'error',
                        showConfirmButton: false
                    });
                }
                window.location.reload();
                console.log(d);
                refresh_dt();
            },
            error: function(error) {
                console.log(error);
            }
        });
    }

    function update_data() {
        // console.log($('#edit_transaksi_form').serialize());
        Swal.fire({
            text: "Sedang Memproses Data",
            allowOutsideClick: false,
        });
        Swal.showLoading();
        $.ajax({
            url: "<?= route_to('admin.transaksi-diamond.update_diamond_transaction') ?>",
            type: "POST",
            data: $('#edit_transaksi_form').serialize(),
            success: function(d) {
                var d = JSON.parse(d);
                if (d.success == true) {
                    Swal.fire({
                        title: 'Status :',
                        text: d.message,
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 3000
                    });
                } else {
                    Swal.fire({
                        title: 'Status :',
                        html: d.message +
                            '<br>' + JSON.stringify(d.message),
                        icon: 'error',
                        showConfirmButton: false
                    });
                }
                window.location.reload();
                console.log(d);
                refresh_dt();
            },
            error: function(error) {
                console.log(error);
            }
        });
    }

    function show_dt_class() {
        $('#example').DataTable({
            oLanguage: {
                sProcessing: '<div class="spinner-border neo" role="status"><span class="sr-only"></span></div>'
            },
            dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center mx-0 yx-0'B><'col-sm-4'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-6'i><'col-sm-6'p>>",
            buttons: [{
                    extend: 'copy',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4]
                    },
                    className: 'fs-sm btn btn-sm btn-outline-secondary glyphicon glyphicon-duplicate',
                    text: '<i class="fa-sharp fa-solid fa-copy "></i>',
                    titleAttr: 'Copy'
                },
                {
                    extend: 'excel',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4]
                    },
                    className: 'fs-sm btn btn-sm btn-outline-success glyphicon glyphicon-list-alt',
                    text: '<i class="fa-sharp fa-solid fa-file-excel "></i>',
                    titleAttr: 'Excel'
                },

                {
                    extend: 'print',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4]
                    },
                    className: 'fs-sm btn btn-sm btn-outline-primary glyphicon glyphicon-print',
                    text: '<i class="fa-sharp fa-solid fa-print "></i>',
                    titleAttr: 'PRINT'
                },
                {
                    extend: 'pdf',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4]
                    },
                    className: 'fs-sm btn btn-sm btn-outline-danger glyphicon glyphicon-file',
                    text: '<i class="fa-sharp fa-solid fa-file-pdf "></i>',
                    titleAttr: 'PDF'
                },
            ],
            serverSide: true,
            processing: true,
            bDestroy: true,
            bPaginate: true,
            pagination: true,
            searching: true,
            bInfo: true,
            tInfo: true,
            pagingType: "full_numbers",
            paging: true,
            lengthMenu: [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, 'All'],
            ],
            columnDefs: [{ // jumlah harus sesuai jumlah th
                targets: [0, 2],
                orderable: false,
                className: "text-center",
            }, {
                width: "15%",
                targets: [2],
            }, ],
            ajax: {
                url: "<?= route_to('admin.transaksi-diamond.dt_diamond_transaction') ?>",
                type: "POST",
                data: {},
                error: function() { // error handling
                    $(".tabel_serverside-error").html("");
                    $("#tabel_serverside").append(
                        '<tbody class="tabel_serverside-error"><tr><th colspan="3">Data Tidak Ditemukan di Server</th></tr></tbody>'
                    );
                    $("#tabel_serverside_processing").css("display", "none");
                }
            },
            initComplete: function(settings, json) {
                $('div.dataTables_length select').addClass('selectpicker border');
                $('.selectpicker').selectpicker();
            }

        })
    };
</script>

<?= $this->endSection() ?>