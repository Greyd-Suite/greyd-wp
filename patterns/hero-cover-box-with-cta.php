<?php
/**
 * Title: Dark Cover Box with CTA
 * Slug: greyd-theme/hero-cover-box-with-cta
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
				<!-- wp:group {"style":{"border":{"bottom":{"width":"1px","style":"dotted"}},"spacing":{"padding":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium"}}},"className":"","layout":{"type":"constrained"}} -->
				<div class="wp-block-group" style="border-bottom-style:dotted;border-bottom-width:1px;padding-top:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium)">
					<!-- wp:heading {"level":1,"className":""} -->
					<h1 class="wp-block-heading">
						<strong>
							<?php esc_html_e( 'We built the tool we knew we all needed.', 'greyd-theme' ); ?><br><mark class="has-inline-color has-background-color has-foreground-background-color"><?php esc_html_e( 'Including you.', 'greyd-theme' ); ?></mark>
						</strong>
					</h1>
					<!-- /wp:heading -->
				</div>
				<!-- /wp:group -->

				<!-- wp:buttons {"align":"","className":""} -->
				<div class="wp-block-buttons">
					<!-- wp:button {"style":{"spacing":{"padding":{"left":"0","right":"0","top":"0","bottom":"0"}},"typography":{"textDecoration":"underline"}},"className":"is-style-clear"} -->
					<div class="wp-block-button is-style-clear" style="text-decoration:underline">
						<a class="wp-block-button__link wp-element-button" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><?php esc_html_e( 'Find out more', 'greyd-theme' ); ?></a>
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