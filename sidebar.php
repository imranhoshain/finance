<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package finance
 */

if ( ! is_active_sidebar( 'blog_right_sidebar' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area">
    <?php dynamic_sidebar( 'blog_right_sidebar' ); ?>
</aside><!-- #secondary -->

