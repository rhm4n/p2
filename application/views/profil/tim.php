<section id="page-title">

	<div class="container clearfix">
		<h1>KAMI HADIR</h1>
		<span>Dengan Layanan Penuh bersama Tim Kami</span>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="#"><?php echo $title?></a></li>
			<li class="breadcrumb-item active" aria-current="page"><?php echo $head?></li>
		</ol>
	</div>

</section><!-- #page-title end -->
<section id="content">

	<div class="content-wrap">

		<div class="container clearfix">

			<div class="fancy-title title-border">
						<h3>Tim Kami</h3>
					</div>

					<div class="row">

						<?php foreach ($data as $no => $value) { ?>

						<div class="col-lg-3 col-md-6 bottommargin">

							<div class="team">
								<div class="team-image">
									<img src="<?php echo $value->foto == null ? base_url().'assets/images/icons/avatar.jpg' : $value->foto ; ?>" alt="<?php echo $value->nama; ?>">
								</div>
								<div class="team-desc">
									<div class="team-title"><h4><?php echo $value->nama; ?></h4><span><?php echo $value->jabatan; ?></span></div>
									<a href="#" class="social-icon inline-block si-small si-light si-rounded si-facebook">
										<i class="icon-facebook"></i>
										<i class="icon-facebook"></i>
									</a>
									<a href="#" class="social-icon inline-block si-small si-light si-rounded si-twitter">
										<i class="icon-twitter"></i>
										<i class="icon-twitter"></i>
									</a>
									<a href="#" class="social-icon inline-block si-small si-light si-rounded si-gplus">
										<i class="icon-gplus"></i>
										<i class="icon-gplus"></i>
									</a>
								</div>
							</div>

						</div>

						<?php } ?>

					</div>

			<div class="clear"></div>

		</div>



	</div>

</section><!-- #content end -->