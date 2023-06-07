<div class="container-fluid pt-4 px-4">
	<div class="row g-4">
		<div class="col-sm-12 col-xl-12">
			<?php
			echo validation_errors(
				'<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fa fa-exclamation-circle me-2"></i>',
				'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>'
			);

			if (isset($error_upload)) {
				echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fa fa-exclamation-circle me-2"></i>' . $error_upload . '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
			}

			echo form_open_multipart('tiket/add') ?>
			<div class="bg-light rounded h-100 p-4">
				<h6 class="mb-4"><?= $title ?> &nbsp; <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-plus-circle"></i>Tambah Tiket</button></h6>
				<div class="form-floating mb-3">
					<input type="text" name="nama_tiket" value="<?= set_value('nama_tiket') ?>" class="form-control" id="floatingInput" placeholder="Nama Tiket">
					<label for="floatingInput">Nama Tiket</label>
				</div>
				<div class="form-floating mb-3">
					<input type="number" class="form-control" name="harga_tiket" value="<?= set_value('harga_tiket') ?>" id="floatingPassword" placeholder="Harga Tiket">
					<label for="floatingPassword">Harga Tiket</label>
				</div>

				<div class="form-floating mb-3">
					<select class="form-select" id="ok" onChange="opsi(this)" name="tipe_tiket" value="<?= set_value('tipe_tiket') ?>" aria-label="Floating label select example">
						<option selected>Tipe Tiket</option>
						<option value="1">Paket Keluarga</option>
						<option value="2">TIket Biasa</option>
						<option value="3">Tiket Promo</option>
					</select>
					<label for="floatingSelect">Pilih Tipe Tiket</label>
				</div>
				<div class="form-floating mb-3">
					<input type="number" class="form-control" id="inputku" name="jumlah" value="<?= set_value('jumlah') ?>" id="floatingPassword" placeholder="Harga Tiket">
					<label for="floatingPassword">Jumlah Tike Promo / Paket Keluarga</label>
				</div>
				<div class="form-floating mb-3">
					<input type="number" class="form-control" name="stok" value="<?= set_value('stok') ?>" id="floatingPassword" placeholder="QTY Tiket">
					<label for="floatingPassword">QTY Tike</label>
				</div>
				<div class="form-floating mb-3">
					<input type="file" class="form-control" name="gambar" id="preview_gambar" placeholder="Gambar Tiket">
					<label for="preview_gambar">Gambar Tiket</label>
				</div>
				<div class="form-floating">
					<textarea class="form-control" name="deskripsi_tiket" placeholder="Deskripsi Tiket" id="floatingTextarea" style="height: 150px;"><?= set_value('deskripsi_tiket') ?></textarea>
					<label for="floatingTextarea">Deskripsi Tiket</label>
				</div>
			</div>
			<?php echo form_close() ?>
		</div>
	</div>
</div>