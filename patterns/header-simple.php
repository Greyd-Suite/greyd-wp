<?php
/**
 * Title: Header Simple (Default)
 * Slug: greyd-theme/header-simple
 * Description: Header with logo, site title and menu
 * Categories: header
 * Keywords: header, nav, links
 * Viewport Width: 1600
 * Block Types: core/template-part/header
 * Post Types: wp_template
 * Inserter: false
 */
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium"}}},"className":"","layout":{"inherit":"true","type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium)">
	<!-- wp:group {"align":"wide","className":"","layout":{"type":"flex","justifyContent":"space-between"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:group {"className":"","layout":{"type":"flex","flexWrap":"nowrap"}} -->
		<div class="wp-block-group">
			<!-- wp:site-logo {"width":44,"shouldSyncIcon":true,"className":""} /-->

			<!-- wp:site-title {"level":0,"className":""} /-->
		</div>
		<!-- /wp:group -->

		<!-- wp:navigation {"__unstableLocation":"primary","className":"","layout":{"type":"flex","setCascadingProperties":true,"justifyContent":"left","orientation":"horizontal"},"style":{"spacing":{"margin":{"top":"0"}}}} -->
			<!-- wp:page-list {"className":""} /-->
		<!-- /wp:navigation -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->