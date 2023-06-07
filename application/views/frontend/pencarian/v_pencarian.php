<!--================Breadcrumb Area =================-->
<section class="breadcrumb_area">
	<div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background=""></div>
	<div class="container">
		<div class="page-cover text-center">
			<h2 class="page-cover-tittle">Pencarian Tiket</h2>
			<ol class="breadcrumb">
				<li><a href="<?= base_url() ?>">Home</a></li>
				<li class="active">Pencarian tiket</li>
			</ol>
		</div>
	</div>
</section>
<!--================Breadcrumb Area =================-->

<!--================ Accomodation Area  =================-->
<section class="accomodation_area section_gap">
	<div class="container">
		<div class="section_title text-center">
			<h2 class="title_color">Hasil Pencarian Tiket</h2>
		</div>
		<div class="row mb_30">
			<?php if (count($pencarian) > 0) : ?>
				<?php foreach ($pencarian as $value) :
				?>
					<div class="col-lg-3 col-sm-6">
						<?php
						echo form_open('pembelian/add');
						echo form_hidden('redirect_page', str_replace('index.php/', '', current_url()));
						?>
						<input type="hidden" name="id" value="<?= $value->id_tiket ?>">
						<input type="hidden" name="name" value="<?= $value->nama_tiket ?>">
						<input type="hidden" name="price" value="<?= $value->harga_tiket - ($value->range / 100 * $value->harga_tiket) ?>">
						<input type="hidden" name="type" value="<?= $value->tipe_tiket ?>">
						<input type="hidden" name="jumlah" value="<?= $value->jumlah ?>">
						<input type="hidden" name="qty" value="1">
						<div class="accomodation_item text-center">
							<div class="hotel_img">
								<img src="<?= base_url('assets/tiket/' . $value->gambar) ?>" alt="">
								<button type="submit" class="btn theme_btn button_hover">Beli Tiket</button>
							</div>
							<a href="#">
								<h4 class="sec_h4"><?= $value->nama_tiket ?></h4>
							</a>
							<p>
								<?= $value->deskripsi_tiket ?> <?php if ($value->tipe_tiket == 1) { ?>
									<?= $value->jumlah ?> orang
								<?php } elseif ($value->tipe_tiket == 2) { ?>

								<?php } ?>
							</p>
							<?php if ($value->range > 0) : ?>
								<p>Harga Utama</p>
								<h6>Rp. <?= number_format($value->harga_tiket, 0) ?></h6>
								<p>Kini Menjadi</p>
								<h5>Rp <?= number_format($value->harga_tiket - ($value->range / 100 * $value->harga_tiket), 0) ?></h5>
								<!-- <span class="price-sale">Rp. <?= number_format($value->harga_tiket - ($value->range / 100 * $value->harga_tiket), 0); ?></span> -->
							<?php else : ?>
								<p>Harga Utama</p>
								<!-- <span class="mr-2"><span class="price-sale">Rp. <?= number_format($value->harga_tiket - ($value->range / 100 * $value->harga_tiket), 0); ?></span> -->
								<h5>Rp <?= number_format($value->harga_tiket - ($value->range / 100 * $value->harga_tiket), 0) ?></h5>
							<?php endif; ?>
						</div>
						<?php echo form_close() ?>
					</div>
				<?php endforeach; ?>
			<?php else : ?>
			<?php endif; ?>
		</div>
	</div>
</section>
<!--================ Accomodation Area  =================-->