<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="apple-touch-icon" sizes="76x76" href=" ">
	<link rel="icon" type="image/png" href="<?= base_url('assets/favicon/logo-ne.ico')?>"">
  <title>
   <?= $pagedata['tittle'] ?>
  </title>
  <!--     Fonts and icons     -->
  <link href=" https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
	<!-- Nucleo Icons -->
	<link href="<?= base_url('assets-front/css/nucleo-icons.css')?>" rel="stylesheet" />
	<link href="<?= base_url('assets-front/css/nucleo-svg.css')?>" rel="stylesheet" />
	<!-- Font Awesome Icons -->
	<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
	<link href="<?= base_url('assets-front/css/nucleo-svg.css')?>" rel=" stylesheet" />
	<!-- CSS Files -->
    <link id="pagestyle" href="<?= base_url('assets-front/css/auth.css?v=2.0.4')?>" rel="stylesheet" />
</head>

<body class="">

	<main class="main-content  mt-0">
		<section>
			<div class="page-header min-vh-100">
				<div class="container">
					<div class="row">
						<div class="col-12 col-xl-6 col-lg-6 col-md-6 d-flex flex-column col-md-offset-3 mx-auto">
							<div class="card card-plain">
								<div class="card-header pb-0 text-start">
									<h4 class="font-weight-bolder">Atur Ulang Kata Sandi</h4>
									<p class="mb-0">Silahkan Masukkan kata sandi dan konfirmasi kata sandi baru.</p>
								</div>
								<div class="card-body">
									<form role="form" class="form"
										action="<?= route_to('resetpassword') ?>" method="post">
										<div class="mb-3">
											<label for="password">Kata Sandi</label>
											<input type="password" class="form-control form-control-lg"
												placeholder="Kata Sandi" id="password" name="password" aria-label="password">
										</div>
										<div class="mb-3">
											<label for="password_confirm">Konfirmasi Kata Sandi</label>
											<input type="password" class="form-control form-control-lg"
												placeholder="Konfirmasi Kata Sandi" id="password_confirm" name="password_confirm"
												aria-label="password_confirm">
										</div>
										<div class="text-center">
											<button type="submit"
												class="btn btn-lg bg-gradient-success btn-lg w-100 mt-4 mb-0">Atur
												Ulang</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</main>

	<script src="<?= base_url('assets-front/js/jquery-3.3.1.min.js')?>"></script>
	<script src="<?= base_url('assets-front/js/core/popper.min.js')?>"></script>
	<script src="<?= base_url('assets-front/js/core/bootstrap.min.js')?>"></script>
	<script src="<?= base_url('assets-front/js/plugins/perfect-scrollbar.min.js')?>"></script>
	<script src="<?= base_url('assets-front/js/plugins/smooth-scrollbar.min.js')?>"></script>
	<script async defer src="https://buttons.github.io/buttons.js"></script>
	<script src="<?= base_url('assets-front/js/dashboard.min.js?v=2.0.4') ?>"></script>
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

	<script>
		jQuery.extend(jQuery.validator.messages, {
			required: "Bagian ini harus diisi.",
			equalTo: "Silahkan Masukkan Kata Sandi yang sama.",
			minlength: jQuery.validator.format("Silahkan masukkan minimal {0} Karakter."),
		});
		
		$(".form").validate({
			errorClass: 'is-invalid text-danger',
			successClass: 'is-valid',
			errorsWrapper: '<span class="form-text text-danger"></span>',
			errorTemplate: '<span></span>',
			trigger: 'change',
			rules: {
				password: {
					required: true,
					minlength: 5
				},
				password_confirm: {
					required: true,
					equalTo: password
				}
			}
		});
	</script>
</body>

</html>