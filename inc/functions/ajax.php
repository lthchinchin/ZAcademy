<?php
add_action('wp_ajax_loadColor', 'get_colors');
add_action('wp_ajax_nopriv_loadColor', 'get_colors');
function get_colors()
{
    echo json_encode(get_field('colors', 26));
    die();
}
