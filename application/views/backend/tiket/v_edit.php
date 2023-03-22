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

			echo form_open_multipart('tiket/edit/' . $tiket->id_tiket) ?>
			<div class="bg-light rounded h-100 p-4">
				<h6 class="mb-4"><?= $title ?> &nbsp; <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-plus-circle"></i>Tambah Tiket</button></h6>
				<div class="form-floating mb-3">
					<input type="text" name="nama_tiket" value="<?= $tiket->nama_tiket ?>" class="form-control" id="floatingInput" placeholder="Nama Tiket">
					<label for="floatingInput">Nama Tiket</label>
				</div>
				<div class="form-floating mb-3">
					<input type="number" class="form-control" name="harga_tiket" value="<?= $tiket->harga_tiket ?>" id="floatingPassword" placeholder="Harga Tiket">
					<label for="floatingPassword">Harga Tiket</label>
				</div>
				<div class="form-floating mb-3">
					<select class="form-select" id="floatingSelect" name="tipe_tiket" value="<?= $tiket->tipe_tiket ?>" aria-label="Floating label select example">
						<option selected value="<?= $tiket->id_tiket ?>"><?= $tiket->tipe_tiket ?></option>
						<option selected>Tipe Tiket</option>
						<option value="1">Paket Keluarga</option>
						<option value="2">TIket Biasa</option>
					</select>
					<label for="floatingSelect">Pilih Tipe Tiket</label>
				</div>
				<div class="form-floating mb-3">
					<input type="number" class="form-control" name="jumlah" value="<?= $tiket->jumlah ?>" id="floatingPassword" placeholder="Jumlah Paket Tiket Keluarga">
					<label for="floatingPassword">Jumlah Tiket Keluarga</label>
				</div>
				<div class="form-floating mb-3">
					<input type="file" class="form-control" name="gambar" id="preview_gambar" placeholder="Gambar Tiket">
					<label for="preview_gambar">Gambar Tiket</label>
				</div>
				<div class="form-floating mb-3">
					<img src="<?= base_url('assets/tiket/' . $tiket->gambar) ?>" id="gambar_load" width="400px">
				</div>
				<div class="form-floating">
					<textarea class="form-control" name="deskripsi_tiket" placeholder="Deskripsi Tiket" id="floatingTextarea" style="height: 150px;"><?= $tiket->deskripsi_tiket ?></textarea>
					<label for="floatingTextarea">Deskripsi Tiket</label>
				</div>
			</div>
			<?php echo form_close() ?>
		</div>
	</div>
</div>