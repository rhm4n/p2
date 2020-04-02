<section id="page-title">

	<div class="container clearfix">
		<h1><?php echo $title_breadcrumb; ?></h1>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="#">Fee</a></li>
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
						<div class="table-responsive">

							<h4>Daftar Fee Marketing yang akan di Transfer</h4>

							<table  class="datatable1 table table-striped table-bordered" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th>#</th>
										<th>Nama Freelance</th>
										<th>No Rekening</th>
										<th>Fee</th>
										<th width="10px">Transaksi</th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 1; ?>
									<?php foreach($data as $row){ ?>
									<?php $id = $row->id; ?>
									<tr>
										<td><?php echo $no++ ?></td>
										<td><?php echo $row->nama_marketing ?></td>
										<td><?php echo $row->bank." - ".$row->no_rek." /An. ".$row->an_rek ?></td>
										<td><?php echo number_format($row->fee) ?></td>
										<td><?php echo $row->status_berkas == 5 && $row->klaim == 1 ? '<i class="icon-checkmark"></i>' : '<a style="text-decoration: none;" data-toggle="modal" data-target="#tff_'.$row->id_pelanggan.'" class="button button-mini button-border button-rounded">Transfer Sekarang</a>' ?></td>
									</tr>

									<div class="modal fade" id="tff_<?php echo $row->id_pelanggan ?>" aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1">
										
											<form method="post" action="<?php echo base_url().'admin/pelanggan/transfer_fee'; ?>">
											<div class="modal-dialog modal-simple">
												<div class="modal-content">
													<div class="modal-header">
														<h4 class="modal-title" id="myModalLabel">Info Transfer</h4>
														<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
													</div>
													<div class="modal-body">

														<input type="hidden" name="id_rumah" value="<?php echo $row->id_rumah;?>">
														<p>Silahkan Transfer Ke Rekening Berikut : </p>
														<p><?php echo $row->bank." - ".$row->no_rek;?><br>
														<?php echo "An. ".$row->an_rek;?></p>

													</div>
													<div class="modal-footer">
														<small>Tekan tombol dibawah jika sudah selesai mentransfer.</small>
														<button type="submit" class="btn btn-secondary">Sudah ditransfer</button>
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