<?php
get_header();
$queried_object = get_queried_object();
$paged = get_query_var('paged') ? get_query_var('paged') : 1;
global $post;
?>
<section class="garden-banner garden-banner-news">
    <div data-aos="fade-up" data-aos-duration="1000" class="banner-wrap">
        <div class="container">
            <div class="content">
                <h1 class="text-white text-center mb-lg-4 mb-3">BGD Landscape - <span class="second-co">Tin tức</span></h1>
            </div>
        </div>
    </div>
</section>
<section class="garden-content-duan">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-3">
                <?php get_template_part('templates/block/news', 'sidebar'); ?>
            </div>
            <div class="col-lg-9">
                <?php
                $term_current_slug = get_the_terms(get_the_ID(), 'category')[0]->slug;
                ?>
                <div class="content-wrap">
                    <ul class="blog-list list-unstyled mb-lg-5 mb-4">
                        <?php
                        $args = array(
                            'post_status'     => 'publish',
                            'post_type'       => 'post',
                            'posts_per_page' => 5,
                            'paged'           => get_query_var('paged'),
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'category',
                                    'field' => 'slug',
                                    'terms' =>  $term_current_slug
                                )
                            )
                        );
                        ?>
                        <?php $getposts = new WP_query($args); ?>
                        <?php if ($getposts->have_posts()) : ?>
                            <?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
                                <li class="blog-item shadow">
                                    <a href="<?php the_permalink(); ?>">
                                        <div class="blog-item-wrap ">
                                            <div class="row g-0">
                                                <div class="col-lg-4">
                                                    <div class="blog-item__img">
                                                        <img class="" src="<?php the_post_thumbnail_url('full') ?>" alt="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-8">
                                                    <div class="blog-item__info">
                                                        <p class="date mb-2"><?php echo get_the_terms(get_the_ID(), 'category')[0]->name; ?>
                                                        </p>
                                                        <h3><?php the_title(); ?></h3>
                                                        <div class="excerpt line-2">
                                                            <?php echo wp_trim_words(get_the_content(), $num_words = 50, $more = null); ?>
                                                        </div>
                                                        <p class="next fw-bold">Xem Chi Tiết <i class="fas fa-arrow-right"></i></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            <?php endwhile;
                            wp_reset_postdata();
                            ?>
                        <?php endif; ?>
                    </ul>
                    <?php
                    jks_wp_pagination($getposts, $paged);
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>