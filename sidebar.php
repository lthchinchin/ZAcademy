<div class="tintuc-related">
    <h2 class="st-heading">
        <a>Có thể bạn quan tâm</a>
    </h2>
    <ul class="list-unstyled mb-0">
        <?php
        $args = array(
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
                    <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title() ; ?>">
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