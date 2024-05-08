<?php
/**
 * Title: Latest Posts, List
 * Slug: greyd-theme/posts-latest-list
 * Description: 
 * Categories: greyd-posts
 * Keywords: 
 * Viewport Width: 800
 * Block Types: core/query
 * Post Types: 
 * Inserter: true
 */
?>
<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"bottom":"var:preset|spacing|x-large","top":"var:preset|spacing|x-large"}}},"layout":{"inherit":true,"type":"constrained"}} -->
<div class="wp-block-group alignwide" style="padding-top:var(--wp--preset--spacing--x-large);padding-bottom:var(--wp--preset--spacing--x-large);">
	<!-- wp:query {"queryId":0,"query":{"perPage":10,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true},"align":"wide"} -->
	<div class="wp-block-query alignwide">
		<!-- wp:heading {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|large"}}}} -->
		<h2 class="wp-block-heading" style="margin-bottom:var(--wp--preset--spacing--large)"><?php esc_html_e( 'Latest Posts', 'greyd-theme' ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:post-template {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}}} -->
			<!-- wp:group {"style":{"border":{"bottom":{"color":"var:preset|color|mediumlight","style":"solid","width":"1px"}},"spacing":{"padding":{"bottom":"var:preset|spacing|small"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
			<div class="wp-block-group" style="border-bottom-color:var(--wp--preset--color--mediumlight);border-bottom-style:solid;border-bottom-width:1px;padding-bottom:var(--wp--preset--spacing--small)">
				<!-- wp:post-title {"level":3,"isLink":true,"fontSize":"large"} /-->

				<!-- wp:post-date /-->
			</div>
			<!-- /wp:group -->
		<!-- /wp:post-template -->

		<!-- wp:query-no-results -->
			<!-- wp:pattern {"slug":"greyd-theme/hidden-no-results"} /-->
		<!-- /wp:query-no-results -->

		<!-- wp:query-pagination -->
			<!-- wp:query-pagination-previous /-->

			<!-- wp:query-pagination-numbers /-->

			<!-- wp:query-pagination-next /-->
		<!-- /wp:query-pagination -->
	</div>
	<!-- /wp:query -->
</div>
<!-- /wp:group -->