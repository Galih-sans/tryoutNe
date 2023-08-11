<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title><?= $data['title'] ?></title>
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Font-->
	<!--     Fonts and icons     -->
	<link href="<?= base_url('assets-front/css/nucleo-icons.css')?>" rel="stylesheet" />
	<!-- Main Style Css -->
	<link rel='stylesheet'
		href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css' />
	<link rel="stylesheet" href="<?= base_url ('assets-front/css/style.css')?>" />
    <link id="pagestyle" href="<?= base_url('assets-front/css/auth.css?v=2.0.4')?>" rel="stylesheet" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
	<link rel="stylesheet"
		href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
	<div class="page-content">
		<div class="form-v1-content">
			<div class="wizard-form">
				<?php $validation = \Config\Services::validation(); ?>
				<form class="form-register" method="post" action="<?php echo route_to('register'); ?>" >
					<div id="form-total">
						<!-- SECTION 1 -->

						<h2>
							<p class="step-icon"><span>01</span></p>
							<span class="step-text">Data Pengguna</span>
						</h2>
						<section>
							<div class="inner">
								<div class="wizard-header">
									<h3 class="heading">Data Pengguna</h3>
									<p> Silahkan lengkapi informasi berikut untuk melanjutkan proses selanjutnya. </p>
									<?php
            						// To print error messages
            						if (!empty($validations)) : ?>
									<div class="alert alert-danger">
										<?php foreach ($validations as $field => $validation) : ?>
										<p><?= $validation ?></p>
										<?php endforeach ?>
									</div>
									<?php endif ?>
								</div>
								<div class="form-row">
									<div class="mb-3 col-12">
										<input type="text" class="form-control" id="name" name="name" value="<?= isset($data['old']['full_name']) ? $data['old']['full_name'] : '' ;?>"
											placeholder="Nama Lengkap" required>
									</div>
								</div>
								
								<div class="form-row justify-content-between">
									<div class="mb-3 col-md-12">
										<div class="input-group">
											<span class="input-group-text">
												+62
											</span>
											<input type="text" class="form-control" id="phone_number" value="<?= isset($data['old']['phone_number']) ? $data['old']['phone_number'] : '' ;?>"
												name="phone_number" onkeyup="this.value=this.value.replace(/[^\d]/,'')"
												placeholder="No Handphone" required>
											</div>
											<div class="col-12" id="no_error"></div>
									</div>
								</div>
								<div class="form-row">
									<div class="col-12 mb-3">
										<input type="text" name="email" id="email" class="form-control" value="<?= isset($data['old']['email']) ? $data['old']['email'] : '' ;?>"
											pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}" placeholder="Email" required>
									</div>
								</div>
								<div class="form-row">
									<div class="mb-3 col-12">
										<input type="password" name="password" id="password" class="form-control"
											pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}" placeholder="Password" required>
									</div>
								</div>
								<div class="form-row">
									<div class="mb-3 col-12">
										<input type="password" name="confirm_password" id="confirm_password"
											class="form-control" pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}"
											placeholder="Konfirmasi Password" required>
									</div>
								</div>
								<div class="form-row">
								<div class="mb-3 col-12">
										<select class="form-control select2" name="gender" id="gender"> value="<?= isset($data['old']['gender']) ? $data['old']['gender'] : '' ;?>"
											<option value="jenjang" disabled selected>Jenis Kelamin</option>
											<option value="P">Perempuan</option>
											<option value="L">Laki-Laki</option>
										</select>
									</div>
								</div>
								<div class="form-row justify-content-between">
									<div class="col-12 mb-3">
										<input type="text" name="POB" id="POB" class="form-control" pattern="text" value="<?= isset($data['old']['POB']) ? $data['old']['POB'] : '' ;?>"
											placeholder="Tempat Lahir" required>
									</div>
								</div>
								<div class="form-row justify-content-between">
								<div class="mb-4 col-12">
										<div class="input-group">
											<input type="text" class="form-control datepicker" id="DOB" name="DOB" value="<?= isset($data['old']['DOB']) ? $data['old']['DOB'] : '' ;?>"
												readonly>
											<span class="input-group-text">
												<i class="ni ni-calendar-grid-58"></i>
											</span>
										</div>
										<div class="col-12" id="date_error"></div>
									</div>
								</div>
								<div class=" text-center pt-0 px-lg-2 px-1">
									<p class="mb-4 text-sm mx-auto">
										Sudah memiliki akun ?
										<a href="<?=route_to('login')?>"
											class="text-primary text-gradient font-weight-bold">Login</a>
									</p>
								</div>
							</div>
						</section>
						<!-- SECTION 2 -->
						<h2>
							<p class="step-icon"><span>02</span></p>
							<span class="step-text">Data Wali</span>
						</h2>
						<section>
							<div class="inner">
								<div class="wizard-header">
									<h3 class="heading">Data Wali</h3>
									<p>Silahkan lengkapi informasi berikut untuk melanjutkan proses selanjutnya. </p>
								</div>
								<div class="form-row">
									<div class="mb-3 col-12">
										<input type="text" class="form-control" id="parent_name" name="parent_name" value="<?= isset($data['old']['parent_name']) ? $data['old']['parent_name'] : '' ;?>"
											placeholder="Nama Lengkap Wali Murid" required>
									</div>
								</div>
								<div class="form-row">
									<div class="mb-3 col-12">
										<input type="text" name="parent_email" id="parent_email" class="form-control" value="<?= isset($data['old']['parent_email']) ? $data['old']['parent_email'] : '' ;?>"
											pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}" placeholder="Email Wali" required>
									</div>
								</div>
								<div class="form-row">
									<div class="mb-3 col-12">
										<div class="input-group">
											<span class="input-group-text">
												+62
											</span>
											<input type="text" class="form-control" id="parent_phone_number" value="<?= isset($data['old']['parent_phone_number']) ? $data['old']['parent_phone_number'] : '' ;?>"
												onkeyup="this.value=this.value.replace(/[^\d]/,'')"
												name="parent_phone_number" placeholder="Nomor Handphone" required>
										</div>
										<div class="col-12" id="pno_error"></div>
									</div>
								</div>
							</div>
						</section>
						<!-- SECTION 3 -->
						<h2>
							<p class="step-icon"><span>03</span></p>
							<span class="step-text">Data Sekolah</span>
						</h2>
						<section>
							<div class="inner">
								<div class="wizard-header">
									<h3 class="heading">Data Sekolah</h3>
									<p>Silahkan lengkapi data berikut untuk melanjutkan proses selanjutnya. </p>
								</div>
								<div class="form-row">
									<div class="mb-3 col-12">
										<select class="form-control select2" name="level" id="level"> value="<?= isset($data['old']['level']) ? $data['old']['level'] : '' ;?>"
											<option value="jenjang" disabled selected>Jenjang</option>
											<option value="SD">SD</option>
											<option value="SMP">SMP</option>
											<option value="SMA">SMA</option>
											<option value="Umum">Umum</option>
											<option value="Lainnya">Lainnya</option>
										</select>
									</div>
								</div>
								<div class="form-row d-none class_form">
									<div class="mb-3 col-12">
										<select title="Silahkan Pilih Jenjang Terlebih Dahulu"
											class="form-control select2" name="class" id="class">
										</select>
									</div>
								</div>
								<div class="school_from d-none">
									<div class="form-row justify-content-between">
										<div class="form-group mb-3 col-12">
											<select class="form-control select2" name="province" id="province">
												<option disabled='disabled' value='' selected>Silahkan Pilih Provinsi
												</option>
												<?php if($data['province']): ?>
												<?php foreach($data['province'] as $propinsi): ?>
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
									<div class="form-row">
										<div class="mb-3 col-12">
											<select title="Silahkan Pilih Jenjang Terlebih Dahulu"
												class="form-control select2" name="city" id="city">
											</select>
										</div>
									</div>
									<div class="form-row">
										<div class="mb-3 col-12">
											<select title="Silahkan Pilih Jenjang Terlebih Dahulu"
												class="form-control select2" name="districts" id="districts">
											</select>
										</div>
									</div>
									<div class="form-row">
										<div class="mb-3 col-12">
											<select title="Silahkan Pilih Jenjang Terlebih Dahulu"
												class="form-control select2" name="school" id="school">
											</select>
										</div>
									</div>
								</div>
						</section>
					</div>
				</form>
			</div>
		</div>
	</div>

	<script src="<?= base_url('assets-front/js/jquery-3.3.1.min.js')?>"></script>
	<script src="<?= base_url('assets-front/js/jquery.steps.js')?>"></script>
	<script src="<?= base_url('assets-front/js/main.js')?>"></script>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js'>
	</script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
		integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
	</script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
		integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
	</script>
	<script src="<?= base_url('assets-front/js/script.js')?>"></script> \
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</body>

</html>