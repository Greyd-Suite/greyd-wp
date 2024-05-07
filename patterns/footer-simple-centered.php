<?php
/**
 * Title: Footer Simple, Centered
 * Slug: greyd-theme/footer-simple-centered
 * Description: Site logo, site title
 * Categories: footer
 * Keywords:
 * Viewport Width: 1600
 * Block Types: core/template-part/footer
 * Inserter: false
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"right":"4vw","left":"4vw","top":"4vw","bottom":"4vw"}}},"backgroundColor":"base","textColor":"foreground","className":"","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-foreground-color has-base-background-color has-text-color has-background" style="padding-top:4vw;padding-right:4vw;padding-bottom:4vw;padding-left:4vw">
	<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"className":"","layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
	<div class="wp-block-group">
		<!-- wp:site-logo {"width":76,"className":""} /-->

		<!-- wp:site-title {"level":0,"className":""} /-->

		<!-- wp:paragraph {"className":"","fontSize":"tiny"} -->
		<p class="has-tiny-font-size"><?php esc_html_e( '© 2024', 'greyd-theme' ); ?> <?php esc_html_e( 'All rights reserved', 'greyd-theme' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->