<?php
get_header();
?>
<section class="garden-banner garden-banner-contact">
    <div data-aos="fade-up" data-aos-duration="1000" class="banner-wrap">
        <div class="container">
            <div class="content">
                <h1 class="text-white text-center mb-lg-4 mb-3">BGD Landscape - <span class="second-co">Liên hệ</span></h1>
            </div>
        </div>
    </div>
</section>
<section class="garden-contact__inf">
    <div class="container">
        <div class="wrap" data-aos="fade" data-aos-duration="1000">
            <div class="row gy-5">
                <div class="col-12 col-lg-5 text-center d-flex justify-content-center align-items-center mt-0 mt-lg-5">
                    <img style="object-fit:contain; max-width: 330px;" src="<?php bloginfo('template_directory') ?>/assets/images/Logo-lienhe.png" alt="logocontact">
                </div>
                <div class="col-12 col-lg-7 mt-2 mt-lg-5">
                    <h2 class="mb-4 fw-bold">CÔNG TY TNHH MTV BÌNH GARDEN</h2>
                    <a class="fw-bold text-dark" target="_blank" href="https://goo.gl/maps/nfEaYz9db3nS753n9"><i class="fas fa-map-marker-alt"></i> <span> Địa chỉ: 115 Phạm Cự Lượng, Tp Đà Nẵng
                        </span></a>
                    <a class="fw-bold text-dark" href="tel:0777148777"><i class="fas fa-phone-alt"></i> <span> Tel: 0777.148.777
                        </span></a>
                    <a class="fw-bold text-dark" href="mailto:Binhgarden@gmail.com"><i class="far fa-envelope"></i> <span> Email: Binhgarden@gmail.com </span></a>
                </div>
            </div>
        </div>

    </div>
</section>
<section class="garden-contact__form">
    <div class="container">
        <div class="wrap" data-aos="fade" data-aos-duration="1000">
            <div class="garden-contact__form">
                <div class="row">
                    <div class="col-12 col-md-7">
                        <?php echo do_shortcode('[contact-form-7 id="86" title="Form liên hệ 1"]') ?>
                    </div>
                    <div class="col-12 col-md-5">
                        <h5 class="fw-bold">Gửi tin nhắn cho chúng tôi</h5>
                        <p>Các bạn có thông tin cần liên hệ, hoặc cần hợp tác, các bạn có thể liên hệ qua Zalo,
                            Facebook, Fanpage hoặc để lại thông tin liên hệ ở đây, chúng tôi sẽ liên hệ lại ngay
                        </p>
                        <h5 class="fw-bold">BGD Landscape</h5>
                        <div class="icon d-flex">
                            <a target="_blank" href="<?php echo esc_html(get_theme_mod('html_facebook')); ?>"><img src="<?php bloginfo('template_url'); ?>/assets/images/fa-contact.png"></a>
                            <a href="#"><img src="<?php bloginfo('template_url'); ?>/assets/images/in-contact.png"></a>
                            <a href="#"><img src="<?php bloginfo('template_url'); ?>/assets/images/yt-contact.png"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="garden-contact__map d-flex">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15336.859139679698!2d108.2338696390339!3d16.05434031765112!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314219d6037136ff%3A0x7dc3633d8eab05d9!2zMTE1IFBo4bqhbSBD4buxIEzGsOG7o25nLCBBbiBI4bqjaSDEkMO0bmcsIFPGoW4gVHLDoCwgxJDDoCBO4bq1bmcgNTUwMDAwLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1655200169920!5m2!1svi!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>
<?php get_footer(); ?>