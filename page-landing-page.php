<?php
/*
 * Template Name: Landing Page
 * This template is used for the display of landing pages.
 */

get_header( 'landing-page' ); ?>
	<section class="content-wrapper page-content full-width-content-wrapper">
		<article class="content full-width-content">

			<?php get_template_part( 'loop', 'page-full-width' ); // Loop - Full Width ?>

			<section class="clear">&nbsp;</section>

			<?php if ( comments_open() ) : ?>
				<section id="comments-container" class="comments-container post-comments post-comments-container">
					<?php comments_template(); // Comments ?>
				</section>
			<?php endif; ?>
		</article>
	</section>

<?php get_footer( 'landing-page' ); ?>