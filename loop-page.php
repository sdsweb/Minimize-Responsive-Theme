<?php
	global $multipage;

	// Loop through posts
	if ( have_posts() ) :
		while ( have_posts() ) : the_post();
?>
	<section id="post-<?php the_ID(); ?>" <?php post_class( 'latest-post' ); ?>>
		<?php sds_featured_image(); ?>

		<section class="post-title-wrap page-title-wrap <?php echo ( has_post_thumbnail() ) ? 'post-title-wrap-featured-image' : 'post-title-wrap-no-image'; ?>">
			<h1 class="page-title"><?php the_title(); ?></h1>
		</section>

		<section class="clear">&nbsp;</section>

		<?php the_content(); ?>

		<section class="clear">&nbsp;</section>

		<?php edit_post_link( 'Edit Page' ); // Allow logged in users to edit ?>

		<?php if ( $multipage ) : ?>
			<section class="single-post-navigation single-post-pagination wp-link-pages">
				<?php wp_link_pages(); ?>
			</section>
		<?php endif; ?>
	</section>
<?php
		endwhile;
	endif;
?>