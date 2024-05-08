<?php
/**
 * Title: Header Simple Dark
 * Slug: greyd-wp/header-simple-dark
 * Description: Header with logo, site title and menu, on a dark background
 * Categories: header
 * Keywords: header, nav, links
 * Viewport Width: 1600
 * Block Types: core/template-part/header
 * Inserter: false
 */
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium"}},"elements":{"link":{"color":{"text":"var:preset|color|background"}}}},"backgroundColor":"foreground","textColor":"background","className":"","layout":{"inherit":"true","type":"constrained"}} -->
<div class="wp-block-group has-background-color has-foreground-background-color has-text-color has-background has-link-color" style="padding-top:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium)">
	<!-- wp:group {"align":"wide","className":"","layout":{"type":"flex","justifyContent":"space-between"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:group {"className":"","layout":{"type":"flex","flexWrap":"nowrap"}} -->
		<div class="wp-block-group">
			<!-- wp:site-logo {"width":44,"className":""} /-->

			<!-- wp:site-title {"level":0,"className":""} /-->
		</div>
		<!-- /wp:group -->

		<!-- wp:navigation {"__unstableLocation":"primary","className":"","layout":{"type":"flex","setCascadingProperties":true,"justifyContent":"right","orientation":"horizontal"},"style":{"spacing":{"margin":{"top":"0"}}}} -->
			<!-- wp:page-list {"className":""} /-->
		<!-- /wp:navigation -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->