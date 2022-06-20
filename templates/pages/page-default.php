<?php get_header(); ?>

<main class="tintuc tintuc-detail">

    <section class="tintuc-banner position-relative">
        <h1 class="text-white text-center text-uppercase position-absolute fw-bold"><?php the_title(); ?></h1>
    </section>

    <section class="tintuc-main position-relative">
        <div class="tintuc-breadcrumb">
            <div class="container">
                <?php
                if (function_exists('yoast_breadcrumb')) {
                    yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
                }
                ?>
            </div>
        </div>
        <div class="container">
            <div class="tintuc-main-wrap bg-white">
                <div class="tintuc-content">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="tintuc-main-detail mb-0">
                                <div class="entry-content">
                                    <?php the_content(); ?>
                                </div>
                                <div class="meta-data mb-0">
                                    <div class="right">
                                        <a class="share-fb d-inline-block" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>&t=<?php the_title(); ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Share on Facebook">
                                            <i class="fab fa-facebook"></i> Chia sẻ
                                        </a>
                                    </div>
                                    <div class="right">
                                        <a href="mailto:?subject=<?php the_title(); ?>&amp;body=<?php the_permalink(); ?>" title="Share by Email">
                                            <i class="fas fa-envelope"></i> Gửi email
                                        </a>
                                        <a href="javascript:;" onclick="window.print()">
                                            <i class="fas fa-print"></i> In trang
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    sdasdasdsadasdsadasd
</main>

<?php get_footer(); ?>