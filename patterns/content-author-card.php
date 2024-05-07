<?php
/**
 * Title: Author Card
 * Slug: greyd-theme/content-author-card
 * Description:
 * Categories: greyd-content
 * Keywords:
 * Viewport Width: 1200
 * Block Types:
 * Post Types:
 * Inserter: true
 */
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|large","right":"var:preset|spacing|large","bottom":"var:preset|spacing|large","left":"var:preset|spacing|large"}},"border":{"radius":"4px"}},"backgroundColor":"base","className":"","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-base-background-color has-background" style="border-radius:4px;padding-top:var(--wp--preset--spacing--large);padding-right:var(--wp--preset--spacing--large);padding-bottom:var(--wp--preset--spacing--large);padding-left:var(--wp--preset--spacing--large)">
	<!-- wp:group {"className":"","layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
	<div class="wp-block-group">
		<!-- wp:avatar {"size":74,"style":{"border":{"radius":"500px"}},"className":""} /-->

		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"className":"","layout":{"type":"constrained"}} -->
		<div class="wp-block-group">
			<!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"constrained"}} -->
			<div class="wp-block-group">
				<!-- wp:post-author-name {"style":{"typography":{"fontStyle":"normal","fontWeight":"700"}},"className":"","fontSize":"medium"} /-->

				<!-- wp:post-author-biography {"className":""} /-->
			</div>
			<!-- /wp:group -->

			<!-- wp:social-links {"iconColor":"darkest","iconColorValue":"#000000","iconBackgroundColor":"lightest","iconBackgroundColorValue":"#ffffff","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|small","left":"var:preset|spacing|small"}}},"className":""} -->
			<ul class="wp-block-social-links has-icon-color has-icon-background-color">
				<!-- wp:social-link {"url":"#","service":"twitter","className":""} /-->

				<!-- wp:social-link {"url":"#","service":"facebook","className":""} /-->

				<!-- wp:social-link {"url":"#","service":"instagram","className":""} /-->

				<!-- wp:social-link {"url":"#","service":"github","className":""} /-->
			</ul>
			<!-- /wp:social-links -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->