<!--================Breadcrumb Area =================-->
<section class="breadcrumb_area">
	<div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background=""></div>
	<div class="container">
		<div class="page-cover text-center">
			<h2 class="page-cover-tittle">Detail Tiket</h2>
			<ol class="breadcrumb">
				<li><a href="<?= base_url() ?>">Beranda</a></li>
				<li class="active">Detail Tiket</li>
			</ol>
		</div>
	</div>
</section>
<!--================Breadcrumb Area =================-->

<!--================Blog Area =================-->
<section class="blog_area">
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				<div class="blog_left_sidebar">
					<article class="row blog_item">
						<div class="col-md-3">
							<div class="blog_info text-right">
								<div class="post_tag">
									<a href="#">Detail</a>
								</div>

								<ul class="blog_meta list_style">
									<!-- <li><a href="#">Mark wiens<i class="lnr lnr-user"></i></a></li>
									<li><a href="#">12 Dec, 2017<i class="lnr lnr-calendar-full"></i></a></li> -->
									<?php foreach ($views as $key => $valuese) { ?>
										<li><a href="#"><?= $valuese->qty ?> Orang Membeli<i class="lnr lnr-eye"></i></a></li>
									<?php } ?>
									<?php foreach ($views_ulasan as $key => $valuesa) { ?>
										<li><a href="#"><?= $valuesa->jml ?> Comments<i class="lnr lnr-bubble"></i></a></li>
									<?php } ?>
								</ul>
							</div>
						</div>
						<?php
						echo form_open('pembelian/add');
						echo form_hidden('redirect_page', str_replace('index.php/', '', current_url()));
						?>
						<input type="hidden" name="id" value="<?= $data['tiket']->id_tiket ?>">
						<input type="hidden" name="name" value="<?= $data['tiket']->nama_tiket ?>">
						<input type="hidden" name="price" value="<?= $data['tiket']->harga_tiket - ($data['tiket']->range / 100 * $data['tiket']->harga_tiket) ?>">
						<input type="hidden" name="type" value="<?= $data['tiket']->tipe_tiket ?>">
						<input type="hidden" name="jumlah" value="<?= $data['tiket']->jumlah ?>">
						<input type="hidden" name="qty" value="1">
						<div class="col-md-9">
							<div class="blog_post">
								<img src="<?= base_url('assets/tiket/' . $data['tiket']->gambar) ?>" alt="">
								<div class="blog_details">
									<a href="#">
										<h2><?= $data['tiket']->nama_tiket ?></h2>
									</a>
									<p><?= $data['tiket']->deskripsi_tiket ?></p>
									<p>Qty : <input type="number" id="quantity" name="qty" value="1"></p>
									<button type="submit" class="view_btn button_hover">Beli Tiket</button>
								</div>
							</div>
						</div>
						<?php echo form_close() ?>
					</article>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="blog_right_sidebar">
					<aside class="single_sidebar_widget popular_post_widget">
						<h3 class="widget_title">Ulasan</h3>
						<?php foreach ($reviews as $key => $values) { ?>
							<div class="media post_item">
								<!-- <img src="image/blog/post1.jpg" alt="post"> -->
								<div class="media-body">
									<a href="blog-details.html">
										<h3><?= $values->nama_wisatawan ?></h3>
									</a>
									<p><?= $values->time_ulasan ?> : <?= $values->isi_ulasan ?></p>
								</div>
							</div>
						<?php } ?>
					</aside>
				</div>
			</div>
		</div>
	</div>
</section>
<!--================Blog Area =================-->