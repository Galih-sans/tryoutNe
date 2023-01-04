<?= $this->extend('user/layout/app') ?>

<?= $this->section('content') ?>

<div class="card shadow-lg mx-4 card-profile-bottom mt-4">
    <div class="card-body p-3">
        <div class="card-header pb-0">
            <div class="d-flex align-items-center">
                <h3 class="mb-0">Edit Profil</h3>
                <button type="button" class="btn btn-info btn-sm ms-auto" onclick="update_dataprofil()">Simpan</button>
            </div>
        </div>
        <form id="edit_user_form">
            <div class="card-body">
                <h4 class="text-uppercase text-sm">Profil User</h4>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group bmd-form-group">
                            <label for="example-text-input" class="bmd-label-floating">Nama Lengkap</label>
                            <input name="full_name" type="text" class="form-control" id="mame" value="<?= $userData->full_name ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleEmail" class="form-control-label">Alamat E-mail</label>
                            <input name="email" class="form-control" type="email" id="email" value="<?= $userData->email ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Nomor Telepon</label>
                            <input name="phone_number" class="form-control" type="text" id="phone_number" value="<?= $userData->phone_number ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="">Jenis Kelamin :</label>
                        <select name="gender" class="form-control select2" id="gender">
                            <option value="" disabled selected>-pilih jenis kelamin-</option>
                            <option value=""></option>
                            <option value="L" <?php if ($userData->gender == "L") { ?> selected="selected" <?php } ?>>Laki-Laki</option>
                            <option value="P" <?php if ($userData->gender == "P") { ?> selected="selected" <?php } ?>>Perempuan</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Tempat Lahir</label>
                            <input name="POB" class="form-control" type="text" id="pob" value="<?= $userData->POB ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label>Tanggal Lahir</label>
                        <div class="input-group date" data-provide="datepicker">
                            <input name="DOB" type="text" class="form-control" id="dob" value="<?= $userData->DOB ?>">
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
                            <input name="parent_name" class="form-control" type="text" id="parent_name" value="<?= $userData->parent_name ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Nomer Telepon Wali</label>
                            <input name="parent_phone" class="form-control" type="text" id="parent_number" value="<?= $userData->parent_phone_number ?>">
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
                            <select name="level" class="form-control select2" id="userLevel">
                                <option value="" disabled selected>-pilih jenjang-</option>
                                <option value=""></option>
                                <option value="" <?php if ($userData->level == "SD") { ?> selected="selected" <?php } ?>>SD</option>
                                <option value="" <?php if ($userData->level == "SMP") { ?> selected="selected" <?php } ?>>SMP</option>
                                <option value="" <?php if ($userData->level == "Umum") { ?> selected="selected" <?php } ?>>Umum</option>
                                <option value="" <?php if ($userData->level == "Lainnya") { ?> selected="selected" <?php } ?>>Lainnya</option>
                                <option value="" <?php if ($userData->level == "SMA") { ?> selected="selected" <?php } ?>>SMA</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label>Kelas</label>
                        <select name="class_id" id="class_id" class="form-control select2" id="userClass">
                            <option value="" disabled selected>-pilih kelas-</option>
                            <option value="" disabled selected></option>
                            <option value="2" <?php if ($userData->class == "I") { ?> selected="selected" <?php } ?>>Kelas I</option>
                            <option value="3" <?php if ($userData->class == "II") { ?> selected="selected" <?php } ?>>Kelas II</option>
                            <option value="5" <?php if ($userData->class == "Kursus B. Inggris") { ?> selected="selected" <?php } ?>>Kelas Kursus B. Inggris</option>
                            <option value="6" <?php if ($userData->class == "Kursus CPNS") { ?> selected="selected" <?php } ?>>Kelas Kursus CPNS</option>
                            <option value="7" <?php if ($userData->class == "XII") { ?> selected="selected" <?php } ?>>Kelas XII</option>
                        </select>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
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

                console.log(d);
                refresh_dt();
            },
            error: function(error) {
                console.log(error);
            }
        });
    }
</script>
<script defer src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js'></script>
<?= $this->endSection() ?>