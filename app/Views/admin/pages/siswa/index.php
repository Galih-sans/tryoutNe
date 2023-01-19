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
                Daftar Siswa <small></small>
            </h3>
            <div class="block-options">
                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="fullscreen_toggle"></button>
                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                    <i class="si si-refresh"></i>
                </button>
                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="close">
                    <i class="si si-close"></i>
                </button>
            </div>
        </div>
        <div class="block-content fs-sm">
            <div class="block-content fs-sm">
                <table id="example" class="table table-bordered table-vcenter js-dataTable-full no-footer dtr-inline collapsed" style="width:100%">
                    <thead>
                        <tr>
                            <th width="10%" class="fs-sm fw-normal">#</th>
                            <th width="30%" class="fs-sm fw-normal">Nama</th>
                            <th width="30%" class="fs-sm fw-normal">E-mail</th>
                            <th width="30%" class="fs-sm fw-normal">Kelas</th>
                            <th width="30%" class="fs-sm fw-normal">Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="detailModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="block block-rounded block-transparent mb-0">
                <div class="block-header block-header-ne">
                    <h3 class="block-title text-white">Detail Siswa : </h3>
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
                                <th>Name</th>
                                <td><input type="text" class="form-control" id="full_name" name="name" disabled></td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td><input type="text" class="form-control" id="email" name="name" disabled></td>
                            </tr>
                            <tr>
                                <th>Nomor Telepon</th>
                                <td><input type="text" class="form-control" id="phone_number" name="phone_number" disabled></td>
                            </tr>
                            <tr>
                                <th>Tempat Lahir</th>
                                <td><input type="text" class="form-control" id="POB" name="POB" disabled></td>
                            </tr>
                            <tr>
                                <th>Tanggal Lahir</th>
                                <td><input type="text" class="form-control" id="DOB" name="DOB" disabled></td>
                            </tr>
                            <tr>
                                <th>Jenis Kelamin</th>
                                <td><input type="text" class="form-control" id="gender" name="gender" disabled></td>
                            </tr>
                            <tr>
                                <th>Nama Wali</th>
                                <td><input type="text" class="form-control" id="parent_name" name="parent_name" disabled></td>
                            </tr>
                            <tr>
                                <th>Nomor Telepon Wali</th>
                                <td><input type="text" class="form-control" id="parent_phone_number" name="parent_phone_number" disabled></td>
                            </tr>
                            <tr>
                                <th>Email Wali</th>
                                <td><input type="text" class="form-control" id="parent_email" name="parent_email" disabled></td>
                            </tr>
                            <tr>
                                <th>Kelas</th>
                                <td><input type="text" class="form-control" class="form-control" id="kelas" name="kelas" disabled></td>
                            </tr>
                            <tr>
                                <th>Jenjang</th>
                                <td><input type="text" class="form-control" id="level" name="level" disabled></td>
                            </tr>
                            <tr>
                                <th>Sekolah</th>
                                <td><input type="text" class="form-control" id="school" name="school" disabled></td>
                            </tr>
                        </table>
                    </form>
                </div>
                <div class="block-content block-content-full text-end bg-body">
                    <button type="button" class="btn btn-sm btn-secondary me-1" data-bs-dismiss="modal">Tutup</button>
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

<!-- Page Js Code -->
<script src="<?= base_url('js/pages/tables_datatables.js') ?>"></script>
<script>
    $(document).ready(function() {
        dt_siswa();
        $('#refresh').on('click', refresh_dt)
        $(document).on('click', '.detail-button', function() {
            let data_id = $(this).attr("id");
            let data_full_name = $(this).attr("full_name");
            let data_class = $(this).attr("class_id");
            let data_level = $(this).attr("level");
            let data_email = $(this).attr("email");
            let data_POB = $(this).attr("POB");
            let data_DOB = $(this).attr("DOB");
            let data_phone_number = $(this).attr("phone_number");
            let data_gender = $(this).attr("gender");
            let data_parent_name = $(this).attr("parent_name");
            let data_parent_phone_number = $(this).attr("parent_phone_number");
            let data_parent_email = $(this).attr("parent_email");
            let data_school = $(this).attr("school");

            $('#full_name').val(data_full_name);
            $('#kelas').val(data_class);
            $('#level').val(data_level);
            $('#email').val(data_email);
            $('#POB').val(data_POB);
            $('#DOB').val(data_DOB);
            $('#phone_number').val(data_phone_number)
            if (data_gender == "L") {
                $('#gender').val("Laki-Laki");
            } else {
                $('#gender').val("Perempuan");
            }
            $('#parent_name').val(data_parent_name)
            $('#parent_phone_number').val(data_parent_phone_number)
            $('#parent_email').val(data_parent_email)
            $('#school').val(data_school)
            console.log(data_DOB);

            $('#detailModal').modal('show');
        });
    });

    function dt_siswa() {
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
            columnDefs: [{
                targets: [0, 3],
                orderable: false,
                className: "text-center",
            }, {
                width: "15%",
                targets: [3],
            }, ],
            ajax: {
                url: "<?= route_to('admin.siswa.dt_siswa') ?>",
                type: "POST",
                data: {},
                error: function() {
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

    function refresh_dt() {
        dt_siswa();
    }
</script>
<?= $this->endSection() ?>