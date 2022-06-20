<div class="garden-service-sidebar garden-project-sidebar">
    <div class="row g-4 mb-lg-5 mb-4">
        <?php
        $taxonomy_name = 'danh-muc-du-an';
        $term_current = get_the_terms(get_the_ID(), $taxonomy_name)[0];
        $page_id = get_queried_object_id();
        $args = array(
            'post_type'         => 'du-an',
            'orderby'           => 'name',
            'order'             => 'ASC',
            'posts_per_page'     => 6,
            'tax_query' => array(
                array(
                    'taxonomy' => $taxonomy_name,
                    'field'    => 'slug',
                    'terms'    => $term_current->slug,
                )
            )
        );
        $wp_query = new WP_Query($args);
        if ($wp_query->have_posts()) :
            while ($wp_query->have_posts()) : $wp_query->the_post();
        ?>
                <div class="col-12"><a href="<?php the_permalink(); ?>"><button class="btn text-start cate-item <?php echo $page_id == get_the_ID() ? 'active' : '' ?>"><?php the_title(); ?>
                        </button></a></div>
            <?php endwhile; ?>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>
    </div>
    <div class="contact-thumb">
        <a href="tel:0777148777">
            <img src="<?php echo get_template_directory_uri() ?>/assets/images/CTA.jpg" alt="">
        </a>
    </div>
</div>