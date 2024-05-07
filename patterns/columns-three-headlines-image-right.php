<?php
/**
 * Title: Three Headlines left, Image right
 * Slug: greyd-theme/columns-three-headlines-image-right
 * Description:
 * Categories: greyd-columns
 * Keywords:
 * Viewport Width: 1400
 * Block Types:
 * Post Types:
 * Inserter: true
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"blockGap":"var:preset|spacing|large","padding":{"top":"var:preset|spacing|x-large","right":"var:preset|spacing|medium","bottom":"var:preset|spacing|x-large","left":"var:preset|spacing|medium"}}},"className":"","layout":{"type":"constrained","contentSize":""}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--x-large);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--x-large);padding-left:var(--wp--preset--spacing--medium)">
	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"className":"","layout":{"type":"default"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:heading {"textAlign":"center","className":"is-style-wide"} -->
		<h2 class="wp-block-heading has-text-align-center is-style-wide"><?php esc_html_e( 'Career', 'greyd-theme' ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:separator {"align":"center","style":{"spacing":{"margin":{"top":"var:preset|spacing|large","bottom":"var:preset|spacing|large"}}},"backgroundColor":"foreground","className":"is-style-dots"} -->
		<hr class="wp-block-separator aligncenter has-text-color has-foreground-color has-alpha-channel-opacity has-foreground-background-color has-background is-style-dots" style="margin-top:var(--wp--preset--spacing--large);margin-bottom:var(--wp--preset--spacing--large)" />
		<!-- /wp:separator -->
	</div>
	<!-- /wp:group -->

	<!-- wp:media-text {"align":"wide","mediaPosition":"right","mediaType":"image","mediaWidth":35,"verticalAlignment":"center","imageFill":true} -->
	<div class="wp-block-media-text alignwide has-media-on-the-right is-stacked-on-mobile is-vertically-aligned-center is-image-fill" style="grid-template-columns:auto 35%">
		<div class="wp-block-media-text__content">
			<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium"}}},"className":"","layout":{"type":"constrained"}} -->
			<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium)">
				<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"className":"","layout":{"type":"constrained"}} -->
				<div class="wp-block-group">
					<!-- wp:heading {"level":3,"className":""} -->
					<h3 class="wp-block-heading"><?php esc_html_e( 'What we offer', 'greyd-theme' ); ?></h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|dark"}}}},"textColor":"dark","className":"","fontSize":"small"} -->
					<p class="has-dark-color has-text-color has-link-color has-small-font-size"><?php esc_html_e( 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.', 'greyd-theme' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"className":"","layout":{"type":"constrained"}} -->
				<div class="wp-block-group">
					<!-- wp:heading {"level":3,"className":""} -->
					<h3 class="wp-block-heading"><?php esc_html_e( 'What we are looking for', 'greyd-theme' ); ?></h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|dark"}}}},"textColor":"dark","className":"","fontSize":"small"} -->
					<p class="has-dark-color has-text-color has-link-color has-small-font-size"><?php esc_html_e( 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.', 'greyd-theme' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"className":"","layout":{"type":"constrained"}} -->
				<div class="wp-block-group">
					<!-- wp:heading {"level":3,"className":""} -->
					<h3 class="wp-block-heading">
						<?php
						printf( /* translators: The variables refer to the HTML tags for highlighting the "unique" word of the sentence. */
							esc_html__( 'What makes us %1$sunique%2$s', 'greyd-theme' ),
							'<mark class="has-inline-color has-secondary-color has-foreground-background-color">',
							'</mark>'
						);
						?>
					</h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|dark"}}}},"textColor":"dark","className":"","fontSize":"small"} -->
					<p class="has-dark-color has-text-color has-link-color has-small-font-size"><?php esc_html_e( 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.', 'greyd-theme' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:buttons {"align":"","className":"alignleft"} -->
				<div class="wp-block-buttons alignleft">
					<!-- wp:button {"className":"is-style-sec is-style-outline"} -->
					<div class="wp-block-button is-style-sec is-style-outline">
						<a class="wp-block-button__link wp-element-button"><?php esc_html_e( 'Apply Now', 'greyd-theme' ); ?></a>
					</div>
					<!-- /wp:button -->
				</div>
				<!-- /wp:buttons -->
			</div>
			<!-- /wp:group -->
		</div>
		<figure class="wp-block-media-text__media" style="background-image:url(<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/white-and-black-cubes-and-pyramids.webp);background-position:50% 50%">
			<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/white-and-black-cubes-and-pyramids.webp" alt="" />
		</figure>
	</div>
	<!-- /wp:media-text -->
</div>
<!-- /wp:group -->