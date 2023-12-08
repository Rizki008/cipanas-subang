<!--================Breadcrumb Area =================-->
<section class="breadcrumb_area">
	<div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background=""></div>
	<div class="container">
		<div class="page-cover text-center">
			<h2 class="page-cover-tittle">Pesanan</h2>
			<ol class="breadcrumb">
				<li><a href="<?= base_url() ?>">Beranda</a></li>
				<li class="active">Pesanan</li>
			</ol>
		</div>
	</div>
</section>
<!--================Breadcrumb Area =================-->

<!--================Contact Area =================-->
<section class="contact_area section_gap">
	<div class="container">
		<!-- <div id="mapBox" class="mapBox" data-lat="40.701083" data-lon="-74.1522848" data-zoom="13" data-info="PO Box CT16122 Collins Street West, Victoria 8007, Australia." data-mlat="40.701083" data-mlon="-74.1522848">
        </div> -->
		<div class="row">
			<div class="col-md-3">
				<div class="contact_info">
					<div class="info_item">
						<i class="lnr lnr-home"></i>
						<h6>Alamat</h6>
						<p>Kec.Subang Kab.Kuningan</p>
					</div>
					<div class="info_item">
						<i class="lnr lnr-phone-handset"></i>
						<h6><a href="#">08912819212</a></h6>
						<p>Buka Dari jam 08:00-17:00</p>
					</div>
					<div class="info_item">
						<i class="lnr lnr-envelope"></i>
						<h6><a href="#">cipanassubang@gmail.com</a></h6>
						<p>Kirim Pesan</p>
					</div>
				</div>
			</div>
			<div class="col-md-9">
				<?php
				if ($this->session->flashdata('pesan')) {
					echo '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="fa fa-check text-success"></i>';
					echo $this->session->flashdata('pesan');
					echo '</h5></div>';
				}
				?>
				<?php
				echo validation_errors('<div class="alert alert-warning alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>', '</div>');
				?>
				<?php
				$id_pemesanan = date('Ymd') . strtoupper(random_string('alnum', 8)); ?>
				<form class="row contact_form" action="<?= base_url('pembelian/cekout') ?>" method="post" id="contactForm" novalidate="novalidate">
					<?php
					$i = 1;
					$j = 1;
					foreach ($this->cart->contents() as $items) {
						$id_detail_pemesanan = random_string('alnum', 5);
						echo form_hidden('qty' . $i++, $items['qty']);
						echo form_hidden('id_detail_pemesanan' . $j++, $id_detail_pemesanan);
					}
					?>
					<div class="col-md-6">
						<div class="form-group">
							<label for="">Tanggal Datang</label>
							<input class="form-control" name="tgl_booking" id="date" type="date" />
						</div><br>
						<div class="form-group">
							<label for="">Metode Bayar</label>
							<select class="wide form-control" name="metode_bayar">
								<option data-display="Metode Pembayaran">---Metode Pembayaran---</option>
								<option value="1">Bayar Ditempat</option>
								<!-- <option value="2">Transfer</option> -->
							</select>
						</div><br><br><br>
					</div>
					<input name="id_pemesanan" value="<?= $id_pemesanan ?>" hidden>
					<input name="total" value="<?php echo $this->cart->total() ?>" hidden>
					<div class="col-md-12 text-right">
						<?php
						$i = 1;
						foreach ($this->cart->contents() as $items) {
							echo form_hidden('qty' . $i++, $items['qty']);
						}
						?>
						<button type="submit" value="submit" class="btn theme_btn button_hover">Pesan Tiket</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
<!--================Contact Area =================-->