<?php
/*
 * This template is used for the display of archives.
 */

get_header(); ?>
	<section class="content-wrapper archive-content archives">
		<article class="content">
			<?php get_template_part( 'yoast', 'breadcrumbs' ); // Yoast Breadcrumbs ?>

			<?php
				get_template_part( 'loop', 'archive' ); // Loop - Archive
				get_template_part( 'post', 'navigation' ); // Post Navigation
			?>
		</article>

		<?php get_sidebar(); ?>

		<section class="clear">&nbsp;</section>
	</section>

<?php get_footer(); ?>