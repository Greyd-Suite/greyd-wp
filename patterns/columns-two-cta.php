<?php
/**
 * Title: Two Columns with CTA
 * Slug: greyd-wp/columns-two-cta
 * Description:
 * Categories: greyd-columns, greyd-cta
 * Keywords:
 * Viewport Width: 1000
 * Block Types:
 * Post Types:
 * Inserter: true
 */
?>
<!-- wp:columns {"align":"wide","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"blockGap":{"left":"0"}}},"className":""} -->
<div class="wp-block-columns alignwide" style="margin-top:0;margin-bottom:0">
	<!-- wp:column {"verticalAlignment":"center","style":{"spacing":{"padding":{"right":"var:preset|spacing|large","left":"var:preset|spacing|large","top":"var:preset|spacing|large","bottom":"var:preset|spacing|large"}},"elements":{"link":{"color":{"text":"var:preset|color|background"}}}},"backgroundColor":"foreground","textColor":"background","className":""} -->
	<div class="wp-block-column is-vertically-aligned-center has-background-color has-foreground-background-color has-text-color has-background has-link-color" style="padding-top:var(--wp--preset--spacing--large);padding-right:var(--wp--preset--spacing--large);padding-bottom:var(--wp--preset--spacing--large);padding-left:var(--wp--preset--spacing--large)">
		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"default"}} -->
		<div class="wp-block-group">
			<!-- wp:heading {"textAlign":"center","className":"","fontSize":"large"} -->
			<h2 class="wp-block-heading has-text-align-center has-large-font-size"><?php esc_html_e( 'Our Story', 'greyd-wp' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"align":"center","className":"","fontSize":"medium"} -->
			<p class="has-text-align-center has-medium-font-size"><?php esc_html_e( 'At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.', 'greyd-wp' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|medium"}},"layout":{"type":"default"}} -->
		<div class="wp-block-group">
			<!-- wp:separator {"style":{"spacing":{"margin":{"top":"var:preset|spacing|x-large"}}},"backgroundColor":"background","className":"is-style-default"} -->
			<hr class="wp-block-separator has-text-color has-background-color has-alpha-channel-opacity has-background-background-color has-background is-style-default" style="margin-top:var(--wp--preset--spacing--x-large)" />
			<!-- /wp:separator -->

			<!-- wp:buttons {"align":"","className":"","layout":{"type":"flex","justifyContent":"center"}} -->
			<div class="wp-block-buttons">
				<!-- wp:button {"textColor":"background","style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}}},"borderColor":"background","className":"is-style-sec is-style-outline"} -->
				<div class="wp-block-button is-style-sec is-style-outline">
					<a class="wp-block-button__link has-background-color has-text-color has-link-color has-border-color has-background-border-color wp-element-button"><?php esc_html_e( 'Read more about us', 'greyd-wp' ); ?></a>
				</div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:column -->

	<!-- wp:column {"verticalAlignment":"stretch","style":{"spacing":{"padding":{"top":"var:preset|spacing|large","bottom":"var:preset|spacing|large","left":"var:preset|spacing|large","right":"var:preset|spacing|large"}}},"className":""} -->
	<div class="wp-block-column is-vertically-aligned-stretch" style="padding-top:var(--wp--preset--spacing--large);padding-right:var(--wp--preset--spacing--large);padding-bottom:var(--wp--preset--spacing--large);padding-left:var(--wp--preset--spacing--large)">
		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"constrained"}} -->
		<div class="wp-block-group">
			<!-- wp:heading {"textAlign":"center","className":"has-large-font-size"} -->
			<h2 class="wp-block-heading has-text-align-center has-large-font-size"><?php esc_html_e( 'Our Mission', 'greyd-wp' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"align":"center","className":"","fontSize":"small"} -->
			<p class="has-text-align-center has-small-font-size">
				<?php esc_html_e( 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.', 'greyd-wp' ); ?>
			</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:column -->
</div>
<!-- /wp:columns -->