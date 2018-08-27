<?php
/**
 * finance functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package finance
 */

if ( ! function_exists( 'finance_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function finance_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on finance, use a find and replace
		 * to change 'finance' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'finance', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'main_menu' => esc_html__( 'Main Menu', 'finance' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,			
		) );
	}
endif;
add_action( 'after_setup_theme', 'finance_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function finance_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'finance_content_width', 640 );
}
add_action( 'after_setup_theme', 'finance_content_width', 0 );

//Blog page pagination
if ( ! function_exists( 'post_pagination' ) ) :
   function post_pagination() {
     the_posts_pagination( array(
    'mid_size' => 2,
    'prev_text' => __( '&laquo;', 'finance' ),
    'next_text' => __( '&raquo;', 'finance' ),
) );
   }
endif;

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Implement All CSS and JS.
 */
include_once (get_template_directory() . '/inc/enqueue.php');

/**
 * Implement Dropdown Menu.
 */
include_once (get_template_directory().'/inc/navwalker.php');

/**
 * Implement the Custom Widget feature.
 */
include_once (get_template_directory() . '/inc/custom-widgets.php');

/**
 * Implement the Custom comment field.
 */
include_once(get_template_directory().'/inc/custom-comments.php');

/**
 * Themeoptions and metabox functions.
 */
include_once (get_template_directory().'/inc/theme-metabox-and-options.php');


/**
 * Plugin Required File
 */
include_once (get_template_directory().'/inc/class-tgm-plugin-activation.php');
include_once (get_template_directory().'/inc/required-plugins.php');

//Import Demo Data
function finance_import_files() {
    return array(
        array(
            'import_file_name'             => 'Default Demo',
            'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/demo_data/finance-alldata.xml',
            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/demo_data/finance-widgets.wie',
            'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'inc/demo_data/finance-export.dat',            
            'import_notice'                => __( 'Please waiting for a few minutes, do not close the window or refresh the page until the data is imported.', 'codex_restaurant' ),
        ),
    );
    
}
add_filter( 'pt-ocdi/import_files', 'finance_import_files' );