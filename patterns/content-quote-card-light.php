<?php
/**
 * Title: Quote Card, Light
 * Slug: greyd-theme/content-quote-card-light
 * Description:
 * Categories: greyd-content
 * Keywords:
 * Viewport Width: 600
 * Block Types:
 * Post Types:
 * Inserter: true
 */
?>
<!-- wp:group {"style":{"border":{"radius":"8px"},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"backgroundColor":"base","layout":{"type":"default"}} -->
<div class="wp-block-group has-base-background-color has-background" style="border-radius:8px;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
	<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|large","bottom":"var:preset|spacing|large","left":"var:preset|spacing|small","right":"var:preset|spacing|small"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"default"}} -->
	<div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--large);padding-right:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--large);padding-left:var(--wp--preset--spacing--small)">
		<!-- wp:quote {"className":"is-style-plain"} -->
		<blockquote class="wp-block-quote is-style-plain">
			<!-- wp:paragraph {"style":{"typography":{"lineHeight":"0.3","fontStyle":"normal","fontWeight":"700","fontSize":"5rem"}}} -->
			<p style="font-size:5rem;font-style:normal;font-weight:700;line-height:0.3"><?php esc_html_e( '“', 'greyd-theme' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph -->
			<p><?php esc_html_e( "Designing for the web is not just about pixels; it's about people, accessibility, and crafting sustainable digital experiences that stand the test of time.", 'greyd-theme' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"align":"right","style":{"typography":{"lineHeight":"0","fontStyle":"normal","fontWeight":"700","fontSize":"5rem"}}} -->
			<p class="has-text-align-right" style="font-size:5rem;font-style:normal;font-weight:700;line-height:0"><?php esc_html_e( '„', 'greyd-theme' ); ?></p>
			<!-- /wp:paragraph -->
			
			<cite><?php esc_html_e( '15th February 2024', 'greyd-theme' ); ?></cite>
		</blockquote>
		<!-- /wp:quote -->
	</div>
	<!-- /wp:group -->

	<!-- wp:cover {"url":"<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/greyd-placeholder-image-white-300x300.svg","dimRatio":50,"overlayColor":"lightest","isUserOverlayColor":true,"minHeight":313,"minHeightUnit":"px","contentPosition":"bottom left","isDark":false,"style":{"color":{"duotone":"var:preset|duotone|foreground-background"},"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"}},"elements":{"link":{"color":{"text":"var:preset|color|darkest"}}},"border":{"radius":{"bottomLeft":"8px","bottomRight":"8px"}}},"textColor":"darkest"} -->
	<div class="wp-block-cover is-light has-custom-content-position is-position-bottom-left has-darkest-color has-text-color has-link-color" style="border-bottom-left-radius:8px;border-bottom-right-radius:8px;margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium);min-height:313px">
		<span aria-hidden="true" class="wp-block-cover__background has-lightest-background-color has-background-dim"></span>
		<img class="wp-block-cover__image-background" alt="" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/greyd-placeholder-image-white-300x300.svg" data-object-fit="cover" />
		<div class="wp-block-cover__inner-container">
			<!-- wp:group {"style":{"spacing":{"blockGap":"0","padding":{"right":"var:preset|spacing|small","left":"var:preset|spacing|small"}}},"layout":{"type":"flex","flexWrap":"nowrap","orientation":"vertical"}} -->
			<div class="wp-block-group" style="padding-right:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--small)">
				<!-- wp:heading -->
				<h2 class="wp-block-heading"><?php esc_html_e( 'Jane Doe', 'greyd-theme' ); ?></h2>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"fontSize":"medium","fontFamily":"heading"} -->
				<p class="has-heading-font-family has-medium-font-size"><strong><?php esc_html_e( 'Web Advocate', 'greyd-theme' ); ?></strong></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
	</div>
	<!-- /wp:cover -->
</div>
<!-- /wp:group -->