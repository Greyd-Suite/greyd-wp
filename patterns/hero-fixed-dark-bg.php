<?php
/**
 * Title: Hero with Header and Fixed Dark Background
 * Slug: greyd-theme/hero-fixed-dark-bg
 * Description: Hero section with header and fixed dark background
 * Categories: greyd-hero
 * Keywords:
 * Viewport Width: 1600
 * Block Types:
 * Post Types:
 * Inserter: true
 */
?>
<!-- wp:cover {"url":"<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/white-interlaced-blocks-on-dark.webp","hasParallax":true,"dimRatio":50,"overlayColor":"foreground","isUserOverlayColor":true,"minHeightUnit":"px","align":"full","style":{"spacing":{"padding":{"top":"0","bottom":"var:preset|spacing|x-large"},"blockGap":"var:preset|spacing|large"},"color":{"duotone":"var:preset|duotone|foreground-background"}},"className":"","layout":{"type":"constrained"}} -->
<div class="wp-block-cover alignfull has-parallax" style="padding-top:0;padding-bottom:var(--wp--preset--spacing--x-large)">
	<span aria-hidden="true" class="wp-block-cover__background has-foreground-background-color has-background-dim"></span>
	<div class="wp-block-cover__image-background has-parallax" style="background-position:50% 50%;background-image:url(<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/white-interlaced-blocks-on-dark.webp)"></div>
	<div class="wp-block-cover__inner-container">
		<!-- wp:group {"align":"wide","className":"","layout":{"type":"default"}} -->
		<div class="wp-block-group alignwide">
			<!-- wp:template-part {"slug":"header","area":"header","tagName":"header","align":"wide","className":""} /-->
		</div>
		<!-- /wp:group -->

		<!-- wp:spacer {"height":"var:preset|spacing|large","className":""} -->
		<div style="height:var(--wp--preset--spacing--large)" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer -->

		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"className":"","layout":{"type":"default"}} -->
		<div class="wp-block-group">
			<!-- wp:heading {"textAlign":"center","level":1,"className":""} -->
			<h1 class="wp-block-heading has-text-align-center"><?php esc_html_e( 'Greyd Theme', 'greyd-theme' ); ?></h1>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"className":""} -->
			<p><?php esc_html_e( 'Our free block theme enhances your full site editing experience with powerful extensions. It is the ideal basis for any website you build with Greyd.Suite, but can also be used independently.', 'greyd-theme' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:buttons {"className":"","layout":{"type":"flex","justifyContent":"center"}} -->
		<div class="wp-block-buttons">
			<!-- wp:button {"className":"is-style-fill"} -->
			<div class="wp-block-button is-style-fill">
				<a class="wp-block-button__link wp-element-button" href="https://greyd.io/greyd-theme" target="_blank" rel="noreferrer noopener"><?php esc_html_e( 'Download Theme →', 'greyd-theme' ); ?></a>
			</div>
			<!-- /wp:button -->

			<!-- wp:button {"textColor":"foreground","style":{"elements":{"link":{"color":{"text":"var:preset|color|foreground"}}}},"className":"hidden-sm hidden-xs is-style-alternate"} -->
			<div class="wp-block-button hidden-sm hidden-xs is-style-alternate">
				<a class="wp-block-button__link has-foreground-color has-text-color has-link-color wp-element-button" href="https://greyd.io/demo/" target="_blank" rel="noreferrer noopener"><?php esc_html_e( 'Discover the Suite', 'greyd-theme' ); ?></a>
			</div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->
	</div>
</div>
<!-- /wp:cover -->