<?php

//Isotop Taxonomy OR Catagory
function finance_isotop_post_taxonomy() {
    register_taxonomy(
        'portfolio_cat',  
        'portfolio-isotop', //Your Post type here                 
        array(
            'hierarchical'          => true,
            'label'                 => 'Portfolio Category',  
            'query_var'             => true,
            'show_admin_column'     => true,
            'rewrite'               => array(
                'slug'              => 'portfolio-category', 
                'with_front'    => true 
                )
            )
    );
}
add_action( 'init', 'finance_isotop_post_taxonomy');


//isotop ShortCode
function finance_portfolio_shortcode($atts, $content = null)
{
    extract(shortcode_atts(array(
        'theme_select' => '1'
        
    ), $atts));
    
    $isotop_categories = get_terms('portfolio_cat');

    $dynamic_isotop = rand(630439, 630440);
    
    $finance_isotop_markup = '
    
        <script>
        jQuery(document).ready(function($) {
        var $portfolio = $(".portfolios'.$dynamic_isotop.'");

        $portfolio.isotope({
            itemSelector: ".col-md-4",
            layoutMode: "masonry",
            filter: "*",
            percentPosition: true,
            animationOptions: {
                duration: 750,
                easing: "linear",
                queue: false,
            }
        });

        $(".portfolio-menu li").on("click", function () {
            $(".portfolio-menu li").removeClass("active");
            $(this).addClass("active");
            var selector = $(this).attr("data-filter");
            $portfolio.isotope({
                filter: selector,
            });
        });

        });
        </script>

        <div class="row">
                ';

        if($theme_select == '1'){
            $finance_isotop_markup .= ' 
            <div class="col-md-12">
                    <div class="portfolio-menu">';
            $isotop_list = 'isotop-filter';
        }else{
            $finance_isotop_markup .= ' 
            <div class="col-md-3"> <div class="portfolio-menu">';
            $isotop_list = 'isotop-filter2';
        }
        
        

        $finance_isotop_markup .= '              
            <ul class="isotop-filter-active '.$isotop_list.' isotop-filter-'.$theme_select.'">
                <li class="active" data-filter="*">All</li>';
    
    if (!empty($isotop_categories) && !is_wp_error($isotop_categories)) {
        foreach ($isotop_categories as $isotop_category) {
            
            $finance_isotop_markup .= '<li data-filter=".'.$isotop_category->slug.'">' . $isotop_category->name . '</li>';
        }
    }
    
    $finance_isotop_markup .= '</ul>';


    $finance_isotop_markup .= '</div></div>';


        if($theme_select == '1'){             
            $isotop_colum_width = 'col-md-12';
        }else{
            $isotop_colum_width = 'col-md-9';
        }
        
        $finance_isotop_markup .= '
        <div class="'.$isotop_colum_width.'">';


    $finance_isotop_markup .= ' 
        <div class="row portfolios'.$dynamic_isotop.'">';

        $isotop_query = new WP_Query(array(
            'post_type' => 'portfolio-isotop',
            'posts_per_page' => -1));

        while ($isotop_query->have_posts()):
        $isotop_query->the_post();

        $isotop_category = get_the_terms(get_the_ID(), 'portfolio_cat' );

        if (!empty($isotop_category) && !is_wp_error($isotop_category)) {

            $project_cat_list = array();

             foreach ($isotop_category as $Single_isotop_category) {
                $project_cat_list[] = $Single_isotop_category->slug;
             }
             $isotop_assigned_cat = join(" ", $project_cat_list);
        }else {
            $isotop_assigned_cat = '';
        }

        $finance_isotop_markup .= '          
            <div class="col-md-4 col-sm-6 col-xs-12 '.$isotop_assigned_cat.'">
                <div class="single-portfolio">
                    <img src="'.get_the_post_thumbnail_url(get_the_ID(),'large').'" alt="">
                    <div class="p-hover">
                        <div class="p-table">
                            <div class="p-cell">
                                <a href="'.get_the_post_thumbnail_url(get_the_ID(),'large').'"><i class="fa fa-plus"></i></a>
                                <div class="p-info">
                                    <h4>'.get_the_title().'</h4>
                                    <h6>' .get_the_excerpt() . '</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- .single-portfolio -->
            </div>';
        endwhile;
        wp_reset_query();

        $finance_isotop_markup .= '
                 </div>                 
            </div>
        </div>';
    
    return $finance_isotop_markup;
    
}
add_shortcode('finance_portfolio', 'finance_portfolio_shortcode');