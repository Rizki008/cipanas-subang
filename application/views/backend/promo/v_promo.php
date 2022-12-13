<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Data Promo</h6>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Tiket</th>
                            <th scope="col">Besar Promo</th>
                            <th scope="col">Tanggal Promo</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Setting</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($promo as $key => $value) { ?>
                            <tr>
                                <th scope="row"><?= $no++ ?></th>
                                <td><?= $value->nama_tiket ?></td>
                                <td><?= number_format($value->range, 0) ?>%</td>
                                <td><?= $value->tgl_promo ?></td>
                                <td><?= $value->ket ?></td>
                                <td>
                                    <a href="<?= base_url('promo/edit/' . $value->id_promo) ?>" class="btn btn-warning"><i class="fa fa-pencil-alt"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>