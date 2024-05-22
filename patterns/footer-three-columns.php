<?php
/**
 * Title: Footer with Three Columns
 * Slug: greyd-wp/footer-three-columns
 * Description: 1st column: Site logo, title, tagline, social links. 2nd column: More info, navigation. 3rd column: Search.
 * Categories: footer
 * Keywords:
 * Viewport Width: 1600
 * Block Types: core/template-part/footer
 * Inserter: false
 */
?>
<!-- wp:group {"className":"","layout":{"inherit":true,"type":"constrained"}} -->
<div class="wp-block-group">
	<!-- wp:columns {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|large","bottom":"var:preset|spacing|large"}}},"className":""} -->
	<div class="wp-block-columns alignwide" style="padding-top:var(--wp--preset--spacing--large);padding-bottom:var(--wp--preset--spacing--large)">
		<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"className":""} -->
		<div class="wp-block-column">
			<!-- wp:site-logo {"width":79,"shouldSyncIcon":false,"className":"custom-svg-size"} /-->

			<!-- wp:site-title {"level":2,"className":""} /-->

			<!-- wp:site-tagline {"className":""} /-->

			<!-- wp:social-links {"iconColor":"foreground","iconColorValue":"#0e1111","className":"is-style-logos-only"} -->
			<ul class="wp-block-social-links has-icon-color is-style-logos-only">
				<!-- wp:social-link {"url":"#","service":"twitter","className":""} /-->

				<!-- wp:social-link {"url":"#","service":"instagram","className":""} /-->
			</ul>
			<!-- /wp:social-links -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"className":""} -->
		<div class="wp-block-column">
			<!-- wp:heading {"level":3,"fontSize":"small"} -->
			<h3 class="wp-block-heading has-small-font-size"><?php esc_html_e( 'More info', 'greyd-wp' ); ?></h3>
			<!-- /wp:heading -->

			<!-- wp:navigation {"overlayMenu":"never","__unstableLocation":"primary","className":"","layout":{"type":"flex","setCascadingProperties":true,"justifyContent":"left","orientation":"vertical"}} -->
				<!-- wp:page-list {"className":""} /-->
			<!-- /wp:navigation -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"className":""} -->
		<div class="wp-block-column">
			<!-- wp:heading {"level":3,"fontSize":"small"} -->
			<h3 class="wp-block-heading has-small-font-size"><?php esc_html_e( 'Search', 'greyd-wp' ); ?></h3>
			<!-- /wp:heading -->

			<!-- wp:search {"label":"<?php esc_html_e( 'Search', 'greyd-wp' ); ?>","showLabel":false,"buttonText":"<?php esc_html_e( 'Search', 'greyd-wp' ); ?>","buttonUseIcon":true,"className":""} /-->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->