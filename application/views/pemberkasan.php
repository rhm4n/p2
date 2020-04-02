<section id="page-title">

	<div class="container clearfix">
		<h1><?php echo $title_breadcrumb; ?></h1>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a target="_blank" href="#">Berkas</a></li>
			<li class="breadcrumb-item active" aria-current="page"><?php echo $title_breadcrumb; ?></li>
		</ol>
	</div>

</section>

<section id="content">

	<div class="content-wrap">

		<div class="container clearfix">

			<div class="row">
				<div class="col-lg-12">

					<?php if($this->session->flashdata('berhasil')){ ?>
						<div class="alert alert-success">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<i class="icon-success-sign"></i><strong>Sukses !</strong> <?php echo $this->session->flashdata('berhasil'); ?>
						</div>
					<?php }elseif($this->session->flashdata('error')){ ?>
						<div class="alert alert-danger">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<i class="icon-warning-sign"></i><strong>Warning !</strong> <?php echo $this->session->flashdata('error'); ?>
						</div>
					<?php } ?>

					<u align="center">
					<?php if($pelanggan[0]->pekerjaan == '1'){ ?>
						<h4>Persyaratan Pemberkasan Wiraswasta</h4>
					<?php }elseif($pelanggan[0]->pekerjaan == '2'){ ?>
						<h4>Persyaratan Pemberkasan PNS / TNI POLRI</h4>
					<?php }elseif($pelanggan[0]->pekerjaan == '3'){ ?>
						<h4>Persyaratan Pemberkasan Karyawan Swasta</h4>
					<?php } ?>
					</u>

					<div class="row" align="center">
						<div class="col-md-3"></div>
						<div class="col-md-6">
							<table class="table table-bordered">
								<tr><td colspan="2" align="center"><b>DETAIL PELANGGAN</b></td></tr>
								<tr>
									<td>Nama</td>
									<td><b><?php echo $pelanggan[0]->nama; ?></b></td>
								</tr>
								<tr>
									<td>Telepon</td>
									<td><b><?php echo $pelanggan[0]->no_hp; ?></b></td>
								</tr>
								<tr>
									<td>Email</td>
									<td><b><?php echo $pelanggan[0]->email; ?></b></td>
								</tr>
							</table>
						</div>
					</div>

					<hr>
					
					<form class="row" action="<?php echo base_url()?>Berkas/save" method="POST" enctype="multipart/form-data">

						<input type="hidden" name="id_berkas" id="id_berkas" value="<?php echo $berkas == null ? "" : $berkas[0]->id ?>">
						<input type="hidden" name="id_pelanggan" id="id_pelanggan" value="<?php echo $pelanggan == null ? "" : $pelanggan[0]->id ?>">
						<input type="hidden" name="kode_booking" id="kode_booking" value="<?php echo $kode; ?>">
						<input type="hidden" name="pekerjaan" id="pekerjaan" value="<?php echo $pelanggan[0]->pekerjaan; ?>">
						
						<div class="col-6 form-group">
							<label>Scan KTP (jpg/png)</label>
							<input type="file" name="ktp" class="input-11 file-loading" accept="image/*" data-show-preview="false">
							<input type="hidden" name="ktp_lama" value="<?php echo $berkas == null ? "" : $berkas[0]->ktp ?>">
							<?php if($berkas != null){ ?>
								<?php if($berkas[0]->ktp != ''){ ?>
									<a target="_blank" href="<?php echo base_url().$berkas[0]->ktp; ?>">File Sudah Di Upload (<?php echo substr($berkas[0]->ktp, 31); ?>)</a>
								<?php } ?>
							<?php } ?>
						</div>
						
						<div class="col-6 form-group">
							<label>Scan/Foto KK (jpg/png)</label><br>
							<input type="file" name="kk" class="input-11 file-loading" accept="image/*" data-show-preview="false">
							<input type="hidden" name="kk_lama" value="<?php echo $berkas == null ? "" : $berkas[0]->kk ?>">
							<?php if($berkas != null){ ?>
								<?php if($berkas[0]->kk != ''){ ?>
									<a target="_blank" href="<?php echo base_url().$berkas[0]->kk; ?>">File Sudah Di Upload (<?php echo substr($berkas[0]->kk, 31); ?>)</a>
								<?php } ?>
							<?php } ?>
						</div>
						
						<div class="col-6 form-group">
							<label>Scan/Foto NPWP (jpg/png)</label><br>
							<input type="file" name="npwp" class="input-11 file-loading" accept="image/*" data-show-preview="false">
							<input type="hidden" name="npwp_lama" value="<?php echo $berkas == null ? "" : $berkas[0]->npwp ?>">
							<?php if($berkas != null){ ?>
								<?php if($berkas[0]->npwp != ''){ ?>
									<a target="_blank" href="<?php echo base_url().$berkas[0]->npwp; ?>">File Sudah Di Upload (<?php echo substr($berkas[0]->npwp, 31); ?>)</a>
								<?php } ?>
							<?php } ?>
						</div>
						
						<div class="col-6 form-group">
							<label>Scan/Foto Surat Nikah (jpg/png)</label><br>
							<input type="file" name="ket_nikah" class="input-11 file-loading" accept="image/*" data-show-preview="false">
							<input type="hidden" name="ket_nikah_lama" value="<?php echo $berkas == null ? "" : $berkas[0]->ket_nikah ?>">
							<?php if($berkas != null){ ?>
								<?php if($berkas[0]->ket_nikah != ''){ ?>
									<a target="_blank" href="<?php echo base_url().$berkas[0]->ket_nikah; ?>">File Sudah Di Upload (<?php echo substr($berkas[0]->ket_nikah, 31); ?>)</a>
								<?php } ?>
							<?php } ?>
						</div>

						<div class="col-6 form-group">
							<label>Rekening Koran 3 Bulan Terakhir (pdf)</label><br>
							<input type="file" name="rek_koran" class="input-11 file-loading" accept="image/*" data-show-preview="false">
							<input type="hidden" name="rek_koran_lama" value="<?php echo $berkas == null ? "" : $berkas[0]->rek_koran ?>">
							<?php if($berkas != null){ ?>
								<?php if($berkas[0]->rek_koran != ''){ ?>
									<a target="_blank" href="<?php echo base_url().$berkas[0]->rek_koran; ?>">File Sudah Di Upload (<?php echo substr($berkas[0]->rek_koran, 31); ?>)</a>
								<?php } ?>
							<?php } ?>
						</div>

						<div class="col-6 form-group">
							<label>Surat Ket. Belum Memiliki Rumah Dari Lurah (pdf/jpg)</label><br>
							<input type="file" name="ket_lurah" class="input-11 file-loading" accept="image/*" data-show-preview="false">
							<input type="hidden" name="ket_lurah_lama" value="<?php echo $berkas == null ? "" : $berkas[0]->ket_lurah ?>">
							<?php if($berkas != null){ ?>
								<?php if($berkas[0]->ket_lurah != ''){ ?>
									<a target="_blank" href="<?php echo base_url().$berkas[0]->ket_lurah; ?>">File Sudah Di Upload (<?php echo substr($berkas[0]->ket_lurah, 31); ?>)</a>
								<?php } ?>
							<?php } ?>
						</div>

						<div class="col-6 form-group">
							<label>Pas Foto 4x6 Berwarna (jpg)</label><br>
							<input type="file" name="pas_foto" class="input-11 file-loading" accept="image/*" data-show-preview="false">
							<input type="hidden" name="pas_foto_lama" value="<?php echo $berkas == null ? "" : $berkas[0]->pas_foto ?>">
							<?php if($berkas != null){ ?>
								<?php if($berkas[0]->pas_foto != ''){ ?>
									<a target="_blank" href="<?php echo base_url().$berkas[0]->pas_foto; ?>">File Sudah Di Upload (<?php echo substr($berkas[0]->pas_foto, 31); ?>)</a>
								<?php } ?>
							<?php } ?>
						</div>

						<?php if($pelanggan[0]->pekerjaan == '2' || $pelanggan[0]->pekerjaan == '3'){ ?>

							<div class="col-6 form-group">
								<label>Slip Gaji 3 Bulan Terakhir (pdf)</label><br>
								<input type="file" name="slip_gaji" class="input-11 file-loading" accept="image/*" data-show-preview="false">
								<input type="hidden" name="slip_gaji_lama" value="<?php echo $berkas == null ? "" : $berkas[0]->slip_gaji ?>">
								<?php if($berkas != null){ ?>
									<?php if($berkas[0]->slip_gaji != ''){ ?>
										<a target="_blank" href="<?php echo base_url().$berkas[0]->slip_gaji; ?>">File Sudah Di Upload (<?php echo substr($berkas[0]->slip_gaji, 31); ?>)</a>
									<?php } ?>
								<?php } ?>
							</div>

							<div class="col-6 form-group">
								<label>SPT Tahunan (pdf)</label><br>
								<input type="file" name="spt" class="input-11 file-loading" accept="image/*" data-show-preview="false">
								<input type="hidden" name="spt_lama" value="<?php echo $berkas == null ? "" : $berkas[0]->spt ?>">
								<?php if($berkas != null){ ?>
									<?php if($berkas[0]->spt != ''){ ?>
										<a target="_blank" href="<?php echo base_url().$berkas[0]->spt; ?>">File Sudah Di Upload (<?php echo substr($berkas[0]->spt, 31); ?>)</a>
									<?php } ?>
								<?php } ?>
							</div>

						<?php } ?>

						<?php if($pelanggan[0]->pekerjaan == '1'){ ?>

							<div class="col-6 form-group">
								<label>Keterangan Usaha (pdf)</label><br>
								<input type="file" name="ket_usaha" class="input-11 file-loading" accept="image/*" data-show-preview="false">
								<input type="hidden" name="ket_usaha_lama" value="<?php echo $berkas == null ? "" : $berkas[0]->ket_usaha ?>">
								<?php if($berkas != null){ ?>
									<?php if($berkas[0]->ket_usaha != ''){ ?>
										<a target="_blank" href="<?php echo base_url().$berkas[0]->ket_usaha; ?>">File Sudah Di Upload (<?php echo substr($berkas[0]->ket_usaha, 31); ?>)</a>
									<?php } ?>
								<?php } ?>
							</div>

							<div class="col-6 form-group">
								<label>Keterangan Penghasilan (pdf)</label><br>
								<input type="file" name="ket_penghasilan" class="input-11 file-loading" accept="image/*" data-show-preview="false">
								<input type="hidden" name="ket_penghasilan_lama" value="<?php echo $berkas == null ? "" : $berkas[0]->ket_penghasilan ?>">
								<?php if($berkas != null){ ?>
									<?php if($berkas[0]->ket_penghasilan != ''){ ?>
										<a target="_blank" href="<?php echo base_url().$berkas[0]->ket_penghasilan; ?>">File Sudah Di Upload (<?php echo substr($berkas[0]->ket_penghasilan, 31); ?>)</a>
									<?php } ?>
								<?php } ?>
							</div>

							<div class="col-6 form-group">
								<label>SITU & SIUP (pdf)</label><br>
								<input type="file" name="situ_siup" class="input-11 file-loading" accept="image/*" data-show-preview="false">
								<input type="hidden" name="situ_sipu_lama" value="<?php echo $berkas == null ? "" : $berkas[0]->situ_siup ?>">
								<?php if($berkas != null){ ?>
									<?php if($berkas[0]->situ_siup != ''){ ?>
										<a target="_blank" href="<?php echo base_url().$berkas[0]->situ_siup; ?>">File Sudah Di Upload (<?php echo substr($berkas[0]->situ_siup, 31); ?>)</a>
									<?php } ?>
								<?php } ?>
							</div>

						<?php }elseif($pelanggan[0]->pekerjaan == '2'){ ?>

							<div class="col-6 form-group">
								<label>FC SK Terakhir 100% Yg di legalisir (pdf/jpg)</label><br>
								<input type="file" name="sk_terakhir" class="input-11 file-loading" accept="image/*" data-show-preview="false">
								<input type="hidden" name="sk_terakhir_lama" value="<?php echo $berkas == null ? "" : $berkas[0]->sk_terakhir ?>">
								<?php if($berkas != null){ ?>
									<?php if($berkas[0]->sk_terakhir != ''){ ?>
										<a target="_blank" href="<?php echo base_url().$berkas[0]->sk_terakhir; ?>">File Sudah Di Upload (<?php echo substr($berkas[0]->sk_terakhir, 31); ?>)</a>
									<?php } ?>
								<?php } ?>
							</div>

						<?php }elseif($pelanggan[0]->pekerjaan == '3'){ ?>

							<div class="col-6 form-group">
								<label>Surat ket kerja dari perusahaan yg di ttd dan stempel perusahaan (pdf)</label><br>
								<input type="file" name="surat_kerja_swasta" class="input-11 file-loading" accept="image/*" data-show-preview="false">
								<input type="hidden" name="surat_kerja_swasta_lama" value="<?php echo $berkas == null ? "" : $berkas[0]->surat_kerja_swasta ?>">
								<?php if($berkas != null){ ?>
									<?php if($berkas[0]->surat_kerja_swasta != ''){ ?>
										<a target="_blank" href="<?php echo base_url().$berkas[0]->surat_kerja_swasta; ?>">File Sudah Di Upload (<?php echo substr($berkas[0]->surat_kerja_swasta, 31); ?>)</a>
									<?php } ?>
								<?php } ?>
							</div>

						<?php } ?>
						
						<div class="col-12" align="center">
							<hr>
							<button type="submit" class="btn btn-danger">Upload Berkas</button>
						</div>

					</form>
				</div>
			</div>

		</div>

	</div>

</section>