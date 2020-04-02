<?php 

	$uri1 = strtolower($this->uri->segment(1));
	$uri2 = strtolower($this->uri->segment(2));
	$uri3 = strtolower($this->uri->segment(3));

?>

<header id="header" data-sticky-class="not-dark" class="transparent-header full-header page-section full-header <?php if(isset($class_header)){echo $class_header; } ?>">
	<div id="header-wrap">
		<div class="container clearfix">
			<div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

			<div id="logo">
				<a href="" class="standard-logo" data-dark-logo="<?php echo base_url()?>assets/images/upload/logo1_wh.png"><img src="<?php echo base_url()?>assets/images/upload/logo2.png" alt="Canvas Logo"></a>
			</div>

			<nav id="primary-menu" class="style-4">

				<ul>
					<li class="<?php if($uri1 == 'beranda' || $uri1 == ''){ echo 'current'; } ?>"><a href="<?php echo base_url()?>Beranda"><div>Beranda</div></a></li>
					<li><a href="#"><div>Profil</div></a>
						<ul>
							<li><a href="<?php echo base_url().'profil/perusahaan'?>"><div><i class="icon-building"></i>Profil Perusahaan</div></a></li>
							<li><a href="<?php echo base_url().'profil/portofolio'?>"><div><i class="icon-newspaper"></i>Portofolio</div></a></li>
							<li><a href="<?php echo base_url().'profil/tim'?>"><div><i class="icon-users1"></i>Tim Kami</div></a></li>
							<li><a href="<?php echo base_url().'profil/kontak'?>"><div><i class="icon-phone"></i>Kontak</div></a></li>
						</ul>
					</li>
					<li class="mega-menu <?php if($uri1 == 'projek'){ echo 'current'; } ?>"><a href="<?php echo base_url()?>Projek"><div>Projek</div></a></li>
					
					<?php if(isset($_SESSION['id'])){?>
					<li class="mega-menu <?php if($uri1 == 'admin' && $uri2 == 'welcome'){ echo 'current'; } ?>"><a href="<?php echo base_url()?>admin/Welcome"><div>Panel Akun</div></a></li>
					<?php }else{?>
					<li class="mega-menu <?php if($uri1 == 'auth'){ echo 'current'; } ?>"><a href="<?php echo base_url()?>Auth"><div>Daftar</div></a></li>
					<?php } ?>
				</ul>
				<ul>
					<li><a class="side-panel-trigger <?php if($uri1 == 'berkas'){ echo 'current'; } ?>" href="#"><div><i class="icon-file-archive"></i>Berkas</div></a></li>
				</ul>

				<div id="top-search" style="display: none;">
					<a href="#" id="top-search-trigger"><i class="icon-search3"></i><i class="icon-line-cross"></i></a>
					<form action="search.html" method="get">
						<input type="text" name="q" class="form-control" value="" placeholder="Type &amp; Hit Enter..">
					</form>
				</div>

			</nav>
		</div>
	</div>	
</header>