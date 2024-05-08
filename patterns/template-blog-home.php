<?php
/**
 * Title: Template: Blog Home
 * Slug: greyd-wp/template-blog-home
 * Template Types: front-page, home
 * Viewport width: 1600
 * Inserter: no
 */
?>
<!-- wp:template-part {"slug":"header","area":"header","tagName":"header"} /-->

<!-- wp:group {"tagName":"main","style":{"spacing":{"blockGap":"0","margin":{"top":"0"}}}} -->
<main class="wp-block-group" style="margin-top:0">
	<!-- wp:pattern {"slug":"greyd-wp/hero-dark-cover-with-3-boxes-below"} /-->
	<!-- wp:pattern {"slug":"greyd-wp/columns-four-features-headline"} /-->
	<!-- wp:pattern {"slug":"greyd-wp/content-separator-fixed-background"} /-->
	<!-- wp:pattern {"slug":"greyd-wp/columns-about-us-three-boxes"} /-->
	<!-- wp:pattern {"slug":"greyd-wp/columns-faq"} /-->
	<!-- wp:pattern {"slug":"greyd-wp/posts-latest-list"} /-->
	<!-- wp:separator {"className":"is-style-dots"} -->
	<hr class="wp-block-separator has-alpha-channel-opacity is-style-dots"/>
	<!-- /wp:separator -->
	<!-- wp:pattern {"slug":"greyd-wp/general-design-preview-page"} /-->
	<!-- wp:pattern {"slug":"greyd-wp/cta-pattern-background"} /-->
</main>
<!-- /wp:group -->

<!-- wp:template-part {"slug":"footer","area":"footer","tagName":"footer"} /-->