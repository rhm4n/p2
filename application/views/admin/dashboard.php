<section id="content">

	<div class="content-wrap nopadding">

				<!-- Portfolio Items
					============================================= -->
					<div id="portfolio" class="portfolio grid-container portfolio-3 portfolio-full portfolio-nomargin portfolio-notitle clearfix" >

					</div><!-- #portfolio end -->

					<a href="#" class="button button-full center button-light button-white">
						<div class="container clearfix">
							Sistem Informasi <strong>Developer Marketing</strong>
						</div>
					</a>


					<div class="container clearfix">

						<div class="col_one_fourth nobottommargin center" data-animate="bounceIn">
							<i class="i-plain i-xlarge divcenter nobottommargin icon-code"></i>
							<div class="counter counter-lined"><span data-from="100" data-to="846" data-refresh-interval="50" data-speed="2000"></span>K+</div>
							<h5>Lines of Codes</h5>
						</div>

						<div class="col_one_fourth nobottommargin center" data-animate="bounceIn" data-delay="200">
							<i class="i-plain i-xlarge divcenter nobottommargin icon-magic"></i>
							<div class="counter counter-lined"><span data-from="3000" data-to="15360" data-refresh-interval="100" data-speed="2500"></span>+</div>
							<h5>KBs of HTML Files</h5>
						</div>

						<div class="col_one_fourth nobottommargin center" data-animate="bounceIn" data-delay="400">
							<i class="i-plain i-xlarge divcenter nobottommargin icon-file-text"></i>
							<div class="counter counter-lined"><span data-from="10" data-to="386" data-refresh-interval="25" data-speed="3500"></span>*</div>
							<h5>No. of Templates</h5>
						</div>

						<div class="col_one_fourth nobottommargin center col_last" data-animate="bounceIn" data-delay="600">
							<i class="i-plain i-xlarge divcenter nobottommargin icon-time"></i>
							<div class="counter counter-lined"><span data-from="60" data-to="1200" data-refresh-interval="30" data-speed="2700"></span>+</div>
							<h5>Hours of Coding</h5>
						</div>

					</div>



					<div class="promo promo-dark promo-flat promo-full bottommargin">
						<div class="container clearfix">
							<h3>Share Link Referral Anda <span>Sebanyak - banyaknya</span></h3>
							<span><div id="txt"><?php echo base_url().'projek/copylink/'.$data_pelanggan[0]->referral?></div></span>
							<a onclick="copylink()" class="button button-dark button-xlarge button-rounded"><i class="icon fa fa-fw fa-copy"></i> Copy Link</a>

						</div>
					</div>

					<div class="container clearfix">

						<div class="row clear-bottommargin">

							<div class="col-lg-4 col-md-6 bottommargin">
								<div class="promo promo-dark promo-flat promo-mini promo-uppercase">
									<h3>Total Fee <span>Marketing Anda</span> Mencapai <span>Rp. <?php echo number_format($data_pelanggan[0]->jumlah_fee) ?></span></h3>
									<a href="#" class="button button-large button-dark button-rounded">Claim</a>
								</div>
							</div>

							<div class="col-lg-4 col-md-6 bottommargin">
								<div class="promo promo-border promo-mini promo-center promo-uppercase">
									<h3>Pelanggan terboking <span><?php echo $data_booking[0]->jumlah_pelanggan.' Orang'?></span> AKAD <span><?php echo $data_selesai[0]->jumlah_pelanggan.' Orang'?></span></h3>
									<a href="#" class="button button-large button-rounded">Detail</a>
								</div>
							</div>

							<div class="w-100 d-none d-md-block d-lg-none"></div>

							<?php if($_SESSION['level'] == '1'){ ?>
							<div class="col-lg-4 bottommargin">
								<div class="promo promo-dark promo-flat promo-mini promo-uppercase promo-right">
									<h3>Akun Marketing <span>Terdaftar</span> Sebanyak <span><?php echo $data_akun[0]->jumlah_akun?></span></h3>
									<a href="#" class="button button-large button-dark button-rounded">Detail</a>
								</div>
							</div>

							<?php } ?>

						</div>

					</div>




				</div>

			</section><!-- #content end -->
