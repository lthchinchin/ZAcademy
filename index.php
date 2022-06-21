<?php /* Template Name: Trang chủ */ ?>
<?php get_header(); ?>

<main class="home">
    <section class="home_banner">
        <div class="container">
            <div class="row g-4">
                <div class="col-9">
                    <div class="row g-4">
                        <div class="col-6">
                            <div class="group">
                                <img src="<?php bloginfo('template_url'); ?>/assets/images/home/Group.png" alt="Group Khóa học">
                                <a class="d-flex justify-content-center align-items-center" href="fb.com">
                                    <span>Tài liệu miễn phí mới</span>
                                    <div class="d-flex justify-content-center align-items-center circle">
                                        <i class="fas fa-chevron-double-right"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="group">
                                <img src="<?php bloginfo('template_url'); ?>/assets/images/home/Group.png" alt="Group Khóa học">
                                <a class="d-flex justify-content-center align-items-center" href="fb.com">
                                    <span>Tài liệu miễn phí</span>
                                    <div class="d-flex justify-content-center align-items-center circle">
                                        <i class="fas fa-chevron-double-right"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="owl-carousel owl-theme">
                                <div class="item">
                                    <img src="<?php bloginfo('template_url'); ?>/assets/images/home/Group1.png" alt="Slide Khóa học">
                                </div>
                                <div class="item">
                                    <img src="<?php bloginfo('template_url'); ?>/assets/images/home/Group1.png" alt="Slide Khóa học">
                                </div>
                                <div class="item">
                                    <img src="<?php bloginfo('template_url'); ?>/assets/images/home/Group1.png" alt="Slide Khóa học">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <a href="" class="d-flex justify-content-center align-items-center support">
                        HỖ TRỢ / HƯỚNG DẪN
                    </a>
                    <div class="my-4 wonder">
                        <img src="<?php bloginfo('template_url'); ?>/assets/images/home/Group2.png" alt="Thắc mắc">
                        <div class="box">
                            <div class="text-center title">Thắc mắc</br>cần hỗ trợ</div>
                            <div class="d-flex justify-content-center align-items-center button">Click vào đây >></div>
                        </div>
                    </div>
                    <div class="wonder">
                        <img src="<?php bloginfo('template_url'); ?>/assets/images/home/Group2.png" alt="Thắc mắc">
                        <div class="box">
                            <div class="text-center title">Thắc mắc</br>cần hỗ trợ</div>
                            <div class="d-flex justify-content-center align-items-center button">Click vào đây >></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <section class="home_course">
        <div class="container">
            <div class="row g-4">
                <div class="col-9">
                    <div class="row g-3">
                        <div class="title">
                            <div class="title_with_tag">
                                Các khóa học tại HocvienZ.edu.vn
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="course">
                                <img src="<?php bloginfo('template_url'); ?>/assets/images/home/Group3.png" alt="Course" class="course_img">
                                <div class="text-center course_name">
                                    Khóa học 1
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="course">
                                <img src="<?php bloginfo('template_url'); ?>/assets/images/home/Group3.png" alt="Course" class="course_img">
                                <div class="text-center course_name">
                                    Khóa học 1
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="course">
                                <img src="<?php bloginfo('template_url'); ?>/assets/images/home/Group3.png" alt="Course" class="course_img">
                                <div class="text-center course_name">
                                    Khóa học 1
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="course">
                                <img src="<?php bloginfo('template_url'); ?>/assets/images/home/Group3.png" alt="Course" class="course_img">
                                <div class="text-center course_name">
                                    Khóa học 1
                                </div>
                            </div>
                        </div>
                    </div>



                </div>
                <div class="col-3">

                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>