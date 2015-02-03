<?php
	if ( have_posts() ) : // Search results
?>
	<header class="search-title">
		<h1 title="<?php esc_attr_e( sprintf( __( 'Search results for \'%s\'', 'minimize' ), get_search_query() ) ); ?>" class="page-title"><?php printf( __( 'Search results for "%s"', 'minimize' ), get_search_query() ); ?></h1>
	</header>

	<?php while ( have_posts() ) : the_post(); ?>
		<section id="post-<?php the_ID(); ?>" <?php post_class( 'latest-post cf' ); ?>>
			<?php sds_featured_image( true ); ?>

			<section class="post-title-wrap cf <?php echo ( has_post_thumbnail() ) ? 'post-title-wrap-featured-image' : 'post-title-wrap-no-image'; ?>">
				<h2 class="latest-post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<?php if ( $post->post_type === 'post' ) : ?>
					<p class="latest-post-date">
						<?php
							if ( strlen( get_the_title() ) > 0 ) :
								the_time( get_option( 'date_format' ) );
							else: // No title
						?>
							<a href="<?php the_permalink(); ?>"><?php the_time( get_option( 'date_format' ) ); ?></a>
						<?php
							endif;
						?>
					</p>
				<?php endif; ?>
			</section>

			<?php
				// Show the excerpt if the post has one
				if ( has_excerpt() ) :
					the_excerpt();
				?>
					<p><a href="<?php the_permalink(); ?>" class="more-link read-more excerpt-more-link"><?php _e( 'Continue Reading', 'minimize' ); ?></a></p>
				<?php
				else :
					the_content( __( 'Continue Reading', 'minimize' ) );
				endif;
			?>
		</section>
	<?php endwhile; ?>
<?php else : // No search results ?>
	<header class="search-title">
		<h1 title="<?php esc_attr_e( sprintf( __( 'No results for \'%s\'', 'minimize' ), get_search_query() ) ); ?>'" class="page-title"><?php printf( __( 'No results for "%s"', 'minimize' ), get_search_query() ); ?></h1>
	</header>

	<section class="no-results no-posts no-search-results latest-post">
		<?php sds_no_posts(); ?>

		<section id="search-again" class="search-again search-block no-posts no-search-results">
			<p><?php _e( 'Would you like to search again?', 'minimize' ); ?></p>
			<?php echo get_search_form(); ?>
		</section>
	</section>
<?php endif; ?>