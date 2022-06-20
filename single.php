<?php get_header(); ?>

<main class="tintuc tintuc-detail">
    <?php
    $img_url = wp_get_attachment_image_url(get_post_thumbnail_id(get_the_ID()), 'full');

    ?>
    <section class="tintuc-banner position-relative" style="background-image: url(<?php echo $img_url; ?>);">
        <h1 class="text-white text-center text-uppercase fw-bold position-absolute"><?php the_title(); ?></h1>
    </section>

    <section class="tintuc-main position-relative">
        <div class="tintuc-breadcrumb">
            <div class="container">
                <?php if (function_exists('yoast_breadcrumb')) {
                    yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
                } ?>
            </div>
        </div>
        <div class="container">
            <div class="tintuc-main-wrap">
                <div class="tintuc-content">
                    <div class="row gx-5">
                        <div class="col-xl-9">
                            <div class="tintuc-main-detail">
                                <h2 class="entry-title">
                                    <?php the_title(); ?>
                                </h2>
                                <div class="meta-data">
                                    <div class="left">
                                        <div class="date">
                                            <i class="fas fa-calendar-alt"></i> <?php echo get_the_date("d/m/Y") ?>
                                        </div>
                                        <div class="view">
                                            <i class="far fa-user"></i> <?php bloginfo('name'); ?>
                                        </div>
                                    </div>
                                    <div class="right">
                                        <a class="share-fb d-inline-block" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>&t=<?php the_title(); ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Share on Facebook">
                                            <i class="fab fa-facebook"></i> Chia sẻ
                                        </a>
                                    </div>
                                </div>
                                <div class="entry-content">
                                    <?php the_content(); ?>
                                </div>
                                <div class="meta-data justify-content-end">
                                    <div class="right">
                                        <a href="mailto:?subject=<?php the_title(); ?>&amp;body=<?php the_permalink(); ?>" title="Share by Email">
                                            <i class="fas fa-envelope"></i> Gửi email
                                        </a>
                                        <a href="javascript:;" onclick="window.print()">
                                            <i class="fas fa-print"></i> In trang
                                        </a>
                                    </div>
                                </div>
                                <?php
                                $post_tags = get_the_tags();
                                if ($post_tags) :
                                ?>
                                    <div class="tags d-flex flex-wrap align-items-center">
                                        <div class="label">
                                            <i class="fas fa-tags"></i> TAGS:
                                        </div>
                                        <div class="tag-list">
                                            <?php foreach ($post_tags as $post_tag) : ?>
                                                <a class="tag" href="<?php echo get_tag_link($post_tag->term_id); ?>"><?php echo $post_tag->name; ?></a>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="tintuc-main-listing mb-0">
                                <h5>Các bài viết khác</h5>
                                <?php
                                $args = array(
                                    'posts_per_page' => 4,
                                    'orderby' => 'rand',
                                    'order' => 'DESC',
                                    'post__not_in' => array(get_the_ID())
                                );
                                $myposts = get_posts($args);
                                foreach ($myposts as $post) : setup_postdata($post);
                                ?>
                                    <article>
                                        <div class="image-box position-relative animate-box">
                                            <a href="<?php the_permalink(); ?>">
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
                                <?php endforeach;
                                wp_reset_postdata(); ?>
                            </div>

                        </div>
                        <div class="col-xl-3">
                            <?php get_sidebar(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>