<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="block block-rounded mb-0">
                <div class="block-header block-header-ne">
                    <h3 class="block-title text-white">Tambah Test Baru : </h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option-white" data-dismiss="modal" aria-label="Close"> <i
                                class="fa fa-fw fa-times"></i></button>
                    </div>
                </div>
                <div class="modal-body">
                    <!-- <form id="myForm" action="" method="post" > -->

                    <div id="smartwizard">
                        <ul class="nav">
                            <li class="nav-item">
                                <a class="nav-link" href="#step-1">
                                    <div class="num">1</div>
                                    Detail Test
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#step-2">
                                    <span class="num">2</span>
                                    Komposisi Soal Test
                                </a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div id="step-1" class="tab-pane" role="tabpanel" aria-labelledby="step-1">
                                <form id="form-1" class="needs-validation" novalidate>
                                    <div class="row">
                                        <div class="col-12 col-md-12 py-1">
                                            <span class="fw-bolder text-neo">
                                                <meta charset="utf-8">⋮⋮</span>
                                            <label class="fw-normal fs-6 text-black-50"> Nama Test</label>
                                            <input type="text" class="form-control form-rounded" id="test_name"
                                                name="test_name" placeholder="Nama Test" required>
                                            <div class="valid-feedback">

                                            </div>
                                            <div class="invalid-feedback">
                                                Silahkan Masukkan Nama Test Terlebih Dahulu
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-12 py-1">
                                            <div class="row">
                                                <div class="col-12 col-md-6">
                                                    <span class="fw-bolder text-neo">
                                                        <meta charset="utf-8">⋮⋮</span>
                                                    <label class="fw-normal text-black-50"> Tanggal Mulai</label>
                                                    <div class="form-group">
                                                        <div class="input-group date datetimepicker" id="datetimepicker"
                                                            data-target-input="nearest">
                                                            <input type="text"
                                                                class="form-control input-group-addon datetimepicker-input "
                                                                data-target="#datetimepicker1" name="start_date"
                                                                data-toggle="datetimepicker" onkeypress="return false;"
                                                                required />
                                                            <span class="input-group-text"><i
                                                                    class="fa fa-calendar"></i></span>
                                                            <div class="valid-feedback">

                                                            </div>
                                                            <div class="invalid-feedback">
                                                                Silahkan Masukkan Tanggal dan Jam Ujian Dimulai
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <span class="fw-bolder text-neo">
                                                        <meta charset="utf-8">⋮⋮</span>
                                                    <label class="fw-normal text-black-50"> Tanggal Selesai</label>
                                                    <div class="input-group date datetimepicker" id="datetimepicker2"
                                                        data-target-input="nearest">
                                                        <input type="text" name="end_date"
                                                            class="form-control input-group-addon datetimepicker-input"
                                                            data-target="#datetimepicker2" data-toggle="datetimepicker"
                                                            onkeypress="return false;" required />
                                                        <span class="input-group-text"><i
                                                                class="fa fa-calendar"></i></span>
                                                        <div class="valid-feedback">

                                                        </div>
                                                        <div class="invalid-feedback">
                                                            Silahkan Masukkan Tanggal dan Jam Ujian Ditutup
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 py-1">
                                            <span class="fw-bolder text-neo">
                                                <meta charset="utf-8">⋮⋮</span>
                                            <label class="fw-normal text-black-50"> Durasi ( Menit )</label>
                                            <input type="number" class="form-control form-rounded" id="duration"
                                                name="duration" placeholder="Durasi Test" required>
                                            <div class="valid-feedback">

                                            </div>
                                            <div class="invalid-feedback">
                                                Silahkan Masukkan Durasi Pengerjaan Test
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 py-1">
                                            <span class="fw-bolder text-neo">
                                                <meta charset="utf-8">⋮⋮</span>
                                            <label class="fw-normal text-black-50"> Jumlah Soal</label>
                                            <input type="number" class="form-control form-rounded"
                                                id="number_of_questions" name="number_of_questions"
                                                placeholder="Jumlah Soal" required>
                                            <div class="valid-feedback">

                                            </div>
                                            <div class="invalid-feedback">
                                                Silahkan Masukkan Jumlah Soal
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 py-1">
                                            <span class="fw-bolder text-neo">
                                                <meta charset="utf-8">⋮⋮</span>
                                            <label class="fw-normal text-black-50"> Kelas</label>
                                            <select name="class" id="class" title="Please select..."
                                                class="form-control selectpicker border" data-live-search="true"
                                                data-style="customSelect" data-dropup-auto="false" data-size="5"
                                                required>
                                                <?php if($data['class']): ?>
                                                <?php foreach($data['class'] as $class): ?>
                                                <tr>
                                                    <option value="<?= $class->id ?>">
                                                        <?= $class->class.' - '.$class->level ?>
                                                    </option>
                                                </tr>
                                                <?php 
                                            endforeach;
                                            endif; ?>
                                            </select>
                                            <div class="valid-feedback">

                                            </div>
                                            <div class="invalid-feedback">
                                                Silahkan Pilih Kelas
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 py-1">
                                            <span class="fw-bolder text-neo">
                                                <meta charset="utf-8">⋮⋮</span>
                                            <label class="fw-normal text-black-50"> Jenis ( Gratis / Berbayar )</label>
                                            <select name="type" title="Please select..."
                                                class="form-control selectpicker border" id="type"
                                                data-live-search="true" data-style="customSelect"
                                                data-dropup-auto="false" data-size="6" required>
                                                <option value="free">Gratis</option>
                                                <option value="premium">Berbayar</option>
                                            </select>
                                            <div class="valid-feedback">

                                            </div>
                                            <div class="invalid-feedback">
                                                Silahkan Pilih Jenis Test
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-12 py-1">
                                            <div id="price-div" class="d-none">
                                                <span class="fw-bolder text-neo">
                                                    <meta charset="utf-8">⋮⋮</span>
                                                <label class="fw-normal text-black-50"> Harga</label>
                                                <input type="text" class="form-control form-rounded" id="price"
                                                    name="price" placeholder="Harga">
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-6 py-1">
                                            <span class="fw-bolder text-neo">
                                                <meta charset="utf-8">⋮⋮</span>
                                            <label class="fw-normal text-black-50"> Opsi Test</label>
                                            <div class="space-y-4 mx-4">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" value="1"
                                                        id="random_question" name="random_question">
                                                    <label class="form-check-label fst-normal text-black-75"
                                                        for="random_question">Soal Acak</label>
                                                </div>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" value="1"
                                                        id="random_answer" name="random_answer">
                                                    <label class="form-check-label fst-normal text-black-75"
                                                        for="random_answer">Jawaban Acak</label>
                                                </div>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" value="1"
                                                        id="show_result" name="show_result">
                                                    <label class="form-check-label fst-normal text-black-75"
                                                        for="show_result">Tunjukan Hasil Test</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 py-1">
                                            <div>
                                                <span class="fw-bolder text-neo">
                                                    <meta charset="utf-8">⋮⋮</span>
                                                <label class="fw-normal text-black-50"> Nilai Jika Jawaban Benar</label>
                                                <input type="number" class="form-control form-rounded" id="true_value"
                                                    name="true_value" placeholder="Nilai Jika Benar" required>
                                                <div class="invalid-feedback">
                                                    Silahkan Masukkan Nilai Jika Jawaban Benar
                                                </div>
                                            </div>
                                            <div>
                                                <span class="fw-bolder text-neo">
                                                    <meta charset="utf-8">⋮⋮</span>
                                                <label class="fw-normal text-black-50"> Nilai Jika Jawaban Salah</label>
                                                <input type="number" class="form-control form-rounded" id="false_value"
                                                    name="false_value" placeholder="Nilai Jika Salah" required>
                                                <div class="invalid-feedback">
                                                    Silahkan Masukkan Nilai Jika Jawaban Salah
                                                </div>
                                            </div>
                                            <div>
                                                <span class="fw-bolder text-neo">
                                                    <meta charset="utf-8">⋮⋮</span>
                                                <label class="fw-normal text-black-50"> Nilai Jika Jawaban
                                                    Kosong</label>
                                                <input type="number" class="form-control form-rounded" id="null_value"
                                                    name="null_value" placeholder="Nilai Jika Kosong" required>
                                                <div class="invalid-feedback">
                                                    Silahkan Masukkan Nilai Jika Jawaban Kosong
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div id="step-2" class="tab-pane " role="tabpanel" aria-labelledby="step-2">
                                <form id="form-2" class="needs-validation" novalidate>
                                    <div class="row">
                                        <div class="col-12 col-md-12 py-1">
                                            <span class="fw-bolder text-neo">
                                                <meta charset="utf-8">⋮⋮</span>
                                            <label class="fw-normal text-black-50"> Komposisi Soal Test</label>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="input-group mb-3">
                                                        <div class="col-12 col-md-9">
                                                            <input type="text" class="form-control form-rounded "
                                                                id="subject_name" placeholder="Kelas" disabled>
                                                        </div>
                                                        <div class="col-12 col-md-2">
                                                            <input type="number" class="form-control form-rounded "
                                                                id="total_questipon" placeholder="Jumlah Soal" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12" id="dynamicAddRemove">
                                                    <div class="input-group mb-3 addnew">
                                                        <div class="col-12 col-md-5">
                                                            <select class="form-control form-select subject-form"
                                                                name="subject[0]" id="subject"
                                                                data-placeholder="Silahkan Pilih Mata Pelajaran"
                                                                disabled required>
                                                                <option disabled='disabled' SELECTED>Silahkan Pilih Mata
                                                                    Pelajaran</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-12 col-md-4 topic-div" id="topic-div">
                                                            <select class="form-control form-select topic" id="topic"
                                                                name="topic[0]"
                                                                data-placeholder="Silahkan Pilih Topik Mata Pelajaran"
                                                                disabled required>
                                                                <option disabled='disabled' SELECTED>Silahkan Pilih
                                                                    Topik</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-12 col-md-2">
                                                            <input type="number"
                                                                class="form-control form-rounded number-of-question"
                                                                id="number_question" name="number_question[0]"
                                                                placeholder="Jumlah Soal">
                                                        </div>
                                                        <div class="col-12 col-md-1">
                                                            <button type="button" name="add" id="dynamic-ar"
                                                                class="btn btn-primary" type="button"><i
                                                                    class="fa-solid fa-plus"></i></button>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>


                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- Include optional progressbar HTML -->
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="0"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>

                    <!-- </form> -->
                </div>
            </div>
        </div>
    </div>
</div>