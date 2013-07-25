<?php
/*
 * This template is used for the display of all post types that do not have templates (used as a fallback).
 */

get_header(); ?>
	<section class="content-wrapper index-content index">
		<article class="content">
			<?php get_template_part( 'yoast', 'breadcrumbs' ); // Yoast Breadcrumbs ?>
			
			<?php get_template_part( 'loop' ); // Loop ?>

			<section class="clear">&nbsp;</section>

			<section id="comments-container" class="comments-container post-comments post-comments-container">
				<?php comments_template(); // Comments ?>
			</section>
		</article>

		<?php get_sidebar(); ?>
	</section>

<?php get_footer(); ?>