<?php
/**
 * Enqueue scripts and styles.
 */
function finance_scripts() {


// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'bootstrap-min', get_template_directory_uri().'/assets/css/bootstrap.min.css', array(), '3.3.7', 'all' );
	wp_enqueue_style( 'normalize', get_template_directory_uri().'/assets/css/normalize.css', array(), '7.0.0', 'all' );
	wp_enqueue_style( 'animate-style', get_template_directory_uri().'/assets/css/animate.css', array(), '1.0', 'all' );
	wp_enqueue_style( 'animated-headline', get_template_directory_uri().'/assets/css/animated-headline.css', array(), '1.0', 'all' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/assets/css/font-awesome.css', array(), '4.6.3', 'all' );	
	wp_enqueue_style( 'magnific-popup', get_template_directory_uri().'/assets/css/magnific-popup.css', array(), '1.0', 'all' );
	wp_enqueue_style( 'owl-carousel', get_template_directory_uri().'/assets/css/owl.carousel.css', array(), '1.0', 'all' );
	wp_enqueue_style( 'camera-slider', get_template_directory_uri().'/assets/css/camera.css', array(), '1.0', 'all' );
	wp_enqueue_style( 'finance-default-style', get_template_directory_uri().'/assets/css/default.css', array(), '1.0', 'all' );
	wp_enqueue_style( 'finance-style', get_template_directory_uri().'/assets/css/style.css', array(), '1.0', 'all' );
	wp_enqueue_style( 'finance-responsive', get_template_directory_uri().'/assets/css/responsive.css', array(), '1.0', 'all' );
	wp_enqueue_style( 'finance-theme-file', get_stylesheet_uri() );
	    
	//All JS File
	wp_enqueue_script( 'modernizr', get_template_directory_uri().'/assets/js/modernizr.js', array('jquery'), '2.8.3', true );
	

	wp_enqueue_script( 'bootstrap', get_template_directory_uri().'/assets/js/bootstrap.min.js', array('jquery'), '3.3.7', true );
	//camera slider JS
    wp_enqueue_script( 'camera', get_template_directory_uri().'/assets/js/camera.min.js', array('jquery'), '1.0', true );
	//Owl slider JS
    wp_enqueue_script( 'owl-carousel-js', get_template_directory_uri().'/assets/js/owl.carousel.min.js', array('jquery'), '1.0', true );	
	//jquery.easing js
    wp_enqueue_script( 'jquery-easing', get_template_directory_uri().'/assets/js/jquery.easing.1.3.js', array('jquery'), '1.3', true );
	//waypoints js
    wp_enqueue_script( 'waypoints-min', get_template_directory_uri().'/assets/js/waypoints.min.js', array('jquery'), '1.6.2', true );
	//animated js
    wp_enqueue_script( 'animated-headline', get_template_directory_uri().'/assets/js/animated-headline.js', array('jquery'), '1.0', true );
	//magnific-popup js
    wp_enqueue_script( 'magnific-popup', get_template_directory_uri().'/assets/js/jquery.magnific-popup.min.js', array('jquery'), '1.1.0', true );
	//counterup js
    wp_enqueue_script( 'counterup-min', get_template_directory_uri().'/assets/js/jquery.counterup.min.js', array('jquery'), '1.0', true );
	//sticky js
    wp_enqueue_script( 'jquery.sticky', get_template_directory_uri().'/assets/js/jquery.sticky.js', array('jquery'), '1.0.4', true );	
	//Isotop js
    wp_enqueue_script( 'isotope-min', get_template_directory_uri().'/assets/js/isotope.min.js', array('jquery'), '3.0.1', true );
	//Google map js
    wp_enqueue_script( 'googlemap', get_template_directory_uri().'/assets/js/googlemap.js', array('jquery'), '1.0', true );	
	//main js    
	wp_enqueue_script( 'main', get_template_directory_uri().'/assets/js/main.js', array('jquery'), '1.0', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}    
    
}
add_action( 'wp_enqueue_scripts', 'finance_scripts' );
