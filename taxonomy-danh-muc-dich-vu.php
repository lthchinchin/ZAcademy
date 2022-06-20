<?php get_header(); ?>
<section class="garden-banner garden-banner-spdv">
    <div data-aos="fade-up" data-aos-duration="1000" class="banner-wrap">
        <div class="container">
            <div class="content">
                <h1 class="text-white text-center mb-lg-4 mb-3">BGD Landscape - <span class="second-co">Sản phẩm và Dịch vụ</span></h1>
            </div>
        </div>
    </div>
</section>
<section class="garden-categories">
    <div class="container">
        <div class="wrap" data-aos="fade-up" data-aos-duration="1000">
            <div class="row g-4">
                <?php
                $taxonomies = array('danh-muc-dich-vu');
                $args = array(
                    // 'orderby'           => 'include',
                    'number' => 8,
                    'hide_empty'        => false,
                    'parent' => 0,
                    'hierarchical'      => true,
                    // 'include' => [17, 16, 18, 20, 19, 32],
                );
                $terms = get_terms($taxonomies, $args);
                $term_current = get_queried_object();
                foreach ($terms as $key => $term) {
                ?>
                    <div class="col-lg-3 col-6 "><a href="<?php echo get_term_link($term->term_id) ?>"><button class="btn cate-item h-100 <?php echo $term_current->term_id == $term->term_id || $term_current->parent == $term->term_id  ? 'active' : '' ?>"><?php echo $term->name; ?></button>
                        </a></div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>
<section class="garden-desc">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-3">
                <div class="wrap" data-aos="fade" data-aos-duration="1000">
                    <?php get_template_part('templates/block/service', 'sidebar'); ?>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="wrap">
                    <h2 class="second-co" data-aos="fade" data-aos-duration="2000">
                        <?php echo $term_current->name; ?>
                    </h2>
                    <?php echo get_field('desc_tax', 'danh-muc-dich-vu_' . get_queried_object_id()) ?>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="garden-highlight-products">
    <div class="container">
        <h2 class="main-co mb-lg-5 mb-4">Xem sản phẩm nổi bật</h2>
        <div class="wrap" data-aos="fade" data-aos-duration="1000">
            <div class="row g-4 row-cols-lg-4 row-cols-md-3 row-cols-2">
                <?php
                $args = array(
                    'post_type'         => 'san-pham',
                    'orderby'           => 'name',
                    'order'             => 'ASC',
                    'posts_per_page'     => 8,
                );
                $wp_query = new WP_Query($args);
                ?>
                <?php if ($wp_query->have_posts()) while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
                    <div class="col">
                        <div class="product-item product-item-img">
                            <a href="<?php the_permalink(); ?>">
                                <div class="img">
                                    <img class="w-100" src="<?php the_post_thumbnail_url(); ?>">
                                </div>
                            </a>
                            <div class="info">
                                <span class="cate-pd">
                                    Cây - Hoa nhập khẩu
                                </span>
                                <a href="<?php the_permalink(); ?>">
                                    <h5 class="line-1"><?php the_title() ?></h5>
                                </a>
                                <a href="<?php the_permalink(); ?>"><button class="btn text-white w-100">LIÊN HỆ NGAY</button></a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>