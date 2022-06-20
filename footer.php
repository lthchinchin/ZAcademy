        <!-- Begin Footer -->
        <footer class="footer">
            <div class="footer-main">
                <div class="container">
                    <div class="footer-logo">
                        <img src="<?php echo esc_html(get_theme_mod('html_footer_header')); ?>" alt="">
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="footer-item" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="200">
                                <h3>Thông tin liên hệ</h3>
                                <h4>Công ty TNHH BGD LANDSCAPE</h4>
                                <ul class="list-unstyled mb-0">
                                    <li><a href="https://goo.gl/maps/hxL3xW8PZ9SmC5pf8">Địa chỉ: 115 Phạm Cự Lượng, Đà Nẵng</a></li>
                                    <li><a href="tel:0777148777">Hotline: 0777148777</a></li>
                                    <li><a href="mailto:Binhgarden@gmail.com">Email: Binhgarden@gmail.com</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="footer-item" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="400">
                                <h3>Danh mục</h3>
                                <ul class="list-unstyled mb-0">
                                    <li><a href="/gioi-thieu">Về chúng tôi</a></li>
                                    <li><a href="/du-an"></a>Dự án</li>
                                    <li><a href="/tin-tuc">Tin tức</a></li>
                                    <li><a href="/lien-he">Liên hệ</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="footer-item" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="400">
                                <h3>Dịch vụ</h3>
                                <?php
                                $primarymenu = array(
                                    'theme_location'  => 'footer',
                                    'menu'            => '',
                                    'container'       => '',
                                    'container_class' => '',
                                    'container_id'    => '',
                                    'menu_class'      => 'slimmenu',
                                    'menu_id'         => 'footer-menu',
                                    'echo'            => true,
                                    'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
                                    'walker'          => new wp_bootstrap_navwalker(),
                                    'before'          => '',
                                    'after'           => '',
                                    'link_before'     => '',
                                    'link_after'      => '',
                                    'items_wrap'      => '<ul data-breakpoint="800" id="%1$s" class="list-unstyled mb-0">%3$s</ul>',
                                    'depth'           => 0,
                                );
                                if (has_nav_menu('primary')) {
                                    wp_nav_menu($primarymenu);
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="footer-item" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="600">
                                <h3>Theo dõi chúng tôi</h3>
                                <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fbgdlandscape%2F&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="340" height="230" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-copyright">
                <div class="container">
                    <p class="mb-0 text-center text-white">
                        © Copyright by BGD Landscape. All rights reserved** | <span>Design by <a href="https://biti.vn/">BITI.VN</a></span>
                    </p>
                </div>
            </div>
        </footer>
        <!-- End Footer -->

        <div class="contact-fix">
            <ul class="list-unstyled mb-0">
                <li>
                    <a href="https://zalo.me/0777148777" target="_blank" rel="noopener noreferrer">
                        <i class="jks jks-zalo"></i>
                    </a>
                </li>
                <li>
                    <a href="https://www.facebook.com/bgdlandscape/" target="_blank" rel="noopener noreferrer">
                        <i class="jks jks-face"></i>
                    </a>
                </li>
                <li>
                    <a href="tel:0777148777" rel="noopener noreferrer">
                        <i class="jks jks-hotline"></i>
                    </a>
                </li>
            </ul>
        </div>
        <!-- bottom to top -->
        <a href="#">
            <div id="bottom_to_top" style="bottom: 30px;">
                <i class="fas fa-arrow-up text-white"></i>
            </div>
        </a>
        <script>
            var ajaxUrl = '<?php echo admin_url('admin-ajax.php') ?>'
        </script>
        <?php wp_footer(); ?>
        </div>
        </body>

        </html>