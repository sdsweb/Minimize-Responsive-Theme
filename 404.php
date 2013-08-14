<?php
/*
 * This template is used for the display of 404 (Not Found) errors.
 */

get_header(); ?>
	<section class="content-wrapper 404-content">
		<article class="content">
			<header class="404-title">
				<h1 title="404 Error" class="page-title">404 Error</h1>
			</header>

			<section class="404-error no-posts latest-post">
				<p>We apologize but something when wrong while trying to find what you were looking for. Please use the navigation below to navigate to your destination.</p>

				<section id="search-again" class="search-again search-block no-posts no-search-results">
					<p>Search:</p>
					<?php echo get_search_form(); ?>
				</section>

				<?php sds_sitemap(); ?>
			</section>
		</article>

		<?php get_sidebar(); ?>
	</section>

<?php get_footer(); ?>