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
                Daftar Hasil Test<small></small>
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
                <table id="daftar-test" class="table table-bordered table-vcenter js-dataTable-full no-footer dtr-inline collapsed" style="width:100%">
                    <thead>
                        <tr>
                            <th width="5%" class="fs-sm">#</th>
                            <th width="20%" class="fs-sm fw-normal">Ujian</th>
                            <th width="10%" class=" text-center fs-sm fw-normal">Kelas</th>
                            <th width="20%" class="fs-sm fw-normal">Tanggal Ujian</th>
                            <th width="10%" class="fs-sm fw-normal">Jumlah Pertanyaan</th>
                            <th width="10%" class="fs-sm fw-normal">Type</th>
                            <th width="20%" class="fs-sm fw-normal">Harga</th>
                            <th width="10%" class="fs-sm fw-normal">Detail</th>
                        </tr>
                    </thead>
                </table>
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
        dt_daftar_test();
        $('#refresh').on('click', refresh_dt);
        $(document).on('click', '.detail-test', function() {
            let $test_id = $(this).attr("test_id");
            document.location.href = '/admin/hasil-test/detail/' + $test_id;
            // document.location.href = '/admin/hasil-test/detail';
            // console.log($data_id);
        });
    });

    function dt_daftar_test() {
        $('#daftar-test').DataTable({
            oLanguage: {
                sZeroRecords: '<p style="color: red">Tidak ada data</p>',
                sProcessing: '<div class="spinner-border neo" role="status"><span class="sr-only"></span></div>',
            },
            dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center mx-0 yx-0'B><'col-sm-4'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-6'i><'col-sm-6'p>>",
            buttons: [{
                    extend: 'copy',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6]
                    },
                    className: 'fs-sm btn btn-sm btn-outline-secondary glyphicon glyphicon-duplicate',
                    text: '<i class="fa-sharp fa-solid fa-copy "></i>',
                    titleAttr: 'Copy'
                },
                {
                    extend: 'excel',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6]
                    },
                    className: 'fs-sm btn btn-sm btn-outline-success glyphicon glyphicon-list-alt',
                    text: '<i class="fa-sharp fa-solid fa-file-excel "></i>',
                    titleAttr: 'Excel'
                },

                {
                    extend: 'print',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6]
                    },
                    className: 'fs-sm btn btn-sm btn-outline-primary glyphicon glyphicon-print',
                    text: '<i class="fa-sharp fa-solid fa-print "></i>',
                    titleAttr: 'PRINT'
                },
                {
                    extend: 'pdf',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6]
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
                targets: [0, 5, 7],
                orderable: false,
                className: "text-center",
            },{
                targets: [4, 6],
                // orderable: false,
                className: "text-right",
            }, {
                width: "15%",
                targets: [3],
            }, ],
            ajax: {
                url: "<?= route_to('admin.dt_daftar_test') ?>",
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
        dt_daftar_test();
    }
</script>
<?= $this->endSection() ?>