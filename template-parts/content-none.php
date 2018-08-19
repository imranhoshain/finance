<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package finance
 */

?>

<section class="no-results not-found">
	<header class="page-header text-center">
		<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'finance' ); ?></h1>
	</header><!-- .page-header -->

	<div class="page-conten text-center">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) :

			printf(
				'<p>' . wp_kses(
					/* translators: 1: link to WP admin new post page. */
					__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'finance' ),
					array(
						'a' => array(
							'href' => array(),
						),
					)
				) . '</p>',
				esc_url( admin_url( 'post-new.php' ) )
			);

		elseif ( is_search() ) :
			?>
			<div class="error-img">
				<img src="<?php echo get_template_directory_uri() .'/assets/img/error.jpg';?>" alt="404 Page" />
			</div>
			<br />
			<h5><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'finance' ); ?></h5 class="text-center">
			<?php
			

		else :
			?>

			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'finance' ); ?></p>
			<?php
			

		endif;
		?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
