<!-- Form Start -->
<div class="container-fluid pt-4 px-4">
	<div class="row g-4">
		<div class="col-sm-12 col-xl-6">
			<div class="bg-light rounded h-100 p-4">
				<h6 class="mb-4">Laporan Harian</h6>
				<?php
				echo form_open('laporan/lap_hari') ?>
				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
							<label>Tanggal</label>
							<select name="tanggal" class="form-control">
								<?php
								$mulai = 1;
								for ($i = $mulai; $i < $mulai + 31; $i++) {
									$sel = $i == date('Y') ? 'selected="selected"' : '';
									echo '<option value="' . $i . '"' . $sel . '>' . $i . '</option>';
								}
								?>
							</select>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label>Bulan</label>
							<select name="bulan" class="form-control">
								<?php
								$mulai = 1;
								for ($i = $mulai; $i < $mulai + 12; $i++) {
									$sel = $i == date('Y') ? 'selected="selected"' : '';
									echo '<option value="' . $i . '"' . $sel . '>' . $i . '</option>';
								}
								?>
							</select>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label>Tahun</label>
							<select name="tahun" class="form-control">
								<?php
								$mulai = date('Y') - 1;
								for ($i = $mulai; $i < $mulai + 10; $i++) {
									$sel = $i == date('Y') ? 'selected="selected"' : '';
									echo '<option value="' . $i . '"' . $sel . '>' . $i . '</option>';
								}
								?>
							</select>
						</div>
					</div>
					<div class="col-sm-12">
						<div class="form-group">
							<button type="submit" class="btn btn-primary btn-block"><i class="fa fa-print"></i> Cetak Laporan</button>
						</div>
					</div>
				</div>
				<?php
				echo form_close() ?>
			</div>
			<!-- /.card-body -->
		</div>


		<div class="col-sm-12 col-xl-6">
			<div class="bg-light rounded h-100 p-4">
				<h6 class="mb-4">Laporan Bulanan</h6>
				<?php
				echo form_open('laporan/lap_bulan') ?>
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label>Bulan</label>
							<select name="bulan" class="form-control">
								<?php
								$mulai = 1;
								for ($i = $mulai; $i < $mulai + 12; $i++) {
									$sel = $i == date('Y') ? 'selected="selected"' : '';
									echo '<option value="' . $i . '"' . $sel . '>' . $i . '</option>';
								}
								?>
							</select>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label>Tahun</label>
							<select name="tahun" class="form-control">
								<?php
								$mulai = date('Y') - 1;
								for ($i = $mulai; $i < $mulai + 10; $i++) {
									$sel = $i == date('Y') ? 'selected="selected"' : '';
									echo '<option value="' . $i . '"' . $sel . '>' . $i . '</option>';
								}
								?>
							</select>
						</div>
					</div>
					<div class="col-sm-12">
						<div class="form-group">
							<button type="submit" class="btn btn-primary btn-block"><i class="fa fa-print"></i> Cetak Laporan</button>
						</div>
					</div>
				</div>
				<?php
				echo form_close() ?>
			</div>
			<!-- /.card-body -->
		</div>

		<div class="col-sm-12 col-xl-6">
			<div class="bg-light rounded h-100 p-4">
				<h6 class="mb-4">Laporan Tahunan</h6>
				<?php
				echo form_open('laporan/lap_tahun') ?>
				<div class="row">
					<div class="col-sm-12">
						<div class="form-group">
							<label>Tahun</label>
							<select name="tahun" class="form-control">
								<?php
								$mulai = date('Y') - 1;
								for ($i = $mulai; $i < $mulai + 10; $i++) {
									$sel = $i == date('Y') ? 'selected="selected"' : '';
									echo '<option value="' . $i . '"' . $sel . '>' . $i . '</option>';
								}
								?>
							</select>
						</div>
					</div>
					<div class="col-sm-12">
						<div class="form-group">
							<button type="submit" class="btn btn-primary btn-block"><i class="fa fa-print"></i> Cetak Laporan</button>
						</div>
					</div>
				</div>
				<?php
				echo form_close() ?>
			</div>
			<!-- /.card-body -->
		</div>
	</div>
</div>