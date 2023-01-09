<?= $this->extend('user/layout/app') ?>

<?= $this->section('content') ?>

<div class="card shadow-lg mx-4 card-profile-bottom mt-4">
    <div class="card-body p-3">
        <div class="card-header pb-0">
            <div class="d-flex align-items-center">
                <h3 class="mb-0">Profil User</h3>
                <!-- Checkbox -->
                <div class="form-check form-switch ms-auto">
                    <input class="form-check-input" type="checkbox" id="yourSwitch">
                    <label class="form-check-label" for="yourSwitch" style="font-weight: bold">Edit Form</label>
                </div>
                <!-- akhir checkbox -->
                <button type="button" id="tombolSimpan" class="btn btn-info btn-sm ms-auto" onclick="update_dataprofil()" disabled>Simpan</button>
            </div>
        </div>
        <form id="edit_user_form">
            <div class="card-body">
                <!-- <h4 class="text-uppercase text-sm">Profil </h4> -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group bmd-form-group">
                            <label for="example-text-input" class="bmd-label-floating">Nama Lengkap</label>
                            <input name="full_name" type="text" class="form-control" id="name" value="<?= $userData->full_name ?>" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleEmail" class="form-control-label">Alamat E-mail</label>
                            <input name="email" class="form-control" type="email" id="email" value="<?= $userData->email ?>" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Nomor Telepon</label>
                            <input name="phone_number" class="form-control" type="text" id="phone_number" value="<?= $userData->phone_number ?>" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="">Jenis Kelamin :</label>
                        <select name="gender" class="form-control select2" id="gender" disabled>
                            <option value="" disabled selected>-pilih jenis kelamin-</option>
                            <option value=""></option>
                            <option value="L" <?php if ($userData->gender == "L") { ?> selected="selected" <?php } ?>>
                                Laki-Laki</option>
                            <option value="P" <?php if ($userData->gender == "P") { ?> selected="selected" <?php } ?>>
                                Perempuan</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Tempat Lahir</label>
                            <input name="POB" class="form-control" type="text" id="POB" value="<?= $userData->POB ?>" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label>Tanggal Lahir</label>
                        <div class="form-group date" data-provide="datepicker">
                            <input name="DOB" id="DOB" type="text" class="form-control" value="<?= date("d-m-Y", strtotime($userData->DOB)) ?>" disabled>
                            <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                        </div>
                    </div>
                </div>
                <!-- Data Wali -->
                <hr class="horizontal dark">
                <h4 class="text-uppercase text-sm">Data Wali</h4>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Nama Wali</label>
                            <input name="parent_name" class="form-control" type="text" id="parent_name" value="<?= $userData->parent_name ?>" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Nomer Telepon Wali</label>
                            <input name="parent_phone" class="form-control" type="text" id="parent_phone" value="<?= $userData->parent_phone_number ?>" disabled>
                        </div>
                    </div>
                </div>
                <!-- Data Sekolah blm bisa save dulu-->
                <hr class="horizontal dark">
                <h4 class="text-uppercase text-sm">Data Sekolah</h4>
                <div class="row">
                    <div class="col-md-4" hidden>
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Provinsi</label>
                            <input name="" class="form-control" type="text" value="Sulawei Barat">
                        </div>
                    </div>
                    <div class="col-md-4" hidden>
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Kota</label>
                            <input name="" class="form-control" type="text" value="Bantangan Hulu">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Sekolah</label>
                            <input name="" class="form-control" type="text" value="SMK Sarjiwo Bantangan Hulu">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Jenjang</label>
                            <select name="level" id="level" class="form-control select2" onchange="ambil_kelas()" disabled>
                                <option value="jenjang" disabled selected>-pilih jenjang-</option>
                                <option value="SD" <?php if ($userData->level == "SD") { ?> selected="selected" <?php } ?>>SD</option>
                                <option value="SMP" <?php if ($userData->level == "SMP") { ?> selected="selected" <?php } ?>>SMP</option>
                                <option value="SMA" <?php if ($userData->level == "SMA") { ?> selected="selected" <?php } ?>>SMA</option>
                                <option value="Umum" <?php if ($userData->level == "Umum") { ?> selected="selected" <?php } ?>>Umum</option>
                                <option value="Lainnya" <?php if ($userData->level == "Lainnya") { ?> selected="selected" <?php } ?>>Lainnya</option>
                            </select>
                        </div>
                    </div>
                    <div class=" col-md-4">
                        <div class="form-group class_form">
                            <label for="example-text-input" class="form-control-label">Kelas</label>
                            <select title="Silahkan Pilih Jenjang Terlebih Dahulu" class="form-control select2" name="class" id="class">
                                <option value="<?= $userData->class_id ?>" selected><?= $userData->class ?></option>
                                <option value="" disabled>Silahkan Pilih Jenjang Terlebih Dahulu</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    document.getElementById('yourSwitch').onchange = function() {
        // document.querySelectorAll(".form-group") = !this.checked;
        document.getElementById("tombolSimpan").disabled = !this.checked;

        document.getElementById("name").disabled = !this.checked;
        document.getElementById("email").disabled = !this.checked;
        document.getElementById("phone_number").disabled = !this.checked;
        document.getElementById("gender").disabled = !this.checked;
        document.getElementById("POB").disabled = !this.checked;
        document.getElementById("DOB").disabled = !this.checked;
        document.getElementById("parent_name").disabled = !this.checked;
        document.getElementById("parent_phone").disabled = !this.checked;
        document.getElementById("level").disabled = !this.checked;
        document.getElementById("class").disabled = !this.checked;
    };

    function update_dataprofil() {
        Swal.fire({
            text: "Sedang Memproses Data",
            allowOutsideClick: false,
        });
        Swal.showLoading();
        $.ajax({
            url: "<?php echo base_url(); ?>/profil/update_profil",
            type: "POST",
            data: $('#edit_user_form').serialize(),
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
                            '<br>' + JSON.stringify(d.detail),
                        icon: 'error',
                        showConfirmButton: false
                    });
                }
                window.location.reload();
                console.log(d);
            },
            error: function(error) {
                console.log(error);
            }
        });
    }

    function ambil_kelas() {
        var selected = $('#level').val();
        Swal.showLoading();
        $.ajax({
            url: "<?php echo base_url(); ?>/profil/get_kelas",
            type: "POST",
            data: {
                level: selected,
            },
            success: function(response) {
                response = JSON.parse(response);
                console.log(response);
                if (response.length != 0) {
                    $("#class").empty().append(
                        "<option disabled='disabled' SELECTED>Silahkan Pilih Kelas</option>"
                    );
                    $("#class").prop("disabled", false);
                    response.forEach(response => $('#class').append('<option value="' + response.id + '">' + response.text + '</option>'));
                } else {
                    $("#class").empty().append(
                        "<option disabled='disabled' SELECTED>Kelas Masih Kosong</option>"
                    );
                }
                $('.class_form').addClass('d-block').removeClass('d-none');
                Swal.close();
            },
            error: function(error) {
                console.log(error);
            }
        });
    }
</script>
<script defer src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js'></script>
<?= $this->endSection() ?>