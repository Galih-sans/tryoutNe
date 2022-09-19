<?= $this->extend('admin/layout/app') ?>
<?= $this->section('header') ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.1/umd/popper.min.js"
    integrity="sha512-8jeQKzUKh/0pqnK24AfqZYxlQ8JdQjl9gGONwGwKbJiEaAPkD3eoIjz3IuX4IrP+dnxkchGUeWdXLazLHin+UQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- moment.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"
    integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdn.jsdelivr.net/gh/Eonasdan/tempus-dominus@master/dist/js/tempus-dominus.js"></script>
<link href="https://cdn.jsdelivr.net/gh/Eonasdan/tempus-dominus@master/dist/css/tempus-dominus.css" rel="stylesheet" />

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
<link rel="stylesheet" href="<?= base_url('css/datatables/dataTables.bootstrap4.css') ?>">
<link rel="stylesheet" href="<?= base_url('css/datatables/buttons-bs4/buttons.bootstrap4.min.css') ?>">
<link href="https://cdn.jsdelivr.net/npm/smartwizard@6/dist/css/smart_wizard_all.min.css" rel="stylesheet"
    type="text/css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" />
<link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
<?= $this->endSection() ?>
<?= $this->section('content') ?>

<div class="content">
    <div class="block block-rounded pb-2 shadow-sm">
        <div class="block-header block-header-default">
            <h3 class="block-title">
                Daftar Test <small>( Neo Edukasi )</small>
            </h3>
            <div class="block-options">
                <button type="button" class="btn-block-option" data-toggle="block-option"
                    data-action="fullscreen_toggle"></button>
                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle"
                    data-action-mode="demo">
                    <i class="si si-refresh"></i>
                </button>
            </div>
        </div>
        <div class="block-content fs-sm">
            <div class="row pb-2 mb-3 shadow-sm align-center">
                <div class="col-12 col-md-12 text-right">
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#createModal"">
                        <i class=" si si-plus"></i> Tambah Test Baru
                    </button>
                </div>
            </div>
            <div class="dataTables_wrapper dt-bootstrap5 no-footer">
                <table class="table table-bordered table-vcenter js-dataTable-full dataTable no-footer" id="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Jenjang Test</th>
                            <th>Informasi Test</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->include('admin/pages/test/create2') ?>


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
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/bootstrap-select.min.js"></script>
<!-- Page JS Code -->
<script src="<?= base_url('js/pages/tables_datatables.js') ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/smartwizard@6/dist/js/jquery.smartWizard.min.js" type="text/javascript">
</script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    var subject;
    $(document).ready(function () {
        $('.selectpicker').selectpicker();
        $('#table').DataTable({
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
                url: "<?= route_to('admin.test.dt_test') ?>",
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

        });
        $("#createModal").on("hidden.bs.modal", function () {
            subject = '';
            $('.subject-form').empty().append(
                "<option disabled='disabled' SELECTED>Silahkan Pilih Topik</option>"
            ).prop("disabled", true);;
            $('.topic').empty().append(
                "<option disabled='disabled' SELECTED>Silahkan Pilih Topik</option>"
            ).prop("disabled", true);;
            $('#smartwizard').smartWizard("reset");
            $('.removeit').remove();
        });
        $('#smartwizard').smartWizard({
            selected: 0,
            theme: 'arrows',
            color: 'green',
            showStepURLhash: true,
            autoAdjustHeight: true,
            transition: {
                animation: 'slideHorizontal', // Animation effect on navigation, none|fade|slideHorizontal|slideVertical|slideSwing|css(Animation CSS class also need to specify)
                speed: '400', // Animation speed. Not used if animation is 'css'
                easing: '', // Animation easing. Not supported without a jQuery easing plugin. Not used if animation is 'css'
                prefixCss: '', // Only used if animation is 'css'. Animation CSS prefix
                fwdShowCss: '', // Only used if animation is 'css'. Step show Animation CSS on forward direction
                fwdHideCss: '', // Only used if animation is 'css'. Step hide Animation CSS on forward direction
                bckShowCss: '', // Only used if animation is 'css'. Step show Animation CSS on backward direction
                bckHideCss: '', // Only used if animation is 'css'. Step hide Animation CSS on backward direction
            },
            toolbar: {
                position: 'bottom', // none|top|bottom|both
                showNextButton: true, // show/hide a Next button
                showPreviousButton: true, // show/hide a Previous button
                extraHtml: '' // Extra html to show on toolbar
            },
            anchor: {
                enableNavigation: true, // Enable/Disable anchor navigation 
                enableNavigationAlways: false, // Activates all anchors clickable always
                enableDoneState: true, // Add done state on visited steps
                markPreviousStepsAsDone: true, // When a step selected by url hash, all previous steps are marked done
                unDoneOnBackNavigation: false, // While navigate back, done state will be cleared
                enableDoneStateNavigation: true // Enable/Disable the done state navigation
            },
            keyboard: {
                keyNavigation: true, // Enable/Disable keyboard navigation(left and right keys are used if enabled)
                keyLeft: [37], // Left key code
                keyRight: [39] // Right key code
            },
            lang: { // Language variables for button
                next: 'Selanjutnya',
                previous: 'Sebelumnya'
            },
            errorSteps: [], // Array Steps error
            warningSteps: [], // Array Steps warning

        });
        new tempusDominus.TempusDominus(document.getElementById('datetimepicker'), {
            useCurrent: false,
            display: {
                viewMode: 'calendar',
                buttons: {
                    close: true,
                },
                components: {
                    useTwentyfourHour: true,
                    decades: false,
                    year: true,
                    month: true,
                    date: true,
                    hours: true,
                    minutes: true,
                    seconds: false
                },
                icons: {
                    type: 'icons',
                    time: 'fa-solid fa-clock',
                    date: 'fa-solid fa-calendar',
                    up: 'fa-solid fa-arrow-up',
                    down: 'fa-solid fa-arrow-down',
                    previous: 'fa-solid fa-chevron-left',
                    next: 'fa-solid fa-chevron-right',
                    today: 'fa-solid fa-calendar-check',
                    clear: 'fa-solid fa-trash',
                    close: 'fa-solid fa-xmark'
                },
            }
        });
        new tempusDominus.TempusDominus(document.getElementById('datetimepicker2'), {
            useCurrent: false,
            display: {
                viewMode: 'calendar',
                buttons: {
                    close: true,
                },
                components: {
                    useTwentyfourHour: true,
                    decades: false,
                    year: true,
                    month: true,
                    date: true,
                    hours: true,
                    minutes: true,
                    seconds: false
                },
                icons: {
                    type: 'icons',
                    time: 'fa-solid fa-clock',
                    date: 'fa-solid fa-calendar',
                    up: 'fa-solid fa-arrow-up',
                    down: 'fa-solid fa-arrow-down',
                    previous: 'fa-solid fa-chevron-left',
                    next: 'fa-solid fa-chevron-right',
                    today: 'fa-solid fa-calendar-check',
                    clear: 'fa-solid fa-trash',
                    close: 'fa-solid fa-xmark'
                },
            }
        });
        $('#subject, #topic').select2({
            theme: "bootstrap-5",
            width: $(this).data('width') ? $(this).data('width') : $(this)
                .hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
        });
    });
    $('#class').on('change', function () {
        subject = '';
        var selected = $('#class').val();
        $('#subject_name').val($("#class option:selected").text());
        var select = $('#subject');
        $('.subject-form').prop("disabled", false);
        $('.topic').empty().append(
            "<option disabled='disabled' SELECTED>Silahkan Pilih Topik</option>"
        ).prop('disabled',true);
        $.ajax({
            url: "<?= route_to('admin.bank-soal.get_subject') ?>",
            type: "POST",
            data: {
                class_id: selected,
            },
            success: function (response) {
                response = JSON.parse(response);
                $('.removeit').remove();
                subject = response;
                console.log(subject);
                // let optionList = document.getElementById('subject').options;
                if (response.length != 0) {
                    $('.subject-form').prop("disabled", false);
                    select.empty().append(
                        "<option disabled='disabled' SELECTED>Silahkan Pilih Mata Pelajaran</option>"
                    );
                    select.select2({
                        theme: "bootstrap-5",
                        width: $(this).data('width') ? $(this).data('width') : $(this)
                            .hasClass('w-100') ? '100%' : 'style',
                        placeholder: $(this).data('placeholder'),
                        data: subject,
                    });
                } else {
                    select.empty().append(
                        "<option disabled='disabled' SELECTED>Mata Pelajaran Masih Kosong</option>"
                    );
                    select.prop("disabled", true);
                }
            },
            error: function (error) {
                console.log(error);
            }
        });
    });
    $('#number_of_questions').on('change', function () {
        $('#total_questipon').val($('#number_of_questions').val());
    });
    $('#type').on('change', function () {
        console.log($('#type').find(":selected").val());
        if ($('#type').find(":selected").val() == 'free') {
            $('#price').addClass('d-none').removeClass('d-block');
        } else {
            $('#price').addClass('d-block').removeClass('d-none');
        }
    });
    $(document).on('change', '.subject-form', function () {
        var select = $(this).parents('.addnew').find(".topic");
        var selected = $(this).val();
        $.ajax({
            url: "<?= route_to('admin.bank-soal.get_topic') ?>",
            type: "POST",
            data: {
                subject_id: selected,
            },
            success: function (response) {
                response = JSON.parse(response);
                if (response.length != 0) {
                    select.prop("disabled", false);
                    select.empty().append(
                        "<option disabled='disabled' SELECTED>Silahkan Pilih Topik</option>"
                    );
                    select.select2({
                        theme: "bootstrap-5",
                        width: $(this).data('width') ? $(this).data('width') : $(this)
                            .hasClass('w-100') ? '100%' : 'style',
                        placeholder: $(this).data('placeholder'),
                        data: response,
                    });
                } else {
                    select.empty().append(
                        "<option disabled='disabled' SELECTED>Topik Masih Kosong</option>"
                    );
                    select.prop("disabled", true);
                }
            },
            error: function (error) {
                console.log(error);
            }
        });
    });
</script>
<script type="text/javascript">
    var i = 0;
    $("#dynamic-ar").click(function () {
        ++i;
        $("#dynamicAddRemove").append(

            '<div id="removeit" class="input-group mb-3 removeit addnew"><div class="col-12 col-md-5"><select class="form-control form-select subject-form" name="subject[' +
            i + ']" id="subject' + i +
            '" data-placeholder="Silahkan Pilih Mata Pelajaran" disabled></select></div><div class="col-12 col-md-4"><select class="form-control form-select topic" name="topic[' +
            i +
            ']" data-placeholder="Silahkan Pilih Topik Mata Pelajaran" disabled></select></div><div class="col-12 col-md-2"><input type="number" class="form-control form-rounded" id="number_question" name="number_question[' +
            i +
            ']" placeholder="Jumlah Soal"></div><div class="col-12 col-md-1"><button type="button" class="btn btn-danger remove-input-field"><i class="fa-solid fa-minus"></i></button></div></div>'
        );
        $('#smartwizard').smartWizard("fixHeight");
        var select = $('#subject' + i);
        var select2 = $('#subject' + i).parents('.addnew').find(".topic");
        console.log($('#class').val());
        if ($('#class').val() == '') {
            select.empty().append(
                "<option disabled='disabled' SELECTED>Silahkan Pilih Mata Pelajaran</option>"
            ).prop('disabled', true);
            select2.empty().append(
                "<option disabled='disabled' SELECTED>Silahkan Pilih Topik</option>"
            ).prop('disabled', true);
        } else {
            select.empty().append(
                "<option disabled='disabled' SELECTED>Silahkan Pilih Mata Pelajaran</option>"
            ).prop('disabled', false);
            select2.empty().append(
                "<option disabled='disabled' SELECTED>Silahkan Pilih Topik</option>"
            ).prop('disabled', false);
        }
        select.select2({
            theme: "bootstrap-5",
            width: $(this).data('width') ? $(this).data('width') : $(this)
                .hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
            data: subject,
        });
        select2.select2({
            theme: "bootstrap-5",
            width: $(this).data('width') ? $(this).data('width') : $(this)
                .hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
        }).prop('disabled', true);

    });

    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('#removeit').remove();
        $('#smartwizard').smartWizard("fixHeight");
    });
</script>
<?= $this->endSection() ?>