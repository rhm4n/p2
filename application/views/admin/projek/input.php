<section id="page-title">

	<div class="container clearfix">
		<h1><?php echo $title_breadcrumb; ?></h1>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="#">Akun Marketing</a></li>
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
						<div class="postcontent nobottommargin clearfix">
							<?php if($this->session->flashdata()){ ?>

							<div class="alert alert-warning">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<i class="icon-warning-sign"></i><strong>Warning!</strong> <?php echo $this->session->flashdata('error'); ?>
							</div>						

							<?php } ?>

							<h4>Informasi Proyek</h4>

							<div class="postcontent">

								<form style="max-width: 25rem;" method="post" action="<?php echo base_url()?>admin/projek/save" enctype="multipart/form-data">

									<input type="hidden" name="id" id="id" value="<?php echo $data == null ? "" : $data[0]->id  ?>">

									<div class="form-group">
										<label for="exampleInputEmail1">Lokasi Proyek</label>
										<input type="text" class="form-control form-control-sm" placeholder="Nama" name="lokasi" id="lokasi" value="<?php echo $data == null ? '' : $data[0]->lokasi ?>" required>
									</div>

									<div class="form-group">
										<label for="exampleInputEmail1">Deskripsi Proyek</label>
										<input type="text" class="form-control form-control-sm" placeholder="Penjelasan Singkat" name="deskripsi" id="deskripsi" value="<?php echo $data == null ? '' : $data[0]->deskripsi ?>" required>
									</div>

									<div class="form-group">
										<label for="exampleInputFee">Fee Marketing</label>
										<input type="text" class="form-control form-control-sm" placeholder="Rupiah" name="fee" id="rupiah" value="<?php echo $data == null ? '' : number_format($data[0]->fee) ?>" required>
									</div>

									<div class="form-group">
										<label>Site Plan  *.jpg, .png:</label><br>
										<input type="hidden" name="foto_lama" value="<?php echo $data == null ? '' : $data[0]->foto ?>">
										<input type="file" name="foto" <?php echo $data == null ? 'required' : '' ?>  class="input-11 file-loading" accept="image/*" data-show-preview="true" value="">
									</div>

									<button type="submit" class="button button-rounded button-reveal button-large button-red tright""><i class="icon-save"></i><span>Proses</span></button>
								</form>
								

							</div><!-- .postcontent end -->

							<div class="line"></div>
							

						</div><!-- .postcontent end -->

					</div>

				</div>

		</section><!-- #content end -->