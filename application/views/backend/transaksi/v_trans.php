<?php
$total_pesanan = $this->m_pemesanan->total_pesanan();
$total_pesanan_proses = $this->m_pemesanan->total_pesanan_proses();
$total_pesanan_selesai = $this->m_pemesanan->total_pesanan_selesai();
$total_pesanan_batal = $this->m_pemesanan->total_pesanan_batal();
?>
<div class="container-fluid pt-4 px-4">
	<div class="row">
		<div class="col-12">
			<h4>Pesanan Tiket</h4>
		</div>
	</div>
	<div class="row">
		<div class="col-12 col-sm-12">
			<div class="card card-primary card-tabs">
				<div class="card-header p-0 pt-1">
					<ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Masuk[<?= $total_pesanan ?>]</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Proses[<?= $total_pesanan_proses ?>]</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">Selesai[<?= $total_pesanan_selesai ?>]</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="custom-tabs-one-settings-tab" data-toggle="pill" href="#custom-tabs-one-settings" role="tab" aria-controls="custom-tabs-one-settings" aria-selected="false">Batal[<?= $total_pesanan_batal ?>]</a>
						</li>
					</ul>
				</div>
				<div class="card-body">
					<div class="tab-content" id="custom-tabs-one-tabContent">
						<div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
							<table class="table table-striped">
								<thead>
									<tr>
										<th scope="col">#</th>
										<th scope="col">No Pemesanan</th>
										<th scope="col">Harga Tiket</th>
										<th scope="col">Qty</th>
										<th scope="col">Tanggal Booking</th>
										<th scope="col">Metode Bayar</th>
										<th scope="col">Status Bayar/Pemesanan</th>
										<th scope="col">Setting</th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 1;
									foreach ($masuk as $key => $value) { ?>
										<tr>
											<th scope="row"><?= $no++ ?></th>
											<td><?= $value->id_pemesanan ?></td>
											<td><?= number_format($value->total, 0) ?></td>
											<td><?= $value->qty ?></td>
											<td><?= $value->tgl_booking ?></td>
											<td>
												<?php if ($value->metode_bayar == 1) { ?>
													<span class="badge badge-primary">Bayar Ditempat</span>
												<?php } elseif ($value->metode_bayar == 2) { ?>
													<span class="badge badge-dark">Transfer</span>
												<?php } ?>
											</td>
											<td>
												<?php if ($value->status_pemesanan == 0 and $value->status_pembayaran == 0) { ?>
													<span class="badge badge-warning">Belum Bayar</span>
												<?php } elseif ($value->status_pemesanan == 0 and $value->status_pembayaran == 1) { ?>
													<span class="badge badge-primary">Sudah Bayar <br> / Vaifikiasi</span>
												<?php } elseif ($value->status_pemesanan == 1) { ?>
													<span class="fa fa-success">proses</span>
												<?php } elseif ($value->status_pemesanan == 2) { ?>
													<span class="fa fa-success">Selesai</span>
												<?php } elseif ($value->status_pemesanan == 3) { ?>
													<span class="fa fa-danger">Batal</span>
												<?php } ?>
											</td>
											<td>
												<?php if ($value->status_pembayaran == 1) { ?>
													<a href="<?= base_url('transaksi/verifikasi/' . $value->id_pemesanan) ?>" class="btn btn-success"><i class="fa fa-paper-plane"></i>Verifikasi</a>
													<a href="<?= base_url('transaksi/detail/' . $value->id_pemesanan) ?>" class="btn btn-warning"><i class="fa fa-pencil-alt"></i>Detail Bayar</a>
												<?php } elseif ($value->metode_bayar == 1) { ?>
													<a href="<?= base_url('transaksi/verifikasi/' . $value->id_pemesanan) ?>" class="btn btn-success"><i class="fa fa-paper-plane"></i>Verifikasi</a>
												<?php } ?>

											</td>
										</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
						<div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
							<table class="table table-striped">
								<thead>
									<tr>
										<th scope="col">#</th>
										<th scope="col">No Pemesanan</th>
										<th scope="col">Harga Tiket</th>
										<th scope="col">Qty</th>
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
											<td><?= $value->qty ?></td>
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
						<div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab">
							<table class="table table-striped">
								<thead>
									<tr>
										<th scope="col">#</th>
										<th scope="col">No Pemesanan</th>
										<th scope="col">Harga Tiket</th>
										<th scope="col">Qty</th>
										<th scope="col">Tanggal Booking</th>
										<th scope="col">Metode Bayar</th>
										<th scope="col">Status Bayar/Pemesanan</th>
										<th scope="col">Setting</th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 1;
									foreach ($selesai as $key => $value) { ?>
										<tr>
											<th scope="row"><?= $no++ ?></th>
											<td><?= $value->id_pemesanan ?></td>
											<td><?= number_format($value->total, 0) ?></td>
											<td><?= $value->qty ?></td>
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
													<span class="fa fa-success">proses</span>
												<?php } elseif ($value->status_pemesanan == 2) { ?>
													<span class="badge badge-success">Selesai</span>
												<?php } elseif ($value->status_pemesanan == 3) { ?>
													<span class="fa fa-danger">Batal</span>
												<?php } ?>
											</td>
											<td>
												<!-- <a href="<?= base_url('promo/edit/' . $value->id_promo) ?>" class="btn btn-warning"><i class="fa fa-pencil-alt"></i></a> -->
											</td>
										</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
						<div class="tab-pane fade" id="custom-tabs-one-settings" role="tabpanel" aria-labelledby="custom-tabs-one-settings-tab">
							<table class="table table-striped">
								<thead>
									<tr>
										<th scope="col">#</th>
										<th scope="col">No Pemesanan</th>
										<th scope="col">Harga Tiket</th>
										<th scope="col">Qty</th>
										<th scope="col">Tanggal Booking</th>
										<th scope="col">Metode Bayar</th>
										<th scope="col">Status Bayar/Pemesanan</th>
										<!-- <th scope="col">Setting</th> -->
									</tr>
								</thead>
								<tbody>
									<?php $no = 1;
									foreach ($batal as $key => $value) { ?>
										<tr>
											<th scope="row"><?= $no++ ?></th>
											<td><?= $value->id_pemesanan ?></td>
											<td><?= number_format($value->total, 0) ?></td>
											<td><?= $value->qty ?></td>
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
													<span class="fa fa-success">proses</span>
												<?php } elseif ($value->status_pemesanan == 2) { ?>
													<span class="fa fa-success">Selesai</span>
												<?php } elseif ($value->status_pemesanan == 3) { ?>
													<span class="badge badge-danger">Pemesanan Dibatalkan Oleh Wisatawan</span>
												<?php } elseif ($value->status_pemesanan == 6) { ?>
													<span class="badge badge-danger">Pemesanan Dibatalkan Oleh Admin</span>
												<?php } ?>
											</td>
											<td>
												<!-- <a href="<?= base_url('promo/edit/' . $value->id_promo) ?>" class="btn btn-warning"><i class="fa fa-pencil-alt"></i></a> -->
											</td>
										</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<!-- /.card -->
			</div>
		</div>
	</div>
</div>