<?php
/**
 * Title: Comments
 * Slug: greyd-wp/hidden-comments
 * Viewport Width: 800
 * Inserter: no
 */
?>

<!-- wp:comments {"className":"wp-block-comments-query-loop"} -->
<div class="wp-block-comments wp-block-comments-query-loop">
	<!-- wp:heading -->
	<h2><?php esc_html_e( 'Comments', 'greyd-wp' ); ?></h2>
	<!-- /wp:heading -->
	<!-- wp:comments-title {"level":3} /-->
	<!-- wp:comment-template -->
	<!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|large"}}}} -->
	<div class="wp-block-group" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--large)">
		<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"},"style":{"spacing":{"blockGap":"0.5em"}}} -->
		<div class="wp-block-group">
			<!-- wp:avatar {"size":40,"style":{"border":{"radius":"80px"}}} /-->
			<!-- wp:group -->
			<div class="wp-block-group">
				<!-- wp:comment-author-name /-->
				<!-- wp:comment-date /-->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->
		<!-- wp:comment-content /-->
		<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
		<div class="wp-block-group">
			<!-- wp:comment-edit-link /-->
			<!-- wp:comment-reply-link /-->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
	<!-- /wp:comment-template -->

	<!-- wp:comments-pagination {"layout":{"type":"flex","justifyContent":"space-between"}} -->
	<!-- wp:comments-pagination-previous /-->
	<!-- wp:comments-pagination-next /-->
	<!-- /wp:comments-pagination -->

	<!-- wp:post-comments-form {"style":{"spacing":{"padding":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|small"}}}} /-->
</div>
<!-- /wp:comments -->