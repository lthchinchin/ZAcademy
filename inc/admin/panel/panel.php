<?php
class CS_Admin
{

	/**
	 * Constructor
	 * Sets up the welcome screen
	 */
	public function __construct()
	{

		add_action('admin_menu', array($this, 'panel_register_menu'));
		add_action('admin_enqueue_scripts', array($this, 'wp_panel_style'));
	} // end constructor
	/**
	 * Load welcome screen css
	 * @return void
	 * @since  1.4.4
	 */
	public function wp_panel_style()
	{
		$uri     = get_template_directory_uri();
		$theme   = wp_get_theme(get_template());
		$version = $theme->get('Version');
		wp_enqueue_style('wp-panel-css', $uri . '/inc/admin/panel/panel.css', array(), $version);
	}

	/**
	 * Creates the dashboard page
	 * @see  add_theme_page()
	 * @since 1.0.0
	 */
	public function panel_register_menu()
	{
		add_menu_page('Theme_Name', 'Theme Options', 'manage_options', 'optionsframework');
	}

	/**
	 * The welcome screen
	 * @since 1.0.0
	 */
	public function panel_welcome()
	{
?>
		<div class="flatsome-panel">
			<div class="wrap about-wrap">
				<?php require_once(get_template_directory() . '/inc/admin/panel/sections/top.php'); ?>
			</div>
		</div>
<?php
	}
}
$GLOBALS['CS_Admin'] = new CS_Admin();
