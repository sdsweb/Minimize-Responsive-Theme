<?php
/*
 * This template is used for the display of blog posts (archive; river).
 */

get_header(); ?>
	<section class="content-wrapper home-content home">
		<article class="content">
			<?php get_template_part( 'yoast', 'breadcrumbs' ); // Yoast Breadcrumbs ?>

			<?php
				get_template_part( 'loop', 'home' ); // Loop - Home
				get_template_part( 'post', 'navigation' ); // Post Navigation
			?>
		</article>

		<?php get_sidebar(); ?>

		<section class="clear">&nbsp;</section>
	</section>

<?php get_footer(); ?>