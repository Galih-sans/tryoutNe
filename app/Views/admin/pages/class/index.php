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
                Daftar Kelas <small></small>
            </h3>
            <div class="block-options">
                <button type="button" class="btn-block-option" data-toggle="block-option"
                    data-action="fullscreen_toggle"></button>
                <button type="button" id="refresh" class="btn-block-option" data-toggle="block-option"
                    data-action="state_toggle" data-action-mode="demo">
                    <i class="si si-refresh"></i>
                </button>
            </div>
        </div>
        <div class="block-content fs-sm">
            <div class="row pb-2 mb-3 shadow-sm align-center">
                <div class="col-12 col-md-12 text-right">
                    <button type="button" class="btn btn-primary btn-sm" onclick="tambah()">
                        <i class="si si-plus"></i> Tambah Kelas Baru
                    </button>
                </div>
            </div>
            <table id="example"
                class="table table-bordered table-vcenter js-dataTable-full no-footer dtr-inline collapsed"
                style="width:100%">
                <thead>
                    <tr>
                        <th width="10%" class="fs-sm fw-normal">#</th>
                        <th width="30%" class="fs-sm fw-normal">Jenjang</th>
                        <th width="30%" class="fs-sm fw-normal">Kelas</th>
                        <th width="30%" class="fs-sm fw-normal">Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
<div class="modal fade" id="questionModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="block block-rounded block-transparent mb-0">
                <div class="block-header block-header-ne">
                    <h3 class="block-title text-white">Tambah Kelas : </h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option-white" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content fs-sm">
                    <form id="class_form">
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <div class="col-12 col-md-12 mb-2">
                                    <span class="" style="letter-spacing: -em">
                                        <meta charset="utf-8">⋮⋮⋮</span> &nbsp;
                                    <span class="tittle-neo"> Jenjang</span>
                                    <select name="level" id="level" title="Please select..."
                                        class="form-control selectpicker border" data-live-search="true"
                                        data-style="customSelect" data-dropup-auto="false" data-size="4">
                                        <tr>
                                            <option value="SD">SD</option>
                                            <option value="SMP">SMP</option>
                                            <option value="SMA">SMA</option>
                                            <option value="Umum">Umum</option>
                                            <option value="Lainnya">Lainnya</option>
                                        </tr>
                                    </select>
                                </div>
                                <div class="col-12 col-md-12 py-2">
                                    <span class="color-ne" style="letter-spacing: -em">
                                        <meta charset="utf-8">⋮⋮⋮</span> &nbsp;
                                    <span class="tittle-neo"> Kelas</span>
                                    <div class="form-floating mb-4 pt-2">
                                        <input type="text" class="form-control" id="class" name="class"
                                            placeholder="John Doe">
                                        <label for="class">Kelas</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="block-content block-content-full text-end bg-body">
                    <button type="button" class="btn btn-sm btn-secondary me-1" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal"
                        onclick="insert_data()">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="block block-rounded block-transparent mb-0">
                <div class="block-header block-header-ne">
                    <h3 class="block-title text-white">Edit Kelas : </h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option-white" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content fs-sm">
                    <form id="edit_class_form">
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <div class="col-12 col-md-12 mb-2">
                                    <span class="" style="letter-spacing: -em">
                                        <meta charset="utf-8">⋮⋮⋮</span> &nbsp;
                                    <span class="tittle-neo"> Jenjang</span>
                                    <select name="level" id="edit-level" title="Please select..."
                                        class="form-control  border" data-live-search="true" data-style="customSelect"
                                        data-dropup-auto="false" data-size="4">
                                        <tr>
                                            <option value="SD">SD</option>
                                            <option value="SMP">SMP</option>
                                            <option value="SMA">SMA</option>
                                            <option value="Umum">Umum</option>
                                            <option value="Lainnya">Lainnya</option>
                                        </tr>
                                    </select>
                                </div>
                                <div class="col-12 col-md-12 py-2">
                                    <span class="color-ne" style="letter-spacing: -em">
                                        <meta charset="utf-8">⋮⋮⋮</span> &nbsp;
                                    <span class="tittle-neo"> Kelas</span>
                                    <div class="form-floating mb-4 pt-2">
                                        <input type="text" class="form-control" id="edit-class" name="class"
                                            placeholder="John Doe">
                                        <input type="hidden" id="class_id" name="class_id">
                                        <label for="class">Kelas</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="block-content block-content-full text-end bg-body" >
                    <button type="button" class="btn btn-sm btn-secondary me-1" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal"
                        onclick="update_data()">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/bootstrap-select.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
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
    $(document).ready(function () {
        show_dt_class();
        $('#refresh').on('click', refresh_dt)
        $(document).on('click', '.delete-button', function () {
            let id = $(this).data("id");
            delete_data(id);
        });
        $(document).on('click', '.edit-button', function () {
            let data_id = $(this).data("id");
            let data_level = $(this).data("level");
            let data_class = $(this).data("class");
            $('select[name=level]').val(data_level);
            // $('.selectpicker').selectpicker('refresh');
            $('#edit-class').val(data_class);
            $('#class_id').val(data_id);
            $('#editModal').modal('show');

        });
    });

    function delete_data(id) {
        $.ajax({
            url: "<?= route_to('admin.class.get_subject') ?>",
            type: "POST",
            data: {
                id: id,
            },
            success: function (d) {
                var d = JSON.parse(d);
                var data = '';
                if (d.length != 0) {
                    data += '<div>Kelas ini sudah memiliki mata pelajaran sebagai berikut :<ul class="tree" style="border-style: hidden;">';
                    d.forEach(d =>
                    data += '<li class="parent_li"><span>' + d.subject +
                    '</span></li>'
                    );
                    data += '</ul></div>';
                }else{
                    data+='<div class="color-ne">Data yang akan dihapus dan tidak dapat dikembalikan</div>';
                }
                Swal.fire({
                    title: 'Yakin Menghapus Data ini?',
                    text: "data akan dihapus dan tidak dapat dikembalikan",
                    icon: 'info',
                    html: data,
                    showCloseButton: true,
                    showCancelButton: true,
                    cancelButtonText: 'Batal',
                    confirmButtonText: 'Ya, hapus data ini',
                    confirmButtonColor: "#d26a5c"
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            url: "<?= route_to('admin.class.remove_class') ?>",
                            type: "POST",
                            data: {
                                id: id,
                            },
                            success: function (d) {
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
                            error: function (error) {
                                console.log(error);
                            }
                        });
                    }
                });
            },
            error: function (error) {
                console.log(error);
            }
        });
    }

    function refresh_dt() {
        show_dt_class();
    }

    function tambah() {
        $('#questionModal').modal('show');
        // $('.selectpicker').selectpicker('refresh');
        $('#class_form')[0].reset();
    }

    function insert_data() {
        Swal.fire({
            text: "Sedang Memproses Data",
            allowOutsideClick: false,
        });
        Swal.showLoading();
        $.ajax({
            url: "<?= route_to('admin.class.add_class') ?>",
            type: "POST",
            data: $('#class_form').serialize(),
            success: function (d) {
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

                console.log(d);
                refresh_dt();
            },
            error: function (error) {
                console.log(error);
            }
        });
    }

    function update_data() {
        Swal.fire({
            text: "Sedang Memproses Data",
            allowOutsideClick: false,
        });
        Swal.showLoading();
        $.ajax({
            url: "<?= route_to('admin.class.edit_class') ?>",
            type: "POST",
            data: $('#edit_class_form').serialize(),
            success: function (d) {
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

                console.log(d);
                refresh_dt();
            },
            error: function (error) {
                console.log(error);
            }
        });
    }


    function show_dt_class() {
        $('#example').DataTable({
            oLanguage: {sProcessing: '<div class="spinner-border neo" role="status"><span class="sr-only"></span></div>'},
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
                [5, 10, 25, 50, 100, -1],
                [5, 10, 25, 50, 100, 'All'],
            ],
            columnDefs: [{
                targets: [0, 3],
                orderable: false,
                className: "text-center",
            }, {
                width: "15%",
                targets: [3],
            }, ],
            ajax: {
                url: "<?= route_to('admin.class.dt_class') ?>",
                type: "POST",
                data: {},
                error: function () { // error handling
                    $(".tabel_serverside-error").html("");
                    $("#tabel_serverside").append(
                        '<tbody class="tabel_serverside-error"><tr><th colspan="3">Data Tidak Ditemukan di Server</th></tr></tbody>'
                    );
                    $("#tabel_serverside_processing").css("display", "none");
                }
            },
            initComplete: function (settings, json) {
                $('div.dataTables_length select').addClass('selectpicker border');
                $('.selectpicker').selectpicker();
            }

        })
    };
</script>

<?= $this->endSection() ?>