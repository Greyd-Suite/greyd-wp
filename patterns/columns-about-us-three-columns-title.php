<?php
/**
 * Title: About Us with Three Columns and Title
 * Slug: greyd-wp/columns-about-us-three-columns-title
 * Description:
 * Categories: greyd-columns
 * Keywords:
 * Viewport Width: 1600
 * Inserter: true
 */
?>
<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|x-large"}}},"backgroundColor":"background","className":"","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide has-background-background-color has-background" style="padding-top:var(--wp--preset--spacing--x-large);padding-bottom:var(--wp--preset--spacing--x-large)">
	<!-- wp:post-title {"textAlign":"center","level":1,"align":"wide","style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"}}}},"textColor":"primary","className":"","fontSize":"small"} /-->

	<!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|x-large"}}},"className":"","layout":{"type":"default"}} -->
	<div class="wp-block-group alignwide" style="margin-top:var(--wp--preset--spacing--small);margin-bottom:var(--wp--preset--spacing--x-large)">
		<!-- wp:heading {"textAlign":"center","align":"wide","style":{"typography":{"lineHeight":"1.3"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"className":""} -->
		<h2 class="wp-block-heading alignwide has-text-align-center" style="margin-top:0;margin-bottom:0;line-height:1.3">
			<?php esc_html_e( 'We built the tool we knew we all needed.', 'greyd-wp' ); ?><br><mark class="has-inline-color has-background-color has-foreground-background-color"><?php esc_html_e( 'Including you.', 'greyd-wp' ); ?></mark>
		</h2>
		<!-- /wp:heading -->
	</div>
	<!-- /wp:group -->

	<!-- wp:columns {"align":"wide","style":{"spacing":{"padding":{"right":"0","left":"0","top":"0","bottom":"0"}}}} -->
	<div class="wp-block-columns alignwide" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
		<!-- wp:column {"verticalAlignment":"stretch","width":"33.33%","backgroundColor":"lightest"} -->
		<div class="wp-block-column is-vertically-aligned-stretch has-lightest-background-color has-background" style="flex-basis:33.33%">
			<!-- wp:group {"style":{"border":{"radius":"4px"},"layout":{"selfStretch":"fit","flexSize":null}},"className":"","layout":{"type":"flex","orientation":"vertical","justifyContent":"left","verticalAlignment":"space-between"}} -->
			<div class="wp-block-group" style="border-radius:4px">
				<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"constrained","contentSize":"250px","justifyContent":"left"}} -->
				<div class="wp-block-group">
					<!-- wp:image {"width":"45px","height":"45px","sizeSlug":"full","linkDestination":"none","className":"","style":{"color":{"duotone":"var:preset|duotone|foreground-background"}}} -->
					<figure class="wp-block-image size-full is-resized">
						<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/greyd-logo-black.svg" alt="" style="width:45px;height:45px"/>
					</figure>
					<!-- /wp:image -->

					<!-- wp:heading {"textAlign":"left","level":3,"className":""} -->
					<h3 class="wp-block-heading has-text-align-left"><?php esc_html_e( 'Our ambition', 'greyd-wp' ); ?></h3>
					<!-- /wp:heading -->
				</div>
				<!-- /wp:group -->

				<!-- wp:paragraph {"align":"left","className":""} -->
				<p class="has-text-align-left"><?php esc_html_e( 'We spent years in the web agency and website creation industry: our biggest challenge was having to start each and every project from scratch.', 'greyd-wp' ); ?></p>
				<!-- /wp:paragraph --></div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"stretch","width":"33.33%","backgroundColor":"lightest","layout":{"type":"default"}} -->
		<div class="wp-block-column is-vertically-aligned-stretch has-lightest-background-color has-background" style="flex-basis:33.33%">
			<!-- wp:group {"style":{"border":{"radius":"4px"},"layout":{"selfStretch":"fit","flexSize":null}},"className":"","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","verticalAlignment":"space-between"}} -->
			<div class="wp-block-group" style="border-radius:4px">
				<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"},"layout":{"selfStretch":"fill","flexSize":null}},"layout":{"type":"constrained","contentSize":"220px","justifyContent":"left"}} -->
				<div class="wp-block-group">
					<!-- wp:image {"width":"45px","height":"45px","sizeSlug":"full","linkDestination":"none","className":"","style":{"color":{"duotone":"var:preset|duotone|foreground-background"}}} -->
					<figure class="wp-block-image size-full is-resized">
						<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/greyd-logo-black.svg" alt="" style="width:45px;height:45px"/>
					</figure>
					<!-- /wp:image -->

					<!-- wp:heading {"textAlign":"left","level":3,"className":""} -->
					<h3 class="wp-block-heading has-text-align-left"><?php esc_html_e( 'Our story', 'greyd-wp' ); ?></h3>
					<!-- /wp:heading -->
				</div>
				<!-- /wp:group -->

				<!-- wp:paragraph {"align":"left","className":""} -->
				<p class="has-text-align-left"><?php esc_html_e( 'Greyd was born in response to the everyday struggles people and businesses face with WordPress, where page builders, themes, and plugins often fall short.', 'greyd-wp' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"stretch","width":"33.33%","backgroundColor":"lightest"} -->
		<div class="wp-block-column is-vertically-aligned-stretch has-lightest-background-color has-background" style="flex-basis:33.33%">
			<!-- wp:group {"style":{"border":{"radius":"4px"},"layout":{"selfStretch":"fit","flexSize":null}},"className":"","layout":{"type":"flex","orientation":"vertical","verticalAlignment":"space-between","justifyContent":"left"}} -->
			<div class="wp-block-group" style="border-radius:4px">
				<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"constrained"}} -->
				<div class="wp-block-group">
					<!-- wp:image {"width":"45px","height":"45px","sizeSlug":"full","linkDestination":"none","className":"","style":{"color":{"duotone":"var:preset|duotone|foreground-background"}}} -->
					<figure class="wp-block-image size-full is-resized">
						<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/greyd-logo-black.svg" alt="" style="width:45px;height:45px"/>
					</figure>
					<!-- /wp:image -->

					<!-- wp:heading {"textAlign":"left","level":3,"className":""} -->
					<h3 class="wp-block-heading has-text-align-left"><?php esc_html_e( 'Our mission', 'greyd-wp' ); ?></h3>
					<!-- /wp:heading -->
				</div>
				<!-- /wp:group -->

				<!-- wp:paragraph {"align":"left","className":""} -->
				<p class="has-text-align-left"><?php esc_html_e( 'Join us on our mission to transform web development into a more accessible, sustainable, and inspiring journey.', 'greyd-wp' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->