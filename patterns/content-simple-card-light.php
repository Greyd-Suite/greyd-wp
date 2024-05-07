<?php
/**
 * Title: Simple Card, Light
 * Slug: greyd-theme/content-simple-card-light
 * Description: 
 * Categories: greyd-content
 * Keywords: 
 * Viewport Width: 600
 * Block Types: 
 * Post Types: 
 * Inserter: true
 */
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|small","left":"var:preset|spacing|small","right":"var:preset|spacing|small"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--small)">
	<!-- wp:image {"width":"auto","height":"200px","aspectRatio":"16/9","scale":"cover","sizeSlug":"thumbnail","style":{"color":{"duotone":"var:preset|duotone|foreground-background"},"layout":{"selfStretch":"fit","flexSize":null}},"className":"is-style-rounded-corners"} -->
	<figure class="wp-block-image size-thumbnail is-resized is-style-rounded-corners">
		<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/greyd-placeholder-image-black-300x300.svg" alt="" style="aspect-ratio:16/9;object-fit:cover;width:auto;height:200px" />
	</figure>
	<!-- /wp:image -->

	<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"},"layout":{"selfStretch":"fill","flexSize":null}},"layout":{"type":"default"}} -->
	<div class="wp-block-group">
		<!-- wp:paragraph -->
		<p><?php esc_html_e( 'Elevate Your Experience', 'greyd-theme' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:heading -->
		<h2 class="wp-block-heading"><?php esc_html_e( 'Discover Greyd', 'greyd-theme' ); ?></h2>
		<!-- /wp:heading -->
	</div>
	<!-- /wp:group -->

	<!-- wp:paragraph -->
	<p><?php esc_html_e( 'Immerse yourself in unparalleled Greyd excellence. Unleash a new era of website design. Your journey to streamlined creativity starts here.', 'greyd-theme' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:buttons -->
	<div class="wp-block-buttons">
		<!-- wp:button {"className":"is-style-outline"} -->
		<div class="wp-block-button is-style-outline">
			<a class="wp-block-button__link wp-element-button"><?php esc_html_e( 'Explore Now', 'greyd-theme' ); ?></a>
		</div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->
</div>
<!-- /wp:group -->