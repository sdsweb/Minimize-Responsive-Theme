	<section class="clear"></section>

	<!-- Footer -->
		<footer id="footer">	
			<section class="footer-widgets-container">
				<section class="footer-widgets <?php echo ( is_active_sidebar( 'footer-sidebar' ) ) ? 'widgets' : 'no-widgets'; ?>">
					<?php sds_footer_sidebar(); // Footer (4 columns) ?>
				</section>
			</section>

			<nav>
				<?php
					// Footer Navigation Area
					if( has_nav_menu( 'footer_nav' ) )
						wp_nav_menu( array(
							'theme_location' => 'footer_nav',
							'container' => false,
							'menu_class' => 'footer-nav menu',
							'menu_id' => 'footer-nav',
						) );
				?>
			</nav>

			<section class="copyright-area <?php echo ( is_active_sidebar( 'copyright-area-sidebar' ) ) ? 'widgets' : 'no-widgets'; ?>">
				<?php sds_copyright_area_sidebar(); ?>
			</section>

			<p class="copyright">
				<?php sds_copyright( 'Minimize' ); ?>
			</p>
		</footer>

		<?php wp_footer(); ?>
	</body>
</html>