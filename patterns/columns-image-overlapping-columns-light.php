<?php
/**
 * Title: Image with Overlapping Columns, Light
 * Slug: greyd-theme/columns-image-overlapping-columns-light
 * Description:
 * Categories: greyd-columns
 * Keywords:
 * Viewport Width: 1400
 * Block Types:
 * Post Types:
 * Inserter: true
 */
?>
<!-- wp:cover {"url":"<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/white-and-black-cubes-and-pyramids.webp","isUserOverlayColor":true,"focalPoint":{"x":0.5,"y":0.75},"customGradient":"linear-gradient(180deg,rgba(0,0,0,0) 80%,rgb(255,255,255) 80%)","contentPosition":"bottom center","align":"wide","style":{"elements":{"link":{"color":{"text":"var:preset|color|darkest"}}},"color":{"duotone":"var:preset|duotone|tertiary-background"}},"textColor":"darkest"} -->
<div class="wp-block-cover alignwide has-custom-content-position is-position-bottom-center has-darkest-color has-text-color has-link-color">
	<span aria-hidden="true" class="wp-block-cover__background has-background-dim-100 has-background-dim wp-block-cover__gradient-background has-background-gradient" style="background:linear-gradient(180deg,rgba(0,0,0,0) 80%,rgb(255,255,255) 80%)"></span>
	<img class="wp-block-cover__image-background" alt="" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/white-and-black-cubes-and-pyramids.webp" style="object-position:50% 75%" data-object-fit="cover" data-object-position="50% 75%" />
	<div class="wp-block-cover__inner-container">
		<!-- wp:spacer {"height":"300px"} -->
		<div style="height:300px" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer -->

		<!-- wp:group {"className":"","layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"stretch"}} -->
		<div class="wp-block-group">
			<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"}},"border":{"radius":"4px"},"layout":{"selfStretch":"fill","flexSize":null}},"backgroundColor":"background","className":"","layout":{"type":"flex","orientation":"vertical","verticalAlignment":"space-between"}} -->
			<div class="wp-block-group has-background-background-color has-background" style="border-radius:4px;padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium)">
				<!-- wp:heading {"textAlign":"left","level":3,"className":""} -->
				<h3 class="wp-block-heading has-text-align-left"><?php esc_html_e( 'Beyond Boundaries', 'greyd-theme' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"align":"left","className":""} -->
				<p class="has-text-align-left"><?php esc_html_e( 'Elevate your design game with Greyd while ensuring inclusivity for all users.', 'greyd-theme' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"}},"border":{"radius":"4px"},"layout":{"selfStretch":"fill","flexSize":null}},"backgroundColor":"background","className":"","layout":{"type":"flex","orientation":"vertical","verticalAlignment":"space-between"}} -->
			<div class="wp-block-group has-background-background-color has-background" style="border-radius:4px;padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium)">
				<!-- wp:heading {"textAlign":"left","level":3} -->
				<h3 class="wp-block-heading has-text-align-left"><?php esc_html_e( 'Craft for All Devices', 'greyd-theme' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"align":"left","className":""} -->
				<p class="has-text-align-left"><?php esc_html_e( 'Dive into accessibility to create web experiences that everyone can enjoy.', 'greyd-theme' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"}},"border":{"radius":"4px"},"layout":{"selfStretch":"fill","flexSize":null}},"backgroundColor":"background","className":"","layout":{"type":"flex","orientation":"vertical","verticalAlignment":"space-between"}} -->
			<div class="wp-block-group has-background-background-color has-background" style="border-radius:4px;padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium)">
				<!-- wp:heading {"textAlign":"left","level":3,"className":""} -->
				<h3 class="wp-block-heading has-text-align-left"><?php esc_html_e( 'Everyone in Mind', 'greyd-theme' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"align":"left","className":""} -->
				<p class="has-text-align-left"><?php esc_html_e( 'Master techniques to enhance usability and inclusivity in your designs.', 'greyd-theme' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->
	</div>
</div>
<!-- /wp:cover -->