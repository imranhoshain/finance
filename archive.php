<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package finance
 */

get_header();
?>

<div class="finance-page-title-area section-padding">
	<div class="container">
		<div class="row ">
			<div class="col-md-12 text-center">				
				<?php
					the_archive_title( '<h2 class="page-title">', '</h2>' );
					the_archive_description( '<div class="archive-description">', '</div>' );
				?>			
			</div>
		</div>
	</div>
</div>

<div id="primary" class="content-area section-padding">
	<main id="main" class="site-main">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<div class="finance-article-list">
						<?php if ( have_posts() ) : ?>
							<?php
							/* Start the Loop */
							while ( have_posts() ) :
								the_post();
								/*
								 * Include the Post-Type-specific template for the content.
								 * If you want to override this in a child theme, then include a file
								 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
								 */
								get_template_part( 'template-parts/content', get_post_type() );

							endwhile;
							the_posts_navigation();
						else :
							get_template_part( 'template-parts/content', 'none' );
						endif;
						?>
					</div>
				</div>
				<?php get_sidebar(); ?>
			</div>
		</div>
	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
