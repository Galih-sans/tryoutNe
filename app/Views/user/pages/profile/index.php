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
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating">Nama Lengkap</label>
                            <input name="full_name" type="text" class="form-control" id="name" value="<?= $userData->full_name ?>" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label">Alamat E-Mail</label>
                            <input name="email" class="form-control" type="email" id="email" value="<?= $userData->email ?>" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label">Nomor Telepon</label>
                            <input name="phone_number" class="form-control" type="text" id="phone_number" value="<?= $userData->phone_number ?>" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label>Jenis Kelamin :</label>
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
                            <label class="form-control-label">Tempat Lahir</label>
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
                            <label class="form-control-label">Nama</label>
                            <input name="parent_name" class="form-control" type="text" id="parent_name" value="<?= $userData->parent_name ?>" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label">Nomer Telepon</label>
                            <input name="parent_phone" class="form-control" type="text" id="parent_phone" value="<?= $userData->parent_phone_number ?>" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label">Alamat E-Mail</label>
                            <input name="parent_email" class="form-control" type="email" id="parent_email" value="<?= $userData->parent_email ?>" disabled>
                        </div>
                    </div>
                </div>
                <!-- Data Sekolah -->
                <hr class="horizontal dark">
                <h4 class="text-uppercase text-sm">Data Sekolah</h4>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-control-label">Provinsi</label>
                            <select class="form-control select2" name="province" id="province" onchange="ambil_kota()" disabled>
                                <option value="<?= $userData->kode_prop ?>" selected disabled><?= $userData->propinsi ?></option>
                                <?php if ($data['province']) : ?>
                                    <?php foreach ($data['province'] as $propinsi) : ?>
                                        <tr>
                                            <option value="<?= $propinsi->kode_prop ?>">
                                                <?= $propinsi->propinsi ?>
                                            </option>
                                        </tr>
                                <?php
                                    endforeach;
                                endif; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-control-label">Kota / Kabupaten</label>
                            <select class="form-control select2" name="city" id="city" onchange="ambil_kecamatan()" disabled>
                                <option value="<?= $userData->kode_kab_kota ?>" selected><?= $userData->kabupaten_kota ?></option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-control-label">Kecamatan</label>
                            <select class="form-control select2" name="districts" id="districts" onchange="ambil_sekolah()" disabled>
                                <option value="<?= $userData->kode_kec ?>" selected><?= $userData->kecamatan ?></option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-control-label">Sekolah</label>
                            <select class="form-control select2" name="school" id="school" disabled>
                                <option value="<?= $userData->school ?>" selected><?= $userData->sekolah ?></option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-control-label">Jenjang</label>
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
                            <label class="form-control-label">Kelas</label>
                            <select title="Silahkan Pilih Jenjang Terlebih Dahulu" class="form-control select2" name="class" id="class" disabled>
                                <option value="<?= $userData->class_id ?>" selected><?= $userData->class ?></option>
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
        // document.querySelectorAll(".form-control") = !this.checked;
        document.getElementById("tombolSimpan").disabled = !this.checked;

        document.getElementById("name").disabled = !this.checked;
        document.getElementById("email").disabled = !this.checked;
        document.getElementById("phone_number").disabled = !this.checked;
        document.getElementById("gender").disabled = !this.checked;
        document.getElementById("POB").disabled = !this.checked;
        document.getElementById("DOB").disabled = !this.checked;

        document.getElementById("parent_name").disabled = !this.checked;
        document.getElementById("parent_phone").disabled = !this.checked;
        document.getElementById("parent_email").disabled = !this.checked;

        document.getElementById("province").disabled = !this.checked;
        document.getElementById("city").disabled = !this.checked;
        document.getElementById("districts").disabled = !this.checked;
        document.getElementById("school").disabled = !this.checked;
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

    // function ambil provinsi tulis di option seperti pada register
    // jadi jika tidak onchange maka hanya menampilan

    function ambil_kota() {
        var selected = $('#province').val();
        $.ajax({
            url: '<?php echo base_url(); ?>/profil/get_city',
            type: "POST",
            data: {
                kode_prop: selected,
            },
            success: function(response) {
                response = JSON.parse(response);
                console.log(response);
                if (response.length != 0) {
                    $("#city").empty().append(
                        "<option disabled='disabled' SELECTED>Silahkan Pilih Kota / Kabupaten</option>"
                    );
                    $("#city").prop("disabled", false);
                    response.forEach(response =>
                        $('#city').append('<option value="' + response.id + '">' + response
                            .text +
                            '</option>')
                    );
                } else {
                    $("#city").empty().append(
                        "<option disabled='disabled' SELECTED>Kota / Kabupaten Masih Kosong</option>"
                    );
                }
            },
            error: function(error) {
                console.log(error);
            }
        });
    }

    function ambil_kecamatan() {
        var selected = $('#city').val();
        $.ajax({
            url: '<?php echo base_url(); ?>/profil/get_districts',
            type: "POST",
            data: {
                kode_kab_kota: selected,
            },
            success: function(response) {
                response = JSON.parse(response);
                console.log(response);
                if (response.length != 0) {
                    $("#districts").empty().append(
                        "<option disabled='disabled' SELECTED>Silahkan Pilih Kecamatan</option>"
                    );
                    $("#districts").prop("disabled", false);
                    response.forEach(response =>
                        $('#districts').append('<option value="' + response.id + '">' + response
                            .text +
                            '</option>')
                    );
                } else {
                    $("#districts").empty().append(
                        "<option disabled='disabled' SELECTED>Kecamatan Masih Kosong</option>"
                    );
                }
            },
            error: function(error) {
                console.log(error);
            }
        });
    }

    // function sekolah dari kecamatan onchange
    function ambil_sekolah() {
        var selected = $('#districts').val();
        var jenjang = $('#level').val();
        $.ajax({
            url: '<?php echo base_url(); ?>/profil/get_school',
            type: "POST",
            data: {
                kode_kec: selected,
                level: jenjang,
            },
            success: function(response) {
                response = JSON.parse(response);
                console.log(response);
                if (response.length != 0) {
                    $("#school").empty().append(
                        "<option disabled='disabled' SELECTED>Silahkan Pilih Sekolah</option>"
                    );
                    $("#school").prop("disabled", false);
                    response.forEach(response => $('#school').append('<option value="' + response.id + '">' + response.text + '</option>'));
                } else {
                    $("#school").empty().append(
                        "<option disabled='disabled' SELECTED>Sekolah Masih Kosong</option>"
                    );
                }
            },
            error: function(error) {
                console.log(error);
            }
        });
    }

    // function ambil kelas dari jenjang / level onchange
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
<script defer src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script defer src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js'></script>
<?= $this->endSection() ?>