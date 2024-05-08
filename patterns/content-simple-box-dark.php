<?php
/**
 * Title: Simple Box, Dark
 * Slug: greyd-wp/content-simple-box-dark
 * Description:
 * Categories: greyd-content
 * Keywords:
 * Viewport Width: 600
 * Block Types:
 * Post Types:
 * Inserter: true
 */
?>
<!-- wp:group {"style":{"border":{"radius":"8px"},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|lightest"}}}},"backgroundColor":"foreground","textColor":"lightest","layout":{"type":"default"}} -->
<div class="wp-block-group has-lightest-color has-foreground-background-color has-text-color has-background has-link-color" style="border-radius:8px;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
	<!-- wp:cover {"url":"<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/greyd-placeholder-image-black-300x300.svg","dimRatio":30,"overlayColor":"primary","isUserOverlayColor":true,"minHeight":240,"minHeightUnit":"px","contentPosition":"top right","style":{"color":{"duotone":"var:preset|duotone|foreground-background"},"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"}},"border":{"radius":{"topLeft":"8px","topRight":"8px"}}}} -->
	<div class="wp-block-cover has-custom-content-position is-position-top-right" style="border-top-left-radius:8px;border-top-right-radius:8px;margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium);min-height:240px">
		<span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-30 has-background-dim"></span>
		<img class="wp-block-cover__image-background" alt="" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/greyd-placeholder-image-black-300x300.svg" data-object-fit="cover" />
		<div class="wp-block-cover__inner-container">
			<!-- wp:group {"style":{"elements":{"link":{"color":{"text":"var:preset|color|foreground"}}},"spacing":{"padding":{"top":"4px","bottom":"4px","left":"8px","right":"8px"}},"border":{"radius":"4px"}},"backgroundColor":"background","textColor":"foreground","layout":{"type":"constrained"}} -->
			<div class="wp-block-group has-foreground-color has-background-background-color has-text-color has-background has-link-color" style="border-radius:4px;padding-top:4px;padding-right:8px;padding-bottom:4px;padding-left:8px">
				<!-- wp:paragraph -->
				<p><?php esc_html_e( 'Innovate', 'greyd-wp' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
	</div>
	<!-- /wp:cover -->

	<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"default"}} -->
	<div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium)">
		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"default"}} -->
		<div class="wp-block-group">
			<!-- wp:paragraph -->
			<p><?php esc_html_e( 'Your Success, Our Priority', 'greyd-wp' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:heading -->
			<h2 class="wp-block-heading"><?php esc_html_e( 'Optimize with Greyd', 'greyd-wp' ); ?></h2>
			<!-- /wp:heading -->
		</div>
		<!-- /wp:group -->

		<!-- wp:paragraph -->
		<p><?php esc_html_e( 'Transform your online presence with our expert Greyd services. Elevate efficiency, streamline processes, and achieve unparalleled design excellence.', 'greyd-wp' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:buttons -->
		<div class="wp-block-buttons">
			<!-- wp:button {"className":"is-style-alternate"} -->
			<div class="wp-block-button is-style-alternate">
				<a class="wp-block-button__link wp-element-button"><?php esc_html_e( 'Get Started', 'greyd-wp' ); ?></a>
			</div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->