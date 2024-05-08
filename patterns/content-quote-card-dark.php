<?php
/**
 * Title: Quote Card, Dark
 * Slug: greyd-wp/content-quote-card-dark
 * Description:
 * Categories: greyd-content
 * Keywords:
 * Viewport Width: 600
 * Block Types:
 * Post Types:
 * Inserter: true
 */
?>
<!-- wp:group {"style":{"border":{"radius":"8px"},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|lightest"}}}},"backgroundColor":"dark","textColor":"lightest","layout":{"type":"default"}} -->
<div class="wp-block-group has-lightest-color has-dark-background-color has-text-color has-background has-link-color" style="border-radius:8px;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
	<!-- wp:cover {"url":"<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/greyd-placeholder-image-black-300x300.svg","dimRatio":40,"overlayColor":"darkest","isUserOverlayColor":true,"minHeight":313,"minHeightUnit":"px","contentPosition":"bottom left","style":{"color":{"duotone":"var:preset|duotone|foreground-background"},"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"}},"elements":{"link":{"color":{"text":"var:preset|color|lightest"}}},"border":{"radius":{"bottomLeft":"0px","bottomRight":"0px","topLeft":"8px","topRight":"8px"}}},"textColor":"lightest"} -->
	<div class="wp-block-cover has-custom-content-position is-position-bottom-left has-lightest-color has-text-color has-link-color" style="border-top-left-radius:8px;border-top-right-radius:8px;border-bottom-left-radius:0px;border-bottom-right-radius:0px;margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium);min-height:313px">
		<span aria-hidden="true" class="wp-block-cover__background has-darkest-background-color has-background-dim-40 has-background-dim"></span>
		<img class="wp-block-cover__image-background" alt="" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/greyd-placeholder-image-black-300x300.svg" data-object-fit="cover" />
		<div class="wp-block-cover__inner-container">
			<!-- wp:group {"style":{"spacing":{"blockGap":"0","padding":{"right":"7px","left":"7px"}}},"layout":{"type":"flex","flexWrap":"nowrap","orientation":"vertical"}} -->
			<div class="wp-block-group" style="padding-right:7px;padding-left:7px">
				<!-- wp:heading -->
				<h2 class="wp-block-heading"><?php esc_html_e( 'Jane Doe', 'greyd-wp' ); ?></h2>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"fontSize":"medium","fontFamily":"heading"} -->
				<p class="has-heading-font-family has-medium-font-size"><strong><?php esc_html_e( 'Web Advocate', 'greyd-wp' ); ?></strong></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
	</div>
	<!-- /wp:cover -->

	<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium","left":"0px","right":"0px"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"default"}} -->
	<div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--medium);padding-right:0px;padding-bottom:var(--wp--preset--spacing--medium);padding-left:0px">
		<!-- wp:quote {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"className":"is-style-plain"} -->
		<blockquote class="wp-block-quote is-style-plain">
			<!-- wp:paragraph {"style":{"typography":{"lineHeight":"0.3","fontStyle":"normal","fontWeight":"700","fontSize":"5rem"}}} -->
			<p style="font-size:5rem;font-style:normal;font-weight:700;line-height:0.3"><?php esc_html_e( '“', 'greyd-wp' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph -->
			<p><?php esc_html_e( "Designing for the web is not just about pixels; it's about people, accessibility, and crafting sustainable digital experiences that stand the test of time.", 'greyd-wp' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"align":"right","style":{"typography":{"lineHeight":"0","fontStyle":"normal","fontWeight":"700","fontSize":"5rem"}}} -->
			<p class="has-text-align-right" style="font-size:5rem;font-style:normal;font-weight:700;line-height:0"><?php esc_html_e( '„', 'greyd-wp' ); ?></p>
			<!-- /wp:paragraph -->
			
			<cite><?php esc_html_e( '15th February 2024', 'greyd-wp' ); ?></cite>
		</blockquote>
		<!-- /wp:quote -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->