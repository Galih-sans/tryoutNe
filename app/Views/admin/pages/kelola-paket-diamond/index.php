<?= $this->extend('admin/layout/app') ?>
<?= $this->section('header') ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
<link rel="stylesheet" href="<?= base_url('css/datatables/dataTables.bootstrap4.css') ?>">
<link rel="stylesheet" href="<?= base_url('css/datatables/buttons-bs4/buttons.bootstrap4.min.css') ?>">
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="content">
    <div class="block block-rounded pb-2 shadow-sm">
        <div class="block-header block-header-default">
            <h3 class="block-title">
                Daftar Paket Diamond <small></small>
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
                        <i class="si si-plus"></i> Tambah Paket Baru
                    </button>
                </div>
            </div>
            <table id="example" class="table table-bordered table-vcenter js-dataTable-full no-footer dtr-inline collapsed" style="width:100%">
                <thead>
                    <tr>
                        <th width="10%" class="fs-sm fw-normal">#</th>
                        <th width="20%" class="fs-sm fw-normal">Nama Paket</th>
                        <th width="20%" class="fs-sm fw-normal">Harga Paket</th>
                        <th width="20%" class="fs-sm fw-normal">Jumlah</th>
                        <th width="40%" class="fs-sm fw-normal">Deskripsi</th>
                        <th width="10%" class="fs-sm fw-normal">Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
<div class="modal fade" id="tambahPaketModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="block block-rounded block-transparent mb-0">
                <div class="block-header block-header-ne">
                    <h3 class="block-title text-white">Tambah Paket Diamond : </h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option-white" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content fs-sm">
                    <form id="tambah_role_form">
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <div class="col-12 col-md-12 py-2">
                                    <span class="color-ne" style="letter-spacing: -em">
                                        <meta charset="utf-8">⋮⋮⋮
                                    </span> &nbsp;
                                    <span class="tittle-neo"> Nama Paket</span>
                                    <div class="mb-4 pt-2">
                                        <input type="text" class="form-control" id="package-name" name="package_name">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-12">
                                <div class="col-12 col-md-12 py-2">
                                    <span class="color-ne" style="letter-spacing: -em">
                                        <meta charset="utf-8">⋮⋮⋮
                                    </span> &nbsp;
                                    <span class="tittle-neo"> Harga Paket</span>
                                    <div class="mb-4 pt-2">
                                        <input type="number" class="form-control" id="package-price" name="package_price">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-12">
                                <div class="col-12 col-md-12 py-2">
                                    <span class="color-ne" style="letter-spacing: -em">
                                        <meta charset="utf-8">⋮⋮⋮
                                    </span> &nbsp;
                                    <span class="tittle-neo"> Jumlah Diamond</span>
                                    <div class="mb-4 pt-2">
                                        <input type="number" class="form-control" id="diamond-amount" name="diamond_amount">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-12">
                                <div class="col-12 col-md-12 py-2">
                                    <span class="color-ne" style="letter-spacing: -em">
                                        <meta charset="utf-8">⋮⋮⋮
                                    </span> &nbsp;
                                    <span class="tittle-neo"> Deskripsi</span>
                                    <div class="mb-4 pt-2">
                                        <textarea type="text" class="form-control" id="package-description" name="package_description"></textarea>
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
<div class="modal fade" id="editPaketModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="block block-rounded block-transparent mb-0">
                <div class="block-header block-header-ne">
                    <h3 class="block-title text-white">Edit Paket Diamond : </h3>
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
                                <div class="col-12 col-md-12 py-2">
                                    <span class="color-ne" style="letter-spacing: -em">
                                        <meta charset="utf-8">⋮⋮⋮
                                    </span> &nbsp;
                                    <span class="tittle-neo"> Edit Nama Paket</span>
                                    <div class="mb-4 pt-2">
                                        <input type="hidden" id="edit-package-id" name="package_id">
                                        <input type="text" class="form-control" id="edit-package-name" name="edit_package_name">
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-12 col-md-12">
                                <div class="col-12 col-md-12 py-2">
                                    <span class="color-ne" style="letter-spacing: -em">
                                        <meta charset="utf-8">⋮⋮⋮
                                    </span> &nbsp;
                                    <span class="tittle-neo"> Edit Tipe Paket</span>
                                    <div class="mb-4 pt-2">
                                        <input type="text" class="form-control" id="edit-package-type" name="edit_package_type">
                                    </div>
                                </div>
                            </div> -->
                            <div class="col-12 col-md-12">
                                <div class="col-12 col-md-12 py-2">
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <span class="color-ne" style="letter-spacing: -em">
                                                <meta charset="utf-8">⋮⋮⋮
                                            </span> &nbsp;
                                            <span class="tittle-neo"> Edit Harga Paket</span>
                                            <div class="mb-4 pt-2">
                                                <input type="number" class="form-control" id="edit-package-price" name="edit_package_price">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                                <span class="color-ne" style="letter-spacing: -em">
                                                    <meta charset="utf-8">⋮⋮⋮
                                                </span> &nbsp;
                                                <span class="tittle-neo"> Edit Jumlah Diamond</span>
                                                <div class="mb-4 pt-2">
                                                    <input type="number" class="form-control" id="edit-diamond-amount" name="edit_diamond_amount">
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-12">
                                <div class="col-12 col-md-12 py-2">
                                    <span class="color-ne" style="letter-spacing: -em">
                                        <meta charset="utf-8">⋮⋮⋮
                                    </span> &nbsp;
                                    <span class="tittle-neo"> Edit Deskripsi</span>
                                    <div class="mb-4 pt-2">
                                        <textarea type="text" class="form-control" id="edit-package-description" name="edit_package_description"></textarea>
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
            delete_data(id);
        });
        $(document).on('click', '.edit-button', function() {
            let data_id = $(this).data("id");
            console.log(data_id);
            let data_package_name = $(this).data("name");
            // let data_package_type = $(this).data("type");
            let data_package_price = $(this).data("price");
            let data_package_amount = $(this).data("amount");
            let data_package_description = $(this).data("description");

            $('#edit-package-id').val(data_id);
            $('#edit-package-name').val(data_package_name);
            // $('#edit-package-type').val(data_package_type);
            $('#edit-package-price').val(data_package_price);
            $('#edit-diamond-amount').val(data_package_amount);
            $('#edit-package-description').val(data_package_description);

            $('#editPaketModal').modal('show');

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
                    url: "<?= route_to('admin.paket-diamond.remove_paket_diamond') ?>",
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
        $('#tambahPaketModal').modal('show');
        // $('.selectpicker').selectpicker('refresh');
        $('#tambah_role_form')[0].reset();
    }

    function insert_data() {
        // Swal.fire({
        //     text: "Sedang Memproses Data",
        //     allowOutsideClick: false,
        // });
        // Swal.showLoading();
        $.ajax({
            url: "<?= route_to('admin.paket-diamond.add_paket_diamond') ?>",
            type: "POST",
            data: $('#tambah_role_form').serialize(),
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
                    window.location.reload();
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
                console.log(d);
                refresh_dt();
            },
            error: function(error) {
                console.log(error);
            }
        });
    }

    function update_data() {
        // Swal.fire({
        //     text: "Sedang Memproses Data",
        //     allowOutsideClick: false,
        // });
        // Swal.showLoading();
        $.ajax({
            url: "<?= route_to('admin.paket-diamond.update_paket_diamond') ?>",
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
                window.location.reload();
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
                console.log($('#edit_role_form').serialize());
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
                        columns: [0, 1, 2]
                    },
                    className: 'fs-sm btn btn-sm btn-outline-secondary glyphicon glyphicon-duplicate',
                    text: '<i class="fa-sharp fa-solid fa-copy "></i>',
                    titleAttr: 'Copy'
                },
                {
                    extend: 'excel',
                    exportOptions: {
                        columns: [0, 1, 2]
                    },
                    className: 'fs-sm btn btn-sm btn-outline-success glyphicon glyphicon-list-alt',
                    text: '<i class="fa-sharp fa-solid fa-file-excel "></i>',
                    titleAttr: 'Excel'
                },

                {
                    extend: 'print',
                    exportOptions: {
                        columns: [0, 1, 2]
                    },
                    className: 'fs-sm btn btn-sm btn-outline-primary glyphicon glyphicon-print',
                    text: '<i class="fa-sharp fa-solid fa-print "></i>',
                    titleAttr: 'PRINT'
                },
                {
                    extend: 'pdf',
                    exportOptions: {
                        columns: [0, 1, 2]
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
                url: "<?= route_to('admin.paket-diamond.dt_paket_diamond') ?>",
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