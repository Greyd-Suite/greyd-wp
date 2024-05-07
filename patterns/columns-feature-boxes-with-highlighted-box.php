<?php
/**
 * Title: Feature Boxes on light background
 * Slug: greyd-theme/columns-feature-boxes-with-highlighted-box
 * Description:
 * Categories: greyd-columns
 * Keywords:
 * Viewport Width: 1400
 * Block Types:
 * Post Types:
 * Inserter: true
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|x-large"}}},"className":"","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--x-large);padding-bottom:var(--wp--preset--spacing--x-large)">
	<!-- wp:columns {"align":"wide","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}}} -->
	<div class="wp-block-columns alignwide" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
		<!-- wp:column {"verticalAlignment":"stretch","width":"33.33%"} -->
		<div class="wp-block-column is-vertically-aligned-stretch" style="flex-basis:33.33%">
			<!-- wp:group {"style":{"border":{"radius":"8px","style":"dotted"},"layout":{"selfStretch":"fit","flexSize":null}},"borderColor":"foreground","backgroundColor":"lightest","className":"","layout":{"type":"flex","orientation":"vertical","justifyContent":"left","verticalAlignment":"space-between"}} -->
			<div class="wp-block-group has-border-color has-foreground-border-color has-lightest-background-color has-background" style="border-style:dotted;border-radius:8px">
				<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"constrained","contentSize":"250px","justifyContent":"left"}} -->
				<div class="wp-block-group">
					<!-- wp:image {"width":"45px","height":"45px","sizeSlug":"full","linkDestination":"none","className":"","style":{"color":{"duotone":"var:preset|duotone|foreground-background"}}} -->
					<figure class="wp-block-image size-full is-resized">
						<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/greyd-logo-black.svg" alt="" style="width:45px;height:45px" />
					</figure>
					<!-- /wp:image -->

					<!-- wp:heading {"textAlign":"left","level":3,"className":""} -->
					<h3 class="wp-block-heading has-text-align-left"><?php esc_html_e( 'Responsive Web Design 2.0', 'greyd-theme' ); ?></h3>
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

		<!-- wp:column {"verticalAlignment":"stretch","width":"33.33%","layout":{"type":"default"}} -->
		<div class="wp-block-column is-vertically-aligned-stretch" style="flex-basis:33.33%">
			<!-- wp:group {"style":{"border":{"radius":"8px","style":"dotted"},"layout":{"selfStretch":"fit","flexSize":null}},"borderColor":"foreground","backgroundColor":"lightest","className":"","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","verticalAlignment":"space-between"}} -->
			<div class="wp-block-group has-border-color has-foreground-border-color has-lightest-background-color has-background" style="border-style:dotted;border-radius:8px">
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
				<p class="has-text-align-left"><?php esc_html_e( "Benefit from various extensions and additions in the Site Editor: Multiple button variations, hover styles and fluid font sizes – it's all there!", 'greyd-theme' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"stretch","width":"33.33%"} -->
		<div class="wp-block-column is-vertically-aligned-stretch" style="flex-basis:33.33%">
			<!-- wp:group {"style":{"border":{"radius":"8px","style":"dotted"},"layout":{"selfStretch":"fit","flexSize":null}},"borderColor":"foreground","backgroundColor":"lightest","className":"","layout":{"type":"flex","orientation":"vertical","verticalAlignment":"space-between","justifyContent":"left"}} -->
			<div class="wp-block-group has-border-color has-foreground-border-color has-lightest-background-color has-background" style="border-style:dotted;border-radius:8px">
				<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"constrained"}} -->
				<div class="wp-block-group">
					<!-- wp:image {"width":"45px","height":"45px","sizeSlug":"full","linkDestination":"none","className":"","style":{"color":{"duotone":"var:preset|duotone|foreground-background"}}} -->
					<figure class="wp-block-image size-full is-resized">
						<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/greyd-logo-black.svg" alt="" style="width:45px;height:45px" />
					</figure>
					<!-- /wp:image -->

					<!-- wp:heading {"textAlign":"left","level":3,"className":""} -->
					<h3 class="wp-block-heading has-text-align-left"><?php esc_html_e( 'Fast &amp; Accessibility-Ready', 'greyd-theme' ); ?></h3>
					<!-- /wp:heading -->
				</div>
				<!-- /wp:group -->

				<!-- wp:paragraph {"align":"left","className":""} -->
				<p class="has-text-align-left"><?php esc_html_e( "Don't worry whether your website code is accessible. You put in the creativity, Greyd does the coding. The result are super-fast websites!", 'greyd-theme' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->