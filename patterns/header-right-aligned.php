<?php
/**
 * Title: Header Right Aligned
 * Slug: greyd-wp/header-right-aligned
 * Description: Header with logo, site title and menu, right aligned
 * Categories: header
 * Keywords: header, nav, links
 * Viewport Width: 1600
 * Block Types: core/template-part/header
 * Inserter: false
 */
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium"}}},"className":"","layout":{"inherit":"true","type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium)">
	<!-- wp:group {"align":"wide","className":"","layout":{"type":"flex","flexWrap":"nowrap","orientation":"horizontal","justifyContent":"space-between"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:navigation {"__unstableLocation":"primary","className":"","layout":{"type":"flex","setCascadingProperties":true,"justifyContent":"left","orientation":"horizontal"},"style":{"spacing":{"margin":{"top":"0"}}}} -->
			<!-- wp:page-list {"className":""} /-->
		<!-- /wp:navigation -->

		<!-- wp:group {"className":"","layout":{"type":"flex","flexWrap":"nowrap"}} -->
		<div class="wp-block-group">
			<!-- wp:site-title {"level":0,"textAlign":"right","className":""} /-->

			<!-- wp:site-logo {"width":44,"shouldSyncIcon":true,"className":""} /-->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->