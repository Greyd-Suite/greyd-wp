<?php
/**
 * Title: Separator with Background Pattern and Quote
 * Slug: greyd-wp/content-separator-bg-pattern-quote
 * Description:
 * Categories: greyd-content
 * Keywords:
 * Viewport Width: 1400
 * Block Types:
 * Post Types:
 * Inserter: true
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"backgroundColor":"primary","layout":{"type":"default"}} -->
<div class="wp-block-group alignfull has-primary-background-color has-background" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
	<!-- wp:cover {"url":"<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/dark-transparent-background-pattern.webp","dimRatio":70,"isUserOverlayColor":true,"minHeight":614,"minHeightUnit":"px","gradient":"primary-to-foreground","contentPosition":"center center","style":{"color":{"duotone":"var:preset|duotone|foreground-background"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"className":"is-style-no-background","layout":{"type":"constrained"}} -->
	<div class="wp-block-cover is-style-no-background" style="margin-top:0;margin-bottom:0;min-height:614px">
		<span aria-hidden="true" class="wp-block-cover__background has-background-dim-70 has-background-dim wp-block-cover__gradient-background has-background-gradient has-primary-to-foreground-gradient-background"></span>
		<img class="wp-block-cover__image-background" alt="" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/dark-transparent-background-pattern.webp" data-object-fit="cover" />
		<div class="wp-block-cover__inner-container">
			<!-- wp:group {"className":"","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
			<div class="wp-block-group">
				<!-- wp:image {"width":"96px","sizeSlug":"full","linkDestination":"none","className":"","style":{"color":{"duotone":"var:preset|duotone|foreground-background"}}} -->
				<figure class="wp-block-image size-full is-resized">
					<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/greyd-logo-white.svg" alt="" style="width:96px" />
				</figure>
				<!-- /wp:image -->
			</div>
			<!-- /wp:group -->

			<!-- wp:quote {"align":"center","className":"is-style-plain"} -->
			<blockquote class="wp-block-quote has-text-align-center is-style-plain">
				<!-- wp:paragraph {"align":"center","className":""} -->
				<p class="has-text-align-center"><?php esc_html_e( '“Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.”', 'greyd-wp' ); ?></p>
				<!-- /wp:paragraph -->
				
				<cite><?php esc_html_e( 'John Doe – Managing Director', 'greyd-wp' ); ?></cite>
			</blockquote>
			<!-- /wp:quote -->
		</div>
	</div>
	<!-- /wp:cover -->
</div>
<!-- /wp:group -->