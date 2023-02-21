<div class="container-fluid pt-4 px-4">
	<div class="row g-4">
		<div class="col-sm-12 col-xl-12">
			<div class="bg-light rounded h-100 p-4">
				<h6 class="mb-4">Detail Pembayaran</h6>
				<table class="table table-striped">
					<thead>
						<tr>
							<!-- <th scope="col">#</th> -->
							<th scope="col">Nama Tiket</th>
							<th scope="col">Jumlah Tiket</th>
							<!-- <th scope="col">Tanggal Pemesanan</th> -->
							<th scope="col">Harga Satuan</th>
							<th scope="col">Total Harga</th>
							<th scope="col">Diskon</th>
							<th scope="col">Bukti Bayar</th>
						</tr>
					</thead>
					<tbody>
						<?php
						foreach ($detail_pesanan as $key => $value) { ?>
							<tr>
								<!-- <td><img src="<?= base_url('assets/tiket/' . $value->gambar) ?>" width="150px"></td> -->
								<td><?= $value->nama_tiket ?></td>
								<td><?= $value->qty ?></td>
								<td>Rp. <?= number_format($value->harga_tiket, 0) ?></td>
								<td>Rp. <?= number_format($value->total, 0) ?></td>
								<td><?= $value->range ?> %</td>
								<td><img src="<?= base_url('assets/bukti_bayar/' . $value->bukti_bayar) ?>" width="150px"></td>
							</tr>
						<?php } ?>
						<a href="<?= base_url('transaksi/masuk') ?>" class="btn btn-primary">Kembali</a>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>