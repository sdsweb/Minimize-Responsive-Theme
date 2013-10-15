<?php
/*
 * This template is used for displaying the Front Page (when selected in Settings > Reading).
 *
 * This template is used even when the option is selected, but a page is not. It contains fallback functionality
 * to ensure content is still displayed.
 */

get_header(); ?>
	<?php
		// Front page is active
		if ( get_option( 'show_on_front' ) === 'page' && get_option( 'page_on_front' ) ) :
			sds_front_page_slider_sidebar(); // Front Page Slider Sidebar
	?>
		<section class="content-wrapper front-page-content front-page cf">
			<article class="content">
				<?php if ( is_active_sidebar( 'front-page-sidebar' ) ) : // Front Page Sidebar ?>
					<section class="front-page-sidebar">
						<?php dynamic_sidebar( 'front-page-sidebar' ); ?>
					</section>
				<?php else: ?>
					<?php get_template_part( 'loop', 'page' ); // Loop - Page ?>
				<?php endif; ?>
			</article>
	<?php
		// No "Front Page" Selected, show posts
		else:
	?>
		<section class="content-wrapper front-page-content front-page cf">
			<article class="content">
				<?php
					get_template_part( 'loop', 'home' ); // Loop - Home
					get_template_part( 'post', 'navigation' ); // Post Navigation
				?>
			</article>
	<?php
		endif;
	?>

		<?php get_sidebar(); ?>
	</section>

<?php get_footer(); ?>