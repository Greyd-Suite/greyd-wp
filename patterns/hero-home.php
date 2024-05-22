<?php
/**
 * Title: Hero Homepage with Header
 * Slug: greyd-wp/hero-home
 * Description: The hero section for the homepage with header
 * Categories: greyd-hero
 * Keywords:
 * Viewport Width: 1600
 * Inserter: true
 */
?>
<!-- wp:cover {"url":"<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/black-and-white-background-pattern.webp","dimRatio":90,"overlayColor":"secondary","isUserOverlayColor":true,"minHeightUnit":"px","isDark":false,"align":"full","style":{"color":{"duotone":"var:preset|duotone|background-foreground"},"spacing":{"padding":{"top":"0","bottom":"var:preset|spacing|x-large","right":"0","left":"0"}}},"className":"","layout":{"type":"constrained"}} -->
<div class="wp-block-cover alignfull is-light" style="padding-top:0;padding-right:0;padding-bottom:var(--wp--preset--spacing--x-large);padding-left:0">
	<span aria-hidden="true" class="wp-block-cover__background has-secondary-background-color has-background-dim-90 has-background-dim"></span>
	<img class="wp-block-cover__image-background" alt="" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/black-and-white-background-pattern.webp" data-object-fit="cover" />
	<div class="wp-block-cover__inner-container">
		<!-- wp:group {"align":"wide","style":{"elements":{"link":{"color":{"text":"var:preset|color|foreground"}}}},"textColor":"foreground","className":"","layout":{"type":"default"}} -->
		<div class="wp-block-group alignwide has-foreground-color has-text-color has-link-color">
			<!-- wp:template-part {"slug":"header","area":"header","tagName":"header","align":"wide","className":""} /-->
		</div>
		<!-- /wp:group -->

		<!-- wp:spacer {"height":"var:preset|spacing|large"} -->
		<div style="height:var(--wp--preset--spacing--large)" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer -->

		<!-- wp:columns {"verticalAlignment":"center","align":"wide","className":""} -->
		<div class="wp-block-columns alignwide are-vertically-aligned-center">
			<!-- wp:column {"verticalAlignment":"center","width":"50%","className":""} -->
			<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50%">
				<!-- wp:group {"style":{"elements":{"link":{"color":{"text":"var:preset|color|foreground"}}}},"textColor":"foreground","className":"","layout":{"type":"constrained"}} -->
				<div class="wp-block-group has-foreground-color has-text-color has-link-color">
					<!-- wp:heading {"textAlign":"left","level":1,"className":""} -->
					<h1 class="wp-block-heading has-text-align-left"><?php esc_html_e( 'Greyd Theme', 'greyd-wp' ); ?></h1>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"className":""} -->
					<p><?php esc_html_e( 'Our free block theme enhances your full site editing experience with powerful extensions. It is the ideal basis for any website you build with Greyd.Suite, but can also be used independently.', 'greyd-wp' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:buttons {"className":"","layout":{"type":"flex","justifyContent":"left"}} -->
				<div class="wp-block-buttons">
					<!-- wp:button {"className":"is-style-fill"} -->
					<div class="wp-block-button is-style-fill">
						<a class="wp-block-button__link wp-element-button" href="https://greyd.io/greyd-wp" target="_blank" rel="noreferrer noopener"><?php esc_html_e( 'Download Theme →', 'greyd-wp' ); ?></a>
					</div>
					<!-- /wp:button -->

					<!-- wp:button {"textColor":"foreground","style":{"elements":{"link":{"color":{"text":"var:preset|color|foreground"}}}},"className":"is-style-outline"} -->
					<div class="wp-block-button is-style-outline">
						<a class="wp-block-button__link has-foreground-color has-text-color has-link-color wp-element-button" href="https://greyd.io/demo/" target="_blank" rel="noreferrer noopener"><?php esc_html_e( 'Discover the Suite', 'greyd-wp' ); ?></a>
					</div>
					<!-- /wp:button -->
				</div>
				<!-- /wp:buttons -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column {"verticalAlignment":"center","width":"50%","className":""} -->
			<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50%">
				<!-- wp:group {"className":"","layout":{"type":"flex","flexWrap":"nowrap","orientation":"horizontal","justifyContent":"right"}} -->
				<div class="wp-block-group">
					<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"}},"border":{"radius":"4px"}},"backgroundColor":"lightest","textColor":"foreground","className":""} -->
					<div class="wp-block-group has-foreground-color has-lightest-background-color has-text-color has-background" style="border-radius:4px;padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium)">
						<!-- wp:paragraph {"textColor":"foreground"} -->
						<p class="has-foreground-color has-text-color">
							<strong><?php esc_html_e( 'Links &amp; Resources', 'greyd-wp' ); ?></strong>
						</p>
						<!-- /wp:paragraph -->

						<!-- wp:paragraph {"className":""} -->
						<p><a href="https://greyd.io/" target="_blank" rel="noreferrer noopener"><?php esc_html_e( 'Visit our website →', 'greyd-wp' ); ?></a></p>
						<!-- /wp:paragraph -->

						<!-- wp:paragraph {"className":""} -->
						<p><a href="https://greyd.io/greyd-wp/#tutorial" target="_blank" rel="noreferrer noopener"><?php esc_html_e( 'Helpcenter →', 'greyd-wp' ); ?></a></p>
						<!-- /wp:paragraph -->

						<!-- wp:paragraph {"className":""} -->
						<p><a href="https://greyd.io/greyd-wp/#faq" target="_blank" rel="noreferrer noopener"><?php esc_html_e( 'FAQs →', 'greyd-wp' ); ?></a></p>
						<!-- /wp:paragraph -->
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