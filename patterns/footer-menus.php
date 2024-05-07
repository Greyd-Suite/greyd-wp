<?php
/**
 * Title: Footer with Menus
 * Slug: greyd-theme/footer-menus
 * Description: 1st column: Site logo, paragraph, social links. 2nd to 5th columns: individual menus, bottom line: copyright, site title, paragraph.
 * Categories: footer
 * Keywords:
 * Viewport Width: 1600
 * Block Types: core/template-part/footer
 * Inserter: false
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|large","right":"var:preset|spacing|medium","left":"var:preset|spacing|medium"}}},"className":"","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--x-large);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--large);padding-left:var(--wp--preset--spacing--medium)">
	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|medium","left":"var:preset|spacing|medium"}}},"className":""} -->
	<div class="wp-block-columns alignwide">
		<!-- wp:column {"width":"","style":{"spacing":{"padding":{"bottom":"var:preset|spacing|xx-small"}}},"className":""} -->
		<div class="wp-block-column" style="padding-bottom:var(--wp--preset--spacing--xx-small)">
			<!-- wp:site-logo {"width":40,"className":""} /-->

			<!-- wp:paragraph {"style":{"spacing":{"padding":{"right":"var:preset|spacing|medium"}}},"className":"","fontSize":"small"} -->
			<p class="has-small-font-size" style="padding-right:var(--wp--preset--spacing--medium)"><?php esc_html_e( 'Nisl libero ullamcorper id ipsum viverra mauris non pellentesque placerat lorem lacinia sagittis non pretium.', 'greyd-theme' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:social-links {"iconColor":"heading","iconColorValue":"var(--wp--preset--color--heading)","openInNewTab":true,"size":"has-small-icon-size","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|small","left":"var:preset|spacing|small"}}},"className":"is-style-logos-only"} -->
			<ul class="wp-block-social-links has-small-icon-size has-icon-color is-style-logos-only">
				<!-- wp:social-link {"url":"#","service":"facebook","className":""} /-->

				<!-- wp:social-link {"url":"#","service":"twitter","className":""} /-->

				<!-- wp:social-link {"url":"#","service":"youtube","className":""} /-->

				<!-- wp:social-link {"url":"#","service":"linkedin","className":""} /-->
			</ul>
			<!-- /wp:social-links -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"style":{"spacing":{"padding":{"bottom":"var:preset|spacing|xx-small"}}}} -->
		<div class="wp-block-column" style="padding-bottom:var(--wp--preset--spacing--xx-small)">
			<!-- wp:columns {"isStackedOnMobile":false,"style":{"spacing":{"blockGap":{"top":"32px","left":"32px"}}},"className":""} -->
			<div class="wp-block-columns is-not-stacked-on-mobile">
				<!-- wp:column {"style":{"spacing":[]}} -->
				<div class="wp-block-column">
					<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"1px","fontStyle":"normal","fontWeight":"500"}},"textColor":"heading","className":"","fontSize":"x-small"} -->
					<p class="has-heading-color has-text-color has-x-small-font-size" style="font-style:normal;font-weight:500;letter-spacing:1px;text-transform:uppercase"><?php esc_html_e( 'Products', 'greyd-theme' ); ?></p>
					<!-- /wp:paragraph -->

					<!-- wp:navigation {"overlayMenu":"never","className":"","layout":{"type":"flex","setCascadingProperties":true,"justifyContent":"left","orientation":"vertical"},"style":{"spacing":{"blockGap":"var:preset|spacing|xx-small"}}} -->
						<!-- wp:navigation-link {"label":"<?php esc_html_e( 'Products List', 'greyd-theme' ); ?>","url":"#","kind":"custom","isTopLevelLink":true,"className":""} /-->

						<!-- wp:navigation-link {"label":"<?php esc_html_e( 'Plans & Pricing', 'greyd-theme' ); ?>","url":"#","kind":"custom","isTopLevelLink":true,"className":""} /-->

						<!-- wp:navigation-link {"label":"<?php esc_html_e( 'Services', 'greyd-theme' ); ?>","url":"#","kind":"custom","isTopLevelLink":true,"className":""} /-->

						<!-- wp:navigation-link {"label":"<?php esc_html_e( 'Partners', 'greyd-theme' ); ?>","url":"#","kind":"custom","isTopLevelLink":true,"className":""} /-->
					<!-- /wp:navigation -->
				</div>
				<!-- /wp:column -->

				<!-- wp:column {"style":{"spacing":[]}} -->
				<div class="wp-block-column">
					<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"1px","fontStyle":"normal","fontWeight":"500"}},"textColor":"heading","className":"","fontSize":"x-small"} -->
					<p class="has-heading-color has-text-color has-x-small-font-size" style="font-style:normal;font-weight:500;letter-spacing:1px;text-transform:uppercase"><?php esc_html_e( 'Company', 'greyd-theme' ); ?></p>
					<!-- /wp:paragraph -->

					<!-- wp:navigation {"overlayMenu":"never","className":"","layout":{"type":"flex","setCascadingProperties":true,"justifyContent":"left","orientation":"vertical"},"style":{"spacing":{"blockGap":"var:preset|spacing|xx-small"}}} -->
						<!-- wp:navigation-link {"label":"<?php esc_html_e( 'About Us', 'greyd-theme' ); ?>","url":"#","kind":"custom","isTopLevelLink":true,"className":""} /-->

						<!-- wp:navigation-link {"label":"<?php esc_html_e( 'News', 'greyd-theme' ); ?>","url":"#","kind":"custom","isTopLevelLink":true,"className":""} /-->

						<!-- wp:navigation-link {"label":"<?php esc_html_e( 'Contact Us', 'greyd-theme' ); ?>","url":"#","kind":"custom","isTopLevelLink":true,"className":""} /-->

						<!-- wp:navigation-link {"label":"<?php esc_html_e( 'Meet Our Team', 'greyd-theme' ); ?>","url":"#","kind":"custom","isTopLevelLink":true,"className":""} /-->
					<!-- /wp:navigation -->
				</div>
				<!-- /wp:column -->
			</div>
			<!-- /wp:columns -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"style":{"spacing":{"padding":{"bottom":"var:preset|spacing|xx-small"}}}} -->
		<div class="wp-block-column" style="padding-bottom:var(--wp--preset--spacing--xx-small)">
			<!-- wp:columns {"isStackedOnMobile":false,"style":{"spacing":{"blockGap":{"top":"32px","left":"32px"}}},"className":""} -->
			<div class="wp-block-columns is-not-stacked-on-mobile">
				<!-- wp:column {"style":{"spacing":[]}} -->
				<div class="wp-block-column">
					<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"1px","fontStyle":"normal","fontWeight":"500"}},"textColor":"heading","className":"","fontSize":"x-small"} -->
					<p class="has-heading-color has-text-color has-x-small-font-size" style="font-style:normal;font-weight:500;letter-spacing:1px;text-transform:uppercase"><?php esc_html_e( 'Resources', 'greyd-theme' ); ?></p>
					<!-- /wp:paragraph -->

					<!-- wp:navigation {"overlayMenu":"never","className":"","layout":{"type":"flex","setCascadingProperties":true,"justifyContent":"left","orientation":"vertical"},"style":{"spacing":{"blockGap":"var:preset|spacing|xx-small"}}} -->
						<!-- wp:navigation-link {"label":"<?php esc_html_e( 'Gallery', 'greyd-theme' ); ?>","url":"#","kind":"custom","isTopLevelLink":true,"className":""} /-->

						<!-- wp:navigation-link {"label":"<?php esc_html_e( 'Blog Articles', 'greyd-theme' ); ?>","url":"#","kind":"custom","isTopLevelLink":true,"className":""} /-->

						<!-- wp:navigation-link {"label":"<?php esc_html_e( 'Brand Assets', 'greyd-theme' ); ?>","url":"#","kind":"custom","isTopLevelLink":true,"className":""} /-->

						<!-- wp:navigation-link {"label":"<?php esc_html_e( 'Brand Guidelines', 'greyd-theme' ); ?>","url":"#","kind":"custom","isTopLevelLink":true,"className":""} /-->
					<!-- /wp:navigation -->
				</div>
				<!-- /wp:column -->

				<!-- wp:column {"style":{"spacing":[]}} -->
				<div class="wp-block-column">
					<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"1px","fontStyle":"normal","fontWeight":"500"}},"textColor":"heading","className":"","fontSize":"x-small"} -->
					<p class="has-heading-color has-text-color has-x-small-font-size" style="font-style:normal;font-weight:500;letter-spacing:1px;text-transform:uppercase"><?php esc_html_e( 'Support', 'greyd-theme' ); ?></p>
					<!-- /wp:paragraph -->

					<!-- wp:navigation {"overlayMenu":"never","className":"","layout":{"type":"flex","setCascadingProperties":true,"justifyContent":"left","orientation":"vertical"},"style":{"spacing":{"blockGap":"var:preset|spacing|xx-small"}}} -->
						<!-- wp:navigation-link {"label":"<?php esc_html_e( 'Knowledge Base', 'greyd-theme' ); ?>","url":"#","kind":"custom","isTopLevelLink":true,"className":""} /-->

						<!-- wp:navigation-link {"label":"<?php esc_html_e( 'Contact Support', 'greyd-theme' ); ?>","url":"#","kind":"custom","isTopLevelLink":true,"className":""} /-->

						<!-- wp:navigation-link {"label":"<?php esc_html_e( 'Privacy Policy', 'greyd-theme' ); ?>","url":"#","kind":"custom","isTopLevelLink":true,"className":""} /-->

						<!-- wp:navigation-link {"label":"<?php esc_html_e( 'TOS', 'greyd-theme' ); ?>","url":"#","kind":"custom","isTopLevelLink":true,"className":""} /-->
					<!-- /wp:navigation -->
				</div>
				<!-- /wp:column -->
			</div>
			<!-- /wp:columns -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->

	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"className":"","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left"},"fontSize":"tiny"} -->
	<div class="wp-block-group alignwide has-tiny-font-size">
		<!-- wp:paragraph {"align":"center","className":"","fontSize":"x-small"} -->
		<p class="has-text-align-center has-x-small-font-size"><?php esc_html_e( '© 2024', 'greyd-theme' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:site-title {"level":0,"style":{"typography":{"fontStyle":"normal","fontWeight":"400"}},"className":"","fontSize":"tiny"} /-->

		<!-- wp:paragraph {"align":"center","className":"","fontSize":"x-small"} -->
		<p class="has-text-align-center has-x-small-font-size"><?php esc_html_e( 'All rights reserved', 'greyd-theme' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->