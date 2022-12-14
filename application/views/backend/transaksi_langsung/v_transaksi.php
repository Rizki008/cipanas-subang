<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-6">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title"><?= $title ?></div>
                    <!-- <div class="ibox-tools">
                        <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                        <a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                        </div>
                    </div> -->
                </div>
                <div class="ibox-body">
                    <div class="row">
                        <form action="<?= base_url('transaksi/pesan') ?>" method="POST">
                            <div class="card-body">
                                <input type="hidden" name="id" class="id_tiket">
                                <input type="hidden" name="name" class="name">
                                <input type="hidden" name="price" class="price">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama Produk</label>
                                    <select name="id" id="pesan_produk" class="form-control">
                                        <option>---Pilih Produk---</option>
                                        <?php foreach ($produk as $key => $value) { ?>
                                            <option value="<?= $value->id_tiket ?>" data-name=<?= $value->nama_tiket ?> data-price=<?= $value->harga_tiket ?>><?= $value->nama_tiket ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Qty</label>
                                    <input type="number" name="qty" class="form-control" id="exampleInputPassword1" placeholder="Qty">
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-sm-12 col-xl-12">
                    <div class="ibox">
                        <div class="ibox-head">
                            <div class="ibox-title">Data Belanja</div>
                        </div>
                        <div class="ibox-body">
                            <form class="forms-sample" action="<?= base_url('transaksi/checkout') ?>" method="POST">
                                <?php
                                $i = 1;
                                // $j = 1;
                                foreach ($this->cart->contents() as $items) {
                                    echo form_hidden('qty' . $i++, $items['qty']);
                                    // echo form_hidden('dosis' . $j++, $items['dosis']);
                                }
                                $no_jual = date('Ymd') .  random_int(100, 9999);
                                ?>
                                <input type="hidden" name="no_jual" value="<?= $no_jual ?>">
                                <input name="total_harga" value="<?php echo $this->cart->total() ?>" hidden>
                                <div class="table-responsive">
                                    <table class="table center-aligned-table">
                                        <thead>
                                            <tr class="text-primary">
                                                <th>Nama Tiket</th>
                                                <th>Qty</th>
                                                <th>Harga</th>
                                                <th>Total Harga</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($this->cart->contents() as $key => $value) {
                                            ?>
                                                <tr class="">
                                                    <td><?= $value['name'] ?></td>
                                                    <td><?= $value['qty'] ?></td>
                                                    <td>Rp. <?= number_format($value['price']) ?></td>
                                                    <td>Rp. <?= number_format($value['subtotal']); ?></td>
                                                    <td><a class="btn btn-danger" href="<?= base_url('transaksi/delete/' . $value['rowid']) ?>"><i class="fa fa-trash"></i></a></td>
                                                </tr>
                                            <?php } ?>
                                            <tr>
                                                <td> <strong>Total Belanja</strong></td>
                                                <td></td>
                                                <td></td>
                                                <td>: <h5 class="font-bold">Rp <?php echo $this->cart->format_number($this->cart->total(), 0) ?></h5>
                                                </td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <?php
                                    $i = 1;
                                    foreach ($this->cart->contents() as $items) {
                                        echo form_hidden('qty' . $i++, $items['qty']);
                                    }
                                    ?>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Cekout Belanja</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-6">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Data Belanja</div>
                </div>
                <div class="ibox-body">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" href="#tab-1-1" data-toggle="tab"><i class="fa fa-line-chart"></i> Belanja</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="#tab-1-2" data-toggle="tab"><i class="fa fa-heartbeat"></i> Selesai</a>
                        </li> -->
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tab-1-1">
                            <div class="ibox-body">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>No Belanja</th>
                                            <th>Tanggal Belanja</th>
                                            <!-- <th>Jumlah</th> -->
                                            <th>Total Bayar</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($pesanan_langsung as $key => $value) { ?>
                                            <tr>
                                                <td><?= $value->no_jual ?></td>
                                                <td><?= $value->tgl_beli ?></td>
                                                <!-- <td><?= $value->qty ?></td> -->
                                                <td><b>Rp. <?= number_format($value->total_harga, 0) ?></b>
                                                <td>
                                                    <?php if ($value->status_beli == 0) { ?>
                                                        <button class="btn btn-sm btn-success btn-flat" data-toggle="modal" data-target="#cek<?= $value->id_pesan ?>">Bayar</button>
                                                        <!-- <a href=" <?= base_url('admin/proses/' . $value->id_pesan) ?>" class="btn btn-sm btn-flat btn-primary">Verifikasi</a> -->
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div><br>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-xl-6">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Data Belanja Selsai</div>
                </div>
                <div class="ibox-body">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" href="#tab-1-1" data-toggle="tab"><i class="fa fa-line-chart"></i> Belanja</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="#tab-1-2" data-toggle="tab"><i class="fa fa-heartbeat"></i> Selesai</a>
                        </li> -->
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tab-1-1">
                            <div class="ibox-body">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>No Belanja</th>
                                            <th>Tanggal Belanja</th>
                                            <th>Total Bayar</th>
                                            <!-- <th>Total Kembalian</th> -->
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($pesanan_langsung_selesai as $key => $value) { ?>
                                            <tr>
                                                <td><?= $value->no_jual ?></td>
                                                <td><?= $value->tgl_beli ?></td>
                                                <td>Rp. <?= number_format($value->total_harga, 0) ?></td>
                                                <!-- <td><b class="bold"><span class="badge badge-warning bold">Rp.<?= number_format($value->total_harga - $value->jumlah_bayar, 0) ?></span> </b> -->
                                                <td>
                                                    <?php if ($value->status_beli == 1) { ?>
                                                        <span class="badge badge-success">Selesai</span>
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
            </div>
        </div>
    </div>
</div>
<div class="page-content fade-in-up">
    <div class="row">

    </div>
</div>

<?php foreach ($pesanan_langsung as $key => $value) { ?>
    <div class="modal fade" id="cek<?= $value->id_pesan ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?= $value->no_jual ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo form_open('transaksi/bayar/' . $value->id_pesan) ?>
                    <table class="table">
                        <!-- <tr>
                            <th>Total Bayar</th>
                            <th>:</th>
                            <td> Rp. <?= number_format($value->total_harga, 0) ?></td>
                        </tr> -->
                        <tr>
                            <th>Jumlah Bayar</th>
                            <th>:</th>
                            <td><input name="Jumlah_bayar" type="number" class="form-control" placeholder="Jumlah bayar" required></td>
                        </tr>
                        <!-- <tr>
                            <th>Total Kembalian</th>
                            <th>:</th>
                            <td> -->
                        <!-- <span class="kembalian"></span> -->
                        <!-- <?= number_format($value->total_harga - $value->jumlah_bayar, 0) ?> -->
                        <!-- <input type="text" id="txt3" class="form-control" placeholder="Jumlah bayar" readonly> -->
                        <!-- </td> -->
                        <!--  -->
                        <!-- </tr> -->
                    </table>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Proses</button>
                </div>
                <?php echo form_close() ?>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php } ?>