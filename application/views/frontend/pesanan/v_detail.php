<!--================Breadcrumb Area =================-->
<section class="breadcrumb_area blog_banner_two">
    <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background=""></div>
    <div class="container">
        <div class="page-cover text-center">
            <h2 class="page-cover-tittle f_48"><?= $title ?></h2>
            <ol class="breadcrumb">
                <li><a href="<?= base_url() ?>">Home</a></li>
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
                        <div class="country">No Order</div>&nbsp;&nbsp;
                        <div class="visit">Nama Tiket</div>
                        <div class="visit">Harga Tiket</div>
                        <div class="percentage">Tanggal Pemesanan</div>
                        <div class="percentage">Tanggal Booking</div>
                        <div class="percentage">Jumlah Tiket</div>
                        <div class="percentage">Action</div>
                    </div>
                    <?php $no = 1;
                    foreach ($detail as $key => $value) { ?>
                        <div class="table-row">
                            <div class="serial"><?= $no++ ?></div>
                            <div class="country"> <?= $value->id_pemesanan ?></div>&nbsp;&nbsp;
                            <div class="visit"><?= $value->nama_tiket ?></div>
                            <div class="visit">Rp. <?= number_format($value->harga_tiket, 0); ?></div>
                            <div class="percentage"><?= $value->tgl_pemesanan ?></div>
                            <div class="percentage"><?= $value->tgl_booking ?></div>
                            <div class="percentage"><?= $value->qty ?></div>
                            <div class="percentage">
                                <a href="<?= base_url('pemesanan') ?>" class="btn btn-sm btn-flat btn-warning">Kembali</a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Align Area -->