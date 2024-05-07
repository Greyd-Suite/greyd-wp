<?php
/**
 * Title: FAQ
 * Slug: greyd-theme/columns-faq
 * Description: A FAQ section with questions and answers.
 * Categories: greyd-columns
 * Keywords:
 * Viewport Width: 1200
 * Block Types:
 * Post Types:
 * Inserter: true
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|x-large","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"},"margin":{"top":"0","bottom":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|background"}}}},"backgroundColor":"foreground","textColor":"background","className":"","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-background-color has-foreground-background-color has-text-color has-background has-link-color" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--x-large);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--x-large);padding-left:var(--wp--preset--spacing--medium)">
	<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small","padding":{"top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|medium"}}},"className":"","layout":{"type":"default"}} -->
	<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--x-large);padding-bottom:var(--wp--preset--spacing--medium)">
		<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"700"}},"textColor":"secondary","className":"has-text-align-center"} -->
		<p class="has-text-align-center has-secondary-color has-text-color" style="font-style:normal;font-weight:700"><?php esc_html_e( 'FAQs', 'greyd-theme' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:heading {"textAlign":"center","className":"is-style-wide"} -->
		<h2 class="wp-block-heading has-text-align-center is-style-wide"><?php esc_html_e( 'Frequently asked questions', 'greyd-theme' ); ?></h2>
		<!-- /wp:heading -->
	</div>
	<!-- /wp:group -->

	<!-- wp:columns {"style":{"spacing":{"padding":{"right":"0","left":"0","top":"0","bottom":"0"},"blockGap":{"top":"var:preset|spacing|small"}}}} -->
	<div class="wp-block-columns" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
		<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}}} -->
		<div class="wp-block-column">
			<!-- wp:details {"style":{"spacing":{"padding":{"top":"var:preset|spacing|xxs","bottom":"var:preset|spacing|xxs","left":"0","right":"0"}}},"className":"is-style-default"} -->
			<details class="wp-block-details is-style-default" style="padding-top:var(--wp--preset--spacing--xxs);padding-right:0;padding-bottom:var(--wp--preset--spacing--xxs);padding-left:0">
				<summary><?php esc_html_e( 'What languages does Greyd support?', 'greyd-theme' ); ?></summary>
				<!-- wp:paragraph {"placeholder":"<?php esc_html_e( 'Type / to add a hidden block', 'greyd-theme' ); ?>","style":{"typography":{"fontStyle":"normal","fontWeight":"400"},"spacing":{"margin":{"bottom":"var:preset|spacing|small","top":"var:preset|spacing|small"}}},"className":"","fontSize":"small"} -->
				<p class="has-small-font-size" style="margin-top:var(--wp--preset--spacing--small);margin-bottom:var(--wp--preset--spacing--small);font-style:normal;font-weight:400">
					<?php esc_html_e( 'Our backend as well as all tutorials in our Helpcenter are available in English and German. You can select your language in the WordPress settings.', 'greyd-theme' ); ?>
				</p>
				<!-- /wp:paragraph -->
			</details>
			<!-- /wp:details -->

			<!-- wp:details {"style":{"spacing":{"padding":{"top":"var:preset|spacing|xxs","bottom":"var:preset|spacing|xxs","left":"0","right":"0"}}},"className":"is-style-default"} -->
			<details class="wp-block-details is-style-default" style="padding-top:var(--wp--preset--spacing--xxs);padding-right:0;padding-bottom:var(--wp--preset--spacing--xxs);padding-left:0">
				<summary><?php esc_html_e( 'Is Greyd a free theme?', 'greyd-theme' ); ?></summary>
				<!-- wp:paragraph {"placeholder":"<?php esc_html_e( 'Type / to add a hidden block', 'greyd-theme' ); ?>","style":{"typography":{"fontStyle":"normal","fontWeight":"400"},"spacing":{"margin":{"bottom":"var:preset|spacing|small","top":"var:preset|spacing|small"}}},"className":"","fontSize":"small"} -->
				<p class="has-small-font-size" style="margin-top:var(--wp--preset--spacing--small);margin-bottom:var(--wp--preset--spacing--small);font-style:normal;font-weight:400">
					<?php esc_html_e( 'Yes, Greyd Theme is free of charge. If you would like to get even more features, check out our Suite as well!', 'greyd-theme' ); ?>
				</p>
				<!-- /wp:paragraph -->
			</details>
			<!-- /wp:details -->

			<!-- wp:details {"style":{"spacing":{"padding":{"top":"var:preset|spacing|xxs","bottom":"var:preset|spacing|xxs","left":"0","right":"0"}}},"className":"is-style-default"} -->
			<details class="wp-block-details is-style-default" style="padding-top:var(--wp--preset--spacing--xxs);padding-right:0;padding-bottom:var(--wp--preset--spacing--xxs);padding-left:0">
				<summary><?php esc_html_e( 'Does this theme require any plugins?', 'greyd-theme' ); ?></summary>
				<!-- wp:paragraph {"placeholder":"<?php esc_html_e( 'Type / to add a hidden block', 'greyd-theme' ); ?>","style":{"typography":{"fontStyle":"normal","fontWeight":"400"},"spacing":{"margin":{"bottom":"var:preset|spacing|small","top":"var:preset|spacing|small"}}},"className":"","fontSize":"small"} -->
				<p class="has-small-font-size" style="margin-top:var(--wp--preset--spacing--small);margin-bottom:var(--wp--preset--spacing--small);font-style:normal;font-weight:400">
					<?php esc_html_e( 'No, there are no plugins required by this theme. However, you can add additional functionality by using not only the Greyd Theme, but the entire Greyd.Suite.', 'greyd-theme' ); ?>
				</p>
				<!-- /wp:paragraph -->
			</details>
			<!-- /wp:details -->

			<!-- wp:details {"style":{"spacing":{"padding":{"top":"var:preset|spacing|xxs","bottom":"var:preset|spacing|xxs","left":"0","right":"0"}}},"className":"is-style-default"} -->
			<details class="wp-block-details is-style-default" style="padding-top:var(--wp--preset--spacing--xxs);padding-right:0;padding-bottom:var(--wp--preset--spacing--xxs);padding-left:0">
				<summary><?php esc_html_e( 'What skills are required to work with Greyd?', 'greyd-theme' ); ?></summary>
				<!-- wp:paragraph {"placeholder":"<?php esc_html_e( 'Type / to add a hidden block', 'greyd-theme' ); ?>","style":{"typography":{"fontStyle":"normal","fontWeight":"400"},"spacing":{"margin":{"bottom":"var:preset|spacing|small","top":"var:preset|spacing|small"}}},"className":"","fontSize":"small"} -->
				<p class="has-small-font-size" style="margin-top:var(--wp--preset--spacing--small);margin-bottom:var(--wp--preset--spacing--small);font-style:normal;font-weight:400">
					<?php esc_html_e( 'Greyd is targeted at anyone creating, managing and/or maintaining professional WordPress websites. Coding skills are not necessary. Since our features are integrated natively in the Block &amp; Site Editor of WordPress, you will find the familiar WordPress backend, which makes it super easy for web service providers, marketing teams and other parties to collaborate on a web project built with Greyd.', 'greyd-theme' ); ?>
				</p>
				<!-- /wp:paragraph -->
			</details>
			<!-- /wp:details -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}}} -->
		<div class="wp-block-column">
			<!-- wp:details {"style":{"spacing":{"padding":{"top":"var:preset|spacing|xxs","bottom":"var:preset|spacing|xxs","left":"0","right":"0"}}},"className":"is-style-default"} -->
			<details class="wp-block-details is-style-default" style="padding-top:var(--wp--preset--spacing--xxs);padding-right:0;padding-bottom:var(--wp--preset--spacing--xxs);padding-left:0">
				<summary><?php esc_html_e( 'Do you offer a premium version?', 'greyd-theme' ); ?></summary>
				<!-- wp:paragraph {"placeholder":"<?php esc_html_e( 'Type / to add a hidden block', 'greyd-theme' ); ?>","style":{"typography":{"fontStyle":"normal","fontWeight":"400"},"spacing":{"margin":{"bottom":"var:preset|spacing|small","top":"var:preset|spacing|small"}}},"className":"","fontSize":"small"} -->
				<p class="has-small-font-size" style="margin-top:var(--wp--preset--spacing--small);margin-bottom:var(--wp--preset--spacing--small);font-style:normal;font-weight:400">
					<?php esc_html_e( 'Yes, Greyd Theme is actually just a small part of what Greyd has to offer. With Greyd.Suite we offer a comprehensive all-in-one WordPress suite.', 'greyd-theme' ); ?>
				</p>
				<!-- /wp:paragraph -->
			</details>
			<!-- /wp:details -->

			<!-- wp:details {"style":{"spacing":{"padding":{"top":"var:preset|spacing|xxs","bottom":"var:preset|spacing|xxs","left":"0","right":"0"}}},"className":"is-style-default"} -->
			<details class="wp-block-details is-style-default" style="padding-top:var(--wp--preset--spacing--xxs);padding-right:0;padding-bottom:var(--wp--preset--spacing--xxs);padding-left:0">
				<summary><?php esc_html_e( 'Can I add custom code to Greyd theme?', 'greyd-theme' ); ?></summary>
				<!-- wp:paragraph {"placeholder":"<?php esc_html_e( 'Type / to add a hidden block', 'greyd-theme' ); ?>","style":{"typography":{"fontStyle":"normal","fontWeight":"400"},"spacing":{"margin":{"bottom":"var:preset|spacing|small","top":"var:preset|spacing|small"}}},"className":"","fontSize":"small"} -->
				<p class="has-small-font-size" style="margin-top:var(--wp--preset--spacing--small);margin-bottom:var(--wp--preset--spacing--small);font-style:normal;font-weight:400">
					<?php esc_html_e( 'Yes, CSS, HTML or JavaScript – you can easily add your own custom code to our theme to add custom functionality. You can also add global code snippets.', 'greyd-theme' ); ?>
				</p>
				<!-- /wp:paragraph -->
			</details>
			<!-- /wp:details -->

			<!-- wp:details {"style":{"spacing":{"padding":{"top":"var:preset|spacing|xxs","bottom":"var:preset|spacing|xxs","left":"0","right":"0"}}},"className":"is-style-default"} -->
			<details class="wp-block-details is-style-default" style="padding-top:var(--wp--preset--spacing--xxs);padding-right:0;padding-bottom:var(--wp--preset--spacing--xxs);padding-left:0">
				<summary><?php esc_html_e( 'Is Greyd compatible with third-party plugins?', 'greyd-theme' ); ?></summary>
				<!-- wp:paragraph {"placeholder":"<?php esc_html_e( 'Type / to add a hidden block', 'greyd-theme' ); ?>","style":{"typography":{"fontStyle":"normal","fontWeight":"400"},"spacing":{"margin":{"bottom":"var:preset|spacing|small","top":"var:preset|spacing|small"}}},"className":"","fontSize":"small"} -->
				<p class="has-small-font-size" style="margin-top:var(--wp--preset--spacing--small);margin-bottom:var(--wp--preset--spacing--small);font-style:normal;font-weight:400">
					<?php esc_html_e( 'Yes, with its native integration in the WordPress Block &amp; Site Editor, you can use our theme flexibly together with many third-party plugins.', 'greyd-theme' ); ?>
				</p>
				<!-- /wp:paragraph -->
			</details>
			<!-- /wp:details -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->

	<!-- wp:paragraph {"align":"center","style":{"typography":{"textDecoration":"none"},"spacing":{"margin":{"top":"var:preset|spacing|large","bottom":"var:preset|spacing|x-large"}},"elements":{"link":{"color":{"text":"var:preset|color|lightest"},":hover":{"color":{"text":"var:preset|color|secondary"}}}}},"className":"aligncenter","fontSize":"14"} -->
	<p class="has-text-align-center aligncenter has-link-color has-14-font-size" style="margin-top:var(--wp--preset--spacing--large);margin-bottom:var(--wp--preset--spacing--x-large);text-decoration:none">
		<?php esc_html_e( 'Question not answered above?', 'greyd-theme' ); ?> <a href="#"><?php esc_html_e( 'Contact&nbsp;us&nbsp;→', 'greyd-theme' ); ?></a>
	</p>
	<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->