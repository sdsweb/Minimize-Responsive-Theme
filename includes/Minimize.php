<?php
/*
 * This class manages all functionality with our Minimize v2 theme.
 */
class Minimize {
	const MIN_VERSION = '2.1.2';

	private static $instance; // Keep track of the instance

	/*
	 * Function used to create instance of class.
	 * This is used to prevent over-writing of a variable (old method), i.e. $m = new Minimize();
	 */
	public static function instance() {
		if ( ! isset( self::$instance ) )
			self::$instance = new Minimize;

		return self::$instance;
	}



	/*
	 * This function sets up all of the actions and filters on instance
	 */
	function __construct() {
		add_action( 'after_setup_theme', array( $this, 'after_setup_theme' ) ); // Register image sizes
		add_action( 'pre_get_posts', array( $this, 'pre_get_posts' ) ); // Used to enqueue editor styles based on post type
		add_action( 'wp_enqueue_scripts', array( $this, 'wp_enqueue_scripts' ) ); // Enqueue all stylesheets (Main Stylesheet, Fonts, etc...)
		add_action( 'wp_footer', array( $this, 'wp_footer' ) ); // Responsive navigation functionality

		// Theme updates
		add_action( 'admin_init', array( $this, 'admin_init' ) ); // Check and handle updates for theme
		add_filter( 'tuc_request_update_query_args-minimize', array( $this, 'min_update_query_args' ) );
	}


	/************************************************************************************
	 *    Functions to correspond with actions above (attempting to keep same order)    *
	 ************************************************************************************/

	/*
	 * This function adds images sizes to WordPress.
	 */
	function after_setup_theme() {
		add_image_size( 'min-725x400', 725, 400, true ); // Used for featured images on blog page and single posts
		add_image_size( 'min-1100x400', 1100, 400, true ); // Used for featured images on full width pages
	}

	/*
	 * This function adds editor styles based on post type, before TinyMCE is initalized.
	 * It will also enqueue the correct color scheme stylesheet to better match front-end display.
	 */
	function pre_get_posts() {
		global $sds_theme_options, $post;

		// Admin only and if we have a post
		if ( is_admin() && ! empty( $post ) ) {
			add_editor_style( 'css/editor-style.css' );

			// Add correct color scheme if selected
			if ( function_exists( 'sds_color_schemes' ) && ! empty( $sds_theme_options['color_scheme'] ) && $sds_theme_options['color_scheme'] !== 'default' ) {
				$color_schemes = sds_color_schemes();
				add_editor_style( 'css/' . $color_schemes[$sds_theme_options['color_scheme']]['stylesheet'] );
			}

			// Fetch page template if any on Pages only
			if ( $post->post_type === 'page' )
				$wp_page_template = get_post_meta( $post->ID,'_wp_page_template', true );
		}

		// Admin only and if we have a post using our full page or landing page templates
		if ( is_admin() && ! empty( $post ) && ( isset( $wp_page_template ) && ( $wp_page_template === 'page-full-width.php' || $wp_page_template === 'page-landing-page.php' ) ) )
			add_editor_style( 'css/editor-style-full-width.css' );
	}


	/*
	 * This function enqueues all styles and scripts (Main Stylesheet, Fonts, etc...). Stylesheets can be conditionally included if needed
	 * @see wp_head() above for conditional enqueues of scripts
	 */
	function wp_enqueue_scripts() {
		$protocol = is_ssl() ? 'https' : 'http';

		wp_enqueue_script( 'jquery' );
		wp_enqueue_style( 'minimize', get_template_directory_uri() . '/style.css', false, self::MIN_VERSION ); // Minimize (main stylesheet)
		wp_enqueue_style( 'open-sans-web-font', $protocol . '://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600,700,800', false, self::MIN_VERSION ); // Google WebFonts (Open Sans)
	}

	/*
	 * This function outputs the necessary javascript for the responsive menus.
	 */
	function wp_footer() {
	?>
		<script type="text/javascript">
			// <![CDATA[
				jQuery( function( $ ) {
					// Top Nav
					$( '.nav-button' ).on( 'click', function ( e ) {
						e.stopPropagation();
						$( '.nav-button, .top-nav' ).toggleClass( 'open' );
					} );

					// Primary Nav
					$( '.primary-nav-button' ).on( 'click', function ( e ) {
						e.stopPropagation();
						$( '.primary-nav-button, .primary-nav' ).toggleClass( 'open' );
					} );

					$( document ).on( 'click touch', function() {
						$( '.nav-button, .top-nav, .primary-nav-button, .primary-nav' ).removeClass( 'open' );
						
					} );
				} );
			// ]]>
		</script>
	<?php
	}


	/*
	 * This functions handles theme updates from the ThemeUpdateChecker library.
	 */
	function admin_init() {
		if ( ! class_exists( 'ThemeUpdateChecker' ) )
			return;

		$min_theme_updater = new ThemeUpdateChecker( 'minimize', 'http://theme-api.slocumstudio.com/minimize-2/info.php' );

		// Ensure Theme Update Checker "works" on multisite (@see function descriptions below)
		if ( is_multisite() )
			$this->multisite_theme_update_check();
			
	}

	function min_update_query_args( $args ) {
		$args['tt'] = time();
		$args['uid'] = md5( uniqid( rand(), true ) );

		return $args;
	}

	/*
	 * This function ensures that multisite updates "work".
	 * It first checks to make sure the _maybe_update_themes() function exists (@see WP_INC/update.php as of 3.5.2).
	 * If the function does exist, use it to check for theme updates.
	 * If the function does not exist, use the one we've provided which is identical as of 3.5.2.
	 * "works" is in quotation marks because it requires the site that has this theme active to at least make one admin page request (i.e. loading the dashboard).
	 */
	function multisite_theme_update_check() {
		/* delete_site_transient('update_themes'); // Used for DEBUG */

		if ( function_exists( '_maybe_update_themes' ) )
			_maybe_update_themes();
		else
			$this->maybe_update_themes();
	}

	/*
	 * This function is identicle to the one provided in WP 3.5.2 and will check to see if WP should check for theme updates.
	 * It is used as a fallback in multisite_theme_update_check above.
	 */
	function maybe_update_themes() {
		$current = get_site_transient( 'update_themes' );
		if ( isset( $current->last_checked ) && 12 * HOUR_IN_SECONDS > ( time( ) - $current->last_checked ) )
			return;

		wp_update_themes();
	}
}


function MinimizeInstance() {
	return Minimize::instance();
}

// Starts Minimize
MinimizeInstance();