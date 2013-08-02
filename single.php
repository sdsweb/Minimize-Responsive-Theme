<?php
/*
 * This template is used for the display of single posts.
 */

get_header(); ?>
	<section class="content-wrapper post-content single-content">
		<article class="content">
			<?php get_template_part( 'yoast', 'breadcrumbs' ); // Yoast Breadcrumbs ?>
			
			<?php get_template_part( 'loop' ); // Loop ?>

			<section class="clear">&nbsp;</section>

			<section id="comments-container" class="comments-container post-comments post-comments-container">
				<?php comments_template(); // Comments ?>
			</section>
		</article>

		<?php get_sidebar(); ?>

		<section class="clear">&nbsp;</section>
	</section>

<?php get_footer(); ?>