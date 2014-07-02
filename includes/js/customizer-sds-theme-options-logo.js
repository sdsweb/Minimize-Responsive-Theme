window.wp = window.wp || {};

( function( exports, $ ) {
	"use strict";

	var api = wp.customize;

	// Logo Upload Controller
	api.SDSThemeOptionsLogoControl = api.ImageControl.extend( {
		// When the customizer is "ready"
		ready: function() {
			var self = this,
				$upload_btn = self.container.find( '.sds-theme-options-upload'),
				$remove_logo_btn = self.container.find( '.button-remove-logo' );

			/**
			 * WordPress 3.5 Media Uploader Script/Tutorial - http://mikejolley.com/2012/12/using-the-new-wordpress-3-5-media-uploader-in-plugins/
			 * License: None (public domain)
			 * Copyright: Mike Jolley, http://mikejolley.com/
			 *
			 * We've modified this to suit our needs.
			 */

			// Create the media frame
			self.sds_media_frame = wp.media.frames.sds_media_frame = wp.media( {
				title: $upload_btn.attr( 'data-media-title' ),
				button: { text: $upload_btn.attr( 'data-media-button-text' ) },
				multiple: false
			} );

			// When an image is selected, run a callback
			self.sds_media_frame.on( 'select', function() {
				// We set multiple to false so only get one image from the uploader
				var attachment = self.sds_media_frame.state().get( 'selection' ).first().toJSON(),
					$upload_val = self.container.find( '.sds-theme-options-upload-value' ),
					$preview = self.container.find( '.sds-theme-options-preview' );

				// Validate the user's selection
				if ( attachment.hasOwnProperty( 'type' ) && attachment.type === 'image' ) {
					$upload_val.val( attachment.id );
					$preview.html( '<img src="' + attachment.url + '" width="' + attachment.width + '" height="' + attachment.height + '" alt="Logo" title="Logo" />' );

					// Enable the Remove Logo button
					$remove_logo_btn.attr( 'disabled', false );

					// Call the success function
					self.success( attachment );
				}
				else {
					$preview.html( '<div class="description error">Please choose an image from the Media Library for the logo.</div>' );
				}
			} );

			// Upload button on click
			$upload_btn.on( 'click.sds-theme-options', function( e ) {
				e.preventDefault();

				// If the media frame already exists, open it
				if ( wp.media.frames.hasOwnProperty( 'sds_media_frame' ) ) {
					self.sds_media_frame.open();
				}
				else {
					return false;
				}
			} );

			// Remove logo button
			$remove_logo_btn.on( 'click', function ( e ) {
				var $this = $( this ),
					$upload_val = self.container.find( '.sds-theme-options-upload-value' ),
					$preview = self.container.find( '.sds-theme-options-preview' );

				// Prevent default functionality
				e.preventDefault();

				// Update the value and preview
				$upload_val.val( '' );
				$preview.html( '<div class="description">No logo selected.</div>' );

				// Disable button
				$this.attr( 'disabled', true );

				// Call the removed function
				self.remove();
			} );
		},
		// This function fires when the user has successfully selected an image for their logo
		success: function( attachment ) {
			// Set the value to ensure the controller knows
			this.setting.set( attachment.id );
		},
		// This function fires when the user has removed their logo
		remove: function() {
			// Set the value to ensure the controller knows
			this.setting.set( '' );
		}
	} );

	// Add custom SDS Theme Options Logo control to control constructor
	api.controlConstructor.sds_theme_options_logo = api.SDSThemeOptionsLogoControl;
} )( wp, jQuery );