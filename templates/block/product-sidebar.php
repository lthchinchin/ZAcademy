<div class="tintuc-related product-related mb-4">
    <h2 class="st-heading">
        <a>Danh mục sản phẩm</a>
    </h2>
    <ul class="product-categories list-unstyled mb-0">
        <?php
        $args = array(
            'taxonomy' => 'danh-muc-san-pham',
            'orderby' => 'name',
            'order' => 'asc',
            'hide_empty' => false,
        );
        $product_categories = get_terms($args);
        foreach ($product_categories as $category) :
        ?>
        <li>
            <a href="<?php echo get_term_link($category); ?>"><?php echo $category->name; ?></a>
        </li>
        <?php endforeach; ?>
    </ul>
</div>

<div class="tintuc-related">
    <h2 class="st-heading">
        <a>Sản phẩm mới</a>
    </h2>
    <ul class="list-unstyled mb-0">
        <?php
        $args = array(
            'post_type' => 'san-pham',
            'posts_per_page' => 5,
            'orderby' => 'rand',
            'order' => 'DESC',
        );
        $myposts = get_posts($args);
        foreach ($myposts as $post) : setup_postdata($post);
        ?>
        <li>
            <div class="image-box position-relative">
                <a href="<?php the_permalink(); ?>">
                    <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title(); ?>">
                </a>
            </div>
            <div class="content">
                <a class="line-2" href="<?php the_permalink(); ?>">
                    <?php the_title(); ?>
                </a>
                <div class="date"><i class="fal fa-calendar-alt"></i>
                    <?php echo get_the_date("d/m/Y") ?></div>
            </div>
        </li>
        <?php endforeach;
        wp_reset_postdata(); ?>
    </ul>
</div>