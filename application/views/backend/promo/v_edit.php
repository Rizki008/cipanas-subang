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

            echo form_open('promo/edit/' . $promo->id_promo) ?>
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4"><?= $title ?> &nbsp; <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-plus-circle"></i>Update Promo</button></h6>
                <div class="form-floating mb-3">
                    <input type="text" name="nama_tiket" value="<?= $promo->nama_tiket ?>" class="form-control" id="floatingInput" readonly>
                    <label for="floatingInput">Nama Tiket</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="number" class="form-control" name="range" value="<?= $promo->range ?>" id="floatingPassword" required>
                    <label for="floatingPassword">Besar Promo%</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="date" class="form-control" name="tgl_promo" value="<?= $promo->tgl_promo ?>" id="floatingPassword" required>
                    <label for="floatingPassword">Tanggal Promo</label>
                </div>
                <div class="form-floating">
                    <textarea class="form-control" name="ket" placeholder="Deskripsi Promo" id="floatingTextarea" style="height: 150px;"><?= $promo->ket ?></textarea>
                    <label for="floatingTextarea">Deskripsi Promo</label>
                </div>
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
</div>