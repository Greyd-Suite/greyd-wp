<?php
/**
 * Title: Icon Box, Light
 * Slug: greyd-wp/content-icon-box-light
 * Description:
 * Categories: greyd-content
 * Keywords:
 * Viewport Width: 600
 * Block Types:
 * Post Types:
 * Inserter: true
 */
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|large","bottom":"var:preset|spacing|large","left":"var:preset|spacing|large","right":"var:preset|spacing|large"}},"border":{"radius":"8px"}},"borderColor":"mediumlight","backgroundColor":"base","layout":{"type":"default"}} -->
<div class="wp-block-group has-border-color has-mediumlight-border-color has-base-background-color has-background" style="border-radius:8px;padding-top:var(--wp--preset--spacing--large);padding-right:var(--wp--preset--spacing--large);padding-bottom:var(--wp--preset--spacing--large);padding-left:var(--wp--preset--spacing--large)">
	<!-- wp:image {"width":"60px","height":"auto","sizeSlug":"full","linkDestination":"none","align":"center","style":{"color":{"duotone":"var:preset|duotone|foreground-background"}}} -->
	<figure class="wp-block-image aligncenter size-full is-resized">
		<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/greyd-logo-black.svg" alt="" style="width:60px;height:auto" />
	</figure>
	<!-- /wp:image -->

	<!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group">
		<!-- wp:heading {"textAlign":"center","level":3} -->
		<h3 class="wp-block-heading has-text-align-center"><?php esc_html_e( 'Elevate your WordPress business', 'greyd-wp' ); ?></h3>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"align":"center"} -->
		<p class="has-text-align-center"><?php esc_html_e( 'The Greyd Theme is the perfect starting point to scale up your WordPress business.', 'greyd-wp' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:paragraph {"align":"center"} -->
	<p class="has-text-align-center"><a href="https://greyd.io/" target="_blank" rel="noreferrer noopener"><?php esc_html_e( 'Learn more about the theme →', 'greyd-wp' ); ?></a></p>
	<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->