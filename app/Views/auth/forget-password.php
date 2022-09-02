<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Neoedukasi</title>
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Font-->
	<!--     Fonts and icons     -->
	<link href="<?= base_url('assets-user/css/nucleo-icons.css')?>" rel="stylesheet" />
	<!-- Main Style Css -->
    <link rel="stylesheet" href="<?= base_url ('assets-user/css/style.css')?>"/>
	<link id="pagestyle" href="<?= base_url('/assets-user/css/dashboard.css?v=2.0.4') ?>" rel="stylesheet" />
</head>
<body>
	<div class="page-content">
		<div class="form-v1-content">
			<div class="wizard-form">
		        <form class="form-register" action="#" method="post">					
		        	<div id="form-total">
			            <h2>
			            	<p class="step-icon text-white weight-bold"><span>00</span></p>
			            	<span class="step-text">Ubah password</span>
			            </h2>
			            <section>
			                <div class="inner">
			                	<div class="wizard-header">
									<h3 class="heading">Ubah Password</h3>
									<p> Silahkan lengkapi informasi berikut untuk melanjutkan proses selanjutnya.  </p>
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
	<script src="<?= base_url('assets-user/js/script.js')?>"></script>	
</body>
</html>