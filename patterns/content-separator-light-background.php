<?php
/**
 * Title: Separator with Light Background
 * Slug: greyd-wp/content-separator-light-background
 * Description: A separator with a light solid background color.
 * Categories: greyd-content
 * Keywords:
 * Viewport Width: 1600
 * Inserter: true
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|x-large","left":"0","right":"0"}}},"backgroundColor":"secondary","className":"","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-secondary-background-color has-background" style="padding-top:var(--wp--preset--spacing--x-large);padding-right:0;padding-bottom:var(--wp--preset--spacing--x-large);padding-left:0">
	<!-- wp:columns {"verticalAlignment":"center","align":"wide","className":""} -->
	<div class="wp-block-columns alignwide are-vertically-aligned-center">
		<!-- wp:column {"verticalAlignment":"center","className":""} -->
		<div class="wp-block-column is-vertically-aligned-center">
			<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"constrained"}} -->
			<div class="wp-block-group">
				<!-- wp:heading {"textAlign":"left","level":2,"className":""} -->
				<h2 class="wp-block-heading has-text-align-left"><?php esc_html_e( 'All WordPress. One Suite.', 'greyd-wp' ); ?></h2>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"align":"left","className":""} -->
				<p class="has-text-align-left"><?php esc_html_e( 'Take your website to the next level!', 'greyd-wp' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center","width":"33%","className":""} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:33%">
			<!-- wp:buttons {"className":"","layout":{"type":"flex","justifyContent":"right"}} -->
			<div class="wp-block-buttons">
				<!-- wp:button {"className":"has-custom-width wp-block-button__width-100 is-size-big is-style-fill"} -->
				<div class="wp-block-button has-custom-width wp-block-button__width-100 is-size-big is-style-fill">
					<a class="wp-block-button__link wp-element-button"><?php esc_html_e( 'Get Started →', 'greyd-wp' ); ?></a>
				</div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->