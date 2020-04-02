<section id="page-title">

	<div class="container clearfix">
		<h1>My Account</h1>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="#">Home</a></li>
			<li class="breadcrumb-item"><a href="#">Pages</a></li>
			<li class="breadcrumb-item active" aria-current="page">Login</li>
		</ol>
	</div>

</section><!-- #page-title end -->


<section id="content">

	<div class="content-wrap">

		<div class="container clearfix">

			<div class="tabs divcenter nobottommargin clearfix" id="tab-login-register" style="max-width: 500px;">

				<?php if($this->session->flashdata('notif')){ ?>
				
				<div class="modal-on-load" data-target="#myModal1"></div>
				<!-- Modal -->
				<div class="modal1 mfp-hide" id="myModal1">
					<div class="block divcenter" style="background-color: #FFF; max-width: 500px;">
						<div class="center" style="padding: 50px;">
							<h3>Notifikasi</h3>
							<p class="nobottommargin">Silahkan Gunakan Username dan Password Anda  <br>Login ke Sistem Marketing</p>
							<p style="padding-top: 10px;"><strong><?php echo $this->session->flashdata('notif') ?></strong></p>
						</div>
						<div class="section center nomargin" style="padding: 30px;">
							<a href="#" class="button" onClick="$.magnificPopup.close();return false;">OK, Lanjutkan !!!</a>
						</div>
					</div>
				</div>
				<?php }elseif($this->session->flashdata('error')){ ?>
					<div class="style-msg errormsg">
						<div class="sb-msg"><i class="icon-warning-sign"></i><strong>Ooppss!</strong> <?php echo $this->session->flashdata('error') ?></div>
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					</div>
				<?php } ?>

				<ul class="tab-nav tab-nav2 center clearfix">
					<li class="inline-block"><a href="#tab-login" class="button button-rounded button-reveal button-large button-white button-light tright"><i class="icon-lock2"></i><span>Beranda Akun</span></a></li>
					<li class="inline-block"><a href="#tab-register" class="button  button-rounded button-reveal button-large button-yellow button-light"><i class="icon-line2-user-follow"></i><span>Daftar Marketing</span></a></li>
				</ul>

				<div class="tab-container">
					<div class="tab-content clearfix" id="tab-login">
						<div class="card nobottommargin">
							<div class="card-body" style="padding: 40px;">
								<form id="login-form" name="login-form" class="nobottommargin" action="<?php echo base_url()?>auth/login_process" method="post">

									<h3>Rahasiakan Identitas Anda</h3>

									<div class="col_full">
										<label for="login-form-username">Username:</label>
										<input type="text" id="login-form-username" name="username" required value="" class="form-control" />
									</div>

									<div class="col_full">
										<label for="login-form-password">Password:</label>
										<input type="password" id="" name="password" required value="" class="form-control" />
									</div>

									<div class="col_full nobottommargin">
										<button class="button button-3d button-black nomargin" id="login-form-submit" type="submit" name="login-form-submit" value="login">Masuk</button>
										<a href="#" class="fright">Lupa Password?</a>
									</div>

								</form>
							</div>
						</div>
					</div>

					<div class="tab-content clearfix" id="tab-register">
						<div class="card nobottommargin">
							<div class="card-body" style="padding: 40px;">
								<h3>Jadikan Diri Anda Sebagai Partner Kerja Kami</h3>

								<form id="register-form" name="register-form" class="nobottommargin" action="<?php echo base_url().'daftar/save'?>" method="post" enctype="multipart/form-data">
									<div class="col_full">
										<label for="register-form-name">Nama Lengkap:</label>
										<input type="text" id="register-form-name" name="nama" required class="form-control" />
										<small class="form-text text-muted">*) Sesuaikan Nama Anda dengan yang tertera pada Kartu Identitas Anda</small>
									</div>

									<div class="row">
										<div class="col-6 form-group">
											<label for="register-form-name">Bank:</label>
												<select class="select-1 form-control" required name="bank" style="width:100%;">
												<option value=""></option>
												<optgroup label="KODE BANK NEGARA, SWASTA, DAN SYARIAH">
													<option value="BRI (002)">BRI (002)</option>
													<option value="BRI SYARIAH (422)">BRI SYARIAH (422)</option>
													<option value="BCA (014)">BCA (014)</option>
													<option value="BCA SYARIAH (536)">BCA SYARIAH (536)</option>
													<option value="MANDIRI (008)">MANDIRI (008)</option>
													<option value="BNI (009)">BNI (009)</option>
													<option value="BNI SYARIAH (427)">BNI SYARIAH (427)</option>
													<option value="SYARIAH MANDIRI (BSM) (451)">SYARIAH MANDIRI (BSM) (451)</option>
													<option value="CIMB NIAGA (022)">CIMB NIAGA (022)</option>
													<option value="CIMB NIAGA SYARIAH (022)">CIMB NIAGA SYARIAH (022)</option>
													<option value="CIMB NIAGA (022)">CIMB NIAGA (022)</option>
													<option value="SYARIAH MANDIRI (BSM) (451)">SYARIAH MANDIRI (BSM) (451)</option>
													<option value="MUAMALAT (147)">MUAMALAT (147)</option>
													<option value="BTPN (213)">BTPN (213)</option>
													<option value="BTPN SYARIAH (547)">BTPN SYARIAH (547)</option>
													<option value="JENIUS (213)">JENIUS (213)</option>
													<option value="BTN (200)">BTN (200)</option>
													<option value="PERMATA (013)">PERMATA (013)</option>
													<option value="DANAMON (011)">DANAMON (011)</option>
													<option value="BII MAYBANK (016)">BII MAYBANK (016)</option>
													<option value="MEGA (426)">MEGA (426)</option>
													<option value="SINARMAS (153)">SINARMAS (153)</option>
													<option value="COMMONWEALTH (950)">COMMONWEALTH (950)</option>
													<option value="OCBC NISP (028)">OCBC NISP (028)</option>
													<option value="BUKOPIN (441)">BUKOPIN (441)</option>
													<option value="BUKOPIN SYARIAH (521)">BUKOPIN SYARIAH (521)</option>
													<option value="LIPPO (026)">LIPPO (026)</option>
													<option value="CITIBANK (031)">CITIBANK (031)</option>
												</optgroup>
												<optgroup label="KODE BANK DAERAH">
													<option value="BANK SULTRA (135)">BANK SULTRA (135)</option>
													<option value="BANK JABAR (110)">BANK JABAR (110)</option>
													<option value="BANK DKI JAKARTA (111)">BANK DKI JAKARTA (111)</option>
													<option value="BPD DIY (YOGYAKARTA) (112)">BPD DIY (YOGYAKARTA) (112)</option>
													<option value="BANK JATENG (JAWA TENGAH) (113)">BANK JATENG (JAWA TENGAH) (113)</option>
													<option value="BANK JATIM (JAWA TIMUR) (114)">BANK JATIM (JAWA TIMUR) (114)</option>
													<option value="BPD JAMBI (115)">BPD JAMBI (115)</option>
													<option value="BPD ACEH (116)">BPD ACEH (116)</option>
													<option value="BPD ACEH SYARIAH (116)">BPD ACEH SYARIAH (116)</option>
													<option value="BANK SUMUT (117)">BANK SUMUT (117)</option>
													<option value="BANK NAGARI (BANK SUMBAR) (118)">BANK NAGARI (BANK SUMBAR) (118)</option>
													<option value="BANK RIAU KEPRI (119)">BANK RIAU KEPRI (119)</option>
													<option value="BANK SUMSEL BABEL (120)">BANK SUMSEL BABEL (120)</option>
												</optgroup>
											</select>
										</div>
										
										<div class="col-6 form-group">
											<label for="register-form-name">No Rekening:</label>
											<input type="text" id="register-form-norek" name="no_rek" required class="form-control" />	
										</div>
									</div>

									<div class="col_full">
										<label for="register-form-name">Atas Nama:</label>
										<input type="text" id="register-form-anrek" name="an_rek" required class="form-control" />
										<small class="form-text text-muted">*) Sesuaikan Nama Anda dengan yang tertera pada Buku Rekening Anda</small>
									</div>

									<div class="col_full">
										<label for="register-form-phone">No HP:</label>
										<input type="number" id="register-form-phone" name="no_hp" required class="form-control" />
									</div>

									<div class="col_full">
										<label for="register-form-phone">Alamat:</label>
										<input type="text" id="register-form-address" name="alamat" required class="form-control" />
									</div>

									<div class="col_full">
										<label for="register-form-password">Foto Tegak (Berlatar Merah / Biru):</label>
										<input type="file" name="foto" required class="input-11 file-loading" accept="image/*" data-show-preview="true">
									</div>


									<div class="col_full">
										<label for="register-form-username">Username:</label>
										<input type="text" id="register-form-username" name="username" required class="form-control" />
										<small class="form-text text-muted">*) Username akan digunakan ketika Anda Masuk dalam sistem</small>
									</div>

									<div class="col_full">
										<label for="register-form-password">password:</label>
										<input type="password" id="password" name="password" required class="form-control" />
										<small class="form-text text-muted">*) Password akan digunakan ketika Anda Masuk dalam sistem</small>
									</div>

									<!-- <div class="col_full">
										<label for="register-form-repassword">Ulangi Kembali Password:</label>
										<input type="password" id="repassword" name="repassword" value="" class="form-control" />
									</div> -->

									<div class="col_full nobottommargin">
										<button class="button button-3d button-black nomargin" id="register-form-submit" type="submit" name="register-form-submit" value="register">Daftar Sekarang</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>


			</div>

		</div>

	</div>

</section><!-- #content end -->