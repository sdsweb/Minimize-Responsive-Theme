jQuery( function( $ ) {
	/**
	 * WordPress 3.5 Media Uploader Script/Tutorial - http://mikejolley.com/2012/12/using-the-new-wordpress-3-5-media-uploader-in-plugins/
	 * License: None (public domain)
	 * Copyright: Mike Jolley, http://mikejolley.com/
	 *
	 * We've modified this to suit our needs.
	 */
	var sds_media_frame;

	jQuery( '.sds-theme-options-upload' ).on( 'click', function( e ) {
		var _this = $( this );
		e.preventDefault();

		// If the media frame already exists, reopen it
		if ( sds_media_frame ) {
			sds_media_frame.open();
			return;
		}

		// Create the media frame
		sds_media_frame = wp.media.frames.sds_media_frame = wp.media( {
			title: _this.attr( 'data-media-title' ),
			button: { text: _this.attr( 'data-media-button-text' ) },
			multiple: false
		} );

		// When an image is selected, run a callback
		sds_media_frame.on( 'select', function() {
			// We set multiple to false so only get one image from the uploader
			var attachment = sds_media_frame.state().get( 'selection' ).first().toJSON();

			if ( attachment.hasOwnProperty( 'type' ) && attachment.type === 'image' ) {
				_this.parent().find( '.sds-theme-options-upload-value' ).val( attachment.id );
				_this.parent().find( '.sds-theme-options-preview' ).html( '<img src="' + attachment.url + '" width="' + attachment.width + '" height="' + attachment.height + '" alt="Logo" title="Logo" />' );

				var remove_logo_btn = _this.parent().find( '.button-remove-logo' );

				if ( remove_logo_btn.attr( 'data-init-empty' ) ) {
					remove_logo_btn.attr( 'disabled', false );

					remove_logo_btn.on( 'click', function ( e ) {
						e.preventDefault();

						_this.parent().find( '.sds-theme-options-upload-value' ).val( '' );
						_this.parent().find( '.sds-theme-options-preview' ).html( '<div class="description">No logo selected.</div>' );
					remove_logo_btn.attr( 'disabled', true );
						
					} );
				}
			}
			else
				_this.parent().find( '.sds-theme-options-preview' ).html( '<div class="description error">Please choose an image from the Media Library for the logo.</div>' );

			console.log( attachment );
		} );

		// Open the modal
		sds_media_frame.open();
	} );


	/**
	 * Social Media - RSS (hide custom feed url box when default is used)
	 */
	$( '#sds_theme_options_social_media_rss_url_use_site_feed' ).on( 'change', function( e ) {
		console.log( 'change' );
		var _this = $( this ), _this_parent = _this.parents( 'td' );
		if ( _this.is( ':checked' ) )
			_this_parent.find( '#sds_theme_options_social_media_rss_url_custom' ).slideUp();
		else
			_this_parent.find( '#sds_theme_options_social_media_rss_url_custom' ).slideDown();
	} );

	if ( $( '#sds_theme_options_social_media_rss_url_use_site_feed' ).is( ':checked' ) )
		$( '#sds_theme_options_social_media_rss_url_use_site_feed' ).parents( 'td' ).find( '#sds_theme_options_social_media_rss_url_custom' ).hide();



	/**
	 * Navigation Tabs
	 */
	$( '.sds-theme-options-tab-wrap a' ).on( 'click', function ( e ) {
		var _this = $( this ), tab_id_prefix = _this.attr( 'href' );

		// Remove active classes
		$( '.sds-theme-options-tab-content' ).removeClass( 'sds-theme-options-tab-content-active' );
		$( '.sds-theme-options-tab' ).removeClass( 'nav-tab-active' );

		// Activate new tab
		$( tab_id_prefix + '-tab-content' ).addClass( 'sds-theme-options-tab-content-active' );
		_this.addClass( 'nav-tab-active' );
		$( '#sds_theme_options_tab' ).val( tab_id_prefix );

		// Hide submit buttons on Help/Support tab
		if ( tab_id_prefix === '#help-support' )
			$( '.submit' ).hide();
		else if ( ! $( '.submit' ).is( ':visible' ) )
			$( '.submit' ).show();
	} );

	if ( window.location.hash ) {
		// Remove active classes
		$( '.sds-theme-options-tab-content' ).removeClass( 'sds-theme-options-tab-content-active' );
		$( '.sds-theme-options-tab' ).removeClass( 'nav-tab-active' );

		// Activate tab
		$( window.location.hash + '-tab-content' ).addClass( 'sds-theme-options-tab-content-active' );
		$( window.location.hash + '-tab').addClass( 'nav-tab-active' );
		$( '#sds_theme_options_tab' ).val( window.location.hash );

		// Hide submit buttons on Help/Support tab
		if ( window.location.hash === '#help-support' )
			$( '.submit' ).hide();
		else if ( ! $( '.submit' ).is( ':visible' ) )
			$( '.submit' ).show();
	}
} );