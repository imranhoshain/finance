<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package finance
 */

get_header();
?>
<?php	
//Page title condition solve from theme metabox and option
	if(get_post_meta( $post->ID, 'finance_post_meta', true )){
		$post_meta = get_post_meta( $post->ID, 'finance_post_meta', true );
	}else{
		$post_meta = array();
	}

//Page title condition
	if(array_key_exists('enable_title', $post_meta)){
		$enable_title = $post_meta['enable_title'];
	}else{
		$enable_title = true;
	}

//Custom Title
	if(array_key_exists('custom_title', $post_meta)){
		$custom_title = $post_meta['custom_title'];
	}else{
		$custom_title = true;
	}

//Text Align Condition
	if(array_key_exists('text_title_direction', $post_meta)){
		$text_title_direction = $post_meta['text_title_direction'];
	}else{
		$text_title_direction = 'center';
	}
?>


<?php if($enable_title == true) : ?> 

<div style="background-image: url(<?php the_post_thumbnail_url('large') ?>);" class="finance-page-title-area section-padding">
	<div class="page-banner">			
		<div class="container">
			<div class="row ">
				<div class="col-md-12 text-<?php echo $text_title_direction; ?>">
					<?php if(empty($custom_title)) : ?>
					<h2><?php the_title(); ?></h2>
					<?php else : ?>
					<div class="finance-page-custom-title">
						<?php echo wpautop($custom_title); ?>
					</div>
					<?php endif; ?>					
				</div>
			</div>
		</div> 
	
	</div>
</div>

<?php endif; ?>

<?php while ( have_posts() ) : the_post(); ?>

	<div id="primary" class="content-area post-body section-padding">
		<main id="main" class="site-main">
			<div class="container">
				<div class="row">
					<div class="col-md-8">
						<div class="finance-article-list">
							<?php		

								get_template_part( 'template-parts/content', get_post_type() );

								the_post_navigation();

								// If comments are open or we have at least one comment, load up the comment template.
								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif;

							?>
						</div>
					</div>
					<?php get_sidebar(); ?>
				</div>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php endwhile; ?> <!--End of the loop.--> 

<?php
get_footer();
