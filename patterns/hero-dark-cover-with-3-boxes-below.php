<?php
/**
 * Title: Dark Cover Box with 3 boxes below
 * Slug: greyd-theme/hero-dark-cover-with-3-boxes-below
 * Description:
 * Categories: greyd-hero
 * Keywords:
 * Viewport Width: 1600
 * Block Types:
 * Post Types:
 * Inserter: true
 */
?>
<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group">
	<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}},"border":{"radius":"8px"}},"backgroundColor":"primary","layout":{"type":"default"}} -->
	<div class="wp-block-group alignwide has-primary-background-color has-background" style="border-radius:8px;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
		<!-- wp:cover {"url":"<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/dark-transparent-background-pattern.webp","dimRatio":80,"isUserOverlayColor":true,"minHeight":600,"gradient":"foreground-to-primary","contentPosition":"bottom left","align":"wide","style":{"color":{"duotone":"var:preset|duotone|foreground-background"},"spacing":{"padding":{"top":"var:preset|spacing|large","bottom":"var:preset|spacing|large","left":"var:preset|spacing|large","right":"var:preset|spacing|large"}},"border":{"radius":"8px"}},"className":"full-rounded-cover full-rounded-image is-style-no-background","layout":{"type":"constrained","contentSize":"800px"}} -->
		<div class="wp-block-cover alignwide has-custom-content-position is-position-bottom-left full-rounded-cover full-rounded-image is-style-no-background" style="border-radius:8px;padding-top:var(--wp--preset--spacing--large);padding-right:var(--wp--preset--spacing--large);padding-bottom:var(--wp--preset--spacing--large);padding-left:var(--wp--preset--spacing--large);min-height:600px">
			<span aria-hidden="true" class="wp-block-cover__background has-background-dim-80 has-background-dim wp-block-cover__gradient-background has-background-gradient has-foreground-to-primary-gradient-background"></span>
			<img class="wp-block-cover__image-background" alt="" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/dark-transparent-background-pattern.webp" data-object-fit="cover" />
			<div class="wp-block-cover__inner-container">
				<!-- wp:group {"style":{"border":{"bottom":{"color":"var:preset|color|background","style":"dotted","width":"1px"},"top":{},"right":{},"left":{}},"spacing":{"padding":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium"}},"elements":{"link":{"color":{"text":"var:preset|color|background"}}}},"textColor":"background","className":"","layout":{"type":"constrained"}} -->
				<div class="wp-block-group has-background-color has-text-color has-link-color" style="border-bottom-color:var(--wp--preset--color--background);border-bottom-style:dotted;border-bottom-width:1px;padding-top:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium)">
					<!-- wp:heading {"textAlign":"left","level":1,"style":{"elements":{"link":{"color":{"text":"var:preset|color|lightest"}}}},"textColor":"lightest","className":""} -->
					<h1 class="wp-block-heading has-text-align-left has-lightest-color has-text-color has-link-color"><?php esc_html_e( 'Greyd Theme', 'greyd-theme' ); ?></h1>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"className":""} -->
					<p><?php esc_html_e( 'Our free block theme enhances your full site editing experience with powerful extensions. It is the ideal basis for any website you build with Greyd.Suite, but can also be used independently.', 'greyd-theme' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:buttons {"className":"","layout":{"type":"flex","justifyContent":"left"}} -->
				<div class="wp-block-buttons">
					<!-- wp:button {"className":"is-style-alternate"} -->
					<div class="wp-block-button is-style-alternate outline-light">
						<a class="wp-block-button__link wp-element-button" href="https://greyd.io/greyd-theme" target="_blank" rel="noreferrer noopener"><?php esc_html_e( 'Download Theme →', 'greyd-theme' ); ?></a>
					</div>
					<!-- /wp:button -->

					<!-- wp:button {"className":"outline-light is-style-fill"} -->
					<div class="wp-block-button outline-light is-style-fill">
						<a class="wp-block-button__link wp-element-button" href="https://greyd.io/demo/" target="_blank" rel="noreferrer noopener"><?php esc_html_e( 'Discover the Suite', 'greyd-theme' ); ?></a>
					</div>
					<!-- /wp:button -->
				</div>
				<!-- /wp:buttons -->
			</div>
		</div>
		<!-- /wp:cover -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium"}}},"className":"","layout":{"type":"default"}} -->
	<div class="wp-block-group alignwide" style="margin-top:var(--wp--preset--spacing--medium);margin-bottom:var(--wp--preset--spacing--medium)">
		<!-- wp:columns {"align":"wide","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}}} -->
		<div class="wp-block-columns alignwide" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
			<!-- wp:column {"verticalAlignment":"stretch","width":"33.33%"} -->
			<div class="wp-block-column is-vertically-aligned-stretch" style="flex-basis:33.33%">
				<!-- wp:group {"style":{"border":{"radius":"8px","style":"dotted"},"layout":{"selfStretch":"fit","flexSize":null}},"borderColor":"foreground","backgroundColor":"lightest","className":"","layout":{"type":"flex","orientation":"vertical","justifyContent":"left","verticalAlignment":"space-between"}} -->
				<div class="wp-block-group has-border-color has-foreground-border-color has-lightest-background-color has-background" style="border-style:dotted;border-radius:8px">
					<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"constrained","contentSize":"250px","justifyContent":"left"}} -->
					<div class="wp-block-group">
						<!-- wp:image {"width":"45px","height":"45px","sizeSlug":"full","linkDestination":"none","className":"","style":{"color":{"duotone":"var:preset|duotone|foreground-background"}}} -->
						<figure class="wp-block-image size-full is-resized">
							<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/greyd-logo-black.svg" alt="" style="width:45px;height:45px" />
						</figure>
						<!-- /wp:image -->

						<!-- wp:heading {"textAlign":"left","level":3,"className":""} -->
						<h3 class="wp-block-heading has-text-align-left"><?php esc_html_e( 'Responsive Web Design 2.0', 'greyd-theme' ); ?></h3>
						<!-- /wp:heading -->
					</div>
					<!-- /wp:group -->

					<!-- wp:paragraph {"align":"left","className":""} -->
					<p class="has-text-align-left"><?php esc_html_e( 'Maximum control over responsive design thanks to customizable spacing presets using modern CSS functions such as "clamp".', 'greyd-theme' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column {"verticalAlignment":"stretch","width":"33.33%","layout":{"type":"default"}} -->
			<div class="wp-block-column is-vertically-aligned-stretch" style="flex-basis:33.33%">
				<!-- wp:group {"style":{"border":{"radius":"8px","style":"dotted"},"layout":{"selfStretch":"fit","flexSize":null}},"borderColor":"foreground","backgroundColor":"lightest","className":"","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","verticalAlignment":"space-between"}} -->
				<div class="wp-block-group has-border-color has-foreground-border-color has-lightest-background-color has-background" style="border-style:dotted;border-radius:8px">
					<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"},"layout":{"selfStretch":"fill","flexSize":null}},"layout":{"type":"constrained","contentSize":"220px","justifyContent":"left"}} -->
					<div class="wp-block-group">
						<!-- wp:image {"width":"45px","height":"45px","sizeSlug":"full","linkDestination":"none","className":"","style":{"color":{"duotone":"var:preset|duotone|foreground-background"}}} -->
						<figure class="wp-block-image size-full is-resized">
							<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/greyd-logo-black.svg" alt="" style="width:45px;height:45px" />
						</figure>
						<!-- /wp:image -->

						<!-- wp:heading {"textAlign":"left","level":3,"className":""} -->
						<h3 class="wp-block-heading has-text-align-left"><?php esc_html_e( 'Additional Global Styles', 'greyd-theme' ); ?></h3>
						<!-- /wp:heading -->
					</div>
					<!-- /wp:group -->

					<!-- wp:paragraph {"align":"left","className":""} -->
					<p class="has-text-align-left"><?php esc_html_e( 'Benefit from various extensions and additions in the Site Editor: Multiple button variations, hover styles and fluid font sizes – it\'s all there!', 'greyd-theme' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column {"verticalAlignment":"stretch","width":"33.33%"} -->
			<div class="wp-block-column is-vertically-aligned-stretch" style="flex-basis:33.33%">
				<!-- wp:group {"style":{"border":{"radius":"8px","style":"dotted"},"layout":{"selfStretch":"fit","flexSize":null}},"borderColor":"foreground","backgroundColor":"lightest","className":"","layout":{"type":"flex","orientation":"vertical","verticalAlignment":"space-between","justifyContent":"left"}} -->
				<div class="wp-block-group has-border-color has-foreground-border-color has-lightest-background-color has-background" style="border-style:dotted;border-radius:8px">
					<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"constrained"}} -->
					<div class="wp-block-group">
						<!-- wp:image {"width":"45px","height":"45px","sizeSlug":"full","linkDestination":"none","className":"","style":{"color":{"duotone":"var:preset|duotone|foreground-background"}}} -->
						<figure class="wp-block-image size-full is-resized">
							<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/greyd-logo-black.svg" alt="" style="width:45px;height:45px" />
						</figure>
						<!-- /wp:image -->

						<!-- wp:heading {"textAlign":"left","level":3,"className":""} -->
						<h3 class="wp-block-heading has-text-align-left"><?php esc_html_e( 'Fast &amp; Accessibility-Ready', 'greyd-theme' ); ?></h3>
						<!-- /wp:heading -->
					</div>
					<!-- /wp:group -->

					<!-- wp:paragraph {"align":"left","className":""} -->
					<p class="has-text-align-left"><?php esc_html_e( 'Don\'t worry whether your website code is accessible. You put in the creativity, Greyd does the coding. The result are super-fast websites!', 'greyd-theme' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->
		</div>
		<!-- /wp:columns -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->