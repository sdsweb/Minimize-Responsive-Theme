<?php

if ( ! class_exists( 'WP_Customize_Control' ) )
	return;

/**
 * This class is a custom controller for the Theme Customizer API.
 */
if ( ! class_exists( 'WP_Customize_US_Control' ) ) {
	class WP_Customize_US_Control extends WP_Customize_Control {
		public $content = '';

		/**
		 * Constructor
		 */
		function __construct( $manager, $id, $args ) {
			// Just calling the parent constructor here
			parent::__construct( $manager, $id, $args );
		}

		/**
		 * This function renders the control's content.
		 */
		public function render_content() {
			echo $this->content;
		}
	}
}