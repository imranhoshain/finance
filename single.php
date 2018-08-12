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
<?php while ( have_posts() ) : the_post(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php		

			get_template_part( 'template-parts/content', get_post_type() );

			the_post_navigation();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php endwhile; ?> <!--End of the loop.--> 

<?php
get_footer();
