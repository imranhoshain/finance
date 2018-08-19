<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package finance
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area comments-content">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
		?>
		<h2 class="comments-title">
			<?php
			$finance_comment_count = get_comments_number();
			if ( '1' === $finance_comment_count ) {
				printf(
					/* translators: 1: title. */
					esc_html__( 'One thought on &ldquo;%1$s&rdquo;', 'finance' ),
					'<span>' . get_the_title() . '</span>'
				);
			} else {
				printf( // WPCS: XSS OK.
					/* translators: 1: comment count number, 2: title. */
					esc_html( _nx( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $finance_comment_count, 'comments title', 'finance' ) ),
					number_format_i18n( $finance_comment_count ),
					'<span>' . get_the_title() . '</span>'
				);
			}
			?>
		</h2><!-- .comments-title -->

		<?php the_comments_navigation(); ?>

		<ul class="comment-list">
			<?php
			wp_list_comments( array(
				'avatar_size' => 70,
				'style'       => 'ul',
				'callback'    => 'finance_comment',
				'short_ping' => true,
			) );
			?>
		</ul><!-- .comment-list -->

		<?php
		the_comments_pagination( array(
			'prev_text' => '<span class="screen-reader-text">' . __( 'Previous', 'finance' ) . '</span>',
			'next_text' => '<span class="screen-reader-text">' . __( 'Next', 'finance' ) . '</span>' ,
		) );

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'finance' ); ?></p>
			<?php
		endif;

	endif; // Check for have_comments().

	$comments_args = array(
        // change the title of send button 
        'label_submit'=>'Submit',
        // change the title of the reply section
        'title_reply'=>'LEAVE A REPLY',
        // remove "Text or HTML to be displayed after the set of comment fields"
        'comment_form_top' => 'ds',
        'comment_notes_before' => '',
        'comment_notes_after' => '',
        // redefine your own textarea (the comment body)
        
        'fields' => apply_filters( 'comment_form_default_fields', array(

    'author' =>
      '<p class="comment-form-author">'  .
      '<input id="author" class="blog-form-input" placeholder="Your Name* " name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
      '" size="30"/></p>',

    'email' =>
      '<p class="comment-form-email">'.
      '<input id="email" class="blog-form-input" placeholder="Your Email Address* " name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
      '" size="30"/></p>',      
     
    )
  ),
);

comment_form($comments_args);
?>

</div><!-- #comments -->
