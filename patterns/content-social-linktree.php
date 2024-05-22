<?php
/**
 * Title: Social Linktree
 * Slug: greyd-wp/content-social-linktree
 * Description:
 * Categories: greyd-content
 * Keywords:
 * Viewport Width: 800
 * Block Types:
 * Post Types:
 * Inserter: true
 */
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|x-large"}}},"className":"","layout":{"type":"constrained","contentSize":"600px"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--x-large);padding-bottom:var(--wp--preset--spacing--x-large)">
	<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"className":"","layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
	<div class="wp-block-group">
		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"constrained"}} -->
		<div class="wp-block-group">
			<!-- wp:image {"width":"100px","sizeSlug":"full","linkDestination":"none","align":"center","className":"is-resized is-style-rounded"} -->
			<figure class="wp-block-image aligncenter size-full is-resized is-style-rounded">
				<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/white-and-black-cubes-and-pyramids.webp" alt="" style="width:100px" />
			</figure>
			<!-- /wp:image -->

			<!-- wp:heading {"textAlign":"center","level":1,"className":"","fontSize":"x-large"} -->
			<h1 class="wp-block-heading has-text-align-center has-x-large-font-size"><?php esc_html_e( 'Jane Doe', 'greyd-wp' ); ?></h1>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|large"}}},"className":""} -->
			<p class="has-text-align-center" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--large)">
				<a href="mailto:<?php esc_html_e( 'jane@doe.com', 'greyd-wp' ); ?>"><?php esc_html_e( 'jane@doe.com', 'greyd-wp' ); ?></a>
			</p>
			<!-- /wp:paragraph -->

			<!-- wp:social-links {"iconBackgroundColor":"contrast","iconBackgroundColorValue":"#000","size":"has-normal-icon-size","style":{"spacing":{"blockGap":"10px","margin":{"bottom":"var:preset|spacing|medium"}}},"className":"has-icon-base-color","layout":{"type":"flex","justifyContent":"center"}} -->
			<ul class="wp-block-social-links has-normal-icon-size has-icon-background-color has-icon-base-color" style="margin-bottom:var(--wp--preset--spacing--medium)">
				<!-- wp:social-link {"url":"#","service":"instagram","className":""} /-->

				<!-- wp:social-link {"url":"#","service":"twitter","className":""} /-->

				<!-- wp:social-link {"url":"#","service":"linkedin","className":""} /-->

				<!-- wp:social-link {"url":"#","service":"facebook","className":""} /-->
			</ul>
			<!-- /wp:social-links -->
		</div>
		<!-- /wp:group -->

		<!-- wp:buttons {"className":"","layout":{"type":"flex","justifyContent":"center","orientation":"horizontal"},"style":{"spacing":{"blockGap":"10px","margin":{"bottom":"var:preset|spacing|small"}}}} -->
		<div class="wp-block-buttons" style="margin-bottom:var(--wp--preset--spacing--small)">
			<!-- wp:button {"className":"has-custom-width wp-block-button__width-100"} -->
			<div class="wp-block-button has-custom-width wp-block-button__width-100">
				<a class="wp-block-button__link wp-element-button"><?php esc_html_e( 'Read my latest article', 'greyd-wp' ); ?></a>
			</div>
			<!-- /wp:button -->

			<!-- wp:button {"className":"has-custom-width wp-block-button__width-100"} -->
			<div class="wp-block-button has-custom-width wp-block-button__width-100">
				<a class="wp-block-button__link wp-element-button"><?php esc_html_e( 'Listen to my latest interview', 'greyd-wp' ); ?></a>
			</div>
			<!-- /wp:button -->

			<!-- wp:button {"className":"has-custom-width wp-block-button__width-100 is-style-fill"} -->
			<div class="wp-block-button has-custom-width wp-block-button__width-100 is-style-fill">
				<a class="wp-block-button__link wp-element-button"><?php esc_html_e( 'Visit my webshop', 'greyd-wp' ); ?></a>
			</div>
			<!-- /wp:button -->

			<!-- wp:button {"className":"has-custom-width wp-block-button__width-100 is-style-outline"} -->
			<div class="wp-block-button has-custom-width wp-block-button__width-100 is-style-outline">
				<a class="wp-block-button__link wp-element-button"><?php esc_html_e( 'Become a Patreon', 'greyd-wp' ); ?></a>
			</div>
			<!-- /wp:button -->

			<!-- wp:button {"className":"has-custom-width wp-block-button__width-100 is-style-outline"} -->
			<div class="wp-block-button has-custom-width wp-block-button__width-100 is-style-outline">
				<a class="wp-block-button__link wp-element-button"><?php esc_html_e( 'Make a donation', 'greyd-wp' ); ?></a>
			</div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->