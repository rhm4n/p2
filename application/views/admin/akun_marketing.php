
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

						<div class='alert alert-success' style="display: none;">
							<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
							<i class='icon-thumbs-up'></i><strong>Status Akun !</strong> Berhasil diperharui.
						</div> 

					<!-- Post Content
						============================================= -->
						<div class="table-responsive">
							<h4>Daftar Keselurahan Data Akun Marketing</h4>

							<table class="datatable1 table table-striped table-bordered" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th width="20px">#</th>
										<th width="100px">Foto</th>
										<th width="100px">Nama</th>
										<th>Alamat</th>
										<th>Kontak Person</th>
										<th width="60px">Status</th>
										<th width="50px">Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach($data as $no => $row){ ?>
									<tr>
										<td><?php echo $no+1 ?></td>
										<td><img width="100px" height="120px" src="<?php echo base_url().$row->foto ?>"></td>
										<td><?php echo $row->nama ?></td>
										<td><?php echo $row->alamat ?></td>
										<td><?php echo $row->no_hp ?></td>
										<td>
											<input type="hidden" id="id_akun<?php echo $row->id?>" value="<?php echo $row->id?>">

											<input type="checkbox" onchange="ubah_status('<?php echo $row->id?>')" id="status_user<?php echo $row->id?>" value="<?php echo $row->status == '0' ? '1' : '0'; ?>" <?php echo $row->status == '0' ? ' ' : 'checked'; ?> data-toggle="toggle" data-size="small" data-on="<i class='icon-check-circle'></i>" data-off="<i class='icon-warning-sign'></i>" data-onstyle="info" data-offstyle="danger">

										</td>
										<td align="center">
											<a href="#" data-toggle="modal" data-target="#del_<?php echo $row->id ?>" class="button button-mini button-3d button-rounded button-reveal button-red"><i class="icon-trash2"></i><span>Hapus</span></a>
										</td>
									</tr>

									<div class="modal fade" id="del_<?php echo $row->id ?>" aria-hidden="true" aria-labelledby="exampleModalTitle" role="dialog" tabindex="-1">
										<form method="POST" action="<?php echo base_url('admin/akun/del_akun/').$row->id.'?link='.$row->foto ?>">
											<div class="modal-dialog modal-simple">
												<div class="modal-content">
													<div class="modal-header">
														<h4 class="modal-title">Konfirmasi</h4>
														<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
													</div>
													<div class="modal-body">
														Yakin akan menghapus Akun <strong><?php echo $row->nama; ?></strong> ?
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-default btn-pure" data-dismiss="modal">Batal</button>
														<button type="submit" class="btn btn-danger">Hapus</button>
													</div>
												</div>
											</div>
										</form>
									</div>

									<!-- SCRIPT AKUN MARKETING -->
									
									<script type="text/javascript">

										function ubah_status(id){
											var idInput = document.getElementById('id_akun'+id).value;
											var statusInput = document.getElementById('status_user'+id).value;
											// console.log(idInput+" asdas "+statusInput);

											$.ajax({
												url : '<?php echo base_url()?>admin/akun/status_akun' ,
												type: 'post',
												data : { status : statusInput, id : idInput},
												success: function(data)
									           {	
									           		$(".alert").attr("style","display:true");

									               if(statusInput == '1'){
									               		$('#status_user'+id).attr("checked","checked");
									               		$('status_user'+id).attr("value","0");
									               		//console.log('ada masuk');

									               }else{
									               		//console.log('diluar');
									               		$('status_user'+id).attr("checked","unchecked");
									               		$('status_user'+id).attr("value","1");
									               }

									           		window.setTimeout(function(){
									           			$(".alert").fadeTo(500,0).slideUp(500, function(){
									           				
									           			});
									           		},1500);
									           }
												
											}); //ajax form
										}

										// document.getElementById('status_user<?php echo $row->id?>').addEventListener('change', function(){
										// 	console.log('ada');
										// 	var idInput = $('#id_akun<?php echo $row->id?>').val();
										// 	var statusInput = $('#status_user<?php echo $row->id?>').val();
											
										// 	$.ajax({
										// 		url : '<?php echo base_url()?>admin/akun/status_akun' ,
										// 		type: 'post',
										// 		data : { status : statusInput, id : idInput},
										// 		success: function(data)
									 //           {	
									 //           		$(".alert").attr("style","display:true");

									 //               if(statusInput == '1'){
									 //               		$('#status_user<?php echo $row->id?>').attr("checked","checked");
									 //               		$('status_user<?php echo $row->id?>').attr("value","0");
									 //               		console.log('ada masuk');

									 //               }else{
									 //               		console.log('diluar');
									 //               		$('status_user<?php echo $row->id?>').attr("checked","unchecked");
									 //               		$('status_user<?php echo $row->id?>').attr("value","1");
									 //               }

									 //           		window.setTimeout(function(){
									 //           			$(".alert").fadeTo(500,0).slideUp(500, function(){
									           				
									 //           			});
									 //           		},1500);
									 //           }
												
										// 	}); //ajax form
										// });

										
									</script>

									<?php } ?>
								</tbody>
							</table>

							<div class="line"></div>

						</div><!-- .postcontent end -->

					</div>

				</div>

			</section><!-- #content end -->

