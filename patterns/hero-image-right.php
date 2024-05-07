<?php
/**
 * Title: Hero with Image Right
 * Slug: greyd-theme/hero-image-right
 * Description: Simple hero section with an image on the right
 * Categories: greyd-hero, greyd-cta
 * Keywords:
 * Viewport Width: 1600
 * Block Types:
 * Post Types:
 * Inserter: true
 */
?>
<!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|x-large","left":"var:preset|spacing|x-large"}}},"className":""} -->
<div class="wp-block-columns are-vertically-aligned-center">
	<!-- wp:column {"verticalAlignment":"center","style":{"spacing":{"blockGap":"var:preset|spacing|x-large","padding":{"right":"var:preset|spacing|medium","left":"var:preset|spacing|medium"}}},"className":""} -->
	<div class="wp-block-column is-vertically-aligned-center" style="padding-right:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium)">
		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"default"}} -->
		<div class="wp-block-group">
			<!-- wp:paragraph {"textColor":"primary","className":"","fontSize":"medium"} -->
			<p class="has-primary-color has-text-color has-medium-font-size">
				<strong><?php esc_html_e( 'Get started', 'greyd-theme' ); ?></strong>
			</p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"textAlign":"left","level":1,"className":"","fontSize":"x-large"} -->
			<h1 class="wp-block-heading has-text-align-left has-x-large-font-size"><?php esc_html_e( 'Make more time for the work that matters most', 'greyd-theme' ); ?></h1>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"align":"left","className":""} -->
			<p class="has-text-align-left"><?php esc_html_e( 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore.', 'greyd-theme' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:buttons -->
		<div class="wp-block-buttons">
			<!-- wp:button {"className":"is-style-fill"} -->
			<div class="wp-block-button is-style-fill">
				<a class="wp-block-button__link wp-element-button"><?php esc_html_e( 'Get Started', 'greyd-theme' ); ?></a>
			</div>
			<!-- /wp:button -->

			<!-- wp:button {"className":"is-style-sec is-style-outline"} -->
			<div class="wp-block-button is-style-sec is-style-outline">
				<a class="wp-block-button__link wp-element-button"><?php esc_html_e( 'Learn more about Greyd', 'greyd-theme' ); ?></a>
			</div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->
	</div>
	<!-- /wp:column -->

	<!-- wp:column {"verticalAlignment":"center","className":""} -->
	<div class="wp-block-column is-vertically-aligned-center">
		<!-- wp:image {"sizeSlug":"large","linkDestination":"none","align":"center","className":""} -->
		<figure class="wp-block-image aligncenter size-large">
			<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/white-and-black-cubes-and-pyramids.webp" alt="" />
		</figure>
		<!-- /wp:image -->
	</div>
	<!-- /wp:column -->
</div>
<!-- /wp:columns -->