<!--================Breadcrumb Area =================-->
<section class="breadcrumb_area blog_banner_two">
	<div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background=""></div>
	<div class="container">
		<div class="page-cover text-center">
			<h2 class="page-cover-tittle f_48"><?= $title ?></h2>
			<ol class="breadcrumb">
				<li><a href="<?= base_url() ?>">Beranda</a></li>
				<li class="active"><?= $title ?></li>
			</ol>
		</div>
	</div>
</section>
<!--================Breadcrumb Area =================-->

<!-- Start Align Area -->
<div class="whole-wrap">
	<div class="container">
		<div class="section-top-border">
			<h3 class="mb-30 title_color"><?= $title ?></h3>
			<?php foreach ($wisatawan as $key => $value) { ?>
				<h4><span class="badge badge-warning">Selamat Anda Mendapatkan <?= $value->gratis_tiket ?> Gratis Tiket Masuk</span></h4>
			<?php } ?>
			<div class="progress-table-wrap">
				<div class="progress-table">
					<div class="table-head">
						<div class="serial">#</div>
						<div class="country">No Pesan</div>&nbsp;&nbsp;
						<div class="visit">Harga Tiket</div>
						<div class="percentage">Tanggal Pemesanan</div>
						<div class="percentage">Tanggal Booking</div>
						<!-- <div class="percentage">Jumlah Tiket</div> -->
						<div class="percentage">Aksi</div>
					</div>
					<?php $no = 1;
					foreach ($belum_bayar as $key => $value) { ?>
						<div class="table-row">
							<div class="serial"><?= $no++ ?></div>
							<div class="country"> <?= $value->id_pemesanan ?></div>&nbsp;&nbsp;
							<div class="visit">Rp. <?= number_format($value->total, 0); ?></div>
							<div class="percentage"><?= $value->tgl_pemesanan ?></div>
							<div class="percentage"><?= $value->tgl_booking ?></div>
							<!-- <div class="percentage"><?= $value->qty ?></div> -->
							<div class="percentage">
								<?php if ($value->status_pembayaran == 0 && $value->metode_bayar == 2) { ?>
									<a href="<?= base_url('pemesanan/detail/' . $value->id_pemesanan) ?>" class="btn btn-sm btn-flat btn-warning">Detail</a>&nbsp;&nbsp;
									<a href="<?= base_url('pemesanan/bayar/' . $value->id_pemesanan) ?>" class="btn btn-sm btn-flat btn-primary">Bayar</a>&nbsp;&nbsp;
									<a href="<?= base_url('pemesanan/batal/' . $value->id_pemesanan) ?>" class="btn btn-sm btn-flat btn-danger">Batalkan</a>
								<?php } elseif ($value->metode_bayar == 1) { ?>
									<span class="badge badge-success">Pembayaran Ditempat</span>
									<a href="<?= base_url('pemesanan/batal/' . $value->id_pemesanan) ?>" class="btn btn-sm btn-flat btn-danger">Batalkan</a>
								<?php } elseif ($value->status_pembayaran == 1) { ?>
									<span class="badge badge-success">Menunggu Konfirmasi Pembayaran</span>
								<?php } ?>
							</div>
						</div>
					<?php } ?>
					<br>
					<br>
					<?php $no = 1;
					foreach ($diproses as $key => $value) { ?>
						<div class="table-row">
							<div class="serial"><?= $no++ ?></div>
							<div class="country"> <?= $value->id_pemesanan ?></div>&nbsp;&nbsp;
							<div class="visit">Rp. <?= number_format($value->total, 0); ?></div>
							<div class="percentage"><?= $value->tgl_pemesanan ?></div>
							<div class="percentage"><?= $value->tgl_booking ?></div>
							<!-- <div class="percentage"><?= $value->qty ?></div> -->
							<div class="percentage">
								<?php if ($value->status_pemesanan == 1) { ?>
									<span class="badge badge-success"> Konfirmasi Pembayaran Berhasil</span>
								<?php } ?>
							</div>
						</div>
					<?php } ?>
					<br>
					<br>
					<?php $no = 1;
					foreach ($selesai as $key => $value) { ?>
						<div class="table-row">
							<div class="serial"><?= $no++ ?></div>
							<div class="country"> <?= $value->id_pemesanan ?></div>&nbsp;&nbsp;
							<div class="visit">Rp. <?= number_format($value->total, 0); ?></div>
							<div class="percentage"><?= $value->tgl_pemesanan ?></div>
							<div class="percentage"><?= $value->tgl_booking ?></div>
							<!-- <div class="percentage"><?= $value->qty ?></div> -->
							<div class="percentage">
								<?php if ($value->status_pemesanan == 2) { ?>
									<span class="badge badge-success"> Tiket Telah Diambil</span>
									<a href="<?= base_url('pemesanan/ulasan/' . $value->id_pemesanan) ?>" class="btn btn-sm btn-flat btn-warning">Ulasan</a>
								<?php } ?>
							</div>
						</div>
					<?php } ?>
					<br>
					<br>
					<?php $no = 1;
					foreach ($batal as $key => $value) { ?>
						<div class="table-row">
							<div class="serial"><?= $no++ ?></div>
							<div class="country"> <?= $value->id_pemesanan ?></div>&nbsp;&nbsp;
							<div class="visit">Rp. <?= number_format($value->total, 0); ?></div>
							<div class="percentage"><?= $value->tgl_pemesanan ?></div>
							<div class="percentage"><?= $value->tgl_booking ?></div>
							<!-- <div class="percentage"><?= $value->qty ?></div> -->
							<div class="percentage">
								<?php if ($value->status_pemesanan == 3) { ?>
									<span class="badge badge-danger"> Tiket Telah Dibatalkan</span>
								<?php } ?>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Align Area -->