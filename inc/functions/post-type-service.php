<?php
// Register Custom Post Type
function post_type_service()
{

	$labels = array(
		'name'                  => _x('Dịch Vụ', 'Post Type General Name', 'blog'),
		'singular_name'         => _x('Dịch Vụ', 'Post Type Singular Name', 'blog'),
		'menu_name'             => __('Dịch Vụ', 'blog'),
		'name_admin_bar'        => __('Dịch Vụ', 'blog'),
		'archives'              => __('Item Archives', 'blog'),
		'attributes'            => __('Item Attributes', 'blog'),
		'parent_item_colon'     => __('Parent Item:', 'blog'),
		'all_items'             => __('Tất cả Sản Phẩm D.Vụ', 'blog'),
		'add_new_item'          => __('Thêm Sản Phẩm D.Vụ', 'blog'),
		'add_new'               => __('Thêm Sản Phẩm D.Vụ', 'blog'),
		'new_item'              => __('Sản Phẩm Dịch Vụ mới', 'blog'),
		'edit_item'             => __('Sửa Sản Phẩm Dịch Vụ', 'blog'),
		'update_item'           => __('Cập nhập Sản Phẩm Dịch Vụ', 'blog'),
		'view_item'             => __('Xem Sản Phẩm Dịch Vụ', 'blog'),
		'view_items'            => __('Xem Sản Phẩm Dịch Vụ', 'blog'),
		'search_items'          => __('Tìm kiếm Sản Phẩm Dịch Vụ', 'blog'),
		'not_found'             => __('Không tìm thấy Sản Phẩm Dịch Vụ nào', 'blog'),
		'not_found_in_trash'    => __('Không tìm thấy Sản Phẩm Dịch Vụ nào', 'blog'),
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
		'label'                 => __('Dịch Vụ', 'blog'),
		'description'           => __('Dịch Vụ', 'blog'),
		'labels'                => $labels,
		'supports'              => array('title', 'editor', 'thumbnail', 'excerpt'),
		'taxonomies'            => array('danh-muc-dich-vu'),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-align-wide',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type('dich-vu', $args);
}
add_action('init', 'post_type_service', 0);

// Register Custom Taxonomy
function taxonomy_service_category()
{

	$labels = array(
		'name'                       => _x('Danh mục Dịch Vụ', 'Taxonomy General Name', 'blog'),
		'singular_name'              => _x('Danh mục Dịch Vụ', 'Taxonomy Singular Name', 'blog'),
		'menu_name'                  => __('Danh mục Dịch Vụ', 'blog'),
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
	register_taxonomy('danh-muc-dich-vu', array('dich-vu'), $args);
}
add_action('init', 'taxonomy_service_category', 0);

/**
 * Display advanced TinyMCE editor in taxonomy page
 */
// function wpse_7156_enqueue_category()
// {
// 	global $pagenow, $current_screen;

// 	if ($pagenow == 'edit-tags.php') {
// 		require_once(ABSPATH . 'wp-admin/includes/post.php');
// 		require_once(ABSPATH . 'wp-admin/includes/template.php');

// 		wp_tiny_mce(false, array('editor_selector' => 'description', 'elements' => 'description', 'mode' => 'exact'));
// 	}
// }
// add_action('init', 'wpse_7156_enqueue_category');
