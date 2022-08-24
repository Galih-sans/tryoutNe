<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Neoedukasi</title>
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Font-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets-user/css/opensans-font.css')?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets-user/css/material-design-iconic-font.min.css')?>">
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
	<!-- Main Style Css -->
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css'>
    <link rel="stylesheet" href="<?= base_url ('assets-user/css/style.css')?>"/>
	<link rel="stylesheet" href="<?= base_url ('css/bootstrap.min.css')?>"/>
</head>
<body>
	<div class="page-content">
		<div class="form-v1-content">
			<div class="wizard-form">
		        <form class="form-register" action="#" method="post">					
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
									<p>Silahkan lengkapi informasi berikut untuk melanjutkan proses selanjutnya.  </p>
								</div>
								<div class="form-row">
									<div class="mb-3 col-12">										
											<input type="text" class="form-control" id="Nama Lengkap" name="Nama Lengkap" placeholder="Nama Lengkap" required>
									</div>										
								</div>                                
								<div class="form-row justify-content-between">
									<div class="mb-3">										
											<input type="text" name="Email Pengguna" id="email" class="form-control" pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}" placeholder="Email" required>										
									</div>								
									<div class="col-6">
											<input type="text" class="form-control" id="phone" name="phone" placeholder="No Handphone" required>
										
									</div>
								</div>
                                <div class="form-row">
								<div class="mb-3 col-12">
									<input type="text" name="password" id="password" class="form-control" pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}" placeholder="Password" required>
									</div>
								</div>
                                <div class="form-row">
									<div class="mb-3 col-12">
											<input type="text" name="password" id="password" class="form-control" pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}" placeholder="Konfirmasi Password" required>
									</div>
								</div>
								<div class="form-row justify-content-between">
									<div class="mb-3">
											<input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" pattern="text" placeholder="Tempat Lahir" required>										
									</div>
									<div class="col-6">
										<div class="input-group date" id="datepicker">
											<input type="text" class="form-control" id="date"/>        <span class="input-group-append">
												<span class="input-group-text bg-light d-block">
													<i class="fa fa-calendar"></i>
												</span>
											</span>
										</div>
									</div>
								</div>
								<div class=" text-center pt-0 px-lg-2 px-1">
                                    <p class="mb-4 text-sm mx-auto">
                                        Sudah memiliki akun ?
                                        <a href="<?=route_to('login')?>" class="text-primary text-gradient font-weight-bold">Login</a>
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
									<p>Silahkan lengkapi informasi berikut untuk melanjutkan proses selanjutnya.  </p>
								</div>
								<div class="form-row">
								<div class="mb-3 col-12">
											<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" required>
									</div>									
								</div>                                
								<div class="form-row">
									<div class="mb-3 col-12">
											<input type="text" name="email_wali" id="email-wali" class="form-control" pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}" placeholder="Email Wali" required>
									</div>
								</div>
								<div class="form-row">
								<div class="mb-3 col-12">
											<input type="text" class="form-control" id="phone" name="phone" placeholder="Nomor Handphone" required>
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
									<p>Silahkan lengkapi data berikut untuk melanjutkan proses selanjutnya.  </p>
								</div>								
								<div class="form-row justify-content-between">
									<div class="mb-3">
											<input type="text" class="form-control" id="first-name" name="first-name" placeholder="Provinsi" required>
									</div>
									<div class="mb-3">
											<input type="text" class="form-control" id="last-name" name="last-name" placeholder="Provinsi Bagian" required>
									</div>
								</div>
                                <div class="form-row">
									<div class="mb-3 col-12">				
											<input type="text" class="form-control" id="kota" name="kota" placeholder="Kota" required>
									</div>
								</div>
                                <div class="form-row">
									<div class="mb-3 col-12">				
											<input type="text" class="form-control" id="nama-sekolah" name="nama-sekolah" placeholder="Nama Sekolah" required>
									</div>
								</div>
                                <div class="form-row">
									<div class="form-holder form-holder-2">
										<select name="provinsi" id="provinsi">
											<option value="jenjang" disabled selected>Jenjang</option>
											<option value="">SD</option>
											<option value="">SMP</option>
											<option value="">SMA</option>
											<option value="">Lainnya</option>
										</select>
									</div>
								</div>
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<select name="provinsi" id="provinsi">
											<option value="kelas" disabled selected>Kelas</option>
											<option value="">1</option>
											<option value="">2</option>
											<option value="">3</option>
											<option value="">4</option>
                                            <option value="">5</option>
											<option value="">6</option>
											<option value="">7</option>
											<option value="">8</option>
                                            <option value="">9</option>
											<option value="">10</option>
											<option value="">11</option>
											<option value="">12</option>
                                            <option value="">Lainnya</option>
									</select>
									</div>								
								</div>								
			            </section>									
		        	</div>										
		        </form>					
			</div>
		</div>				
	</div>
	
	<script src="<?= base_url('assets-user/js/jquery-3.3.1.min.js')?>"></script>
	<script src="<?= base_url('assets-user/js/jquery.steps.js')?>"></script>
	<script src="<?= base_url('assets-user/js/main.js')?>"></script>
	<script src="<?= base_url('assets-user/js/core/bootstrap.min.js')?>"></script>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js'></script>
	<script src="<?= base_url('assets-user/js/script.js')?>"></script>	
</body>
</html>