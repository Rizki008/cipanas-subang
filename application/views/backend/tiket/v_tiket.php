<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Accented Table</h6><a href="<?= base_url('tiket/add') ?>" class="btn btn-primary"> <i class="fa fa-plus"></i>Tambah Tiket</a>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Tiket</th>
                            <th scope="col">Harga Tiket</th>
                            <th scope="col">TIpe TIket</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Setting</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($tiket as $key => $value) { ?>
                            <tr>
                                <th scope="row"><?= $no++ ?></th>
                                <td><?= $value->nama_tiket ?></td>
                                <td>Rp.<?= number_format($value->harga_tiket, 0) ?></td>
                                <td><?= $value->tipe_tiket ?></td>
                                <td><?= $value->deskripsi_tiket ?></td>
                                <td>
                                    <a href="<?= base_url('tiket/edit/' . $value->id_tiket) ?>" class="btn btn-warning"><i class="fa fa-pencil-alt"></i></a>
                                    <a href="<?= base_url('tiket/hapus/' . $value->id_tiket) ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>