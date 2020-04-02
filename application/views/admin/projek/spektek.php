<section id="page-title">

	<div class="container clearfix">
		<h1><?php echo $title_breadcrumb; ?></h1>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="#">Projek</a></li>
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
						<div class="container">

							<h3>Lokasi Projek <?php echo $lokasi[0]->lokasi?></h3>

							<div id="portfolio" class="container">
								
								<form method="POST" action="<?php echo base_url()?>admin/projek/save_spektek">

									<input type="hidden" name="id_projek" id="id_projek" value="<?php echo $lokasi == null ? "" : $lokasi[0]->id  ?>">

									<div class="form-group col_one_third">
										<label>Pekerjaan</label>
										<input type="text" value="<?php echo $data_edit == null ? '' : $data_edit[0]->pekerjaan?>" class="form-control form-control-sm" placeholder="" name="pekerjaan" id="pekerjaan" value="" required>
									</div>

									<div class="form-group col_one_third">
										<label>Bahan</label>
										<input type="text" value="<?php echo $data_edit == null ? '' : $data_edit[0]->bahan?>" class="form-control form-control-sm" placeholder="" name="bahan" id="bahan" value="" required>
									</div>

									<div class="col_one_third col_last">
										<br>
										<button type="submit" class="button button-rounded button-reveal button-small button-red tright"><i class="icon-save"></i><span>Simpan</span></button>
										<button class="button button-rounded button-reveal button-small button-red tright" onclick="history.back()"><i class="icon-line-reload"></i><span>Reload</span></button>
									</div>
								</form>
							</div>

							<div class="clear"></div>

							<table id="datatable1" class="table table-striped table-bordered" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th>#</th>
										<th>Pekerjaan</th>
										<th>Bahan</th>
										<th style="width: 100px;">Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 1; ?>
									<?php foreach($data as $row){ ?>
									<?php $id = $row->id; ?>
									<tr>
										<td><?php echo $no++ ?></td>
										<td><?php echo $row->pekerjaan ?></td>
										<td><?php echo $row->bahan ?></td>
										<td align="center">
											<div class="btn-group" role="group">
												<a href="<?php echo base_url().'admin/projek/spektek/'.$row->id_projek.'/'.$row->id ?>" class="button button-rounded button-reveal button-mini button-3d button-dirtygreen tright"><i class="icon-pen"></i><span>Edit</span></a>

												<a href="#" data-toggle="modal" data-target="#del_<?php echo $row->id ?>" class="button button-rounded button-reveal button-mini button-3d button-red tright"><i class="icon-trash2"></i><span>Hapus</span></a>

											</div>
										</td>
									</tr>

									<div class="modal fade" id="del_<?php echo $row->id ?>" aria-hidden="true" aria-labelledby="exampleModalTitle" role="dialog" tabindex="-1">
										<form method="POST" action="<?php echo base_url('admin/projek/delete_spektek/').$row->id ?>">
											<div class="modal-dialog modal-simple">
												<div class="modal-content">
													<div class="modal-header">
														<h4 class="modal-title">Konfirmasi</h4>
														<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
													</div>
													<div class="modal-body">
														Yakin akan menghapus data penduduk ?
														<input type="text" value="<?php echo $row->id_projek?>" hidden name="id_projek">
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

