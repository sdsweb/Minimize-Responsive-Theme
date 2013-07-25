<?php
/*
 * This template is used for the display of single pages.
 */

get_header(); ?>
	<section class="content-wrapper page-content">
		<article class="content">
			<?php get_template_part( 'yoast', 'breadcrumbs' ); // Yoast Breadcrumbs ?>

			<?php get_template_part( 'loop', 'page' ); // Loop - Page ?>

			<section class="clear">&nbsp;</section>

			<section id="comments-container" class="comments-container post-comments post-comments-container">
				<?php comments_template(); // Comments ?>
			</section>
		</article>

		<?php get_sidebar(); ?>
	</section>

<?php get_footer(); ?>