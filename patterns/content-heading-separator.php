<?php
/**
 * Title: Heading with Separator
 * Slug: greyd-theme/content-heading-separator
 * Description:
 * Categories: greyd-content
 * Keywords:
 * Viewport Width: 800
 * Block Types:
 * Post Types:
 * Inserter: true
 */
?>
<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"className":"","layout":{"type":"default"}} -->
<div class="wp-block-group alignwide">
	<!-- wp:post-title {"textAlign":"center","level":1,"align":"wide","className":""} /-->

	<!-- wp:separator {"align":"center","style":{"spacing":{"margin":{"top":"var:preset|spacing|large","bottom":"var:preset|spacing|large"}}},"backgroundColor":"foreground","className":"is-style-dots"} -->
	<hr class="wp-block-separator aligncenter has-text-color has-foreground-color has-alpha-channel-opacity has-foreground-background-color has-background is-style-dots" style="margin-top:var(--wp--preset--spacing--large);margin-bottom:var(--wp--preset--spacing--large)" />
	<!-- /wp:separator -->
</div>
<!-- /wp:group -->