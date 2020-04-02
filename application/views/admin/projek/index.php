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

<!-- Post Content
	============================================= -->
	
	<div class="content-wrap">
		
		<div class="container clearfix">
			<div class="table-responsive">
				
				<div align="center">	
					<a href="<?php echo base_url()?>admin/projek/input" class="button button-rounded button-reveal button-small button-border tright"><i class="icon-line-marquee-plus"></i><span>Tambah Projek</span></a>
				</div>

				<table class="datatable1 table table-striped table-bordered" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>#</th>
							<th>Lokasi</th>
							<th>Kelengkapan</th>
							<th width="100px">Site Plan</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						
						<?php foreach($data as $no => $row){ ?>
						<?php $id = $row->projek_id; ?>
						<tr>
							<td><?php echo $no+1?></td>
							<td><?php echo $row->lokasi ?></td>
							<td>
								<ul class="iconlist iconlist-color nobottommargin">
									<li>Video Animasi<?php echo $row->video == null ? '' : '<i class="icon-ok"></i>' ?></li>
									<li>Site Plan<?php echo $row->foto == null ? '' : '<i class="icon-ok"></i>' ?></li>
									<li>Unit Rumah<?php echo $row->jumlah_rumah == 0 ? '' : '<i class="icon-ok"></i>' ?></li>
									<li>Spesifikasi Teknis
										<?php $a = 0; foreach($data_spektek as $spek){ ?>
											<?php if($spek->id_projek == $id){ ?>
												<?php if($a == 0){ ?>
													 <i class="icon-ok"></i>
												<?php } ?>
											<?php $a++; } ?>
										<?php } ?>
									</li>
								</ul>
							</td>
							<td><a target="_blank" href="<?php echo base_url().$row->foto?>" data-lightbox="gallery-item"><img class="image_fade" src="<?php echo base_url().$row->foto?>" height="100px" alt="Gallery Thumb 1"></a></td>

							<td><button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Menu</button>
								<div class="dropdown-menu">
									<a class="dropdown-item" href="#" data-toggle="modal" data-target="#del_<?php echo $id ?>"><i class="icon-trash2"></i> Hapus</a>
									<a class="dropdown-item" href="<?php echo base_url('admin/projek/input/'.$id) ?>"><i class="icon-pen-alt"></i> Edit</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="#" data-toggle="modal" data-target="#video_<?php echo $id ?>"><i class="icon-video"></i> Video</a>
									<a class="dropdown-item" href="#" data-toggle="modal" data-target="#rumah_<?php echo $id ?>"><i class="icon-warehouse"></i> Unit Rumah</a>
									<a class="dropdown-item" href="<?php echo base_url('admin/projek/spektek/'.$id) ?>"><i class="icon-list-ul"></i> Spesifikasi Teknis</a>
								</div>
							</td>

						</tr>


						<div class="modal1 mfp-hide" id="myModal1">
							<div class="block divcenter" style="background-color: #FFF; max-width: 500px;">
								<div class="center" style="padding: 50px;">
									<h3>Notifikasi</h3>
									
								</div>
								<div class="section center nomargin" style="padding: 30px;">
									<a href="<?php echo base_url().'berkas'?>" class="button">Ya, Hapus</a>
								</div>
							</div>
						</div>

						<!-- MODAL HAPUS PROYEK -->
						<div class="modal fade" id="del_<?php echo $id ?>" aria-hidden="true" aria-labelledby="exampleModalTitle" role="dialog" tabindex="-1">
							<form method="POST" action="<?php echo base_url('admin/projek/delete/').$id.'?link1='.$row->foto.'&&link2='.$row->video ?>">
								<div class="modal-dialog modal-simple">
									<div class="modal-content">
										<div class="modal-header">
											<h4 class="modal-title">Konfirmasi</h4>
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										</div>
										<div class="modal-body">
											Yakin akan menghapus Data Proyek di Lokasi 
											<p><?php echo $row->lokasi; ?> ?</p>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-default btn-pure" data-dismiss="modal">Batal</button>
											<button type="submit" class="btn btn-danger">Hapus</button>
										</div>
									</div>
								</div>
							</form>
						</div>

						<!-- FORM UPLOAD VIDEO -->
						<div class="modal fade" id="video_<?php echo $id ?>" aria-hidden="true" role="dialog" tabindex="-1">
						
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h4 class="modal-title">Video Animasi</h4>
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										</div>
										<div class="modal-body">
												<?php if($row->video != null){ echo '<p>Video Animasi Sudah ada, <br>Ingin merubahnya?</p>'; }?>
												<form method="post" class="upload_animasi" action="<?php echo base_url().'admin/projek/saveVideo'?>" enctype="multipart/form-data">

											<div class="form-group">
														<label for="upload_video">Pilih Video</label>
														<input type="hidden" name="id_projek" value="<?php echo $id ?>">
														<input type="text" name="video_lama" value="<?php echo $row->video?>">

														<input type="file" class="button button-desc button-mini button-border button-brown button-mini button-rounded center form-control" id="upload_video<?php echo $id ?>" accept="video/*" style="padding: 5px;" name="foto">
														<p style="font-size: 12px;" align="left"><i>20mb / mp4 / mkv</i></p>
													
											</div>
													<button type="submit" class="button button-rounded button-reveal button-large button-red tright""><i class="icon-save"></i><span>Proses</span></button>
												</form>
												
										</div>
									</div>
								</div>
							
						</div>

						<!-- FORM INPUT JUMLAH RUMAH -->
						<div class="modal fade" id="rumah_<?php echo $id ?>" aria-hidden="true" role="dialog" tabindex="-1">
							<form method="POST" action="<?php echo base_url('admin/projek/jumlah_rumah/').$id ?>"
								enctype="multipart/form-data">
								<div class="modal-dialog modal-simple">
									<div class="modal-content">
										<div class="modal-header">
											<h4 class="modal-title">Perumahan <span><?php echo $row->lokasi ?></span></h4>
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										</div>
										<div class="modal-body">
											<div class="form-group">
												<?php if($row->jumlah_rumah != 0){ echo '<p>Unit Rumah sudah ada, <br>Ingin merubahnya?</p>'; }?>
												<label>Jumlah Unit</label>
												<input type="text" name="jumlah" value="<?php echo $row->jumlah_rumah?>" >
											</div>
										</div>
										<div class="modal-footer">
											<p>)* Data jumlah unit sebelumnya akan terhapus jika sudah ada</p>
											<button type="submit" class="btn btn-danger">Simpan</button>
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

