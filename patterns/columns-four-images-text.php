<?php
/**
 * Title: Four Images with Text
 * Slug: greyd-theme/columns-four-images-text
 * Description:
 * Categories: greyd-columns
 * Keywords:
 * Viewport Width: 1600
 * Block Types:
 * Post Types:
 * Inserter: true
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"blockGap":"0"}},"className":"","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center","verticalAlignment":"stretch"}} -->
<div class="wp-block-group alignfull">
	<!-- wp:group {"style":{"spacing":{"blockGap":"0"},"layout":{"selfStretch":"fit","flexSize":null}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
	<div class="wp-block-group">
		<!-- wp:image {"width":"200px","className":"is-resized"} -->
		<figure class="wp-block-image is-resized">
			<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/white-cubes-floating.webp" alt="" style="width:200px" />
		</figure>
		<!-- /wp:image -->

		<!-- wp:image {"width":"200px","className":"is-resized"} -->
		<figure class="wp-block-image is-resized">
			<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/white-interlaced-blocks-on-dark.webp" alt="" style="width:200px" />
		</figure>
		<!-- /wp:image -->

		<!-- wp:image {"width":"200px","className":"is-resized"} -->
		<figure class="wp-block-image is-resized">
			<img src="<?php echo esc_url( get_template_directory_uri()); ?>/assets/images/white-and-black-cubes-and-pyramids.webp" alt="" style="width:200px" />
		</figure>
		<!-- /wp:image -->

		<!-- wp:image {"width":"200px","className":"is-resized"} -->
		<figure class="wp-block-image is-resized">
			<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/white-cubes-and-spheres-floating.webp" alt="" style="width:200px" />
		</figure>
		<!-- /wp:image -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"},"blockGap":"var:preset|spacing|small"},"layout":{"selfStretch":"fit","flexSize":null},"elements":{"link":{"color":{"text":"var:preset|color|background"}}}},"backgroundColor":"primary","textColor":"background","className":"","layout":{"type":"flex","orientation":"vertical","verticalAlignment":"space-between"}} -->
	<div class="wp-block-group has-background-color has-primary-background-color has-text-color has-background has-link-color" style="padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium)">
		<!-- wp:heading {"level":3,"className":"","fontSize":"large"} -->
		<h3 class="wp-block-heading has-large-font-size"><?php esc_html_e( 'Discover Greyd', 'greyd-theme' ); ?></h3>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"className":"","fontSize":"small"} -->
		<p class="has-small-font-size"><?php esc_html_e( 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor.', 'greyd-theme' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->