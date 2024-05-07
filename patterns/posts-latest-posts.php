<?php
/**
 * Title: Latest Posts, simple
 * Slug: greyd-theme/posts-latest-posts
 * Description: 
 * Categories: greyd-posts
 * Keywords: 
 * Viewport Width: 1200
 * Block Types: core/query
 * Post Types: 
 * Inserter: true
 */
?>
<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"2em","bottom":"2em"}}},"layout":{"inherit":true,"type":"constrained"}} -->
<div class="wp-block-group alignwide" style="padding-top:2em;padding-bottom:2em">
	<!-- wp:query {"queryId":0,"query":{"perPage":6,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"exclude","inherit":false},"align":"wide"} -->
	<div class="wp-block-query alignwide">
		<!-- wp:heading -->
		<h2 class="wp-block-heading"><?php esc_html_e( 'Latest Posts', 'greyd-theme' ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:post-template {"layout":{"type":"grid","columnCount":3}} -->
			<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium"}},"dimensions":{"minHeight":"360px"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","verticalAlignment":"space-between"}} -->
			<div class="wp-block-group" style="min-height:360px;padding-top:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium)">
				<!-- wp:post-featured-image {"isLink":true,"style":{"color":{}}} /-->

				<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"constrained"}} -->
				<div class="wp-block-group">
					<!-- wp:post-date {"style":{"typography":{"fontSize":"16px","fontWeight":"500"}}} /-->

					<!-- wp:post-title {"level":3,"isLink":true,"style":{"spacing":{"margin":{"bottom":"calc( 0.5 * var(--wp--custom--gap--vertical) )"}}},"fontSize":"medium"} /-->
				</div>
				<!-- /wp:group -->

				<!-- wp:post-excerpt {"moreText":"Continue reading","style":{"spacing":{"margin":{"top":"calc( 0.5 * var(--wp--custom--gap--vertical) )","bottom":"calc( 0.5 * var(--wp--custom--gap--vertical) )"}}}} /-->
			</div>
			<!-- /wp:group -->
		<!-- /wp:post-template -->

		<!-- wp:query-no-results -->
			<!-- wp:pattern {"slug":"greyd-theme/hidden-no-results"} /-->
		<!-- /wp:query-no-results -->

		<!-- wp:query-pagination -->
			<!-- wp:query-pagination-previous /-->

			<!-- wp:query-pagination-next /-->
		<!-- /wp:query-pagination -->
	</div>
	<!-- /wp:query -->
</div>
<!-- /wp:group -->