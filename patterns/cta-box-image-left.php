<?php
/**
 * Title: CTA Box with Image Left
 * Slug: greyd-theme/cta-box-image-left
 * Description: CTA box with an image on the left
 * Categories: greyd-cta
 * Keywords:
 * Viewport Width: 1600
 * Block Types:
 * Post Types:
 * Inserter: true
 */
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|large","right":"var:preset|spacing|large","bottom":"var:preset|spacing|large","left":"var:preset|spacing|large"}},"border":{"radius":"4px"}},"backgroundColor":"secondary","className":"","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-secondary-background-color has-background" style="border-radius:4px;padding-top:var(--wp--preset--spacing--large);padding-right:var(--wp--preset--spacing--large);padding-bottom:var(--wp--preset--spacing--large);padding-left:var(--wp--preset--spacing--large)">
	<!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|large","left":"var:preset|spacing|large"}}},"className":""} -->
	<div class="wp-block-columns are-vertically-aligned-center">
		<!-- wp:column {"verticalAlignment":"center","width":"33.33%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:33.33%">
			<!-- wp:cover {"url":"<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/black-and-white-background-pattern.webp","dimRatio":0,"customOverlayColor":"#a1a1a1","isUserOverlayColor":true,"focalPoint":{"x":0,"y":0},"minHeight":320,"minHeightUnit":"px","isDark":false,"style":{"color":{"duotone":"var:preset|duotone|primary-foreground"}},"className":"is-style-rounded-cover"} -->
			<div class="wp-block-cover is-light is-style-rounded-cover" style="min-height:320px">
				<span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim" style="background-color:#a1a1a1"></span>
				<img class="wp-block-cover__image-background" alt="" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/black-and-white-background-pattern.webp" style="object-position:0% 0%" data-object-fit="cover" data-object-position="0% 0%" />
				<div class="wp-block-cover__inner-container">
					<!-- wp:paragraph {"align":"center","placeholder":"<?php esc_html_e( 'Write title...', 'greyd-theme' ); ?>","className":"","fontSize":"large"} -->
					<p class="has-text-align-center has-large-font-size"></p>
					<!-- /wp:paragraph -->
				</div>
			</div>
			<!-- /wp:cover -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center","width":"66.66%","style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"className":""} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:66.66%">
			<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"constrained","contentSize":"440px","justifyContent":"left"}} -->
			<div class="wp-block-group">
				<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"700"}},"textColor":"primary","className":"","fontSize":"small"} -->
				<p class="has-primary-color has-text-color has-small-font-size" style="font-style:normal;font-weight:700"><?php esc_html_e( 'Download Greyd.Suite', 'greyd-theme' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:heading {"level":2,"className":""} -->
				<h2 class="wp-block-heading"><?php esc_html_e( 'The all-in-one driving force for your WordPress business', 'greyd-theme' ); ?></h2>
				<!-- /wp:heading -->
			</div>
			<!-- /wp:group -->

			<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0","bottom":"0","left":"0","right":"0"},"padding":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|small"}}},"className":"","fontSize":"small"} -->
			<p class="has-small-font-size" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;padding-top:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--small)">
				<?php esc_html_e( 'Elevate your business strategy from ordinary to extraordinary and build the web empire you\'ve always dreamed of.', 'greyd-theme' ); ?>
			</p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons {"className":""} -->
			<div class="wp-block-buttons">
				<!-- wp:button {"className":"has-custom-width wp-block-button__width-100"} -->
				<div class="wp-block-button has-custom-width wp-block-button__width-100">
					<a class="wp-block-button__link wp-element-button" href="https://greyd.io"><?php esc_html_e( 'Download our Suite for free!', 'greyd-theme' ); ?></a>
				</div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->