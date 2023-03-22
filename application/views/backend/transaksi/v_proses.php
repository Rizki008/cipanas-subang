<div class="container-fluid pt-4 px-4">
	<div class="row g-4">
		<div class="col-sm-12 col-xl-12">
			<div class="bg-light rounded h-100 p-4">
				<h6 class="mb-4">Pesanan Diproses</h6>
				<table class="table table-striped">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">No Pemesanan</th>
							<th scope="col">Harga Tiket</th>
							<!-- <th scope="col">Tanggal Pemesanan</th> -->
							<th scope="col">Tanggal Booking</th>
							<th scope="col">Metode Bayar</th>
							<th scope="col">Status Bayar/Pemesanan</th>
							<th scope="col">Setting</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1;
						foreach ($proses as $key => $value) { ?>
							<tr>
								<th scope="row"><?= $no++ ?></th>
								<td><?= $value->id_pemesanan ?></td>
								<td><?= number_format($value->total, 0) ?></td>
								<!-- <td><?= $value->tgl_pemesanan ?></td> -->
								<td><?= $value->tgl_booking ?></td>
								<td>
									<?php if ($value->metode_bayar == 1) { ?>
										<span class="fa fa-success">Bayar Ditempat</span>
									<?php } elseif ($value->metode_bayar == 2) { ?>
										<span class="fa fa-warning">Transfer</span>
									<?php } ?>
								</td>
								<td>
									<?php if ($value->status_pemesanan == 0 and $value->status_pembayaran == 0) { ?>
										<span class="fa fa-primary">Belum Bayar</span>
									<?php } elseif ($value->status_pemesanan == 0 and $value->status_pembayaran == 1) { ?>
										<span class="fa fa-warning">Sudah Bayar <br> / Vaifikiasi</span>
									<?php } elseif ($value->status_pemesanan == 1) { ?>
										<span class="badge badge-primary">proses</span>
									<?php } elseif ($value->status_pemesanan == 2) { ?>
										<span class="fa fa-success">Selesai</span>
									<?php } elseif ($value->status_pemesanan == 3) { ?>
										<span class="fa fa-danger">Batal</span>
									<?php } ?>
								</td>
								<td>
									<a href="<?= base_url('transaksi/batalkan/' . $value->id_pemesanan) ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
									<a href="<?= base_url('transaksi/ambiltiket/' . $value->id_pemesanan) ?>" class="btn btn-success"><i class="fa fa-check-circle"></i></a>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>