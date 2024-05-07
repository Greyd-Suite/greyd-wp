<?php
/**
 * Title: CTA with Dark Background, wide
 * Slug: greyd-theme/cta-dark-bg
 * Description:
 * Categories: greyd-cta
 * Keywords:
 * Viewport Width: 1000
 * Block Types:
 * Post Types:
 * Inserter: true
 */
?>
<!-- wp:cover {"overlayColor":"main","isUserOverlayColor":true,"minHeightUnit":"px","contentPosition":"center center","style":{"color":{"duotone":"unset"},"spacing":{"padding":{"top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|x-large"},"blockGap":"var:preset|spacing|large"}},"className":"is-style-default"} -->
<div class="wp-block-cover is-style-default" style="padding-top:var(--wp--preset--spacing--x-large);padding-bottom:var(--wp--preset--spacing--x-large)">
	<span aria-hidden="true" class="wp-block-cover__background has-main-background-color has-background-dim-100 has-background-dim"></span>
	<div class="wp-block-cover__inner-container">
		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|medium"}},"className":"","layout":{"type":"flex","orientation":"vertical","justifyContent":"left"}} -->
		<div class="wp-block-group">
			<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small","padding":{"bottom":"var:preset|spacing|medium"}},"border":{"bottom":{"color":"var:preset|color|background","style":"dotted","width":"1px"},"top":{},"right":{},"left":{}}},"className":"","layout":{"type":"flex","flexWrap":"nowrap"}} -->
			<div class="wp-block-group" style="border-bottom-color:var(--wp--preset--color--background);border-bottom-style:dotted;border-bottom-width:1px;padding-bottom:var(--wp--preset--spacing--medium)">
				<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"500"}},"textColor":"main-accent","className":"","fontSize":"small"} -->
				<p class="has-main-accent-color has-text-color has-small-font-size" style="font-style:normal;font-weight:500"><?php esc_html_e( 'Explore Greyd', 'greyd-theme' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"default"}} -->
			<div class="wp-block-group">
				<!-- wp:heading {"textAlign":"left","textColor":"base","className":""} -->
				<h2 class="wp-block-heading has-text-align-left has-base-color has-text-color">
					<strong><?php esc_html_e( 'The powerhouse where your business strategy thrives', 'greyd-theme' ); ?></strong>
				</h2>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"align":"left","style":{"typography":{"fontStyle":"normal","fontWeight":"400"}},"textColor":"main-accent","className":""} -->
				<p class="has-text-align-left has-main-accent-color has-text-color" style="font-style:normal;font-weight:400"><?php esc_html_e( 'Benefit from an enhanced Block &amp; Site Editor experience and build beautiful, fast &amp; accessible websites - no coding required.', 'greyd-theme' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
		<div class="wp-block-group">
			<!-- wp:buttons {"className":"","style":{"layout":{"selfStretch":"fit","flexSize":null}}} -->
			<div class="wp-block-buttons">
				<!-- wp:button {"className":"has-custom-width wp-block-button__width-100"} -->
				<div class="wp-block-button has-custom-width wp-block-button__width-100">
					<a class="wp-block-button__link wp-element-button" href="https://greyd.io"><?php esc_html_e( 'Get Started Today →', 'greyd-theme' ); ?></a>
				</div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:group -->
	</div>
</div>
<!-- /wp:cover -->