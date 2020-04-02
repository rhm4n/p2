<section id="slider" class="slider-element full-screen">

	<div class="full-screen dark section nopadding nomargin noborder ohidden">
		<div class="container clearfix">
			<div class="video data-animate="fadeInUp">
				<video poster="<?php echo base_url().$info[0]->foto?>" loop autoplay controls muted style="width: 100%; height: 50%;">
					<source src='<?php echo base_url().$info[0]->video?>' type='video/webm' />
					<source src='<?php echo base_url().$info[0]->video?>' type='video/mp4' />
				</video>
			</div>

		</div>
	</div>

</section>


<!-- Page Sub Menu
============================================= -->
<div id="page-menu" class="sticky-page-menu">

	<div id="page-menu-wrap" style="background-color: blue">

		<div class="container clearfix">

			<div class="menu-title">Explore <span>Property</span></div>

			<nav class="one-page-menu">
				<ul>
					<li><a href="#" data-href="#header"><div>Profil Perumahan</div></a></li>
					<li><a href="#" data-href="#section-spektek"><div>Spesifikasi Teknis</div></a></li>
					<li><a href="#" data-href="#section-siteplan"><div>Site Plan</div></a></li>
					<li><a href="#" data-href="#section-syarat"><div>Persyaratan</div></a></li>
					<li><a href="#" data-href="#section-booking"><div>Booking</div></a></li>
					<!-- <li><a href="blog.html"><div>Simulasi Cicilan</div></a></li> -->
				</ul>
			</nav>

			<div id="page-submenu-trigger"><i class="icon-reorder"></i></div>

		</div>

	</div>

</div><!-- #page-menu end -->

<!-- Content
	============================================= -->
<section id="content">

	<div class="content-wrap">

		<!-- SPESIFIKASI TEKNIS -->
		<section id="section-spektek" class="page-section">

			<div class="container clearfix">

				<div class="heading-block center">
					<h2>Spesifikasi <span>Teknis</span></h2>
					<span>One of the most Versatile Theme on Themeforest</span>
				</div>

				<div class="container clearfix">

					<div class="col_full">

						<div class="table-responsive">

							<table class="table table-hover table-comparison nobottommargin" cellspacing="0" width="100%">

								<tbody>
									<?php $no = 1; ?>
									<?php foreach($infoSpektek as $row){ ?>
									<?php $id = $row->id; ?>
									<tr>
										<td><?php echo $no++ ?></td>
										<td><?php echo $row->pekerjaan ?></td>
										<td><?php echo $row->bahan ?></td>
									</tr>

									<?php } ?>
								</tbody>
							</table>

							<div class="line"></div>

						</div><!-- .postcontent end -->

					</div>
				</div>

			</div>
			
			<div class="section dark parallax nobottommargin" style="padding: 80px 0;background-color : brown;" data-bottom-top="background-position:0px 0px;" data-top-bottom="background-position:0px -300px;">
				
				<div class="container clearfix">

					<div class="col_one_fourth nobottommargin center" data-animate="bounceIn">
						<i class="i-plain i-xlarge divcenter nobottommargin icon-checkbox-checked"></i>
						<div class="counter counter-lined"><span data-from="50" data-to="<?php echo $info_rumah == null ? '0' : $info_rumah[0]->tersedia ?>" data-refresh-interval="5" data-speed="30"></span> Unit</div>
						<h5>Tersedia</h5>
					</div>

					<div class="col_one_fourth nobottommargin center" data-animate="bounceIn" data-delay="200">
						<i class="i-plain i-xlarge divcenter nobottommargin icon-thumbs-up"></i>
						<div class="counter counter-lined"><span data-from="50" data-to="<?php echo $info_terjual == null ? '0' : $info_terjual[0]->tersedia ?>" data-refresh-interval="10" data-speed="50"></span> Unit</div>
						<h5>Terjual</h5>
					</div>

					<div class="col_one_fourth nobottommargin center" data-animate="bounceIn" data-delay="400">
						<i class="i-plain i-xlarge divcenter nobottommargin icon-handshake1"></i>
						<div class="counter counter-lined"><span data-from="0" data-to="<?php echo $info_tanda_jadi == null ? '0' : $info_tanda_jadi[0]->tersedia ?>" data-refresh-interval="5" data-speed="50"></span> Unit</div>
						<h5>Tanda Jadi</h5>
					</div>

					<div class="col_one_fourth nobottommargin center col_last" data-animate="bounceIn" data-delay="600">
						<i class="i-plain i-xlarge divcenter nobottommargin icon-warning-sign"></i>
						<div class="counter counter-lined"><span data-from="50" data-to="<?php echo $info_terbooking == null ? '0' : $info_terbooking[0]->tersedia ?>" data-refresh-interval="5" data-speed="10"></span> Unit</div>
						<h5>Terbooking</h5>
					</div>

				</div>
			</div>
		</section>
		
		<!-- SITE PLAN ok-->
		<section id="section-siteplan" class="page-section topmargin-lg">

			<div class="heading-block center" style="padding-top: 0px;">
				<h2><span>SITE</span> PLAN</h2>
			</div>

			<div class="container clearfix">

				<div class="fancy-title title-dotted-border">
					<h3>Temukan Lokasi Rumah Anda</h3>
				</div>

				<div class="container clearfix center">

					<div class="entry clearfix">
						<div class="entry-image">
							<div class="row">
								<div class="col-md-10">
									<a href="<?php echo base_url().$info[0]->foto?>" data-lightbox="image"></a>
									<img class="image_fade" src="<?php echo base_url().$info[0]->foto?>" id="viewArea" alt="Gambar SitePlan">
								</div>
								<div class="col-md-2" style="vertical-align: center;">
									<table border="1px solid">
										<?php 
										$columns = 6; 

										foreach ($data_rumah as $i => $value) {
											$i = $i+1;

											if($i % $columns == 1) {
												echo "<tr>";
											} ?>
											<td width='15px' height='10px' align=center <?php if ($value->status_rumah == 1){echo "style='background-color : yellow'";}elseif($value->status_rumah == 2){echo "style='background-color : blue'";}elseif($value->status_rumah == 3){echo "style='background-color : green'";}  ?> ><div class='btn-group btn-group-sm d-md-block'>											

												<?php if($value->nama != null && $value->status_rumah != 3){ ?>
												<a class="btn" onclick="return false;" data-html="true" data-toggle="popover" data-original-title="Nama yang membooking" data-content="
												<?php $no=1; 
												foreach($data_pelanggan as $val){

													if($val->id_rumah == $value->id){
														echo $no++.") ".$val->pelanggan.".<br>";	

													} } ?>" >
													<?php echo $value->no_rumah ?></a>

													<?php }else{

														echo "<a class='btn'>".$value->no_rumah."</a";
													} ?>

												</div></td>

											<?php if($i % $columns == 0) {
												echo "</tr>";
											}

										}?>

									</table>

									<table>
										<tr>
											<td colspan="3" align="left">Keterangan</td>
										</tr>
										<tr>
											<td style="background-color: yellow" width="30px"></td>
											<td>&nbsp</td>
											<td align="left">Booking</td>
										</tr>
										<tr>
											<td style="background-color: blue" width="30px"></td>
											<td>&nbsp</td>
											<td align="left">Sudah Tanda Jadi</td>
										</tr>
										<tr>
											<td style="background-color: green" width="30px"></td>
											<td>&nbsp</td>
											<td align="left">Terjual</td>
										</tr>
									</table>

								</div>
							</div>

						</div>

					</div>

				</div>

			</div>

		</section>

		<!-- PERSYARATAN OK -->
		<section id="section-syarat" class="page-section topmargin-lg">

			<div class="heading-block center">
				<h2>PERSYARATAN</h2>
				<span>Lengkapi Persyaratan ini untuk memilii Rumah Kami</span>
			</div>

			<div class="container clearfix">

				<div class="accordion accordion-bg clearfix">

					<div class="acctitle"><i class="acc-closed icon-ok-circle"></i><i class="acc-open icon-remove-circle"></i>Wiraswasta</div>
					<div class="acc_content clearfix">
						<ul class="iconlist iconlist-color nobottommargin">
							<li><i class="icon-ok"></i>SCAN KTP.</li>
							<li><i class="icon-ok"></i>SCAN KK.</li>
							<li><i class="icon-ok"></i>NPWP.</li>
							<li><i class="icon-ok"></i>KETERANGAN BELUM MENIKAH.</li>
							<li><i class="icon-ok"></i>REKENING KORAN 3 BULAN TERAKHIR.</li>
							<li><i class="icon-ok"></i>KETERANGAN USAHA.</li>
							<li><i class="icon-ok"></i>KETERANGAN PENGHASILAN.</li>
							<li><i class="icon-ok"></i>SITU SIUP.</li>
							<li><i class="icon-ok"></i>FOTO BERWARNA 3X4.</li>
						</ul>
					</div>

					<div class="acctitle"><i class="acc-closed icon-ok-circle"></i><i class="acc-open icon-remove-circle"></i>PNS - TNI/POLRI</div>
					<div class="acc_content clearfix">
						<ul class="iconlist iconlist-color nobottommargin">
							<li><i class="icon-plus-sign"></i>SCAN KTP (KTP Suami dan Istri).</li>
							<li><i class="icon-plus-sign"></i>SCAN KK.</li>
							<li><i class="icon-plus-sign"></i>SURAT NIKAH.</li>
							<li><i class="icon-plus-sign"></i>NPWP.</li>
							<li><i class="icon-plus-sign"></i>SK TERAKHIR (SK 100 % terlegalisir).</li>
							<li><i class="icon-plus-sign"></i>SLIP GAJI 3 BULAN TERAKHIR.</li>
							<li><i class="icon-plus-sign"></i>REKENING KORAN 3 BULAN TERAKHIR.</li>
							<li><i class="icon-plus-sign"></i>KETERANGAN BELUM MEMILIKI RUMAH.</li>
							<li><i class="icon-plus-sign"></i>KETERANGAN PENGHASILAN.</li>
							<li><i class="icon-plus-sign"></i>SPT TAHUNAN.</li>
							<li><i class="icon-plus-sign"></i>FOTO BERWARNA 4X6.</li>
						</ul>
					</div>

					<div class="acctitle"><i class="acc-closed icon-ok-circle"></i><i class="acc-open icon-remove-circle"></i>Karyawan Swasta</div>
					<div class="acc_content clearfix">
						<ul class="iconlist iconlist-color nobottommargin">
							<li><i class="icon-plus-sign"></i>SCAN KTP (KTP Suami dan Istri).</li>
							<li><i class="icon-plus-sign"></i>SCAN KK.</li>
							<li><i class="icon-plus-sign"></i>SURAT NIKAH.</li>
							<li><i class="icon-plus-sign"></i>NPWP.</li>
							<li><i class="icon-plus-sign"></i>SURAT KET. KERJA (Surat Dari Perusahaan yang di ttd dan Stempel).</li>
							<li><i class="icon-plus-sign"></i>SLIP GAJI 3 BULAN TERAKHIR.</li>
							<li><i class="icon-plus-sign"></i>REKENING KORAN 3 BULAN TERAKHIR.</li>
							<li><i class="icon-plus-sign"></i>KETERANGAN BELUM MEMILIKI RUMAH.</li>
							<li><i class="icon-plus-sign"></i>SPT TAHUNAN.</li>
							<li><i class="icon-plus-sign"></i>FOTO BERWARNA 3x4.</li>
						</ul>
					</div>

				</div>

				<div class="divider divider-center topmargin-lg"><i class="icon-star3"></i></div>
			</div>


			<div class="clear"></div>


		</section>

		<!-- BOOKING OK-->
		<section id="section-booking" class="page-section topmargin-lg">

			<div class="heading-block title-center">
				<h2>BOOKING</h2>
				<span>Daftarkan Diri Anda Sekarang Juga</span>
			</div>

			<div class="container clearfix">

				<!-- Contact Form
				============================================= -->
				<div class="col_full">

					<div class="fancy-title title-dotted-border">
						<h3>Kirimkan Data Anda</h3>
					</div>

					<div class="container">

						<form action="<?php echo base_url().'booking/save'?>" method="post">

							<div class="form-process"></div>

							<div class="col_one_fifth">
								<label for="template-contactform-name">Nama <small>*</small></label>
								<input type="text" id="template-contactform-name" name="nama" class="sm-form-control" required />
							</div>

							<div class="col_one_fifth">
								<label for="template-contactform-email">Email <small>*</small></label>
								<input type="email" id="template-contactform-email" name="email" required class="required email sm-form-control" />
							</div>

							<div class="col_one_fifth">
								<label for="template-contactform-phone">No HP</label>
								<input type="number" id="template-contactform-phone" name="no_hp" required class="sm-form-control" />
							</div>

							<div class="col_one_fifth">
								<label for="exampleFormControlSelect1">Jenis Pekerjaan</label>
								<select class="select-1 form-control" required name="pekerjaan" style="width:100%;">
									<option value=""></option>
									<optgroup label="Jenis Pekerjaan">
										<option value="Wiraswasta">Wiraswasta</option>
										<option value="pns">PNS - TNI/POLRI</option>
										<option value="swasta">Karyawan Swasta</option>
									</optgroup>
								</select>
							</div>

							<div class="col_one_fifth col_last">
								<label for="exampleFormControlSelect1">No Rumah</label>
								<select class="select-1 sm-form-control" required name="id_rumah" >
									<option value=""></option>
									<optgroup label="Nomer Rumah">
										<?php foreach($infoRumah as $datas){ ?>

										<option value="<?php echo $datas->id?>"><?php echo $datas->no_rumah?></option>
										<?php } ?>
									</optgroup>
								</select>
							</div>

							<input type="hidden" name="referral" value="<?php if(isset($_SESSION['kode'])){echo $_SESSION['kode']; } ?>">


							<div class="clear"></div>

							<div class="col_full">
								<button class="button button-3d nomargin" type="submit" id="template-contactform-submit" name="template-contactform-submit" value="submit">Kirim</button>
							</div>

						</form>

					</div>


				</div><!-- Contact Form End -->

			</div>

		</section>

	</div>

</section><!-- #content end -->
