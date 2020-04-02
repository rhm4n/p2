<!-- Page Title
	============================================= -->
	<section id="page-title">

		<div class="container clearfix">
			<h1>Project</h1>
			<span>Project Perumahan Kami</span>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Project</a></li>
				<li class="breadcrumb-item active" aria-current="page">Varian</li>
			</ol>
		</div>

	</section><!-- #page-title end -->

		<!-- Content
			============================================= -->
			<section id="content">

				<?php if($this->session->flashdata('notifpemberkasan')){ ?>

				<div class="modal-on-load" data-target="#myModal1"></div>

				<div class="modal1 mfp-hide" id="myModal1">
					<div class="block divcenter" style="background-color: #FFF; max-width: 500px;">
						<div class="center" style="padding: 50px;">
							<h3>Notifikasi</h3>
							<p class="nobottommargin"><?php echo $this->session->flashdata('notifpemberkasan') ?></p>
						</div>
						<div class="section center nomargin" style="padding: 30px;">
							<a href="#" class="button" onClick="$.magnificPopup.close();return false;">Booking dulu</a>
						</div>
					</div>
				</div>
				<?php } ?>

				<div class="content-wrap">

					<div class="container clear-bottommargin clearfix">

					<!-- Posts
						============================================= -->
						<div class="row">

							<?php foreach($data as $datas){?>
							<div class="col_one_third bottommargin">
								<div class="feature-box media-box">
									<div class="fbox-media">
										<a href="<?php echo base_url().'projek/view/'.$datas->slug?>"><img class="image_fade" src="<?php echo $datas->foto?>" alt="Standard Post with Gallery"></a>
									</div>
									<div class="fbox-desc">
										<h3><a href="<?php echo base_url().'projek/view/'.$datas->slug?>"><?php echo $datas->lokasi?></a><span class="subtitle"><?php echo $datas->deskripsi?></span></h3>
									</div>
								</div>
							</div>
							<?php } ?>

						</div><!-- #posts end -->
						


					</div>

				</div>

			</section><!-- #content end -->
