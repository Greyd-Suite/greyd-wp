<?php
/**
 * Title: CTA with Half Dark Background
 * Slug: greyd-theme/cta-half-dark-bg
 * Description:
 * Categories: greyd-cta
 * Keywords:
 * Viewport Width: 1200
 * Block Types:
 * Post Types:
 * Inserter: true
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|x-large"}}},"gradient":"cut-foreground-transparent-3-4","className":"","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-cut-foreground-transparent-3-4-gradient-background has-background" style="padding-top:var(--wp--preset--spacing--x-large);padding-bottom:var(--wp--preset--spacing--x-large)">
	<!-- wp:columns {"verticalAlignment":"top","align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|x-large","left":"var:preset|spacing|x-large"}}},"className":""} -->
	<div class="wp-block-columns alignwide are-vertically-aligned-top">
		<!-- wp:column {"verticalAlignment":"top","style":{"spacing":{"blockGap":"var:preset|spacing|medium"}},"className":""} -->
		<div class="wp-block-column is-vertically-aligned-top">
			<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"constrained"}} -->
			<div class="wp-block-group">
				<!-- wp:heading {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"textColor":"background","className":""} -->
				<h2 class="wp-block-heading has-background-color has-text-color" style="margin-top:0;margin-bottom:0">
					<?php esc_html_e( 'All WordPress.', 'greyd-theme' ); ?><br>
					<mark class="has-inline-color has-secondary-color"><?php esc_html_e( 'One Suite.', 'greyd-theme' ); ?></mark>
				</h2>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}}},"textColor":"background","className":""} -->
				<p class="has-background-color has-text-color has-link-color"><?php esc_html_e( 'Whether you are a freelancer, agency or large corporation, your WordPress revolution starts here.', 'greyd-theme' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:buttons {"className":""} -->
			<div class="wp-block-buttons">
				<!-- wp:button {"textColor":"background","style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}}},"borderColor":"background","className":"is-style-outline"} -->
				<div class="wp-block-button is-style-outline">
					<a class="wp-block-button__link has-background-color has-text-color has-link-color has-border-color has-background-border-color wp-element-button"><?php esc_html_e( 'Contact Us', 'greyd-theme' ); ?></a>
				</div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"top","className":""} -->
		<div class="wp-block-column is-vertically-aligned-top">
			<!-- wp:image {"height":"497px","align":"center","className":"is-resized is-style-rounded-corners","style":{"color":{"duotone":"var:preset|duotone|tertiary-background"}}} -->
			<figure class="wp-block-image aligncenter is-resized is-style-rounded-corners">
				<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/white-and-black-cubes-and-pyramids.webp" alt="" style="height:497px" />
			</figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->