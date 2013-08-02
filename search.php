<?php
/*
 * This template is used for the display of search results.
 */

get_header(); ?>
	<section class="content-wrapper search-content search">
		<article class="content">
			<?php get_template_part( 'yoast', 'breadcrumbs' ); // Yoast Breadcrumbs ?>

			<?php
				get_template_part( 'loop', 'search' ); // Loop - Search
				get_template_part( 'post', 'navigation' ); // Post Navigation
			?>

			<section class="clear">&nbsp;</section>
		</article>

		<?php get_sidebar(); ?>

		<section class="clear">&nbsp;</section>
	</section>

<?php get_footer(); ?>