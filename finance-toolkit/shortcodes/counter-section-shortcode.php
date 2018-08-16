<?php

//Counter Section ShortCode
function finance_counter_section_shortcode($atts)
{
    extract(shortcode_atts(array(        
        'id' => '',        
        'counter_icon' => '',               
        'counter_number' => '',               
        'counter_text' => '',       
    ), $atts));
    
 
    $finance_counter_markup = '<div class=" clearfix">   
                                    <div class="counter-icon elementor-icon elementor-icon-wrapper">
                                        <i class="'.$counter_icon.'"></i>
                                    </div>                                    
                                    <div class="counter-detail">
                                        <h2 class="counter elementor-counter-number-wrapper">'.$counter_number.'</h2>
                                        <p class="elementor-counter-title">'.$counter_text.'</p>
                                    </div>';            
    $finance_counter_markup .= '</div>';
    
    return $finance_counter_markup;

    }
    add_shortcode('finance_counter_section', 'finance_counter_section_shortcode');
?>