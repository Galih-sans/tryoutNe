<?= $this->extend('admin/layout/app') ?>
<?= $this->section('header') ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<link rel="stylesheet" href="<?= base_url('css/datatables/dataTables.bootstrap4.css') ?>">
<link rel="stylesheet" href="<?= base_url('css/datatables/buttons-bs4/buttons.bootstrap4.min.css') ?>">
<link href="<?= base_url('assets-front/css/nucleo-icons.css') ?>" rel="stylesheet" />
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="content">
    <div class="block block-rounded pb-2 shadow-sm">
        <div class="block-header block-header-ne">
            <h3 class="block-title text-white">
                Bank Soal Neo Edukasi
            </h3>
            <div class="block-options ">
                <button type="button" class="btn-block-option-white" data-toggle="block-option" data-action="state_toggle" id="refresh" data-action-mode="demo">
                    <i class="si si-refresh"></i>
                </button>
                <button type="button" class="btn-block-option-white" data-toggle="block-option" data-action="close">
                    <i class="si si-close"></i>
                </button>
            </div>
        </div>
        <div class="block-content fs-sm">
            <div class="input-group mb-3">
                <label class="input-group-text bg-neo text-white" for="inputGroupSelect01" style="width:80px;">Kelas</label>
                <select name="level" id="level" title="Silahkan Pilih Kelas" class="form-control selectpicker border" data-live-search="true" data-style="customSelect" data-dropup-auto="false" data-size="4">
                    <?php if ($data['class']) : ?>
                        <?php foreach ($data['class'] as $class) : ?>
                            <tr>
                                <option value="<?= $class->id ?>"><?= '( ' . $class->level . ' ) ' . $class->class ?>
                                </option>
                            </tr>
                    <?php
                        endforeach;
                    endif; ?>
                </select>
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text bg-neo text-white" for="inputGroupSelect01" style="width:80px;">Mapel</label>
                <select name="subject" id="subject" class="form-control selectpicker border" data-live-search="true" data-style="customSelect" disabled>
                </select>
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text bg-neo text-white" for="inputGroupSelect01" style="width:80px;">Topik</label>
                <select name="topic" id="topic" class="form-control selectpicker border" data-live-search="true" data-style="customSelect" disabled>
                </select>
            </div>
        </div>
    </div>
    <div class="block block-rounded pb-2 shadow-sm d-none" id="question-datatables">
        <div class="block-content">
            <div class="col-12 col-md-12 text-right">
                <button type="button" class="btn btn-primary btn-sm" onclick="tambah()">
                <i class="fa-solid fa-plus"></i>
                </button>
            </div>
            <table id="example" class="table table-bordered table-vcenter js-dataTable-full no-footer dtr-inline collapsed" style="width:100%">
                <thead>
                    <tr>
                        <th width="10%" class="fs-sm fw-normal">#</th>
                        <th width="30%" class="fs-sm fw-normal">Deskripsi Soal</th>
                        <th width="30%" class="fs-sm fw-normal">Pembahasan</th>
                        <th width="30%" class="fs-sm fw-normal">Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
<form id="question-form">
    <div class="modal fade" id="questionModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="block block-rounded block-transparent mb-0">
                    <div class="block-header block-header-ne">
                        <h3 class="block-title text-white">Tambah Soal Untuk Mata Pelajaran : </h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option-white" data-bs-dismiss="modal" aria-label="Close">
                                <i class="fa fa-fw fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content fs-sm">
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <div class="col-12 col-md-12 mb-2">
                                    <span class="" style="letter-spacing: -em">
                                        <meta charset="utf-8">⋮⋮⋮
                                    </span> &nbsp;
                                    <span class="tittle-neo"> Deskripsi Soal</span>
                                    <input type="hidden" name="question" value="">
                                    <div class="form-control" id="question" style="min-height: 160px;"></div>
                                </div>
                                <div class="col-12 col-md-12">
                                    <span class="color-ne" style="letter-spacing: -em">
                                        <meta charset="utf-8">⋮⋮⋮
                                    </span> &nbsp;
                                    <span class="tittle-neo"> Pembahasan</span>
                                    <input type="hidden" name="discussion" value="">
                                    <input type="hidden" id="level-form" name="level" value="">
                                    <input type="hidden" id="subject-form" name="subject" value="">
                                    <input type="hidden" id="topic-form" name="topic" value="">
                                    <div class="form-control" id="discussion" style="min-height: 160px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block-content block-content-full text-end bg-body">
                        <button type="button" class="btn btn-sm btn-secondary me-1" data-bs-dismiss="modal">Tutup</button>
                        <button type="button" class="btn btn-sm btn-primary" data-bs-target="#answerModal" data-bs-toggle="modal" data-bs-dismiss="modal">Jawaban</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="answerModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="answerModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="block block-rounded block-transparent mb-0">
                    <div class="block-header block-header-ne">
                        <h3 class="block-title text-white">Jawaban Soal : </h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option-white" data-bs-dismiss="modal" aria-label="Close">
                                <i class="fa fa-fw fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content fs-sm">
                        <div class="row">
                            <div class="col-12 col-md-12">
                                
                                <span class="" style="letter-spacing: -em">
                                    <meta charset="utf-8">⋮⋮⋮
                                </span> &nbsp;
                                <span class="tittle-neo"> Tambah Jawaban</span>
                                <button type="button" name="add" id="dynamic-ar" class="btn btn-primary btn-sm mx-3" type="button"><i class="fa fa-fw fa-plus"></i></button>
                                <div class="mb-2">
                                    <span class="tittle-neo"><i class="fa fa-info-circle"></i> Centang untuk jawaban yang benar</span>
                                </div>
                                <div class="col-12 col-md-12">
                                    <div class="row" id="dynamicAddRemove">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer block-content block-content-full text-end bg-body">
                            <button type="button" class="btn btn-sm btn-secondary me-1" data-bs-target="#questionModal" data-bs-toggle="modal" data-bs-dismiss="modal">Kembali</button>
                            <button type="button" class="btn btn-sm btn-primary" onclick="insert_data()">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- // edit modal -->
<form id="edit-form">
    <div class="modal fade" id="questionEditModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="block block-rounded block-transparent mb-0">
                    <div class="block-header block-header-ne">
                        <h3 class="block-title text-white">Edit Soal: </h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option-white" data-bs-dismiss="modal" aria-label="Close">
                                <i class="fa fa-fw fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content fs-sm">
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <div class="col-12 col-md-12 mb-2">
                                    <span class="" style="letter-spacing: -em">
                                        <meta charset="utf-8">⋮⋮⋮
                                    </span> &nbsp;
                                    <span class="tittle-neo"> Deskripsi Soal</span>
                                    <input type="hidden" name="edit_question" value="">
                                    <div class="form-control" id="edit_question" style="min-height: 160px;"></div>
                                </div>
                                <div class="col-12 col-md-12">
                                    <span class="color-ne" style="letter-spacing: -em">
                                        <meta charset="utf-8">⋮⋮⋮
                                    </span> &nbsp;
                                    <span class="tittle-neo"> Pembahasan</span>
                                    <input type="hidden" name="edit_discussion" value="">
                                    <div class="form-control" id="edit_discussion" style="min-height: 160px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block-content block-content-full text-end bg-body">
                        <button type="button" class="btn btn-sm btn-secondary me-1" data-bs-dismiss="modal">Tutup</button>
                        <button type="button" class="btn btn-sm btn-primary" data-bs-target="#answerEditModal" data-bs-toggle="modal" data-bs-dismiss="modal">Lanjut</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="answerEditModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="answerModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="block block-rounded block-transparent mb-0">
                    <div class="block-header block-header-ne">
                        <h3 class="block-title text-white">Edit Jawaban : </h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option-white" data-bs-dismiss="modal" aria-label="Close">
                                <i class="fa fa-fw fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content fs-sm">
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <span class="" style="letter-spacing: -em">
                                    <meta charset="utf-8">⋮⋮⋮
                                </span> &nbsp;
                                <span class="tittle-neo"> Tambah Jawaban</span>
                                <button type="button" name="add" onclick="tambah_edit()" id="tombol-tambah-edit" class="btn btn-primary btn-sm  mx-3" type="button"><i class="fa fa-fw fa-plus"></i></button>
                                <div class="mb-2">
                                    <span class="tittle-neo"><i class="fa fa-info-circle"></i> Centang untuk jawaban yang benar</span>
                                </div>
                                <div class="col-12 col-md-12">
                                    <div class="row" id="dynamicEditAddRemove">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer block-content block-content-full text-end bg-body">
                            <button type="button" class="btn btn-sm btn-secondary me-1" data-bs-target="#questionEditModal" data-bs-toggle="modal" data-bs-dismiss="modal">Kembali</button>
                            <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal" onclick="update_data()">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
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


<script>
    $(document).ready(function() {

        $(function() {
            // show_dt_question();
            $('#question-datatables').addClass('d-none').removeClass('d-block');
            $('.selectpicker').selectpicker();
        });
        $('#topic').on('change', function() {
            $('#question-datatables').addClass('d-block').removeClass('d-none');
            $('#level-form').val($('#level').val());
            $('#subject-form').val($('#subject').val());
            $('#topic-form').val($('#topic').val());
            show_dt_question();
        });
        create_quilljs('question');
        create_quilljs('discussion');
        create_quilljs('edit_question');
        create_quilljs('edit_discussion');
        // create_quilljs_simple('answer2');

        $('#refresh').on('click', refresh_dt)

    });
    var quill = [];
    var simple_quill = [];
    var i;

    function tambah() {
        $('#dynamicAddRemove').html(
            '<div class="col-12 col-md-6 mb-4"><span class="tittle-bold" style="letter-spacing: -em"><meta charset="utf-8"> A</span> ⋮⋮ &nbsp; <input type="hidden" name="answer[0][isright]" value="0" /><input type="checkbox" value="1" name="answer[0][isright]"><input type="hidden" name="answer[0][answer]" value=""><div class="form-control" id="answer0" style="min-height: 80px;"></div></div>'
        );
        create_quilljs_simple('answer0', 0);
        i = 0;
        $("#dynamic-ar").prop("disabled", false);

        // console.log(simple_quill);
        $('#dynamicAddRemove').prev().remove('div');
        quill['question'].setContents([{
            insert: ''
        }]);
        quill['discussion'].setContents([{
            insert: ''
        }]);
        $('#questionModal').modal('show');
        $('#question-form').trigger("reset");
    }

    function refresh_dt() {
        show_dt_question();
    }

    function create_quilljs(id) {
        var Image = Quill.import('formats/image');
        Image.className = 'img-responsive';
        Quill.register(Image, true);
        quill[id] = new Quill('#' + id, {
            theme: 'snow',
            modules: {
                toolbar: [
                    [{
                        header: [1, 2, 3, 4, 5, 6, false]
                    }],
                    [{
                        font: []
                    }],
                    ["bold", "italic"],
                    ["link", "blockquote", "code-block", "image", "video"],
                    [{
                        list: "ordered"
                    }, {
                        list: "bullet"
                    }],
                    [{
                        script: "sub"
                    }, {
                        script: "super"
                    }],
                    [{
                        color: []
                    }, {
                        background: []
                    }],
                ]
            },
        });
        quill[id].on('text-change', function(delta, oldDelta, source) {
            quill[id].root.innerHTML.replace("<p><br></p>", "");
            document.querySelector('input[name=' + id + ']').value = quill[id].root.innerHTML;

        });
    }

    function create_quilljs_simple(id, number) {
        var name = "answer[" + number + "][answer]";
        simple_quill[id] = new Quill('#' + id, {
            theme: 'snow',
            modules: {
                toolbar: [
                    ["bold", "italic"],
                    ["link", "blockquote", "code-block", "image", "video"],
                    [{
                        list: "ordered"
                    }, {
                        list: "bullet"
                    }],
                    [{
                        script: "sub"
                    }, {
                        script: "super"
                    }],
                    [{
                        color: []
                    }, {
                        background: []
                    }],
                ]
            },
        });
        simple_quill[id].setContents([{
            insert: ''
        }]);
        simple_quill[id].on('text-change', function(delta, oldDelta, source) {
            document.querySelector("input[name='" + name + "']").value = simple_quill[id].root.innerHTML;
            // console.log(document.querySelector("input[name='" + name + "']").value + " Idnya dallah " + id);
        });
    }

    function create_quill_edit(id, number, content) {
        var name = "edit_answer[" + number + "][answer]";
        simple_quill[id] = new Quill('#' + id, {
            theme: 'snow',
            modules: {
                toolbar: [
                    ["bold", "italic"],
                    ["link", "blockquote", "code-block", "image", "video"],
                    [{
                        list: "ordered"
                    }, {
                        list: "bullet"
                    }],
                    [{
                        script: "sub"
                    }, {
                        script: "super"
                    }],
                    [{
                        color: []
                    }, {
                        background: []
                    }],
                ]
            },
        });
        simple_quill[id].clipboard.dangerouslyPasteHTML(content);
        document.querySelector("input[name='" + name + "']").value = content; // jika tidak diganti, jawabn sama

        simple_quill[id].on('text-change', function(delta, oldDelta, source) {
            document.querySelector("input[name='" + name + "']").value = simple_quill[id].root.innerHTML; // jika diganti maka ambil string di formnya
        });
    }

    function show_dt_question() {
        $('#example').DataTable({
            oLanguage: {
                sProcessing: '<div class="spinner-border neo" role="status"><span class="sr-only"></span></div>'
            },
            dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center mx-0 yx-0'B>>" +
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
            ajax: {
                url: "<?= route_to('admin.bank-soal.dt_banksoal') ?>",
                type: "POST",
                data: {
                    level: $('#level').val(),
                    subject: $('#subject').val(),
                    topic: $('#topic').val()
                },

                error: function() { // error handling
                    $(".tabel_serverside-error").html("");
                    $("#tabel_serverside").append(
                        '<tbody class="tabel_serverside-error"><tr><th colspan="3">Data Tidak Ditemukan di Server</th></tr></tbody>'
                    );
                    $("#tabel_serverside_processing").css("display", "none");
                }
            },
            columnDefs: [{
                    targets: [0, 1, 2, 3],
                    orderable: false,
                },
                {
                    width: "1%",
                    targets: [0, -1],
                },
                {
                    className: "dt-nowrap",
                    targets: [-1],
                }
            ],
            columns: [{
                    "data": "number"
                },
                {
                    "data": "question"
                },
                {
                    "data": "discussion"
                },
                {
                    "data": "action"
                },
            ],
        });
    }

    function insert_data() {
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
            url: "<?= route_to('admin.bank-soal.insert-question') ?>",
            type: "POST",
            data: $('#question-form').serialize(),
            success: function(d) {
                var d = JSON.parse(d);
                console.log(d);
                if (d.success == true) {
                    Swal.fire({
                        title: 'Status :',
                        text: d.message,
                        icon: 'success',
                        showConfirmButton: true,
                    });
                    $('#answerModal').modal('hide');
                } else {
                    Swal.fire({
                        title: 'Status :',
                        html: d.message +
                            '<br>' + JSON.stringify(d.validation),
                        icon: 'error',
                        showConfirmButton: true,
                    });
                }
                refresh_dt();
                // $('#answerModal').modal('hide');
                console.log(d.validation);
            },
            error: function(error) {
                console.log(error);
                console.log($('#question-form').serialize());
            }
        });
    }

    function update_data() {
        let question_id = window.value;

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
            url: "<?= route_to('admin.bank-soal.edit_soal') ?>",
            type: "POST",
            data: $('#edit-form').serialize() + "&id_question=" + question_id,
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
                        showConfirmButton: true,
                    });
                }
                // Swal.close();
                refresh_dt();
                // $('#answerEditModal').modal('hide');
                // console.log($('#edit-form').serialize());
                // console.log($('#edit-form').serialize() + "&id_question=" + question_id + "&id_answer[0]=" + dataAnswerId[0] + "&id_answer[1]=" + dataAnswerId[1] + "&id_answer[2]=" + dataAnswerId[2] + "&id_answer[3]=" + dataAnswerId[3] + "&id_answer[4]=" + dataAnswerId[4]);
            },
            error: function(error) {
                console.log(error);
            }
        });
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
                    url: "<?= route_to('admin.bank-soal.delete-question') ?>",
                    type: "POST",
                    data: {
                        id: id,
                    },
                    success: function(d) {
                        Swal.close();
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
                        Swal.close();
                        console.log(error);
                    }
                });

            }
        });
    }

    $(document).on('click', '.edit-button', function() {
        var question_id = $(this).attr("id");
        $("#tombol-tambah-edit").prop("disabled", false);
        window.value = question_id;
        get_edit_soal(question_id);

        $('#questionEditModal').modal('show');
        $('#edit-form').trigger("reset");
    });

    function get_edit_soal(id) {
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
            url: "<?= route_to('admin.bank-soal.get_edit_soal') ?>",
            type: "POST",
            data: {
                id: id,
            },
            success: function(d) {
                var d = JSON.parse(d);
                quill['edit_question'].clipboard.dangerouslyPasteHTML(d.soalData.question);
                quill['edit_discussion'].clipboard.dangerouslyPasteHTML(d.soalData.discussion);

                i = 0;
                $('#dynamicEditAddRemove').html(
                    '<div class="col-12 col-md-6 mb-4"><span class="" style="letter-spacing: -em"><meta charset="utf-8"> ' +
                    String.fromCharCode('A'.charCodeAt() + (i)) + '  ⋮⋮</span> &nbsp; <input type="hidden" name="edit_answer[0][isright]" value="0" /><input type="checkbox" value="1" id="edit_isright0" name="edit_answer[0][isright]"> <input type="hidden" name="edit_answer[0][answer]" value=""><div class="form-control" id="edit_answer0" style="min-height: 80px;"></div></div>'
                );
                create_quill_edit('edit_answer' + i, i, d.jawabanData[i].answer);
                window.answerId = [];
                window.answerId[i] = d.jawabanData[i].id;

                // edit checkbox 0
                if (d.jawabanData[i].answer_isright == 1) {
                    $('#edit_isright0').prop('checked', true);
                } else {
                    $('#edit_isright0').prop('checked', false);
                }

                for (let i = 1; i < d.jawabanData.length; i++) {
                    $("#dynamicEditAddRemove").append(
                        '<div class="col-12 col-md-6" id="removeJawaban"><span class="" style="letter-spacing: -em"><meta charset="utf-8"> ' +
                        String.fromCharCode('A'.charCodeAt() + (i)) +
                        '  ⋮⋮</span> &nbsp; <input type="hidden" name="edit_answer[' +
                        i + '][isright]" value="0" /><input type="checkbox" value="1" id="edit_isright' + i +
                        '" name="edit_answer[' +
                        i + '][isright]"><button type="button" class="btn btn-danger remove-edit-field float-right btn-sm"><i class="fa fa-minus" aria-hidden="true"></i></button> <input type="hidden" name="edit_answer[' +
                        i + '][answer]" value=""><div class="form-control mb-4" id="edit_answer' + i +
                        '" style="min-height: 80px;"></div></div>'
                    );
                    create_quill_edit('edit_answer' + i, i, d.jawabanData[i].answer);
                    window.answerId[i] = d.jawabanData[i].id;
                    // console.log(String.fromCharCode('A'.charCodeAt() + (i)));
                    console.log(d.jawabanData[i]);

                    // edit checkbox
                    if (d.jawabanData[i].answer_isright == 1) {
                        $('#edit_isright' + i).prop('checked', true);
                    } else {
                        $('#edit_isright' + i).prop('checked', false);
                    }
                    window.lastOption = i;
                }

                // $("#edit-dynamic-ar").prop("disabled", false);
                $('#dynamicEditAddRemove').prev().remove('div');
                Swal.close();
            },
            error: function(error) {
                console.log(id);
                alert(error);
                Swal.close();
            }
        });

    }

    $(document).on('click', '.delete-button', function() {
        let id = $(this).data("id");
        delete_data(id);
    });

    $('#level').on('change', function() {
        $("#subject").val('default');
        $("#subject").selectpicker("refresh")
        $('#question-datatables').addClass('d-none').removeClass('d-block');
        var selected = $('#level').val();
        var select = $('#subject');
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
            url: "<?= route_to('admin.bank-soal.get_subject') ?>",
            type: "POST",
            data: {
                class_id: selected,
            },
            success: function(response) {

                response = JSON.parse(response);
                select.selectpicker('destroy');
                select.empty();
                select.selectpicker();
                // let optionList = document.getElementById('subject').options;
                if (response.length != 0) {
                    $("#subject").empty().append(
                        "<option disabled='disabled' SELECTED>Silahkan Pilih Mata Pelajaran</option>"
                    );
                    $("#subject").prop("disabled", false);
                    response.forEach(response =>
                        $('#subject').append('<option value="' + response.id + '">' + response
                            .text +
                            '</option>')
                    );
                } else {
                    $("#subject").empty().append(
                        "<option disabled='disabled' SELECTED>Tidak Ada Mapel</option>"
                    );
                    $("#subject").prop("disabled", true);
                }
                Swal.close();
                select.selectpicker('refresh');
                console.log(response);
                Swal.close();
            },
            error: function(error) {
                console.log(error);
            }
        });
    });
    $('#subject').on('change', function() {
        $("#topic").val('default');
        $("#topic").selectpicker("refresh")
        $('#question-datatables').addClass('d-none').removeClass('d-block');
        var selected = $('#subject').val();
        var select = $('#topic');
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
            url: "<?= route_to('admin.bank-soal.get_topic') ?>",
            type: "POST",
            data: {
                subject_id: selected,
            },
            success: function(response) {
                response = JSON.parse(response);
                select.selectpicker('destroy');
                select.empty();
                select.selectpicker();
                if (response.length != 0) {
                    $("#topic").empty().append(
                        "<option disabled='disabled' SELECTED>Silahkan Pilih Topik Mata Pelajaran</option>"
                    );
                    $("#topic").prop("disabled", false);
                    response.forEach(response =>
                        $('#topic').append('<option value="' + response.id + '">' + response
                            .text +
                            '</option>')
                    );
                } else {
                    $("#topic").empty().append(
                        "<option disabled='disabled' SELECTED>Tidak Ada Topik</option>"
                    );
                    $("#topic").prop("disabled", true);
                }
                select.selectpicker('refresh');
                Swal.close();
            },
            error: function(error) {
                console.log(error);
                Swal.close();
            }
        });
    });

    $("#dynamic-ar").click(function() {
        ++i;
        if (i <= 4) {
            $("#dynamicAddRemove").append(
                '<div class="col-12 col-md-6" id="removeJawaban"><span class="" style="letter-spacing: -em"><meta charset="utf-8"> ' +
                String.fromCharCode('B'.charCodeAt() + (i - 1)) +
                '  ⋮⋮</span> &nbsp; <input type="hidden" name="answer[' +
                i + '][isright]" value="0" /> <input type="checkbox" value="1" name="answer[' +
                i + '][isright]"><button type="button" class="btn btn-danger remove-input-field float-right btn-sm"><i class="fa fa-minus" aria-hidden="true"></i></button> <input type="hidden" name="answer[' +
                i + '][answer]" value=""><div class="form-control mb-4" id="answer' + i +
                '" style="min-height: 80px;"></div></div>'
            );
            create_quilljs_simple('answer' + i, i);
        } else {
            $("#dynamic-ar").prop("disabled", true);
        }
    });
    $(document).on('click', '.remove-input-field', function() {
        $(this).parents('#removeJawaban').remove();
        i--;
    });

    $(document).on('change', 'input[name*=answer]:checkbox', function() {
        if (this.checked) {
            // checkbox is checked
            //   $("table.tr").not(this).hide();
            $('input[name*=answer]:checkbox').not(this).prop('checked', false); // Unchecks it
        }
    });

    function tambah_edit() {
        window.lastOption++;
        let p = window.lastOption;
        console.log(window.lastOption);
        let content = '';
        if (window.lastOption <= 4) {
            $("#dynamicEditAddRemove").append(
                '<div class="col-12 col-md-6" id="removeJawaban"><input type="hidden" name="edit_answer[' +
                p + '][isright]" value="0" /><input type="checkbox" value="1" name="edit_answer[' +
                p + '][isright]"><span  style="letter-spacing: -em"><meta charset="utf-8"> ' +
                String.fromCharCode('A'.charCodeAt() + (p)) +
                ' ⋮⋮</span> &nbsp;   <button type="button" class="btn btn-danger remove-edit-field float-right btn-sm"><i class="fa fa-minus" aria-hidden="true"></i></button> <input type="hidden" name="edit_answer[' +
                p + '][answer]" value=""><div class="form-control mb-4" id="edit_answer' + p +
                '" style="min-height: 80px;"></div></div>'
            );
            create_quill_edit('edit_answer' + p, p, content);
        } else {
            $("#tombol-tambah-edit").prop("disabled", true);
        }
    }

    $(document).on('click', '.remove-edit-field', function() {
        $(this).parents('#removeJawaban').remove();
        // if (window.lastOption > 1) {
        window.lastOption--;
        $("#tombol-tambah-edit").prop("disabled", false);
        console.log(window.lastOption);
        // }
    });
</script>
<?= $this->endSection() ?>