<?= $this->extend('user/layout/app') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
  <div class="row items-push mt-4">
    <div class="block block-rounded shadow-sm bg-success">
      <div class="content content-full text-center pt-7 pb-5">
        <h1 class="h2 text-white mb-2">
          Raih Mimpimu Bersama Neoedukasi.
        </h1>
        <h2 class="h4 fw-normal text-white-75">
          kami menyediakan lebih dari 1000+ tryout untuk perkembangan kamu.
        </h2>
      </div>
    </div>
    <div class="content content-boxed">
      <div class="row items-push">
        <?php foreach ($data['testData'] as $item) : ?>
          <!-- Course -->
          <?php
          $no = 1;
          $today = strtotime(date('d-m-Y'));
          $batasWaktu = date("d-m-Y", substr($item->end_time, 0, 10));;
          // $todayTime = strtotime($today);
          $newDateTime = strtotime($batasWaktu);
          $statusTest = $item->status;
          if ($statusTest == 100 && $newDateTime > $today) {
          ?>
            <div class="col-12 col-md-4 col-lg-3 col-xl-3">
              <a class="block block-rounded block-link-pop h-100 mb-0" href="<?= route_to('user.test.view', strtr(base64_encode($data['encrypter']->encrypt($item->id)), array('+' => '.', '=' => '-', '/' => '~'))) ?>">
                <div class="block-content block-content-full ribbon ribbon-danger ribbon-left text-center bg-flat">
                  <div class="ribbon-box <?= ($item->type == 'free') ? 'd-none' : ''; ?>">
                    <?= $item->price ?>
                  </div>
                  <div class="item item-2x item-circle bg-white-10 py-3 my-3 mx-auto">
                    <i class="fab fa- fa-2x text-white-75"></i>
                  </div>
                  <div class="fs-sm text-white-75">
                    <?= $item->composition ?> Materi &bull; <?= $item->duration ?> Menit
                  </div>
                </div>
                <div class="block-content block-content-full">
                  <h4 class="h5 mb-1">
                    <?= $item->test_name ?>
                  </h4>
                  <div class="fs-sm text-muted"><?= date("d-m-Y H:i", $item->begin_time); ?></div>
                  <span class="badge badge-sm <?= ($item->type == 'free') ? 'bg-gradient-success' : 'bg-gradient-warning'; ?> "><?= $item->type ?></span>
                </div>
              </a>
            </div>
          <?php
          } else {
          ?>
            <div class="col-12 col-md-4 col-lg-3 col-xl-3">
              <div class="block-content block-content-full ribbon ribbon-danger ribbon-left text-center bg-flat">
                <div class="item item-2x item-circle bg-white-10 py-3 my-3 mx-auto">
                  <i class="fab fa- fa-2x text-white-75"></i>
                </div>
              </div>
              <div class="block-content block-content-full">
                <h4 class="h5 mb-1">
                  Belum ada test saat ini
                </h4>
              </div>
            </div>
            <?php break; ?>
          <?php
          }
          ?>
          <!-- END Course -->
        <?php endforeach; ?>
      </div>
    </div>
    <!-- END Page Content -->

  </div>
</div>
<?= $this->endSection() ?>