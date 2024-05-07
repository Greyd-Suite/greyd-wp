<?php
/**
 * Title: About Us with Three Boxes
 * Slug: greyd-theme/columns-about-us-three-boxes
 * Description:
 * Categories: greyd-columns
 * Keywords:
 * Viewport Width: 1600
 * Inserter: true
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"bottom":"var:preset|spacing|x-large","right":"0","left":"0","top":"var:preset|spacing|x-large"}}},"backgroundColor":"base","className":"","layout":{"type":"default"}} -->
<div class="wp-block-group alignfull has-base-background-color has-background" style="padding-top:var(--wp--preset--spacing--x-large);padding-right:0;padding-bottom:var(--wp--preset--spacing--x-large);padding-left:0">
	<!-- wp:group {"layout":{"type":"constrained"}} -->
	<div class="wp-block-group">
		<!-- wp:columns {"align":"wide"} -->
		<div class="wp-block-columns alignwide">
			<!-- wp:column -->
			<div class="wp-block-column">
				<!-- wp:group {"style":{"position":{"type":"sticky","top":"0px"}},"layout":{"type":"constrained","contentSize":"540px","justifyContent":"left"}} -->
				<div class="wp-block-group">
					<!-- wp:paragraph {"align":"left","style":{"typography":{"fontStyle":"normal","fontWeight":"700"},"spacing":{"padding":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|small"}}},"textColor":"primary","className":"has-text-align-center"} -->
					<p class="has-text-align-left has-text-align-center has-primary-color has-text-color" style="padding-top:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--small);font-style:normal;font-weight:700"><?php esc_html_e( 'Why it exists, you might ask?', 'greyd-theme' ); ?></p>
					<!-- /wp:paragraph -->

					<!-- wp:heading {"textAlign":"left","style":{"typography":{"lineHeight":"1.2"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"className":"","fontSize":"xx-large"} -->
					<h2 class="wp-block-heading has-text-align-left has-xx-large-font-size" style="margin-top:0;margin-bottom:0;line-height:1.2">
						<?php esc_html_e( 'We built the tool we knew we all needed.', 'greyd-theme' ); ?><br><mark class="has-inline-color has-background-color has-foreground-background-color"><?php esc_html_e( 'Including you.', 'greyd-theme' ); ?></mark>
					</h2>
					<!-- /wp:heading -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column -->
			<div class="wp-block-column">
				<!-- wp:group {"style":{"border":{"radius":"4px"},"layout":{"selfStretch":"fixed","flexSize":"540px"},"spacing":{"blockGap":"var:preset|spacing|small"}},"backgroundColor":"lightest","className":"","layout":{"type":"flex","orientation":"vertical","justifyContent":"left","verticalAlignment":"space-between"}} -->
				<div class="wp-block-group has-lightest-background-color has-background" style="border-radius:4px">
					<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"constrained","contentSize":"","justifyContent":"left"}} -->
					<div class="wp-block-group">
						<!-- wp:image {"width":"45px","height":"45px","sizeSlug":"full","linkDestination":"none","className":"","style":{"color":{"duotone":"var:preset|duotone|foreground-background"}}} -->
						<figure class="wp-block-image size-full is-resized">
							<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/greyd-logo-black.svg" alt="" style="width:45px;height:45px" />
						</figure>
						<!-- /wp:image -->

						<!-- wp:heading {"textAlign":"left","level":3,"className":""} -->
						<h3 class="wp-block-heading has-text-align-left"><?php esc_html_e( 'Our ambition', 'greyd-theme' ); ?></h3>
						<!-- /wp:heading -->
					</div>
					<!-- /wp:group -->

					<!-- wp:paragraph {"align":"left","className":""} -->
					<p class="has-text-align-left"><?php esc_html_e( 'We spent years in the web agency and website creation industry: our biggest challenge was that we had to begin every project from the beginning each time.', 'greyd-theme' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:group {"style":{"border":{"radius":"4px"},"layout":{"selfStretch":"fixed","flexSize":"540px"},"spacing":{"blockGap":"var:preset|spacing|small"}},"backgroundColor":"lightest","className":"","layout":{"type":"flex","orientation":"vertical","justifyContent":"left","verticalAlignment":"space-between"}} -->
				<div class="wp-block-group has-lightest-background-color has-background" style="border-radius:4px">
					<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"},"layout":{"selfStretch":"fill","flexSize":null}},"layout":{"type":"constrained"}} -->
					<div class="wp-block-group">
						<!-- wp:image {"width":"45px","height":"45px","sizeSlug":"full","linkDestination":"none","className":"","style":{"color":{"duotone":"var:preset|duotone|foreground-background"}}} -->
						<figure class="wp-block-image size-full is-resized">
							<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/greyd-logo-black.svg" alt="" style="width:45px;height:45px" />
						</figure>
						<!-- /wp:image -->

						<!-- wp:heading {"textAlign":"left","level":3,"className":""} -->
						<h3 class="wp-block-heading has-text-align-left"><?php esc_html_e( 'Our story', 'greyd-theme' ); ?></h3>
						<!-- /wp:heading -->
					</div>
					<!-- /wp:group -->

					<!-- wp:paragraph {"align":"left","className":""} -->
					<p class="has-text-align-left"><?php esc_html_e( 'Greyd was born as a response to the everyday struggles people and businesses face with WordPress, where page builders, themes, and plugins often fall short.', 'greyd-theme' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:group {"style":{"border":{"radius":"4px"},"layout":{"selfStretch":"fixed","flexSize":"540px"},"elements":{"link":{"color":{"text":"var:preset|color|lightest"}}},"spacing":{"blockGap":"var:preset|spacing|small"}},"backgroundColor":"primary","textColor":"lightest","className":"","layout":{"type":"flex","orientation":"vertical","verticalAlignment":"space-between","justifyContent":"left"}} -->
				<div class="wp-block-group has-lightest-color has-primary-background-color has-text-color has-background has-link-color" style="border-radius:4px">
					<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"constrained"}} -->
					<div class="wp-block-group">
						<!-- wp:image {"width":"45px","height":"45px","sizeSlug":"full","linkDestination":"none","className":"","style":{"color":{"duotone":"var:preset|duotone|foreground-background"}}} -->
						<figure class="wp-block-image size-full is-resized">
							<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/greyd-logo-white.svg" alt="" style="width:45px;height:45px" />
						</figure>
						<!-- /wp:image -->

						<!-- wp:heading {"textAlign":"left","level":3,"className":""} -->
						<h3 class="wp-block-heading has-text-align-left"><?php esc_html_e( 'Our mission', 'greyd-theme' ); ?></h3>
						<!-- /wp:heading -->
					</div>
					<!-- /wp:group -->

					<!-- wp:paragraph {"align":"left","className":""} -->
					<p class="has-text-align-left"><?php esc_html_e( 'Join us on our mission to transform web development into a more accessible, sustainable, and inspiring journey.', 'greyd-theme' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->
		</div>
		<!-- /wp:columns -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->