<?php
/**
 * Title: Four Topics with Description
 * Slug: greyd-wp/columns-four-topics-description
 * Description:
 * Categories: greyd-columns
 * Keywords:
 * Viewport Width: 1200
 * Block Types:
 * Post Types:
 * Inserter: true
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|x-large"}},"elements":{"link":{"color":{"text":"var:preset|color|background"}}}},"backgroundColor":"foreground","textColor":"background","className":"","layout":{"type":"default"}} -->
<div class="wp-block-group alignfull has-background-color has-foreground-background-color has-text-color has-background has-link-color" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--x-large);padding-bottom:var(--wp--preset--spacing--x-large)">
	<!-- wp:columns {"className":""} -->
	<div class="wp-block-columns">
		<!-- wp:column {"width":"33%","className":""} -->
		<div class="wp-block-column" style="flex-basis:33%">
			<!-- wp:group {"style":{"position":{"type":"sticky","top":"0px"}},"className":"","layout":{"type":"constrained"}} -->
			<div class="wp-block-group">
				<!-- wp:heading {"className":""} -->
				<h2 class="wp-block-heading"><?php esc_html_e( 'Our Services', 'greyd-wp' ); ?></h2>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"align":"left","className":"","fontSize":"medium"} -->
				<p class="has-text-align-left has-medium-font-size"><?php esc_html_e( 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.', 'greyd-wp' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:buttons {"align":"","className":""} -->
				<div class="wp-block-buttons">
					<!-- wp:button {"className":"is-style-sec is-style-outline"} -->
					<div class="wp-block-button is-style-sec is-style-outline">
						<a class="wp-block-button__link wp-element-button"><?php esc_html_e( 'Contact us', 'greyd-wp' ); ?></a>
					</div>
					<!-- /wp:button -->
				</div>
				<!-- /wp:buttons -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"width":"66%","className":""} -->
		<div class="wp-block-column" style="flex-basis:66%">
			<!-- wp:group {"style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"border":{"width":"1px","style":"dotted"},"spacing":{"padding":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium"}}},"textColor":"background","className":""} -->
			<div class="wp-block-group has-background-color has-text-color has-link-color" style="border-style:dotted;border-width:1px;padding-top:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium)">
				<!-- wp:columns -->
				<div class="wp-block-columns">
					<!-- wp:column {"width":"50%"} -->
					<div class="wp-block-column" style="flex-basis:50%">
						<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"},"dimensions":{"minHeight":""}},"className":"","layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
						<div class="wp-block-group">
							<!-- wp:image {"width":"264px"} -->
							<figure class="wp-block-image is-resized">
								<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/white-and-black-cubes-and-pyramids.webp" alt="" style="width:264px" />
							</figure>
							<!-- /wp:image -->

							<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"className":"","layout":{"type":"default"}} -->
							<div class="wp-block-group">
								<!-- wp:heading {"textAlign":"center","level":3,"className":"","fontSize":"medium"} -->
								<h3 class="wp-block-heading has-text-align-center has-medium-font-size"><?php esc_html_e( 'Webdesign', 'greyd-wp' ); ?></h3>
								<!-- /wp:heading -->

								<!-- wp:paragraph {"align":"center","className":""} -->
								<p class="has-text-align-center"><?php esc_html_e( 'At vero eos et accusam', 'greyd-wp' ); ?></p>
								<!-- /wp:paragraph -->
							</div>
							<!-- /wp:group -->

							<!-- wp:buttons {"align":"","className":""} -->
							<div class="wp-block-buttons">
								<!-- wp:button {"className":"is-style-clear"} /-->
							</div>
							<!-- /wp:buttons -->
						</div>
						<!-- /wp:group -->
					</div>
					<!-- /wp:column -->

					<!-- wp:column {"width":"50%"} -->
					<div class="wp-block-column" style="flex-basis:50%">
						<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"},"dimensions":{"minHeight":""}},"className":"","layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
						<div class="wp-block-group">
							<!-- wp:image {"width":"264px"} -->
							<figure class="wp-block-image is-resized">
								<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/white-cubes-floating.webp" alt="" style="width:264px" />
							</figure>
							<!-- /wp:image -->

							<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"className":"","layout":{"type":"default"}} -->
							<div class="wp-block-group">
								<!-- wp:heading {"textAlign":"center","level":3,"className":"","fontSize":"medium"} -->
								<h3 class="wp-block-heading has-text-align-center has-medium-font-size"><?php esc_html_e( 'SEO', 'greyd-wp' ); ?></h3>
								<!-- /wp:heading -->

								<!-- wp:paragraph {"align":"center","className":""} -->
								<p class="has-text-align-center"><?php esc_html_e( 'At vero eos et accusam', 'greyd-wp' ); ?></p>
								<!-- /wp:paragraph -->
							</div>
							<!-- /wp:group -->

							<!-- wp:buttons {"align":"","className":""} -->
							<div class="wp-block-buttons">
								<!-- wp:button {"className":"is-style-clear"} /-->
							</div>
							<!-- /wp:buttons -->
						</div>
						<!-- /wp:group -->
					</div>
					<!-- /wp:column -->
				</div>
				<!-- /wp:columns -->

				<!-- wp:columns -->
				<div class="wp-block-columns">
					<!-- wp:column {"width":"50%"} -->
					<div class="wp-block-column" style="flex-basis:50%">
						<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"},"dimensions":{"minHeight":""}},"className":"","layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
						<div class="wp-block-group">
							<!-- wp:image {"width":"264px","className":"is-resized"} -->
							<figure class="wp-block-image is-resized">
								<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/white-spheres-and-pyramids-floating.webp" alt="" style="width:264px" />
							</figure>
							<!-- /wp:image -->

							<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"className":"","layout":{"type":"default"}} -->
							<div class="wp-block-group">
								<!-- wp:heading {"textAlign":"center","level":3,"className":"","fontSize":"medium"} -->
								<h3 class="wp-block-heading has-text-align-center has-medium-font-size"><?php esc_html_e( 'Social Media', 'greyd-wp' ); ?></h3>
								<!-- /wp:heading -->

								<!-- wp:paragraph {"align":"center","className":""} -->
								<p class="has-text-align-center"><?php esc_html_e( 'At vero eos et accusam', 'greyd-wp' ); ?></p>
								<!-- /wp:paragraph -->
							</div>
							<!-- /wp:group -->

							<!-- wp:buttons {"align":"","className":""} -->
							<div class="wp-block-buttons">
								<!-- wp:button {"className":"is-style-clear"} /-->
							</div>
							<!-- /wp:buttons -->
						</div>
						<!-- /wp:group -->
					</div>
					<!-- /wp:column -->

					<!-- wp:column {"width":"50%"} -->
					<div class="wp-block-column" style="flex-basis:50%">
						<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"},"dimensions":{"minHeight":""}},"className":"","layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
						<div class="wp-block-group">
							<!-- wp:image {"width":"264px","className":"is-resized"} -->
							<figure class="wp-block-image is-resized">
								<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/white-and-black-cubes-and-pyramids.webp" alt="" style="width:264px" />
							</figure>
							<!-- /wp:image -->

							<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"className":"","layout":{"type":"default"}} -->
							<div class="wp-block-group">
								<!-- wp:heading {"textAlign":"center","level":3,"className":"","fontSize":"medium"} -->
								<h3 class="wp-block-heading has-text-align-center has-medium-font-size"><?php esc_html_e( 'SEA', 'greyd-wp' ); ?></h3>
								<!-- /wp:heading -->

								<!-- wp:paragraph {"align":"center","className":""} -->
								<p class="has-text-align-center"><?php esc_html_e( 'At vero eos et accusam', 'greyd-wp' ); ?></p>
								<!-- /wp:paragraph -->
							</div>
							<!-- /wp:group -->

							<!-- wp:buttons {"align":"","className":""} -->
							<div class="wp-block-buttons">
								<!-- wp:button {"className":"is-style-clear"} /-->
							</div>
							<!-- /wp:buttons -->
						</div>
						<!-- /wp:group -->
					</div>
					<!-- /wp:column -->
				</div>
				<!-- /wp:columns -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->