<?= $this->extend('admin/layout/app') ?>
<?= $this->section('header') ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.css" />
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<link href="<?= base_url('assets-user/css/nucleo-icons.css')?>" rel="stylesheet" />
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="content">
    <div class="block block-rounded pb-2 shadow-sm">
        <div class="block-header block-header-default">
            <h3 class="block-title">
                Daftar Topik Mata Pelajaran <small></small>
            </h3>
            <div class="block-options">
                <button type="button" class="btn-block-option" data-toggle="block-option"
                    data-action="fullscreen_toggle"></button>
                <button type="button" id="refresh" class="btn-block-option" data-toggle="block-option"
                    data-action="state_toggle" data-action-mode="demo">
                    <i class="si si-refresh"></i>
                </button>
                <button type="button" class="btn-block-option" data-toggle="block-option"
                    data-action="content_toggle"></button>
            </div>
        </div>
        <div class="block-content fs-sm">
            <div class="block-content fs-sm">
                <div class="input-group mb-3">
                    <label class="input-group-text bg-neo text-white" for="inputGroupSelect01"
                        style="width:80px;">Kelas</label>
                    <select name="level" id="level" title="Please select..." class="form-control selectpicker border"
                        data-live-search="true" data-style="customSelect" data-dropup-auto="false" data-size="4">
                        <?php if($data['class']): ?>
                        <?php foreach($data['class'] as $class): ?>
                        <tr>
                            <option value="<?= $class->id ?>"><?= $class->class.' - '.$class->level ?>
                            </option>
                        </tr>
                        <?php 
                    endforeach;
                    endif; ?>
                    </select>
                </div>
                <div class="input-group mb-3">
                    <label class="input-group-text bg-neo text-white" for="inputGroupSelect01"
                        style="width:80px;">Mapel</label>
                    <select name="subject" id="subject" class="form-control selectpicker border" data-live-search="true"
                        data-style="customSelect" disabled>
                    </select>
                </div>
            </div>
            <div id="dt" class="d-none">
                <div class="row pb-2 mb-3 shadow-sm align-center">
                    <div class="col-12 col-md-12 text-right">
                        <button type="button" class="btn btn-primary btn-sm" onclick="tambah()">
                            <i class="si si-plus"></i> Tambah Topik Mata Pelajaran Baru
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
                            <th width="30%" class="fs-sm fw-normal">Mata Pelajaran</th>
                            <th width="30%" class="fs-sm fw-normal">Topik Mata Pelajaran</th>
                            <th width="30%" class="fs-sm fw-normal">Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="topicModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="block block-rounded block-transparent mb-0">
                <div class="block-header block-header-ne">
                    <h3 class="block-title text-white">Tambah Topik Mata Pelajaran : </h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option-white" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content fs-sm">
                    <form id="topic_form" onsubmit="return false">
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <div class="col-12 col-md-12 py-2">
                                    <div class="form-floating mb-4 pt-2">
                                        <input type="text" class="form-control" id="topic" name="topic"
                                            placeholder="Topik Mata Pelajaran" autofocus>
                                        <label for="class"><span class="color-ne" style="letter-spacing: -em">
                                                <meta charset="utf-8">⋮⋮⋮</span> &nbsp;Topik Mata Pelajaran</label>
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
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
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
                    <form id="edit_topic_form">
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <div class="col-12 col-md-12 py-2">
                                    <span class="color-ne" style="letter-spacing: -em">
                                        <meta charset="utf-8">⋮⋮⋮</span> &nbsp;
                                    <span class="tittle-neo">Topik Mata Pelajaran</span>
                                    <div class="form-floating mb-4 pt-2">
                                        <input type="text" class="form-control" id="edit_subject" name="topic"
                                            placeholder="Topik Mata Pelajaran">
                                        <label for="class">Topik Mata Pelajaran</label>
                                        <input type="hidden" id="topic_id" name="id">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="block-content block-content-full text-end bg-body">
                    <button type="button" class="btn btn-sm btn-secondary me-1" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal"
                        onclick="update_data()">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/bootstrap-select.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.js"></script>
<script>
    $(document).ready(function () {
        $('#subject').on('change', function () {
            $('.d-none').addClass('d-block').removeClass('d-none');
            $('#subject-form').val($('#subject').val());
            show_dt_topic();
        });
        $("#topicModal").keyup(function (event) {
            if (event.keyCode == 13) {
                insert_data();
                $("#topicModal").modal('hide');
            } else if (event.keyCode == 27) {
                $("#topicModal").modal('hide');
            }
        });
        $('#refresh').on('click', refresh_dt)
        $(document).on('click', '.delete-button', function () {
            let id = $(this).data("id");
            delete_data(id);
        });
        $(document).on('click', '.edit-button', function () {
            let data_id = $(this).data("id");
            let data_topic = $(this).data("subject");
            $('#edit_subject').val(data_topic);
            $('#topic_id').val(data_id);
            $('#editModal').modal('show');
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
                $.ajax({
                    url: "<?= route_to('admin.topic.remove_topic') ?>",
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

    function refresh_dt() {
        show_dt_topic();
    }

    function tambah() {
        $('#topicModal').modal('show');
        $('#topic').focus();
        // $('.selectpicker').selectpicker('refresh');
        $('#topic_form')[0].reset();
    }

    function insert_data() {
        Swal.fire({
            text: "Sedang Memproses Data",
            allowOutsideClick: false,
        });
        var data = $('#topic_form').serializeArray();
        data.push({
            name: 'subject_id',
            value: $('#subject').val()
        });
        Swal.showLoading();
        $.ajax({
            url: "<?= route_to('admin.topic.add_topic') ?>",
            type: "POST",
            data: data,
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
        var data = $('#edit_topic_form').serializeArray();
        data.push({
            name: 'subject_id',
            value: $('#subject').val()
        });
        $.ajax({
            url: "<?= route_to('admin.topic.edit_topic') ?>",
            type: "POST",
            data: data,
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

    $('#level').on('change', function () {
        $('.d-block').addClass('d-none').removeClass('d-block');
        $("#subject").val('default');
        $("#subject").selectpicker("refresh")
        $('#question-datatables').hide();
        var selected = $('#level').val();
        var select = $('#subject');
        $.ajax({
            url: "<?= route_to('admin.bank-soal.get_subject') ?>",
            type: "POST",
            data: {
                class_id: selected,
            },
            success: function (response) {
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
                    $("#subject").prop("disabled", true);
                }
                select.selectpicker('refresh');
            },
            error: function (error) {
                console.log(error);
            }
        });
    });

    function show_dt_topic() {
        $('#example').DataTable({
            processing: true,
            serverSide: true,
            bDestroy: true,
            bPaginate: false,
            searching: false,
            bInfo: false,
            ajax: {
                url: "<?= route_to('admin.topic.dt_topic') ?>",
                type: "POST",
                data: {
                    subject_id: $('#subject').val(),
                },
            },
            columnDefs: [{
                    targets: [0, 1, 2, 3],
                    orderable: true,
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
                    "data": "level"
                },
                {
                    "data": "class"
                },
                {
                    "data": "subject"
                },
                {
                    "data": "topic"
                },
                {
                    "data": "action"
                },
            ],
        });
    }
</script>

<?= $this->endSection() ?>