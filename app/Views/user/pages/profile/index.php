<?= $this->extend('user/layout/app') ?>

<?= $this->section('content') ?>
<div class="card shadow-lg mx-4 card-profile-bottom mt-4">
    <div class="card-body p-3">
        <div class="card-header pb-0">
            <div class="d-flex align-items-center">
                <p class="mb-0">Edit Profile</p>
                <button class="btn btn-primary btn-sm ms-auto">Simpan</button>
            </div>
        </div>
        <div class="card-body">
            <p class="text-uppercase text-sm">User Information</p>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group bmd-form-group">
                        <label for="exampleEmail" class="bmd-label-floating">Email Address</label>
                        <input type="email" class="form-control" id="exampleEmail">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Email address</label>
                        <input class="form-control" type="email" value="jesse@example.com">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Nama Depan</label>
                        <input class="form-control" type="text" value="Jesse">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Nama Belakang</label>
                        <input class="form-control" type="text" value="Lucky">
                    </div>
                </div>
            </div>
            <hr class="horizontal dark">
            <p class="text-uppercase text-sm">School Information</p>
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
            <hr class="horizontal dark">
            <p class="text-uppercase text-sm">About me</p>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">About me</label>
                        <input class="form-control" type="text" value="tahuu..bulaat....digoreng..dadakan..gak enak....">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>