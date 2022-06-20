<?php get_header(); ?>
<main class="tintuc">

    <section class="tintuc-banner position-relative">
        <h1 class="text-white text-center text-uppercase position-absolute fw-bold">
            Danh sách sản phẩm
        </h1>
    </section>

    <section class="tintuc-main">
        <div class="tintuc-breadcrumb">
            <div class="container">
                <?php if (function_exists('yoast_breadcrumb')) {
                    yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
                } ?>
            </div>
        </div>
        <div class="container">
            <div class="tintuc-main-wrap bg-white position-relative">
                <div class="tintuc-content">
                    <div class="row gx-5">
                        <div class="col-xl-9">
                            <div class="tintuc-main-category">
                                <ul class="list-unstyled d-flex position-relative">
                                    <li><a class="active">Danh sách sản phẩm</a></li>
                                </ul>
                            </div>

                            <div class="tintuc-main-listing">
                                <?php if (have_posts()) : ?>
                                    <?php while (have_posts()) : the_post(); ?>
                                        <article>
                                            <div class="image-box position-relative">
                                                <a href="<?php the_permalink(); ?>" class="img-animate">
                                                    <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title(); ?>">
                                                </a>
                                            </div>
                                            <div class="content-box">
                                                <h3 class="title">
                                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                </h3>
                                                <div class="date"><i class="fal fa-calendar-alt"></i>
                                                    <?php echo get_the_date("d/m/Y") ?></div>
                                                <div class="excerpt">
                                                    <?php echo wp_trim_words(get_the_content(), $num_words = 50, $more = null); ?>
                                                </div>
                                            </div>
                                        </article>
                                    <?php endwhile; ?>
                                <?php else : ?>
                                    <p>Dữ liệu đang cập nhập...</p>
                                <?php endif; ?>

                            </div>

                            <div class="tintuc-main-pagination">
                                <?php jks_wp_pagination(); ?>
                            </div>

                        </div>
                        <div class="col-xl-3">
                            <?php get_template_part('templates/block/product', 'sidebar'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>