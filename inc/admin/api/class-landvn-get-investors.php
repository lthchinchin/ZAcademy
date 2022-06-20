<?php
class Landvn_Get_Investors_Controller extends WP_REST_Controller {

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
        $base = 'get-investors';
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
     */
    public function get_items( $request ) {
        $response = array();
        $terms    = get_terms(
            array(
                'taxonomy'   => 'chu-dau-tu',
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

new Landvn_Get_Investors_Controller();