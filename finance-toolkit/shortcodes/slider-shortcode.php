<?php

//Custom Slider Taxonomy OR Catagory
function finance_custom_post_taxonomy() {
    register_taxonomy(
        'slide_cat',  
        'finance-slide', //Your Post type here                 
        array(
            'hierarchical'          => true,
            'label'                 => 'Slider Category',  
            'query_var'             => true,
            'show_admin_column'     => true,
            'rewrite'               => array(
                'slug'              => 'slide_category', 
                'with_front'    => true 
                )
            )
    );
}
add_action( 'init', 'finance_custom_post_taxonomy');


//Custom Taxonomy OR Catagory Function
function finance_theme_slider_category(){
    $slide_categories = get_terms('slide_cat'); //Enter category Name
    $slide_category_options = array('' => esc_html__('All Catagory', 'finance-toolkit'));
    if($slide_categories){
        foreach ($slide_categories as $slide_category) {
            $slide_category_options[$slide_category->term_id] = $slide_category->name;
        }
    }
    return $slide_category_options;
}

//Slider ShortCode Function
function finance_slider_shortcode($atts)
{
    extract(shortcode_atts(array(
        'count' => '',
        'height' => '',
        'category' => '',
        'slider_icon' => '',
        'pagination' => 'false',
        'thumbnails' => 'false',
        'navigation' => 'false', 
        
    ), $atts));
    
    if (!empty($category)) {
        $arg = array(
            'post_type' => 'finance-slide',
            'posts_per_page' => $count,
            'tax_query' => array(
                array(
                    'taxonomy' => 'slide_cat', //Enter Register Taxonomy
                    'field' => 'term_id', //Enter your term name
                    'terms' => $category
                )
            )
        );
    } else {
        $arg = array(
            'post_type' => 'finance-slide',
            'posts_per_page' => $count
        );
    }
    
    
    $get_post = new WP_Query($arg);    
    
    $slide_rendom_number = rand(630437, 630438);
    
    $finance_slider_markup = '
        <script>
            jQuery(window).load(function ($) {      
                jQuery("#camera_wrap_4' . $slide_rendom_number . '").camera({
                height: "'.$height.'",
                loader: "none",
                pagination: '.$pagination.',        
                playPause: false,
                thumbnails: '.$thumbnails.',
                autoAdvance: true,
                navigation: '.$navigation.',
                hover: false,
                opacityOnGrid: false,
                overlayer: true,
                fx: "random"
               });
            });
        </script>
    
    <div class="finance-slider-wrapper">
        <div class="finance-slider-preloder">
            <span class="preloader-circle-wrapper">
                <i class="fa fa-cog fa-spin"></i>
            </span>
        </div>

    <div class="slider-area">
        <div class="finance-slide-overlay"></div>    
            <div class="camera_wrap camera_emboss pattern_1" style="overflow:hidden" id="camera_wrap_4'. $slide_rendom_number.'">';
                
                while ($get_post->have_posts()):
                    $get_post->the_post();
                    $post_id = get_the_ID();

                    //Slider warnning condition solve From theme meta option
                    if (get_post_meta($post_id, 'finance_slide_meta', true)) {
                        $slide_meta = get_post_meta($post_id, 'finance_slide_meta', true);
                    } else {
                        $slide_meta = array();
                    }

                    //Custom color change            
                    if (array_key_exists('text_color', $slide_meta)) {
                        $text_color = $slide_meta['text_color'];
                    } else {
                        $text_color = '#333';
                    }

                    //Custom Overlay           
                    if (array_key_exists('enable_overlay', $slide_meta)) {
                        $enable_overlay = $slide_meta['enable_overlay'];
                    } else {
                        $enable_overlay = 'false';
                    }

                    //Custom opacity Color          
                    if (array_key_exists('overlay_color', $slide_meta)) {
                        $overlay_color = $slide_meta['overlay_color'];
                    } else {
                        $overlay_color = '#333';
                    }

                    //Custom opacity           
                    if (array_key_exists('overlay_opacity', $slide_meta)) {
                        $overlay_opacity = $slide_meta['overlay_opacity'];
                    } else {
                        $overlay_opacity = '70';
                    }

                    //Custom SLider text Width           
                    if (array_key_exists('slider_width', $slide_meta)) {
                        $slider_width = $slide_meta['slider_width'];
                    } else {
                        $slider_width = 'col-md-6';
                    }

                    //Custom SLider Offset            
                    if (array_key_exists('slider_offset', $slide_meta)) {
                        $slider_offset = $slide_meta['slider_offset'];
                    } else {
                        $slider_offset = 'no-offset';
                    }

                    //Custom SLider text align           
                    if (array_key_exists('slider_text_align', $slide_meta)) {
                        $slider_text_align = $slide_meta['slider_text_align'];
                    } else {
                        $slider_text_align = 'left';
                    }

                    //Custom SLider text align           
                    if (array_key_exists('slider_button_link', $slide_meta)) {
                        $slider_button_link = $slide_meta['slider_button_link'];
                    } else {
                        $slider_button_link = '#';
                    }


                    $finance_slider_markup .= '
                        <div data-src="'. get_the_post_thumbnail_url($post_id, 'large') . ')">       
                            <div class="slider-table">
                                <div class="slider-cell">
                                    <div class="container">
                                        <div class="row">
                                            <div class="' . $slider_width . ' ' . $slider_offset . ' text-' . $slider_text_align . '">
                                                <div class="slider-text">
                                                    <h1 style="color:' . $text_color . '" class="fadeInUp">' . get_the_title($post_id) . '</h1>
                                                    <p class="fadeInUp">' . wpautop(get_the_content($post_id)) . ' </p>
                                                    <a href="'.$slider_button_link.'" class="slide-btn fadeInUp">Get started now</a>
                                                </div>
                                            </div>
                                            <!-- column End -->
                                        </div>
                                        <!-- row End -->
                                    </div>
                                    <!-- container End -->
                                </div>
                            </div>
                        </div>        

                   ';               
                endwhile;
    $finance_slider_markup .= '</div></div>';
    
    wp_reset_query();
    
    return $finance_slider_markup;
    
}
add_shortcode('finance_slider', 'finance_slider_shortcode');
