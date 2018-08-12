<?php
$logo_text = cs_get_option('header_logo_text');

if(has_custom_logo()){
	the_custom_logo();
}else{?>

	<span class="text-logo"><a  href="<?php echo esc_url( home_url( '/' ) ); ?>" class="navbar-brand" rel="home"><?php if(!empty($logo_text)){ echo esc_html($logo_text); } else{ bloginfo( 'name' );} ?></a></span>	
<?php }	
	
?>