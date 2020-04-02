<section id="page-title">

	<div class="container clearfix">
		<h1><?php echo $title_breadcrumb; ?></h1>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="#">Referral Marketing</a></li>
			<li class="breadcrumb-item active" aria-current="page"><?php echo $title_breadcrumb; ?></li>
		</ol>
	</div>

</section><!-- #page-title end -->

		<!-- Content
			============================================= -->
			<section id="content">

				<div class="content-wrap">

					<div class="container clearfix">

					<!-- Post Content
						============================================= -->
						<div class="postcontent">

							<h4>Buat Kode Referral mu untuk memulai Karir mu</h4>

							<form style="max-width: 25rem;" method="post" action="<?php echo base_url()?>admin/akun/save_kode">
								<div class="form-group">
									<label for="exampleInputEmail1">Nama</label>
									<input type="text" disabled class="form-control form-control-sm" name="nama" id="nama" value="<?php echo $_SESSION['nama']  ?>">
								</div>
								<div class="form-group">
									<label for="exampleInputPassword1">Kode Referral</label>
									<input type="text" disabled class="form-control form-control-sm"  name="referral" id="referral" value="<?php echo $data[0]->referral == null ? "" : $data[0]->referral  ?>">
									<small class="form-text text-muted">Klik tombol dibawah ini jika kode referral Anda belum ada.</small>
								</div>

								<button type="submit" <?php echo $data[0]->referral == null ? '' : 'disabled'  ?> class="button button-rounded button-reveal button-large button-red tright""><i class="icon-angle-right"></i><span>Proses</span></button>
							</form>
							<div class="line"></div>

						</div><!-- .postcontent end -->

					</div>

				</div>

		</section><!-- #content end -->