<?php
/* Pagination */
function jks_wp_pagination( $custom_query = null, $paged = null ) {
    global $wp_query;

    if ( $custom_query ) {
        $main_query = $custom_query;
    } else {
        $main_query = $wp_query;
    }

    $paged = ( $paged ) ? $paged : get_query_var( 'paged' );
    $big   = 999999999;
    $total = isset( $main_query->max_num_pages ) ? $main_query->max_num_pages : '';
    if ( $total > 1 ) {
        echo '<div class="pagenavi">';
    }
    echo paginate_links( array(
        'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
        'format'    => '?paged=%#%',
        'current'   => max( 1, $paged ),
        'total'     => $total,
        'mid_size'  => '4',
        'prev_text' => '<i class="far fa-chevron-left"></i>',
        'next_text' => '<i class="far fa-chevron-right"></i>',
    ) );
    if ( $total > 1 ) {
        echo '</div>';
    }
}

function category_url_by_slug( $slug ) {
    $cat_obj = get_category_by_slug( $slug ); 
    $cat_id  = $cat_obj->term_id;

    echo get_category_link( $cat_id );
}