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
                Daftar Diskon <small></small>
            </h3>
            <div class="block-options">
                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="fullscreen_toggle"></button>
                <button type="button" id="refresh" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                    <i class="si si-refresh"></i>
                </button>
            </div>
        </div>
        <div class="block-content fs-sm">
            <div class="row pb-2 mb-3 shadow-sm align-center">
                <div class="col-12 col-md-12 text-right">
                    <button type="button" class="btn btn-primary btn-sm" onclick="tambah()">
                    <i class="fa-solid fa-plus"></i>
                    </button>
                </div>
            </div>
            <table id="example" class="table table-bordered table-vcenter js-dataTable-full no-footer dtr-inline collapsed" style="width:100%">
                <thead>
                    <tr>
                        <th width="10%" class="fs-sm fw-normal">#</th>
                        <th width="10%" class="fs-sm fw-normal">Nama</th>
                        <th width="10%" class="fs-sm fw-normal">Type</th>
                        <th width="10%" class="fs-sm fw-normal">Kode Diskon</th>
                        <th width="5%" class="fs-sm fw-normal">Jumlah Diskon</th>
                        <th width="5%" class="fs-sm fw-normal">Persen Diskon</th>
                        <th width="20%" class="fs-sm fw-normal">Tanggal Mulai</th>
                        <th width="20%" class="fs-sm fw-normal">Tanggal Selesai</th>
                        <th width="10%" class="fs-sm fw-normal">Status</th>
                        <!-- <th width="40%" class="fs-sm fw-normal">Deskripsi</th> -->
                        <th width="10%" class="fs-sm fw-normal">Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
<div class="modal fade" id="tambahOfferModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="block block-rounded block-transparent mb-0">
                <div class="block-header block-header-ne">
                    <h3 class="block-title text-white">Tambah Diskon : </h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option-white" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content fs-sm">
                    <form id="tambah_offer_form">
                        <div class="row">
                            <div class="col-12 col-md-12">
                                    <span class="color-ne" style="letter-spacing: -em">
                                        <meta charset="utf-8">⋮⋮⋮
                                    </span> &nbsp;
                                    <span class="tittle-neo"> Nama</span>
                                    <div class="mb-4 pt-2">
                                        <input type="text" class="form-control" id="name" name="name">
                                    </div>
                            </div>
                                <div class="col-12 col-md-12">
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                        <span class="color-ne" style="letter-spacing: -em">
                                            <meta charset="utf-8">⋮⋮⋮
                                            </span> &nbsp;
                                        <span class="tittle-neo"> Tipe Offer</span>
                                            <select name="type" id="type" title="Pilih Tipe Diskon..." class="form-control selectpicker" data-live-search="true" data-style="customSelect" data-dropup-auto="false" data-size="4">
                                                <tr>
                                                    <option value="diamond">Diamond</option>
                                                    <!-- <option value="inactive">Inactive</option> -->
                                                </tr>
                                            </select>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <span class="color-ne" style="letter-spacing: -em">
                                                <meta charset="utf-8">⋮⋮⋮
                                            </span> &nbsp;
                                            <span class="tittle-neo"> Kode Offer</span>
                                            <button type="button" class="btn btn-sm btn-success float-right random-string">Buat Kode</button>
                                        <div class="mb-4 pt-2">
                                            <input type="text" class="form-control" id="code" name="code">
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-12">
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <span class="color-ne" style="letter-spacing: -em">
                                                <meta charset="utf-8">⋮⋮⋮
                                            </span> &nbsp;
                                            <span class="tittle-neo"> Tanggal Mulai</span>
                                            <div class="mb-4 pt-2">
                                                <div class="form-group date" data-provide="datepicker">
                                                    <input name="start_date" id="start_date" type="text" class="form-control datepicker">
                                                    <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <span class="color-ne" style="letter-spacing: -em">
                                                <meta charset="utf-8">⋮⋮⋮
                                            </span> &nbsp;
                                            <span class="tittle-neo"> Tanggal Selesai</span>
                                            <div class="mb-4 pt-2">
                                                <div class="form-group date" data-provide="datepicker">
                                                    <input name="end_date" id="end_date" type="text" class="form-control datepicker">
                                                    <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                                <div class="col-12 col-md-12">
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <span class="color-ne" style="letter-spacing: -em">
                                                <meta charset="utf-8">⋮⋮⋮
                                            </span> &nbsp;
                                            <span class="tittle-neo"> Jumlah Diskon</span>
                                            <div class="mb-4 pt-2">
                                                <input type="text" class="form-control" id="discount-amount" name="discount_amount">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <span class="color-ne" style="letter-spacing: -em">
                                                <meta charset="utf-8">⋮⋮⋮
                                            </span> &nbsp;
                                            <span class="tittle-neo"> Persen Diskon</span>
                                            <div class="mb-4 pt-2">
                                                <input type="text" class="form-control" id="discount-percentage" name="discount_percentage">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-12">
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <span class="color-ne" style="letter-spacing: -em">
                                                <meta charset="utf-8">⋮⋮⋮
                                            </span> &nbsp;
                                            <span class="tittle-neo"> Status</span>
                                            <div class=" mb-4 pt-2">
                                                <select name="status" id="status" title="Please select..." class="form-control selectpicker" data-live-search="true" data-style="customSelect" data-dropup-auto="false" data-size="4">
                                                    <tr>
                                                        <option value="active">Active</option>
                                                        <option value="inactive">Inactive</option>
                                                    </tr>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <span class="color-ne" style="letter-spacing: -em">
                                                <meta charset="utf-8">⋮⋮⋮
                                            </span> &nbsp;
                                            <span class="tittle-neo"> Deskripsi</span>
                                            <div class="mb-4 pt-2">
                                                <textarea type="text" class="form-control" id="description" name="description"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-12 mb-2 text-danger">
                                    <ul id="error-string">
                                </div>
                        </div>
                    </form>
                </div>
                <div class="block-content block-content-full text-end bg-body">
                    <button type="button" class="btn btn-sm btn-secondary me-1" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-sm btn-primary" onclick="insert_data()">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="editOfferModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="block block-rounded block-transparent mb-0">
                <div class="block-header block-header-ne">
                    <h3 class="block-title text-white">Edit Diskon : </h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option-white" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content fs-sm">
                    <form id="edit_role_form">
                        <div class="row">
                            <div class="col-12 col-md-12">
                                    <span class="color-ne" style="letter-spacing: -em">
                                        <meta charset="utf-8">⋮⋮⋮
                                    </span> &nbsp;
                                    <span class="tittle-neo"> Nama</span>
                                    <div class="mb-4 pt-2">
                                        <input type="hidden" id="id-offer" name="offer_id">
                                        <input type="text" class="form-control" id="edit-name" name="edit_name">
                                    </div>
                            </div>
                                <div class="col-12 col-md-12">
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                        <span class="color-ne" style="letter-spacing: -em">
                                            <meta charset="utf-8">⋮⋮⋮
                                            </span> &nbsp;
                                        <span class="tittle-neo"> Tipe Offer</span>
                                            <select name="edit_type" id="edit-type" title="Pilih Tipe Diskon..." class="form-control selectpicker" data-live-search="true" data-style="customSelect" data-dropup-auto="false" data-size="4">
                                                <tr>
                                                    <option value="diamond">Diamond</option>
                                                </tr>
                                            </select>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <span class="color-ne" style="letter-spacing: -em">
                                                <meta charset="utf-8">⋮⋮⋮
                                            </span> &nbsp;
                                            <span class="tittle-neo"> Kode Offer</span>
                                            <!-- <button type="button" class="btn btn-sm btn-success float-right random-string">Buat Kode</button> -->
                                        <div class="mb-4 pt-2">
                                            <input type="text" class="form-control" id="edit-code" name="edit_code">
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-12">
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <span class="color-ne" style="letter-spacing: -em">
                                                <meta charset="utf-8">⋮⋮⋮
                                            </span> &nbsp;
                                            <span class="tittle-neo"> Tanggal Mulai</span>
                                            <div class="mb-4 pt-2">
                                                <div class="form-group date" data-provide="datepicker">
                                                    <input name="edit_start_date" id="edit-start-date" type="text" class="form-control datepicker">
                                                    <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <span class="color-ne" style="letter-spacing: -em">
                                                <meta charset="utf-8">⋮⋮⋮
                                            </span> &nbsp;
                                            <span class="tittle-neo"> Tanggal Selesai</span>
                                            <div class="mb-4 pt-2">
                                                <div class="form-group date" data-provide="datepicker">
                                                    <input name="edit_end_date" id="edit-end-date" type="text" class="form-control datepicker">
                                                    <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                                <div class="col-12 col-md-12">
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <span class="color-ne" style="letter-spacing: -em">
                                                <meta charset="utf-8">⋮⋮⋮
                                            </span> &nbsp;
                                            <span class="tittle-neo"> Jumlah Diskon</span>
                                            <div class="mb-4 pt-2">
                                                <input type="text" class="form-control" id="edit-discount-amount" name="edit_discount_amount">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <span class="color-ne" style="letter-spacing: -em">
                                                <meta charset="utf-8">⋮⋮⋮
                                            </span> &nbsp;
                                            <span class="tittle-neo"> Persen Diskon</span>
                                            <div class="mb-4 pt-2">
                                                <input type="text" class="form-control" id="edit-discount-percentage" name="edit_discount_percentage">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-12">
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <span class="color-ne" style="letter-spacing: -em">
                                                <meta charset="utf-8">⋮⋮⋮
                                            </span> &nbsp;
                                            <span class="tittle-neo"> Status</span>
                                            <div class=" mb-4 pt-2">
                                                <select name="edit_status" id="edit-status" title="Please select..." class="form-control selectpicker status-offer" data-live-search="true" data-style="customSelect" data-dropup-auto="false" data-size="4">
                                                    <option value=""></option>
                                                    <tr>
                                                        <option value="active">Active</option>
                                                        <option value="inactive">Inactive</option>
                                                    </tr>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <span class="color-ne" style="letter-spacing: -em">
                                                <meta charset="utf-8">⋮⋮⋮
                                            </span> &nbsp;
                                            <span class="tittle-neo"> Deskripsi</span>
                                            <div class="mb-4 pt-2">
                                                <textarea type="text" class="form-control" id="edit-description" name="edit_description"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-12 mb-2 text-danger">
                                    <ul id="error-string-edit">
                                </div>
                        </div>
                    </form>
                </div>
                <div class="block-content block-content-full text-end bg-body">
                    <button type="button" class="btn btn-sm btn-secondary me-1" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-sm btn-primary" onclick="update_data()">Simpan</button>
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
        $('.datepicker').flatpickr({
            enableTime: true,
            dateFormat: "Y/m/d h:i",
        });
        show_dt_class();
        $('#refresh').on('click', refresh_dt)
        $(document).on('click', '.delete-button', function() {
            let id = $(this).data("id");
            delete_data(id);
        });

        $(document).on('click', '.random-string', function() {
            let length = 10;
            rand_string(length);
        });

        $(document).on('click', '.edit-button', function() {
            let data_id = $(this).data("id");
            console.log(data_id);
            let data_name = $(this).data("name");
            let data_type = $(this).data("type");
            let data_code = $(this).data("code");
            let data_start_date = $(this).data("start-date");
            let data_end_date = $(this).data("end-date");
            let data_discount_amount = $(this).data("discount-amount");
            let data_discount_percentage = $(this).data("discount-percentage");
            let data_description = $(this).data("description");
            let data_status = $(this).data("status");

            $('.status-offer').selectpicker('val', data_status).trigger('change');

            $('#id-offer').val(data_id);
            $('#edit-name').val(data_name);
            $('#edit-type').val(data_type);
            $('#edit-code').val(data_code);
            $('#edit-start-date').val(data_start_date);
            $('#edit-end-date').val(data_end_date);
            $('#edit-discount-amount').val(data_discount_amount);
            $('#edit-discount-percentage').val(data_discount_percentage);
            $('#edit-description').val(data_description);

            $('#editOfferModal').modal('show');
            const list = document.getElementById("error-string-edit");
                    while (list.hasChildNodes()) {
                        list.removeChild(list.firstChild);
                    }
        });
    });

    function rand_string(length) {
        let result = '';
        const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        const charactersLength = characters.length;
        let counter = 0;
        while (counter < length) {
            result += characters.charAt(Math.floor(Math.random() * charactersLength));
            counter += 1;
        }
        // return result;
        $('#code').val(result);
        // console.log(result);
    }

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
                    url: "<?= route_to('admin.offers.remove_offer') ?>",
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
        $('#tambah_offer_form')[0].reset();
        const list = document.getElementById("error-string");
                    while (list.hasChildNodes()) {
                        list.removeChild(list.firstChild);
                    }
    }

    function insert_data() {
        // console.log($('#tambah_offer_form').serialize());
        Swal.fire({
            text: "Sedang Memproses Data",
            allowOutsideClick: false,
            timer: 2000
        });
        Swal.showLoading();
        $.ajax({
            url: "<?= route_to('admin.offers.add_offer') ?>",
            type: "POST",
            data: $('#tambah_offer_form').serialize(),
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
                    $('#tambahOfferModal').modal('hide');
                    refresh_dt();
                } else {
                    const list = document.getElementById("error-string");
                    while (list.hasChildNodes()) {
                        list.removeChild(list.firstChild);
                    }
                    for (var i = 0; i < d.input_error.length; i++) {
                        // $('#' + d.input_error[i]).addClass('is-invalid');
                        const node = document.createElement("li");
                        // Create a text node:
                        const textnode = document.createTextNode(d.error_string[i]);
                        // Append the text node to the "li" node:
                        node.appendChild(textnode);
                        // Append the "li" node to the list:
                        document.getElementById("error-string").appendChild(node);
                        // $('#error-string').append().text(d.error_string[i]);
                    }
                }
                // window.location.reload();
                console.log(d);
                refresh_dt();
            },
            error: function(error) {
                console.log(error);
            }
        });
    }

    function update_data() {
        // console.log($('#edit_role_form').serialize());
        Swal.fire({
            text: "Sedang Memproses Data",
            allowOutsideClick: false,
            timer: 2000
        });
        Swal.showLoading();
        $.ajax({
            url: "<?= route_to('admin.offers.update_offer') ?>",
            type: "POST",
            data: $('#edit_role_form').serialize(),
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
                    $('#editOfferModal').modal('hide');
                    refresh_dt();
                } else {
                    const list = document.getElementById("error-string-edit");
                    while (list.hasChildNodes()) {
                        list.removeChild(list.firstChild);
                    }
                    for (var i = 0; i < d.input_error.length; i++) {
                        // $('#' + d.input_error[i]).addClass('is-invalid');
                        const node = document.createElement("li");
                        // Create a text node:
                        const textnode = document.createTextNode(d.error_string[i]);
                        // Append the text node to the "li" node:
                        node.appendChild(textnode);
                        // Append the "li" node to the list:
                        document.getElementById("error-string-edit").appendChild(node);
                        // $('#error-string').append().text(d.error_string[i]);
                    }
                }
                // window.location.reload();
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
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8]
                    },
                    className: 'fs-sm btn btn-sm btn-outline-secondary glyphicon glyphicon-duplicate',
                    text: '<i class="fa-sharp fa-solid fa-copy "></i>',
                    titleAttr: 'Copy'
                },
                {
                    extend: 'excel',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8]
                    },
                    className: 'fs-sm btn btn-sm btn-outline-success glyphicon glyphicon-list-alt',
                    text: '<i class="fa-sharp fa-solid fa-file-excel "></i>',
                    titleAttr: 'Excel'
                },

                {
                    extend: 'print',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8]
                    },
                    className: 'fs-sm btn btn-sm btn-outline-primary glyphicon glyphicon-print',
                    text: '<i class="fa-sharp fa-solid fa-print "></i>',
                    titleAttr: 'PRINT'
                },
                {
                    extend: 'pdf',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8]
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
                [25, 50, 100, -1],
                [25, 50, 100, 'All'],
            ],
            columnDefs: [{
                targets: [0, 2, 3, 4, 5, 6, 7, 8, 9],
                orderable: false,
                // className: "text-center",
            },{
                targets: [4, 5],
                // orderable: false,
                className: "text-right",
            }, {
                width: "15%",
                targets: [2],
            }, ],
            ajax: {
                url: "<?= route_to('admin.offers.dt_offers') ?>",
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