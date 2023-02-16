<?= $this->extend('user/layout/app') ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
<link rel="stylesheet" href="<?= base_url('css/datatables/dataTables.bootstrap4.css') ?>">
<link rel="stylesheet" href="<?= base_url('css/datatables/buttons-bs4/buttons.bootstrap4.min.css') ?>">
<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="row mt-4">
        <div class="col-lg-12 mb-lg-0 mb-4">
            <div class="card z-index-2 h-100">
                <div class="card-header pb-0 pt-3 bg-transparent">
                    <h6 class="text-capitalize">Test Overview</h6>
                    <p class="text-sm mb-0">
                        <i class="fa fa-arrow-up text-success"> 4% more</i>
                        <span class="font-weight-bold"></span> last week
                    </p>
                </div>
                <div class="card-body p-3">
                    <div class="chart">
                        <canvas id="chart-line" class="chart-canvas" height="300"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- hasil / riwayatt test test -->
    <div class="row mt-4">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Hasi Test terupdate</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table id="riwayat" class="table table-bordered table-vcenter js-dataTable-full no-footer dtr-inline collapsed" style="width:100%">
                            <thead>
                                <tr>
                                    <th width="5%" class="fs-sm">#</th>
                                    <th width="30%" class="fs-sm fw-normal">Ujian</th>
                                    <th width="10%" class=" text-center fs-sm fw-normal">Nilai</th>
                                    <th width="30%" class="fs-sm fw-normal">Kelas</th>
                                    <th width="10%" class="fs-sm fw-normal">Tanggal Ujian</th>
                                    <th width="10%" class="fs-sm fw-normal">Detail</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end of riwayat test -->
    <!-- MODAL TEST TERUPDATE -->
    <div class="modal fade" id="detailModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="block block-rounded block-transparent mb-0">
                    <div class="block-header block-header-ne">
                        <h3 class="block-title text-white">Hasil Test : </h3>
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
                                    <th>Nama Ujian</th>
                                    <td><input type="text" class="form-control" id="test_name" disabled></td>
                                </tr>
                                <tr>
                                    <th>Nilai</th>
                                    <td><input type="text" class="form-control" id="score" disabled></td>
                                </tr>
                                <tr>
                                    <th>Jawaban Benar</th>
                                    <td><input type="text" class="form-control" id="right_answer" disabled></td>
                                </tr>
                                <tr>
                                    <th>Jawaban Salah</th>
                                    <td><input type="text" class="form-control" id="wrong_answer" disabled></td>
                                </tr>
                                <tr>
                                    <th>Tanggal Ujian</th>
                                    <td><input type="text" class="form-control" id="begin_time" disabled></td>
                                </tr>
                                <tr>
                                    <th>Kelas</th>
                                    <td><input type="text" class="form-control" id="test_class" disabled></td>
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
    <!-- END OF MODAL -->

    <!-- Ujian Mendatang -->
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Daftar Ujian Mendatang</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table table-bordered table-vcenter js-dataTable-full no-footer dtr-inline collapsed">
                            <thead>
                                <tr>
                                    <th width="5%" class="fs-sm">#</th>
                                    <th width="20%" class="fs-sm fw-normal">Ujian</th>
                                    <th width="10%" class=" text-center fs-sm fw-normal">Kelas</th>
                                    <th width="20%" class="fs-sm fw-normal">Tanggal Ujian</th>
                                    <th width="10%" class="fs-sm fw-normal">Jumlah Pertanyaan</th>
                                    <th width="10%" class="fs-sm fw-normal">Type</th>
                                    <th width="20%" class="fs-sm fw-normal">Harga</th>
                                </tr>
                                <!-- <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Ujian</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Kelas</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Status</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">
                                        Pengerjaan</th>
                                    <th></th>
                                </tr> -->
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- MODAL TEST MENDATANG TERUPDATE -->
    <!-- <div class="modal fade" id="detailModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                    <th>Test ID</th>
                                    <td><input type="text" class="form-control" id="test_id" disabled></td>
                                </tr>
                                <tr>
                                    <th>Nama Test</th>
                                    <td><input type="text" class="form-control" id="test_name" disabled></td>
                                </tr>
                                <tr>
                                    <th>Jadwal Dimulai</th>
                                    <td><input type="text" class="form-control" id="begin_time" disabled></td>
                                </tr>
                                <tr>
                                    <th>Jadwal Selesai</th>
                                    <td><input type="text" class="form-control" id="end_time" disabled></td>
                                </tr>
                                <tr>
                                    <th>Durasi Ujian</th>
                                    <td><input type="text" class="form-control" id="duration" disabled></td>
                                </tr>
                                <tr>
                                    <th>Jumlah Soal</th>
                                    <td><input type="text" class="form-control" id="number_of_question" disabled></td>
                                </tr>
                                <tr>
                                    <th>Type</th>
                                    <td><input type="text" class="form-control" id="type" disabled></td>
                                </tr>
                                <tr>
                                    <th>Harga</th>
                                    <td><input type="text" class="form-control" id="price" disabled></td>
                                </tr>
                                <tr>
                                    <th>Kelas</th>
                                    <td><input type="text" class="form-control" id="class" disabled></td>
                                </tr>
                                <tr>
                                    <th>Subjek</th>
                                    <td><input type="text" class="form-control" id="subhject" disabled></td>
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
    </div> -->
    <!-- END OF MODAL -->
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

<!-- TEST DATATABLE -->
<!-- <script>
    $(document).ready(function() {
        dt_siswa();
        // $('#refresh').on('click', refresh_dt)
        // $(document).on('click', '.detail-button', function() {
        //     let data_id = $(this).attr("id");
        //     let data_full_name = $(this).attr("full_name");
        //     let data_class = $(this).attr("class_id");
        //     let data_level = $(this).attr("level");
        //     let data_email = $(this).attr("email");
        //     let data_POB = $(this).attr("POB");
        //     let data_DOB = $(this).attr("DOB");
        //     let data_phone_number = $(this).attr("phone_number");
        //     let data_gender = $(this).attr("gender");
        //     let data_parent_name = $(this).attr("parent_name");
        //     let data_parent_phone_number = $(this).attr("parent_phone_number");
        //     let data_parent_email = $(this).attr("parent_email");
        //     let data_school = $(this).attr("school");

        //     $('#full_name').val(data_full_name);
        //     $('#kelas').val(data_class);
        //     $('#level').val(data_level);
        //     $('#email').val(data_email);
        //     $('#POB').val(data_POB);
        //     $('#DOB').val(data_DOB);
        //     $('#phone_number').val(data_phone_number)
        //     if (data_gender == "L") {
        //         $('#gender').val("Laki-Laki");
        //     } else {
        //         $('#gender').val("Perempuan");
        //     }
        //     $('#parent_name').val(data_parent_name)
        //     $('#parent_phone_number').val(data_parent_phone_number)
        //     $('#parent_email').val(data_parent_email)
        //     $('#school').val(data_school)
        //     console.log(data_DOB);

        //     $('#detailModal').modal('show');
        // });
    });

    function dt_siswa() {
        $('#riwayat').DataTable({
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
</script> -->
<!-- TEST DATATABLE -->

<script>
    $(document).ready(function() {
        dt_riwayat();
        // dt_mendatang();
        // $('#refresh').on('click', refresh_dt)
        $(document).on('click', '.detail-button', function() {
            let test_name = $(this).attr("test_name");
            let begin_time = $(this).attr("begin_time");
            let score = $(this).attr("score");
            let right_answer = $(this).attr("right_answer");
            let wrong_answer = $(this).attr("wrong_answer");
            let test_class = $(this).attr("test_class");

            $('#test_name').val(test_name);
            $('#begin_time').val(begin_time);
            $('#score').val(score);
            $('#right_answer').val(right_answer + " Soal");
            $('#wrong_answer').val(wrong_answer + " Soal");
            $('#test_class').val(test_class);


            $('#detailModal').modal('show');
        });
    });

    function dt_riwayat() {
        $('#riwayat').DataTable({
            oLanguage: {
                sProcessing: '<div class="spinner-border neo" role="status"><span class="sr-only"></span></div>'
            },
            // dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center mx-0 yx-0'B><'col-sm-4'f>>" +
            //     "<'row'<'col-sm-12'tr>>" +
            //     "<'row'<'col-sm-6'i><'col-sm-6'p>>",
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
            bPaginate: false,
            pagination: false,
            searching: true,
            bInfo: false,
            tInfo: false,
            pagingType: "full_numbers",
            paging: false,
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
                url: "<?= route_to('user.performance.dt_riwayat') ?>",
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

    function dt_mendatang() {
        $('#mendatang').DataTable({
            oLanguage: {
                sProcessing: '<div class="spinner-border neo" role="status"><span class="sr-only"></span></div>'
            },
            // dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center mx-0 yx-0'B><'col-sm-4'f>>" +
            //     "<'row'<'col-sm-12'tr>>" +
            //     "<'row'<'col-sm-6'i><'col-sm-6'p>>",
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
            bPaginate: false,
            pagination: false,
            searching: true,
            bInfo: false,
            tInfo: false,
            pagingType: "full_numbers",
            paging: false,
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
                url: "<?= route_to('user.performance.dt_mendatang') ?>",
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

    // function refresh_dt() {
    //     dt_siswa();
    // }
</script>
<?= $this->endSection() ?>