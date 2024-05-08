<?php
/**
 * Title: CTA with Image Right
 * Slug: greyd-wp/cta-image-right
 * Description: Simple CTA section with an image on the right
 * Categories: greyd-cta, greyd-hero
 * Keywords:
 * Viewport Width: 1400
 * Block Types:
 * Post Types:
 * Inserter: true
 */
?>
<!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|x-large","left":"var:preset|spacing|x-large"}}},"className":""} -->
<div class="wp-block-columns are-vertically-aligned-center">
	<!-- wp:column {"verticalAlignment":"center","className":""} -->
	<div class="wp-block-column is-vertically-aligned-center">
		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small","padding":{"right":"var:preset|spacing|medium","left":"var:preset|spacing|medium"}}},"className":"","layout":{"type":"default"}} -->
		<div class="wp-block-group" style="padding-right:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium)">
			<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"default"}} -->
			<div class="wp-block-group">
				<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"700","textTransform":"uppercase"}},"textColor":"primary","className":""} -->
				<p class="has-primary-color has-text-color" style="font-style:normal;font-weight:700;text-transform:uppercase"><?php esc_html_e( 'Greyd', 'greyd-wp' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:heading {"className":"","fontSize":"x-large"} -->
				<h2 class="wp-block-heading has-x-large-font-size"><?php esc_html_e( 'The driving force for your WordPress business', 'greyd-wp' ); ?></h2>
				<!-- /wp:heading -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|large","bottom":"var:preset|spacing|medium"},"blockGap":"var:preset|spacing|small"}},"className":"","layout":{"type":"default"}} -->
			<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--large);margin-bottom:var(--wp--preset--spacing--medium)">
				<!-- wp:paragraph {"className":""} -->
				<p><?php esc_html_e( "Greyd offers a comprehensive platform to scale up your WordPress business and build the web empire you've always dreamed of. Whether you are a freelancer, agency or large corporation, your WordPress revolution starts here.", 'greyd-wp' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:buttons {"align":"","className":""} -->
			<div class="wp-block-buttons">
				<!-- wp:button {"className":""} -->
				<div class="wp-block-button">
					<a class="wp-block-button__link wp-element-button"><?php esc_html_e( 'Watch demo', 'greyd-wp' ); ?></a>
				</div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:column -->

	<!-- wp:column {"verticalAlignment":"center","className":""} -->
	<div class="wp-block-column is-vertically-aligned-center">
		<!-- wp:image {"scale":"cover","className":""} -->
		<figure class="wp-block-image">
			<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/white-interlaced-blocks-on-dark.webp" alt="" style="object-fit:cover" />
		</figure>
		<!-- /wp:image -->
	</div>
	<!-- /wp:column -->
</div>
<!-- /wp:columns -->