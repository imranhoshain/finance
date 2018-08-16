<?php

//Service Section ShortCode
function finance_service_section_shortcode($atts)
{
    extract(shortcode_atts(array(        
        'id' => '',        
        'service_section_title' => '',               
        'service_section_sub_title' => '',               
        'service_name' => '', 
        'service_section_description' => '',              
    ), $atts));
    
 ?>   
    <div class="service-info">
        <h3><?php echo $service_section_title ?></h3>
        <h5 class="cd-headline clip is-full-width">
            <strong><?php echo $service_section_sub_title ?></strong> <br> for
            <span class="cd-words-wrapper">
                <b class="is-visible">Company</b>
                    <?php 
                        foreach($service_name as $single_service_name){     
                    ?>
                <b><?php echo $single_service_name['tab_title'] ?></b>
                    
                    <?php } ?>
            </span>
        </h5>
        <p><?php echo $service_section_description ?></p>
    </div>
<?php
    }
    add_shortcode('finance_service_section', 'finance_service_section_shortcode');
?>