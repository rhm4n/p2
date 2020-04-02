<section id="page-title">

	<div class="container clearfix">
		<h1>Tentang Perusahaan</h1>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="#"><?php echo $title?></a></li>
			<li class="breadcrumb-item active" aria-current="page"><?php echo $head?></li>
		</ol>
	</div>

</section><!-- #page-title end -->
<section id="content">

	<div class="content-wrap">

		<div class="container clearfix">
		
			<div class="col_full nobottommargin">

				<div class="heading-block fancy-title nobottomborder title-bottom-border">
					<h4><?php echo $data[0]->nama_pt ?></h4>
				</div>

				<p><?php echo $data[0]->deskripsi ?></p>

			</div>


			<div class="clear"></div>

		</div>



	</div>

</section><!-- #content end -->