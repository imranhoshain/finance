<?php

//Custom Slider Taxonomy OR Catagory
function finance_testi_slide_taxonomy() {
    register_taxonomy(
        'testi_cat',  
        'testi-slider', //Your Post type here                 
        array(
            'hierarchical'          => true,
            'label'                 => 'Testi Slider Category',  
            'query_var'             => true,
            'show_admin_column'     => true,
            'rewrite'               => array(
                'slug'              => 'testi_category', 
                'with_front'    => true 
                )
            )
    );
}
add_action( 'init', 'finance_testi_slide_taxonomy');

//Custom Taxonomy OR Catagory Function
function finance_testi_slider_category(){
    $slide_categories = get_terms('testi_cat'); //Enter category Name
    $slide_category_options = array('' => esc_html__('All Catagory', 'finance-toolkit'));
    if($slide_categories){
        foreach ($slide_categories as $slide_category) {
            $slide_category_options[$slide_category->term_id] = $slide_category->name;
        }
    }
    return $slide_category_options;
}

//Slider ShortCode Function
function finance_testi_slider_shortcode($atts)
{
    extract(shortcode_atts(array(
        'count' => '',
        'category' => '',
        'loop' => 'true',
        'dots' => 'true',
        'nav' => 'true',
        'autoplay' => 'true',
        'autoplayTimeout' => 5000
        
    ), $atts));
    
    if (!empty($category)) {
        $arg = array(
            'post_type' => 'testi-slider',
            'posts_per_page' => $count,
            'tax_query' => array(
                array(
                    'taxonomy' => 'testi_cat', //Enter Register Taxonomy
                    'field' => 'term_id', //Enter your term name
                    'terms' => $category
                )
            )
        );
    } else {
        $arg = array(
            'post_type' => 'testi-slider',
            'posts_per_page' => $count
        );
    }
    
    
    $get_post = new WP_Query($arg);    
    
    $slide_rendom_number = rand(630441, 630442);
    
    $finance_testi_slider_markup = '
    <script>
        jQuery(window).load(function ($) {
             
            jQuery("#testi-slider' . $slide_rendom_number . '").owlCarousel({
            items: 3,
            margin: 15,
            loop: ' . $loop . ',            
            dots: ' . $dots . ',            
            nav: ' . $nav . ',            
            autoplay: ' . $autoplay . ',            
            autoplayTimeout: ' . $autoplayTimeout . ',            
            responsive: {
                0: {
                    items: 1
                },
                767: {
                    items: 1
                },
                768: {
                    items: 2
                },
                992: {
                    items: 3
                },
            }
                 
        });          
           
    });
    </script>    

    <div id="testi-slider' . $slide_rendom_number . '" class="owl-carousel testi-area">';
    while ($get_post->have_posts()):
        $get_post->the_post();
        $post_id = get_the_ID();
    
        $finance_testi_slider_markup .= '           
            <div class="single-testi-slide">
                '. wpautop(get_the_content($post_id)) .'
                <h4>-'.get_the_title().'</h4>
                <span>' .get_the_excerpt() . '</span>
            </div>
        ';

    endwhile;
    $finance_testi_slider_markup .= '</div>';
    
    wp_reset_query();
    
    return $finance_testi_slider_markup;
    
}
add_shortcode('finance_testi_slider', 'finance_testi_slider_shortcode');
                 

