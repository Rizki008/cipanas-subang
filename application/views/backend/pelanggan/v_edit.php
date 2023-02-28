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

			echo form_open('user/update_wisatawan/' . $user->id_wisatawan) ?>
			<div class="bg-light rounded h-100 p-4">
				<h6 class="mb-4"><?= $title ?> &nbsp; <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-plus-circle"></i>Update Gratis Tiket</button></h6>
				<div class="form-floating mb-3">
					<input type="text" name="nama_wisatawan" value="<?= $user->nama_wisatawan ?>" class="form-control" id="floatingInput" placeholder="Nama User" readonly>
					<label for="floatingInput">Nama Wisatawan</label>
				</div>
				<div class="form-floating mb-3">
					<input type="text" class="form-control" name="alamat_detail" value="<?= $user->alamat_detail ?>" id="floatingPassword" placeholder="Username" readonly>
					<label for="floatingPassword">Alamat</label>
				</div>
				<div class="form-floating mb-3">
					<select class="form-select" id="floatingSelect" name="gratis_tiket" value="<?= $user->gratis_tiket ?>" aria-label="Floating label select example">
						<option selected value="<?= $user->id_wisatawan ?>"><?php if ($user->gratis_tiket == 1) { ?>
								<p>Gratis 1 Tiket</p>
							<?php } elseif ($user->gratis_tiket == 2) { ?>
								<p>Gratis 2 Tiket</p>
							<?php } elseif ($user->gratis_tiket == 3) { ?>
								<p>Gratis 3 Tiket</p>
							<?php } ?>
						</option>
						<option value="1">Gratis 1 Tiket</option>
						<option value="2">Gratis 2 Tiket</option>
						<option value="3">Gratis 3 Tiket</option>
					</select>
					<label for="floatingSelect">Pilih Level User</label>
				</div>
			</div>
			<?php echo form_close() ?>
		</div>
	</div>
</div>