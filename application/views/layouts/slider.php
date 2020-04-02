<section id="slider" class="slider-element slider-parallax full-screen force-full-screen with-header swiper_wrapper page-section clearfix">

	<div class="slider-parallax-inner">

		<div class="swiper-container swiper-parent">
			<div class="swiper-wrapper">
				<?php foreach ($data as $value) { ?>
					
				<div class="swiper-slide dark" style="background-image: url('<?php echo base_url().$value->foto?>'); background-position: center top;">
					<div class="container clearfix">
						<div class="slider-caption">
							<h2 data-animate="fadeInUp"><?php echo $value->judul ?></h2>
							<p class="d-none d-sm-block" data-animate="fadeInUp" data-delay="200"><?php echo $value->keterangan ?></p>
						</div>
					</div>
				</div>
			<?php } ?>
			</div>
			<div class="slider-arrow-left"><i class="icon-angle-left"></i></div>
			<div class="slider-arrow-right"><i class="icon-angle-right"></i></div>
			<div class="slide-number"><div class="slide-number-current"></div><span>/</span><div class="slide-number-total"></div></div>
			<a href="#" data-scrollto="#content" class="one-page-arrow dark">
				<i class="icon-angle-down infinite animated fadeInDown"></i>
			</a>
		</div>

	</div>

</section>