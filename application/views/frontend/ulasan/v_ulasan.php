<!--================Breadcrumb Area =================-->
<section class="breadcrumb_area blog_banner_two">
    <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background=""></div>
    <div class="container">
        <div class="page-cover text-center">
            <h2 class="page-cover-tittle f_48"><?= $title ?></h2>
            <ol class="breadcrumb">
                <li><a href="<?= base_url() ?>">Beranda</a></li>
                <li class="active"><?= $title ?></li>
            </ol>
        </div>
    </div>
</section>
<!--================Breadcrumb Area =================-->

<!-- Start Align Area -->
<div class="whole-wrap">
    <div class="container">
        <div class="section-top-border">
            <h3 class="mb-30 title_color"><?= $title ?></h3>
            <div class="progress-table-wrap">
                <div class="progress-table">
                    <div class="table-head">
                        <div class="serial">#</div>
                        <div class="visit">Nama Tiket</div>
                        <div class="country">Harga Tiket</div>
                        <div class="percentage">Tanggal pemesanan</div>
                        <div class="percentage">Ulasan</div>
                    </div>
                    <?php $no = 1;
                    foreach ($ulasan as $key => $value) { ?>
                        <div class="table-row">
                            <div class="serial"><?= $no++ ?></div>
                            <div class="visit"><?= $value->nama_tiket ?></div>
                            <div class="country">Rp. <?= number_format($value->harga_tiket, 0); ?></div>
                            <div class="percentage"><?= $value->tgl_booking ?></div>
                            <div class="percentage">
                                <?php if ($value->status_ulasan == 0) { ?>
                                    <?php echo form_open('pemesanan/rating/' . $value->id_pemesanan) ?>
                                    <input type="hidden" name="id_ulasan" value="<?= $value->id_ulasan ?>">
                                    <input class="rating-input" type="text" name="rating" title="" />
                                    <input class="form-control" name="isi_ulasan" type="text" />
                                    <button type="submit" class="btn btn-sm btn-flat btn-warning">Ulasan</button>
                                    <?php echo form_close() ?>
                                <?php } elseif ($value->status_ulasan == 1) { ?>
                                    <span class="badge badge-success">Ulasan Berhasil, Terimakasih.</span>
                                <?php } ?>

                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Align Area -->