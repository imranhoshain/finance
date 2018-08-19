<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package finance
 */

get_header();
?>

<div class="finance-page-title-area section-padding">
	<div class="container">
		<div class="row ">
			<div class="col-md-12 text-center">				
				<h2><?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'finance' ), '<span>' . get_search_query() . '</span>' );
				?></h2>			
			</div>
		</div>
	</div>
</div>

<section id="primary" class="content-area post-body section-padding">
	<?php $blog_page = cs_get_option('blog_page'); //From Codestar Theme Option?>
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

							the_posts_navigation();

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
</section><!-- #primary -->

<?php
get_footer();
