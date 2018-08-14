<?php

//Team Section ShortCode
function finance_team_section_shortcode($atts)
{
    extract(shortcode_atts(array(        
        'id' => '',        
        'team_member_image' => '',               
        'team_member_name' => '',               
        'team_member_position' => '',               
        'social_info' => '',         
        'social_link' => '',         
         
    ), $atts));
   
    
 ?>   

       <div class="single-team">
            <div class="elementor-image-box-wrapper">
               <figure class="team-img elementor-image-box-img">
                <img src="<?php echo $team_member_image['url']?>" alt="">
                <div class="team-social-icon"> 
                    <?php 
                        foreach($social_info as $single_social_info){     
                    ?>                  
                    <a href=" <?php 
                        foreach($single_social_info['social_link'] as $single_social_link){     
                    ?> <?php var_dump($single_social_link); } ?>"><i class="<?php echo $single_social_info['social'] ?>"></i></a>      
                    <?php }?>
                </div>
                </figure>
            </div>
            <div class="team-detail elementor-image-box-content">
                <h4 class="elementor-image-box-title"><?php echo $team_member_name ?></h4>
                <span class="elementor-image-box-description"><?php echo $team_member_position ?></span>
            </div>
        </div>      
       
<?php
    }
    add_shortcode('finance_team_section', 'finance_team_section_shortcode');
?>