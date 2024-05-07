<?php
/**
 * Title: Hero with Header, Search and Latest Posts
 * Slug: greyd-theme/hero-search-latest-posts
 * Description: Hero section with header, search and latest posts
 * Categories: greyd-hero
 * Keywords:
 * Viewport Width: 1600
 * Block Types:
 * Post Types:
 * Inserter: true
 */
?>
<!-- wp:cover {"url":"<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/transparent-bubbles-and-white-spheres-floating.webp","dimRatio":50,"overlayColor":"foreground","isUserOverlayColor":true,"minHeightUnit":"px","align":"full","style":{"spacing":{"padding":{"top":"0","bottom":"var:preset|spacing|x-large","right":"0","left":"0"}},"color":{"duotone":"var:preset|foreground-background|grayscale"}},"className":"","layout":{"type":"constrained"}} -->
<div class="wp-block-cover alignfull" style="padding-top:0;padding-right:0;padding-bottom:var(--wp--preset--spacing--x-large);padding-left:0">
	<span aria-hidden="true" class="wp-block-cover__background has-foreground-background-color has-background-dim"></span>
	<img class="wp-block-cover__image-background" alt="" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/transparent-bubbles-and-white-spheres-floating.webp" data-object-fit="cover" />
	<div class="wp-block-cover__inner-container">
		<!-- wp:group {"align":"wide","style":{"elements":{"link":{"color":{"text":"var:preset|color|lightest"}}}},"textColor":"lightest","className":"","layout":{"type":"default"}} -->
		<div class="wp-block-group alignwide has-lightest-color has-text-color has-link-color">
			<!-- wp:template-part {"slug":"header","area":"header","tagName":"header","align":"wide","className":""} /-->
		</div>
		<!-- /wp:group -->

		<!-- wp:spacer {"height":"var:preset|spacing|large"} -->
		<div style="height:var(--wp--preset--spacing--large)" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer -->

		<!-- wp:columns {"verticalAlignment":"top","align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|x-large","left":"var:preset|spacing|x-large"}}},"className":""} -->
		<div class="wp-block-columns alignwide are-vertically-aligned-top">
			<!-- wp:column {"verticalAlignment":"top","width":"50%","className":""} -->
			<div class="wp-block-column is-vertically-aligned-top" style="flex-basis:50%">
				<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"default"}} -->
				<div class="wp-block-group">
					<!-- wp:heading {"textAlign":"left","level":1,"className":""} -->
					<h1 class="wp-block-heading has-text-align-left"><?php esc_html_e( 'How can we help you today?', 'greyd-theme' ); ?></h1>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"className":""} -->
					<p><?php esc_html_e( 'Search our knowledge base for answers to common questions:', 'greyd-theme' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:search {"label":"<?php esc_html_e( 'Search', 'greyd-theme' ); ?>","showLabel":false,"placeholder":"<?php esc_html_e( 'Search', 'greyd-theme' ); ?>","buttonText":"<?php esc_html_e( 'Search', 'greyd-theme' ); ?>","buttonUseIcon":true,"style":{"border":{"radius":"4px"}},"className":""} /-->
			</div>
			<!-- /wp:column -->

			<!-- wp:column {"verticalAlignment":"top","width":"50%","className":""} -->
			<div class="wp-block-column is-vertically-aligned-top" style="flex-basis:50%">
				<!-- wp:group {"className":"","layout":{"type":"flex","flexWrap":"nowrap","orientation":"horizontal","justifyContent":"right"}} -->
				<div class="wp-block-group">
					<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"}},"border":{"width":"2px","color":"#0e1111","radius":"4px"}},"backgroundColor":"background","textColor":"foreground","className":""} -->
					<div class="wp-block-group has-border-color has-foreground-color has-background-background-color has-text-color has-background" style="border-color:#0e1111;border-width:2px;border-radius:4px;padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium)">
						<!-- wp:heading {"style":{"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|small"}}},"className":"","fontSize":"medium"} -->
						<h2 class="wp-block-heading has-medium-font-size" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--small)"><?php esc_html_e( 'Latest Posts', 'greyd-theme' ); ?></h2>
						<!-- /wp:heading -->

						<!-- wp:latest-posts {"postsToShow":3,"className":""} /-->
					</div>
					<!-- /wp:group -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->
		</div>
		<!-- /wp:columns -->
	</div>
</div>
<!-- /wp:cover -->