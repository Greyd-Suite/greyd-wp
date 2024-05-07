<?php
/**
 * Title: Latest Posts, four in a row
 * Slug: greyd-theme/posts-latest-four-in-row
 * Description: 
 * Categories: greyd-posts
 * Keywords: 
 * Viewport Width: 1400
 * Block Types: core/query
 * Post Types: 
 * Inserter: true
 */
?>
<!-- wp:group {"metadata":{"name":""},"align":"full","style":{"spacing":{"padding":{"right":"var:preset|spacing|medium","left":"var:preset|spacing|medium","top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|x-large"}}},"className":"","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--x-large);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--x-large);padding-left:var(--wp--preset--spacing--medium)">
	<!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|large"}}},"className":"","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
	<div class="wp-block-group alignwide" style="margin-bottom:var(--wp--preset--spacing--large)">
		<!-- wp:heading {"textAlign":"left","style":{"spacing":{"padding":{"right":"0","left":"0"}}},"className":"","fontSize":"medium"} -->
		<h2 class="wp-block-heading has-text-align-left has-medium-font-size" style="padding-right:0;padding-left:0"><?php esc_html_e( 'Latest Posts', 'greyd-theme' ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:buttons {"align":"right","className":""} -->
		<div class="wp-block-buttons">
			<!-- wp:button {"className":"is-style-outline"} -->
			<div class="wp-block-button is-style-outline">
				<a class="wp-block-button__link wp-element-button"><?php esc_html_e( 'Read articles', 'greyd-theme' ); ?></a>
			</div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"2em","bottom":"2em"}}},"layout":{"type":"flex","orientation":"vertical","verticalAlignment":"space-between"}} -->
	<div class="wp-block-group alignwide" style="padding-top:2em;padding-bottom:2em">
		<!-- wp:query {"queryId":0,"query":{"perPage":4,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"exclude","inherit":false},"align":"wide"} -->
		<div class="wp-block-query alignwide">
			<!-- wp:post-template {"layout":{"type":"grid","columnCount":4}} -->
				<!-- wp:group {"style":{"dimensions":{"minHeight":"320px"}},"layout":{"type":"flex","orientation":"vertical","verticalAlignment":"space-between","justifyContent":"stretch"}} -->
				<div class="wp-block-group" style="min-height:320px">
					<!-- wp:post-title {"level":3,"isLink":true,"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|medium"}}},"fontSize":"medium"} /-->

					<!-- wp:post-excerpt {"moreText":"Continue reading"} /-->
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
</div>
<!-- /wp:group -->