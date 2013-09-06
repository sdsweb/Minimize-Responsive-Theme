<?php
/*
 * This template is used for the display of single image attachments.
 */

get_header(); ?>
	<section class="content-wrapper image-content image-attachment image cf">
		<article class="content cf">
			<?php get_template_part( 'yoast', 'breadcrumbs' ); // Yoast Breadcrumbs ?>
			
			<?php get_template_part( 'loop', 'attachment-image' ); // Loop - Image Attachment ?>

			<?php comments_template(); // Comments ?>
		</article>

		<?php get_sidebar(); ?>
	</section>

<?php get_footer(); ?>