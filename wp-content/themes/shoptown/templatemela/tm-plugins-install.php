<?php
/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.5.2 for parent theme shoptown for publication on ThemeForest
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 */
require trailingslashit(get_template_directory()) . '/templatemela/class-tgm-plugin-activation.php' ;

add_action( 'tgmpa_register', 'shoptown_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function shoptown_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		// This is an example of how to include a plugin bundled with a theme.		
		array(
			'name'               => esc_html__( 'Templatemela MetaBox', 'shoptown' ), // The plugin name.
			'slug'               => 'TemplatemelaMetaBox', // The plugin slug (typically the folder name).
			'source'             => 'http://www.templatemela.com/wooPlugins/shopTownDdfeikr3/kdfdReaj3Adf/TemplatemelaMetaBox.zip', // The plugin source.
			'required'           => true, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '1.0', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.			
			'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
		),
		array(
			'name'               => esc_html__( 'Templatemela Shortcodes', 'shoptown' ), // The plugin name.
			'slug'               => 'TemplatemelaShortcodes', // The plugin slug (typically the folder name).
			'source'             => 'http://www.templatemela.com/wooPlugins/shopTownDdfeikr3/kdfdReaj3Adf/TemplatemelaShortcodes.zip', // The plugin source.
			'required'           => true, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '1.0', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.			
			'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
		),
		array(
			'name'               => esc_html__( 'Templatemela CustomPost', 'shoptown' ), // The plugin name.
			'slug'               => 'TemplatemelaCustomPost', // The plugin slug (typically the folder name).
			'source'             => 'http://www.templatemela.com/wooPlugins/shopTownDdfeikr3/kdfdReaj3Adf/TemplatemelaCustomPost.zip', // The plugin source.
			'required'           => true, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '1.0', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.	
			'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
		),	
		array(
			'name'      		 => esc_html__( 'Revolution Slider', 'shoptown' ), // The plugin name.
			'slug'     			 => 'revslider', // The plugin slug (typically the folder name).
			'source'             => 'https://templatemela.com/wooPlugins/Update-Plugins/revslider.zip', // The plugin source.
			'required'           => true, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.			
			'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
		),	
		array(
			'name'      => esc_html__( 'Black Studio Tinymce Widget', 'shoptown' ),
			'slug'      => 'black-studio-tinymce-widget',			
			'required'  => false			
		),
		array(
			'name'      => esc_html__( 'Page Builder by SiteOrigin', 'shoptown' ),
			'slug'      => 'siteorigin-panels',
			'required'  => false
		),
		array(
			'name'      => esc_html__( 'Contact Form 7', 'shoptown' ),
			'slug'      => 'contact-form-7',
			'required'  => false,
		),
		array(
			'name'      => esc_html__( 'Newsletter', 'shoptown' ),
			'slug'      => 'newsletter',
			'required'  => false,
		),		
		array(
			'name'      => esc_html__( 'Woocommerce', 'shoptown' ),
			'slug'      => 'woocommerce',
			'required'  => false,
		),
		array(
			'name'      => esc_html__( 'Woocommerce Accepted Payment Methods', 'shoptown' ),
			'slug'      => 'woocommerce-accepted-payment-methods',
			'required'  => false,
		),
		array(
			'name'      => esc_html__( 'Woocommerce Grid List Toggle', 'shoptown' ),
			'slug'      => 'woocommerce-grid-list-toggle',
			'required'  => false,
		),
		array(
			'name'      => esc_html__( 'Woosidebars', 'shoptown' ),
			'slug'      => 'woosidebars',
			'required'  => false,
		),		
		array(
			'name'      => esc_html__( 'WordPress Seo', 'shoptown' ),
			'slug'      => 'wordpress-seo',
			'required'  => false,
		),	
		array(
			'name'      => esc_html__( 'Yith Woocommerce Quick View', 'shoptown' ),
			'slug'      => 'yith-woocommerce-quick-view',
			'required'  => false,
		),
		array(
			'name'      => esc_html__( 'Yith Woocommerce Wishlist', 'shoptown' ),
			'slug'      => 'yith-woocommerce-wishlist',
			'required'  => false,
		),
		array(
			'name'      => esc_html__( 'Yith-Woocommerce-Compare', 'shoptown' ),
			'slug'      => 'yith-woocommerce-compare',
			'required'  => false,
		),
		array(
			'name'      => esc_html__( 'Yith Woocommerce Zoom Magnifier', 'shoptown' ),
			'slug'      => 'yith-woocommerce-zoom-magnifier',
			'required'  => false,
		),
		array(
			'name'      => esc_html__( 'Widget Importer Exporter', 'shoptown' ),
			'slug'      => 'widget-importer-exporter',
			'required'  => true,
		),
		array(
			'name'      => esc_html__( 'WordPress Importer', 'shoptown' ),
			'slug'      => 'wordpress-importer',
			'required'  => true,
		)
	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'shoptown',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'shoptown-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => false,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => true,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
}
?>