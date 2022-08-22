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
	<!-- Main Style Css -->
    <link rel="stylesheet" href="<?= base_url ('assets-user/css/style.css')?>"/>
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
									<div class="form-holder form-holder-2">
										<fieldset>
											<legend>Nama Lengkap</legend>
											<input type="text" class="form-control" id="Nama Lengkap" name="Nama Lengkap" placeholder="Nama Lengkap" required>
										</fieldset>
									</div>									
								</div>                                
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<fieldset>
											<legend>Email Pengguna</legend>
											<input type="text" name="Email Pengguna" id="email" class="form-control" pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}" placeholder="example@email.com" required>
										</fieldset>
									</div>
								</div>
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<fieldset>
											<legend>Nomor Telepon</legend>
											<input type="text" class="form-control" id="phone" name="phone" placeholder="+62 888-999-7777" required>
										</fieldset>
									</div>
								</div>
                                <div class="form-row">
									<div class="form-holder form-holder-2">
										<fieldset>
											<legend>Password</legend>
											<input type="text" name="password" id="password" class="form-control" pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}" placeholder="" required>
										</fieldset>
									</div>
								</div>
                                <div class="form-row">
									<div class="form-holder form-holder-2">
										<fieldset>
											<legend>Konfirmasi Password</legend>
											<input type="text" name="password" id="password" class="form-control" pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}" placeholder="" required>
										</fieldset>
									</div>
								</div>
								<div class="form-row form-row-date">
									<div class="form-holder">
									<fieldset>
											<legend>Tempat Lahir</legend>
											<input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" pattern="text" placeholder="" required>
										</fieldset>
										<label class="special-label">Tanggal Lahir</label>
										<select name="month" id="month">
											<option value="MM" disabled selected>MM</option>
											<option value="16">16</option>
											<option value="17">17</option>
											<option value="18">18</option>
											<option value="19">19</option>
										</select>
										<select name="date" id="date">
											<option value="DD" disabled selected>DD</option>
											<option value="Feb">Feb</option>
											<option value="Mar">Mar</option>
											<option value="Apr">Apr</option>
											<option value="May">May</option>
										</select>
										<select name="year" id="year">
											<option value="YYYY" disabled selected>YYYY</option>
											<option value="2017">2017</option>
											<option value="2016">2016</option>
											<option value="2015">2015</option>
											<option value="2014">2014</option>
											<option value="2013">2013</option>
										</select>
									</div>
								</div>								
							</div>
			            </section>
						<!-- SECTION 1 -->
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
									<div class="form-holder form-holder-2">
										<fieldset>
											<legend>Nama Lengkap</legend>
											<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" required>
										</fieldset>
									</div>									
								</div>                                
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<fieldset>
											<legend>Email Wali</legend>
											<input type="text" name="email_wali" id="email-wali" class="form-control" pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}" placeholder="example@email.com" required>
										</fieldset>
									</div>
								</div>
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<fieldset>
											<legend>Nomor Telepon</legend>
											<input type="text" class="form-control" id="phone" name="phone" placeholder="+62 888-999-7777" required>
										</fieldset>
									</div>
								</div>											
							</div>
			            </section>
						<!-- SECTION 2 -->
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
								<div class="form-row">
									<div class="form-holder">
										<fieldset>
											<legend>Provinsi</legend>
											<input type="text" class="form-control" id="first-name" name="first-name" placeholder="Provinsi" required>
										</fieldset>
									</div>
									<div class="form-holder">
										<fieldset>
											<legend>Provinsi Bagian</legend>
											<input type="text" class="form-control" id="last-name" name="last-name" placeholder="Provinsi Bagian" required>
										</fieldset>
									</div>
								</div>
                                <div class="form-row">
									<div class="form-holder form-holder-2">                                        
										<fieldset>							
                                            <legend>Kota</legend>				
											<input type="text" class="form-control" id="nama-sekolah" name="nama-sekolah" placeholder="Kota" required>
										</fieldset>
									</div>
								</div>
                                <div class="form-row">
									<div class="form-holder form-holder-2">                                        
										<fieldset>							
                                            <legend>Nama Sekolah</legend>				
											<input type="text" class="form-control" id="nama-sekolah" name="nama-sekolah" placeholder="Nama Sekolah" required>
										</fieldset>
									</div>
								</div>
                                <div class="form-row">
									<div class="form-holder form-holder-2">
										<label class="special-label">Jenjang</label>
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
										<label class="special-label">Kelas</label>
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
</body>
</html>