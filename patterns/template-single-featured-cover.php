<?php

/**
 * Title: Template: Single with Featured Image Cover (Default)
 * Slug: greyd-theme/template-single-featured-cover
 * Template Types: single
 * Viewport width: 1600
 * Inserter: no
 */
?>
<!-- wp:template-part {"slug":"header","area":"header","tagName":"header"} /-->

<!-- wp:group {"tagName":"main","layout":{"type":"default"}} -->
<main class="wp-block-group">
	<!-- wp:group {"className":"","layout":{"type":"constrained"}} -->
	<div class="wp-block-group">
		<!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}},"border":{"radius":"4px"}},"gradient":"primary-to-background","layout":{"type":"default"}} -->
		<div class="wp-block-group has-primary-to-background-gradient-background has-background" style="border-radius:4px;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
			<!-- wp:cover {"useFeaturedImage":true,"dimRatio":60,"isUserOverlayColor":true,"minHeight":200,"minHeightUnit":"px","gradient":"foreground-to-primary","contentPosition":"center center","style":{"spacing":{"padding":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"}},"layout":{"selfStretch":"fit","flexSize":null},"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"border":{"radius":"4px"}},"textColor":"background","className":"is-style-no-background"} -->
			<div class="wp-block-cover is-style-no-background has-background-color has-text-color has-link-color" style="border-radius:4px;padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium);min-height:200px">
				<span aria-hidden="true" class="wp-block-cover__background has-background-dim-60 has-background-dim has-background-gradient has-foreground-to-primary-gradient-background"></span>
				<div class="wp-block-cover__inner-container">
					<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"right"}} -->
					<div class="wp-block-group">
						<!-- wp:group {"style":{"elements":{"link":{"color":{"text":"var:preset|color|lightest"}}},"spacing":{"padding":{"top":"1px","bottom":"1px","left":"6px","right":"6px"}},"border":{"radius":"4px"}},"backgroundColor":"foreground","textColor":"lightest","className":"","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"right"},"fontSize":"tiny"} -->
						<div class="wp-block-group has-lightest-color has-foreground-background-color has-text-color has-background has-link-color has-tiny-font-size" style="border-radius:4px;padding-top:1px;padding-right:6px;padding-bottom:1px;padding-left:6px">
							<!-- wp:post-date {"style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}}},"textColor":"background","className":"","fontSize":"tiny"} /-->
						</div>
						<!-- /wp:group -->
					</div>
					<!-- /wp:group -->

					<!-- wp:post-title {"style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"spacing":{"margin":{"top":"200px"}}},"textColor":"background","className":""} /-->
				</div>
			</div>
			<!-- /wp:cover -->
		</div>
		<!-- /wp:group -->

		<!-- wp:post-content {"className":"","layout":{"type":"constrained"}} /-->

		<!-- wp:pattern {"slug":"greyd-theme/hidden-comments"} /-->

		<!-- wp:pattern {"slug":"greyd-theme/hidden-post-navigation"} /-->
	</div>
	<!-- /wp:group -->
</main>
<!-- /wp:group -->

<!-- wp:template-part {"slug":"footer","area":"footer","tagName":"footer"} /-->