<div class="container-fluid pt-4 px-4">
	<div class="row g-4">
		<div class="col-sm-12 col-xl-12">
			<div class="bg-light rounded h-100 p-4">
				<h4>
					<i class="fas fa-shopping-cart"></i> <?= $title ?>
					<small class="float-right">Tanggal: <?= $tanggal ?>/<?= $bulan ?>/<?= $tahun ?></small>
				</h4>

				<!-- Table row -->
				<div class="row">
					<div class="col-12 table-responsive">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama Tiket</th>
									<th>Tanggal Booking</th>
									<th>Tanggal Pemesanan</th>
									<th>Harga</th>
									<th>Jumlah Tiket</th>
									<th>Total</th>
								</tr>
							</thead>
							<tbody>
								<?php $no = 1;
								$grand_total = 0;
								foreach ($laporan as $key => $value) {
									$tot_harga = $value->qty * $value->harga_tiket;
									$grand_total = $grand_total + $tot_harga;
								?>
									<tr>
										<td><?= $no++ ?></td>
										<td><?= $value->nama_tiket ?></td>
										<td><?= $value->tgl_booking ?></td>
										<td><?= $value->tgl_pemesanan ?></td>
										<td>Rp.<?= number_format($value->harga_tiket, 0) ?></td>
										<td><?= $value->qty ?></td>
										<td>Rp.<?= number_format($tot_harga, 0) ?></td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
						<h3>Grand Total : Rp. <?= number_format($grand_total, 0) ?></h3>
					</div>
					<!-- /.col -->
				</div>
				<!-- /.row -->

				<!-- this row will not appear when printing -->
				<div class="row no-print">
					<div class="col-12">
						<button class="btn btn-default" onclick="window.print()"><i class="fas fa-print"></i> Print</button>
					</div>
				</div>
			</div>
			<!-- /.invoice -->
		</div><!-- /.col -->
	</div>
</div>