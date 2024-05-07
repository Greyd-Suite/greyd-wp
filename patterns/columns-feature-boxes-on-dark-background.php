<?php
/**
 * Title: Feature Boxes on Dark Background
 * Slug: greyd-theme/columns-feature-boxes-on-dark-background
 * Description:
 * Categories: greyd-columns
 * Keywords:
 * Viewport Width: 1400
 * Inserter: true
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|x-large"}}},"backgroundColor":"foreground","className":"","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-foreground-background-color has-background" style="padding-top:var(--wp--preset--spacing--x-large);padding-bottom:var(--wp--preset--spacing--x-large)">
	<!-- wp:columns {"align":"wide","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}}} -->
	<div class="wp-block-columns alignwide" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
		<!-- wp:column {"verticalAlignment":"stretch","width":"33.33%","backgroundColor":"lightest"} -->
		<div class="wp-block-column is-vertically-aligned-stretch has-lightest-background-color has-background" style="flex-basis:33.33%">
			<!-- wp:group {"style":{"border":{"radius":"4px"},"layout":{"selfStretch":"fit","flexSize":null}},"className":"","layout":{"type":"flex","orientation":"vertical","justifyContent":"left","verticalAlignment":"space-between"}} -->
			<div class="wp-block-group" style="border-radius:4px">
				<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"constrained","contentSize":"250px","justifyContent":"left"}} -->
				<div class="wp-block-group">
					<!-- wp:image {"width":"45px","height":"45px","sizeSlug":"full","linkDestination":"none","className":"","style":{"color":{"duotone":"var:preset|duotone|foreground-background"}}} -->
					<figure class="wp-block-image size-full is-resized">
						<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/greyd-logo-black.svg" alt="" style="width:45px;height:45px" />
					</figure>
					<!-- /wp:image -->

					<!-- wp:heading {"textAlign":"left","level":3,"className":""} -->
					<h3 class="wp-block-heading has-text-align-left"><?php esc_html_e( 'Repsonsive Web Design 2.0', 'greyd-theme' ); ?></h3>
					<!-- /wp:heading -->
				</div>
				<!-- /wp:group -->

				<!-- wp:paragraph {"align":"left","className":""} -->
				<p class="has-text-align-left"><?php esc_html_e( 'Maximum control over responsive design thanks to customizable spacing presets using modern CSS functions such as "clamp".', 'greyd-theme' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"stretch","width":"33.33%","backgroundColor":"lightest","layout":{"type":"default"}} -->
		<div class="wp-block-column is-vertically-aligned-stretch has-lightest-background-color has-background" style="flex-basis:33.33%">
			<!-- wp:group {"style":{"border":{"radius":"4px"},"layout":{"selfStretch":"fit","flexSize":null}},"className":"","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","verticalAlignment":"space-between"}} -->
			<div class="wp-block-group" style="border-radius:4px">
				<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"},"layout":{"selfStretch":"fill","flexSize":null}},"layout":{"type":"constrained","contentSize":"220px","justifyContent":"left"}} -->
				<div class="wp-block-group">
					<!-- wp:image {"width":"45px","height":"45px","sizeSlug":"full","linkDestination":"none","className":"","style":{"color":{"duotone":"var:preset|duotone|foreground-background"}}} -->
					<figure class="wp-block-image size-full is-resized">
						<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/greyd-logo-black.svg" alt="" style="width:45px;height:45px" />
					</figure>
					<!-- /wp:image -->

					<!-- wp:heading {"textAlign":"left","level":3,"className":""} -->
					<h3 class="wp-block-heading has-text-align-left"><?php esc_html_e( 'Additional Global Styles', 'greyd-theme' ); ?></h3>
					<!-- /wp:heading -->
				</div>
				<!-- /wp:group -->

				<!-- wp:paragraph {"align":"left","className":""} -->
				<p class="has-text-align-left"><?php esc_html_e( "Benefit from various extensions and additions in the Site Editor: From multiple button variations to hover styles and fluid font sizes – it's all there!", 'greyd-theme' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"stretch","width":"33.33%","backgroundColor":"lightest"} -->
		<div class="wp-block-column is-vertically-aligned-stretch has-lightest-background-color has-background" style="flex-basis:33.33%">
			<!-- wp:group {"style":{"border":{"radius":"4px"},"layout":{"selfStretch":"fit","flexSize":null}},"className":"","layout":{"type":"flex","orientation":"vertical","verticalAlignment":"space-between","justifyContent":"left"}} -->
			<div class="wp-block-group" style="border-radius:4px">
				<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"constrained"}} -->
				<div class="wp-block-group">
					<!-- wp:image {"width":"45px","height":"45px","sizeSlug":"full","linkDestination":"none","className":"","style":{"color":{"duotone":"var:preset|duotone|foreground-background"}}} -->
					<figure class="wp-block-image size-full is-resized">
						<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/greyd-logo-black.svg" alt="" style="width:45px;height:45px" />
					</figure>
					<!-- /wp:image -->

					<!-- wp:heading {"textAlign":"left","level":3,"className":""} -->
					<h3 class="wp-block-heading has-text-align-left"><?php esc_html_e( 'Lean, Fast &amp; Accessibility-Ready', 'greyd-theme' ); ?></h3>
					<!-- /wp:heading -->
				</div>
				<!-- /wp:group -->

				<!-- wp:paragraph {"align":"left","className":""} -->
				<p class="has-text-align-left"><?php esc_html_e( "Don't worry whether your website code is accessible. You put in the creativity, Greyd does the coding. The result are super-fast and lean websites!", 'greyd-theme' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->