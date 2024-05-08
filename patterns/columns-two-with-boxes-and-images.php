<?php
/**
 * Title: Two Columns with Boxes and Images
 * Slug: greyd-theme/columns-two-with-boxes-and-images
 * Description:
 * Categories: greyd-columns
 * Keywords:
 * Viewport Width: 1400
 * Inserter: true
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|x-large"},"padding":{"top":"var:preset|spacing|x-large"}}},"gradient":"cut-foreground-transparent-1-2","className":"","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-cut-foreground-transparent-1-2-gradient-background has-background" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--x-large);padding-top:var(--wp--preset--spacing--x-large)">
	<!-- wp:columns {"verticalAlignment":"center","className":""} -->
	<div class="wp-block-columns are-vertically-aligned-center">
		<!-- wp:column {"verticalAlignment":"center","style":{"spacing":{"blockGap":"var:preset|spacing|medium"}},"className":""} -->
		<div class="wp-block-column is-vertically-aligned-center">
			<!-- wp:group {"style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}}},"textColor":"background","layout":{"type":"constrained","contentSize":"450px","justifyContent":"left"}} -->
			<div class="wp-block-group has-background-color has-text-color has-link-color">
				<!-- wp:heading {"className":""} -->
				<h2 class="wp-block-heading"><?php esc_html_e( 'Discover Greyd', 'greyd-theme' ); ?></h2>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"className":""} -->
				<p><?php esc_html_e( 'Greyd Theme is a block theme that not only gives you an advanced block &amp; site editor experience, but also comes with many powerful add-ons. Its native integration into the core makes it extremely flexible, creating clean, accessible and superfast websites.', 'greyd-theme' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:image {"sizeSlug":"full","linkDestination":"none","style":{"color":{"duotone":"var:preset|duotone|primary-secondary"}},"className":""} -->
			<figure class="wp-block-image size-full">
				<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/white-cubes-floating.webp" alt="" />
			</figure>
			<!-- /wp:image -->

			<!-- wp:group {"className":"","layout":{"type":"flex","flexWrap":"wrap"}} -->
			<div class="wp-block-group">
				<!-- wp:image {"scale":"cover","sizeSlug":"full","linkDestination":"none","style":{"color":{"duotone":"var:preset|duotone|foreground-background"},"layout":{"selfStretch":"fixed","flexSize":"320px"}},"className":""} -->
				<figure class="wp-block-image size-full">
					<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/white-and-black-cubes-and-pyramids.webp" alt="" style="object-fit:cover" />
				</figure>
				<!-- /wp:image -->

				<!-- wp:group {"layout":{"type":"constrained","contentSize":"280px","justifyContent":"center"}} -->
				<div class="wp-block-group">
					<!-- wp:paragraph {"style":{"layout":{"selfStretch":"fixed"}},"className":""} -->
					<p><mark class="has-inline-color has-foreground-color has-background-background-color"><?php esc_html_e( 'Whether you are a freelancer, agency or large corporation, your WordPress revolution starts here.', 'greyd-theme' ); ?></mark></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center","width":"40%","style":{"spacing":{"blockGap":"var:preset|spacing|medium"}},"className":""} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:40%">
			<!-- wp:image {"sizeSlug":"full","linkDestination":"none","style":{"color":{"duotone":"var:preset|duotone|primary-background"}},"className":""} -->
			<figure class="wp-block-image size-full">
				<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/white-cubes-and-spheres-floating.webp" alt="" />
			</figure>
			<!-- /wp:image -->

			<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"}},"border":{"radius":"0px"},"elements":{"link":{"color":{"text":"var:preset|color|background"}}}},"backgroundColor":"foreground","textColor":"background","className":"","layout":{"type":"default"}} -->
			<div class="wp-block-group has-background-color has-foreground-background-color has-text-color has-background has-link-color" style="border-radius:0px;padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium)">
				<!-- wp:image {"width":"60px","height":"auto","sizeSlug":"full","linkDestination":"none","align":"center","className":"","style":{"color":{"duotone":"var:preset|duotone|foreground-background"}}} -->
				<figure class="wp-block-image aligncenter size-full is-resized">
					<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/greyd-logo-white.svg" alt="" style="width:60px;height:auto" />
				</figure>
				<!-- /wp:image -->

				<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"constrained"}} -->
				<div class="wp-block-group">
					<!-- wp:heading {"textAlign":"center","level":3} -->
					<h3 class="wp-block-heading has-text-align-center"><?php esc_html_e( 'Elevate your WP business', 'greyd-theme' ); ?></h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"align":"center","className":""} -->
					<p class="has-text-align-center"><?php esc_html_e( 'The Greyd Theme is the perfect starting point to scale up your WordPress business.', 'greyd-theme' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:paragraph {"align":"center","className":""} -->
				<p class="has-text-align-center"><a href="https://greyd.io/" target="_blank" rel="noreferrer noopener"><?php esc_html_e( 'Learn more about the theme →', 'greyd-theme' ); ?></a></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->