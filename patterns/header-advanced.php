<?php
/**
 * Title: Header Advanced
 * Slug: greyd-wp/header-advanced
 * Description: Header with two sections, first menu and social links on dark background, second logo, site title and buttons on light background
 * Categories: header
 * Keywords: header, nav, links, social, buttons
 * Viewport Width: 1600
 * Block Types: core/template-part/header
 * Inserter: false
 */
?>
<!-- wp:group {"style":{"spacing":{"blockGap":"0","padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"}}},"className":"","layout":{"type":"default"}} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
	<!-- wp:group {"style":{"elements":{"link":{"color":{"text":"var:preset|color|lightest"}}},"spacing":{"padding":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|small"}}},"backgroundColor":"foreground","textColor":"lightest","className":"","layout":{"inherit":"true","type":"constrained"}} -->
	<div class="wp-block-group has-lightest-color has-foreground-background-color has-text-color has-background has-link-color" style="padding-top:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--small)">
		<!-- wp:group {"align":"wide","className":"","layout":{"type":"flex","justifyContent":"space-between"}} -->
		<div class="wp-block-group alignwide">
			<!-- wp:navigation {"__unstableLocation":"primary","className":"","layout":{"type":"flex","setCascadingProperties":true,"justifyContent":"right","orientation":"horizontal"},"style":{"spacing":{"margin":{"top":"0"}}},"fontSize":"tiny"} -->
				<!-- wp:page-list {"className":""} /-->
			<!-- /wp:navigation -->

			<!-- wp:social-links {"iconColor":"foreground","iconColorValue":"#0e1111","iconBackgroundColor":"background","iconBackgroundColorValue":"#f9f7ff","size":"has-small-icon-size","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|small"}},"layout":{"selfStretch":"fit","flexSize":null}},"className":"","layout":{"type":"flex","justifyContent":"center"}} -->
			<ul class="wp-block-social-links has-small-icon-size has-icon-color has-icon-background-color">
				<!-- wp:social-link {"url":"#","service":"instagram","className":""} /-->

				<!-- wp:social-link {"url":"#","service":"twitter","className":""} /-->

				<!-- wp:social-link {"url":"#","service":"linkedin","className":""} /-->

				<!-- wp:social-link {"url":"#","service":"facebook","className":""} /-->
			</ul>
			<!-- /wp:social-links -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium"}}},"className":"","layout":{"inherit":"true","type":"constrained"}} -->
	<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium)">
		<!-- wp:group {"align":"wide","className":"","layout":{"type":"flex","justifyContent":"space-between"}} -->
		<div class="wp-block-group alignwide">
			<!-- wp:group {"className":"","layout":{"type":"flex","flexWrap":"nowrap"}} -->
			<div class="wp-block-group">
				<!-- wp:site-logo {"width":44,"shouldSyncIcon":true,"className":""} /-->

				<!-- wp:site-title {"level":0,"className":""} /-->
			</div>
			<!-- /wp:group -->

			<!-- wp:buttons {"className":"","style":{"spacing":{"blockGap":"var:preset|spacing|small"}}} -->
			<div class="wp-block-buttons">
				<!-- wp:button {"className":"is-size-small","size":"is-size-small"} -->
				<div class="wp-block-button is-size-small">
					<a class="wp-block-button__link wp-element-button"><?php esc_html_e( 'Download now', 'greyd-wp' ); ?></a>
				</div>
				<!-- /wp:button -->

				<!-- wp:button {"className":"is-size-small is-style-outline"} -->
				<div class="wp-block-button is-size-small is-style-outline">
					<a class="wp-block-button__link wp-element-button"><?php esc_html_e( 'Contact us', 'greyd-wp' ); ?></a>
				</div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->