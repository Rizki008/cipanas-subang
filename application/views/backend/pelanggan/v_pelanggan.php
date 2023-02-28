<div class="container-fluid pt-4 px-4">
	<div class="row g-4">
		<div class="col-sm-12 col-xl-12">
			<div class="bg-light rounded h-100 p-4">
				<h6 class="mb-4">Data Wisatawan</h6>
				<!-- <a href="<?= base_url('tiket/add') ?>" class="btn btn-primary"> <i class="fa fa-plus"></i>Tambah Tiket</a> -->
				<table class="table table-striped">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Nama Wisatawan</th>
							<th scope="col">Jenis Kelamin</th>
							<th scope="col">Jumlah Datang</th>
							<th scope="col">Tempat, Tanggal Lahir</th>
							<th scope="col">No Hp</th>
							<th scope="col">Alamat</th>
							<th scope="col">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1;
						foreach ($pelanggan as $key => $value) { ?>
							<tr>
								<th scope="row"><?= $no++ ?></th>
								<td><?= $value->nama_wisatawan ?></td>
								<td><?= $value->jk ?></td>
								<td><?= $value->jml ?></td>
								<td><?= $value->ttl ?></td>
								<td><?= $value->no_hp ?></td>
								<td><?= $value->alamat_detail ?> <br> kab.<?= $value->kab_kota ?> Prov.<?= $value->provinsi ?></td>
								<td>
									<?php if ($value->jml >= 5) { ?>
										<a href="<?= base_url('user/update_wisatawan/' . $value->id_wisatawan) ?>" class="btn btn-success"><i class="fa fa-pencil-alt"></i>Gratis Tiket</a>
									<?php } ?>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>