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

<!--================ About History Area  =================-->
<!-- <section class="about_history_area section_gap">
    <div class="container">
        <div class="row">
            <div class="col-md-6 d_flex align-items-center">
                <div class="about_content ">
                    <h2 class="title title_color">About Us <br>Our History<br>Mission & Vision</h2>
                    <p>inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards especially in the workplace. That’s why it’s crucial that, as women, our behavior on the job is beyond reproach. inappropriate behavior is often laughed.</p>
                    <a href="#" class="button_hover theme_btn_two">Request Custom Price</a>
                </div>
            </div>
            <div class="col-md-6">
                <img class="img-fluid" src="<?= base_url() ?>royal-master/image/about_bg.jpg" alt="img">
            </div>
        </div>
    </div>
</section> -->
<!--================ About History Area  =================-->

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

<!--================ Latest Blog Area  =================-->
<section class="latest_blog_area section_gap">
    <div class="container">
        <div class="section_title text-center">
            <h2 class="title_color">latest posts from blog</h2>
            <p>The French Revolution constituted for the conscience of the dominant aristocratic class a fall from </p>
        </div>
        <div class="row mb_30">
            <div class="col-lg-4 col-md-6">
                <div class="single-recent-blog-post">
                    <div class="thumb">
                        <img class="img-fluid" src="<?= base_url() ?>royal-master/image/blog/blog-1.jpg" alt="post">
                    </div>
                    <div class="details">
                        <div class="tags">
                            <a href="#" class="button_hover tag_btn">Travel</a>
                            <a href="#" class="button_hover tag_btn">Life Style</a>
                        </div>
                        <a href="#">
                            <h4 class="sec_h4">Low Cost Advertising</h4>
                        </a>
                        <p>Acres of Diamonds… you’ve read the famous story, or at least had it related to you. A farmer.</p>
                        <h6 class="date title_color">31st January,2018</h6>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-recent-blog-post">
                    <div class="thumb">
                        <img class="img-fluid" src="<?= base_url() ?>royal-master/image/blog/blog-2.jpg" alt="post">
                    </div>
                    <div class="details">
                        <div class="tags">
                            <a href="#" class="button_hover tag_btn">Travel</a>
                            <a href="#" class="button_hover tag_btn">Life Style</a>
                        </div>
                        <a href="#">
                            <h4 class="sec_h4">Creative Outdoor Ads</h4>
                        </a>
                        <p>Self-doubt and fear interfere with our ability to achieve or set goals. Self-doubt and fear are</p>
                        <h6 class="date title_color">31st January,2018</h6>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-recent-blog-post">
                    <div class="thumb">
                        <img class="img-fluid" src="<?= base_url() ?>royal-master/image/blog/blog-3.jpg" alt="post">
                    </div>
                    <div class="details">
                        <div class="tags">
                            <a href="#" class="button_hover tag_btn">Travel</a>
                            <a href="#" class="button_hover tag_btn">Life Style</a>
                        </div>
                        <a href="#">
                            <h4 class="sec_h4">It S Classified How To Utilize Free</h4>
                        </a>
                        <p>Why do you want to motivate yourself? Actually, just answering that question fully can </p>
                        <h6 class="date title_color">31st January,2018</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================ Recent Area  =================-->