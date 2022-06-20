<?php
get_header();
$queried_object = get_queried_object();
global $post;
?>
<section class="page-blogs">
    <div class="page-blog">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-3 mb-4">
                    <?php get_sidebar(); ?>
                </div>
                <div class="col-12 col-lg-9">
                    <ul class="blog-list list-unstyled">
                        <?php
                        $args = array(
                            'posts_per_page'     => -1,
                            // 'post_type'          => '',
                            'orderby'            => 'date',
                            'order'              => 'DESC',
                            'paged'             => get_query_var('paged'),
                            's'                  => get_search_query()
                        );
                        ?>
                        <?php $getposts = new WP_query($args); ?>
                        <?php if ($_GET['s'] == '') { ?>
                            <h4 class="mb-3 mb-md-4">Vui lòng nhập từ khóa bạn muốn tìm kiếm.</h4>
                        <?php } else { ?>
                            <h4 class="mb-3 mb-md-4"><?php echo count($getposts->posts) ?> kết quả tìm kiếm được tìm thấy</h4>
                            <?php if ($getposts->have_posts()) : ?>
                                <?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
                                    <li class="blog-item">
                                        <a href="<?php the_permalink(); ?>">
                                            <div class="image">
                                                <img class="blog-item__img" src="<?php the_post_thumbnail_url('full') ?>" alt="">
                                            </div>
                                            <div class="blog-item__info">
                                                <?php
                                                $categorys =  get_the_category(get_the_ID());
                                                foreach ($categorys as $key => $category) {
                                                    echo '<p class="next">' . $category->name . '</p>';
                                                }
                                                ?>
                                                <h3><?php the_title(); ?></h3>
                                                <?php the_excerpt(); ?>
                                                <p class="next">Xem thêm >></p>
                                            </div>
                                        </a>
                                    </li>
                                <?php endwhile;
                                wp_reset_postdata(); ?>
                            <?php endif; ?>
                        <?php } //if (function_exists('prw_wp_corenavi')) prw_wp_corenavi($getposts, $paged); 
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="clear"></div>
</section>
<div class="clear"></div>

<?php get_footer(); ?>