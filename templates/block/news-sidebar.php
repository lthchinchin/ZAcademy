<div class="garden-service-sidebar garden-news-sidebar">
    <div class="title">

        <button class="btn text-start text-white main-bg-co mb-2 cate-item">
            DANH MỤC TIN TỨC
        </button>
    </div>
    <div class="row g-4 mb-lg-5 mb-4">

        <?php
        $taxonomies = array('category');
        $args = array(
            // 'orderby'           => 'include',
            // 'order'             => 'DESC',
            'number' => 5,
            'hide_empty'        => false,
            'hierarchical'      => true,
            // 'include' => [17, 16, 18, 20, 19, 32],
        );

        $term_current_id =  get_queried_object()->term_id;
        $terms = get_terms($taxonomies, $args);
        foreach ($terms as $key => $term) {
        ?>
            <div class="col-12 "><a href="<?php echo get_term_link($term) ?>"><button class="btn text-start cate-item <?php echo $term_current_id == $term->term_id ? 'active' : '' ?>"><?php echo $term->name; ?>
                    </button></a></div>
        <?php
        }
        ?>
    </div>
    <div class="contact-thumb">
        <a href="tel:0777148777">
            <img src="<?php echo get_template_directory_uri() ?>/assets/images/CTA.jpg" alt="">
        </a>
    </div>
</div>