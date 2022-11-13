<!--================Breadcrumb Area =================-->
<section class="breadcrumb_area blog_banner_two">
    <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background=""></div>
    <div class="container">
        <div class="page-cover text-center">
            <h2 class="page-cover-tittle f_48">Elements</h2>
            <ol class="breadcrumb">
                <li><a href="index.html">Home</a></li>
                <li class="active">Elements</li>
            </ol>
        </div>
    </div>
</section>
<!--================Breadcrumb Area =================-->

<!-- Start Align Area -->
<div class="whole-wrap">
    <div class="container">
        <div class="section-top-border">
            <h3 class="mb-30 title_color">Table</h3>
            <div class="progress-table-wrap">
                <?php echo form_open('pembelian/update') ?>
                <div class="progress-table">
                    <div class="table-head">
                        <div class="serial">#</div>
                        <div class="country">Nama Tiket</div>
                        <div class="visit">Harga Tiket</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <div class="percentage">Tipe Tiket</div>
                        <div class="percentage">Jumlah Tiket</div>
                        <div class="percentage">Total Harga Tiket</div>
                        <div class="percentage">Action</div>
                    </div>
                    <?php $i = 1; ?>
                    <?php $total_berat = 0;
                    $total = 0;
                    $no = 1;
                    foreach ($this->cart->contents() as $items) {
                    ?>
                        <div class="table-row">
                            <div class="serial"><?= $no++ ?></div>
                            <div class="country"> <?php echo $items['name'] ?></div>
                            <div class="visit">Rp. <?= number_format($items['price'], 0); ?></div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <div class="percentage"><?= $items['type'] ?></div>
                            <div class="percentage"><?php echo form_input(
                                                        array(
                                                            'name' => $i . '[qty]',
                                                            'value' => $items['qty'],
                                                            'maxlength' => '3',
                                                            'min' => '0',
                                                            'max' => 'stock',
                                                            'size' => '5',
                                                            'type' => 'number',
                                                            'class' => 'form-control'
                                                        )
                                                    ); ?>
                            </div>
                            <div class="percentage">
                                Rp. <?= number_format($items['subtotal'], 0); ?>
                            </div>
                            <div class="percentage">
                                <a href="<?= base_url('pembelian/delete/') . $items['rowid'] ?>" class="btn btn-danger btn-sm">Hapus</a>&nbsp;
                                <button type="submit" class="btn btn-warning btn-sm">Update</button>
                            </div>
                        </div>
                        <?php $i++; ?>
                    <?php } ?>
                </div>
                <a class="btn btn-primary btn-sm" href="<?= base_url('pembelian/cekout') ?>">Proses Pembelian</a>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>
</div>
<!-- End Align Area -->