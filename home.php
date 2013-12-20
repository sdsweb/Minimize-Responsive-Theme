<?php
/*
 * This template is used for the display of blog posts (archive; river).
 */

get_header(); ?>
	<?php
		// Front page is blogroll
		if ( get_option( 'show_on_front' ) === 'page' && ! get_option( 'page_on_front' ) )
			sds_front_page_slider_sidebar(); // Front Page Slider Sidebar
	?>
	<section class="content-wrapper home-content home cf">
		<article class="content cf">
			<?php get_template_part( 'yoast', 'breadcrumbs' ); // Yoast Breadcrumbs ?>

			<?php
				get_template_part( 'loop', 'home' ); // Loop - Home
				get_template_part( 'post', 'navigation' ); // Post Navigation
			?>
		</article>

		<?php get_sidebar(); ?>
	</section>

<?php get_footer(); ?>