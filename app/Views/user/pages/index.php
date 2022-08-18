<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Neoedukasi</title>
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Font-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets-user/css/opensans-font.css')?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets-user/fonts/material-design-iconic-font.min.css')?>">
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
			            	<span class="step-text">Personal Infomation</span>
			            </h2>
			            <section>
			                <div class="inner">
			                	<div class="wizard-header">
									<h3 class="heading">Personal Infomation</h3>
									<p>Please enter your infomation and proceed to the next step so we can build your accounts.  </p>
								</div>
								<div class="form-row">
									<div class="form-holder">
										<fieldset>
											<legend>First Name</legend>
											<input type="text" class="form-control" id="first-name" name="first-name" placeholder="First Name" required>
										</fieldset>
									</div>
									<div class="form-holder">
										<fieldset>
											<legend>Last Name</legend>
											<input type="text" class="form-control" id="last-name" name="last-name" placeholder="Last Name" required>
										</fieldset>
									</div>
								</div>                                
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<fieldset>
											<legend>Your Email</legend>
											<input type="text" name="your_email" id="your_email" class="form-control" pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}" placeholder="example@email.com" required>
										</fieldset>
									</div>
								</div>
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<fieldset>
											<legend>Phone Number</legend>
											<input type="text" class="form-control" id="phone" name="phone" placeholder="+1 888-999-7777" required>
										</fieldset>
									</div>
								</div>
                                <div class="form-row">
									<div class="form-holder form-holder-2">
										<fieldset>
											<legend>Password</legend>
											<input type="text" name="your_email" id="your_email" class="form-control" pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}" placeholder="" required>
										</fieldset>
									</div>
								</div>
                                <div class="form-row">
									<div class="form-holder form-holder-2">
										<fieldset>
											<legend>Konfirmasi Password</legend>
											<input type="text" name="your_email" id="your_email" class="form-control" pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}" placeholder="" required>
										</fieldset>
									</div>
								</div>
								<div class="form-row form-row-date">
									<div class="form-holder form-holder-2">
										<label class="special-label">Birth Date</label>
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
						<!-- SECTION 2 -->
			            <h2>
			            	<p class="step-icon"><span>02</span></p>
			            	<span class="step-text">School Account</span>
			            </h2>
			            <section>
			                 <div class="inner">
			                	<div class="wizard-header">
									<h3 class="heading">School Infomation</h3>
									<p>Please enter your infomation and proceed to the next step so we can build your accounts.  </p>
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
									<div class="form-holder form-holder-2">
                                        <label class="special-label">Jurusan</label>
										<fieldset>	                                            									
											<input type="text" class="form-control" id="nama-sekolah" name="nama-sekolah" placeholder="Jurusan" required>
										</fieldset>
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