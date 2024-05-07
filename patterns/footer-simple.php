<?php
/**
 * Title: Footer Simple
 * Slug: greyd-theme/footer-simple
 * Description: Site title on the left, navigation on the right.
 * Categories: footer
 * Keywords:
 * Viewport Width: 1600
 * Block Types: core/template-part/footer
 * Inserter: false
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"right":"4vw","left":"4vw","top":"4vw","bottom":"4vw"}}},"backgroundColor":"base","textColor":"dark","className":"","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-dark-color has-base-background-color has-text-color has-background" style="padding-top:4vw;padding-right:4vw;padding-bottom:4vw;padding-left:4vw">
	<!-- wp:group {"align":"wide","className":"","layout":{"type":"flex","allowOrientation":false,"justifyContent":"space-between"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
		<div class="wp-block-group">
			<!-- wp:paragraph -->
			<p><?php esc_html_e( '© 2024', 'greyd-theme' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:site-title {"level":0,"className":""} /-->
		</div>
		<!-- /wp:group -->

		<!-- wp:navigation {"overlayMenu":"never","__unstableLocation":"primary","className":"","layout":{"type":"flex","setCascadingProperties":true,"justifyContent":"left","orientation":"horizontal"}} -->
			<!-- wp:page-list {"className":""} /-->
		<!-- /wp:navigation -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->