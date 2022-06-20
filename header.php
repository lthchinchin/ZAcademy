<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title><?php bloginfo('name'); ?> - <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Raleway:ital,wght@0,400;0,600;0,800;1,400;1,600;1,800&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
</head>

<body <?php body_class('mb-0'); ?>>
    <div id="wrapper">
        <!-- Begin Header -->
        <header class="header">
            <div class="header-top d-lg-flex d-none">
                <div class="container">
                    <div class="header-top-wrap">
                        <div class="company">
                            <span>Học viện Z - <i>Học là thích, ôn là mê</i></span>
                        </div>
                        <div class="contact">
                            <ul class="social list-unstyled mb-0 d-flex">
                                <li>
                                    <a href="#">Đăng nhập</a>
                                </li>
                                <li>
                                    <a href="#">Đăng kí</a>
                                </li>
                                <li>
                                    <a href="#">Góp ý</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom">
                <div class="container">
                <div class="header-bottom-wrap">
                            <div class="logo">
                                <a href="<?php echo get_home_url(); ?>">
                                    <img src="<?php echo esc_html(get_theme_mod('html_logo_header')); ?>" alt="logo">
                                </a>
                            </div>
                            <div class="search-bar d-xl-block d-none">
                                <div class="position-relative">
                                    <form action="<?php echo home_url(); ?>" method="get" id="hv-search-form">
                                        <input name="s" placeholder="Nhập gì đó để tìm kiếm..." class="form-control"> <button type="submit" class="btn position-absolute top-50 translate-middle-y"><i class="far fa-search"></i></button>
                                    </form>
                                </div>
                            </div>
                            <ul class="benefit list-unstyled mb-0">
                                <li data-aos="fade-down" data-aos-duration="1000" data-aos-delay="200">
                                    <a href="#">
                                    <div class="icon d-flex align-items-center">
                                        <i class="fas fa-file-certificate me-3 fs-1"></i>
                                            <div>Khóa học<br> của tôi</div>
                                        </div>
                                    </a>
                                </li>

                            </ul>
                            <div class="headernav">
                                <div class="hbg-menu">
                                    <a id="mobile-menu-button" href="javascript:;"></a>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            <div class="header-underbottom d-none d-xl-block">
                <div class="container">
                    <div class="row">
                        <div class="d-flex justify-content-center">
                            <nav>
                                <?php
                                $primarymenu = array(
                                    'theme_location'  => 'primary',
                                    'menu'            => '',
                                    'container'       => '',
                                    'container_class' => '',
                                    'container_id'    => '',
                                    'menu_class'      => 'slimmenu',
                                    'menu_id'         => 'primary-menu',
                                    'echo'            => true,
                                    'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
                                    'walker'          => new wp_bootstrap_navwalker(),
                                    'before'          => '',
                                    'after'           => '',
                                    'link_before'     => '',
                                    'link_after'      => '',
                                    'items_wrap'      => '<ul data-breakpoint="800" id="%1$s" class="d-xl-flex d-none list-unstyled mb-0">%3$s</ul>',
                                    'depth'           => 0,
                                );
                                if (has_nav_menu('primary')) {
                                    wp_nav_menu($primarymenu);
                                }
                                ?>
                            </nav>
                            <div class="">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-menu">
                <div class="container">
                    <?php
                    $primary_menu = array(
                        'theme_location'  => 'secondary',
                        'menu'            => '',
                        'container'       => '',
                        'container_class' => '',
                        'container_id'    => '',
                        'menu_class'      => 'slimmenu',
                        'menu_id'         => 'secondary-menu',
                        'before'          => '',
                        'after'           => '',
                        'link_before'     => '',
                        'link_after'      => '',
                        'items_wrap'      => '<ul data-breakpoint="800" id="%1$s" class="main-nav list-unstyled d-flex d-xl-none m-0">%3$s</ul>',
                        'depth'           => 0,
                    );
                    if (has_nav_menu('secondary')) {
                        wp_nav_menu($primary_menu);
                    }
                    ?>
                </div>
                <div class="header-top d-block d-lg-none bottom-mobile" style="background-color: unset;">
                    <div class="container">
                        <div class="header-top-wrap">
                            <div class="company mb-md-0 mb-4">
                                <span>Học viện Z - <i>Học là thích, ôn là mê</i></span>
                            </div>
                            <div class="contact">
                                <ul class="social list-unstyled mb-0 d-flex">
                                    <li>
                                        <a target="_blank" href="<?php echo esc_html(get_theme_mod('html_facebook')); ?>"><i class="fab fa-facebook"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fab fa-instagram"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- End Header -->