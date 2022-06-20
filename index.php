<?php /* Template Name: Trang chủ */ ?>

<?php get_header(); ?>
<main>
    <section class="garden-banner">
        <div data-aos="fade-up" data-aos-duration="1000" class="banner-wrap">
            <div class="container">
                <div class="content">
                    <h1 class="text-white text-uppercase text-center mb-lg-4 mb-3">BGD Landscape - Thiết kế và thi công cảnh quan</h1>
                    <div class="button-group d-flex align-items-center justify-content-center">
                        <a href="<?php echo get_home_url(); ?>/gioi-thieu">
                            <button class="btn btn-cus btn-cus--white me-lg-5 me-4">
                                Giới thiệu
                            </button>
                        </a>
                        <a href="<?php echo get_home_url(); ?>/danh-muc-dich-vu/villa-cao-cap/">
                            <button class="btn btn-cus btn-cus--green">
                                Dịch vụ
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="garden-about">
        <div class="container">
            <div data-aos="fade-up" data-aos-duration="1000" class="garden-about__tags"> 
                <?php get_template_part('templates/block/bussiness', 'slogans'); ?>
            </div>
            <div class="garden-about__info">
                <div class="row">
                    <div class="col-md-6">
                        <div data-aos="fade-up-right" data-aos-duration="1000" class="video-wraper">
                            <!-- <a href="#">
                                <img src="<?php echo get_template_directory_uri() ?>/assets/images/Video-thumb.jpg" alt="">
                            </a> -->
                            <a data-fancybox data-src="https://www.youtube.com/watch?v=sy53yG1O93c" data-caption="Câu chuyện ngắn về chúng tôi">
                                <img style="cursor: pointer;" src="<?php echo get_template_directory_uri() ?>/assets/images/Video-thumb.jpg" />
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div data-aos="fade-up-left" data-aos-duration="1000" class="wraper d-flex flex-column justify-content-center h-100">
                            <div class="section-title mt-lg-0 mt-4 mb-lg-4 mb-3">
                                <p class="section-title__desc">Câu chuyện ngắn về chúng tôi</p>
                                <h2 class="section-title__name mb-0">GIẢI PHÁP CẢNH QUAN - BGD Landscape</h2>
                            </div>
                            <div class="section-content">
                                <p class="mb-lg-5 mb-4">Không gian xanh là 1 phần không thể thiếu trong 1 kiến trúc hoàn hảo. Nhận thức được điều đó, chúng tôi ra đời với sứ mệnh gắn liền không gian xanh vào cuộc sống của bạn theo 1 cách tự nhiên và tinh tế nhất
                                    Với sự hiện đại, sáng tạo trong sản phẩm, kết hợp cùng với các kỹ thuật làm vườn tiên tiến. Hiện nay chúng tôi là đối tác số 1 của nhiều đơn vị tư vấn thiết kế kiến trúc, xây dựng hàng đầu trên địa bàn Đà Nẵng, có thể kể đến các đơn vị như Wonder, Rom Architech, Hoàng Nhật Anh, Hải Âu, AZ -ART, Live Green, Sun Architech…….. và rất nhiều khách hàng thân thiết khác.
                                </p>
                                <a href="<?php echo get_home_url(); ?>/gioi-thieu">
                                    <button class="btn btn-cus">
                                        Tìm hiểu thêm <i class="ms-2 far fa-arrow-right"></i>
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="garden-products">
        <div class="container">
            <div class="garden-products-wrap position-relative">
                <div data-aos="fade-right" data-aos-duration="1000" class="section-title">
                    <p class="section-title__desc">Danh mục dịch vụ của chúng tôi</p>
                    <h2 class="section-title__name">Sản phẩm và dịch vụ của BGD Landscape<h2>
                </div>
                <div data-aos="fade-up" data-aos-duration="1000" class="garden-products__tabs">
                    <div class="row gx-lg-3 gx-2">
                        <div class="col-12 d-lg-none mb-res-terms mb-3">
                        <div class="nav flex-column nav-pills w-100 ">
                            <?php
                                    $taxonomies = array('danh-muc-dich-vu');
                                    $args = array(
                                        'orderby'           => 'include',
                                        // 'order'             => 'DESC',
                                        'number' => 8,
                                        'parent' => 0,
                                        'hide_empty'        => false,
                                        'hierarchical'      => true,
                                        'include' => [11, 12, 13, 14, 15, 16, 17, 18],
                                    );
                                    $terms = get_terms($taxonomies, $args);
                                    foreach ($terms as $key => $term) {
                                        ?>
                                            </li>

                                      <button class="nav-link text-start <?php echo !$key ? 'active' : '' ?>" data-bs-toggle="pill" data-bs-target="#<?php echo  $term->slug ?>" aria-selected="true"><?php echo  $term->name ?></button>
                                        <?php
                                    }
                                    ?>
                        </div>
                        </div>
                        <div class="col-3 d-lg-block d-none">
                            <div class="d-flex align-items-start">
                                <div class="nav flex-column nav-pills w-100 ">
                                    <?php
                                    $taxonomies = array('danh-muc-dich-vu');
                                    $args = array(
                                        'orderby'           => 'include',
                                        // 'order'             => 'DESC',
                                        'number' => 8,
                                        'parent' => 0,
                                        'hide_empty'        => false,
                                        'hierarchical'      => true,
                                        'include' => [11, 12, 13, 14, 15, 16, 17, 18],
                                    );
                                    $terms = get_terms($taxonomies, $args);
                                    foreach ($terms as $key => $term) {
                                    ?>
                                        <button class="nav-link text-start <?php echo !$key ? 'active' : '' ?>" data-bs-toggle="pill" data-bs-target="#<?php echo  $term->slug ?>" aria-selected="true"><?php echo  $term->name ?></button>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9 col-12">
                            <div class="tab-content h-100">
                                <?php foreach ($terms as $key => $term) { ?>
                                    <div class="tab-pane h-100 fade show <?php echo !$key ? 'active' : '' ?>" id="<?php echo  $term->slug ?>">
                                        <div class="owl-carousel h-100" data-autoheight="true" data-desktop="3" data-desktop-small="3" data-tablet="2" data-mobile="1" data-nav="true" data-dots="false" data-loop="true" data-autoplay="true" data-speed="500" data-autotime="4000">
                                            <?php
                                            $taxonomy_name = 'danh-muc-dich-vu';
                                            $termchildren = get_term_children($term->term_id, $taxonomy_name);
                                            foreach ($termchildren as $child_id) {
                                                $term = get_term_by('id', $child_id, $taxonomy_name);
                                            ?>
                                                <div class="owl-carousel-item">
                                                    <div class="product-item product-item-img">
                                                        <a href="<?php echo get_term_link($child_id, $taxonomy_name) ?>">
                                                            <div class="img">
                                                                <img class="w-100" src="<?php echo get_field('cate_thumb', 'danh-muc-dich-vu_' . $child_id); ?>">
                                                            </div>
                                                        </a>
                                                        <div class="info">
                                                            <a href="<?php echo get_term_link($child_id, $taxonomy_name) ?>">
                                                                <h5 class="line-1" title="<?php echo $term->name ?>"><?php echo $term->name ?></h5>
                                                            </a>
                                                            <p style="height : 50px;" class="line-2"><?php echo wp_strip_all_tags(get_field('desc_tax', 'danh-muc-dich-vu_' . $child_id)) ?></p>
                                                            <a href="<?php echo get_term_link($child_id, $taxonomy_name) ?>" class="see-more">Xem thêm <i class="fas fa-chevron-double-right ms-2 "></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>

                                    </div>

                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="garden-banner garden-banner-second">
        <div data-aos="fade-up" data-aos-duration="1000" class="banner-wrap">
            <div class="container">
                <div class="content">
                    <h1 class="text-white text-center mb-lg-4 mb-3">GIẢI PHÁP CẢNH QUAN - BGD Landscape</h1>
                    <p class="text-white text-center mb-lg-5 mb-4">There are many variations of passages of Lorem Ipsum available, in but the majority have suffered alteration in some form, by injected humour, randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipto be sure there isn't anything embarrassing hidden in the middle this the first true generator on the ternet. It uses a dictionary of over humour, orc words etc.</p>
                    <div class="button-group d-flex align-items-center justify-content-center">
                        <a href="<?php echo get_home_url(); ?>/gioi-thieu">
                            <button class="btn btn-cus btn-cus--white ">
                                Tìm hiểu thêm <i class="ms-2 far fa-arrow-right"></i>
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="garden-projects">
        <div class="container">
            <div data-aos="fade-right" data-aos-duration="1000" class="section-title">
                <p class="section-title__desc">Dự án nổi bật của chúng tôi</p>
                <div class="d-flex justify-content-between">
                    <h2 class="section-title__name">DỰ ÁN CỦA CHÚNG TÔI<h2>
                            <a class="see-more fs-6" href="<?php echo get_home_url(); ?>/danh-muc-du-an/du-an-thi-cong/">Tìm hiểu thêm <i class="ms-2 far fa-arrow-right"></i></a>
                </div>
            </div>
            <ul class="nav nav-pills mb-4" data-aos="fade-up" data-aos-duration="1000">
                <li>
                    <button class="nav-link active me-lg-4 me-3" data-bs-toggle="tab" data-bs-target="#thicong">Dự án thi công</button>
                </li>
                <li>
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#thietke">Dự án thiết kế</button>
                </li>
            </ul>
            <div class="tab-content h-100" data-aos="fade-up" data-aos-duration="1000">
                <div class="tab-pane fade show active" id="thicong">
                    <div class="garden-projects__gallery">
                        <div class="grid-container">
                            <?php
                            $args = array(
                                'post_type'         => 'du-an',
                                'orderby'           => 'name',
                                'order'             => 'ASC',
                                'posts_per_page'     => 6,
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'danh-muc-du-an',
                                        'field' => 'slug',
                                        'terms' =>  'du-an-thi-cong'
                                    )
                                )
                            );
                            $wp_query = new WP_Query($args);
                            $indx = 1;
                            ?>
                            <?php if ($wp_query->have_posts()) while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
                                <div class="item item<?php echo $indx; ?>">
                                    <a href="<?php the_permalink(); ?>">
                                        <div class="img">
                                            <img class="w-100" src="<?php the_post_thumbnail_url(); ?>">
                                            <span class="text-detail"><?php echo the_title(); ?></span>
                                        </div>
                                    </a>
                                </div>
                                <?php $indx++; ?>
                            <?php endwhile; ?>
                            <?php wp_reset_postdata(); ?>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="thietke">
                    <div class="garden-projects__gallery">
                        <div class="grid-container">
                            <?php
                            $args = array(
                                'post_type'         => 'du-an',
                                'orderby'           => 'name',
                                'order'             => 'ASC',
                                'posts_per_page'     => 6,
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'danh-muc-du-an',
                                        'field' => 'slug',
                                        'terms' =>  'du-an-thiet-ke'
                                    )
                                )
                            );
                            $wp_query = new WP_Query($args);
                            $indx = 1;
                            ?>
                            <?php if ($wp_query->have_posts()) while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
                                <div class="item item<?php echo $indx; ?>">
                                    <a href="<?php the_permalink(); ?>">
                                        <div class="img">
                                            <img class="w-100" src="<?php the_post_thumbnail_url(); ?>">
                                            <span class="text-detail"><?php echo the_title(); ?></span>
                                        </div>
                                    </a>
                                </div>
                            <?php $indx++;
                            endwhile; ?>
                            <?php wp_reset_postdata(); ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php get_template_part('templates/block/bussiness', 'partners'); ?>

    </section>
    <section class="garden-articles">
        <div class="container">
            <div data-aos="fade-right" data-aos-duration="1000" class="section-title text-center">
                <p class="section-title__desc">Tin tức nổi bật</p>
                <h2 class="section-title__name">CẬP NHẬT NHỊP SỐNG XANH MỖI NGÀY<h2>
            </div>
        </div>
        <div class="garden-articles__news">
            <div class="container">
                <div class="owl-carousel " data-autoheight="true" data-desktop="4" data-desktop-small="3" data-tablet="3" data-mobile="1" data-nav="false" data-margintb="" data-dots="false" data-loop="true" data-autoplay="true" data-speed="500" data-autotime="4000">
                    <?php
                    $args = array(
                        'post_status'     => 'publish',
                        'post_type'       => 'post',
                        'posts_per_page' => 6,
                    );
                    ?>
                    <?php $getposts = new WP_query($args); ?>
                    <?php if ($getposts->have_posts()) : ?>
                        <?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
                            <div class="owl-carousel-item">
                                <div class="product-item news-item product-item-img">
                                    <a href="<?php the_permalink(); ?>">
                                        <div class="img">
                                            <img class="w-100" src="<?php the_post_thumbnail_url(); ?>">
                                        </div>
                                    </a>
                                    <div class="info text-start">
                                        <a href="<?php the_permalink(); ?>">
                                            <h5 class="line-1"><?php the_title() ?></h5>
                                        </a>
                                        <p class="line-3"><?php echo wp_strip_all_tags(get_the_content()) ?></p>
                                        <a href="<?php the_permalink(); ?>" class="see-more">Xem thêm <i class="fas fa-chevron-double-right ms-2 "></i></a>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    <?php endif; ?>
                </div>
            </div>

        </div>
    </section>
    <section class="garden-banner garden-banner-third garden-contact">
        <div data-aos="fade-up" data-aos-duration="1000" class="banner-wrap">
            <div class="container">
                <div class="content">
                    <h1 class="text-white text-center mb-lg-4 mb-3">Đăng ký nhận tin tức của chúng tôi tại đây</h1>
                    <a href="<?php echo get_home_url(); ?>/lien-he">
                        <button class="btn btn-cus btn-cus--white d-block mx-auto">
                            Đăng ký ngay <i class="ms-2 far fa-arrow-right"></i>
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>