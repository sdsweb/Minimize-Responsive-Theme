<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments and the comment
 * form. The actual display of comments is handled by a callback to
 * sds_comment() which is located in the /includes/theme-functions.php file.
 */

// If the current post is protected by a password and the visitor has not yet entered the password we will return early without loading the comments
if ( post_password_required() )
	return;

// Prevent access to this file directly
if( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( $_SERVER['SCRIPT_FILENAME'] ) === 'comments.php' )
	die( 'Please do not access this file directly. Carry on now...nothing to see here.' );
?>

<section id="comments-container" class="comments-container post-comments post-comments-container <?php echo ( ( int ) get_comments_number() === 0 || ! have_comments() ) ? 'comments-container-no-comments' : false; ?>">
	<section id="comments" class="comments-area <?php echo ( ( int ) get_comments_number() === 0 ) ? 'no-comments' : false; ?>">
		<?php if ( have_comments() ) : ?>
			<section class="comments-title-container">
				<h4 class="comments-title block-title">
					<?php
						if ( ( int ) get_comments_number() === 1 ) : // One Comment
							printf( 'One thought on &ldquo;%2$s&rdquo;', get_comments_number(), '<span>' . get_the_title() . '</span>' );
						else: // Multiple Comments
							printf( '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), '<span>' . get_the_title() . '</span>' );
						endif;
					?>
				</h4>
			</section>

			<section class="clear">&nbsp;</section>

			<ol class="comment-list">
				<?php wp_list_comments( array( 'callback' => 'sds_comment', 'style' => 'ol' ) ); ?>
			</ol><!-- .comment-list -->

			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
				<nav class="navigation comment-navigation" role="navigation">
					<h1 class="assistive-text section-heading">Comment navigation</h1>
					<section class="nav-previous"><?php previous_comments_link( '&larr; Older Comments' ); ?></section>
					<section class="nav-next"><?php next_comments_link( 'Newer Comments &rarr;' ); ?></section>
				</nav>
			<?php endif; // Check for comment navigation ?>

		<?php endif; // have_comments() ?>

		<section class="clear">&nbsp;</section>

		<?php comment_form(); // Display the comment form (add new comment) ?>
	</section>
</section>