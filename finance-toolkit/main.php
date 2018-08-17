<?php
/*
Plugin Name: Finance Toolkit
Plugin URI: http://imranhoshain.com/plugins/finance/
Description: This is not just a plugin, This plugin for finance theme.
Author: spytoever
Version: 1.0
Author URI: https://themeforest.net/user/spytoever
Text Domain: finance
*/
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

define( 'ELEMENTOR_FINANCE_FILE__', __FILE__ );

/**
 * Load Finance Toolkit
 *
 * Load the plugin after Elementor (and other plugins) are loaded.
 *
 * @since 1.0.0
 */
function finance_load() {
	// Load localization file
	load_plugin_textdomain( 'finance-toolkit' );

	// Notice if the Elementor is not active
	if ( ! did_action( 'elementor/loaded' ) ) {
		add_action( 'admin_notices', 'finance_fail_load' );
		return;
	}

	// Check required version
	$elementor_version_required = '1.8.0';
	if ( ! version_compare( ELEMENTOR_VERSION, $elementor_version_required, '>=' ) ) {
		add_action( 'admin_notices', 'finance_fail_load_out_of_date' );
		return;
	}

	// Require the main plugin file
	require( __DIR__ . '/plugin.php' );
}
add_action( 'plugins_loaded', 'finance_load' );


//Add Elementor Widget Categories
function finance_elementor_widget_categories( $elements_manager ) {
    
	$elements_manager->add_category(
		'finance',
		[
			'title' => __( 'Finance Category', 'finance-toolkit' ),
			'icon' => 'fa fa-plug',
		]
	);	

}
add_action( 'elementor/elements/categories_registered', 'finance_elementor_widget_categories' );

function finance_fail_load_out_of_date() {
	if ( ! current_user_can( 'update_plugins' ) ) {
		return;
	}

	$file_path = 'elementor/elementor.php';

	$upgrade_link = wp_nonce_url( self_admin_url( 'update.php?action=upgrade-plugin&plugin=' ) . $file_path, 'upgrade-plugin_' . $file_path );
	$message = '<p>' . __( 'Elementor finance Toolkit is not working because you are using an old version of Elementor.', 'finance-toolkit' ) . '</p>';
	$message .= '<p>' . sprintf( '<a href="%s" class="button-primary">%s</a>', $upgrade_link, __( 'Update Elementor Now', 'finance-toolkit' ) ) . '</p>';

	echo '<div class="error">' . $message . '</div>';
}

//Plugin Css And JS
function finance_toolkit_include_files() {
    wp_enqueue_style('owl-carousel', plugins_url( '/assets/css/owl.carousel.min.css', __FILE__ ) ); 
    wp_enqueue_style('finance-toolkit', plugins_url( '/assets/css/finance-toolkit.css', __FILE__ ) ); 
    wp_enqueue_script('owl-carousel', plugins_url( '/assets/js/owl.carousel.min.js', __FILE__ ), array('jquery'), '2.2.1', 'true' );
    
}
add_action( 'wp_enqueue_scripts','finance_toolkit_include_files');

// If your string has a custom filter, add its tag name in an applicable add_filter function
add_filter( 'widget_text', 'do_shortcode' ); //For WP old version

/**
 * Implement Find me Addons.
 */
include_once ('shortcodes/custom-post.php');

/**
 * Implement Find me Addons.
 */
include_once ('shortcodes/slider-shortcode.php');

/**
 * Implement Find me Addons.
 */
include_once ('shortcodes/service-section-shortcode.php');

/**
 * Implement Find me Addons.
 */
include_once ('shortcodes/portfolio-shortcode.php');

/**
 * Implement Find me Addons.
 */
include_once ('shortcodes/counter-section-shortcode.php');

/**
 * Implement Find me Addons.
 */
include_once ('shortcodes/team-section-shortcode.php');

/**
 * Implement Find me Addons.
 */
include_once ('shortcodes/testimonial-slider-shortcode.php');

