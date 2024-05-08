<?php
/**
 * Title: Heading with Subline
 * Slug: greyd-wp/content-heading-subline
 * Description:
 * Categories: greyd-content
 * Keywords:
 * Viewport Width: 800
 * Block Types:
 * Post Types:
 * Inserter: true
 */
?>
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small","padding":{"top":"0","bottom":"var:preset|spacing|medium"}}},"className":"","layout":{"type":"default"}} -->
<div class="wp-block-group" style="padding-top:0;padding-bottom:var(--wp--preset--spacing--medium)">
	<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"700"}},"textColor":"primary","className":"has-text-align-center"} -->
	<p class="has-text-align-center has-primary-color has-text-color" style="font-style:normal;font-weight:700"><?php esc_html_e( "And there's even more!", 'greyd-wp' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:post-title {"textAlign":"center","level":1,"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|x-large"}}},"className":"","fontSize":"x-large"} /-->

	<!-- wp:separator {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"backgroundColor":"foreground","className":"is-style-dots"} -->
	<hr class="wp-block-separator has-text-color has-foreground-color has-alpha-channel-opacity has-foreground-background-color has-background is-style-dots" style="margin-top:0;margin-bottom:0" />
	<!-- /wp:separator -->
</div>
<!-- /wp:group -->