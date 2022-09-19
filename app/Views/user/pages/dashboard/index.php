<?= $this->extend('user/layout/app') ?>
<?= $this->section('content') ?>
<div class="container-fluid">
  <div class="row mt-4">
    <div class="col-lg-7 mb-lg-0 mb-4">
      <div class="card z-index-2 h-100">
        <div class="card-header pb-0 pt-3 bg-transparent">
          <h6 class="text-capitalize">Test Overview</h6>
          <p class="text-sm mb-0">
            <i class="fa fa-arrow-up text-success"> 4% more</i>
            <span class="font-weight-bold"></span> last week
          </p>
        </div>
        <div class="card-body p-3">
          <div class="chart">
            <canvas id="chart-line" class="chart-canvas" height="300"></canvas>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-5">
      <div class="card card-carousel overflow-hidden h-100 p-0">
        <div id="carouselExampleCaptions" class="carousel slide h-100" data-bs-interval="3000" data-bs-ride="carousel">
          <div class="carousel-inner border-radius-lg h-100">
            <div class="carousel-item h-100 active"
              style="background-image: url('<?= base_url('assets-front/img/carousel-1.jpg')?>'); background-size: cover;">
              <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
                  <i class="ni ni-camera-compact text-dark opacity-10"></i>
                </div>
                <h5 class="text-white mb-1">Challange yourslef with us</h5>
                <p>Tidak ada kata gagal dalam berusaha, hanya hasil yang tertunda.</p>
              </div>
            </div>
            <div class="carousel-item h-100"
              style="background-image: url('<?= base_url('assets-front/img/carousel-2.jpg')?>'); background-size: cover;">
              <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
                  <i class="ni ni-bulb-61 text-dark opacity-10"></i>
                </div>
                <h5 class="text-white mb-1">Be Yourself</h5>
                <p>Tingkatkan belajar mu raih impian mu.</p>
              </div>
            </div>
            <div class="carousel-item h-100"
              style="background-image: url('<?= base_url('assets-front/img/carousel-3.jpg')?>'); background-size: cover;">
              <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
                  <i class="ni ni-trophy text-dark opacity-10"></i>
                </div>
                <h5 class="text-white mb-1">Bagikan keberhasilan mu</h5>
                <p>Karena setiap capaian wajib dibagikan, prestasimu kebanggan kami.</p>
              </div>
            </div>
          </div>
          <button class="carousel-control-prev w-5 me-3" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next w-5 me-3" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
    </div>
  </div>
  <div class="row mt-4">
    <div class="col-lg-7 mb-lg-0 mb-4">
      <div class="card ">
        <div class="card-header pb-0 p-3">
          <div class="d-flex justify-content-between">
            <h6 class="mb-2">Best Student of the month</h6>
          </div>
        </div>
        <div class="table-responsive">
          <table class="table align-items-center ">
            <tbody>
              <tr>
                <td class="w-30">
                  <div class="d-flex px-2 py-1 align-items-center">
                    <div>
                      <img src="" alt="">
                    </div>
                    <div class="ms-4">
                      <p class="text-xs font-weight-bold mb-0">Name:</p>
                      <h6 class="text-sm mb-0">Mahadma Gandi</h6>
                    </div>
                  </div>
                </td>
                <td>
                  <div class="text-center">
                    <p class="text-xs font-weight-bold mb-0">Rank</p>
                    <h6 class="text-sm mb-0">1</h6>
                  </div>
                </td>
                <td>
                  <div class="text-center">
                    <p class="text-xs font-weight-bold mb-0">Nilai</p>
                    <h6 class="text-sm mb-0">98</h6>
                  </div>
                </td>
                <td class="align-middle text-sm">
                  <div class="col text-center">
                    <p class="text-xs font-weight-bold mb-0">Sekolah asal</p>
                    <h6 class="text-sm mb-0">SMKN 1 SURABAYA</h6>
                  </div>
                </td>
              </tr>
              <tr>
                <td class="w-30">
                  <div class="d-flex px-2 py-1 align-items-center">
                    <div>
                      <img src="" alt="">
                    </div>
                    <div class="ms-4">
                      <p class="text-xs font-weight-bold mb-0">Name:</p>
                      <h6 class="text-sm mb-0">Bernadus Hutapea</h6>
                    </div>
                  </div>
                </td>
                <td>
                  <div class="text-center">
                    <p class="text-xs font-weight-bold mb-0">Rank</p>
                    <h6 class="text-sm mb-0">2</h6>
                  </div>
                </td>
                <td>
                  <div class="text-center">
                    <p class="text-xs font-weight-bold mb-0">Nilai</p>
                    <h6 class="text-sm mb-0">97</h6>
                  </div>
                </td>
                <td class="align-middle text-sm">
                  <div class="col text-center">
                    <p class="text-xs font-weight-bold mb-0">Sekolah asal</p>
                    <h6 class="text-sm mb-0">SMAN 1A BATAM</h6>
                  </div>
                </td>
              </tr>
              <tr>
                <td class="w-30">
                  <div class="d-flex px-2 py-1 align-items-center">
                    <div>
                      <img src="" alt="">
                    </div>
                    <div class="ms-4">
                      <p class="text-xs font-weight-bold mb-0">Name:</p>
                      <h6 class="text-sm mb-0">Panggah Jegagakan</h6>
                    </div>
                  </div>
                </td>
                <td>
                  <div class="text-center">
                    <p class="text-xs font-weight-bold mb-0">Rank</p>
                    <h6 class="text-sm mb-0">3</h6>
                  </div>
                </td>
                <td>
                  <div class="text-center">
                    <p class="text-xs font-weight-bold mb-0">Nilai</p>
                    <h6 class="text-sm mb-0">88</h6>
                  </div>
                </td>
                <td class="align-middle text-sm">
                  <div class="col text-center">
                    <p class="text-xs font-weight-bold mb-0">Sekolah asal</p>
                    <h6 class="text-sm mb-0">SMAN 1 PEKALONGAN</h6>
                  </div>
                </td>
              </tr>
              <tr>
                <td class="w-30">
                  <div class="d-flex px-2 py-1 align-items-center">
                    <div>
                      <img src="" alt="">
                    </div>
                    <div class="ms-4">
                      <p class="text-xs font-weight-bold mb-0">Name:</p>
                      <h6 class="text-sm mb-0">Jonatan Akbar</h6>
                    </div>
                  </div>
                </td>
                <td>
                  <div class="text-center">
                    <p class="text-xs font-weight-bold mb-0">Rank</p>
                    <h6 class="text-sm mb-0">4</h6>
                  </div>
                </td>
                <td>
                  <div class="text-center">
                    <p class="text-xs font-weight-bold mb-0">Nilai</p>
                    <h6 class="text-sm mb-0">80</h6>
                  </div>
                </td>
                <td class="align-middle text-sm">
                  <div class="col text-center">
                    <p class="text-xs font-weight-bold mb-0">Sekolah asal</p>
                    <h6 class="text-sm mb-0">SMAN 1 SEMARANG</h6>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="col-lg-5">
      <div class="card">
        <div class="card-header pb-0 p-3">
          <h6 class="mb-0">Calender of tes</h6>
        </div>
        <div class="card-body p-3">
          <ul class="list-group">
            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
              <div class="d-flex align-items-center">
                <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                  <i class="ni ni-mobile-button text-white opacity-10"></i>
                </div>
                <div class="d-flex flex-column">
                  <h6 class="mb-1 text-dark text-sm">UN Fisika</h6>
                  <span class="text-xs">25 Agustus 2023, <span class="font-weight-bold text-primary">Free</span></span>
                </div>
              </div>
              <div class="d-flex">
                <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i
                    class="ni ni-bold-right" aria-hidden="true"></i></button>
              </div>
            </li>
            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
              <div class="d-flex align-items-center">
                <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                  <i class="ni ni-tag text-white opacity-10"></i>
                </div>
                <div class="d-flex flex-column">
                  <h6 class="mb-1 text-dark text-sm">Tryout Unpad</h6>
                  <span class="text-xs">02 Juli 2023, <span class="font-weight-bold text-primary">Free</span></span>
                </div>
              </div>
              <div class="d-flex">
                <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i
                    class="ni ni-bold-right" aria-hidden="true"></i></button>
              </div>
            </li>
            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
              <div class="d-flex align-items-center">
                <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                  <i class="ni ni-box-2 text-white opacity-10"></i>
                </div>
                <div class="d-flex flex-column">
                  <h6 class="mb-1 text-dark text-sm">Simak UI</h6>
                  <span class="text-xs">01 Mei 2023, <span class="font-weight-bold text-success">Premium</span></span>
                </div>
              </div>
              <div class="d-flex">
                <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i
                    class="ni ni-bold-right" aria-hidden="true"></i></button>
              </div>
            </li>
            <li class="list-group-item border-0 d-flex justify-content-between ps-0 border-radius-lg">
              <div class="d-flex align-items-center">
                <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                  <i class="ni ni-satisfied text-white opacity-10"></i>
                </div>
                <div class="d-flex flex-column">
                  <h6 class="mb-1 text-dark text-sm">UTBK IPB</h6>
                  <span class="text-xs">12 September 2023, <span
                      class="font-weight-bold text-success">Premium</span></span>
                </div>
              </div>
              <div class="d-flex">
                <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i
                    class="ni ni-bold-right" aria-hidden="true"></i></button>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>
