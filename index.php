<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package finance
 */

get_header();
?>

<div style="background-image: url(<?php the_post_thumbnail_url('large') ?>);" class="finance-page-title-area section-padding">
	<div class="page-banner">			
		<div class="container">
			<div class="row ">
				<div class="col-md-12 text-center">										
					<div class="finance-page-custom-title">
						<h2><?php the_title(); ?></h2>						
					</div>										
				</div>
			</div>
		</div>	
	</div>
</div>

<?php $blog_page = cs_get_option('blog_page'); //From Codestar Theme Option?>
<div id="primary" class="content-area post-body section-padding">
	<main id="main" class="site-main">
		<div class="container">
			<div class="row">
			<!-- Blog Left Option -->	
			<?php if ($blog_page == "left") : ?>
				<div class="col-md-4">
					<?php get_sidebar(); ?>
				</div>
				<div class="col-md-8">
					<div class="finance-article-list">
						<?php
						if ( have_posts() ) :

							if ( is_home() && ! is_front_page() ) :	?>				
							<?php endif;

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
				<?php endif; ?>
				<!-- Blog Left Option -->

				<!-- Blog Right Option -->
				<?php if ($blog_page == "right") : ?>				
				<div class="col-md-8">
					<div class="finance-article-list">
						<?php
						if ( have_posts() ) :

							if ( is_home() && ! is_front_page() ) :	?>				
							<?php endif;

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

							post_pagination();

						else :

							get_template_part( 'template-parts/content', 'none' );

						endif;
						?>
					</div>
				</div>
				<div class="col-md-4">
					<?php get_sidebar(); ?>
				</div>
				<?php endif; ?>
				<!-- Blog Right Option -->
				<!-- Blog Full Width Option -->
				<?php if ($blog_page == "full_width") : ?>				
				<div class="col-md-10 col-md-offset-1">
					<div class="finance-article-list">
						<?php
						if ( have_posts() ) :

							if ( is_home() && ! is_front_page() ) :	?>				
							<?php endif;

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
				<?php endif; ?>
				<!-- Blog Full Width Option -->
			</div>
		</div>
	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
