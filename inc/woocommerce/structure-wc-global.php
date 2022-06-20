<?php
/* WooCommerce: The Code Below Removes Checkout Fields */
add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );
function custom_override_checkout_fields( $fields ) {
	// unset($fields['billing']['billing_first_name']);
	// unset($fields['billing']['billing_last_name']);
	// unset($fields['billing']['billing_company']);
	// unset($fields['billing']['billing_address_1']);
	unset($fields['billing']['billing_address_2']);
	unset($fields['billing']['billing_city']);
	unset($fields['billing']['billing_postcode']);
	// unset($fields['billing']['billing_country']);
	unset($fields['billing']['billing_state']);
	// unset($fields['billing']['billing_phone']);
	// unset($fields['order']['order_comments']);
	// unset($fields['billing']['billing_email']);
	// unset($fields['account']['account_username']);
	// unset($fields['account']['account_password']);
	// unset($fields['account']['account_password-2']);
	return $fields;
}

if ( ! function_exists( 'wp_woocommerce_shop_loop_category' ) ) {
	/**
	 * Add and/or Remove Categories
	 */
	function wp_woocommerce_shop_loop_category() {
		if(!get_theme_mod('wp_enable_category')) {
			return;
		}
	?>
		<p class="category uppercase is-smaller no-text-overflow product-cat op-7">
			<?php
			global $product;
			$product_cats = function_exists( 'wc_get_product_category_list' ) ? wc_get_product_category_list( get_the_ID(), '\n', '', '' ) : $product->get_categories( '\n', '', '' );
			$product_cats = strip_tags( $product_cats );

			if ( $product_cats ) {
				list( $first_part ) = explode( '\n', $product_cats );
				echo esc_html( apply_filters( 'wp_woocommerce_shop_loop_category', $first_part, $product ) );
			}
			?>
		</p>
	<?php
	}
}
add_action( 'woocommerce_shop_loop_item_title', 'wp_woocommerce_shop_loop_category', 0 );