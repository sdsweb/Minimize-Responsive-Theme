<?php
/*
 * This template is used for the display of search results.
 */

get_header(); ?>
	<section class="content-wrapper search-content search cf">
		<article class="content cf">
			<?php get_template_part( 'yoast', 'breadcrumbs' ); // Yoast Breadcrumbs ?>

			<?php
				get_template_part( 'loop', 'search' ); // Loop - Search
				get_template_part( 'post', 'navigation' ); // Post Navigation
			?>
		</article>

		<?php get_sidebar(); ?>
	</section>

<?php get_footer(); ?>