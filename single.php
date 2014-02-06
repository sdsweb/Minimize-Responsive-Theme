<?php
/*
 * This template is used for the display of single posts.
 */

get_header(); ?>
	<section class="content-wrapper post-content single-content cf">
		<article class="content cf">
			<?php get_template_part( 'yoast', 'breadcrumbs' ); // Yoast Breadcrumbs ?>
			
			<?php get_template_part( 'loop' ); // Loop ?>

			<section class="clear"></section>

			<?php comments_template(); // Comments ?>
		</article>

		<?php get_sidebar(); ?>
	</section>

<?php get_footer(); ?>