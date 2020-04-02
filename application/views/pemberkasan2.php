<section id="page-title">

	<div class="container clearfix">
		<h1><?php echo $title_breadcrumb; ?></h1>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="#">Berkas</a></li>
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

					<div class="postcontent">
						<input type="text" name="id" value="<?php echo $data_pelanggan == null ? '' : $data_pelanggan[0]->id ?>">
						<table class="table table-hover table-bordered">
							<thead>
								<tr>
									<th>Berkas</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>

								<tr>
									<td>Scan KTP <span id="keterangan"></span></td>
									<td><button>Lihat</button>
									<span><button id="btn-ktp">Upload</button></span></td>
									<span><input type="file" id="file-ktp" hidden="hidden"></td>
								</tr>
								<tr>
									<td>Scan / FOTO KK</td>
									<td><button>Lihat</button>
									<span><button id="btn-kk">Upload</button></span></td>
									<span><input type="file" id="file-kk" hidden="hidden"></td>
								</tr>
								<tr>
									<td>Scan / FOTO NPWP</td>
									<td><button>Lihat</button>
									<span><button id="btn-npwp">Upload</button></span></td>
									<span><input type="file" id="file-npwp" hidden="hidden"></td>
								</tr>

							</tbody>
						</table>

						<script>
							const fileKtp = document.getElementById("file-ktp");
							const btnKtp 	= document.getElementById("btn-ktp");

							btnKtp.addEventListener("click", function(){
								fileKtp.click();
							});

							fileKtp.addEventListener("change", function(){								

								var property = fileKtp.files[0];
								var nama_file = property.name;
								var ext_file  = nama_file.split('.').pop().toLowerCase();
								if(jQuery.inArray(ext_file, ['gif','png','jpg','jpeg']) == -1){

									console.log('file tidak sesuai');

								}

								var size_file = property.size;
								if(size_file > 2000000){
									console.log('file melebihi kapasitas penyimpanan');
								}else{
									var form_data = new FormData();
									form_data.append("file", property);
									$.ajax({
										url : "<?php echo base_url().'berkas/saveKtp'?>",
										method:"POST",
										data : form_data,
										contentType : false,
										cache : false,
										processData:false,
										beforeSend: function(){
											$('#keterangan').html("<label class='text-success'>Proses Mengupload......</label>");
										},
										success:function(data){
											$('#keterangan').html(data);
										}
									})
								}

							});
							// $(document).ready(function(){

							// 	$(document).on('change', '#file-ktp', function(){
							// 		var property = document.getElementById("file-ktp").files[0];

							// 		console.log(property);
							// 	});
							// });
						</script>


						</div><!-- .postcontent end -->					

					</div><!-- .postcontent end -->

				</div>

			</div>

		</section><!-- #content end -->
