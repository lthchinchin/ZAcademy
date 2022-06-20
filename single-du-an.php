<?php get_header(); ?>
<?php 
$page_id = get_queried_object_id();

?>
<section class="garden-banner garden-banner-duan">
    <div data-aos="fade-up" data-aos-duration="1000" class="banner-wrap">
        <div class="container">
            <div class="content">
                <h1 class="text-white text-center mb-lg-4 mb-3">BGD Landscape - <span class="second-co">Dự án</span></h1>
            </div>
        </div>
    </div>
</section>
<section class="garden-categories-duan">
    <div class="container">
        <div class="wrap" data-aos="fade" data-aos-duration="1000">
            <div class="d-flex">
                <?php
                $taxonomies = array('danh-muc-du-an');
                $args = array(
                    // 'orderby'           => 'include',
                    'number' => 2,
                    'hide_empty'        => false,
                    'parent' => 0,
                    'hierarchical'      => true,
                    // 'include' => [17, 16, 18, 20, 19, 32],
                );
                $terms = get_terms($taxonomies, $args);
                $term_current = get_the_terms(get_the_ID(), 'danh-muc-du-an')[0];

                foreach ($terms as $key => $term) {
                ?>
                    <a class="me-3" href=" <?php echo get_term_link($term->term_id) ?>"><button class="btn cate-item h-100 <?php echo $term_current->term_id == $term->term_id || $term_current->parent == $term->term_id  ? 'active' : '' ?>"><?php echo $term->name; ?></button></a>
                <?php } ?>

            </div>
        </div>
    </div>
    </div>
</section>
<section class="garden-content-duan">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-3">
                <?php get_template_part('templates/block/project', 'sidebar'); ?>
            </div>
            <div class="col-lg-9">
                <div class="content-wrap">
                    <?php 
                        $content = apply_filters('the_content', get_post_field('post_content', $page_id));
                        echo $content;
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>