<?= $this->extend('user/layout/app') ?>

<?= $this->section('content') ?>

<div class="card shadow-lg mx-4 card-profile-bottom mt-4">
    <div class="card-body p-3">
        <div class="card-header pb-0">
            <div class="d-flex align-items-center">
                <h3 class="mb-0">Edit Profil</h3>
                <button class="btn btn-info btn-sm ms-auto">Simpan Profil</button>
            </div>
        </div>
        <div class="card-body">
            <h4 class="text-uppercase text-sm">Profil User</h4>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group bmd-form-group">
                        <label for="example-text-input" class="bmd-label-floating">Nama Lengkap</label>
                        <input type="text" class="form-control" value="<?= $userData->full_name ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleEmail" class="form-control-label">Alamat E-mail</label>
                        <input class="form-control" type="email" value="<?= $userData->email ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Nomor Telepon</label>
                        <input class="form-control" type="text" value="<?= $userData->phone_number ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="">Jenis Kelamin :</label>
                    <select class="form-control select2" name="gender" id="gender">
                        <option value="jenjang" disabled selected>-pilih jenis kelamin-</option>
                        <option value=""></option>
                        <option value="laki">Laki-Laki</option>
                        <option value="perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Tempat Lahir</label>
                        <input class="form-control" type="text" value="<?= $userData->POB ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <label>Tanggal Lahir</label>
                    <div class="input-group date" data-provide="datepicker">
                        <input type="text" class="form-control" value="<?= $userData->DOB ?>">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                    </div>
                </div>
            </div>
            <hr class="horizontal dark">
            <h4 class="text-uppercase text-sm">Data Sekolah</h4>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Alamat</label>
                        <input class="form-control" type="text" value="Bantangan Hulu Sulawesi barat">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Provinsi</label>
                        <input class="form-control" type="text" value="Sulawei Barat">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Kota</label>
                        <input class="form-control" type="text" value="Bantangan Hulu">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Sekolah</label>
                        <input class="form-control" type="text" value="SMK Sarjiwo Bantangan Hulu">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Jenjang</label>
                        <input class="form-control" type="text" value="SMA">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Kelas</label>
                        <input class="form-control" type="text" value="10">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Jurusan</label>
                        <input class="form-control" type="text" value="Ilmu Komunikasi Dasar">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- datepicker -->
<script defer src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js'></script>
<script defer src="<?= base_url('assets-front/js/script.js') ?>"></script>
<?= $this->endSection() ?>