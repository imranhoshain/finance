<?php

//Slider Custom register function
function finance_theme_custom_post()
{
    
    //Finance Main Slider
    register_post_type('finance-slide', array(
        'label' => 'slides',
        'labels' => array(
            'name' => 'Slides',
            'singular_name' => 'slide'
        ),
        'public' => false,
        'menu_icon' => 'dashicons-slides',
        'show_ui' => true,
        'supports' => array(
            'title',
            'editor',
            'thumbnail',
            'custom-fields',
            'excerpt'
        )
        
        
    ));
    
    //Isoptop Custom Post
    register_post_type('portfolio-isotop', array(
        'label' => 'isotop',
        'labels' => array(
            'name' => 'Portfolios',
            'singular_name' => 'isotop'
        ),
        'public' => true,
        'menu_icon' => 'dashicons-images-alt',
        'show_ui' => true,
        'supports' => array(
            'title',
            'editor',
            'thumbnail',
            'custom-fields',
            'excerpt'
        )
  
    ));
    
    //Testimonials Custom Post Slider
    register_post_type('testi-slider', array(
        'label' => 'testi',
        'labels' => array(
            'name' => 'Testimonials',
            'singular_name' => 'testimonial'
        ),
        'public' => true,
        'menu_icon' => 'dashicons-admin-comments',
        'show_ui' => true,
        'supports' => array(
            'title',
            'editor',
            'thumbnail',
            'custom-fields',
            'excerpt'
        )
    ));
    
}
add_action('init', 'finance_theme_custom_post');