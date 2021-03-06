<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="SemiColonWeb" />
	<link rel="shortcut icon" href="<?php echo base_url() ?>assets/images/upload/logo.png">

	<!-- CSS -->
	<?php $this->load->view('layouts/css') ?>
	<title><?php echo $title ?></title>

</head>

<body class="sticky-footer stretched sticky-responsive-pagemenu side-push-panel">

	<div class="body-overlay"></div>

	<!-- SIDE PANEL -->
	<div id="side-panel">
		<?php $this->load->view('layouts/side_panel') ?>
	</div>

	<div id="wrapper" class="clearfix" style="opacity: 1; animation-duration: 1500ms;">

		<!-- HEADER -->
		<?php $this->load->view('layouts/header') ?>	

		<!-- CONTENT -->
		<?php $this->load->view($content) ?>

		<!-- FOOTER -->
		<?php $this->load->view('layouts/footer') ?>

	</div>

	<div id="gotoTop" class="icon-angle-up"></div>

	<!-- JS -->
	<?php $this->load->view('layouts/js') ?>

	

	<script >
		$(document).ready(function() {
			$(".input-11").fileinput({
				maxFileCount: 10,
				allowedFileTypes: ["image", "video"]
			});
		});

	</script>

	<script>
		jQuery(document).ready( function($){

				// Multiple Select
				$(".select-1").select2({
					placeholder: "Pilihan"
				});


			});
		</script>	

	</body>
	</html>