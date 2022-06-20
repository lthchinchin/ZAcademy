<?php
class Landvn_Get_Buy_Controller extends WP_REST_Controller {

    public function __construct() {
        add_action( 'rest_api_init', array( $this, 'routes') );
    }

    public function routes() {
        $this->register_routes();
    }

    /**
     * Register the routes for the objects of the controller.
     * domain/wp-json/landvn/v1/get-items
     */
    public function register_routes() {
        $namespace = 'landvn/v1';
        $base = 'get-items';
        register_rest_route( $namespace, '/' . $base, array(
            array(
                'methods'             => WP_REST_Server::READABLE,
                'callback'            => array( $this, 'get_items' ),
                'permission_callback' => array( $this, 'get_items_permissions_check' ),
                'args'                => array(),
            )
        ));
    }


    /**
     * Check if a given request has access to get items
     *
     * @param WP_REST_Request $request Full data about the request.
     * @return WP_Error|bool
     */
    public function get_items_permissions_check( $request ) {
        return true;
    }

    /**
     * Get a collection of items
     *
     * @param WP_REST_Request $request Full data about the request.
     * @return WP_Error|WP_REST_Response
     * 
     * Notes:
        PARAMS            DEFAULT VALUE      DESCRIPTION - [OPTION VALUES]
        - limit           10                 Số lượng BĐS trên một page 
        - page            1                  Page hiện tại
        - post_type       'bds-ban'          Loại hình BĐS - [bds-ban | bds-cho-thue]
        - orderby         'newest'           Sắp xếp - [newest | price-asc | price-desc | area-asc | area-desc]
        - cat_id          ''                 ID của danh mục BĐS 
        - price_from      0                  Giá từ
        - price_to        ''                 Giá đến
        - area_from       0                  Diện tích từ
        - area_to         ''                 Diện tích đến
        - city            ''                 Thành phố
        - district        ''                 Quận/huyện
        - wards           ''                 Xã/phường
        - facade          ''                 Mặt tiền - [0-3 | 3-5 | 5-7 | 7-10 | 10-15 | 15-n]
        - entrance        ''                 Đường vào - [dr | mpmd | nh | n1ot | n2ot | n2ottl]
        - direction       ''                 Hướng BĐS - [dong | tay | nam | bac | dong-nam ... ]
     */
    public function get_items( $request ) {
        $params     = $request->get_params();
        $today      = date('Ymd');

        $currentId      = isset ( $params['currentId'] ) && $params['currentId'] ? $params['currentId'] : 0;
        $limit      = isset ( $params['limit'] ) && $params['limit'] ? $params['limit'] : 10;
        $page       = isset ( $params['page'] ) && $params['page'] > 1 ? $params['page'] : 1;
        $offset     = ( ceil( $page ) - 1 ) * $limit;
        $post_type  = isset ( $params['post_type'] ) && $params['post_type'] ? $params['post_type'] : 'bds-ban';
        $orderby    = isset ( $params['orderby'] ) && $params['orderby'] ? $params['orderby'] : 'newest';
        $cat_id     = isset ( $params['cat_id'] ) && $params['cat_id'] ? $params['cat_id'] : '';
        $price_from = isset ( $params['price_from'] ) && $params['price_from'] ? $params['price_from'] : 0;
        $price_to   = isset ( $params['price_to'] ) && $params['price_to'] ? $params['price_to'] : '';
        $area_from  = isset ( $params['area_from'] ) && $params['area_from'] ? $params['area_from'] : 0;
        $area_to    = isset ( $params['area_to'] ) && $params['area_to'] ? $params['area_to'] : '';
        $city       = isset ( $params['city'] ) && $params['city'] ? $params['city'] : '';
        $district   = isset ( $params['district'] ) && $params['district'] ? $params['district'] : '';
        $wards      = isset ( $params['wards'] ) && $params['wards'] ? $params['wards'] : '';
        $facade     = isset ( $params['facade'] ) && $params['facade'] ? $params['facade'] : '';
        $entrance   = isset ( $params['entrance'] ) && $params['entrance'] ? $params['entrance'] : '';
        $direction  = isset ( $params['direction'] ) && $params['direction'] ? $params['direction'] : '';
        $search  = isset ( $params['s'] ) && $params['s'] ? $params['s'] : '';

        $args           = null;
        $cat_args       = null;
        $price_args     = null;
        $area_args      = null;
        $city_args      = null;
        $district_args  = null;
        $wards_args     = null;
        $facade_args    = null;
        $entrance_args  = null;
        $direction_args = null;
        $postId_args = null;
        $search_args = null;

        $data        = array();
        $meta_key    = '';
        $meta_order  = '';

        if(is_numeric($search)){
            $postId_args = $search;
        }else{
            $search_args = $search;
        }

        if ( 'price-asc' === $orderby || 'price-desc' === $orderby ) {
            $meta_key   = 'price';
            $meta_order = 'price-asc' === $orderby ? 'ASC' : 'DESC';
        }

        if ( 'area-asc' === $orderby || 'area-desc' === $orderby ) {
            $meta_key   = 'area';
            $meta_order = 'area-asc' === $orderby ? 'ASC' : 'DESC';
        }

        if ( ! empty( $cat_id ) ) {
            $cat_args = array(
                'taxonomy'  => 'bds-ban' === $post_type || 'bds-daban' === $post_type ? 'loai-hinh-bds' : 'loai-hinh-cho-thue',
                'field'     => 'term_id',
                'terms'     => $cat_id,
            );
        }

        if ( ! empty( $price_to ) ) {
            $price_args = array(
                'key'     => 'price',
                'compare' => 'BETWEEN',
                'value'   => array( $price_from, $price_to ),
                'type'    => 'NUMERIC'
            );
        } else {
            $price_args = array(
                'key'     => 'price',
                'compare' => '>=',
                'value'   => $price_from,
                'type'    => 'NUMERIC',
            );
        }

        if ( ! empty( $facade ) ) {
            switch( $facade ) {
                case '0-3':
                    $facade_args = array(
                        'key'     => 'facade',
                        'compare' => 'BETWEEN',
                        'value'   => array( 0, 3 ),
                        'type'    => 'DECIMAL',
                    );
                    break;
                case '3-5':
                    $facade_args = array(
                        'key'     => 'facade',
                        'compare' => 'BETWEEN',
                        'value'   => array( 3, 5 ),
                        'type'    => 'DECIMAL',
                    );
                    break;
                case '5-7':
                    $facade_args = array(
                        'key'     => 'facade',
                        'compare' => 'BETWEEN',
                        'value'   => array( 5, 7 ),
                        'type'    => 'DECIMAL',
                    );
                    break;
                case '7-10':
                    $facade_args = array(
                        'key'     => 'facade',
                        'compare' => 'BETWEEN',
                        'value'   => array( 7, 10 ),
                        'type'    => 'DECIMAL',
                    );
                    break;
                case '10-15':
                    $facade_args = array(
                        'key'     => 'facade',
                        'compare' => 'BETWEEN',
                        'value'   => array( 10, 15 ),
                        'type'    => 'DECIMAL',
                    );
                    break;
                case '15-n':
                    $facade_args = array(
                        'key'     => 'facade',
                        'compare' => '>=',
                        'value'   => 15,
                        'type'    => 'DECIMAL',
                    );
                    break;
                default: 
                    $facade_args = array();
                    break;
            }
            
        }

        if ( ! empty( $area_to ) ) {
            $area_args = array(
                'key'     => 'area',
                'compare' => 'BETWEEN',
                'value'   => array( $area_from, $area_to ),
                'type'    => 'NUMERIC'
            );
        } else {
            $area_args = array(
                'key'     => 'area',
                'compare' => '>=',
                'value'   => $area_from,
                'type'    => 'NUMERIC',
            );
        }

        if ( ! empty( $entrance ) ) {
            $entrance_args = array(
                'key'     => 'entrance',
                'compare' => '=',
                'value'   => $entrance,
            );
        }

        if ( ! empty( $direction ) ) {
            $direction_args = array(
                'key'     => 'direction',
                'compare' => '=',
                'value'   => $direction,
            );
        }

        if ( ! empty( $city ) ) {
            $city_args = array(
                'key'     => 'city',
                'compare' => 'LIKE',
                'value'   => $city,
            );

            if ( ! empty( $district ) ) {
                $district_args = array(
                    'key'     => 'district',
                    'compare' => 'LIKE',
                    'value'   => $district,
                );

                if ( ! empty( $wards ) ) {
                    $wards_args = array(
                        'key'     => 'ward',
                        'compare' => 'LIKE',
                        'value'   => $wards,
                    );
                }
            }
        }

        if ( 'newest' === $orderby ) {
            $args = array(
                'post_status'      => 'publish',
                'posts_per_page'   => $limit,
                'offset'           => $offset,
                'post_type'        => $post_type === 'bds-daban' ? 'bds-ban' : $post_type,
                'orderby'          => 'date',
                'order'            => 'DESC',
                'meta_query'       => array(
                    'relation'     => 'AND',
                    array(
                        'key'      => 'deadline_post',
                        'compare'  =>  $post_type === 'bds-daban' ? '<' : '>=',
                        'value'    => $today,
                        'type'     => 'DATE',
                    ),
                    $price_args,
                    $area_args,
                    $city_args,
                    $district_args,
                    $wards_args,
                    $facade_args,
                    $entrance_args,
                    $direction_args
                ),
                'p' => $postId_args,
                's' => $search_args,
                'tax_query'        => array(
                    $cat_args
                )
            );
        } else {
            $args = array(
                'post_status'      => 'publish',
                'posts_per_page'   => $limit,
                'offset'           => $offset,
                'post_type'        => $post_type === 'bds-daban' ? 'bds-ban' : $post_type,
                'meta_key'         => $meta_key,
                'orderby'          => 'meta_value_num',
                'order'            => $meta_order,
                'meta_query'       => array(
                    'relation'     => 'AND',
                    array(
                        'key'      => 'deadline_post',
                        'compare'  => $post_type === 'bds-daban' ? '<' : '>=',
                        'value'    => $today,
                        'type'     => 'DATE',
                    ),
                    $price_args,
                    $area_args,
                    $city_args,
                    $district_args,
                    $wards_args,
                    $facade_args,
                    $entrance_args,
                    $direction_args
                ),  
                'p' => $postId_args,
                's' => $search_args,
                'tax_query'        => array(
                    $cat_args
                )
                
            );
        }

        $get_items = new WP_Query( $args );
        $res_code  = 200;
        $res_mess  = 'success';
        if ( $get_items->have_posts() ) :
            while ( $get_items->have_posts() ) : $get_items->the_post();

                $category = wp_get_post_terms( get_the_ID(), 'loai-hinh-bds', array( 'fields' => 'names' ) );
                if ( 'bds-cho-thue' === $post_type ) {
                    $category = wp_get_post_terms( get_the_ID(), 'loai-hinh-cho-thue', array( 'fields' => 'names' ) );
                }

                $id_display = 'BAN' . get_the_ID();
                if ( 'bds-cho-thue' === $post_type ) {
                    $id_display = 'THUE' . get_the_ID();
                }
                if ( 'bds-daban' === $post_type ) {
                    $id_display = 'BAN' . get_the_ID();
                }

                $coordinate = get_field( 'coordinate' );
                $currentAccId = get_current_user_id();

                array_push(
                    $data, array(
                        'id'         => get_the_ID(),
                        'id_display' => $id_display,
                        'post_type'  => $post_type,
                        'category'   => $category[0],
                        'title'      => get_the_title(),
                        'price'      => landvn_convert_number_price_to_words( get_field( 'price' ) ),
                        'price_num'      => get_field( 'price' ),
                        'address'    => array(
                            'location' => get_field( 'location' ),
                            'ward'     => get_field( 'ward' ),
                            'district' => get_field( 'district' ),
                            'city'     => get_field( 'city' ),
                        ),
                        'area'      => get_field( 'area' ),
                        'facade'    => get_field( 'facade' ),
                        'entrance'    => get_field( 'entrance' ),
                        'direction' => get_field( 'direction' ),
                        'post_date' => get_the_date( 'd/m/Y' ),
                        'isFavorite' => landvn_db_check_favorite(get_the_ID(),  $currentId),
                        'isVip' => get_field( 'post_type' ) == 3 ? true : false,
                        // 'isFavorite' => 'jjjjjjj',
                        // 'content'   => get_the_content(),
                        // 'author'    => array(
                        //     'name'  => get_field( 'contact_name' ),
                        //     'phone' => get_field( 'contact_phone_number' ),
                        //     'address' => get_field( 'contact_email' )
                        // ),
                        'thumbnail' => get_the_post_thumbnail_url(),
                        'permalink' => get_permalink(),
                        'longitude' => $coordinate ? $coordinate['lng'] : '',
                        'latitude'  => $coordinate ? $coordinate['lat'] : ''
                    )
                );
            endwhile;
        else :
            $res_code = 404;
            $res_mess = 'error';
            array_push(
                $data, 'Results Not Found'
            );
        endif;

        $total_items = $get_items->found_posts;
        $total_pages = ceil( $total_items / $limit );

        $response = array(
            'code'         => $res_code,
            'message'      => $res_mess,
            'data'         => $data,
            'limit'        => (int) $limit,
            'current_page' => (int) $page,
            'total_items'  => (int) $total_items,
            'total_pages'  => (int) $total_pages
        );

        wp_reset_postdata();

        return new WP_REST_Response( $response, 200 );
    }
}

new Landvn_Get_Buy_Controller();