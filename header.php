<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8"> <![endif]-->
<!--[if IE 9 ]><html class="ie ie9"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html><!--<![endif]-->
	<head>
		<title><?php wp_title( '|', true, 'right' ); ?> <?php bloginfo( 'name' ); ?></title>
		<meta charset="<?php bloginfo( 'blog_charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
			
		<?php wp_head(); ?>
	</head>

	<body <?php language_attributes(); ?> <?php body_class(); ?>>
	<!-- Header	-->
		<header id="header">
			<?php if( has_nav_menu( 'top_nav' ) ) : // Top Navigation Area ?>
				<button class="nav-button">Toggle Navigation</button>
				<nav class="top-nav">
					<?php
						wp_nav_menu( array(
							'theme_location' => 'top_nav',
							'container' => false,
							'menu_class' => 'top-nav secondary-nav menu',
							'menu_id' => 'top-nav',
						) );
					?>
				</nav>
			<?php endif; ?>
	<!-- Logo	-->
			<section class="logo-box">
				<?php sds_logo(); ?>
				<?php sds_tagline(); ?>
			</section>
	<!--  nav options	-->		
			<aside class="nav-options">
				<section class="header-cta-container header-call-to-action">
					<?php sds_header_call_to_action_sidebar(); // Header CTA Sidebar ?>
				</section>
			</aside>
			<section class="clear"></section>

	<!-- main nav	-->
			<nav class="primary-nav-container">
				<button class="primary-nav-button"><img src="<?php echo get_template_directory_uri(); ?>/images/menu-icon-large.png" alt="Toggle Navigation" /> Navigation</button>
				<?php
					wp_nav_menu( array(
						'theme_location' => 'primary_nav',
						'container' => false,
						'menu_class' => 'primary-nav menu',
						'menu_id' => 'primary-nav',
						'fallback_cb' =>  'sds_primary_menu_fallback'
					) );
				?>
			</nav>
		</header>

		<section class="clear">&nbsp;</section>