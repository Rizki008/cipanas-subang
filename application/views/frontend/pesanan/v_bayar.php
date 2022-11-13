<!--================Breadcrumb Area =================-->
<section class="breadcrumb_area">
    <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background=""></div>
    <div class="container">
        <div class="page-cover text-center">
            <h2 class="page-cover-tittle">Contact Us</h2>
            <ol class="breadcrumb">
                <li><a href="<?= base_url() ?>">Home</a></li>
                <li class="active">Contact Us</li>
            </ol>
        </div>
    </div>
</section>
<!--================Breadcrumb Area =================-->

<!--================Contact Area =================-->
<section class="contact_area section_gap">
    <div class="container">
        <!-- <div id="mapBox" class="mapBox" data-lat="40.701083" data-lon="-74.1522848" data-zoom="13" data-info="PO Box CT16122 Collins Street West, Victoria 8007, Australia." data-mlat="40.701083" data-mlon="-74.1522848">
        </div> -->
        <div class="row">
            <div class="col-md-3">
                <div class="contact_info">
                    <div class="info_item">
                        <i class="lnr lnr-home"></i>
                        <h6>California, United States</h6>
                        <p>Santa monica bullevard</p>
                    </div>
                    <div class="info_item">
                        <i class="lnr lnr-phone-handset"></i>
                        <h6><a href="#">00 (440) 9865 562</a></h6>
                        <p>Mon to Fri 9am to 6 pm</p>
                    </div>
                    <div class="info_item">
                        <i class="lnr lnr-envelope"></i>
                        <h6><a href="#">support@colorlib.com</a></h6>
                        <p>Send us your query anytime!</p>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <?php
                //notifikasi form kosong
                echo validation_errors('<div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-exclamation-triangle"></i>', '</h5></div>');

                //notifikasi gagal upload gambar
                if (isset($error_upload)) {
                    echo '<div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-exclamation-triangle"></i>' . $error_upload . '</h5></div>';
                }
                echo form_open_multipart('pemesanan/bayar/' . $pesanan->id_pemesanan) ?>
                <!-- <form class="row contact_form" action="<?= base_url('pembelian/cekout') ?>" method="post" id="contactForm" novalidate="novalidate"> -->
                <div class="col-md-6">
                    <div class="form-group">
                        <input class="form-control" name="atas_nama" type="text" />
                    </div><br>
                    <div class="form-group">
                        <input class="form-control" name="bukti_bayar" type="file" />
                    </div><br><br><br>
                </div>
                <div class="col-md-12 text-right">
                    <button type="submit" value="submit" class="btn theme_btn button_hover">Pesan Tiket</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!--================Contact Area =================-->