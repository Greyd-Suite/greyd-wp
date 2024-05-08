<?php
/**
 * Title: Latest Posts, three in row with featured image
 * Slug: greyd-wp/posts-latest-three-in-row
 * Description: 
 * Categories: greyd-posts
 * Keywords: 
 * Viewport Width: 1200
 * Block Types: core/query
 * Post Types: 
 * Inserter: true
 */
?>
<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"bottom":"var:preset|spacing|x-large","right":"0","left":"0","top":"var:preset|spacing|x-large"}}},"layout":{"inherit":true,"type":"constrained"}} -->
<div class="wp-block-group alignwide" style="padding-top:var(--wp--preset--spacing--x-large);padding-right:0;padding-bottom:var(--wp--preset--spacing--x-large);padding-left:0">
	<!-- wp:query {"queryId":0,"query":{"perPage":3,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true},"align":"wide"} -->
	<div class="wp-block-query alignwide">
		<!-- wp:heading {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|medium"}}}} -->
		<h2 class="wp-block-heading" style="margin-bottom:var(--wp--preset--spacing--medium)"><?php esc_html_e( 'Latest Posts', 'greyd-wp' ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:post-template {"layout":{"type":"grid","columnCount":3}} -->
			<!-- wp:pattern {"slug":"greyd-wp/content-post-card"} /-->
		<!-- /wp:post-template -->

		<!-- wp:query-no-results -->
			<!-- wp:pattern {"slug":"greyd-wp/hidden-no-results"} /-->
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