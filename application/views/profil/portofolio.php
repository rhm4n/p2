<section id="page-title">

	<div class="container clearfix">
		<h1>LAYANAN KAMI</h1>
		<span>Berada disekeliling Anda</span>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="#"><?php echo $title?></a></li>
			<li class="breadcrumb-item active" aria-current="page"><?php echo $head?></li>
		</ol>
	</div>

</section><!-- #page-title end -->
<section id="content">

	<div class="content-wrap">

		<div class="container clearfix">

			<?php foreach($data as $no =>$value ){
			$no_akhir = COUNT($data)-1; ?>
			<div class="col_half nobottommargin <?php if($no_akhir == $no){echo 'col_last';}?> ">

				<div class="heading-block fancy-title nobottomborder title-bottom-border">
					<h4><?php echo $value->jenis_layanan ?></h4>
				</div>

				<p><?php echo $value->jenis_layanan ?></p>

			</div>

			<?php } ?>
			<div class="clear"></div>

		</div>



	</div>

</section><!-- #content end -->