<?php
	global $multipage; // Used to determine if the current post has multiple pages

	// Loop through posts
	if ( have_posts() ) :
		while ( have_posts() ) : the_post();
?>
	<section id="post-<?php the_ID(); ?>" <?php post_class( 'full-width-post cf' ); ?>>
		<?php sds_featured_image( false, 'min-1100x400' ); // Full width featured image ?>

		<h1 class="page-title"><?php the_title(); ?></h1>

		<?php the_content(); ?>

		<section class="clear"></section>

		<?php edit_post_link( __( 'Edit Page', 'minimize' ) ); // Allow logged in users to edit ?>

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