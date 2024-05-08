<?php
/**
 * Title: Hero with Header and Splitted Background
 * Slug: greyd-wp/hero-splitted-bg
 * Description: Hero section with header and splitted background
 * Categories: greyd-hero
 * Keywords:
 * Viewport Width: 1600
 * Block Types:
 * Post Types:
 * Inserter: true
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"0","bottom":"var:preset|spacing|large"}}},"gradient":"cut-foreground-transparent-3-4","className":"","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-cut-foreground-transparent-3-4-gradient-background has-background" style="padding-top:0;padding-bottom:var(--wp--preset--spacing--large)">
	<!-- wp:group {"align":"wide","style":{"elements":{"link":{"color":{"text":"var:preset|color|lightest"}}}},"textColor":"lightest","className":"","layout":{"type":"default"}} -->
	<div class="wp-block-group alignwide has-lightest-color has-text-color has-link-color">
		<!-- wp:template-part {"slug":"header","area":"header","tagName":"header","align":"wide","className":""} /-->
	</div>
	<!-- /wp:group -->

	<!-- wp:pattern {"slug":"greyd-wp/cta-half-dark-bg"} /-->
</div>
<!-- /wp:group -->