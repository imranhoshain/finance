<?php 

//Comment field move
function finance_move_comment_field_to_bottom( $fields ) {
$comment_field = $fields['comment'];
unset( $fields['comment'] );
$fields['comment'] = $comment_field;
return $fields;
} 
add_filter( 'comment_form_fields', 'finance_move_comment_field_to_bottom' );

//Comment field section
function finance_update_comment_field( $comment_field ) {
  $comment_field =
    '<p class="comment-form-comment">           
        <textarea required id="comment" name="comment" placeholder="' . esc_attr__( "Enter comment here...", "finance" ) . '" cols="45" rows="8" aria-required="true"></textarea>
    </p>';

  return $comment_field;
}
add_filter( 'comment_form_field_comment', 'finance_update_comment_field' );


function finance_comment($comment, $args, $depth) {
    if ( 'div' === $args['style'] ) {
        $tag       = 'div';
        $add_below = 'comment';
    } else {
        $tag       = 'li';
        $add_below = 'div-comment';
    }?>

    <<?php echo $tag; ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?> id="comment-<?php comment_ID() ?>"><?php 
        if ( 'div' != $args['style'] ) { ?>
            <div id="div-comment-<?php comment_ID() ?>" class="comment-body"><?php } ?>
                <div class="comment-author vcard comment-srction">
                    <div class="comment-avatar">
                    <?php 
                    if ( $args['avatar_size'] != 0 ) {
                        echo get_avatar( $comment, $args['avatar_size'] ); 
                    }?>
                    </div>

                    <div class="comment-info">
                        <?php 
                            printf( __( '<cite class="fn">%s</cite>','finance' ), get_comment_author_link() ); 
                        ?>

                        <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>"><?php
                            /* translators: 1: date, 2: time */
                            printf( 
                                __('%1$s at %2$s', 'finance'), 
                                get_comment_date(),  
                                get_comment_time() 
                            ); ?>
                        </a>
                        <?php edit_comment_link( __( '(Comment Edit)', 'finance' ), '  ', '' ); ?>

                        <div class="comment-text">
                            <?php comment_text(); ?>
                        </div>

                        <div class="reply comment-replay"><?php 
                            comment_reply_link( 
                                array_merge( 
                                    $args, 
                                    array( 
                                        'add_below' => $add_below, 
                                        'depth'     => $depth, 
                                        'max_depth' => $args['max_depth'],
                                        'reply_text' => '<i class="fa fa-reply" aria-hidden="true"></i>  Replay' 
                                    ) 
                                ) 
                            ); ?>
                        </div>
                    </div>
                </div>

                <?php 
                if ( $comment->comment_approved == '0' ) { ?>
                    <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'finance' ); ?></em><br/><?php 
                } ?>      

                <?php if ( 'div' != $args['style'] ) : ?>
            </div>
                <?php endif;
}