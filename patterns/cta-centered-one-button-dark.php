<?php
/**
 * Title: CTA Centered, One Button, Dark
 * Slug: greyd-wp/cta-centered-one-button-dark
 * Description:
 * Categories: greyd-cta
 * Keywords:
 * Viewport Width: 1000
 * Block Types:
 * Post Types:
 * Inserter: true
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|x-large"}}},"backgroundColor":"foreground","className":"","layout":{"type":"constrained","contentSize":"690px"}} -->
<div class="wp-block-group alignfull has-foreground-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--x-large);padding-bottom:var(--wp--preset--spacing--x-large)">
	<!-- wp:group {"style":{"elements":{"link":{"color":{"text":"var:preset|color|lightest"}}},"dimensions":{"minHeight":""},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"blockGap":"var:preset|spacing|large"}},"textColor":"lightest","className":"","layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
	<div class="wp-block-group has-lightest-color has-text-color has-link-color" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
		<div class="wp-block-group">
			<!-- wp:heading {"className":""} -->
			<h2 class="wp-block-heading">
				<strong><?php esc_html_e( 'You want to try Greyd?', 'greyd-wp' ); ?></strong>
			</h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"align":"center","className":"","fontSize":"medium"} -->
			<p class="has-text-align-center has-medium-font-size"><?php esc_html_e( 'Greyd.Suite is the solution that will remind you how satisfying it is to make a business thrive and scale with WordPress.', 'greyd-wp' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:buttons {"align":"","className":""} -->
		<div class="wp-block-buttons">
			<!-- wp:button {"className":"is-style-prim"} -->
			<div class="wp-block-button is-style-prim">
				<a class="wp-block-button__link wp-element-button"><?php esc_html_e( 'Download now', 'greyd-wp' ); ?></a>
			</div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->