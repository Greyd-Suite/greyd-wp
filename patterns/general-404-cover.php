<?php
/**
 * Title: 404 Template Cover
 * Slug: greyd-wp/general-404-cover
 * Description: A 404 template with a cover image.
 * Categories: greyd-general
 * Keywords: 404
 * Viewport Width: 1600
 * Block Types:
 * Post Types:
 * Inserter: true
 */
?>
<!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"top":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide" style="margin-top:0">
	<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}},"border":{"radius":"8px"}},"backgroundColor":"primary","layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignwide has-primary-background-color has-background" style="border-radius:8px;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
		<!-- wp:cover {"url":"<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/dark-transparent-background-pattern.webp","dimRatio":70,"isUserOverlayColor":true,"minHeight":65,"minHeightUnit":"vh","gradient":"primary-to-foreground","contentPosition":"center center","align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|medium","right":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium","left":"var:preset|spacing|medium"},"margin":{"top":"0","bottom":"0"}},"color":{"duotone":"var:preset|duotone|foreground-background"},"border":{"radius":"8px"}},"className":"is-style-no-background","layout":{"type":"default"}} -->
		<div class="wp-block-cover alignwide is-style-no-background" style="border-radius:8px;margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium);min-height:65vh">
			<span aria-hidden="true" class="wp-block-cover__background has-background-dim-70 has-background-dim wp-block-cover__gradient-background has-background-gradient has-primary-to-foreground-gradient-background"></span>
			<img class="wp-block-cover__image-background" alt="" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/dark-transparent-background-pattern.webp" data-object-fit="cover" />
			<div class="wp-block-cover__inner-container">
				<!-- wp:heading {"level":1,"style":{"typography":{"fontSize":"200px"}},"className":""} -->
				<h1 class="wp-block-heading" style="font-size:200px"><?php esc_html_e( '404', 'greyd-wp' ); ?></h1>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"className":""} -->
				<p><?php esc_html_e( 'This page could not be found.', 'greyd-wp' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:buttons {"align":"","className":""} -->
				<div class="wp-block-buttons">
					<!-- wp:button {"className":"is-size-big is-style-alternate"} -->
					<div class="wp-block-button is-size-big is-style-alternate">
						<a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( get_home_url() ); ?>"><?php esc_html_e( 'Go to home page', 'greyd-wp' ); ?></a>
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