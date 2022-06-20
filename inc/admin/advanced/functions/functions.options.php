<?php
add_action('init', 'of_options');

if (!function_exists('of_options')) {
	/**
	 * Advance Theme Options.
	 *
	 * @global array $of_options Description.
	 *
	 * @return void.
	 */
	function of_options()
	{
		// Access the WordPress Categories via an Array.
		$of_categories     = array();
		$of_categories_obj = get_categories('hide_empty=0');
		foreach ($of_categories_obj as $of_cat) {
			$of_categories[$of_cat->cat_ID] = $of_cat->cat_name;
		}

		// Access the WordPress Pages via an Array.
		$of_pages      = array();
		$of_pages_obj  = get_pages('sort_column=post_parent,menu_order');
		$of_pages['0'] = 'Select a page:';
		foreach ($of_pages_obj as $of_page) {
			$of_pages[$of_page->ID] = $of_page->post_title;
		}

		// Set the Options Array.
		global $of_options;
		$of_options = array();

		$of_options[] = array(
			'name' => 'Global Settings',
			'type' => 'heading',
		);

		$of_options[] = array(
			'name' => 'Header Scripts',
			'desc' => 'Add custom scripts inside HEAD tag. You need to have a SCRIPT tag around scripts.',
			'id'   => 'html_scripts_header',
			'std'  => '',
			'type' => 'textarea',
		);

		$of_options[] = array(
			'name' => 'Footer Scripts',
			'desc' => 'Add custom scripts you might want to be loaded in the footer of your website. You need to have a SCRIPT tag around scripts.',
			'id'   => 'html_scripts_footer',
			'std'  => '',
			'type' => 'textarea',
		);

		$of_options[] = array(
			'name' => 'Body Scripts - Top',
			'desc' => 'Add custom scripts just after the BODY tag opened. You need to have a SCRIPT tag around scripts.',
			'id'   => 'html_scripts_after_body',
			'std'  => '',
			'type' => 'textarea',
		);

		$of_options[] = array(
			'name' => 'Contact Settings',
			'type' => 'heading',
		);
		$of_options[] = array(
			'name' => 'Phone',
			'desc' => '',
			'id'   => 'html_phone',
			'std'  => '',
			'type' => 'text',
		);
		$of_options[] = array(
			'name' => 'Email',
			'desc' => '',
			'id'   => 'html_email',
			'std'  => '',
			'type' => 'text',
		);
		$of_options[] = array(
			'name' => 'Địa Chỉ',
			'desc' => '',
			'id'   => 'html_address',
			'std'  => '',
			'type' => 'text',
		);

		//Logo & Favicon
		$of_options[] = array(
			'name' => 'Social Settings',
			'type' => 'heading',
		);
		$of_options[] = array(
			'name' => 'Facebook URL',
			'desc' => '',
			'id'   => 'html_facebook',
			'std'  => '',
			'type' => 'text',
		);
		$of_options[] = array(
			'name' => 'Twitter URL',
			'desc' => '',
			'id'   => 'html_twitter',
			'std'  => '',
			'type' => 'text',
		);
		$of_options[] = array(
			'name' => 'Instagram URL',
			'desc' => '',
			'id'   => 'html_instagram',
			'std'  => '',
			'type' => 'text',
		);
		$of_options[] = array(
			'name' => 'Youtube URL',
			'desc' => '',
			'id'   => 'html_youtube',
			'std'  => '',
			'type' => 'text',
		);

		$of_options[] = array(
			'name' => 'Linked In URL',
			'desc' => '',
			'id'   => 'html_linkedin',
			'std'  => '',
			'type' => 'text',
		);


		//Logo & Favicon
		$of_options[] = array(
			'name' => 'Header',
			'type' => 'heading',
		);
		$of_options[] = array(
			'name' => 'Header Logo',
			'desc' => 'Add header logo here',
			'id'   => 'html_logo_header',
			'std'  => '',
			'type' => 'upload',
		);
		$of_options[] = array(
			'name' => 'Slogan',
			'desc' => 'Add header slogan here',
			'id'   => 'html_slogan_header',
			'std'  => '',
			'type' => 'text',
		);
		$of_options[] = array(
			'name' => 'Mobile Logo',
			'desc' => 'Add mobile logo here',
			'id'   => 'html_mobile_logo',
			'std'  => '',
			'type' => 'upload',
		);
		$of_options[] = array(
			'name' => 'Favicon Icon',
			'desc' => 'Add Favicon icon here',
			'id'   => 'html_favicon_icon',
			'std'  => '',
			'type' => 'upload',
		);
		$of_options[] = array(
			'name' => 'Sticky Header',
			'type' => 'checkbox',
			'id'   => 'wp_sticky_header',
			'std'  => 0,
			'desc' => 'Sticky when scrolling down',
		);


		//Footer
		$of_options[] = array(
			'name' => 'Footer',
			'type' => 'heading',
		);
		$of_options[] = array(
			'name' => 'Footer Logo',
			'desc' => 'Add footer logo here',
			'id'   => 'html_footer_header',
			'std'  => '',
			'type' => 'upload',
		);
		$of_options[] = array(
			'name' => 'Footer Copyright',
			'desc' => '',
			'id'   => 'html_copyright',
			'std'  => '',
			'type' => 'textarea',
		);
		//Woocommerce
		$of_options[] = array(
			'name' => 'Woocommerce',
			'type' => 'heading',
		);
		$of_options[] = array(
			'name' => 'Enable Product Category',
			'type' => 'checkbox',
			'id'   => 'wp_enable_category',
			'std'  => 0,
			'desc' => 'Show category name in archive category or shop page',
		);


		// Performance.
		$of_options[] = array(
			'name' => 'Performance',
			'type' => 'heading',
		);

		$of_options[] = array(
			'name' => '',
			'type' => 'info',
			'desc' => '<p style="font-size:14px">Use with caution! Disable if you have plugin compatibility problems.</p>',
		);

		$of_options[] = array(
			'name' => 'Disable theme style.css',
			'type' => 'checkbox',
			'id'   => 'flatsome_disable_style_css',
			'std'  => 0,
			'desc' => 'Disable loading of theme style.css. This file is only needed if you have added custom CSS to that file.',
		);

		$of_options[] = array(
			'name' => 'Disable Emoji script',
			'type' => 'checkbox',
			'id'   => 'disable_emoji',
			'std'  => 0,
			'desc' => 'Remove WP emoji scripts from front-end.',
		);

		$of_options[] = array(
			'name' => 'Disable Block library css',
			'type' => 'checkbox',
			'id'   => 'disable_blockcss',
			'std'  => 0,
			'desc' => 'Remove default block library css coming from WordPress',
		);

		$of_options[] = array(
			'name' => 'Disable jQuery Migrate',
			'type' => 'checkbox',
			'id'   => 'jquery_migrate',
			'std'  => 0,
			'desc' => 'Remove jQuery Migrate. Most up-to-date front-end code and plugins don’t require jquery-migrate.min.js. More often than not, keeping this - simply adds unnecessary load to your site. (for < WP 5.5)',
		);


		$of_options[] = array(
			'name' => 'Google APIs',
			'type' => 'heading',
		);

		$of_options[] = array(
			'name' => 'Google Maps API',
			'desc' => "Enter Google Maps API key here to enable Maps. You can generate one here: <a target='_blank' href='https://developers.google.com/maps/documentation/javascript/get-api-key'>Google Maps API</a>",
			'id'   => 'google_map_api',
			'std'  => '',
			'type' => 'text',
		);

		$of_options[] = array(
			'name' => 'Google Capcha API',
			'id'   => 'google_capcha_api',
			'std'  => '',
			'type' => 'text',
		);

		$of_options[] = array(
			'name' => 'OTP API',
			'id'   => 'otp_api',
			'std'  => '',
			'type' => 'text',
		);

		// Integrations.
		$of_options[] = array(
			'name' => 'Integrations',
			'type' => 'heading',
		);

		$of_options[] = array(
			'name' => '',
			'type' => 'info',
			'desc' => '<p style="font-size:14px">Additional options for integrated plugins will be shown here if they are activated.</p>',
		);

		$of_options[] = array(
			'name' => 'Disable Site Update',
			'id'   => 'html_disable_update',
			'desc' => 'Enable access to update Plugin and Theme',
			'std'  => 1,
			'type' => 'checkbox',
		);


		// Backup Options.
		$of_options[] = array(
			'name' => 'Backup and Import',
			'type' => 'heading',
		);

		$of_options[] = array(
			'name' => 'Backup and Restore Options',
			'id'   => 'of_backup',
			'std'  => '',
			'type' => 'backup',
			'desc' => 'You can use the two buttons below to backup your current options, and then restore it back at a later time. This is useful if you want to experiment on the options but would like to keep the old settings in case you need it back.',
		);

		$of_options[] = array(
			'name' => 'Transfer Theme Options Data',
			'id'   => 'of_transfer',
			'std'  => '',
			'type' => 'transfer',
			'desc' => 'You can transfer the saved options data between different installs by copying the text inside the text box. To import data from another install, replace the data in the text box with the one from another install and click "Import Options".',
		);
	} // End of 'of_options()' function.
} // End check if function exists: of_options()
