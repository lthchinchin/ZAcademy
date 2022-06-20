<?php
/*
 * All custom functions go here
 */
function tp_custom_logo() { ?>
    <style type="text/css"> 
        body {
            background-size: cover !important; 
        }
        .wp-core-ui .button-primary {
            background: #12687C !important;
            border: none !important;
            text-shadow: none !important;
            box-shadow: none !important;
 
        }
        .login form {
            box-shadow: none !important;
            padding: 26px 24px !important;
        }
        .login #backtoblog a, .login #nav a{
            color: #fff !important;
        }
        #login h1 a {
            background-image: url(<?php echo get_theme_mod('html_logo_header'); ?>);
            background-size: contain;
            width: 300px;
            height: 68px;
        }
    </style>
<?php }
add_action('login_enqueue_scripts', 'tp_custom_logo');

add_action( 'login_head', 'hide_login_nav' );
function hide_login_nav(){
    ?><style>#nav,#backtoblog{display:none}</style><?php
}
add_filter( 'login_headerurl', 'custom_loginlogo_url' );
function custom_loginlogo_url($url) {
    return home_url();
}

add_action( 'admin_menu', 'my_remove_menus', 999 );
function my_remove_menus() {
    remove_submenu_page( 'themes.php', 'theme-editor.php' );
    remove_submenu_page( 'plugins.php', 'plugin-editor.php' );
    remove_menu_page( 'edit-comments.php');
    remove_menu_page( 'meowapps-main-menu');
    remove_menu_page( 'wp-mail-smtp');
}
function remove_admin_bar_links() {
global $wp_admin_bar;
    $wp_admin_bar->remove_menu('wp-logo');          /** Remove the WordPress logo **/
    $wp_admin_bar->remove_menu('about');            /** Remove the about WordPress link **/
    $wp_admin_bar->remove_menu('wporg');            /** Remove the WordPress.org link **/
    $wp_admin_bar->remove_menu('documentation');    /** Remove the WordPress documentation link **/
    $wp_admin_bar->remove_menu('support-forums');   /** Remove the support forums link **/
    $wp_admin_bar->remove_menu('feedback');         /** Remove the feedback link **/
    //$wp_admin_bar->remove_menu('site-name');      /** Remove the site name menu **/
    // $wp_admin_bar->remove_menu('view-site');        /** Remove the view site link **/
    $wp_admin_bar->remove_menu('wpseo-menu');        /** Remove the view site link **/
    $wp_admin_bar->remove_menu('updates');          /** Remove the updates link **/
    // $wp_admin_bar->remove_menu('comments');         /** Remove the comments link **/
    $wp_admin_bar->remove_menu('new-content');      /** Remove the content link **/
    // $wp_admin_bar->remove_menu('w3tc');             /** If you use w3 total cache remove the performance link **/
    //$wp_admin_bar->remove_menu('my-account');     /** Remove the user details tab **/
}
add_action( 'wp_before_admin_bar_render', 'remove_admin_bar_links' );

add_action('admin_init', 'rw_remove_dashboard_widgets');
function rw_remove_dashboard_widgets() {
    remove_meta_box('dashboard_right_now', 'dashboard', 'normal'); // right now
    remove_meta_box('dashboard_activity', 'dashboard', 'normal');// WP 3.8
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal'); // recent comments
    remove_meta_box('dashboard_incoming_links', 'dashboard', 'normal'); // incoming links
    remove_meta_box('dashboard_plugins', 'dashboard', 'normal'); // plugins
    remove_meta_box('dashboard_quick_press', 'dashboard', 'normal'); // quick press
    remove_meta_box('dashboard_recent_drafts', 'dashboard', 'normal'); // recent drafts
    remove_meta_box('dashboard_primary', 'dashboard', 'normal'); // wordpress blog
    remove_meta_box('dashboard_secondary', 'dashboard', 'normal'); // other wordpress news
    remove_meta_box('woocommerce_dashboard_recent_reviews', 'dashboard', 'normal'); // other wordpress news
    remove_meta_box('wpseo-dashboard-overview', 'dashboard', 'normal'); // other wordpress news
    remove_meta_box('dashboard_site_health', 'dashboard', 'normal'); // other wordpress news
}
function my_footer_shh() {
    remove_filter( 'update_footer', 'core_update_footer' ); 
}
add_action( 'admin_menu', 'my_footer_shh' );
// Remove Footer Text ADmin
function remove_footer_admin () {
    echo '';
}
add_filter('admin_footer_text', 'remove_footer_admin');