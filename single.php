<?php get_header(); ?>

<main class="tintuc tintuc-detail">
    <section class="kh-banner kh-banner-news">
        <div data-aos="fade-up" data-aos-duration="1000" class="banner-wrap">
            <div class="container">
                <div class="content">
                    <h1 class="text-white text-center mb-lg-4 mb-3">HỌC VIỆN Z - <span
                            class="second-co"><?php the_title(); ?></span></h1>
                </div>
            </div>
        </div>
    </section>
    <?php 
        get_template_part(
            'templates/block/page', 
            'breadcrumb', 
            array( 'key'   => get_the_title() ),
        ); 
    ?>
    <section class=list-post>
        <div class="container">
            <ul>

                <?php
                $cur_post_id = get_the_ID();

                $args = array(
                'post_type' => 'post',
                'order' => 'ASC',
                'cat' => 20
                );
                $the_query = new WP_Query($args);
                while ($the_query->have_posts()) : $the_query->the_post(); 
                ?>

                <li>
                    <a href="<?php echo get_post_permalink() ?>"
                        class="<?php echo $cur_post_id == get_the_ID() ? 'active':'';?>"><?php echo wp_trim_words( get_the_title(), $num_words = 25, $more = null ); ?></a>
                </li>

                <?php endwhile; ?>
                <?php wp_reset_query(); ?>

            </ul>
        </div>
    </section>
    <section class="content-post">
        <div class="container">
            <?php the_content() ?>
        </div>
    </section>

    <section class="course">
        <div class="container">
            <div class="title">
                <div class="title_with_tag">
                    Thông tin về giá của các khóa học
                </div>
            </div>
            <div class="list-course">
                <div class="row g-2">
                    <div class="col-3">
                        <div class="course-item">
                            <a href="#">
                                <img src="<?php bloginfo('template_url'); ?>/assets/images/course.png" alt="">
                                <div class="name">Tin đầu ra (Nâng cao) - Mr Đạt</div>
                                <div class="price">129k</div>
                            </a>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="course-item">
                            <a href="#">
                                <img src="<?php bloginfo('template_url'); ?>/assets/images/course.png" alt="">
                                <div class="name">Tin đầu ra (Nâng cao) - Mr Đạt</div>
                                <div class="price">129k</div>
                            </a>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="course-item">
                            <a href="#">
                                <img src="<?php bloginfo('template_url'); ?>/assets/images/course.png" alt="">
                                <div class="name">Tin đầu ra (Nâng cao) - Mr Đạt</div>
                                <div class="price">129k</div>
                            </a>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="course-item">
                            <a href="#">
                                <img src="<?php bloginfo('template_url'); ?>/assets/images/course.png" alt="">
                                <div class="name">Tin đầu ra (Nâng cao) - Mr Đạt</div>
                                <div class="price">129k</div>
                            </a>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="course-item">
                            <a href="#">
                                <img src="<?php bloginfo('template_url'); ?>/assets/images/course.png" alt="">
                                <div class="name">Tin đầu ra (Nâng cao) - Mr Đạt</div>
                                <div class="price">129k</div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="text-center register">
        <div class=" content">
            Đăng ký ngay để lựa chọn cho mình khóa học ưng ý nhất!
        </div>
        <a class="button" href="">Đăng ký tài khoản</a>
    </section>

</main>

<?php get_footer(); ?>