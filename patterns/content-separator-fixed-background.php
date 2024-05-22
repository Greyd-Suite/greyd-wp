<?php
/**
 * Title: Separator with Fixed Background
 * Slug: greyd-wp/content-separator-fixed-background
 * Description: A separator with a fixed background image
 * Categories: greyd-content
 * Keywords:
 * Viewport Width: 1600
 * Block Types:
 * Post Types:
 * Inserter: true
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"backgroundColor":"secondary","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-secondary-background-color has-background" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
	<!-- wp:cover {"url":"<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/dark-transparent-background-pattern.webp","hasParallax":true,"isRepeated":true,"dimRatio":50,"isUserOverlayColor":true,"minHeight":20,"minHeightUnit":"em","gradient":"primary-to-secondary","align":"full","style":{"elements":{"link":{"color":{"text":"var:preset|color|foreground"}}},"color":{"duotone":"var:preset|duotone|foreground-background"}},"textColor":"foreground","className":"is-style-no-background"} -->
	<div class="wp-block-cover alignfull has-parallax is-repeated is-style-no-background has-foreground-color has-text-color has-link-color" style="min-height:20em">
		<span aria-hidden="true" class="wp-block-cover__background has-background-dim wp-block-cover__gradient-background has-background-gradient has-primary-to-secondary-gradient-background"></span>
		<div class="wp-block-cover__image-background has-parallax is-repeated" style="background-position:50% 50%;background-image:url(<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/dark-transparent-background-pattern.webp)"></div>
		<div class="wp-block-cover__inner-container">
			<!-- wp:paragraph {"align":"center","placeholder":"<?php esc_html_e( 'Write title...', 'greyd-wp' ); ?>","className":"","fontSize":"large"} -->
			<p class="has-text-align-center has-large-font-size"></p>
			<!-- /wp:paragraph -->
		</div>
	</div>
	<!-- /wp:cover -->
</div>
<!-- /wp:group -->