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
						<div class="table-responsive">

							<h4>Layanan Perusahaan</h4>	

							<div align="center">
								<a href="<?php echo base_url()?>admin/profil/input_layanan" class="button button-rounded button-reveal button-small button-border"><i class="icon-line-marquee-plus"></i><span>Tambah Layanan</span></a>
							</div>

							<table id="" class="datatable1 table table-striped table-bordered" cellspacing="0" width="100%">
								<thead>
									<th>No</th>
									<th>Jenis Layanan</th>
									<th>Keterangan</th>
									<th>Gambar</th>
									<th>Aksi</th>
								</thead>
								<tbody>
									<?php foreach ($data as $no => $row) { ?>
									<tr>
										<td><?php echo $no+1; ?></td>
										<td><?php echo $row->jenis_layanan?></td>
										<td><?php echo $row->keterangan?></td>
										<td><img height="40px" src="<?php echo $row->foto == null ? base_url().'assets/images/icons/preloader.gif' : $row->foto ; ?> "></td>
										<td>
											<a href="<?php echo base_url().'admin/profil/input_layanan/'.$row->id ?>" class="button button-3d button-mini button-rounded button-reveal button-aqua"><i class="icon-pencil2"></i><span>Edit</span></a>

											<a href="#" data-toggle="modal" data-target="#del_<?php echo $row->id ?>" class="button button-mini button-3d button-rounded button-reveal button-red"><i class="icon-trash2"></i><span>Hapus</span></a>
										</td>
									</tr>

									<div class="modal fade" id="del_<?php echo $row->id ?>" aria-hidden="true" aria-labelledby="exampleModalTitle" role="dialog" tabindex="-1">
										<form method="POST" action="<?php echo base_url('admin/profil/del_layanan/').$row->id ?>">
											<div class="modal-dialog modal-simple">
												<div class="modal-content">
													<div class="modal-header">
														<h4 class="modal-title">Konfirmasi</h4>
														<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
													</div>
													<div class="modal-body">
														Yakin akan menghapus data penduduk ?
														<input type="hidden" class="form-control form-control-sm" placeholder="" name="foto" id="foto" value="<?php echo $row->foto  ?>">
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-default btn-pure" data-dismiss="modal">Batal</button>
														<button type="submit" class="btn btn-danger">Hapus</button>
													</div>
												</div>
											</div>
										</form>
									</div>
									<?php } ?>
								</tbody>
							</table>

							<div class="line"></div>

						</div><!-- .postcontent end -->

					</div>

				</div>

		</section><!-- #content end -->