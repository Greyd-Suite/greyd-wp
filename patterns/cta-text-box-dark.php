<?php
/**
 * Title: Text Box, Dark
 * Slug: greyd-theme/cta-text-box-dark
 * Description:
 * Categories: greyd-cta
 * Keywords:
 * Viewport Width: 600
 * Block Types:
 * Post Types:
 * Inserter: true
 */
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|x-large","left":"var:preset|spacing|large","right":"var:preset|spacing|large"},"blockGap":"var:preset|spacing|large"},"elements":{"link":{"color":{"text":"var:preset|color|lightest"},":hover":{"color":{"text":"var:preset|color|secondary"}}}}},"backgroundColor":"dark","textColor":"base","layout":{"type":"constrained","contentSize":"960px"}} -->
<div class="wp-block-group has-base-color has-dark-background-color has-text-color has-background has-link-color" style="padding-top:var(--wp--preset--spacing--x-large);padding-right:var(--wp--preset--spacing--large);padding-bottom:var(--wp--preset--spacing--x-large);padding-left:var(--wp--preset--spacing--large)">
	<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
	<div class="wp-block-group">
		<!-- wp:group {"style":{"spacing":{"padding":{"top":"4px","bottom":"4px","left":"13px","right":"13px"}},"elements":{"link":{"color":{"text":"var:preset|color|dark"}}},"border":{"radius":"50px"}},"backgroundColor":"background","textColor":"dark","layout":{"type":"default"}} -->
		<div class="wp-block-group has-dark-color has-background-background-color has-text-color has-background has-link-color" style="border-radius:50px;padding-top:4px;padding-right:13px;padding-bottom:4px;padding-left:13px">
			<!-- wp:paragraph {"align":"center","style":{"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"600"}},"fontSize":"small"} -->
			<p class="has-text-align-center has-small-font-size" style="font-style:normal;font-weight:600;text-transform:uppercase"><?php esc_html_e( 'Web for a better world', 'greyd-theme' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"default"}} -->
	<div class="wp-block-group">
		<!-- wp:heading {"textAlign":"center"} -->
		<h2 class="wp-block-heading has-text-align-center"><?php esc_html_e( 'Building Tomorrow\'s Responsibly', 'greyd-theme' ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"align":"center"} -->
		<p class="has-text-align-center"><?php esc_html_e( 'Embrace eco-friendly web design with Greyd. Craft beautiful websites while minimizing environmental impact. We merge cutting-edge tech with sustainable practices, ensuring your digital solutions contribute to a greener planet. Join the movement towards a greener digital future.', 'greyd-theme' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:paragraph {"align":"center"} -->
	<p class="has-text-align-center">
		<a href="https://greyd.io/" target="_blank" rel="noreferrer noopener"><?php esc_html_e( 'Explore Features →', 'greyd-theme' ); ?></a>
	</p>
	<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->