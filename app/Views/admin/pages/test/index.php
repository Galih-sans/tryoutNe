<?= $this->extend('admin/layout/app') ?>
<?= $this->section('header') ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.1/umd/popper.min.js"
    integrity="sha512-8jeQKzUKh/0pqnK24AfqZYxlQ8JdQjl9gGONwGwKbJiEaAPkD3eoIjz3IuX4IrP+dnxkchGUeWdXLazLHin+UQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"
    integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/tempus-dominus/6.0.1/js/tempus-dominus.js"
    integrity="sha512-Fv0/MWD9fG8wmeLGmbQ5pApaS2z60/DGEJIiAVHpi66UBDJZT7UMNLgVYjAO8gryHZtBvBaVAed+LTqw2OU04g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<link href="
  https://cdn.jsdelivr.net/gh/Eonasdan/tempus-dominus@master/dist/css/tempus-dominus.css" rel="stylesheet" />

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
<link rel="stylesheet" href="<?= base_url('css/datatables/dataTables.bootstrap4.css') ?>">
<link rel="stylesheet" href="<?= base_url('css/datatables/buttons-bs4/buttons.bootstrap4.min.css') ?>">
<link href="https://cdn.jsdelivr.net/npm/smartwizard@6/dist/css/smart_wizard_all.min.css" rel="stylesheet"
    type="text/css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" />
<link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
<?= $this->endSection() ?>

<?= $this->section('aside') ?>
<?= $this->include('admin/pages/test/detail') ?>
<?= $this->endSection('aside') ?>

<?= $this->section('content') ?>
<div class="content ">
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
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#createModal">
                        <i class=" si si-plus"></i> Tambah Test Baru
                    </button>
                </div>
            </div>
            <div class="dataTables_wrapper dt-bootstrap5 no-footer">
                <table class="table table-bordered table-vcenter js-dataTable-full dataTable no-footer" id="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th class="fw-bold fs-sm" style="width: 5%;">Kelas</th>
                            <th class="fw-bold fs-sm" style="width: 35%;">Detail Test</th>
                            <th class="fw-bold fs-sm" style="width: 20%;">Detail Soal</th>
                            <th class="fw-bold fs-sm" style="width: 10%;">Harga</th>
                            <th class="fw-bold fs-sm" style="width: 15%;">Status</th>
                            <th class="fw-bold fs-sm" style="width: 15%;">Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->include('admin/pages/test/create') ?>
<?= $this->include('admin/pages/test/edit') ?>


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
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script>
    var subject;
    $(document).ready(function () {
        $('.selectpicker').selectpicker();
        test_dt();
        $("#createModal").on("hidden.bs.modal", function () {
            subject = '';
            $('.subject-form').empty().append(
                "<option disabled='disabled' SELECTED>Silahkan Pilih Topik</option>"
            ).prop("disabled", true);;
            $('.topic').empty().append(
                "<option disabled='disabled' SELECTED>Silahkan Pilih Topik</option>"
            ).prop("disabled", true);;
            $('#smartwizard,#smartwizard-edit').smartWizard("reset");
            $('.removeit').remove();
            onCancel();
        });
        $("#editModal").on("hidden.bs.modal", function () {
            subject = '';
            $('#smartwizard-edit').smartWizard("reset");
            $('#smartwizard').smartWizard("reset");
        });
        $('#smartwizard').smartWizard({
            selected: 0,
            theme: 'arrows',
            color: 'green',
            showStepURLhash: true,
            autoAdjustHeight: true,
            onFinish: onFinishCallback,
            transition: {
                animation: 'slideHorizontal', // Animation effect on navigation, none|fade|slideHorizontal|slideVertical|slideSwing|css(Animation CSS class also need to specify)
                speed: '400', // Animation speed. Not used if animation is 'css'
            },
            toolbar: {
                showNextButton: true, // show/hide a Next button
                showPreviousButton: true, // show/hide a Previous button
                position: 'bottom', // none/ top/ both bottom
                extraHtml: '<button class="btn btn-success" id="btnFinish" onclick="onFinishCallback()" disabled">Selesai</button>'
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
        $('#smartwizard-edit').smartWizard({
            selected: 0,
            theme: 'arrows',
            color: 'green',
            showStepURLhash: true,
            autoAdjustHeight: true,
            onFinish: onFinishEdit,
            transition: {
                animation: 'slideHorizontal', // Animation effect on navigation, none|fade|slideHorizontal|slideVertical|slideSwing|css(Animation CSS class also need to specify)
                speed: '400', // Animation speed. Not used if animation is 'css'
            },
            toolbar: {
                showNextButton: true, // show/hide a Next button
                showPreviousButton: true, // show/hide a Previous button
                position: 'bottom', // none/ top/ both bottom
                extraHtml: '<button class="btn btn-success d-none" id="edit-btnFinish" onclick="onFinishEdit()" disabled">Selesai</button>'
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
            useCurrent: true,
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
            useCurrent: true,
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
        new tempusDominus.TempusDominus(document.getElementById('datetimepicker3'), {
            useCurrent: true,
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
        new tempusDominus.TempusDominus(document.getElementById('datetimepicker4'), {
            useCurrent: true,
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
        ).prop('disabled', true);
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
    $('#edit_number_of_questions').on('change', function () {
        $('#edit_total_questipon').val($('#edit_number_of_questions').val());
    });
    $('#type').on('change', function () {
        console.log($('#type').find(":selected").val());
        if ($('#type').find(":selected").val() == 'free') {
            $('#price-div').addClass('d-none').removeClass('d-block');
            $('#price').prop('required', false);
            $('#smartwizard').smartWizard("fixHeight");
        } else {
            $('#price-div').addClass('d-block').removeClass('d-none');
            $('#price').prop('required', true);
            $('#smartwizard').smartWizard("fixHeight");
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
                    if (compositon != '') {
                        select.val(compositon[0].topic_id).trigger('change');
                        $.each(compositon, function (i, v) {
                            if (i === 0) return true;
                            var topic_select = $('#edit_subject' + i).parents('.addnew')
                                .find(".topic");
                            topic_select.val(compositon[i].topic_id).trigger('change');
                            $('#edit_number_question' + i).val(compositon[i]
                                .number_of_question);
                        });
                    }
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
<script>
    $(document).ready(function () {
        $("#smartwizard, #smartwizard-edit").on("leaveStep", function (e, anchorObject, currentStepIdx,
            nextStepIdx,
            stepDirection) {
            // Validate only on forward movement  
            if (stepDirection == 'forward') {
                // console.log($('#smartwizard'));
                // console.log(this.id);
                let form;
                let smartwizard;
                if (this.id == "smartwizard") {
                    form = document.getElementById('form-' + (currentStepIdx + 1));
                    smartwizard = $('#smartwizard');
                } else {
                    form = document.getElementById('edit-form-' + (currentStepIdx + 1));
                    smartwizard = $('#smartwizard-edit');
                }
                if (form) {
                    if (!form.checkValidity()) {
                        form.classList.add('was-validated');
                        smartwizard.smartWizard("setState", [currentStepIdx], 'error');
                        smartwizard.smartWizard('fixHeight');
                        return false;
                    }
                    smartwizard.smartWizard("unsetState", [currentStepIdx], 'error');
                }
            }
        });
        $("#smartwizard, #smartwizard-edit").on("showStep", function (e, anchorObject, stepIndex, stepDirection, stepPosition) {
            $("#prev-btn").removeClass('disabled').prop('disabled', false);
            $("#next-btn").removeClass('disabled').prop('disabled', false);
            if (stepPosition === 'first') {
                $("#prev-btn").addClass('disabled').prop('disabled', true);
                $(".sw-btn-next").addClass('d-inline').removeClass('d-none').prop('disabled', false);
            } else if (stepPosition === 'last') {
                $(".sw-btn-next").addClass('disabled').addClass('d-none').removeClass('d-inline').prop(
                    'disabled', true);
            } else {
                $("#prev-btn").removeClass('disabled').prop('disabled', false);
                $(".sw-btn-next").removeClass('disabled').addClass('d-inline').removeClass('d-none')
                    .prop('disabled', false);
            }
            let stepInfo
            if (this.id == "smartwizard") {
                stepInfo = $('#smartwizard').smartWizard("getStepInfo");
            }else{
                stepInfo = $('#smartwizard-edit').smartWizard("getStepInfo");
            }
           
            $("#sw-current-step").text(stepInfo.currentStep + 1);
            $("#sw-total-step").text(stepInfo.totalSteps);
            if (this.id == "smartwizard") {
                if (stepPosition == 'last') {
                $("#btnFinish").prop('disabled', true).addClass('d-inline').removeClass('d-none');
            } else {
                $("#btnFinish").prop('disabled', true).addClass('d-none').removeClass('d-inline');
            }
            }else{
                if (stepPosition == 'last') {
                $("#edit-btnFinish").prop('disabled', false).addClass('d-inline').removeClass('d-none');
            } else {
                $("#edit-btnFinish").prop('disabled', true).addClass('d-none').removeClass('d-inline');
            }
                }
            

            // Focus first name
            if (stepIndex == 1) {
                setTimeout(() => {
                    $('#test_name').focus();
                }, 0);
            }
        });

    })

    function onFinishCallback() {
        Swal.fire({
            text: "Sedang Memproses Data",
            allowOutsideClick: false,
        });
        Swal.showLoading();
        $.ajax({
            url: "<?= route_to('admin.test.add_test') ?>",
            type: "POST",
            data: $('#form-1,#form-2').serialize(),
            success: function (d) {
                var d = JSON.parse(d);
                console.log(d);
                if (d.success == true) {
                    $('#createModal').hide();
                    $(document.body).removeClass('modal-open');
                    $('.modal-backdrop').remove();
                    Swal.fire({
                        title: 'Status :',
                        text: d.message,
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 1500
                    });
                } else {
                    Swal.fire({
                        title: 'Status :',
                        html: d.message +
                            '<br>',
                        icon: 'error',
                        showConfirmButton: false,
                        timer: 300
                    });
                }
                refresh_dt();
            },
            error: function (error) {
                console.log(error);
                Swal.close();
            }
        });
    }
    function onFinishEdit() {
        Swal.fire({
            text: "Sedang Memproses Data",
            allowOutsideClick: false,
        });
        Swal.showLoading();
        $.ajax({
            url: "<?= route_to('admin.test.edit_test') ?>",
            type: "POST",
            data: $('#edit-form-1,#edit-form-2').serialize(),
            success: function (d) {
                var d = JSON.parse(d);
                console.log(d);
                if (d.success == true) {
                    $('#createModal').hide();
                    $(document.body).removeClass('modal-open');
                    $('.modal-backdrop').remove();
                    Swal.fire({
                        title: 'Status :',
                        text: d.message,
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 1500
                    });
                } else {
                    Swal.fire({
                        title: 'Status :',
                        html: d.message +
                            '<br>',
                        icon: 'error',
                        showConfirmButton: false,
                        timer: 300
                    });
                }
                refresh_dt();
            },
            error: function (error) {
                console.log(error);
                Swal.close();
            }
        });
    }

    function onCancel() {
        $('#smartwizard, #smartwizard-edit').smartWizard("reset");
        document.getElementById("form-1").reset();
        document.getElementById("form-2").reset();
        document.getElementById("edit-form-1").reset();
        document.getElementById("edit-form-2").reset();
    }
</script>
<script>
    var i = 0;
    $("#dynamic-ar").click(function () {
        ++i;
        $("#dynamicAddRemove").append(
            '<div id="removeit" class="input-group mb-3 removeit addnew"><div class="col-12 col-md-5"><select class="form-control form-select subject-form" name="subject[' +
            i + ']" id="subject' + i +
            '" data-placeholder="Silahkan Pilih Mata Pelajaran" disabled></select></div><div class="col-12 col-md-4"><select class="form-control form-select topic" name="topic[' +
            i +
            ']" data-placeholder="Silahkan Pilih Topik Mata Pelajaran" disabled></select></div><div class="col-12 col-md-2"><input type="number" class="form-control form-rounded number-of-question" id="number_question" name="number_question[' +
            i +
            ']" placeholder="Jumlah Soal"></div><div class="col-12 col-md-1"><button type="button" class="btn btn-danger remove-input-field"><i class="fa-solid fa-minus"></i></button></div></div>'
        );
        $('#smartwizard').smartWizard("fixHeight");
        var select = $('#subject' + i);
        var select2 = $('#subject' + i).parents('.addnew').find(".topic");
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
    $(document).on("change", ".number-of-question", function () {
        var sum = 0;
        $(".number-of-question").each(function () {
            sum += +$(this).val();
        });
        if ($('.topic option').is(':selected') && $('.subject-form option').is(':selected')) {
            if (sum != $('#number_of_questions').val()) {
                $("#btnFinish").prop('disabled', true)
            } else {
                $("#btnFinish").prop('disabled', false)
            }
        }
    });
    $(document).on("change", ".edit-number-of-question", function () {
        var sum = 0;
        $(".edit-number-of-question").each(function () {
            sum += +$(this).val();
        });
        console.log(sum);
        if ($('.topic option').is(':selected') && $('.subject-form option').is(':selected')) {
            if (sum != $('#edit_number_of_questions').val()) {
                $("#edit-btnFinish").prop('disabled', true)
            } else {
                $("#edit-btnFinish").prop('disabled', false)
            }
        }
    });

    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('#removeit').remove();
        $('#smartwizard').smartWizard("fixHeight");
    });
</script>
<script>
    $('#table').on('click', 'tbody .click', function () {

        $("#page-container").addClass('side-overlay-o');
        One.loader('show');
        $('#div-composition-delete').remove();
        $('#div-composition').append('<div id="div-composition-delete"></div>');
        $.ajax({
            url: "<?= route_to('admin.test.get_test') ?>",
            type: "POST",
            data: {
                id: $(this).data("id"),
            },
            success: function (d) {
                var d = JSON.parse(d);
                console.log(d);
                $("#v-test-name , #v-b-test-name").text(d.testData.test_name);
                $("#v-date").text(d.testData.begin_time + " - " + d.testData.end_time);
                $("#v-correct-value").text(d.testData.correct_answer_value);
                $("#v-wrong-value").text(d.testData.wrong_answer_value);
                $("#v-empty-value").text(d.testData.empty_answer_value);
                $("#v-duration").text(d.testData.duration + " Menit");
                if (d.testData.random_question == 1) {
                    $("#v-i-random_question").removeClass().addClass(
                        'fa-solid fa-check text-success');
                } else {
                    $("#v-i-random_question").removeClass().addClass(
                        'fa-solid fa-xmark text-danger');
                }
                if (d.testData.random_answer == 1) {
                    $("#v-i-random_answer").removeClass().addClass(
                        'fa-solid fa-check text-success');
                } else {
                    $("#v-i-random_answer").removeClass().addClass('fa-solid fa-xmark text-danger');
                }
                if (d.testData.result_to_student == 1) {
                    $("#v-i-show_result").removeClass().addClass('fa-solid fa-check text-success');
                } else {
                    $("#v-i-show_result").removeClass().addClass('fa-solid fa-xmark text-danger');
                }
                $("#v-type").text(d.testData.type);
                if (d.testData.type != 'free') {
                    $("#v-price").text(d.testData.price);
                }
                $.each(d.compositonData, function (i, data) {
                    $('#div-composition-delete').append(
                        '<div class="text-dark d-flex py-1"><div class="flex-shrink-0 mt-2 me-3 ms-2"><i class="fa-solid fa-bookmark fa-xl text-neo align-middle"></i></div><div class="flex-grow-1 fs-sm"><div class="fw-semibold"><p>' +
                        data.subject + '</p> <p class="fw-semibold"> <small> (' + data
                        .topic + ')</small></p> </div><small class="text-muted">' + data
                        .number_of_question + '</small></div></div>'
                    )
                });
            },
            error: function (error) {
                alert(error);
            }
        });
        setTimeout(function () {
            One.loader('hide');
        }, 1000)
    })

    $(document).on('click', '.delete-button', function () {
        let id = $(this).data("id");
        console.log(id);
        delete_data(id);
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
                $.ajax({
                    url: "<?= route_to('admin.test.remove_test') ?>",
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
    }

    function test_dt() {
        $('#table').DataTable({
            // responsive: true,
            oLanguage: {
                sProcessing: '<div class="spinner-border neo" role="status"><span class="sr-only"></span></div>'
            },
            dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center mx-0 yx-0'B><'col-sm-4'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-6'i><'col-sm-6'p>>",
            buttons: [{
                    extend: 'copy',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5]
                    },
                    className: 'fs-sm btn btn-sm btn-outline-secondary glyphicon glyphicon-duplicate',
                    text: '<i class="fa-sharp fa-solid fa-copy "></i>',
                    titleAttr: 'Copy'
                },
                {
                    extend: 'excel',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5]
                    },
                    className: 'fs-sm btn btn-sm btn-outline-success glyphicon glyphicon-list-alt',
                    text: '<i class="fa-sharp fa-solid fa-file-excel "></i>',
                    titleAttr: 'Excel'
                },

                {
                    extend: 'print',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5]
                    },
                    className: 'fs-sm btn btn-sm btn-outline-primary glyphicon glyphicon-print',
                    text: '<i class="fa-sharp fa-solid fa-print "></i>',
                    titleAttr: 'PRINT'
                },
                {
                    extend: 'pdf',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5]
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
            orderable: true,
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
                },
                {
                    "width": "5%",
                    "targets": [0, 1]
                },
                {
                    "width": "30%",
                    "targets": 2
                },
                {
                    "width": "15%",
                    "targets": [3, 4]
                },
                {
                    "width": "15%",
                    "targets": [5, 6]
                },
            ],
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
    }

    function refresh_dt() {
        test_dt();
    }
</script>
<script>
    $(document).on('click', '.edit-button', function () {
        let id = $(this).data("id");
        console.log(id);
        get_test(id);
        $('#editModal').modal('show');
    });
    var compositon = '';

    function get_test(id) {
        $.ajax({
            url: "<?= route_to('admin.test.get_edit') ?>",
            type: "POST",
            data: {
                id: id,
            },
            success: function (d) {
                var d = JSON.parse(d);
                $('#edit_test_name').val(d.testData.test_name);
                $('.edit_start_date').val(d.testData.begin_time);
                $('.edit_end_date').val(d.testData.end_time);
                $('#edit_duration').val(d.testData.duration);
                $('#edit_true_value').val(d.testData.correct_answer_value);
                $('#edit_false_value').val(d.testData.wrong_answer_value);
                $('#edit_null_value').val(d.testData.empty_answer_value);
                $('#edit_number_of_questions').val(d.testData.number_of_question);
                $('#edit_number_of_questions').val(d.testData.number_of_question);
                $('.edit_class').selectpicker('val', d.testData.class_id).trigger('change');
                $('.edit_type').selectpicker('val', d.testData.type).trigger('change');
                $('#edit_price').val(d.testData.price);
                $('#edit_total_questipon').val(d.testData.number_of_question);
                if (d.testData.random_question == 1) {
                    $('#edit_random_question').prop('checked', true);
                } else {
                    $('#edit_random_question').prop('checked', false);
                }
                if (d.testData.random_answer == 1) {
                    $('#edit_random_answer').prop('checked', true);
                } else {
                    $('#edit_random_answer').prop('checked', false);
                }
                if (d.testData.result_to_student == 1) {
                    $('#edit_show_result').prop('checked', true);
                } else {
                    $('#edit_show_result').prop('checked', false);
                }
                $('#test_id').val(id);
                $('#edit_number_question').val(d.compositonData[0].number_of_question);
                compositon = d.compositonData;
                j=d.compositonData.length;
                console.log(d);
            },
            error: function (error) {
                alert(error);
            }
        });
    }
    $('#edit_class').on('change', function () {
        subject = '';
        var selected = $('#edit_class').val();
        $('#edit_subject_name').val($("#edit_class option:selected").text());
        var select = $('#edit_subject');
        $('.subject-form').prop("disabled", false);
        $('.topic').empty().append(
            "<option disabled='disabled' SELECTED>Silahkan Pilih Topik</option>"
        ).prop('disabled', true);
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

                    select.select2({
                        theme: "bootstrap-5",
                        width: $(this).data('width') ? $(this).data('width') : $(this)
                            .hasClass('w-100') ? '100%' : 'style',
                        placeholder: $(this).data('placeholder'),
                        data: subject,
                    });
                    select.val(compositon[0].subject_id).trigger('change');
                    $.each(compositon, function (i, v) {
                        if (i === 0) return true;
                        $("#edit-dynamicAddRemove").append(
                            '<div id="edit-removeit" class="input-group mb-3 removeit addnew"><div class="col-12 col-md-5"><select class="form-control form-select subject-form" name="composition['+i+'][subject]" id="edit_subject' + i +
                            '" data-placeholder="Silahkan Pilih Mata Pelajaran"></select></div><div class="col-12 col-md-4"><select class="form-control form-select topic" name="composition['+i+'][topic]" data-placeholder="Silahkan Pilih Topik Mata Pelajaran" disabled></select></div><div class="col-12 col-md-2"><input type="number" class="form-control form-rounded edit-number-of-question" id="edit_number_question' +
                            i + '" name="composition['+i+'][number_question]" placeholder="Jumlah Soal"></div><div class="col-12 col-md-1"><button type="button" class="btn btn-danger edit-remove-input-field"><i class="fa-solid fa-minus"></i></button></div></div>'
                        );
                        $('#edit_subject' + i).select2({
                            theme: "bootstrap-5",
                            width: $(this).data('width') ? $(this).data('width') :
                                $(this)
                                .hasClass('w-100') ? '100%' : 'style',
                            placeholder: $(this).data('placeholder'),
                            data: subject,
                        }).val(compositon[i].subject_id).trigger('change');
                    });
                    $('#smartwizard-edit').smartWizard("fixHeight");
                    console.log(compositon);
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
    $('.edit_type').on('change', function () {
        console.log($('.edit_type').find(":selected").val());
        if ($('.edit_type').find(":selected").val() == 'free') {
            $('#edit-price-div').addClass('d-none').removeClass('d-block');
            $('#edit_price').prop('required', false);
        } else {
            $('#edit-price-div').addClass('d-block').removeClass('d-none');
            $('#edit_price').prop('required', true);
        }
    });

    
    var j;
    $("#edit-dynamic-ar").click(function () {
        ++j;
        console.log(j);
        console.log(compositon.length);
        
        $("#edit-dynamicAddRemove").append(
            '<div id="edit-removeit" class="input-group mb-3 removeit addnew"><div class="col-12 col-md-5"><select class="form-control form-select subject-form" name="composition['+j+'][subject]" id="edit_subject' + j +
            '" data-placeholder="Silahkan Pilih Mata Pelajaran" disabled></select></div><div class="col-12 col-md-4"><select class="form-control form-select topic" name="composition['+j+'][topic]" data-placeholder="Silahkan Pilih Topik Mata Pelajaran" disabled></select></div><div class="col-12 col-md-2"><input type="number" class="form-control form-rounded edit-number-of-question" id="number_question" name="composition['+j+'][number_question]" placeholder="Jumlah Soal"></div><div class="col-12 col-md-1"><button type="button" class="btn btn-danger edit-remove-input-field"><i class="fa-solid fa-minus"></i></button></div></div>'
        );
        $('#smartwizard-edit').smartWizard("fixHeight");
        var select = $('#edit_subject' + j);
        var select2 = $('#edit_subject' + j).parents('.addnew').find(".topic");
        if ($('#edit_class').val() == '') {
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
    $(document).on('click', '.edit-remove-input-field', function () {
        $(this).parents('#edit-removeit').remove();
        $('#smartwizard-edit').smartWizard("fixHeight");
    });
</script>
<?= $this->endSection() ?>