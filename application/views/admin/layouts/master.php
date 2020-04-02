<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="SemiColonWeb" />
	<link rel="shortcut icon" href="<?php echo base_url() ?>assets/images/upload/logo.png">

	<!-- CSS -->
	<?php $this->load->view('admin/layouts/css') ?>


	<title><?php echo $title ?></title>

</head>

<body class="stretched side-header">

	<div id="wrapper" class="clearfix">

		<!-- HEADER -->
		<?php $this->load->view('admin/layouts/header') ?>

		<!-- CONTENT -->
		<?php $this->load->view($content) ?>

		<!-- FOOTER -->
		<?php //$this->load->view('admin/layouts/footer') ?>

	</div>

	<div id="gotoTop" class="icon-angle-up"></div>

	<!-- JS -->
	<?php $this->load->view('admin/layouts/js') ?>

	<script >
		$(document).ready(function() {
			$(".input-11").fileinput({
				//maxFileCount: 10,
				allowedFileTypes: ["image", "video"]
			});

			$(".input-8").fileinput({
				mainClass: "input-group-md",
				previewFileType: "video",
				browseClass: "btn btn-success",
				browseLabel: "Pick Image",
				browseIcon: "<i class=\"icon-picture\"></i> ",
				removeClass: "btn btn-danger",
				removeLabel: "Delete",
				removeIcon: "<i class=\"icon-trash\"></i> ",
				uploadClass: "btn btn-info",
				uploadLabel: "Upload",
				uploadIcon: "<i class=\"icon-upload\"></i> "
			});

		});

	</script>


	<script>
		
		function copylink(){
			copyToClipboard(document.getElementById("txt"));			
		}

		function copyToClipboard(elem) {
	    // create hidden text element, if it doesn't already exist
	    var targetId = "_hiddenCopyText_";
	    var isInput = elem.tagName === "INPUT" || elem.tagName === "TEXTAREA";
	    var origSelectionStart, origSelectionEnd;
	    if (isInput) {
	        // can just use the original source element for the selection and copy
	        target = elem;
	        origSelectionStart = elem.selectionStart;
	        origSelectionEnd = elem.selectionEnd;
	    } else {
	        // must use a temporary form element for the selection and copy
	        target = document.getElementById(targetId);
	        if (!target) {
	        	var target = document.createElement("textarea");
	        	target.style.position = "absolute";
	        	target.style.left = "-9999px";
	        	target.style.top = "0";
	        	target.id = targetId;
	        	document.body.appendChild(target);
	        }
	        target.textContent = elem.textContent;
	    }
	    // select the content
	    var currentFocus = document.activeElement;
	    target.focus();
	    target.setSelectionRange(0, target.value.length);
	    
	    // copy the selection
	    var succeed;
	    try {
	    	succeed = document.execCommand("copy");
	    } catch(e) {
	    	succeed = false;
	    }
	    // restore original focus
	    if (currentFocus && typeof currentFocus.focus === "function") {
	    	currentFocus.focus();
	    }
	    
	    if (isInput) {
	        // restore prior selection
	        elem.setSelectionRange(origSelectionStart, origSelectionEnd);
	    } else {
	        // clear temporary content
	        target.textContent = "";
	    }
	    return succeed;
	} 
	</script>

	

	<script type="text/javascript">
		
		// var rupiah = document.getElementById('rupiah');
		// rupiah.addEventListener('keyup', function(e){
		// 	// tambahkan 'Rp.' pada saat form di ketik
		// 	// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
		// 	rupiah.value = formatRupiah(this.value, 'Rp. ');
		// 	return false;

		// });

		$("#rupiah").keyup(function(){
			rupiah.value = formatRupiah(this.value, 'Rp. ');
		});
 
		/* Fungsi formatRupiah */
		function formatRupiah(angka, prefix){
			var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split   		= number_string.split(','),
			sisa     		= split[0].length % 3,
			rupiah     		= split[0].substr(0, sisa),
			ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
 
			// tambahkan titik jika yang di input sudah menjadi angka ribuan
			if(ribuan){
				separator = sisa ? '.' : '';
				rupiah += separator + ribuan.join('.');
			}
 
			rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
			return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
		}
	</script>

	<!-- <script> 

		// jQuery('#google-map').gMap({
		// 	address: 'Melbourne, Australia',
		// 	maptype: 'ROADMAP',
		// 	zoom: 14,
		// 	markers: [
		// 		{
		// 			address: "Melbourne, Australia",
		// 			html: '<div style="width: 300px;"><h4 style="margin-bottom: 8px;">Hi, we\'re <span>Envato</span></h4><p class="nobottommargin">Our mission is to help people to <strong>earn</strong> and to <strong>learn</strong> online. We operate <strong>marketplaces</strong> where hundreds of thousands of people buy and sell digital goods every day, and a network of educational blogs where millions learn <strong>creative skills</strong>.</p></div>',
		// 			icon: {
		// 				image: "images/icons/map-icon-red.png",
		// 				iconsize: [32, 39],
		// 				iconanchor: [32,39]
		// 			}
		// 		}
		// 	],
		// 	doubleclickzoom: false,
		// 	controls: {
		// 		panControl: true,
		// 		zoomControl: true,
		// 		mapTypeControl: true,
		// 		scaleControl: false,
		// 		streetViewControl: false,
		// 		overviewMapControl: false
		// 	}

		// });

</script> -->

	

	<script>
		jQuery(document).ready( function($){
			$(".bt-switch").bootstrapSwitch();

			//DATATABLE
			$('.datatable1').dataTable();

			// Multiple Select
			$(".select-1").select2({
				placeholder: "Select Multiple Values"
			});

			// Loading array data
			var data = [{ id: 0, text: 'enhancement' }, { id: 1, text: 'bug' }, { id: 2, text: 'duplicate' }, { id: 3, text: 'invalid' }, { id: 4, text: 'wontfix' }];
			$(".select-data-array").select2({
			  data: data
			})
			$(".select-data-array-selected").select2({
			  data: data
			});

			// Enabled/Disabled
			$(".select-disabled").select2();
			$(".select-enable").on("click", function () {
				$(".select-disabled").prop("disabled", false);
				$(".select-disabled-multi").prop("disabled", false);
			});
			$(".select-disable").on("click", function () {
				$(".select-disabled").prop("disabled", true);
				$(".select-disabled-multi").prop("disabled", true);
			});

			// Without Search
			$(".select-hide").select2({
				minimumResultsForSearch: Infinity
			});

			// select Tags
			$(".select-tags").select2({
				tags: true
			});

			// Select Splitter
			$('.selectsplitter').selectsplitter();

		});
	</script>


</body>
</html>