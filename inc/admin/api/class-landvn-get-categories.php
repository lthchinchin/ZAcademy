<?php
class Landvn_Get_Categories_Controller extends WP_REST_Controller {

    public function __construct() {
        add_action( 'rest_api_init', array( $this, 'routes') );
    }

    public function routes() {
        $this->register_routes();
    }

    /**
     * Register the routes for the objects of the controller.
     */
    public function register_routes() {
        $namespace = 'landvn/v1';
        $base = 'get-categories';
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
        - post_type       'bds-ban'          Get category based on post_type [bds-ban, bds-cho-thue, du-an] 
     */
    public function get_items( $request ) {
        $params    = $request->get_params();
        $response  = array();
        $post_type = isset ( $params['post_type'] ) && $params['post_type'] ? $params['post_type'] : 'bds-ban';
        $taxonomy  = 'loai-hinh-bds';

        switch ( $post_type ) {
            case 'bds-cho-thue':
                $taxonomy = 'loai-hinh-cho-thue';
                break;
            case 'du-an':
                $taxonomy = 'loai-hinh-du-an';
                break;
            default:
                $taxonomy = 'loai-hinh-bds';
                break;
        }

        $terms = get_terms(
            array(
                'taxonomy'   => $taxonomy,
                'hide_empty' => false,
                'orderby'    => 'date',
                'order'      => 'ACS'
            )
        );

        foreach ( $terms as $term ) {
            array_push(
                $response, array(
                    'id'   => $term->term_id,
                    'name' => $term->name,
                    'slug' => $term->slug,
                )
            );
        }

        return new WP_REST_Response( $response, 200 );
    }

}

new Landvn_Get_Categories_Controller();