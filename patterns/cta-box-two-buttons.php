<?php
/**
 * Title: CTA Box with Two Buttons
 * Slug: greyd-wp/cta-box-two-buttons
 * Description: Simple CTA box with two buttons
 * Categories: greyd-cta
 * Keywords:
 * Viewport Width: 1400
 * Block Types:
 * Post Types:
 * Inserter: true
 */
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|x-large","right":"var:preset|spacing|large","left":"var:preset|spacing|large"}},"border":{"radius":"4px"}},"backgroundColor":"base","textColor":"foreground","className":"","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-foreground-color has-base-background-color has-text-color has-background" style="border-radius:4px;padding-top:var(--wp--preset--spacing--x-large);padding-right:var(--wp--preset--spacing--large);padding-bottom:var(--wp--preset--spacing--x-large);padding-left:var(--wp--preset--spacing--large)">
	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|large"}},"className":"","layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"className":"","layout":{"type":"constrained","contentSize":"840px"}} -->
		<div class="wp-block-group">
			<!-- wp:heading {"textAlign":"center","className":"","fontSize":"medium"} -->
			<h2 class="wp-block-heading has-text-align-center has-medium-font-size"><?php esc_html_e( 'Build With Patterns', 'greyd-wp' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"align":"center","textColor":"primary-accent","className":""} -->
			<p class="has-text-align-center has-primary-accent-color has-text-color"><?php esc_html_e( 'Benefit from the power of the WordPress Block &amp; Site Editor and our ready-to-use patterns and templates. No need for pagebuilders, coding or additional plugins.', 'greyd-wp' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:buttons {"className":"","layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"blockGap":"var:preset|spacing|small"}}} -->
		<div class="wp-block-buttons">
			<!-- wp:button {"className":"is-style-fill"} -->
			<div class="wp-block-button is-style-fill">
				<a class="wp-block-button__link wp-element-button"><?php esc_html_e( 'Get Started Today', 'greyd-wp' ); ?></a>
			</div>
			<!-- /wp:button -->

			<!-- wp:button {"className":"is-style-outline"} -->
			<div class="wp-block-button is-style-outline">
				<a class="wp-block-button__link wp-element-button"><?php esc_html_e( 'Explore Features →', 'greyd-wp' ); ?></a>
			</div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->