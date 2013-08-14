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

			<?php comments_template(); // Comments ?>
		</article>

		<section class="clear">&nbsp;</section>
	</section>

<?php get_footer( 'landing-page' ); ?>