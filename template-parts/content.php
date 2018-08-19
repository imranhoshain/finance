<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package finance
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="blog-single-post">
		<div class="blog-single-post-image">
			<?php finance_post_thumbnail(); ?>
		</div>

		<header class="entry-header blog-single-post-title">
			<?php
			
			if ( 'post' === get_post_type() ) :
				?>
				<div class="single-blog-meta-tag">
					<div class="entry-meta">
						<ul>
							<li>
								<?php
									finance_posted_by();
									finance_posted_on();
									finance_tag_cat();
									finance_entry_footer(); 
								?>
							</li>
						</ul>
					</div><!-- .entry-meta -->
				</div>
			<?php endif; ?>

			<?php if ( is_singular() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
			endif;?>

		</header><!-- .entry-header -->

		<div class="entry-content">
			<div class="single-blog-article">
				<?php
					if(is_single()){
					the_content( sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'finance' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						get_the_title()
					) );
				} else {

					the_excerpt(); //Blog page add

					echo '<p class="read-more-warp"><a href="' . esc_url( get_permalink() ) . '" class="bexed-btn">Read More</a></p>';

					}

					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'finance' ),
						'after'  => '</div>',
					) );
				?>
			</div>		
		</div><!-- .entry-content -->

		<footer class="entry-footer">
			
		</footer><!-- .entry-footer -->

	</div>
	
</article><!-- #post-<?php the_ID(); ?> -->
