<?php
/**
 * Title: Testimonial, three Boxes
 * Slug: greyd-wp/testimonial-three-boxes
 * Description:
 * Categories: greyd-testimonial
 * Keywords:
 * Viewport Width: 1600
 * Block Types:
 * Post Types:
 * Inserter: true
 */
?>
<!-- wp:group {"metadata":{"name":""},"align":"full","style":{"spacing":{"padding":{"right":"var:preset|spacing|medium","left":"var:preset|spacing|medium","top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|x-large"}}},"className":"","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--x-large);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--x-large);padding-left:var(--wp--preset--spacing--medium)">
	<!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|large"}}},"className":"","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
	<div class="wp-block-group alignwide" style="margin-bottom:var(--wp--preset--spacing--large)">
		<!-- wp:heading {"textAlign":"left","style":{"spacing":{"padding":{"right":"0","left":"0"}}},"className":"","fontSize":"medium"} -->
		<h2 class="wp-block-heading has-text-align-left has-medium-font-size" style="padding-right:0;padding-left:0"><?php esc_html_e( 'Testimonials', 'greyd-wp' ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:buttons {"align":"right","className":""} -->
		<div class="wp-block-buttons">
			<!-- wp:button {"className":"is-style-outline is-style-sec"} -->
			<div class="wp-block-button is-style-outline is-style-sec">
				<a class="wp-block-button__link wp-element-button"><?php esc_html_e( 'Read stories', 'greyd-wp' ); ?></a>
			</div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->
	</div>
	<!-- /wp:group -->

	<!-- wp:columns {"align":"wide","className":""} -->
	<div class="wp-block-columns alignwide">
		<!-- wp:column {"className":""} -->
		<div class="wp-block-column">
			<!-- wp:group {"style":{"spacing":{"blockGap":"0","padding":{"top":"0","bottom":"0","left":"0","right":"0"}},"border":{"radius":"4px"}},"backgroundColor":"lightest","className":"","layout":{"type":"default"}} -->
			<div class="wp-block-group has-lightest-background-color has-background" style="border-radius:4px;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
				<!-- wp:cover {"url":"<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/white-and-black-cubes-and-pyramids.webp","dimRatio":0,"minHeight":200,"minHeightUnit":"px","contentPosition":"top right","isDark":false,"style":{"border":{"radius":{"topLeft":"4px","topRight":"4px"}},"spacing":{"padding":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|small","left":"var:preset|spacing|small","right":"var:preset|spacing|small"}}},"className":""} -->
				<div class="wp-block-cover is-light has-custom-content-position is-position-top-right" style="border-top-left-radius:4px;border-top-right-radius:4px;padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--small);min-height:200px">
					<span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span>
					<img class="wp-block-cover__image-background" alt="" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/white-and-black-cubes-and-pyramids.webp" data-object-fit="cover" />
					<div class="wp-block-cover__inner-container">
						<!-- wp:group {"style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"spacing":{"padding":{"top":"1px","bottom":"1px","left":"6px","right":"6px"}},"border":{"radius":"4px"}},"backgroundColor":"foreground","textColor":"background","className":"","layout":{"type":"flex","flexWrap":"nowrap"},"fontSize":"tiny"} -->
						<div class="wp-block-group has-background-color has-foreground-background-color has-text-color has-background has-link-color has-tiny-font-size" style="border-radius:4px;padding-top:1px;padding-right:6px;padding-bottom:1px;padding-left:6px">
							<!-- wp:paragraph {"className":""} -->
							<p><?php esc_html_e( 'Story', 'greyd-wp' ); ?></p>
							<!-- /wp:paragraph -->
						</div>
						<!-- /wp:group -->
					</div>
				</div>
				<!-- /wp:cover -->

				<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"},"margin":{"top":"0","bottom":"0"},"blockGap":"var:preset|spacing|small"}},"className":"","layout":{"type":"constrained"}} -->
				<div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium)">
					<!-- wp:heading {"textAlign":"left","className":"","fontSize":"base"} -->
					<h2 class="wp-block-heading has-text-align-left has-base-font-size"><?php esc_html_e( 'Roger', 'greyd-wp' ); ?></h2>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|medium"}}},"className":"","fontSize":"small"} -->
					<p class="has-small-font-size" style="margin-bottom:var(--wp--preset--spacing--medium)"><?php esc_html_e( 'Greyd is perfect for anyone who wants to centrally control content and design over any number of websites.', 'greyd-wp' ); ?></p>
					<!-- /wp:paragraph -->

					<!-- wp:buttons {"className":""} -->
					<div class="wp-block-buttons">
						<!-- wp:button {"className":"is-size-small is-style-alternate"} -->
						<div class="wp-block-button is-size-small is-style-alternate">
							<a class="wp-block-button__link wp-element-button"><?php esc_html_e( "Read Roger's story", 'greyd-wp' ); ?></a>
						</div>
						<!-- /wp:button -->
					</div>
					<!-- /wp:buttons -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"className":""} -->
		<div class="wp-block-column">
			<!-- wp:group {"style":{"spacing":{"blockGap":"0","padding":{"top":"0","bottom":"0","left":"0","right":"0"}},"border":{"radius":"4px"}},"backgroundColor":"lightest","className":"","layout":{"type":"default"}} -->
			<div class="wp-block-group has-lightest-background-color has-background" style="border-radius:4px;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
				<!-- wp:cover {"url":"<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/white-cubes-floating.webp","dimRatio":0,"minHeight":200,"minHeightUnit":"px","contentPosition":"top right","isDark":false,"style":{"border":{"radius":{"topLeft":"4px","topRight":"4px"}},"spacing":{"padding":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|small","left":"var:preset|spacing|small","right":"var:preset|spacing|small"}},"color":{}},"className":""} -->
				<div class="wp-block-cover is-light has-custom-content-position is-position-top-right" style="border-top-left-radius:4px;border-top-right-radius:4px;padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--small);min-height:200px">
					<span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span>
					<img class="wp-block-cover__image-background" alt="" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/white-cubes-floating.webp" data-object-fit="cover" />
					<div class="wp-block-cover__inner-container">
						<!-- wp:group {"style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"spacing":{"padding":{"top":"1px","bottom":"1px","left":"6px","right":"6px"}},"border":{"radius":"4px"}},"backgroundColor":"foreground","textColor":"background","className":"","layout":{"type":"flex","flexWrap":"nowrap"},"fontSize":"tiny"} -->
						<div class="wp-block-group has-background-color has-foreground-background-color has-text-color has-background has-link-color has-tiny-font-size" style="border-radius:4px;padding-top:1px;padding-right:6px;padding-bottom:1px;padding-left:6px">
							<!-- wp:paragraph {"className":""} -->
							<p><?php esc_html_e( 'Story', 'greyd-wp' ); ?></p>
							<!-- /wp:paragraph -->
						</div>
						<!-- /wp:group -->
					</div>
				</div>
				<!-- /wp:cover -->

				<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"},"margin":{"top":"0","bottom":"0"},"blockGap":"var:preset|spacing|small"}},"className":"","layout":{"type":"constrained"}} -->
				<div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium)">
					<!-- wp:heading {"textAlign":"left","className":"","fontSize":"base"} -->
					<h2 class="wp-block-heading has-text-align-left has-base-font-size"><?php esc_html_e( 'Nils', 'greyd-wp' ); ?></h2>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|medium"}}},"className":"","fontSize":"small"} -->
					<p class="has-small-font-size" style="margin-bottom:var(--wp--preset--spacing--medium)"><?php esc_html_e( 'Our customer more than doubled their leads in only three months after relaunching their sites with Greyd.', 'greyd-wp' ); ?></p>
					<!-- /wp:paragraph -->

					<!-- wp:buttons {"className":""} -->
					<div class="wp-block-buttons">
						<!-- wp:button {"className":"is-size-small is-style-alternate"} -->
						<div class="wp-block-button is-size-small is-style-alternate">
							<a class="wp-block-button__link wp-element-button"><?php esc_html_e( "Read Nils' story", 'greyd-wp' ); ?></a>
						</div>
						<!-- /wp:button -->
					</div>
					<!-- /wp:buttons -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"className":""} -->
		<div class="wp-block-column">
			<!-- wp:group {"style":{"spacing":{"blockGap":"0","padding":{"top":"0","bottom":"0","left":"0","right":"0"}},"border":{"radius":"4px"}},"backgroundColor":"lightest","className":"","layout":{"type":"default"}} -->
			<div class="wp-block-group has-lightest-background-color has-background" style="border-radius:4px;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
				<!-- wp:cover {"url":"<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/transparent-bubbles-and-white-spheres-floating.webp","dimRatio":0,"minHeight":200,"minHeightUnit":"px","contentPosition":"top right","isDark":false,"style":{"border":{"radius":{"topLeft":"4px","topRight":"4px"}},"spacing":{"padding":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|small","left":"var:preset|spacing|small","right":"var:preset|spacing|small"}}},"className":""} -->
				<div class="wp-block-cover is-light has-custom-content-position is-position-top-right" style="border-top-left-radius:4px;border-top-right-radius:4px;padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--small);min-height:200px">
					<span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span>
					<img class="wp-block-cover__image-background" alt="" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/transparent-bubbles-and-white-spheres-floating.webp" data-object-fit="cover" />
					<div class="wp-block-cover__inner-container">
						<!-- wp:group {"style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"spacing":{"padding":{"top":"1px","bottom":"1px","left":"6px","right":"6px"}},"border":{"radius":"4px"}},"backgroundColor":"foreground","textColor":"background","className":"","layout":{"type":"flex","flexWrap":"nowrap"},"fontSize":"tiny"} -->
						<div class="wp-block-group has-background-color has-foreground-background-color has-text-color has-background has-link-color has-tiny-font-size" style="border-radius:4px;padding-top:1px;padding-right:6px;padding-bottom:1px;padding-left:6px">
							<!-- wp:paragraph {"className":""} -->
							<p><?php esc_html_e( 'Story', 'greyd-wp' ); ?></p>
							<!-- /wp:paragraph -->
						</div>
						<!-- /wp:group -->
					</div>
				</div>
				<!-- /wp:cover -->

				<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"},"margin":{"top":"0","bottom":"0"},"blockGap":"var:preset|spacing|small"}},"className":"","layout":{"type":"constrained"}} -->
				<div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium)">
					<!-- wp:heading {"textAlign":"left","className":"","fontSize":"base"} -->
					<h2 class="wp-block-heading has-text-align-left has-base-font-size"><?php esc_html_e( 'Kurt', 'greyd-wp' ); ?></h2>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|medium"}}},"className":"","fontSize":"small"} -->
					<p class="has-small-font-size" style="margin-bottom:var(--wp--preset--spacing--medium)"><?php esc_html_e( 'Greyd is THE tool for me because I can automate a lot of things and speed up work steps.', 'greyd-wp' ); ?></p>
					<!-- /wp:paragraph -->

					<!-- wp:buttons {"className":""} -->
					<div class="wp-block-buttons">
						<!-- wp:button {"className":"is-size-small is-style-alternate"} -->
						<div class="wp-block-button is-size-small is-style-alternate">
							<a class="wp-block-button__link wp-element-button"><?php esc_html_e( "Read Kurt's story", 'greyd-wp' ); ?></a>
						</div>
						<!-- /wp:button -->
					</div>
					<!-- /wp:buttons -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->