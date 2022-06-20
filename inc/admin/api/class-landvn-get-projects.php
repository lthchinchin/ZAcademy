<?php
class Landvn_Get_Project_Controller extends WP_REST_Controller {

    public function __construct() {
        add_action('rest_api_init', array($this, 'routes'));
    }

    public function routes() {
        $this->register_routes();
    }

    /**
     * Register the routes for the objects of the controller.
     * domain/wp-json/landvn/v1/get-projects
     */
    public function register_routes() {
        $namespace = 'landvn/v1';
        $base = 'get-projects';
        register_rest_route($namespace, '/' . $base, array(
            array(
                'methods'             => WP_REST_Server::READABLE,
                'callback'            => array($this, 'get_items'),
                'permission_callback' => array($this, 'get_items_permissions_check'),
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
    public function get_items_permissions_check($request) {
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
        - orderby         'newest'           Sắp xếp - [newest | price-asc | price-desc | area-asc | area-desc]
        - cat_id          ''                 ID của loại hình dự án
        - price_from      0                  Giá từ
        - price_to        ''                 Giá đến
        - status          ''                 Trạng thái dự án [Sắp mở bán | Đang mở bán | Đã bàn giao]
        - investor_id     ''                 ID chủ đầu tư
     */
    public function get_items($request) {
        $params      = $request->get_params();

        $currentId      = isset ( $params['currentId'] ) && $params['currentId'] ? $params['currentId'] : 0;
        $limit       = isset($params['limit']) && $params['limit'] ? $params['limit'] : 10;
        $page        = isset($params['page']) && $params['page'] > 1 ? $params['page'] : 1;
        $offset      = (ceil($page) - 1) * $limit;
        $orderby     = isset($params['orderby']) && $params['orderby'] ? $params['orderby'] : 'newest';
        $cat_id      = isset($params['cat_id']) && $params['cat_id'] ? $params['cat_id'] : '';
        $investor_id = isset($params['investor_id']) && $params['investor_id'] ? $params['investor_id'] : '';
        $price_from  = isset($params['price_from']) && $params['price_from'] ? $params['price_from'] : 0;
        $price_to    = isset($params['price_to']) && $params['price_to'] ? $params['price_to'] : '';
        $status      = isset($params['status']) && $params['status'] ? $params['status'] : '';
        $city        = isset($params['city']) && $params['city'] ? $params['city'] : '';
        $search  = isset ( $params['s'] ) && $params['s'] ? $params['s'] : '';

        $args         = null;
        $cat_args     = null;
        $price_args   = null;
        $area_args    = null;
        $status_args  = null;
        $city_args    = null;
        $invest_args  = null;

        $data         = array();
        $meta_key     = '';
        $meta_order   = '';

        if(is_numeric($search)){
            $postId_args = $search;
        }else{
            $search_args = $search;
        }

        if ('price-asc' === $orderby || 'price-desc' === $orderby) {
            $meta_key   = 'price';
            $meta_order = 'price-asc' === $orderby ? 'ASC' : 'DESC';
        }

        if ('area-asc' === $orderby || 'area-desc' === $orderby) {
            $meta_key   = 'area';
            $meta_order = 'area-asc' === $orderby ? 'ASC' : 'DESC';
        }

        if ( ! empty( $cat_id ) ) {
            $cat_args = array(
                'taxonomy'  => 'loai-hinh-du-an',
                'field'     => 'term_id',
                'terms'     => $cat_id,
            );
        }

        if ( ! empty( $investor_id ) ) {
            $invest_args = array(
                'taxonomy'  => 'chu-dau-tu',
                'field'     => 'term_id',
                'terms'     => $investor_id,
            );
        }

        if ( ! empty( $price_to ) ) {
            $price_args = array(
                'key'     => 'price',
                'compare' => 'BETWEEN',
                'value'   => array($price_from, $price_to),
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

        if ( ! empty( $status ) ) {
            $status_args = array(
                'key'     => 'status',
                'compare' => 'LIKE',
                'value'   => $status,
            );
        }

        if ( ! empty( $city ) ) {
            $city_args = array(
                'key'     => 'city',
                'compare' => 'LIKE',
                'value'   => $city,
            );
        }

        if ( 'newest' === $orderby ) {
            $args = array(
                'post_status'      => 'publish',
                'posts_per_page'   => $limit,
                'offset'           => $offset,
                'post_type'        => 'du-an',
                'orderby'          => 'date',
                'order'            => 'DESC',
                'tax_query'        => array(
                    'relation'     => 'AND',
                    $cat_args,
                    $invest_args
                ),
                'meta_query'       => array(
                    'relation'     => 'AND',
                    $price_args,
                    $status_args,
                    $city_args
                ),
                's' => $search_args,
            );
        } else {
            $args = array(
                'post_status'      => 'publish',
                'posts_per_page'   => $limit,
                'offset'           => $offset,
                'post_type'        => 'du-an',
                'meta_key'         => $meta_key,
                'orderby'          => 'meta_value_num',
                'order'            => $meta_order,
                'tax_query'        => array(
                    'relation'     => 'AND',
                    $cat_args,
                    $invest_args
                ),
                'meta_query'       => array(
                    'relation'     => 'AND',
                    $price_args,
                    $status_args,
                    $city_args
                ),
                's' => $search_args,

            );
        }

        $get_projects = new WP_Query( $args );
        $res_code  = 200;
        $res_mess  = 'success';

        if ( $get_projects->have_posts() ) :

            while ( $get_projects->have_posts() ) : $get_projects->the_post();

                $invests  = wp_get_post_terms( get_the_ID(), 'chu-dau-tu', array('fields' => 'names') );
                $coordinate = get_field( 'coordinate' );


                array_push(
                    $data,
                    array(
                        'id'        => get_the_ID(),
                        'post_type' => 'du-an',
                        'title'     => get_the_title(),
                        'address'   => get_field('address'),
                        'city'      => get_field('city'),
                        'price'     => get_field('price') . ' triệu/m²',
                        'price_num'     => get_field('price'),
                        'apartment' => get_field('total_apartment'),
                        'area'      => get_field('area'),
                        'status'    => get_field('status'),
                        'thumbnail' => get_the_post_thumbnail_url(),
                        'permalink' => get_permalink(),
                        'post_date' => get_the_date( 'd/m/Y' ),
                        'isFavorite' => landvn_db_check_favorite(get_the_ID(),  $currentId),
                        'longitude' => $coordinate ? $coordinate['lng'] : '',
                        'latitude'  => $coordinate ? $coordinate['lat'] : '',
                        'investor'  => $invests ? $invests[0] : ''
                    )
                );

            endwhile;

        else :
            $res_code = 404;
            $res_mess = 'error';
            array_push(
                $data,
                'Results Not Found'
            );
        endif;

        $total_items = $get_projects->found_posts;
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
new Landvn_Get_Project_Controller();