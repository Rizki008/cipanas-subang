<header class="header_area">
	<div class="container">
		<?php
		$keranjang = $this->cart->contents();
		$jml_item = 0;
		foreach ($keranjang as $key => $value) {
			$jml_item = $jml_item + $value['qty'];
		}
		?>
		<nav class="navbar navbar-expand-lg navbar-light">
			<!-- Brand and toggle get grouped for better mobile display -->
			<a class="navbar-brand logo_h" href="<?= base_url() ?>"><img src="<?= base_url() ?>royal-master/image/logobaru.png" alt=""></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<div id="navbarSupportedContent">
				<form action="<?= base_url('home/search') ?>" method="get">
					<div class="input-group d-flex flex-row">
						<input name="keyword" placeholder="Cari Tiket" class="form-control" type="text">
						<button type="submit" value="cari" class="btn btn-warning"><i class="fa fa-search"></i></button>
					</div>
				</form>
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
				<ul class="nav navbar-nav menu_nav ml-auto">
					<li class="nav-item active"><a class="nav-link" href="<?= base_url() ?>">Beranda</a></li>
					<li class="nav-item"><a class="nav-link" href="<?= base_url('pembelian') ?>">Keranjang Pemesanan [<?= $jml_item ?>]</a></li>
					<?php if ($this->session->userdata('username') == "") { ?>
						<li class="nav-item"><a class="nav-link" href="<?= base_url('pelanggan/login') ?>">Masuk/Daftar</a></li>
					<?php } else { ?>
						<li class="nav-item"><a class="nav-link" href="<?= base_url('pemesanan') ?>">Pesanan</a></li>
						<li class="nav-item"><a class="nav-link" href="#"><?= $this->session->userdata('nama_wisatawan'); ?></a></li>
						<li class="nav-item"><a class="nav-link" href="<?= base_url('pelanggan/logout') ?>">Keluar</a></li>
					<?php } ?>
					<!-- <li class="nav-item submenu dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Blog</a>
                        <ul class="dropdown-menu">
                            <li class="nav-item"><a class="nav-link" href="blog.html">Blog</a></li>
                            <li class="nav-item"><a class="nav-link" href="blog-single.html">Blog Details</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="elements.html">Elemests</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li> -->
				</ul>
			</div>
		</nav>
	</div>
</header>
<!--================Header Area =================-->