<?php
/**
 * Title: CTA with Pattern Background
 * Slug: greyd-wp/cta-pattern-background
 * Description: A call to action with a pattern background and a button.
 * Categories: greyd-cta
 * Keywords:
 * Viewport Width: 1600
 * Block Types:
 * Post Types:
 * Inserter: true
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"backgroundColor":"primary","className":"","layout":{"type":"default"}} -->
<div class="wp-block-group alignfull has-primary-background-color has-background" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
	<!-- wp:cover {"url":"<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/repeating-background-pattern-dark-slash.svg","isRepeated":true,"dimRatio":0,"overlayColor":"transparent","isUserOverlayColor":true,"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|x-large"}},"color":[]},"className":"is-style-no-background","layout":{"type":"constrained"}} -->
	<div class="wp-block-cover alignfull is-repeated is-style-no-background" style="padding-top:var(--wp--preset--spacing--x-large);padding-bottom:var(--wp--preset--spacing--x-large)">
		<span aria-hidden="true" class="wp-block-cover__background has-transparent-background-color has-background-dim-0 has-background-dim"></span>
		<div class="wp-block-cover__image-background is-repeated" style="background-position:50% 50%;background-image:url(<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/repeating-background-pattern-dark-slash.svg)"></div>
		<div class="wp-block-cover__inner-container">
			<!-- wp:columns {"verticalAlignment":"center","align":"wide","className":""} -->
			<div class="wp-block-columns alignwide are-vertically-aligned-center">
				<!-- wp:column {"verticalAlignment":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}}},"textColor":"background","className":""} -->
				<div class="wp-block-column is-vertically-aligned-center has-background-color has-text-color has-link-color">
					<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"className":"","layout":{"type":"constrained"}} -->
					<div class="wp-block-group">
						<!-- wp:heading {"textAlign":"left","level":2,"className":""} -->
						<h2 class="wp-block-heading has-text-align-left"><?php esc_html_e( 'All WordPress. One Suite.', 'greyd-wp' ); ?></h2>
						<!-- /wp:heading -->

						<!-- wp:paragraph {"align":"left","className":""} -->
						<p class="has-text-align-left">
							<?php
							printf( /* translators: The variables refer to the HTML tags for highlighting the "next level" part of the sentence. */
								esc_html__( 'Take your website to the %1$snext level!%2$s', 'greyd-wp' ),
								'<mark class="has-inline-color has-background-color has-foreground-background-color"><strong>',
								'</strong></mark>'
							);
							?>
						</p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:group -->
				</div>
				<!-- /wp:column -->

				<!-- wp:column {"verticalAlignment":"center","width":"33%","className":""} -->
				<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:33%">
					<!-- wp:buttons {"className":"","layout":{"type":"flex","justifyContent":"right"}} -->
					<div class="wp-block-buttons">
						<!-- wp:button {"className":"has-custom-width wp-block-button__width-100 is-size-big is-style-alternate"} -->
						<div class="wp-block-button has-custom-width wp-block-button__width-100 is-size-big is-style-alternate">
							<a class="wp-block-button__link wp-element-button"><?php esc_html_e( 'Get Started →', 'greyd-wp' ); ?></a>
						</div>
						<!-- /wp:button -->
					</div>
					<!-- /wp:buttons -->
				</div>
				<!-- /wp:column -->
			</div>
			<!-- /wp:columns -->
		</div>
	</div>
	<!-- /wp:cover -->
</div>
<!-- /wp:group -->