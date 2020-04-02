<section id="page-title">

	<div class="container clearfix">
		<h1><?php echo $title; ?></h1>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="#">Profil</a></li>
			<li class="breadcrumb-item active" aria-current="page"><?php echo $head; ?></li>
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

							<h4>Layanan Perusahaan</h4>

							<form method="post" action="<?php echo base_url()?>admin/profil/save_layanan" enctype="multipart/form-data">
								<div class="form-group">
									<input type="hidden" class="form-control form-control-sm" placeholder="Nama" name="id" value="<?php echo $data == null ? "" : $data[0]->id  ?>">
								</div>
								<div class="form-group">
									<label>Jenis Layanan</label>
									<input type="text" class="form-control form-control-sm" placeholder="" name="jenis_layanan" id="jenis_layanan" value="<?php echo $data == null ? "" : $data[0]->jenis_layanan  ?>">
								</div>				

								<div class="form-group">
									<label>Keterangan</label>
									<textarea class="form-control form-control-sm" name="keterangan" rows="10"><?php echo $data == null ? "" : $data[0]->keterangan  ?></textarea>
								</div>

								<div class="form-group">
									<label>Gambar</label>
									<br>
									<?php if($data != null){ ?>
										<?php if($data[0]->foto != ''){ ?>
											<img src="<?php echo base_url().$data[0]->foto; ?>">
											<!-- <a target="_blank" href="<?php echo base_url().$data[0]->foto; ?>">File Sudah Di Upload (<?php echo substr($data[0]->foto, 14); ?>)</a> -->
										<?php } ?>
									<?php } ?>
									<input type="hidden" class="form-control form-control-sm" placeholder="" name="foto_lama" value="<?php echo $data == null ? "" : $data[0]->foto  ?>">
									<input type="file" name="foto" class="input-11 file-loading" accept="image/*" data-show-preview="<?php echo $data == null ? 'true' : 'false' ?>" >
								</div>

								<button type="submit" class="button button-rounded button-reveal button-large button-red tright""><i class="icon-angle-right"></i><span>Simpan</span></button>
							</form>
							<div class="line"></div>

						</div><!-- .postcontent end -->

					</div>

				</div>

		</section><!-- #content end -->