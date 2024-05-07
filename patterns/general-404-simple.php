<?php
/**
 * Title: 404 Template Simple
 * Slug: greyd-theme/general-404-simple
 * Description: A 404 template with buttons.
 * Categories: greyd-general
 * Keywords: 404
 * Viewport Width: 800
 * Inserter: true
 */
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|x-large"}}},"className":"","layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--x-large);padding-bottom:var(--wp--preset--spacing--x-large)">
	<!-- wp:heading {"level":1,"className":""} -->
	<h1 class="wp-block-heading"><?php esc_html_e( 'Error 404', 'greyd-theme' ); ?></h1>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"className":""} -->
	<p><?php esc_html_e( 'The page could not be found.', 'greyd-theme' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:buttons {"align":"","className":""} -->
	<div class="wp-block-buttons">
		<!-- wp:button {"className":"is-style-outline"} -->
		<div class="wp-block-button is-style-outline">
			<a class="wp-block-button__link wp-element-button" href="javascript:history.back()"><?php esc_html_e( 'Go back', 'greyd-theme' ); ?></a>
		</div>
		<!-- /wp:button -->

		<!-- wp:button {"className":"is-style-prim"} -->
		<div class="wp-block-button is-style-prim">
			<a class="wp-block-button__link wp-element-button" href="/"><?php esc_html_e( 'Go to home page', 'greyd-theme' ); ?></a>
		</div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->
</div>
<!-- /wp:group -->