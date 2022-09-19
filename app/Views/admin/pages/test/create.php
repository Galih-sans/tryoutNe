<div class="modal fade" id="questionModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="block block-rounded mb-0">
                <div class="block-header block-header-ne">
                    <h3 class="block-title text-white">Tambah Test Baru : </h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option-white" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content fs-sm pb-4 bg-body">
                    <form id="subject_form">
                        <div class="row">
                            <div class="col-12 col-md-12 py-1">
                                <span class="fw-bolder text-neo">
                                    <meta charset="utf-8">⋮⋮</span>
                                <label class="fw-normal fs-6 text-black-50"> Nama Test</label>
                                <input type="text" class="form-control form-rounded" id="test_name" name="test_name"
                                    placeholder="Nama Test">
                            </div>
                            <div class="col-12 col-md-12 py-1">
                                <span class="fw-bolder text-neo">
                                    <meta charset="utf-8">⋮⋮</span>
                                <label class="fw-normal text-black-50"> Tanggal Test</label>
                                <div class="row">
                                    <div class="col-12 col-md-5">
                                        <input type="text" class="form-control form-rounded" id="test_name"
                                            name="test_name" placeholder="Tanggal Mulai">
                                    </div>
                                    <div class="col-12 col-md-2">
                                        <div class="bg-neo form-control text-center">
                                            <span class="text-white">s/d</span>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-5">
                                        <input type="text" class="form-control form-rounded" id="test_name"
                                            name="test_name" placeholder="Tanggal Selesai">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 py-1">
                                <span class="fw-bolder text-neo">
                                    <meta charset="utf-8">⋮⋮</span>
                                <label class="fw-normal text-black-50"> Durasi Test ( Menit )</label>
                                <input type="number" class="form-control form-rounded" id="test_name" name="test_name"
                                    placeholder="Durasi Test">
                            </div>
                            <div class="col-12 col-md-6 py-1">
                                <span class="fw-bolder text-neo">
                                    <meta charset="utf-8">⋮⋮</span>
                                <label class="fw-normal text-black-50"> Jumlah Soal</label>
                                <input type="number" class="form-control form-rounded" id="test_name" name="test_name"
                                    placeholder="Jumlah Soal">
                            </div>
                            <div class="col-12 col-md-6 py-1">
                                <span class="fw-bolder text-neo">
                                    <meta charset="utf-8">⋮⋮</span>
                                <label class="fw-normal text-black-50"> Kelas</label>
                                <input type="text" class="form-control form-rounded" id="test_name" name="test_name"
                                    placeholder="Kelas">
                            </div>
                            <div class="col-12 col-md-6 py-1">
                                <span class="fw-bolder text-neo">
                                    <meta charset="utf-8">⋮⋮</span>
                                <label class="fw-normal text-black-50"> Jenis ( Gratis / Premium )</label>
                                <input type="number" class="form-control form-rounded" id="test_name" name="test_name"
                                    placeholder="Jenis ( Gratis / Premium )">
                            </div>
                            <div class="col-12 col-md-6 py-1">
                                <span class="fw-bolder text-neo">
                                    <meta charset="utf-8">⋮⋮</span>
                                <label class="fw-normal text-black-50"> Harga</label>
                                <input type="text" class="form-control form-rounded" id="test_name" name="test_name"
                                    placeholder="Harga">
                            </div>
                            <div class="col-12 col-md-6 py-1">
                                <span class="fw-bolder text-neo">
                                    <meta charset="utf-8">⋮⋮</span>
                                <label class="fw-normal text-black-50"> Opsi Test</label>
                                <div class="space-y-4 mx-4">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="random_question" name="random_question" checked="">
                                        <label class="form-check-label fst-normal text-black-75" for="random_question">Soal Acak</label>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="random_answer" name="random_answer">
                                        <label class="form-check-label fst-normal text-black-75" for="random_answer">Jawaban Acak</label>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="show_result" name="show_result">
                                        <label class="form-check-label fst-normal text-black-75" for="show_result">Tunjukan Hasil Test</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-12 py-1">
                                <span class="fw-bolder text-neo">
                                    <meta charset="utf-8">⋮⋮</span>
                                <label class="fw-normal text-black-50"> Komposisi Soal Test</label>
                                <div class="row">
                                    <div class="col-12 col-md-4">
                                    <input type="number" class="form-control form-rounded" id="test_name" name="test_name"
                                    placeholder="Jenis ( Gratis / Premium )">
                                    </div>
                                    <div class="col-12 col-md-4">
                                    <input type="number" class="form-control form-rounded" id="test_name" name="test_name"
                                    placeholder="Jenis ( Gratis / Premium )">
                                    </div>
                                    <div class="col-12 col-md-4">
                                    <input type="number" class="form-control form-rounded" id="test_name" name="test_name"
                                    placeholder="Jenis ( Gratis / Premium )">
                                    </div>
                                </div>

                                
                            </div>
                        </div>
                    </form>
                </div>
                <div class="block-content block-content-full text-end bg-body text-end">
                    <button type="button" class="btn btn-sm btn-secondary me-1" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal"
                        onclick="insert_data()">Simpan</button>
                </div>
                <div class="modal-footer block-content modal-footer-ne">
                </div>
            </div>
        </div>
    </div>
</div>