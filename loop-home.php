<?php
	global $sbt_options;

	// Loop through posts
	if ( have_posts() ) :
		while ( have_posts() ) : the_post();
?>
	<section id="post-<?php the_ID(); ?>" <?php post_class( 'latest-post' ); ?>>
		<?php sds_featured_image( true ); ?>

		<section class="post-title-wrap <?php echo ( has_post_thumbnail() ) ? 'post-title-wrap-featured-image' : 'post-title-wrap-no-image'; ?>">
			<h2 class="latest-post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<p class="latest-post-date"><?php the_time( 'F j, Y' ); ?></p>
		</section>

		<section class="clear">&nbsp;</section>

		<?php the_content( 'Continue Reading' ); ?>
	</section>
<?php
		endwhile;
	else : // No posts
?>
	<section class="no-results no-posts no-search-results latest-post">
		<?php sds_no_posts(); ?>
	</section>
<?php endif; ?>