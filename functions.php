<?php

require get_template_directory() . '/inc/init.php';

function add_favicon()
{
    echo '<link rel="shortcut icon" type="image/png" href="' . get_theme_mod('html_favicon_icon') . '" />';
}
add_action('wp_head', 'add_favicon');