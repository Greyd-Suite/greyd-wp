<?php
/**
 * Title: Three Pricing columns, middle highlighted
 * Slug: greyd-wp/pricing-three-columns-middle-highlighted
 * Description:
 * Categories: greyd-pricing
 * Keywords:
 * Viewport Width: 1600
 * Block Types:
 * Post Types:
 * Inserter: true
 */
?>
<!-- wp:columns {"verticalAlignment":"bottom","align":"wide","className":""} -->
<div class="wp-block-columns alignwide are-vertically-aligned-bottom">
	<!-- wp:column {"verticalAlignment":"bottom","className":""} -->
	<div class="wp-block-column is-vertically-aligned-bottom">
		<!-- wp:group {"style":{"border":{"radius":"4px"},"elements":{"link":{"color":{"text":"var:preset|color|foreground"}}}},"backgroundColor":"lightest","textColor":"foreground","className":"","layout":{"type":"default"}} -->
		<div class="wp-block-group has-foreground-color has-lightest-background-color has-text-color has-background has-link-color" style="border-radius:4px">
			<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small","padding":{"bottom":"var:preset|spacing|medium"}},"border":{"bottom":{"color":"var:preset|color|foreground","style":"dotted","width":"1px"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
			<div class="wp-block-group" style="border-bottom-color:var(--wp--preset--color--foreground);border-bottom-style:dotted;border-bottom-width:1px;padding-bottom:var(--wp--preset--spacing--medium)">
				<!-- wp:heading {"level":3,"className":"","fontSize":"medium"} -->
				<h3 class="wp-block-heading has-medium-font-size"><?php esc_html_e( 'Monthly', 'greyd-wp' ); ?></h3>
				<!-- /wp:heading -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"constrained","contentSize":"270px","justifyContent":"left"}} -->
			<div class="wp-block-group">
				<!-- wp:paragraph {"style":{"typography":{"lineHeight":"1.5"}},"className":"","fontSize":"normal"} -->
				<p class="has-normal-font-size" style="line-height:1.5"><?php esc_html_e( 'Gives you the most freedom. Perfect if you want to try us out', 'greyd-wp' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"className":"","fontSize":"x-large"} -->
				<p class="has-x-large-font-size">
					<strong><?php esc_html_e( '$5,99', 'greyd-wp' ); ?></strong> <sub><?php esc_html_e( '/mo.', 'greyd-wp' ); ?></sub>
				</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:buttons {"align":"full","className":"","layout":{"type":"flex","justifyContent":"center","orientation":"horizontal"}} -->
			<div class="wp-block-buttons alignfull">
				<!-- wp:button {"style":{"border":{"radius":0}},"className":"has-custom-width wp-block-button__width-100 is-style-outline"} -->
				<div class="wp-block-button has-custom-width wp-block-button__width-100 is-style-outline">
					<a class="wp-block-button__link no-border-radius wp-element-button"><?php esc_html_e( 'Choose Monthly →', 'greyd-wp' ); ?></a>
				</div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->

			<!-- wp:paragraph {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|small"}}},"className":""} -->
			<p style="margin-bottom:var(--wp--preset--spacing--small)"><strong><?php esc_html_e( "What's included", 'greyd-wp' ); ?></strong></p>
			<!-- /wp:paragraph -->

			<!-- wp:list {"style":{"spacing":{"margin":{"top":"0","left":"0","right":"0","bottom":"0"}}},"className":""} -->
			<ul style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0">
				<!-- wp:list-item -->
				<li><?php esc_html_e( 'Unlimited requests', 'greyd-wp' ); ?></li>
				<!-- /wp:list-item -->

				<!-- wp:list-item -->
				<li><?php esc_html_e( 'Unlimited brands', 'greyd-wp' ); ?></li>
				<!-- /wp:list-item -->

				<!-- wp:list-item {"className":""} -->
				<li><?php esc_html_e( 'Pause or cancel anytime', 'greyd-wp' ); ?></li>
				<!-- /wp:list-item -->
			</ul>
			<!-- /wp:list -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:column -->

	<!-- wp:column {"verticalAlignment":"bottom","className":""} -->
	<div class="wp-block-column is-vertically-aligned-bottom">
		<!-- wp:group {"style":{"spacing":{"padding":{"top":"2px","bottom":"2px","left":"2px","right":"2px"},"blockGap":"0"},"border":{"radius":"8px"},"elements":{"link":{"color":{"text":"var:preset|color|background"}}}},"backgroundColor":"foreground","textColor":"background","className":"","layout":{"type":"default"}} -->
		<div class="wp-block-group has-background-color has-foreground-background-color has-text-color has-background has-link-color" style="border-radius:8px;padding-top:2px;padding-right:2px;padding-bottom:2px;padding-left:2px">
			<!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|small"}},"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"600","letterSpacing":"2px"},"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}}},"textColor":"secondary","className":"","fontSize":"tiny"} -->
			<p class="has-text-align-center has-secondary-color has-text-color has-link-color has-tiny-font-size" style="margin-top:var(--wp--preset--spacing--small);margin-bottom:var(--wp--preset--spacing--small);font-style:normal;font-weight:600;letter-spacing:2px;text-transform:uppercase"><?php esc_html_e( 'Most Popular', 'greyd-wp' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:group {"style":{"border":{"radius":{"topLeft":"0px","topRight":"0px","bottomLeft":"4px","bottomRight":"4px"}},"elements":{"link":{"color":{"text":"var:preset|color|foreground"}}}},"backgroundColor":"lightest","textColor":"foreground","className":"","layout":{"type":"default"}} -->
			<div class="wp-block-group has-foreground-color has-lightest-background-color has-text-color has-background has-link-color" style="border-top-left-radius:0px;border-top-right-radius:0px;border-bottom-left-radius:4px;border-bottom-right-radius:4px">
				<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small","padding":{"bottom":"var:preset|spacing|medium"}},"border":{"bottom":{"color":"var:preset|color|foreground","style":"dotted","width":"1px"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
				<div class="wp-block-group" style="border-bottom-color:var(--wp--preset--color--foreground);border-bottom-style:dotted;border-bottom-width:1px;padding-bottom:var(--wp--preset--spacing--medium)">
					<!-- wp:heading {"level":3,"className":"","fontSize":"large"} -->
					<h3 class="wp-block-heading has-large-font-size"><strong><?php esc_html_e( 'Quarterly', 'greyd-wp' ); ?></strong></h3>
					<!-- /wp:heading -->
				</div>
				<!-- /wp:group -->

				<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"constrained","justifyContent":"left","contentSize":"300px"}} -->
				<div class="wp-block-group">
					<!-- wp:paragraph {"style":{"typography":{"lineHeight":"1.5"}},"className":"","fontSize":"normal"} -->
					<p class="has-normal-font-size" style="line-height:1.5"><?php esc_html_e( 'For companies of all sizes, who know what they need.', 'greyd-wp' ); ?></p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"className":"","fontSize":"x-large"} -->
					<p class="has-x-large-font-size">
						<strong><?php esc_html_e( '$5,49', 'greyd-wp' ); ?></strong> <sub><?php esc_html_e( '/mo.', 'greyd-wp' ); ?></sub>
					</p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:buttons {"align":"full","className":"","layout":{"type":"flex","justifyContent":"center","orientation":"horizontal"}} -->
				<div class="wp-block-buttons alignfull">
					<!-- wp:button {"style":{"border":{"radius":0}},"className":"has-custom-width wp-block-button__width-100 is-style-fill"} -->
					<div class="wp-block-button has-custom-width wp-block-button__width-100 is-style-fill">
						<a class="wp-block-button__link no-border-radius wp-element-button"><?php esc_html_e( 'Choose Quarterly →', 'greyd-wp' ); ?></a>
					</div>
					<!-- /wp:button -->
				</div>
				<!-- /wp:buttons -->

				<!-- wp:paragraph {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|small"}}},"className":""} -->
				<p style="margin-bottom:var(--wp--preset--spacing--small)"><strong><?php esc_html_e( "What's included", 'greyd-wp' ); ?></strong></p>
				<!-- /wp:paragraph -->

				<!-- wp:list {"style":{"spacing":{"margin":{"top":"0","left":"0","right":"0","bottom":"0"}}},"className":""} -->
				<ul style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0">
					<!-- wp:list-item -->
					<li><?php esc_html_e( 'Unlimited requests', 'greyd-wp' ); ?></li>
					<!-- /wp:list-item -->

					<!-- wp:list-item -->
					<li><?php esc_html_e( 'Unlimited brands', 'greyd-wp' ); ?></li>
					<!-- /wp:list-item -->

					<!-- wp:list-item {"className":""} -->
					<li><?php esc_html_e( 'Pause or cancel anytime', 'greyd-wp' ); ?></li>
					<!-- /wp:list-item -->
				</ul>
				<!-- /wp:list -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:column -->

	<!-- wp:column {"verticalAlignment":"bottom","className":""} -->
	<div class="wp-block-column is-vertically-aligned-bottom">
		<!-- wp:group {"style":{"border":{"radius":"4px"},"elements":{"link":{"color":{"text":"var:preset|color|foreground"}}}},"backgroundColor":"lightest","textColor":"foreground","className":"","layout":{"type":"default"}} -->
		<div class="wp-block-group has-foreground-color has-lightest-background-color has-text-color has-background has-link-color" style="border-radius:4px">
			<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small","padding":{"bottom":"var:preset|spacing|medium"}},"border":{"bottom":{"color":"var:preset|color|foreground","style":"dotted","width":"1px"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
			<div class="wp-block-group" style="border-bottom-color:var(--wp--preset--color--foreground);border-bottom-style:dotted;border-bottom-width:1px;padding-bottom:var(--wp--preset--spacing--medium)">
				<!-- wp:heading {"level":3,"className":"","fontSize":"medium"} -->
				<h3 class="wp-block-heading has-medium-font-size"><?php esc_html_e( 'Yearly', 'greyd-wp' ); ?></h3>
				<!-- /wp:heading -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"constrained","contentSize":"270px","justifyContent":"left"}} -->
			<div class="wp-block-group">
				<!-- wp:paragraph {"style":{"typography":{"lineHeight":"1.5"}},"className":"","fontSize":"normal"} -->
				<p class="has-normal-font-size" style="line-height:1.5"><?php esc_html_e( 'The most cost-effective option. For a long-term relationship.', 'greyd-wp' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"className":"","fontSize":"x-large"} -->
				<p class="has-x-large-font-size">
					<strong><?php esc_html_e( '$4,99', 'greyd-wp' ); ?></strong> <sub><?php esc_html_e( '/mo.', 'greyd-wp' ); ?></sub>
				</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:buttons {"align":"full","className":"","layout":{"type":"flex","justifyContent":"center","orientation":"horizontal"}} -->
			<div class="wp-block-buttons alignfull">
				<!-- wp:button {"style":{"border":{"radius":0}},"className":"has-custom-width wp-block-button__width-100 is-style-outline"} -->
				<div class="wp-block-button has-custom-width wp-block-button__width-100 is-style-outline">
					<a class="wp-block-button__link no-border-radius wp-element-button"><?php esc_html_e( 'Choose Yearly →', 'greyd-wp' ); ?></a>
				</div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->

			<!-- wp:paragraph {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|small"}}},"className":""} -->
			<p style="margin-bottom:var(--wp--preset--spacing--small)"><strong><?php esc_html_e( "What's included", 'greyd-wp' ); ?></strong></p>
			<!-- /wp:paragraph -->

			<!-- wp:list {"style":{"spacing":{"margin":{"top":"0","left":"0","right":"0","bottom":"0"}}},"className":""} -->
			<ul style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0">
				<!-- wp:list-item -->
				<li><?php esc_html_e( 'Unlimited requests', 'greyd-wp' ); ?></li>
				<!-- /wp:list-item -->

				<!-- wp:list-item -->
				<li><?php esc_html_e( 'Unlimited brands', 'greyd-wp' ); ?></li>
				<!-- /wp:list-item -->

				<!-- wp:list-item {"className":""} -->
				<li><?php esc_html_e( 'Pause or cancel anytime', 'greyd-wp' ); ?></li>
				<!-- /wp:list-item -->
			</ul>
			<!-- /wp:list -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:column -->
</div>
<!-- /wp:columns -->