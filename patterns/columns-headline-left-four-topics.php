<?php
/**
 * Title: Headline left and four Topics
 * Slug: greyd-theme/columns-headline-left-four-topics
 * Description:
 * Categories: greyd-columns
 * Keywords:
 * Viewport Width: 1400
 * Block Types:
 * Post Types:
 * Inserter: true
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|x-large","right":"var:preset|spacing|medium","bottom":"var:preset|spacing|x-large","left":"var:preset|spacing|medium"}}},"className":"","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--x-large);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--x-large);padding-left:var(--wp--preset--spacing--medium)">
	<!-- wp:columns {"align":"wide","className":""} -->
	<div class="wp-block-columns alignwide">
		<!-- wp:column {"verticalAlignment":"stretch","width":"","style":{"spacing":{"padding":{"bottom":"var:preset|spacing|medium"}}},"className":"","layout":{"type":"constrained"}} -->
		<div class="wp-block-column is-vertically-aligned-stretch" style="padding-bottom:var(--wp--preset--spacing--medium)">
			<!-- wp:group {"style":{"position":{"type":"sticky","top":"0px"}},"layout":{"type":"constrained","contentSize":"480px","justifyContent":"left"}} -->
			<div class="wp-block-group">
				<!-- wp:heading {"className":""} -->
				<h2 class="wp-block-heading"><?php esc_html_e( 'What we offer - Our services', 'greyd-theme' ); ?></h2>
				<!-- /wp:heading -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"top","width":"50%","className":""} -->
		<div class="wp-block-column is-vertically-aligned-top" style="flex-basis:50%">
			<!-- wp:pattern {"slug":"greyd-theme/columns-four-topics-in-tiles"} /-->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->