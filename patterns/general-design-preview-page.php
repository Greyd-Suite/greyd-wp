<?php
/**
 * Title: Design Preview Page
 * Slug: greyd-theme/general-design-preview-page
 * Description:
 * Categories: greyd-general
 * Keywords:
 * Viewport Width: 1600
 * Block Types:
 * Post Types:
 * Inserter: true
 */
?>
<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|x-large"}}},"className":"","layout":{"type":"constrained","justifyContent":"center"}} -->
<div class="wp-block-group alignwide" style="padding-top:var(--wp--preset--spacing--x-large);padding-bottom:var(--wp--preset--spacing--x-large)">
	<!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|x-large"}}},"layout":{"type":"default"}} -->
	<div class="wp-block-group alignwide" style="margin-bottom:var(--wp--preset--spacing--x-large)">
		<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"constrained","justifyContent":"left"}} -->
		<div class="wp-block-group alignwide">
			<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"}}}},"textColor":"primary","fontSize":"small"} -->
			<p class="has-primary-color has-text-color has-link-color has-small-font-size"><strong><?php esc_html_e( 'Greyd Theme', 'greyd-theme' ); ?></strong></p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"className":""} -->
			<h2 class="wp-block-heading"><?php esc_html_e( 'Style Guide', 'greyd-theme' ); ?></h2>
			<!-- /wp:heading -->
		</div>
		<!-- /wp:group -->

		<!-- wp:paragraph -->
		<p><?php esc_html_e( 'Build and share your design viewing all affected elements.', 'greyd-theme' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|small","margin":{"bottom":"var:preset|spacing|x-large"}}},"layout":{"type":"constrained","justifyContent":"left"}} -->
	<div class="wp-block-group alignwide" style="margin-bottom:var(--wp--preset--spacing--x-large)">
		<!-- wp:group {"align":"wide","style":{"border":{"bottom":{"color":"var:preset|color|foreground","width":"1px","style":"dotted"},"top":{},"right":{},"left":{}},"spacing":{"padding":{"bottom":"var:preset|spacing|small"},"margin":{"bottom":"var:preset|spacing|medium"}}},"layout":{"type":"default"}} -->
		<div class="wp-block-group alignwide" style="border-bottom-color:var(--wp--preset--color--foreground);border-bottom-style:dotted;border-bottom-width:1px;margin-bottom:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--small)">
			<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"700"}}} -->
			<p style="font-style:normal;font-weight:700"><?php esc_html_e( 'Colors', 'greyd-theme' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:columns {"align":"wide","style":{"spacing":{"padding":{"bottom":"var:preset|spacing|x-large"}},"typography":{"fontStyle":"normal","fontWeight":"700"}},"className":"","fontSize":"small"} -->
		<div class="wp-block-columns alignwide has-small-font-size" style="padding-bottom:var(--wp--preset--spacing--x-large);font-style:normal;font-weight:700">
			<!-- wp:column {"width":"","className":""} -->
			<div class="wp-block-column">
				<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"constrained"}} -->
				<div class="wp-block-group">
					<!-- wp:group {"style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"}}},"backgroundColor":"primary"} -->
					<div class="wp-block-group has-primary-background-color has-background" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
						<!-- wp:spacer {"height":"216px"} -->
						<div style="height:216px" aria-hidden="true" class="wp-block-spacer"></div>
						<!-- /wp:spacer -->
					</div>
					<!-- /wp:group -->

					<!-- wp:paragraph {"align":"center"} -->
					<p class="has-text-align-center"><?php esc_html_e( 'Primary Color', 'greyd-theme' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column {"width":"","className":""} -->
			<div class="wp-block-column">
				<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"constrained"}} -->
				<div class="wp-block-group">
					<!-- wp:group {"style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"}}},"backgroundColor":"secondary"} -->
					<div class="wp-block-group has-secondary-background-color has-background" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
						<!-- wp:spacer {"height":"216px"} -->
						<div style="height:216px" aria-hidden="true" class="wp-block-spacer"></div>
						<!-- /wp:spacer -->
					</div>
					<!-- /wp:group -->

					<!-- wp:paragraph {"align":"center"} -->
					<p class="has-text-align-center"><?php esc_html_e( 'Secondary Color', 'greyd-theme' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column {"width":"","className":""} -->
			<div class="wp-block-column">
				<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"constrained"}} -->
				<div class="wp-block-group">
					<!-- wp:group {"style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"}}},"backgroundColor":"tertiary"} -->
					<div class="wp-block-group has-tertiary-background-color has-background" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
						<!-- wp:spacer {"height":"216px"} -->
						<div style="height:216px" aria-hidden="true" class="wp-block-spacer"></div>
						<!-- /wp:spacer -->
					</div>
					<!-- /wp:group -->

					<!-- wp:paragraph {"align":"center"} -->
					<p class="has-text-align-center"><?php esc_html_e( 'Tertiary Color', 'greyd-theme' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->
		</div>
		<!-- /wp:columns -->

		<!-- wp:columns {"align":"wide","style":{"spacing":{"padding":{"bottom":"var:preset|spacing|x-large"}},"typography":{"fontStyle":"normal","fontWeight":"700"}},"className":"","fontSize":"small"} -->
		<div class="wp-block-columns alignwide has-small-font-size" style="padding-bottom:var(--wp--preset--spacing--x-large);font-style:normal;font-weight:700">
			<!-- wp:column {"width":"","className":""} -->
			<div class="wp-block-column">
				<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"constrained"}} -->
				<div class="wp-block-group">
					<!-- wp:group {"style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"}}},"backgroundColor":"foreground"} -->
					<div class="wp-block-group has-foreground-background-color has-background" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
						<!-- wp:spacer -->
						<div style="height:100px" aria-hidden="true" class="wp-block-spacer"></div>
						<!-- /wp:spacer -->
					</div>
					<!-- /wp:group -->

					<!-- wp:paragraph {"align":"center"} -->
					<p class="has-text-align-center"><?php esc_html_e( 'Very Dark', 'greyd-theme' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column {"width":"","className":""} -->
			<div class="wp-block-column">
				<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"constrained"}} -->
				<div class="wp-block-group">
					<!-- wp:group {"style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"}}},"backgroundColor":"dark"} -->
					<div class="wp-block-group has-dark-background-color has-background" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
						<!-- wp:spacer -->
						<div style="height:100px" aria-hidden="true" class="wp-block-spacer"></div>
						<!-- /wp:spacer -->
					</div>
					<!-- /wp:group -->

					<!-- wp:paragraph {"align":"center"} -->
					<p class="has-text-align-center"><?php esc_html_e( 'Dark', 'greyd-theme' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column {"width":"","className":""} -->
			<div class="wp-block-column">
				<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"constrained"}} -->
				<div class="wp-block-group">
					<!-- wp:group {"style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"}}},"backgroundColor":"mediumdark"} -->
					<div class="wp-block-group has-mediumdark-background-color has-background" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
						<!-- wp:spacer -->
						<div style="height:100px" aria-hidden="true" class="wp-block-spacer"></div>
						<!-- /wp:spacer -->
					</div>
					<!-- /wp:group -->

					<!-- wp:paragraph {"align":"center"} -->
					<p class="has-text-align-center"><?php esc_html_e( 'Medium Dark', 'greyd-theme' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column {"width":"","className":""} -->
			<div class="wp-block-column">
				<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"constrained"}} -->
				<div class="wp-block-group">
					<!-- wp:group {"style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"}}},"backgroundColor":"mediumlight"} -->
					<div class="wp-block-group has-mediumlight-background-color has-background" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
						<!-- wp:spacer -->
						<div style="height:100px" aria-hidden="true" class="wp-block-spacer"></div>
						<!-- /wp:spacer -->
					</div>
					<!-- /wp:group -->

					<!-- wp:paragraph {"align":"center"} -->
					<p class="has-text-align-center"><?php esc_html_e( 'Medium Light', 'greyd-theme' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column {"width":"","className":""} -->
			<div class="wp-block-column">
				<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"constrained"}} -->
				<div class="wp-block-group">
					<!-- wp:group {"style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"}}},"backgroundColor":"base"} -->
					<div class="wp-block-group has-base-background-color has-background" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
						<!-- wp:spacer -->
						<div style="height:100px" aria-hidden="true" class="wp-block-spacer"></div>
						<!-- /wp:spacer -->
					</div>
					<!-- /wp:group -->

					<!-- wp:paragraph {"align":"center"} -->
					<p class="has-text-align-center"><?php esc_html_e( 'Light', 'greyd-theme' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column {"width":"","className":""} -->
			<div class="wp-block-column">
				<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"constrained"}} -->
				<div class="wp-block-group">
					<!-- wp:group {"style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"}},"border":{"width":"0px","style":"none"}},"backgroundColor":"background"} -->
					<div class="wp-block-group has-background-background-color has-background" style="border-style:none;border-width:0px;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
						<!-- wp:spacer -->
						<div style="height:100px" aria-hidden="true" class="wp-block-spacer"></div>
						<!-- /wp:spacer -->
					</div>
					<!-- /wp:group -->

					<!-- wp:paragraph {"align":"center"} -->
					<p class="has-text-align-center"><?php esc_html_e( 'Very Light', 'greyd-theme' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->
		</div>
		<!-- /wp:columns -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|x-large"}}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignwide" style="margin-bottom:var(--wp--preset--spacing--x-large)">
		<!-- wp:group {"align":"wide","style":{"border":{"bottom":{"color":"var:preset|color|foreground","width":"1px","style":"dotted"},"top":{},"right":{},"left":{}},"spacing":{"padding":{"bottom":"var:preset|spacing|small"},"margin":{"bottom":"var:preset|spacing|medium"}}},"layout":{"type":"default"}} -->
		<div class="wp-block-group alignwide" style="border-bottom-color:var(--wp--preset--color--foreground);border-bottom-style:dotted;border-bottom-width:1px;margin-bottom:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--small)">
			<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"700"}}} -->
			<p style="font-style:normal;font-weight:700"><?php esc_html_e( 'Typography', 'greyd-theme' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:columns {"align":"wide","style":{"spacing":{"padding":{"bottom":"var:preset|spacing|x-large"},"blockGap":{"top":"var:preset|spacing|x-large"}}},"className":""} -->
		<div class="wp-block-columns alignwide" style="padding-bottom:var(--wp--preset--spacing--x-large)">
			<!-- wp:column {"width":"50%","className":""} -->
			<div class="wp-block-column" style="flex-basis:50%">
				<!-- wp:group {"style":{"border":{"bottom":{"style":"none","width":"0px"}},"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"constrained"}} -->
				<div class="wp-block-group" style="border-bottom-style:none;border-bottom-width:0px">
					<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"700"}},"fontSize":"tiny"} -->
					<p class="has-tiny-font-size" style="font-style:normal;font-weight:700"><?php esc_html_e( 'Heading Font &amp; Sizes', 'greyd-theme' ); ?></p>
					<!-- /wp:paragraph -->

					<!-- wp:group {"layout":{"type":"flex","orientation":"vertical"}} -->
					<div class="wp-block-group">
						<!-- wp:heading {"level":1,"style":{"spacing":{"margin":{"top":"0"}}}} -->
						<h1 class="wp-block-heading" style="margin-top:0"><?php esc_html_e( 'Headline 1', 'greyd-theme' ); ?></h1>
						<!-- /wp:heading -->

						<!-- wp:heading -->
						<h2 class="wp-block-heading"><?php esc_html_e( 'Headline 2', 'greyd-theme' ); ?></h2>
						<!-- /wp:heading -->

						<!-- wp:heading {"level":3} -->
						<h3 class="wp-block-heading"><?php esc_html_e( 'Headline 3', 'greyd-theme' ); ?></h3>
						<!-- /wp:heading -->

						<!-- wp:heading {"level":4} -->
						<h4 class="wp-block-heading"><?php esc_html_e( 'Headline 4', 'greyd-theme' ); ?></h4>
						<!-- /wp:heading -->

						<!-- wp:heading {"level":5} -->
						<h5 class="wp-block-heading"><?php esc_html_e( 'Headline 5', 'greyd-theme' ); ?></h5>
						<!-- /wp:heading -->

						<!-- wp:heading {"level":6} -->
						<h6 class="wp-block-heading"><?php esc_html_e( 'Headline 6', 'greyd-theme' ); ?></h6>
						<!-- /wp:heading -->
					</div>
					<!-- /wp:group -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column {"width":"50%","className":""} -->
			<div class="wp-block-column" style="flex-basis:50%">
				<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"constrained"}} -->
				<div class="wp-block-group">
					<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"700"}},"fontSize":"tiny"} -->
					<p class="has-tiny-font-size" style="font-style:normal;font-weight:700"><?php esc_html_e( 'Body Font &amp; Default Size', 'greyd-theme' ); ?></p>
					<!-- /wp:paragraph -->

					<!-- wp:group {"layout":{"type":"constrained"}} -->
					<div class="wp-block-group">
						<!-- wp:paragraph -->
						<p><?php esc_html_e( 'abcdefghijklmnopqrstuvwxyz1234567890', 'greyd-theme' ); ?><br><?php esc_html_e( 'ABCDEFGHIJKLMNOPQRSTUVWXYZ', 'greyd-theme' ); ?></p>
						<!-- /wp:paragraph -->

						<!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"className":"gapless-group","layout":{"type":"flex","orientation":"vertical"}} -->
						<div class="wp-block-group gapless-group">
							<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"100"}}} -->
							<p style="font-style:normal;font-weight:100"><?php esc_html_e( '100 - Thin', 'greyd-theme' ); ?></p>
							<!-- /wp:paragraph -->

							<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"200"}}} -->
							<p style="font-style:normal;font-weight:200"><?php esc_html_e( '200 - Extra Light', 'greyd-theme' ); ?></p>
							<!-- /wp:paragraph -->

							<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"300"}}} -->
							<p style="font-style:normal;font-weight:300"><?php esc_html_e( '300 - Light', 'greyd-theme' ); ?></p>
							<!-- /wp:paragraph -->

							<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"400"}}} -->
							<p style="font-style:normal;font-weight:400"><?php esc_html_e( '400 - Regular', 'greyd-theme' ); ?></p>
							<!-- /wp:paragraph -->

							<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"500"}}} -->
							<p style="font-style:normal;font-weight:500"><?php esc_html_e( '500 - Medium', 'greyd-theme' ); ?></p>
							<!-- /wp:paragraph -->

							<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"600"}}} -->
							<p style="font-style:normal;font-weight:600"><?php esc_html_e( '600 - Semi-Bold', 'greyd-theme' ); ?></p>
							<!-- /wp:paragraph -->

							<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"700"}}} -->
							<p style="font-style:normal;font-weight:700"><?php esc_html_e( '700 - Bold', 'greyd-theme' ); ?></p>
							<!-- /wp:paragraph -->

							<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"800"}}} -->
							<p style="font-style:normal;font-weight:800"><?php esc_html_e( '800 - Extra Bold', 'greyd-theme' ); ?></p>
							<!-- /wp:paragraph -->

							<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"900"}}} -->
							<p style="font-style:normal;font-weight:900"><?php esc_html_e( '900 - Black', 'greyd-theme' ); ?></p>
							<!-- /wp:paragraph -->
						</div>
						<!-- /wp:group -->
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

	<!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|x-large"},"padding":{"bottom":"var:preset|spacing|x-large"}}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignwide" style="margin-bottom:var(--wp--preset--spacing--x-large);padding-bottom:var(--wp--preset--spacing--x-large)">
		<!-- wp:group {"align":"wide","style":{"border":{"bottom":{"color":"var:preset|color|foreground","width":"1px","style":"dotted"},"top":{},"right":{},"left":{}},"spacing":{"padding":{"bottom":"var:preset|spacing|small"},"margin":{"bottom":"var:preset|spacing|medium"}}},"layout":{"type":"default"}} -->
		<div class="wp-block-group alignwide" style="border-bottom-color:var(--wp--preset--color--foreground);border-bottom-style:dotted;border-bottom-width:1px;margin-bottom:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--small)">
			<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"700"}}} -->
			<p style="font-style:normal;font-weight:700"><?php esc_html_e( 'Buttons &amp; Links', 'greyd-theme' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:buttons {"align":"wide"} -->
		<div class="wp-block-buttons alignwide">
			<!-- wp:button -->
			<div class="wp-block-button">
				<a class="wp-block-button__link wp-element-button" href="#"><?php esc_html_e( 'Primary Button', 'greyd-theme' ); ?></a>
			</div>
			<!-- /wp:button -->

			<!-- wp:button {"className":"is-style-outline"} -->
			<div class="wp-block-button is-style-outline">
				<a class="wp-block-button__link wp-element-button" href="#"><?php esc_html_e( 'Secondary Button', 'greyd-theme' ); ?></a>
			</div>
			<!-- /wp:button -->

			<!-- wp:button {"className":"is-style-alternate"} -->
			<div class="wp-block-button is-style-alternate">
				<a class="wp-block-button__link wp-element-button" href="#"><?php esc_html_e( 'Tertiary Button', 'greyd-theme' ); ?></a>
			</div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->

		<!-- wp:buttons {"align":"wide"} -->
		<div class="wp-block-buttons alignwide">
			<!-- wp:button {"className":"is-size-big"} -->
			<div class="wp-block-button is-size-big">
				<a class="wp-block-button__link wp-element-button" href="#"><?php esc_html_e( 'Large Button', 'greyd-theme' ); ?></a>
			</div>
			<!-- /wp:button -->

			<!-- wp:button {"className":"is-size-small is-style-outline"} -->
			<div class="wp-block-button is-size-small is-style-outline">
				<a class="wp-block-button__link wp-element-button" href="#"><?php esc_html_e( 'Small button', 'greyd-theme' ); ?></a>
			</div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->

		<!-- wp:group {"align":"wide","layout":{"type":"constrained","justifyContent":"left"}} -->
		<div class="wp-block-group alignwide">
			<!-- wp:paragraph {"align":"left"} -->
			<p class="has-text-align-left">
				<a href="#"><?php esc_html_e( 'Standard Link', 'greyd-theme' ); ?></a>
			</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|x-large"}}},"className":"","layout":{"type":"default"}} -->
	<div class="wp-block-group alignwide" style="margin-top:var(--wp--preset--spacing--x-large);margin-bottom:var(--wp--preset--spacing--x-large)">
		<!-- wp:group {"align":"wide","style":{"border":{"bottom":{"color":"var:preset|color|foreground","width":"1px","style":"dotted"},"top":{},"right":{},"left":{}},"spacing":{"padding":{"bottom":"var:preset|spacing|small"},"margin":{"bottom":"var:preset|spacing|medium"}}},"layout":{"type":"default"}} -->
		<div class="wp-block-group alignwide" style="border-bottom-color:var(--wp--preset--color--foreground);border-bottom-style:dotted;border-bottom-width:1px;margin-bottom:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--small)">
			<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"700"}}} -->
			<p style="font-style:normal;font-weight:700"><?php esc_html_e( 'Spacing Sizes', 'greyd-theme' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"default"}} -->
		<div class="wp-block-group">
			<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"700"}},"fontSize":"tiny"} -->
			<p class="has-tiny-font-size" style="font-style:normal;font-weight:700"><?php esc_html_e( 'Huge', 'greyd-theme' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|x-large","right":"var:preset|spacing|x-large","bottom":"var:preset|spacing|x-large","left":"var:preset|spacing|x-large"},"blockGap":"var:preset|spacing|x-large","margin":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|medium"}},"border":{"width":"1px","style":"dashed"}},"borderColor":"foreground","className":"","layout":{"type":"flex","flexWrap":"nowrap"}} -->
			<div class="wp-block-group has-border-color has-foreground-border-color" style="border-style:dashed;border-width:1px;margin-top:var(--wp--preset--spacing--small);margin-bottom:var(--wp--preset--spacing--medium);padding-top:var(--wp--preset--spacing--x-large);padding-right:var(--wp--preset--spacing--x-large);padding-bottom:var(--wp--preset--spacing--x-large);padding-left:var(--wp--preset--spacing--x-large)">
				<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|x-large","right":"var:preset|spacing|x-large","bottom":"0","left":"0"}},"layout":{"selfStretch":"fill","flexSize":null}},"backgroundColor":"mediumdark","className":"","layout":{"type":"constrained"}} -->
				<div class="wp-block-group has-mediumdark-background-color has-background" style="padding-top:var(--wp--preset--spacing--x-large);padding-right:var(--wp--preset--spacing--x-large);padding-bottom:0;padding-left:0">
					<!-- wp:spacer {"height":"0px"} -->
					<div style="height:0px" aria-hidden="true" class="wp-block-spacer"></div>
					<!-- /wp:spacer -->
				</div>
				<!-- /wp:group -->

				<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|x-large","right":"var:preset|spacing|x-large","bottom":"0","left":"0"}},"layout":{"selfStretch":"fill","flexSize":null}},"backgroundColor":"mediumdark","className":"","layout":{"type":"constrained"}} -->
				<div class="wp-block-group has-mediumdark-background-color has-background" style="padding-top:var(--wp--preset--spacing--x-large);padding-right:var(--wp--preset--spacing--x-large);padding-bottom:0;padding-left:0">
					<!-- wp:spacer {"height":"0px"} -->
					<div style="height:0px" aria-hidden="true" class="wp-block-spacer"></div>
					<!-- /wp:spacer -->
				</div>
				<!-- /wp:group -->

				<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|x-large","right":"var:preset|spacing|x-large","bottom":"0","left":"0"}},"layout":{"selfStretch":"fill","flexSize":null}},"backgroundColor":"mediumdark","className":"","layout":{"type":"constrained"}} -->
				<div class="wp-block-group has-mediumdark-background-color has-background" style="padding-top:var(--wp--preset--spacing--x-large);padding-right:var(--wp--preset--spacing--x-large);padding-bottom:0;padding-left:0">
					<!-- wp:spacer {"height":"0px"} -->
					<div style="height:0px" aria-hidden="true" class="wp-block-spacer"></div>
					<!-- /wp:spacer -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"layout":{"type":"default"}} -->
		<div class="wp-block-group">
			<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"700"}},"fontSize":"tiny"} -->
			<p class="has-tiny-font-size" style="font-style:normal;font-weight:700"><?php esc_html_e( 'Large', 'greyd-theme' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|large","right":"var:preset|spacing|large","bottom":"var:preset|spacing|large","left":"var:preset|spacing|large"},"blockGap":"var:preset|spacing|large","margin":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|medium"}},"border":{"style":"dashed","width":"1px"}},"borderColor":"foreground","className":"","layout":{"type":"flex","flexWrap":"nowrap"}} -->
			<div class="wp-block-group has-border-color has-foreground-border-color" style="border-style:dashed;border-width:1px;margin-top:var(--wp--preset--spacing--small);margin-bottom:var(--wp--preset--spacing--medium);padding-top:var(--wp--preset--spacing--large);padding-right:var(--wp--preset--spacing--large);padding-bottom:var(--wp--preset--spacing--large);padding-left:var(--wp--preset--spacing--large)">
				<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|large","right":"var:preset|spacing|large","bottom":"0","left":"0"}},"layout":{"selfStretch":"fill","flexSize":null}},"backgroundColor":"mediumdark","className":"","layout":{"type":"constrained"}} -->
				<div class="wp-block-group has-mediumdark-background-color has-background" style="padding-top:var(--wp--preset--spacing--large);padding-right:var(--wp--preset--spacing--large);padding-bottom:0;padding-left:0">
					<!-- wp:spacer {"height":"0px"} -->
					<div style="height:0px" aria-hidden="true" class="wp-block-spacer"></div>
					<!-- /wp:spacer -->
				</div>
				<!-- /wp:group -->

				<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|large","right":"var:preset|spacing|large","bottom":"0","left":"0"}},"layout":{"selfStretch":"fill","flexSize":null}},"backgroundColor":"mediumdark","className":"","layout":{"type":"constrained"}} -->
				<div class="wp-block-group has-mediumdark-background-color has-background" style="padding-top:var(--wp--preset--spacing--large);padding-right:var(--wp--preset--spacing--large);padding-bottom:0;padding-left:0">
					<!-- wp:spacer {"height":"0px"} -->
					<div style="height:0px" aria-hidden="true" class="wp-block-spacer"></div>
					<!-- /wp:spacer -->
				</div>
				<!-- /wp:group -->

				<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|large","right":"var:preset|spacing|large","bottom":"0","left":"0"}},"layout":{"selfStretch":"fill","flexSize":null}},"backgroundColor":"mediumdark","className":"","layout":{"type":"constrained"}} -->
				<div class="wp-block-group has-mediumdark-background-color has-background" style="padding-top:var(--wp--preset--spacing--large);padding-right:var(--wp--preset--spacing--large);padding-bottom:0;padding-left:0">
					<!-- wp:spacer {"height":"0px"} -->
					<div style="height:0px" aria-hidden="true" class="wp-block-spacer"></div>
					<!-- /wp:spacer -->
				</div>
				<!-- /wp:group -->

				<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|large","right":"var:preset|spacing|large","bottom":"0","left":"0"}},"layout":{"selfStretch":"fill","flexSize":null}},"backgroundColor":"mediumdark","className":"","layout":{"type":"constrained"}} -->
				<div class="wp-block-group has-mediumdark-background-color has-background" style="padding-top:var(--wp--preset--spacing--large);padding-right:var(--wp--preset--spacing--large);padding-bottom:0;padding-left:0">
					<!-- wp:spacer {"height":"0px"} -->
					<div style="height:0px" aria-hidden="true" class="wp-block-spacer"></div>
					<!-- /wp:spacer -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"layout":{"type":"default"}} -->
		<div class="wp-block-group">
			<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"700"}},"fontSize":"tiny"} -->
			<p class="has-tiny-font-size" style="font-style:normal;font-weight:700"><?php esc_html_e( 'Medium', 'greyd-theme' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|medium","right":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium","left":"var:preset|spacing|medium"},"blockGap":"var:preset|spacing|medium","margin":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|small"}},"border":{"width":"1px","style":"dashed"}},"borderColor":"foreground","className":"","layout":{"type":"flex","flexWrap":"nowrap"}} -->
			<div class="wp-block-group has-border-color has-foreground-border-color" style="border-style:dashed;border-width:1px;margin-top:var(--wp--preset--spacing--small);margin-bottom:var(--wp--preset--spacing--small);padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium)">
				<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|medium","right":"var:preset|spacing|medium","bottom":"0","left":"0"}},"layout":{"selfStretch":"fill","flexSize":null}},"backgroundColor":"mediumdark","className":"","layout":{"type":"constrained"}} -->
				<div class="wp-block-group has-mediumdark-background-color has-background" style="padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--medium);padding-bottom:0;padding-left:0">
					<!-- wp:spacer {"height":"0px"} -->
					<div style="height:0px" aria-hidden="true" class="wp-block-spacer"></div>
					<!-- /wp:spacer -->
				</div>
				<!-- /wp:group -->

				<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|medium","right":"var:preset|spacing|medium","bottom":"0","left":"0"}},"layout":{"selfStretch":"fill","flexSize":null}},"backgroundColor":"mediumdark","className":"","layout":{"type":"constrained"}} -->
				<div class="wp-block-group has-mediumdark-background-color has-background" style="padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--medium);padding-bottom:0;padding-left:0">
					<!-- wp:spacer {"height":"0px"} -->
					<div style="height:0px" aria-hidden="true" class="wp-block-spacer"></div>
					<!-- /wp:spacer -->
				</div>
				<!-- /wp:group -->

				<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|medium","right":"var:preset|spacing|medium","bottom":"0","left":"0"}},"layout":{"selfStretch":"fill","flexSize":null}},"backgroundColor":"mediumdark","className":"","layout":{"type":"constrained"}} -->
				<div class="wp-block-group has-mediumdark-background-color has-background" style="padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--medium);padding-bottom:0;padding-left:0">
					<!-- wp:spacer {"height":"0px"} -->
					<div style="height:0px" aria-hidden="true" class="wp-block-spacer"></div>
					<!-- /wp:spacer -->
				</div>
				<!-- /wp:group -->

				<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|medium","right":"var:preset|spacing|medium","bottom":"0","left":"0"}},"layout":{"selfStretch":"fill","flexSize":null}},"backgroundColor":"mediumdark","className":"","layout":{"type":"constrained"}} -->
				<div class="wp-block-group has-mediumdark-background-color has-background" style="padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--medium);padding-bottom:0;padding-left:0">
					<!-- wp:spacer {"height":"0px"} -->
					<div style="height:0px" aria-hidden="true" class="wp-block-spacer"></div>
					<!-- /wp:spacer -->
				</div>
				<!-- /wp:group -->

				<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|medium","right":"var:preset|spacing|medium","bottom":"0","left":"0"}},"layout":{"selfStretch":"fill","flexSize":null}},"backgroundColor":"mediumdark","className":"","layout":{"type":"constrained"}} -->
				<div class="wp-block-group has-mediumdark-background-color has-background" style="padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--medium);padding-bottom:0;padding-left:0">
					<!-- wp:spacer {"height":"0px"} -->
					<div style="height:0px" aria-hidden="true" class="wp-block-spacer"></div>
					<!-- /wp:spacer -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"layout":{"type":"default"}} -->
		<div class="wp-block-group">
			<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"700"}},"fontSize":"tiny"} -->
			<p class="has-tiny-font-size" style="font-style:normal;font-weight:700"><?php esc_html_e( 'Small', 'greyd-theme' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|small","right":"var:preset|spacing|small","bottom":"var:preset|spacing|small","left":"var:preset|spacing|small"},"blockGap":"var:preset|spacing|small","margin":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|small"}},"border":{"width":"1px","style":"dashed"}},"borderColor":"foreground","className":"","layout":{"type":"flex","flexWrap":"nowrap"}} -->
			<div class="wp-block-group has-border-color has-foreground-border-color" style="border-style:dashed;border-width:1px;margin-top:var(--wp--preset--spacing--small);margin-bottom:var(--wp--preset--spacing--small);padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--small)">
				<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|small","right":"var:preset|spacing|small","bottom":"0","left":"0"}},"layout":{"selfStretch":"fill","flexSize":null}},"backgroundColor":"mediumdark","className":"","layout":{"type":"constrained"}} -->
				<div class="wp-block-group has-mediumdark-background-color has-background" style="padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--small);padding-bottom:0;padding-left:0">
					<!-- wp:spacer {"height":"0px"} -->
					<div style="height:0px" aria-hidden="true" class="wp-block-spacer"></div>
					<!-- /wp:spacer -->
				</div>
				<!-- /wp:group -->

				<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|small","right":"var:preset|spacing|small","bottom":"0","left":"0"}},"layout":{"selfStretch":"fill","flexSize":null}},"backgroundColor":"mediumdark","className":"","layout":{"type":"constrained"}} -->
				<div class="wp-block-group has-mediumdark-background-color has-background" style="padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--small);padding-bottom:0;padding-left:0">
					<!-- wp:spacer {"height":"0px"} -->
					<div style="height:0px" aria-hidden="true" class="wp-block-spacer"></div>
					<!-- /wp:spacer -->
				</div>
				<!-- /wp:group -->

				<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|small","right":"var:preset|spacing|small","bottom":"0","left":"0"}},"layout":{"selfStretch":"fill","flexSize":null}},"backgroundColor":"mediumdark","className":"","layout":{"type":"constrained"}} -->
				<div class="wp-block-group has-mediumdark-background-color has-background" style="padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--small);padding-bottom:0;padding-left:0">
					<!-- wp:spacer {"height":"0px"} -->
					<div style="height:0px" aria-hidden="true" class="wp-block-spacer"></div>
					<!-- /wp:spacer -->
				</div>
				<!-- /wp:group -->

				<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|small","right":"var:preset|spacing|small","bottom":"0","left":"0"}},"layout":{"selfStretch":"fill","flexSize":null}},"backgroundColor":"mediumdark","className":"","layout":{"type":"constrained"}} -->
				<div class="wp-block-group has-mediumdark-background-color has-background" style="padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--small);padding-bottom:0;padding-left:0">
					<!-- wp:spacer {"height":"0px"} -->
					<div style="height:0px" aria-hidden="true" class="wp-block-spacer"></div>
					<!-- /wp:spacer -->
				</div>
				<!-- /wp:group -->

				<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|small","right":"var:preset|spacing|small","bottom":"0","left":"0"}},"layout":{"selfStretch":"fill","flexSize":null}},"backgroundColor":"mediumdark","className":"","layout":{"type":"constrained"}} -->
				<div class="wp-block-group has-mediumdark-background-color has-background" style="padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--small);padding-bottom:0;padding-left:0">
					<!-- wp:spacer {"height":"0px"} -->
					<div style="height:0px" aria-hidden="true" class="wp-block-spacer"></div>
					<!-- /wp:spacer -->
				</div>
				<!-- /wp:group -->

				<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|small","right":"var:preset|spacing|small","bottom":"0","left":"0"}},"layout":{"selfStretch":"fill","flexSize":null}},"backgroundColor":"mediumdark","className":"","layout":{"type":"constrained"}} -->
				<div class="wp-block-group has-mediumdark-background-color has-background" style="padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--small);padding-bottom:0;padding-left:0">
					<!-- wp:spacer {"height":"0px"} -->
					<div style="height:0px" aria-hidden="true" class="wp-block-spacer"></div>
					<!-- /wp:spacer -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"layout":{"type":"default"}} -->
		<div class="wp-block-group">
			<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"700"}},"fontSize":"tiny"} -->
			<p class="has-tiny-font-size" style="font-style:normal;font-weight:700"><?php esc_html_e( 'Tiny', 'greyd-theme' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|small","right":"var:preset|spacing|small","bottom":"var:preset|spacing|small","left":"var:preset|spacing|small"},"blockGap":"var:preset|spacing|small","margin":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|medium"}},"border":{"width":"1px","style":"dashed"}},"borderColor":"foreground","className":"","layout":{"type":"flex","flexWrap":"nowrap"}} -->
			<div class="wp-block-group has-border-color has-foreground-border-color" style="border-style:dashed;border-width:1px;margin-top:var(--wp--preset--spacing--small);margin-bottom:var(--wp--preset--spacing--medium);padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--small)">
				<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|small","right":"var:preset|spacing|small","bottom":"0","left":"0"}},"layout":{"selfStretch":"fill","flexSize":null}},"backgroundColor":"mediumdark","className":"","layout":{"type":"constrained"}} -->
				<div class="wp-block-group has-mediumdark-background-color has-background" style="padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--small);padding-bottom:0;padding-left:0">
					<!-- wp:spacer {"height":"0px"} -->
					<div style="height:0px" aria-hidden="true" class="wp-block-spacer"></div>
					<!-- /wp:spacer -->
				</div>
				<!-- /wp:group -->

				<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|small","right":"var:preset|spacing|small","bottom":"0","left":"0"}},"layout":{"selfStretch":"fill","flexSize":null}},"backgroundColor":"mediumdark","className":"","layout":{"type":"constrained"}} -->
				<div class="wp-block-group has-mediumdark-background-color has-background" style="padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--small);padding-bottom:0;padding-left:0">
					<!-- wp:spacer {"height":"0px"} -->
					<div style="height:0px" aria-hidden="true" class="wp-block-spacer"></div>
					<!-- /wp:spacer -->
				</div>
				<!-- /wp:group -->

				<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|small","right":"var:preset|spacing|small","bottom":"0","left":"0"}},"layout":{"selfStretch":"fill","flexSize":null}},"backgroundColor":"mediumdark","className":"","layout":{"type":"constrained"}} -->
				<div class="wp-block-group has-mediumdark-background-color has-background" style="padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--small);padding-bottom:0;padding-left:0">
					<!-- wp:spacer {"height":"0px"} -->
					<div style="height:0px" aria-hidden="true" class="wp-block-spacer"></div>
					<!-- /wp:spacer -->
				</div>
				<!-- /wp:group -->

				<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|small","right":"var:preset|spacing|small","bottom":"0","left":"0"}},"layout":{"selfStretch":"fill","flexSize":null}},"backgroundColor":"mediumdark","className":"","layout":{"type":"constrained"}} -->
				<div class="wp-block-group has-mediumdark-background-color has-background" style="padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--small);padding-bottom:0;padding-left:0">
					<!-- wp:spacer {"height":"0px"} -->
					<div style="height:0px" aria-hidden="true" class="wp-block-spacer"></div>
					<!-- /wp:spacer -->
				</div>
				<!-- /wp:group -->

				<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|small","right":"var:preset|spacing|small","bottom":"0","left":"0"}},"layout":{"selfStretch":"fill","flexSize":null}},"backgroundColor":"mediumdark","className":"","layout":{"type":"constrained"}} -->
				<div class="wp-block-group has-mediumdark-background-color has-background" style="padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--small);padding-bottom:0;padding-left:0">
					<!-- wp:spacer {"height":"0px"} -->
					<div style="height:0px" aria-hidden="true" class="wp-block-spacer"></div>
					<!-- /wp:spacer -->
				</div>
				<!-- /wp:group -->

				<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|small","right":"var:preset|spacing|small","bottom":"0","left":"0"}},"layout":{"selfStretch":"fill","flexSize":null}},"backgroundColor":"mediumdark","className":"","layout":{"type":"constrained"}} -->
				<div class="wp-block-group has-mediumdark-background-color has-background" style="padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--small);padding-bottom:0;padding-left:0">
					<!-- wp:spacer {"height":"0px"} -->
					<div style="height:0px" aria-hidden="true" class="wp-block-spacer"></div>
					<!-- /wp:spacer -->
				</div>
				<!-- /wp:group -->

				<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|small","right":"var:preset|spacing|small","bottom":"0","left":"0"}},"layout":{"selfStretch":"fill","flexSize":null}},"backgroundColor":"mediumdark","className":"","layout":{"type":"constrained"}} -->
				<div class="wp-block-group has-mediumdark-background-color has-background" style="padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--small);padding-bottom:0;padding-left:0">
					<!-- wp:spacer {"height":"0px"} -->
					<div style="height:0px" aria-hidden="true" class="wp-block-spacer"></div>
					<!-- /wp:spacer -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->