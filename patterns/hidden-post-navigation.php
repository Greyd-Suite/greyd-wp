<?php
/**
 * Title: Post navigation
 * Slug: greyd-wp/hidden-post-navigation
 * Viewport Width: 800
 * Inserter: no
 */
?>

<!-- wp:group {"tagName":"nav","ariaLabel":"<?php esc_attr_e( 'Posts', 'greyd-wp' ); ?>","style":{"spacing":{"padding":{"bottom":"var:preset|spacing|small","top":"var:preset|spacing|small"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
<nav class="wp-block-group" style="padding-top:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--small)" aria-label="<?php esc_attr_e( 'Posts', 'greyd-wp' ); ?>">
	<!-- wp:post-navigation-link {"type":"previous","label":"<?php echo esc_html_x( 'Previous: ', 'Label before the title of the previous post. There is a space after the colon.', 'greyd-wp' ); ?>","showTitle":true,"linkLabel":true,"arrow":"arrow"} /-->
	<!-- wp:post-navigation-link {"label":"<?php echo esc_html_x( 'Next: ', 'Label before the title of the next post. There is a space after the colon.', 'greyd-wp' ); ?>","showTitle":true,"linkLabel":true,"arrow":"arrow"} /-->
</nav>
<!-- /wp:group -->