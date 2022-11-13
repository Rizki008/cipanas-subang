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
                if ($this->session->flashdata('pesan')) {
                    echo '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="fa fa-check text-success"></i>';
                    echo $this->session->flashdata('pesan');
                    echo '</h5></div>';
                }
                ?>
                <?php
                echo validation_errors('<div class="alert alert-warning alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>', '</div>');
                ?>
                <?php
                $id_pemesanan = date('Ymd') . strtoupper(random_string('alnum', 8)); ?>
                <form class="row contact_form" action="<?= base_url('pembelian/cekout') ?>" method="post" id="contactForm" novalidate="novalidate">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input class="form-control" name="tgl_booking" id="date" type="date" />
                        </div><br>
                        <div class="form-group">
                            <select class="wide form-control" name="metode_bayar">
                                <option data-display="Metode Pembayaran">---Metode Pembayaran---</option>
                                <option value="1">Bayar Ditempat</option>
                                <option value="2">Transfer</option>
                            </select>
                        </div><br><br><br>
                    </div>
                    <input name="id_pemesanan" value="<?= $id_pemesanan ?>" hidden>
                    <input name="total" value="<?php echo $this->cart->total() ?>" hidden>
                    <div class="col-md-12 text-right">
                        <?php
                        $i = 1;
                        foreach ($this->cart->contents() as $items) {
                            echo form_hidden('qty' . $i++, $items['qty']);
                        }
                        ?>
                        <button type="submit" value="submit" class="btn theme_btn button_hover">Pesan Tiket</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!--================Contact Area =================-->