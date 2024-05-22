<?php
/**
 * Title: Three Pricing columns, with group below
 * Slug: greyd-wp/pricing-three-columns
 * Description:
 * Categories: greyd-pricing
 * Keywords:
 * Viewport Width: 1600
 * Block Types:
 * Post Types:
 * Inserter: true
 */
?>
<!-- wp:columns {"verticalAlignment":null,"align":"wide","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|small"}}},"className":""} -->
<div class="wp-block-columns alignwide" style="margin-bottom:var(--wp--preset--spacing--small)">
	<!-- wp:column {"verticalAlignment":"stretch","backgroundColor":"base","className":""} -->
	<div class="wp-block-column is-vertically-aligned-stretch has-base-background-color has-background">
		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|medium"},"dimensions":{"minHeight":"480px"}},"className":"","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","verticalAlignment":"space-between"}} -->
		<div class="wp-block-group" style="min-height:480px">
			<!-- wp:group {"style":{"spacing":{"padding":{"right":"0","left":"0"},"blockGap":"var:preset|spacing|small"}},"layout":{"type":"default"}} -->
			<div class="wp-block-group" style="padding-right:0;padding-left:0">
				<!-- wp:heading {"style":{"spacing":{"margin":{"top":"0"}}},"className":"","fontSize":"medium"} -->
				<h2 class="wp-block-heading has-medium-font-size" style="margin-top:0"><?php esc_html_e( 'Monthly', 'greyd-wp' ); ?></h2>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"style":{"typography":{"lineHeight":"1.5"}},"className":"","fontSize":"normal"} -->
				<p class="has-normal-font-size" style="line-height:1.5"><?php esc_html_e( 'Gives you the most freedom. Perfect if you want to try us out. For a short trip.', 'greyd-wp' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:paragraph {"className":"","fontSize":"x-large"} -->
			<p class="has-x-large-font-size"><?php esc_html_e( '$8.99 / mo.', 'greyd-wp' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons {"align":"full","className":"","layout":{"type":"flex","justifyContent":"center","orientation":"horizontal"}} -->
			<div class="wp-block-buttons alignfull">
				<!-- wp:button {"style":{"border":{"radius":0}},"className":"has-custom-width wp-block-button__width-100 is-style-outline"} -->
				<div class="wp-block-button has-custom-width wp-block-button__width-100 is-style-outline">
					<a class="wp-block-button__link no-border-radius wp-element-button"><?php esc_html_e( 'Choose Monthly →', 'greyd-wp' ); ?></a>
				</div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->

			<!-- wp:group {"layout":{"type":"default"}} -->
			<div class="wp-block-group">
				<!-- wp:paragraph {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|small"}}},"className":""} -->
				<p style="margin-bottom:var(--wp--preset--spacing--small)"><strong><?php esc_html_e( "What's included", 'greyd-wp' ); ?></strong></p>
				<!-- /wp:paragraph -->

				<!-- wp:list {"style":{"spacing":{"margin":{"top":"0","left":"0","right":"0","bottom":"0"}}},"className":""} -->
				<ul style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0">
					<!-- wp:list-item {"className":""} -->
					<li><?php esc_html_e( 'Unlimited requests', 'greyd-wp' ); ?></li>
					<!-- /wp:list-item -->

					<!-- wp:list-item {"className":""} -->
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

	<!-- wp:column {"verticalAlignment":"stretch","backgroundColor":"base","className":""} -->
	<div class="wp-block-column is-vertically-aligned-stretch has-base-background-color has-background">
		<!-- wp:group {"align":"full","style":{"dimensions":{"minHeight":"480px"}},"className":"","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","verticalAlignment":"space-between"}} -->
		<div class="wp-block-group alignfull" style="min-height:480px">
			<!-- wp:group {"style":{"spacing":{"padding":{"right":"0","left":"0"},"blockGap":"var:preset|spacing|small"}},"layout":{"type":"default"}} -->
			<div class="wp-block-group" style="padding-right:0;padding-left:0">
				<!-- wp:heading {"style":{"spacing":{"margin":{"top":"0"}}},"className":"","fontSize":"medium"} -->
				<h2 class="wp-block-heading has-medium-font-size" style="margin-top:0"><?php esc_html_e( 'Quarterly', 'greyd-wp' ); ?></h2>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"style":{"typography":{"lineHeight":"1.5"}},"className":"","fontSize":"normal"} -->
				<p class="has-normal-font-size" style="line-height:1.5"><?php esc_html_e( 'For companies of all sizes, who know what they need. For a casual relationship.', 'greyd-wp' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:paragraph {"className":"","fontSize":"x-large"} -->
			<p class="has-x-large-font-size"><?php esc_html_e( '$6.49 / mo.', 'greyd-wp' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons {"align":"full","className":"","layout":{"type":"flex","justifyContent":"center","orientation":"horizontal"}} -->
			<div class="wp-block-buttons alignfull">
				<!-- wp:button {"style":{"border":{"radius":0}},"className":"has-custom-width wp-block-button__width-100 is-style-outline"} -->
				<div class="wp-block-button has-custom-width wp-block-button__width-100 is-style-outline">
					<a class="wp-block-button__link no-border-radius wp-element-button"><?php esc_html_e( 'Choose Quarterly →', 'greyd-wp' ); ?></a>
				</div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->

			<!-- wp:group {"layout":{"type":"default"}} -->
			<div class="wp-block-group">
				<!-- wp:paragraph {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|small"}}},"className":""} -->
				<p style="margin-bottom:var(--wp--preset--spacing--small)"><strong><?php esc_html_e( "What's included", 'greyd-wp' ); ?></strong></p>
				<!-- /wp:paragraph -->

				<!-- wp:list {"style":{"spacing":{"margin":{"top":"0","left":"0","right":"0","bottom":"0"}}},"className":""} -->
				<ul style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0">
					<!-- wp:list-item {"className":""} -->
					<li><?php esc_html_e( 'Unlimited requests', 'greyd-wp' ); ?></li>
					<!-- /wp:list-item -->

					<!-- wp:list-item {"className":""} -->
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

	<!-- wp:column {"verticalAlignment":"stretch","style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}}},"backgroundColor":"foreground","textColor":"background","className":""} -->
	<div class="wp-block-column is-vertically-aligned-stretch has-background-color has-foreground-background-color has-text-color has-background has-link-color">
		<!-- wp:group {"align":"full","style":{"dimensions":{"minHeight":"480px"}},"className":"","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","verticalAlignment":"space-between"}} -->
		<div class="wp-block-group alignfull" style="min-height:480px">
			<!-- wp:group {"style":{"dimensions":{"minHeight":"3px"},"spacing":{"padding":{"right":"0","left":"0"},"blockGap":"var:preset|spacing|small"}},"layout":{"type":"default"}} -->
			<div class="wp-block-group" style="min-height:3px;padding-right:0;padding-left:0">
				<!-- wp:heading {"style":{"spacing":{"margin":{"top":"0"}}},"className":"","fontSize":"medium"} -->
				<h2 class="wp-block-heading has-medium-font-size" style="margin-top:0"><?php esc_html_e( 'Yearly', 'greyd-wp' ); ?></h2>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"className":"","fontSize":"normal"} -->
				<p class="has-normal-font-size"><?php esc_html_e( 'The most cost-effective option. For a long-term relationship ❤️', 'greyd-wp' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:paragraph {"className":"","fontSize":"x-large"} -->
			<p class="has-x-large-font-size"><?php esc_html_e( '$4.99 / mo.', 'greyd-wp' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons {"align":"full","className":"","layout":{"type":"flex","justifyContent":"center","orientation":"horizontal"}} -->
			<div class="wp-block-buttons alignfull">
				<!-- wp:button {"style":{"border":{"radius":0}},"className":"has-custom-width wp-block-button__width-100 is-style-fill"} -->
				<div class="wp-block-button has-custom-width wp-block-button__width-100 is-style-fill">
					<a class="wp-block-button__link no-border-radius wp-element-button"><?php esc_html_e( 'Choose Yearly →', 'greyd-wp' ); ?></a>
				</div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->

			<!-- wp:group {"layout":{"type":"default"}} -->
			<div class="wp-block-group">
				<!-- wp:paragraph {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|small"}}},"className":""} -->
				<p style="margin-bottom:var(--wp--preset--spacing--small)"><strong><?php esc_html_e( "What's included", 'greyd-wp' ); ?></strong></p>
				<!-- /wp:paragraph -->

				<!-- wp:list {"style":{"spacing":{"margin":{"top":"0","left":"0","right":"0","bottom":"0"}}},"className":""} -->
				<ul style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0">
					<!-- wp:list-item {"className":""} -->
					<li><?php esc_html_e( 'Unlimited requests', 'greyd-wp' ); ?></li>
					<!-- /wp:list-item -->

					<!-- wp:list-item {"className":""} -->
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
</div>
<!-- /wp:columns -->

<!-- wp:group {"align":"full","style":{"border":{"radius":"4px"}},"backgroundColor":"lightest","className":"","layout":{"type":"default"}} -->
<div class="wp-block-group alignfull has-lightest-background-color has-background" style="border-radius:4px">
	<!-- wp:group {"align":"full","style":{"spacing":{"blockGap":"var:preset|spacing|large"}},"className":"","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between","verticalAlignment":"top"}} -->
	<div class="wp-block-group alignfull">
		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"className":"","layout":{"type":"default"}} -->
		<div class="wp-block-group">
			<!-- wp:heading {"style":{"spacing":{"margin":{"top":"0"}}},"className":"","fontSize":"medium"} -->
			<h2 class="wp-block-heading has-medium-font-size" style="margin-top:0"><?php esc_html_e( 'Are you interested in a custom price plan?', 'greyd-wp' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"className":"","fontSize":"normal"} -->
			<p class="has-normal-font-size"><?php esc_html_e( "If your project doesn't fit in the above plans, or if you'd like to discuss before making up your mind, book a call with us.", 'greyd-wp' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:buttons {"align":"full","className":"","layout":{"type":"flex","justifyContent":"center","orientation":"horizontal"}} -->
		<div class="wp-block-buttons alignfull">
			<!-- wp:button {"style":{"border":{"radius":0}},"className":"is-style-outline"} -->
			<div class="wp-block-button is-style-outline">
				<a class="wp-block-button__link no-border-radius wp-element-button"><?php esc_html_e( 'Call Us', 'greyd-wp' ); ?></a>
			</div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->