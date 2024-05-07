<?php
/**
 * Title: 404 Template with Search
 * Slug: greyd-theme/general-404-search
 * Description: A 404 template with a search form.
 * Categories: greyd-general
 * Keywords: 404
 * Viewport Width: 800
 * Inserter: true
 */
?>
<!-- wp:group {"tagName":"main","style":{"spacing":{"padding":{"top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|x-large"}}},"className":"","layout":{"inherit":true,"type":"constrained"}} -->
<main class="wp-block-group" style="padding-top:var(--wp--preset--spacing--x-large);padding-bottom:var(--wp--preset--spacing--x-large)">
	<!-- wp:heading {"textAlign":"left","level":1,"className":"","fontSize":"large"} -->
	<h1 class="wp-block-heading has-text-align-left has-large-font-size"><?php esc_html_e( 'Oops! That page cannot be found.', 'greyd-theme' ); ?></h1>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"className":""} -->
	<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'greyd-theme' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:search {"label":"<?php esc_html_e( 'Search', 'greyd-theme' ); ?>","buttonText":"<?php esc_html_e( 'Search', 'greyd-theme' ); ?>","className":""} /-->
</main>
<!-- /wp:group -->