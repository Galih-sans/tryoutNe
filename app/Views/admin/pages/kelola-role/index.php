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
                Daftar Role <small></small>
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
                        <i class="si si-plus"></i> Tambah Role Baru
                    </button>
                </div>
            </div>
            <table id="example" class="table table-bordered table-vcenter js-dataTable-full no-footer dtr-inline collapsed" style="width:100%">
                <thead>
                    <tr>
                        <th width="10%" class="fs-sm fw-normal">#</th>
                        <th width="40%" class="fs-sm fw-normal">Nama Role</th>
                        <th width="20%" class="fs-sm fw-normal">Detail</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
<div class="modal fade" id="tambahRoleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="block block-rounded block-transparent mb-0">
                <div class="block-header block-header-ne">
                    <h3 class="block-title text-white">Tambah Role : </h3>
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
                                    <span class="tittle-neo"> Nama Role Baru</span>
                                    <div class="mb-4 pt-2">
                                        <input type="text" class="form-control" id="role_name" name="role_name">
                                    </div>
                                </div>
                                <!-- role -->
                                <div class="col-12 col-md-12 py-2">
                                    <span class="color-ne" style="letter-spacing: -em">
                                        <meta charset="utf-8">⋮⋮⋮
                                    </span> &nbsp;
                                    <span class="tittle-neo"> Hak Akses Menu</span>
                                    <div class="mx-4 py-2">
                                        <div class="form-check form-switch">
                                            <input type="hidden" id="class" name="class" value="0">
                                            <input class="form-check-input" type="checkbox" value="1" id="class" name="class">
                                            <label for="class">Daftar Kelas</label>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input type="hidden" id="subject" name="subject" value="0">
                                            <input class="form-check-input" type="checkbox" value="1" id="subject" name="subject">
                                            <label for="subject">Mata Pelajaran</label>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input type="hidden" id="topic" name="topic" value="0">
                                            <input class="form-check-input" type="checkbox" value="1" id="topic" name="topic">
                                            <label for="topic">Topik Mata Pelajaran</label>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input type="hidden" id="test" name="test" value="0">
                                            <input class="form-check-input" type="checkbox" value="1" id="test" name="test">
                                            <label for="test">Daftar Test</label>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input type="hidden" id="bank_soal" name="bank_soal" value="0">
                                            <input class="form-check-input" type="checkbox" value="1" id="bank_soal" name="bank_soal">
                                            <label for="bank_soal">Bank Soal</label>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input type="hidden" id="siswa" name="siswa" value="0">
                                            <input class="form-check-input" type="checkbox" value="1" id="siswa" name="siswa">
                                            <label for="siswa">Daftar Siswa</label>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input type="hidden" id="hasil_test" name="hasil_test" value="0">
                                            <input class="form-check-input" type="checkbox" value="1" id="hasil_test" name="hasil_test">
                                            <label for="hasil_test">Hasil Test</label>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input type="hidden" id="kelola_admin" name="kelola_admin" value="0">
                                            <input class="form-check-input" type="checkbox" value="1" id="kelola_admin" name="kelola_admin">
                                            <label for="kelola_admin">Kelola Admin</label>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input type="hidden" id="kelola_role" name="kelola_role" value="0">
                                            <input class="form-check-input" type="checkbox" value="1" id="kelola_role" name="kelola_role">
                                            <label for="kelola_role">Kelola Role</label>
                                        </div>
                                    </div>
                                    <span class="color-ne" style="letter-spacing: -em">
                                        <meta charset="utf-8">⋮⋮⋮
                                    </span> &nbsp;
                                    <span class="tittle-neo"> Menu Transaksi</span>
                                    <div class="mx-4 py-2">
                                        <div class="form-check form-switch">
                                            <input type="hidden" id="balance_siswa" name="balance_siswa" value="0">
                                            <input class="form-check-input" type="checkbox" value="1" id="balance_siswa" name="balance_siswa">
                                            <label for="balance_siswa">Balance Siswa</label>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input type="hidden" id="kelola_paket_diamond" name="kelola_paket_diamond" value="0">
                                            <input class="form-check-input" type="checkbox" value="1" id="kelola_paket_diamond" name="kelola_paket_diamond">
                                            <label for="kelola_paket_diamond">Kelola Paket Diamond</label>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" value="1" id="log_balance" name="log_balance">
                                            <label for="log_balance">Log Balance Siswa</label>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" value="1" id="offers" name="offers">
                                            <label for="offers">Kelola Diskon</label>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" value="1" id="transaksi_diamond" name="transaksi_diamond">
                                            <label for="transaksi_diamond">Transaksi Diamond</label>
                                        </div>
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
</div>
<div class="modal fade" id="editRoleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="block block-rounded block-transparent mb-0">
                <div class="block-header block-header-ne">
                    <h3 class="block-title text-white">Edit Role : </h3>
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
                                    <span class="tittle-neo"> Edit Nama Role</span>
                                    <div class="mb-4 pt-2">
                                        <input type="hidden" id="edit-role-id" name="role_id">
                                        <input type="text" class="form-control" id="edit-role-name" name="edit_role_name">
                                    </div>
                                </div>
                                <!-- // checkbox hak akses -->
                                <div class="col-12 col-md-12 py-2">
                                    <span class="color-ne" style="letter-spacing: -em">
                                        <meta charset="utf-8">⋮⋮⋮
                                    </span> &nbsp;
                                    <span class="tittle-neo"> Edit Hak Akses Menu</span>
                                    <div class="mx-4 py-2">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" value="1" id="edit_class" name="edit_class">
                                            <label for="edit_class">Daftar Kelas</label>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" value="1" id="edit_subject" name="edit_subject">
                                            <label for="edit_subject">Mata Pelajaran</label>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" value="1" id="edit_topic" name="edit_topic">
                                            <label for="edit_topic">Topik Mata Pelajaran</label>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" value="1" id="edit_test" name="edit_test">
                                            <label for="edit_test">Daftar Test</label>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" value="1" id="edit_bank_soal" name="edit_bank_soal">
                                            <label for="edit_bank_soal">Bank Soal</label>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" value="1" id="edit_siswa" name="edit_siswa">
                                            <label for="edit_siswa">Daftar Siswa</label>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" value="1" id="edit_hasil_test" name="edit_hasil_test">
                                            <label for="edit_hasil_test">Hasil Test</label>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" value="1" id="edit_kelola_admin" name="edit_kelola_admin">
                                            <label for="edit_kelola_admin">Kelola Admin</label>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" value="1" id="edit_kelola_role" name="edit_kelola_role">
                                            <label for="edit_kelola_role">Kelola Role</label>
                                        </div>
                                    </div>
                                    <span class="color-ne" style="letter-spacing: -em">
                                        <meta charset="utf-8">⋮⋮⋮
                                    </span> &nbsp;
                                    <span class="tittle-neo"> Menu Transaksi</span>
                                    <div class="mx-4 py-2">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" value="1" id="edit_balance_siswa" name="edit_balance_siswa">
                                            <label for="edit_balance_siswa">Balance Siswa</label>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" value="1" id="edit_kelola_paket_diamond" name="edit_kelola_paket_diamond">
                                            <label for="edit_kelola_paket_diamond">Kelola Paket Diamond</label>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" value="1" id="edit_log_balance" name="edit_log_balance">
                                            <label for="edit_log_balance">Log Balance Siswa</label>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" value="1" id="edit_offers" name="edit_offers">
                                            <label for="edit_offers">Kelola Diskon</label>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" value="1" id="edit_transaksi_diamond" name="edit_transaksi_diamond">
                                            <label for="edit_transaksi_diamond">Transaksi Diamond</label>
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
            let data_role_name = $(this).data("role-name");
            let data_ha_class = $(this).data("ha-class");
            let data_ha_subject = $(this).data("ha-subject");
            let data_ha_topic = $(this).data("ha-topic");
            let data_ha_test = $(this).data("ha-test");
            let data_ha_bank_soal = $(this).data("ha-bank-soal");
            let data_ha_siswa = $(this).data("ha-siswa");
            let data_ha_hasil_test = $(this).data("ha-hasil-test");
            let data_ha_kelola_admin = $(this).data("ha-kelola-admin");
            let data_ha_kelola_role = $(this).data("ha-kelola-role");
            let data_ha_kelola_paket_diamond = $(this).data("ha-kelola-paket-diamond");
            let data_ha_balance_siswa = $(this).data("ha-balance-siswa");
            let data_ha_log_balance = $(this).data("ha-log-balance");
            let data_ha_offers = $(this).data("ha-offers");
            let data_ha_transaksi_diamond = $(this).data("ha-transaksi-diamond");

            $('#edit-role-id').val(data_id);
            $('#edit-role-name').val(data_role_name);

            if (data_ha_class == 1) {
                $('#edit_class').prop('checked', true);
            } else {
                $('#edit_class').prop('checked', false);
            }
            if (data_ha_subject == 1) {
                $('#edit_subject').prop('checked', true);
            } else {
                $('#edit_subject').prop('checked', false);
            }
            if (data_ha_topic == 1) {
                $('#edit_topic').prop('checked', true);
            } else {
                $('#edit_topic').prop('checked', false);
            }
            if (data_ha_test == 1) {
                $('#edit_test').prop('checked', true);
            } else {
                $('#edit_test').prop('checked', false);
            }
            if (data_ha_bank_soal == 1) {
                $('#edit_bank_soal').prop('checked', true);
            } else {
                $('#edit_bank_soal').prop('checked', false);
            }
            if (data_ha_siswa == 1) {
                $('#edit_siswa').prop('checked', true);
            } else {
                $('#edit_siswa').prop('checked', false);
            }
            if (data_ha_hasil_test == 1) {
                $('#edit_hasil_test').prop('checked', true);
            } else {
                $('#edit_hasil_test').prop('checked', false);
            }
            if (data_ha_kelola_admin == 1) {
                $('#edit_kelola_admin').prop('checked', true);
            } else {
                $('#edit_kelola_admin').prop('checked', false);
            }
            if (data_ha_kelola_role == 1) {
                $('#edit_kelola_role').prop('checked', true);
            } else {
                $('#edit_kelola_role').prop('checked', false);
            }
            if (data_ha_kelola_paket_diamond == 1) {
                $('#edit_kelola_paket_diamond').prop('checked', true);
            } else {
                $('#edit_kelola_paket_diamond').prop('checked', false);
            }
            if (data_ha_balance_siswa == 1) {
                $('#edit_balance_siswa').prop('checked', true);
            } else {
                $('#edit_balance_siswa').prop('checked', false);
            }
            if (data_ha_log_balance == 1) {
                $('#edit_log_balance').prop('checked', true);
            } else {
                $('#edit_log_balance').prop('checked', false);
            }
            if (data_ha_offers == 1) {
                $('#edit_offers').prop('checked', true);
            } else {
                $('#edit_offers').prop('checked', false);
            }
            if (data_ha_transaksi_diamond == 1) {
                $('#edit_transaksi_diamond').prop('checked', true);
            } else {
                $('#edit_transaksi_diamond').prop('checked', false);
            }

            $('#editRoleModal').modal('show');

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
                    url: "<?= route_to('admin.kelola-role.remove_role') ?>",
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
        $('#tambahRoleModal').modal('show');
        // $('.selectpicker').selectpicker('refresh');
        $('#tambah_role_form')[0].reset();
    }

    function insert_data() {
        // console.log($('#tambah_role_form').serialize());
        Swal.fire({
            text: "Sedang Memproses Data",
            allowOutsideClick: false,
        });
        Swal.showLoading();
        $.ajax({
            url: "<?= route_to('admin.kelola-role.add_role') ?>",
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
        });
        Swal.showLoading();
        $.ajax({
            url: "<?= route_to('admin.kelola-role.update_role') ?>",
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
                url: "<?= route_to('admin.kelola-role.dt_roles') ?>",
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