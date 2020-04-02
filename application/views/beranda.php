	<section id="content">

		<div class="content-wrap">

			<!-- MODAL NOTIF KODE BOOKING -->

			<?php if($this->session->flashdata('notif')){ ?>

			<div class="modal-on-load" data-target="#myModal1"></div>

			<div class="modal1 mfp-hide" id="myModal1">
				<div class="block divcenter" style="background-color: #FFF; max-width: 500px;">
					<div class="center" style="padding: 50px 50px 20px 50px;">
						<h3>Notifikasi</h3>
						<p><?php echo $this->session->flashdata('notif') ?></p>
						<span>
							<strong>
								<p style="font-size: 18px"><?php echo "Silahkan ke Alamat Kantor Kami di ".$data_kantor[0]->alamat ?>  Atau<br>
								<?php echo "Hubungi Costumer Service Kami di ".$data_kantor[0]->kontak ?></p>
							</strong>
						</span>
						<span><p><strong style="font-size: 18px">Untuk Melakukan Tanda Jadi Rumah Anda</strong><br>
							<?php $date =  date_create(date("d-M-Y"));
							date_add($date , date_interval_create_from_date_string('7 days'));
							$batas_waktu =  date_format($date, 'd-M-Y'); 
							echo "Waktu Anda 7 Hari Sebelum Jatuh Tempo (".$batas_waktu.")"; ?>
						</p></span>
					</div>
					<div style="padding: 0px 18px 0px 18px;">
						<span>
							<p>Catatan</p>
							<p>Kami tidak Bertanggung Jawab atas Pembayaran Kepada Pihak Marketing atau yang Mengatas Namakan Kantor Kami dan di Anggap tidak sah, <strong>Selain Kontak yang tertera diatas</strong></p>
							<p>Terima Kasih atas perhatiannya</p>
						</span>
					</div>
					<div class="section center nomargin" style="padding: 30px;">
						<a href="#" class="button" onClick="$.magnificPopup.close();return false;">Iya, Mengerti</a>
					</div>
				</div>
			</div>
			
			<?php } ?>

			<div class="promo promo-light promo-full bottommargin-lg header-stick notopborder">
				<div class="container clearfix">
					<h3>Hubungi Kami di <span>+91.22.57412541</span> atau Email Kami di <span>support@gmail.com</span></h3>
					<span>We strive to provide Our Customers with Top Notch Support to make their Theme Experience Wonderful</span>
				</div>
			</div>

			<div class="container clearfix">
				<div class="row">
				<?php 
					foreach($data_tim as $no=> $val){ 
						$angka[] = $val->id;
					}	

					$besar = max($angka);
					$jumlah = count($angka);

						?>
						
				<?php foreach($data_tim as $tim){ ?>	
				<div class="col-lg-3 col-md-4 col-sm-6 bottommargin">
					<div class="feature-box fbox-center fbox-light fbox-effect nobottomborder">
						<div class="fbox-icon">
							<img width="100px" src="<?php echo $tim->foto;?>" >
						</div>
						<h3><?php echo $tim->nama; ?><span class="subtitle"><?php echo $tim->jabatan; ?></span></h3>
					</div>
				</div>

				<?php } ?>
				</div>

				<div class="clear"></div>

			</div>

			<!-- Related Portfolio Items
			============================================= -->
				
			<div class="section nobottommargin nobottompadding noborder">
				<div class="container clearfix">
					<h3 class="center bottommargin">Perumahan Terbaru</h3>
				</div>
			</div>

			<div id="related-portfolio" class="owl-carousel owl-carousel-full portfolio-carousel portfolio-notitle portfolio-nomargin footer-stick carousel-widget" data-margin="2" data-pagi="false" data-autoplay="5000" data-loop="true" data-items-xs="1" data-items-sm="2" data-items-md="4" data-items-xl="4">

			<?php foreach($data_projek as $val){?>	

				<div class="oc-item">
					<div class="iportfolio">
						<div class="portfolio-image">
							<a href="portfolio-single.html">
								<img src="<?php echo $val->foto?>" alt="Open Imagination">
							</a>
							<div class="portfolio-overlay">
								<a href="images/portfolio/full/1.jpg" class="left-icon" data-lightbox="image"><i class="icon-line-plus"></i></a>
								<a href="portfolio-single.html" class="right-icon"><i class="icon-line-ellipsis"></i></a>
							</div>
						</div>
						<div class="portfolio-desc">
							<h3><a href="<?php echo base_url().'projek/view/'.$val->slug?>"><?php echo $val->lokasi?></a></h3>
							<span><a href="#"><?php echo $val->deskripsi?></a></span>
						</div>
					</div>
				</div>

				<?php } ?>

				<div class="clear bottommargin-lg"></div>

			</div><!-- .portfolio-carousel end -->

			<div class="section topmargin-lg">
				<div class="container clearfix">

					<div class="heading-block center">
						<h2>Profil Perusahaan</h2>
						<span>Diamond Alfa Group</span>
					</div>

					<div class="clear bottommargin-sm"></div>

					<?php foreach($data_layanan as $val){ ?>
					<div class="col_one_third">
						<div class="feature-box fbox-small fbox-plain" data-animate="fadeIn">
							<div class="fbox-icon">
								<img src="<?php echo $val->foto ?>">
							</div>
							<h3><?php echo $val->jenis_layanan ?></h3>
							<p><?php echo $val->keterangan ?></p>
						</div>
					</div>

					<?php } ?>
					

					<div class="clear"></div>

				</div>
			</div>

		</div>

	</section><!-- #content end -->
