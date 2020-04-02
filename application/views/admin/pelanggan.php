<section id="page-title">

	<div class="container clearfix">
		<h1><?php echo $title_breadcrumb; ?></h1>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="#">Pelanggan</a></li>
			<li class="breadcrumb-item active" aria-current="page"><?php echo $title_breadcrumb; ?></li>
		</ol>
	</div>

</section><!-- #page-title end -->

		<!-- Content
			============================================= -->
			<section id="content">

				<div class="content-wrap">

					<div class="container clearfix">

					<div class='alert alert-success' style="display: none;">
						<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
						<i class='icon-thumbs-up'></i><strong>Fee Markerting !</strong> telah di Transfer .
					</div> 


					<?php if($this->session->flashdata('notif')){ ?>

					<div class="modal-on-load" data-target="#myModal1"></div>

					<div class="modal1 mfp-hide" id="myModal1">
						<div class="block divcenter" style="background-color: #FFF; max-width: 500px;">
							<div class="center" style="padding: 50px 50px 20px 50px;">
								<h3>Notifikasi</h3>
								<p><?php echo $this->session->flashdata('notif') ?></p>
								<span>
									<strong>
										<p style="font-size: 18px"><?php echo "Silahkan ke Alamat Kantor Kami di ".$data_kantor[0]->alamat ?>  Atau<br>
										<?php echo "Hubungi Costumer Service Kami di ".$data_kantor[0]->kontak ?></p>
									</strong>
								</span>
								<span><p><strong style="font-size: 18px">Untuk Melakukan Tanda Jadi Rumah Anda</strong><br>
									<?php $date =  date_create(date("d-M-Y"));
									date_add($date , date_interval_create_from_date_string('7 days'));
									$batas_waktu =  date_format($date, 'd-M-Y'); 
									echo "Waktu Anda 7 Hari Sebelum Jatuh Tempo (".$batas_waktu.")"; ?>
								</p></span>
							</div>
							<div style="padding: 0px 18px 0px 18px;">
								<span>
									<p>Catatan</p>
									<p>Kami tidak Bertanggung Jawab atas Pembayaran Kepada Pihak Marketing atau yang Mengatas Namakan Kantor Kami dan di Anggap tidak sah, <strong>Selain Kontak yang tertera diatas</strong></p>
									<p>Terima Kasih atas perhatiannya</p>
								</span>
							</div>
							<div class="section center nomargin" style="padding: 30px;">
								<a href="#" class="button" onClick="$.magnificPopup.close();return false;">Iya, Mengerti</a>
							</div>
						</div>
					</div>
					
					<?php } ?>
					
					

					<!-- Post Content
						============================================= -->
						<div class="table-responsive">

							<h4>Daftar Booking Pelanggan</h4>

							<table class="datatable1 table table-striped table-bordered" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th>#</th>
										<th>Nama</th>
										<th>Kontak Person</th>
										<th>Lokasi</th>
										<th>No Rumah</th>
										<th>Nama Freelance</th>
										<th>Status</th>
										<th>Tempo</th>

										<?php if($_SESSION['level'] == '1'){ ?>
										<th>Aksi</th>
										<?php } ?>
									</tr>
								</thead>
								<tbody>
									<?php $no = 1; ?>
									<?php foreach($data as $row){ ?>
									<?php $id = $row->id; ?>
									<tr>
										<td><?php echo $no++ ?></td>
										<td><?php echo $row->pelanggan ?></td>
										<td><?php echo $row->no_kontak."<br>".$row->email ?></td>
										<td><?php echo $row->lokasi ?></td>
										<td><?php echo $row->no_rumah ?></td>
										<td><?php echo $row->nama_marketing ?></td>
										
										<td><?php if($row->status_berkas == '1'){
											echo "<h4><span class='badge badge-primary'>Booking Biasa</span></h4>";
										}elseif ($row->status_berkas == '2') {
											echo "Booking+<br><h4><span class='badge badge-primary'>Tanda Jadi</span></h4>";
										}elseif ($row->status_berkas == '3') {
											echo "Booking +<br>Tanda Jadi +<br><h4><span class='badge badge-primary'>Pemberkasan</span></h4>";
										}elseif ($row->status_berkas == '4') {
											echo "<h4><span class='badge badge-primary'>Verifikasi Bank</span></h4>";
										}elseif ($row->status_berkas == '5') {
											echo "Akad";
										}else{
											echo "Gagal Booking";
										}  ?></td>

										<td><?php echo date_format(date_create($row->batas_waktu),"d/M/Y"); ?></td>

										<?php if($_SESSION['level'] == '1'){ ?>
										<td align="center">
											<div class="btn-group" role="group">
												<button  class="btn btn-info btn-sm" id="exampleGroupDrop1" data-toggle="dropdown" aria-expanded="false">
													<i class="icon-double-angle-down"></i>
												</button>
												<div class="dropdown-menu" aria-labelledby="exampleGroupDrop1" role="menu" style="margin-right: 50px;">
													<a style="text-decoration: none;" data-toggle="modal" data-target="#booking_<?php echo $row->id_pelanggan ?>"><button class="dropdown-item" role="menuitem">Ubah Status Booking</button></a>
													<a style="text-decoration: none;" data-toggle="modal" data-target="#del_<?php echo $row->id_pelanggan ?>"><button class="dropdown-item" role="menuitem">Hapus Data Pelanggan</button></a>
												</div>
											</div>
										</td>
										<?php } ?>
									</tr>

									<div class="modal fade" id="del_<?php echo $row->id_pelanggan ?>" aria-hidden="true" aria-labelledby="exampleModalTitle" role="dialog" tabindex="-1">
										<form method="POST" action="<?php echo base_url('admin/pelanggan/delete/').$row->id_pelanggan ?>">
											<div class="modal-dialog modal-simple">
												<div class="modal-content">
													<div class="modal-header">
														<h4 class="modal-title">Konfirmasi</h4>
														<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
													</div>
													<div class="modal-body" align="center">
														Yakin, untuk menghapus Data <span><strong><h4>Sdr. <?php echo $row->pelanggan?></h4></strong></span>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-default btn-pure" data-dismiss="modal">Batal</button>
														<button type="submit" class="btn btn-danger">Ya, Hapus</button>
													</div>
												</div>
											</div>
										</form>
									</div>

									<div class="modal fade" id="booking_<?php echo $row->id_pelanggan ?>" aria-hidden="true" aria-labelledby="exampleModalTitle" role="dialog" tabindex="-1">
										<form method="POST" action="<?php echo base_url('admin/pelanggan/status_pelanggan/').$row->id_pelanggan ?>">
											<div class="modal-dialog modal-simple">
												<div class="modal-content">
													<div class="modal-header">
														<h4 class="modal-title">Form Booking</h4>
														<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
													</div>
													<div class="modal-body">
														<div class="bottommargin-sm">
															<label for="exampleFormControlSelect1">Status Pelanggan</label>
															<input type="hidden" name="id_rumah" value="<?php echo $row->id_rumah?>">
															<select name="status_berkasan" class="select-tags form-control" multiple="" tabindex="-1" aria-hidden="true" style="width:100%;">
																<?php 
																$x =  $row->status_berkas; 
																$pilihan[] = ['','Booking','Tanda Jadi','Pemberkasan','Verifikasi Bank','Akad','Gagal Booking'];
																for ($i=1; $i <= 6; $i++) { 
																if($i <= $x){
																	echo "<option selected value=".$i.">".$pilihan[0][$i]."</option>";		
																
																}else{
																	echo "<option value=".$i.">".$pilihan[0][$i]."</option>";
																}
															} ?>
														</select>
													</div>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-default btn-pure" data-dismiss="modal">Batal</button>
													<button type="submit" class="btn btn-danger">Simpan</button>
												</div>
											</div>
										</div>
									</form>
								</div>
								<?php 
									if($row->status_berkas == 4 && $row->klaim == 0){
										echo "<input type='text' class='id_rumah' value=".$row->id_rumah." name=''>";
									}
								?>	

								<?php } ?>
							</tbody>

						</table>

						<blockquote><p style="font-weight: bold; font-size: 17px">Total Fee Anda Rp. <?php echo $fee[0]->jumlah_fee == null ? '0' : number_format($fee[0]->jumlah_fee) ?></p></blockquote>

						<div class="line"></div>

					</div><!-- .postcontent end -->

				</div>

			</div>

		</section><!-- #content end -->


		<script type="text/javascript">
			document.getElementById('tff').addEventListener("click", function(){
				var id = document.getElementsByClassName('id_rumah');

				var id_array = new Array();
				for(var i=0; i < id.length; i++){

					id_array.push(id[i].value);
				
				}
				console.log(id_array);

				$.ajax({
					url : '<?php echo base_url()?>admin/pelanggan/transfer_fee' ,
					type: 'post',
					data : { id : id_array },
					success: function(data)
		           {	

		           	
		           	window.location.href ="<?php echo base_url()?>admin/pelanggan";

		           		// $(".alert").attr("style","display:true");

		           		// window.setTimeout(function(){
		           		// 	$(".alert").fadeTo(500,0).slideUp(500, function(){
		           				
		           		// 	});
		           		// },1500);
		           }
					
				}); //ajax form

			});
		</script>