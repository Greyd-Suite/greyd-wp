<?php
/**
 * Title: Four Features with Headline
 * Slug: greyd-theme/columns-four-features-headline
 * Description:
 * Categories: greyd-columns
 * Keywords:
 * Viewport Width: 1200
 * Inserter: true
 */
?>
<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|large","margin":{"top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|x-large"}}},"className":"","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide" style="margin-top:var(--wp--preset--spacing--x-large);margin-bottom:var(--wp--preset--spacing--x-large)">
	<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small","padding":{"top":"0","bottom":"var:preset|spacing|medium"}}},"className":"","layout":{"type":"default"}} -->
	<div class="wp-block-group" style="padding-top:0;padding-bottom:var(--wp--preset--spacing--medium)">
		<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"700"}},"textColor":"primary","className":"has-text-align-center"} -->
		<p class="has-text-align-center has-primary-color has-text-color" style="font-style:normal;font-weight:700"><?php esc_html_e( 'And there\'s even more!', 'greyd-theme' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:heading {"textAlign":"center","className":"is-style-wide"} -->
		<h2 class="wp-block-heading has-text-align-center is-style-wide"><?php esc_html_e( 'Discover our Greyd.Suite', 'greyd-theme' ); ?></h2>
		<!-- /wp:heading -->
	</div>
	<!-- /wp:group -->

	<!-- wp:pattern {"slug":"greyd-theme/columns-four-topics-in-tiles"} /-->
</div>
<!-- /wp:group -->