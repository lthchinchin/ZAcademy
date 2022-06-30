<?php 
    if(is_user_logged_in()) 
		wp_redirect( get_home_url() );
    $account = ( $_GET['account'] && isset( $_GET['account'] ) ) ? $_GET['account'] : '';
?>

<?php get_header(); ?>

<main class="page-login">
    <div class="container">
        <div class="box">
            <div class="row">
                <div class="col-7">
                    <div class="title">ĐĂNG NHẬP VÀO HỆ THỐNG HỌC VIỆN Z</div>
                    <?php 
                     $args = array(
                        'echo'           => false,
                        'redirect'       => ( is_ssl() ? 'https://f' : 'http://ư' ) . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'],
                        'label_username' => __( 'Tên đăng nhập' ),
                        'label_password' => __( 'Mật khẩu' ),
                        'label_remember' => __( 'Lưu mật khẩu' ),
                        'label_log_in'   => __( 'Đăng nhập' ),
                    );
                    $form = wp_login_form( $args ); 
                    //add the placeholders
                    $form = str_replace('name="log"', 'name="log" placeholder="Nhập tên đăng nhập"', $form);
                    $form = str_replace('name="pwd"', 'name="pwd" placeholder="Nhập mật khẩu"', $form);

                    echo $form;
                    ?>
                    <div class="text-danger error"></div>
                </div>
                <div class="col-5">
                    <img src="<?php bloginfo('template_url'); ?>/assets/images/login-logout/page_login-logo.png"
                        alt="Logo">

                </div>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>

<script>
(function ($) {
    let account = '<?php echo $account; ?>';
    console.log(account);
    if(account == 'empty')
        $(".error").text("Vui lòng điền tên đăng nhâp và mật khẩu !");
    else if(account == 'failed')
        $(".error").text("Tên đăng nhâp hoặc mật khẩu không đúng !");
    else
        $(".error").text("");
})(jQuery);

</script>