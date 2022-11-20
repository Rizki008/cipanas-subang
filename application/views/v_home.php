<!--================Banner Area =================-->
<section class="banner_area">
    <div class="booking_table d_flex align-items-center">
        <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
        <div class="container">
            <div class="banner_content text-center">
                <h6>Menenangkan Diri</h6>
                <h2>Santai Pikiran Anda</h2>
                <p>Jika Anda Ingin Menenangkan Pikiran anda dan menghangatkan badan anda supaya lebih rileks datangkan kesini dengan biaya yang sangat murah</p>
                <!-- <a href="#" class="btn theme_btn button_hover">Get Started</a> -->
            </div>
        </div>
    </div>
</section>
<!--================Banner Area =================-->
<!--================ Accomodation Area  =================-->
<section class="accomodation_area section_gap">
    <div class="container">
        <div class="section_title text-center">
            <h2 class="title_color">Tiket Masuk Cipanas Subang</h2>
            <p>Dapatkan Promo pada tiket, Siapa cepat dia dapat</p>
        </div>


        <div class="row mb_30">
            <?php foreach ($tiket as $value) : ?>

                <div class="col-lg-3 col-sm-6">
                    <?php
                    echo form_open('pembelian/add');
                    echo form_hidden('redirect_page', str_replace('index.php/', '', current_url()));
                    ?>
                    <input type="hidden" name="id" value="<?= $value->id_tiket ?>">
                    <input type="hidden" name="name" value="<?= $value->nama_tiket ?>">
                    <input type="hidden" name="price" value="<?= $value->harga_tiket ?>">
                    <input type="hidden" name="type" value="<?= $value->tipe_tiket ?>">
                    <input type="hidden" name="qty" value="1">
                    <div class="accomodation_item text-center">
                        <div class="hotel_img">
                            <img src="<?= base_url('assets/tiket/' . $value->gambar) ?>" alt="">
                            <button type="submit" class="btn theme_btn button_hover">Beli Tiket</button>
                        </div>
                        <a href="#">
                            <h4 class="sec_h4"><?= $value->nama_tiket ?></h4>
                        </a>
                        <h5>Rp <?= number_format($value->harga_tiket), 0 ?>
                            <!-- <small>/night</small> -->
                        </h5>
                    </div>
                    <?php echo form_close() ?>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>
<!--================ Accomodation Area  =================-->

<!--================ Facilities Area  =================-->
<section class="facilities_area section_gap">
    <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background="">
    </div>
    <div class="container">
        <div class="section_title text-center">
            <h2 class="title_w">Pasilitas Cipanas Subang</h2>
            <p>Siapa yang sangat menyukai sistem ramah lingkungan.</p>
        </div>
        <div class="row mb_30">
            <div class="col-lg-4 col-md-6">
                <div class="facilities_item">
                    <h4 class="sec_h4"><i class="lnr lnr-dinner"></i>Tempat Makan</h4>
                    <p>Usage of the Internet is becoming more common due to rapid advancement of technology and power.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="facilities_item">
                    <h4 class="sec_h4"><i class="lnr lnr-bicycle"></i>Sports CLub</h4>
                    <p>Usage of the Internet is becoming more common due to rapid advancement of technology and power.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="facilities_item">
                    <h4 class="sec_h4"><i class="lnr lnr-shirt"></i>Swimming Pool</h4>
                    <p>Usage of the Internet is becoming more common due to rapid advancement of technology and power.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="facilities_item">
                    <h4 class="sec_h4"><i class="lnr lnr-car"></i>Rent a Car</h4>
                    <p>Usage of the Internet is becoming more common due to rapid advancement of technology and power.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="facilities_item">
                    <h4 class="sec_h4"><i class="lnr lnr-construction"></i>Gymnesium</h4>
                    <p>Usage of the Internet is becoming more common due to rapid advancement of technology and power.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="facilities_item">
                    <h4 class="sec_h4"><i class="lnr lnr-coffee-cup"></i>Bar</h4>
                    <p>Usage of the Internet is becoming more common due to rapid advancement of technology and power.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================ Facilities Area  =================-->

<!--================ Testimonial Area  =================-->
<section class="testimonial_area section_gap">
    <div class="container">
        <div class="section_title text-center">
            <h2 class="title_color">Ulasan Wisatawan</h2>
            <!-- <p>The French Revolution constituted for the conscience of the dominant aristocratic class a fall from </p> -->
        </div>
        <div class="testimonial_slider owl-carousel">
            <div class="media testimonial_item">
                <img class="rounded-circle" src="<?= base_url() ?>royal-master/image/testtimonial-1.jpg" alt="">
                <div class="media-body">
                    <p>As conscious traveling Paupers we must always be concerned about our dear Mother Earth. If you think about it, you travel across her face, and She is the </p>
                    <a href="#">
                        <h4 class="sec_h4">Fanny Spencer</h4>
                    </a>
                    <div class="star">
                        <a href="#"><i class="fa fa-star"></i></a>
                        <a href="#"><i class="fa fa-star"></i></a>
                        <a href="#"><i class="fa fa-star"></i></a>
                        <a href="#"><i class="fa fa-star"></i></a>
                        <a href="#"><i class="fa fa-star-half-o"></i></a>
                    </div>
                </div>
            </div>
            <div class="media testimonial_item">
                <img class="rounded-circle" src="<?= base_url() ?>royal-master/image/testtimonial-1.jpg" alt="">
                <div class="media-body">
                    <p>As conscious traveling Paupers we must always be concerned about our dear Mother Earth. If you think about it, you travel across her face, and She is the </p>
                    <a href="#">
                        <h4 class="sec_h4">Fanny Spencer</h4>
                    </a>
                    <div class="star">
                        <a href="#"><i class="fa fa-star"></i></a>
                        <a href="#"><i class="fa fa-star"></i></a>
                        <a href="#"><i class="fa fa-star"></i></a>
                        <a href="#"><i class="fa fa-star"></i></a>
                        <a href="#"><i class="fa fa-star-half-o"></i></a>
                    </div>
                </div>
            </div>
            <div class="media testimonial_item">
                <img class="rounded-circle" src="<?= base_url() ?>royal-master/image/testtimonial-1.jpg" alt="">
                <div class="media-body">
                    <p>As conscious traveling Paupers we must always be concerned about our dear Mother Earth. If you think about it, you travel across her face, and She is the </p>
                    <a href="#">
                        <h4 class="sec_h4">Fanny Spencer</h4>
                    </a>
                    <div class="star">
                        <a href="#"><i class="fa fa-star"></i></a>
                        <a href="#"><i class="fa fa-star"></i></a>
                        <a href="#"><i class="fa fa-star"></i></a>
                        <a href="#"><i class="fa fa-star"></i></a>
                        <a href="#"><i class="fa fa-star-half-o"></i></a>
                    </div>
                </div>
            </div>
            <div class="media testimonial_item">
                <img class="rounded-circle" src="<?= base_url() ?>royal-master/image/testtimonial-1.jpg" alt="">
                <div class="media-body">
                    <p>As conscious traveling Paupers we must always be concerned about our dear Mother Earth. If you think about it, you travel across her face, and She is the </p>
                    <a href="#">
                        <h4 class="sec_h4">Fanny Spencer</h4>
                    </a>
                    <div class="star">
                        <a href="#"><i class="fa fa-star"></i></a>
                        <a href="#"><i class="fa fa-star"></i></a>
                        <a href="#"><i class="fa fa-star"></i></a>
                        <a href="#"><i class="fa fa-star"></i></a>
                        <a href="#"><i class="fa fa-star-half-o"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================ Testimonial Area  =================-->