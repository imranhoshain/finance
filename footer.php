<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package finance
 */
?>

	</div><!-- #content -->

<?php 
    $company_info_title = cs_get_option('company_info_title');                            
    $company_info_link = cs_get_option('company_info_link');                            
    $company_info_link_text = cs_get_option('company_info_link_text');                    
    $footer_copyright_text = cs_get_option('footer_copyright_text');               
    $footer_social_icon_array = cs_get_option('footer_social_icon_options');               
?>
	<!-- Footer-Area Start -->
    <div class="footer-area section-padding">
        <div id="scrollTop"><i class="fa fa-chevron-up"></i></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="footer-text">                    	
                        <p><?php echo $company_info_title; ?> <a href="<?php echo $company_info_link; ?>"><?php echo $company_info_link_text; ?></a></p>                        
                        <p><?php echo $footer_copyright_text; ?></p>
                        <?php if(!empty($footer_social_icon_array)) : ?>
                        <div class="footer-social-links">
                        	<?php foreach ($footer_social_icon_array as $footer_social_icon ) :
							 ?>
                            <a href="<?php echo $footer_social_icon['footer_social_icon_link']; ?>"><i class="<?php echo $footer_social_icon['footer_social_icon']; ?>"></i></a>                            
							<?php endforeach; ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer-Area End -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
