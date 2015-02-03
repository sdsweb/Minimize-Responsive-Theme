<?php

// Make sure the Customize Image Control class exists
if ( ! class_exists( 'WP_Customize_Image_Control' ) )
	return false;

/**
 * This class is a custom controller for the Theme Customizer API for Slocum Themes
 * which extends the WP_Customize_Image_Control class provided by WordPress.
 */
class SDS_Theme_Options_Customize_Logo_Control extends WP_Customize_Image_Control {
	public $sds_theme_options_instance;

	/**
	 * Constructor
	 */
	function __construct( $manager, $id, $args ) {
		// Just calling the parent constructor here
		parent::__construct( $manager, $id, $args );
	}

	/**
	 * TODO: Is this function necessary?
	 */
	public function to_json() {
		// Just calling the parent to_json method here
		parent::to_json();
	}

	/**
	 * This function enqueues scripts and styles
	 */
	public function enqueue() {
		wp_enqueue_media(); // Enqueue media scripts
		wp_enqueue_script( 'sds-theme-options-customizer-logo', get_template_directory_uri() . '/includes/js/customizer-sds-theme-options-logo.js', array( 'customize-base', 'customize-controls' ), SDS_Theme_Options::VERSION );

		// Call the parent enqueue method here
		parent::enqueue();
	}

	/**
	 * This function renders the control's content.
	 *
	 * @uses SDS_Theme_Options_Instance()->sds_theme_options_logo_field();
	 */
	public function render_content() {
	?>
		<div class="customize-image-picker customize-sds-theme-options-logo-upload">
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<?php $this->sds_theme_options_instance->sds_theme_options_logo_field( true ); ?>
		</div>
	<?php
	}
}