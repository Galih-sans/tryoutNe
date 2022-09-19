<?= $this->extend('user/layout/app') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-7 mt-4">
            <div class="card">
                <div class="card-header pb-0 px-3">
                    <h6 class="mb-0">Billing Information</h6>
                </div>
                <div class="card-body pt-4 p-3">
                    <ul class="list-group">
                        <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                            <div class="d-flex flex-column">
                                <h6 class="mb-3 text-sm">UTBK UNIVERSITAS DIPONEGORO</h6>
                                <span class="mb-2 text-xs">Departement: <span
                                        class="text-dark font-weight-bold ms-sm-2">faculty of technic
                                        industrial</span></span>
                                <span class="mb-2 text-xs">Exam date's: <span
                                        class="text-dark ms-sm-2 font-weight-bold">12 June 2021</span></span>
                                <span class="text-xs">Neo Number: <span
                                        class="text-dark ms-sm-2 font-weight-bold">FRB1235476</span></span>
                            </div>
                            <div class="ms-auto text-end">
                                <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="javascript:;"><i
                                        class="far fa-trash-alt me-2"></i>Cancel</a>
                                <a class="btn btn-link text-dark px-3 mb-0" href="javascript:;"><i
                                        class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Cetak</a>
                            </div>
                        </li>
                        <li class="list-group-item border-0 d-flex p-4 mb-2 mt-3 bg-gray-100 border-radius-lg">
                            <div class="d-flex flex-column">
                                <h6 class="mb-3 text-sm">UTBK INSTITUTE PERTANIAN BOGOR</h6>
                                <span class="mb-2 text-xs">Departement: <span
                                        class="text-dark font-weight-bold ms-sm-2">faculty of law</span></span>
                                <span class="mb-2 text-xs">Exam date's: <span
                                        class="text-dark ms-sm-2 font-weight-bold">19 June 2021</span></span>
                                <span class="text-xs">Neo Number: <span
                                        class="text-dark ms-sm-2 font-weight-bold">FRB1235476</span></span>
                            </div>
                            <div class="ms-auto text-end">
                                <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="javascript:;"><i
                                        class="far fa-trash-alt me-2"></i>Cancel</a>
                                <a class="btn btn-link text-dark px-3 mb-0" href="javascript:;"><i
                                        class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Cetak</a>
                            </div>
                        </li>
                        <li class="list-group-item border-0 d-flex p-4 mb-2 mt-3 bg-gray-100 border-radius-lg">
                            <div class="d-flex flex-column">
                                <h6 class="mb-3 text-sm">UTBK INSTITUTE TEKNOLOGI BANDUNG</h6>
                                <span class="mb-2 text-xs">Departement: <span
                                        class="text-dark font-weight-bold ms-sm-2">Faculty of science and
                                        Geography</span></span>
                                <span class="mb-2 text-xs">Exam date's: <span
                                        class="text-dark ms-sm-2 font-weight-bold">20 August 2021</span></span>
                                <span class="text-xs">Neo Number: <span
                                        class="text-dark ms-sm-2 font-weight-bold">FRB1235476</span></span>
                            </div>
                            <div class="ms-auto text-end">
                                <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="javascript:;"><i
                                        class="far fa-trash-alt me-2"></i>Cancel</a>
                                <a class="btn btn-link text-dark px-3 mb-0" href="javascript:;"><i
                                        class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Cetak</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-5 mt-4">
            <div class="card h-100 mb-4">
                <div class="card-header pb-0 px-3">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="mb-0">Your Transaction's</h6>
                        </div>
                        <div class="col-md-6 d-flex justify-content-end align-items-center">
                            <i class="far fa-calendar-alt me-2"></i>
                            <small>23 - 30 March 2020</small>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-4 p-3">
                    <h6 class="text-uppercase text-body text-xs font-weight-bolder mb-3">Newest</h6>
                    <ul class="list-group">
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                            <div class="d-flex align-items-center">
                                <button
                                    class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i
                                        class="fas fa-arrow-down"></i></button>
                                <div class="d-flex flex-column">
                                    <h6 class="mb-1 text-dark text-sm">UTBK UNIVERSITAS PADJADJARAN</h6>
                                    <span class="text-xs">27 March 2020, at 12:30 PM</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                                Rp 500.000;00
                            </div>
                        </li>
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                            <div class="d-flex align-items-center">
                                <button
                                    class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i
                                        class="fas fa-arrow-up"></i></button>
                                <div class="d-flex flex-column">
                                    <h6 class="mb-1 text-dark text-sm">SIMAK UNIVERSITAS INDONESIA</h6>
                                    <span class="text-xs">27 March 2020, at 04:30 AM</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                                Rp 750.000;00
                            </div>
                        </li>
                    </ul>
                    <h6 class="text-uppercase text-body text-xs font-weight-bolder my-3">Yesterday</h6>
                    <ul class="list-group">
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                            <div class="d-flex align-items-center">
                                <button
                                    class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i
                                        class="fas fa-arrow-up"></i></button>
                                <div class="d-flex flex-column">
                                    <h6 class="mb-1 text-dark text-sm">UN FISIKA</h6>
                                    <span class="text-xs">26 March 2020, at 13:45 PM</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                                Rp 200.000;00
                            </div>
                        </li>
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                            <div class="d-flex align-items-center">
                                <button
                                    class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i
                                        class="fas fa-arrow-up"></i></button>
                                <div class="d-flex flex-column">
                                    <h6 class="mb-1 text-dark text-sm">UN MATEMATIKA</h6>
                                    <span class="text-xs">26 March 2020, at 12:30 PM</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                                Rp 200.000;00
                            </div>
                        </li>
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                            <div class="d-flex align-items-center">
                                <button
                                    class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i
                                        class="fas fa-arrow-up"></i></button>
                                <div class="d-flex flex-column">
                                    <h6 class="mb-1 text-dark text-sm">UN BIOLOGI</h6>
                                    <span class="text-xs">26 March 2020, at 08:30 AM</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                                Rp 200.000;00
                            </div>
                        </li>
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                            <div class="d-flex align-items-center">
                                <button
                                    class="btn btn-icon-only btn-rounded btn-outline-danger mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i
                                        class="fas fa-exclamation"></i></button>
                                <div class="d-flex flex-column">
                                    <h6 class="mb-1 text-dark text-sm">UN KIMIA</h6>
                                    <span class="text-xs">26 March 2020, at 05:00 AM</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center text-danger text-sm font-weight-bold">
                                Canceled
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>