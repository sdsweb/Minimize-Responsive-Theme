<!-- Page Sidebar-->
<aside class="sidebar">
		<?php
			// Primary Sidebar
			if ( is_active_sidebar( 'primary-sidebar' ) )
				sds_primary_sidebar();
			// Social Media Fallback
			else
				sds_social_media();
		?>
</aside>