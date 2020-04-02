<?php
$uri2 = strtolower($this->uri->segment(2));
$uri3 = strtolower($this->uri->segment(3));
?>

<header id="header">
	<div id="header-wrap">
		<div class="container clearfix">
			<div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

			<div id="logo" class="nobottomborder">
				<a target="_blank" href="<?php echo base_url()?>beranda" class="standard-logo" data-dark-logo="<?php echo base_url()?>assets/images/upload/logo.png"><img src="<?php echo base_url()?>assets/images/upload/logo2.png" alt="Canvas Logo"></a>
				<a target="_blank" href="<?php echo base_url()?>beranda" class="retina-logo" data-dark-logo="<?php echo base_url()?>assets/images/upload/logo.png"><img src="<?php echo base_url()?>assets/images/upload/logo2.png" alt="Canvas Logo"></a>
			</div>

			<nav id="primary-menu">
				<ul>
					<li <?php if($uri2 == 'welcome'){ echo "class='current'"; } ?>><a href="<?php echo base_url()?>admin/Welcome"><div>Dashboard</div></a></li>

					<li <?php if($uri2 == 'akun' && $uri3 == 'kode_referral'){ echo "class='current'"; } ?>><a href="<?php echo base_url()?>admin/Akun/kode_referral"><div>Kode Referral</div></a></li>
					
					<li <?php if($uri2 == 'pelanggan'){ echo "class='current'"; } ?>><a href="<?php echo base_url()?>admin/Pelanggan"><div>Pelanggan</div></a></li>

					<!-- MENU ADMIN -->
					<?php if($_SESSION['level'] == '1'){ ?>

					<li <?php if($uri2 == 'fee'){ echo "class='current'"; } ?>><a href="<?php echo base_url()?>admin/fee"><div>Fee Marketing</div></a></li>

					<li <?php if($uri2 == 'projek'){ echo "class='current'"; } ?>><a href="<?php echo base_url()?>admin/Projek"><div>Projek</div></a></li>
					
					<li <?php if($uri2 == 'akun' && $uri3 == ''){ echo "class='current'"; } ?>><a href="<?php echo base_url()?>admin/Akun"><div>Akun Marketing</div></a></li>

					<li><a href="#"><div>Profil</div></a>
						<ul>
							<li <?php if($uri2 == 'profil' && $uri3 == 'perusahaan'){ echo "class='current'"; } ?> ><a href="<?php echo base_url().'admin/profil/perusahaan'?>"><div><i class="icon-building"></i>Perusahaan</div></a></li>
							<li <?php if($uri2 == 'profil' && $uri3 == 'layanan'){ echo "class='current'"; } ?> ><a href="<?php echo base_url().'admin/profil/layanan'?>"><div><i class="icon-hand-holding"></i>Layanan</div></a></li>
							<li <?php if($uri2 == 'profil' && $uri3 == 'tim'){ echo "class='current'"; } ?> ><a href="<?php echo base_url().'admin/profil/tim'?>"><div><i class="icon-users1"></i>Tim Kami</div></a></li>
						</ul>
					</li>


					<li><a href="#"><div>Setting</div></a>
						<ul>
							<li <?php if($uri2 == 'setting' && $uri3 == 'slideshow'){ echo "class='current'"; } ?> ><a href="<?php echo base_url().'admin/setting/slideshow'?>"><div><i class="icon-image1"></i>Slideshow</div></a></li>
						</ul>
					</li>

					<?php } ?>
					<!-- END MENU ADMIN -->

					<li><a href="<?php echo base_url()?>Auth/logout"><div>Keluar</div></a></li>
				</ul>
			</nav>

			<div class="clearfix d-none d-lg-block">
				<a href="#" class="social-icon si-small si-borderless si-facebook">
					<i class="icon-facebook"></i>
					<i class="icon-facebook"></i>
				</a>

				<a href="#" class="social-icon si-small si-borderless si-twitter">
					<i class="icon-twitter"></i>
					<i class="icon-twitter"></i>
				</a>

				<a href="#" class="social-icon si-small si-borderless si-gplus">
					<i class="icon-gplus"></i>
					<i class="icon-gplus"></i>
				</a>

				<a href="#" class="social-icon si-small si-borderless si-pinterest">
					<i class="icon-pinterest"></i>
					<i class="icon-pinterest"></i>
				</a>

				<a href="#" class="social-icon si-small si-borderless si-github">
					<i class="icon-github"></i>
					<i class="icon-github"></i>
				</a>
			</div>
		</div>
	</div>
</header>