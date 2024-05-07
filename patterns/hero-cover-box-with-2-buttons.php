<?php
/**
 * Title: Dark Cover Box with 2 buttons
 * Slug: greyd-theme/hero-cover-box-with-2-buttons
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
					<div class="wp-block-button is-style-alternate">
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
</div>
<!-- /wp:group -->