<?php
// Register Custom Post Type
function post_type_product()
{

	$labels = array(
		'name'                  => _x('Sản phẩm', 'Post Type General Name', 'blog'),
		'singular_name'         => _x('Sản phẩm', 'Post Type Singular Name', 'blog'),
		'menu_name'             => __('Sản phẩm', 'blog'),
		'name_admin_bar'        => __('Sản phẩm', 'blog'),
		'archives'              => __('Item Archives', 'blog'),
		'attributes'            => __('Item Attributes', 'blog'),
		'parent_item_colon'     => __('Parent Item:', 'blog'),
		'all_items'             => __('Tất cả sản phẩm', 'blog'),
		'add_new_item'          => __('Thêm sản phẩm', 'blog'),
		'add_new'               => __('Thêm sản phẩm', 'blog'),
		'new_item'              => __('Sản phẩm mới', 'blog'),
		'edit_item'             => __('Sửa sản phẩm', 'blog'),
		'update_item'           => __('Cập nhập sản phẩm', 'blog'),
		'view_item'             => __('Xem sản phẩm', 'blog'),
		'view_items'            => __('Xem sản phẩm', 'blog'),
		'search_items'          => __('Tìm kiếm sản phẩm', 'blog'),
		'not_found'             => __('Không tìm thấy sản phẩm nào', 'blog'),
		'not_found_in_trash'    => __('Không tìm thấy sản phẩm nào', 'blog'),
		'featured_image'        => __('Ảnh đại diện', 'blog'),
		'set_featured_image'    => __('Đặt ảnh đại diện', 'blog'),
		'remove_featured_image' => __('Xoá ảnh đại diện', 'blog'),
		'use_featured_image'    => __('Use as featured image', 'blog'),
		'insert_into_item'      => __('Insert into item', 'blog'),
		'uploaded_to_this_item' => __('Uploaded to this item', 'blog'),
		'items_list'            => __('Items list', 'blog'),
		'items_list_navigation' => __('Items list navigation', 'blog'),
		'filter_items_list'     => __('Filter items list', 'blog'),
	);
	$args = array(
		'label'                 => __('Sản phẩm', 'blog'),
		'description'           => __('Sản phẩm', 'blog'),
		'labels'                => $labels,
		'supports'              => array('title', 'editor', 'thumbnail', 'excerpt'),
		'taxonomies'            => array('danh-muc-san-pham'),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-cart',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type('san-pham', $args);
}
add_action('init', 'post_type_product', 0);

// Register Custom Taxonomy
function taxonomy_product_category()
{

	$labels = array(
		'name'                       => _x('Danh mục sản phẩm', 'Taxonomy General Name', 'blog'),
		'singular_name'              => _x('Danh mục sản phẩm', 'Taxonomy Singular Name', 'blog'),
		'menu_name'                  => __('Danh mục sản phẩm', 'blog'),
		'all_items'                  => __('Tất cả danh mục', 'blog'),
		'parent_item'                => __('Danh mục cha', 'blog'),
		'parent_item_colon'          => __('Parent Item:', 'blog'),
		'new_item_name'              => __('Thêm danh mục', 'blog'),
		'add_new_item'               => __('Thêm danh mục', 'blog'),
		'edit_item'                  => __('Sửa danh mục', 'blog'),
		'update_item'                => __('Cập nhập danh mục', 'blog'),
		'view_item'                  => __('Xem danh mục', 'blog'),
		'separate_items_with_commas' => __('Separate items with commas', 'blog'),
		'add_or_remove_items'        => __('Add or remove items', 'blog'),
		'choose_from_most_used'      => __('Choose from the most used', 'blog'),
		'popular_items'              => __('Popular Items', 'blog'),
		'search_items'               => __('Tìm kiếm', 'blog'),
		'not_found'                  => __('Not Found', 'blog'),
		'no_terms'                   => __('No items', 'blog'),
		'items_list'                 => __('Items list', 'blog'),
		'items_list_navigation'      => __('Items list navigation', 'blog'),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy('danh-muc-san-pham', array('san-pham'), $args);
}
add_action('init', 'taxonomy_product_category', 0);
