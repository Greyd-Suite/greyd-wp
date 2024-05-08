<?php
/**
 * Title: Template: Single, simple
 * Slug: greyd-wp/template-single-simple
 * Template Types: single
 * Viewport width: 1600
 * Inserter: no
 */
?>
<!-- wp:template-part {"slug":"header","area":"header","tagName":"header"} /-->

<!-- wp:group {"tagName":"main","layout":{"type":"default"}} -->
<main class="wp-block-group">
	<!-- wp:group {"layout":{"type":"constrained"}} -->
	<div class="wp-block-group">
		<!-- wp:post-featured-image {"aspectRatio":"auto","width":"100%","height":"20em","style":{"border":{"radius":"4px"}}} /-->

		<!-- wp:post-date /-->

		<!-- wp:post-title {"level":1} /-->

		<!-- wp:post-content {"layout":{"type":"constrained"}} /-->

		<!-- wp:pattern {"slug":"greyd-wp/hidden-comments"} /-->

		<!-- wp:pattern {"slug":"greyd-wp/hidden-post-navigation"} /-->
	</div>
	<!-- /wp:group -->
</main>
<!-- /wp:group -->

<!-- wp:template-part {"slug":"footer","area":"footer","tagName":"footer"} /-->