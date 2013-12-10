<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

/**
 * SDS Social Media Widget
 *
 * Description: This Class extends WP_Widget to create a social media widget for display in sidebars.
 *
 * @version 1.0
 */
if ( ! class_exists( 'SDS_Social_Media_Widget' ) ) {
	class SDS_Social_Media_Widget extends WP_Widget {
		/**
		 * These functions calls and hooks are added on new instance.
		 */
		function __construct() {
			$widget_ops = array( 'classname' => 'widget-sds-social-media sds-social-media-widget', 'description' => 'Display social media icons linking to your networks specified in Theme Options.' );
			$this->WP_Widget( 'sds-social-media-widget', 'Social Media Widget', $widget_ops );
		}

		/**
		 * This function controls the widget form in admin.
		 */
		function form( $instance ) {
			$instance = wp_parse_args( $instance, array( 'title' => '' ) );
		?>
			<p>
				<label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
				<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
			</p>
		<?php
		}

		/**
		 * This function sanitizes user input upon saving widget data.
		 */
		function update( $new_instance, $old_instance ) {
			$new_instance['title'] = sanitize_text_field( $new_instance['title'] );
			return $new_instance;
		}

		/**
		 * This function controls the display of the widget on the site.
		 */
		function widget( $args, $instance ) {
			extract( $args );
				
			echo $before_widget;
			
			$title = apply_filters( 'widget_title', ( ! empty( $instance['title'] ) ) ? $instance['title'] : '', $instance );

			if ( ! empty( $instance['title'] ) )
				echo $before_title . esc_html( $title ) . $after_title;

			sds_social_media();

			echo $after_widget;
		}
	}
}