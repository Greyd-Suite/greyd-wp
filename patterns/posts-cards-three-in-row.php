<?php
/**
 * Title: Latest Posts, three cards in a row
 * Slug: greyd-theme/posts-cards-three-in-row
 * Description:
 * Categories: greyd-posts
 * Keywords:
 * Viewport Width: 1200
 * Block Types: core/query
 * Post Types:
 * Inserter: true
 */
?>
<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|large","bottom":"var:preset|spacing|large"}}},"className":"","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide" style="padding-top:var(--wp--preset--spacing--large);padding-bottom:var(--wp--preset--spacing--large)">
	<!-- wp:query {"queryId":0,"query":{"perPage":10,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"align":"wide","className":""} -->
	<div class="wp-block-query alignwide">
		<!-- wp:post-template {"className":"","layout":{"type":"grid","columnCount":3}} -->
			<!-- wp:pattern {"slug":"greyd-theme/content-post-card"} /-->
		<!-- /wp:post-template -->

		<!-- wp:query-no-results -->
			<!-- wp:pattern {"slug":"greyd-theme/hidden-no-results"} /-->
		<!-- /wp:query-no-results -->
	</div>
	<!-- /wp:query -->
</div>
<!-- /wp:group -->