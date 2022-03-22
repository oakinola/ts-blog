<?php
	/**
	 * The template for displaying comments
	 *
	 * This is the template that displays the area of the page that contains both the current comments
	 * and the comment form.
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
	 *
	 * @package WordPress
	 * @subpackage Twenty_Twenty_One
	 * @since 1.0.0
	 */

	/*
	* If the current post is protected by a password and
	* the visitor has not yet entered the password,
	* return early without loading the comments.
	*/
	if ( post_password_required() ) {
		return;
	}

	$oak_comment_count = get_comments_number();
?>

<div id="comments" class="comments-area p-5 oak-hovering-shadow default-max-width <?php echo get_option( 'show_avatars' ) ? 'show-avatars' : ''; ?>">

	<?php
	if ( have_comments() ) :
		;
		?>
		<h2 class="comments-title">
			<?php if ( '1' === $oak_comment_count ) : ?>
				<?php esc_html_e( '1 reply', 'twentytwentyone' ); ?>
			<?php else : ?>
				<?php				
				printf(
					/* translators: %s: comment count number. */
					esc_html( _nx( '%s reply', '%s replies' , $oak_comment_count, 'Comments title', 'twentytwentyone' ) ),
					esc_html( number_format_i18n( $oak_comment_count ) )
				);
				?>
			<?php endif; ?>
		</h2><!-- .comments-title -->

		<ol class="comment-list">
			
			<?php wp_list_comments(array(
						//'avatar_size'	=> 60,
						'style'			=> 'ol',
						'short_ping'	=> true,
						'type'			=> 'comment',
						'callback'		=> 'oak_format_comment'	)
					); ?>
		</ol><!-- .comment-list -->

		<?php
		the_comments_pagination(
			array(
				/* translators: There is a space after page. */
				'before_page_number' => esc_html__( 'Page ', 'twentytwentyone' ),
				'mid_size'           => 0,
				'prev_text'          => sprintf(
					'<span class="nav-prev-text">%s</span>',
					//is_rtl() ? twenty_twenty_one_get_icon_svg( 'ui', 'arrow_right' ) : twenty_twenty_one_get_icon_svg( 'ui', 'arrow_left' ),
					esc_html__( 'Older comments', 'twentytwentyone' )
				),
				'next_text'          => sprintf(
					'<span class="nav-next-text">%s</span> ',
					esc_html__( 'Newer comments', 'twentytwentyone' ),
					//is_rtl() ? twenty_twenty_one_get_icon_svg( 'ui', 'arrow_left' ) : twenty_twenty_one_get_icon_svg( 'ui', 'arrow_right' )
				),
			)
		);
		?>

		<?php if ( ! comments_open() ) : ?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'twentytwentyone' ); ?></p>
		<?php endif; ?>
	<?php endif; ?>

	<?php
	comment_form(
		array(
			'logged_in_as'       => null,
			'title_reply'        => esc_html__( 'Leave a comment', 'oak' ),
			'title_reply_before' => '<h2 id="reply-title" class="comment-reply-title">',
			'title_reply_after'  => '</h2>',
			'comment_field' =>  '<div class="md-form md-outline mt-3 ps-1">' .
								'<label for="form-message">Enter your comment</label>' . '</div>' .
            					'<textarea id="form-message" name="comment" class="md-textarea form-control" rows="3"></textarea>',
			'class_submit' =>   'btn oak-btn-filled mt-4 oak-btn-rounded btn-md waves-effect waves-light',
		)
	);
	?>

</div><!-- #comments -->