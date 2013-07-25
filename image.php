<?php
/*
 * This template is used for the display of single image attachments.
 */

get_header(); ?>
	<section class="content-wrapper image-content image-attachment image">
		<article class="content">
			<?php get_template_part( 'yoast', 'breadcrumbs' ); // Yoast Breadcrumbs ?>
			
			<?php get_template_part( 'loop', 'attachment-image' ); // Loop - Image Attachment ?>

			<section class="clear">&nbsp;</section>

			<section id="comments-container" class="comments-container post-comments post-comments-container">
				<?php comments_template(); // Comments ?>
			</section>
		</article>

		<?php get_sidebar(); ?>
	</section>

<?php get_footer(); ?>