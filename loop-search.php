<?php
	if ( have_posts() ) : // Search results
?>
	<header class="search-title">
		<h1 title="Search results for '<?php echo esc_attr( get_search_query() ); ?>'" class="page-title">Search results for '<?php the_search_query(); ?>'</h1>
	</header>

	<?php while ( have_posts() ) : the_post(); ?>
		<section id="post-<?php the_ID(); ?>" <?php post_class( 'latest-post' ); ?>>
			<?php sds_featured_image( true ); ?>

			<section class="post-title-wrap <?php echo ( has_post_thumbnail() ) ? 'post-title-wrap-featured-image' : 'post-title-wrap-no-image'; ?>">
				<h2 class="latest-post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<?php if ( $post->post_type === 'post' ) : ?>
					<p class="latest-post-date">
						<?php
							if ( strlen( get_the_title() ) > 0 ) :
								the_time( 'F j, Y' );
							else: // No title
						?>
							<a href="<?php the_permalink(); ?>"><?php the_time( 'F j, Y' ); ?></a>
						<?php
							endif;
						?>
					</p>
				<?php endif; ?>
			</section>

			<section class="clear">&nbsp;</section>

			<?php the_content( 'Continue Reading' ); ?>

			<section class="clear">&nbsp;</section>
		</section>
	<?php endwhile; ?>
<?php else : // No search results ?>
	<header class="search-title">
		<h1 title="No results for '<?php echo esc_attr( get_search_query() ); ?>'" class="page-title">No results for '<?php the_search_query(); ?>'</h1>
	</header>

	<section class="no-results no-posts no-search-results latest-post">
		<?php sds_no_posts(); ?>

		<section id="search-again" class="search-again search-block no-posts no-search-results">
			<p>Would you like to search again?</p>
			<?php echo get_search_form(); ?>
		</section>
	</section>
<?php endif; ?>