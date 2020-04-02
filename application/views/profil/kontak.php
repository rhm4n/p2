<section id="page-title">

	<div class="container clearfix">
		<h1>Hubungi kami</h1>
		<span>Apapun Kendala Anda</span>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="#"><?php echo $title?></a></li>
			<li class="breadcrumb-item active" aria-current="page"><?php echo $head?></li>
		</ol>
	</div>

</section><!-- #page-title end -->
<section id="content">

	<div class="content-wrap">

		<div class="container clearfix">

			<div class="col_one_third nobottommargin">

				<div class="heading-block fancy-title nobottomborder title-bottom-border">
					<h4>Kontak <span>Perusahaan</span>.</h4>
				</div>

				<div class="col-lg-6 clearfix bottommargin-sm">
					<a href="#" class="social-icon si-rounded si-call nobottommargin" style="margin-right: 10px;">
						<i class="icon-call"></i>
						<i class="icon-call"></i>
					</a>
					<h5 style="font-family: arial;"><?php echo $data[0]->kontak?></h5>
				</div>

			</div>

			<div class="col_one_third nobottommargin">

				<div class="heading-block fancy-title nobottomborder title-bottom-border">
					<h4>Alamat <span>Perusahaan</span>.</h4>
				</div>

				<blockquote><strong><?php echo $data[0]->alamat ?></strong></blockquote>

			</div>

			<div class="col_one_third nobottommargin col_last">

				<div class="heading-block fancy-title nobottomborder title-bottom-border">
					<h4>Sosial <span>Media</span>.</h4>
				</div>

				<a href="#" class="social-icon si-rounded si-facebook">
					<i class="icon-facebook"></i>
					<i class="icon-facebook"></i>
				</a>
				<a href="#" class="social-icon si-rounded si-instagram">
					<i class="icon-instagram"></i>
					<i class="icon-instagram"></i>
				</a>
				<a href="#" class="social-icon si-rounded si-email3">
					<i class="icon-email3"></i>
					<i class="icon-email3"></i>
				</a>
				

			</div>

			<div class="clear"></div>

		</div>



	</div>

</section><!-- #content end -->