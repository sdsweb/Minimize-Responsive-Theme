<?php
	// Loop through posts
	if ( have_posts() ) :
		while ( have_posts() ) : the_post();
?>
	<section id="post-<?php the_ID(); ?>" <?php post_class( 'latest-post cf' ); ?>>
		<?php sds_featured_image( true ); ?>

		<section class="post-title-wrap cf <?php echo ( has_post_thumbnail() ) ? 'post-title-wrap-featured-image' : 'post-title-wrap-no-image'; ?>">
			<h2 class="latest-post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
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
		</section>

		<?php the_content( __( 'Continue Reading', 'minimize' ) ); ?>
	</section>
<?php
		endwhile;
	else : // No posts
?>
	<section class="no-results no-posts no-search-results latest-post">
		<?php sds_no_posts(); ?>
	</section>
<?php endif; ?>