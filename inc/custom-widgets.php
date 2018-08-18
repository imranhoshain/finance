<?php

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function finance_widgets_init() {
	//Blog Right Sidebar
	register_sidebar( array(
		'name'          => esc_html__( 'Blog Right Sidebar', 'finance' ),
		'id'            => 'blog_right_sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'finance' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="sidebar-title"><h3>',
		'after_title'   => '</h3></div>',
	) );

	//Blog Left Sidebar
	register_sidebar( array(
		'name'          => esc_html__( 'Blog Left Sidebar', 'finance' ),
		'id'            => 'blog_left_sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'finance' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'finance_widgets_init' );