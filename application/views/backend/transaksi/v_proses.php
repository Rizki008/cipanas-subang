<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Accented Table</h6>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Tiket</th>
                            <th scope="col">Besar Promo</th>
                            <th scope="col">Tanggal Promo</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Metode Bayar</th>
                            <th scope="col">Status Bayar</th>
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
                                <td><?= $value->tgl_pemesanan ?></td>
                                <td><?= $value->tgl_booking ?></td>
                                <td>
                                    <?php if ($value->metode_bayar == 1) { ?>
                                        <span class="fa fa-success">Bayar Ditempat</span>
                                    <?php } elseif ($value->metode_bayar == 2) { ?>
                                        <span class="fa fa-warning">Transfer</span>
                                    <?php } ?>
                                </td>
                                <td>
                                    <?php if ($value->status_pemesanan == 0) { ?>
                                        <span class="fa fa-primary">Belum Bayar</span>
                                    <?php } elseif ($value->status_pemesanan == 1) { ?>
                                        <span class="fa fa-warning">Sudah Bayar</span>
                                    <?php } elseif ($value->status_pemesanan == 2) { ?>
                                        <span class="fa fa-success">Sudah Bayar</span>
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
        </div>
    </div>
</div>