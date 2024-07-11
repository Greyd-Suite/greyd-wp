<?php
/**
 * basic plugin setup
 */
namespace Greyd\Theme;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

new Dashboard();
class Dashboard {

	public $config = null;

	/**
	 * Hold the dashboard page config
	 * slug, title, url, cap, callback
	 *
	 * @var array
	 */
	public static $page = array();

	/**
	 * Load the class.
	 */
	public function __construct() {

		// define page details
		add_action(
			'init',
			function() {
				self::$page = array(
					'main_title' => __( 'Greyd Theme', 'greyd-wp' ),
					'slug'       => 'greyd-wp',
					'title'      => __( 'Dashboard', 'greyd-wp' ),
					'url'        => admin_url( 'admin.php?page=greyd-wp' ),
					'cap'        => 'edit_theme_options',
					'callback'   => array( $this, 'render_dashboard' ),
					'icon'       => get_template_directory_uri() . '/assets/images/greyd-logo-dark.svg',
					'homepage'   => 'https://greyd.io/?utm_source=wp-theme',
					'dashicons'  => '<span class="dashicons dashicons-update"></span><span class="dashicons dashicons-saved"></span><span class="dashicons dashicons-warning"></span>',
					'plugin'     => defined( 'GREYD_VERSION' ),
				);
			},
			0
		);

		// make theme dashboard only available to users with the right permissions
		if ( current_user_can( 'edit_theme_options' ) ) {
			// ADMIN NAVI
			// add the menu
			add_action( 'admin_menu', array( $this, 'add_submenu' ), 1 );

			// general UI
			add_action( 'admin_enqueue_scripts', array( $this, 'load_backend_scripts' ), 9 );

			// add greyd header
			add_action( 'in_admin_header', array( $this, 'add_greyd_header' ), 1 );

			// greyd admin notice
			add_action( 'admin_notices', array( $this, 'render_greyd_notice' ) );

			// get adminbar colors
			add_action( 'admin_head', array( $this, 'get_wp_admin_css_colors' ) );

			// save admin notice dismissal
			add_action( 'wp_ajax_hide_dismissible_admin_notice', array( $this, 'hide_dismissible_admin_notice' ) );
		}
	}


	/*
	====================================================================================
		Admin Menu
	====================================================================================
	*/

	/**
	 * Add the Greyd Theme Dashboard to the Appearance menu.
	 */
	public function add_submenu() {

		add_submenu_page(
			'themes.php', // parent slug
			self::$page['main_title'] . ' ' . self::$page['title'], // page title
			self::$page['main_title'], // menu title
			self::$page['cap'], // capability
			self::$page['slug'], // slug
			self::$page['callback'], // callback
			2 // position
		);

	}

	/*
	====================================================================================
		Backend
	====================================================================================
	*/

	/**
	 * add basic scripts
	 */
	public function load_backend_scripts( $hook ) {
		// Only load files on Greyd Dashboard page
		if ( $hook !== 'appearance_page_greyd-wp' ) {
			return;
		}

		// Styles
		wp_register_style(
			'greyd-wp-admin-style',
			get_template_directory_uri() . '/inc/dashboard/assets/css/admin-dashboard.css',
			null,
			wp_get_theme()->get( 'Version' )
		);
		wp_enqueue_style( 'greyd-wp-admin-style' );

		// Scripts
		wp_register_script(
			'greyd-wp-admin-script',
			get_template_directory_uri() . '/inc/dashboard/assets/js/admin-dashboard.js',
			null,
			wp_get_theme()->get( 'Version' ),
			array(
				'strategy'  => 'defer',
			)
		);
		wp_enqueue_script( 'greyd-wp-admin-script' );
		wp_localize_script(
			'greyd-wp-admin-script',
			'ajax_var',
			array(
				'url'          => admin_url( 'admin-ajax.php' ),
				'nonce'        => wp_create_nonce( 'ajax-nonce' ),
			)
		);
	}

	/**
	 * add Greyd CI
	 */
	public function add_greyd_header() {

		$screen = get_current_screen();

		// only render on our page
		if ( $screen->base !== 'appearance_page_greyd-wp' ) {
			return;
		}

		// render
		echo '<div class="greyd_dashboard--header">';
		echo '<div class="greyd_dashboard--header--content">';
		echo '<div class="greyd_dashboard--header--content-title">';
		echo '<a class="greyd_admin_logo" href="' . esc_url( self::$page['homepage'] ) . '" target="_blank" title="' .  esc_html__( 'Greyd Website', 'greyd-wp' ) . '"><img src="' . esc_url( self::$page['icon'] ) . '" width="46" alt="' . esc_attr__( 'Greyd Logo', 'greyd-wp' ) . '" /></a>';
		echo '<h1>' . esc_html__( 'Welcome to the Greyd Theme', 'greyd-wp' ) . '</h1>';
		echo '</div>';
		echo '<div class="greyd_dashboard--header--content-button">';
		if ( self::$page['plugin'] ) {
			echo '<a class="greyd_admin_link--outline" href="' . esc_url( admin_url( 'admin.php?page=greyd_dashboard' ) ) . '"><span class="text">' . esc_html__( 'Go to Plugin Dashboard', 'greyd-wp' ) . ' →</span></a>';
		} else {
			echo '<a class="greyd_admin_link--outline" href="https://greyd.io/?utm_source=wp-theme"><span class="text">' . esc_html__( 'Visit our website →', 'greyd-wp' ) . '</span></a>';
		}
		echo '</div>';
		echo '</div>';
		echo '</div>';
	}

	/*
	====================================================================================
		Dashboard
	====================================================================================
	*/

	/**
	 * render Dashboard Page
	 */
	public function render_dashboard() {

		// setup panels
		$active_panels = array(
			/*
			'slug' => array(
				title:     title of the panel (required)
				descr:     description for the panel (optional)
				image:     image for the top section (required)
				image-alt: alt text for the image (optional)
				help_url:  link to the helpcenter article (optional)
				btn_text:   text for the button (required)
				btn_url:    url for the button (required)
				cap:       capability for the panel (required)
				priority:  position of the panel (optional, 0: first, 99: last, defaults to 10)
			)
			*/
			'global-styles'       => array(
				'title'     => __( 'Global Styles', 'greyd-wp' ),
				'descr'     => __( 'Define colors, spacings and more globally for your entire website.', 'greyd-wp' ),
				'image'     => get_template_directory_uri() . '/inc/dashboard/assets/img/global-styles.jpg',
				'image-alt' => __( 'Screenshot of the Global Styles in the Site Editor', 'greyd-wp' ),
				'btn_text'  => __( 'Open Global Styles', 'greyd-wp' ),
				'btn_url'   => admin_url( 'site-editor.php?canvas=edit' ),
				'cap'       => 'edit_theme_options',
				'priority'  => 1,
			),
			'template-editor'     => array(
				'title'     => __( 'Template Editor', 'greyd-wp' ),
				'descr'     => __( 'Create and edit templates, patterns and template parts.', 'greyd-wp' ),
				'image'     => get_template_directory_uri() . '/inc/dashboard/assets/img/template-editor.jpg',
				'image-alt' => __( 'Screenshot of the Browse Mode in the Site Editor', 'greyd-wp' ),
				'btn_text'  => __( 'Open Template Editor', 'greyd-wp' ),
				'btn_url'   => admin_url( 'site-editor.php' ),
				'cap'       => 'edit_theme_options',
				'priority'  => 1,
			),
			'greyd-global-styles' => array(
				'title'     => __( 'Greyd Global Styles', 'greyd-wp' ),
				'descr'     => __( 'Additional global styles and responsive options.', 'greyd-wp' ),
				'image'     => get_template_directory_uri() . '/inc/dashboard/assets/img/greyd-styles.jpg',
				'image-alt' => __( 'Screenshot of the Greyd Global Styles in the Site Editor sidebar', 'greyd-wp' ),
				'btn_text'  => __( 'Open Greyd Global Styles', 'greyd-wp' ),
				'btn_url'   => admin_url( 'site-editor.php?canvas=edit&greyd-styles=open' ),
				'cap'       => 'edit_theme_options',
				'priority'  => 1,
			),
		);

		// sort panels by priority
		usort(
			$active_panels,
			function( $a, $b ) {
				return $a['priority'] - $b['priority'];
			}
		);

		// Discover more panels
		$discover_panels = array(
			/*
			'slug' => array(
				title:     title of the panel (required)
				descr:     description for the panel (optional)
				image:     image for the top section (required)
				image-alt: alt text for the image (optional)
				help_url:  link to the helpcenter article (optional)
				cap:       capability for the panel (required)
				priority:  position of the panel (optional, 0: first, 99: last, defaults to 10)
			)
			*/
			'dynamic-templates'  => array(
				'title'     => __( 'Dynamic Templates', 'greyd-wp' ),
				'descr'     => __( 'Flexible layout templates that can be used with different content at different places.', 'greyd-wp' ),
				'image'     => get_template_directory_uri() . '/inc/dashboard/assets/img/dynamic-templates.jpg',
				'image-alt' => '',
				'help_url'  => 'https://greyd.io/dynamic-templates/?utm_source=wp-theme',
				'cap'       => 'edit_theme_options',
				'priority'  => 1,
			),
			'greyd-hub'          => array(
				'title'     => __( 'Greyd.Hub', 'greyd-wp' ),
				'descr'     => __( 'Website management platform with numerous admin features like staging sites, backups & migration assistant.', 'greyd-wp' ),
				'image'     => get_template_directory_uri() . '/inc/dashboard/assets/img/greyd-hub.jpg',
				'image-alt' => '',
				'help_url'  => 'https://greyd.io/greyd-hub/?utm_source=wp-theme',
				'cap'       => 'edit_plugins',
				'priority'  => 1,
			),
			'global-content'     => array(
				'title'     => __( 'Global Content', 'greyd-wp' ),
				'descr'     => __( 'Synchronize content on any number of websites - even across installations.', 'greyd-wp' ),
				'image'     => get_template_directory_uri() . '/inc/dashboard/assets/img/global-content.jpg',
				'image-alt' => '',
				'help_url'  => 'https://greyd.io/global-content/?utm_source=wp-theme',
				'cap'       => 'edit_plugins',
				'priority'  => 1,
			),
			'dynamic-post-types' => array(
				'title'     => __( 'Dynamic Post Types', 'greyd-wp' ),
				'descr'     => __( 'Custom post types and taxonomies for easier content management and maximum flexibility in design.', 'greyd-wp' ),
				'image'     => get_template_directory_uri() . '/inc/dashboard/assets/img/posttypes.jpg',
				'image-alt' => '',
				'help_url'  => 'https://greyd.io/dynamic-post-types/?utm_source=wp-theme',
				'cap'       => 'edit_theme_options',
				'priority'  => 1,
			),
			'greyd-forms'        => array(
				'title'     => __( 'Greyd.Forms', 'greyd-wp' ),
				'descr'     => __( 'Powerful form generator with many interfaces, native double opt-in, and much more.', 'greyd-wp' ),
				'image'     => get_template_directory_uri() . '/inc/dashboard/assets/img/greyd-forms.jpg',
				'image-alt' => '',
				'help_url'  => 'https://greyd.io/greyd-forms/?utm_source=wp-theme',
				'cap'       => 'edit_plugins',
				'priority'  => 1,
			),
			'site-connector'      => array(
				'title'     => __( 'Site Connector', 'greyd-wp' ),
				'descr'     => __( 'Connect any number of websites, whether they are individual sites or entire multisite installations.', 'greyd-wp' ),
				'image'     => get_template_directory_uri() . '/inc/dashboard/assets/img/site-connector.jpg',
				'image_alt' => '',
				'help_url'  => 'https://greyd.io/site-connector/?utm_source=wp-theme',
				'cap'       => 'edit_plugins',
				'priority'  => 8,
			),
			'popups'    => array(
				'title'     => __( 'Greyd.Popups', 'greyd-wp' ),
				'descr'     => __( 'Create custom popups with a wide range of triggers and conditions.', 'greyd-wp' ),
				'image'     => get_template_directory_uri() . '/inc/dashboard/assets/img/popups.jpg',
				'image-alt' => '',
				'help_url'  => 'https://greyd.io/greyd-popups/?utm_source=wp-theme',
				'cap'       => 'edit_users',
				'priority'  => 1,
			),
			'dynamic-content'    => array(
				'title'     => __( 'Dynamic Content', 'greyd-wp' ),
				'descr'     => __( 'Use conditions on your pages and in your forms to personalize your website for different users.', 'greyd-wp' ),
				'image'     => get_template_directory_uri() . '/inc/dashboard/assets/img/dynamic-content.png',
				'image-alt' => '',
				'help_url'  => 'https://greyd.io/dynamic-content/?utm_source=wp-theme',
				'cap'       => 'edit_users',
				'priority'  => 1,
			),
		);

		// sort panels by priority
		usort(
			$discover_panels,
			function( $a, $b ) {
				return $a['priority'] - $b['priority'];
			}
		);

		?>
		<div class="wrap" style="<?php echo esc_attr( self::get_admin_bar_color() ); ?>">

			<div class="greyd_dashboard">
				<section class="greyd_dashboard--main">
					<?php if ( self::$page['plugin'] ) { ?>
						<section class="greyd_dashboard--main--plugin-active">
							<?php // There needs to be a hidden h2 for the Admin Notices to be shown in the correct position, as WP directly inserts it after the first h1 or h2 in the .wrap class. ?>
							<h2 class="visually-hidden" aria-hidden="true"></h2>
							<div class="greyd_dashboard--main--active-features--top">
								<div class="greyd_dashboard--main--active-features--top-left">
									<h2><?php esc_html_e( 'Discover more features', 'greyd-wp' ); ?></h2>
									<p><?php esc_html_e( 'The Greyd Plugin is active. You can find a more detailed overview of all active features in the Plugin Dashboard.', 'greyd-wp' ); ?></p>
								</div>
								<div class="greyd_dashboard--main--active-features--top-right">
									<a class="greyd_admin_link greyd_admin_link--dark" href="<?php echo esc_url( admin_url( 'admin.php?page=greyd_dashboard' ) ); ?>"><span class="text"><?php esc_html_e( 'Go to Plugin Dashboard', 'greyd-wp' ); ?></span></a>
								</div>
							</div>
						</section>
					<?php } ?>
					<div class="greyd_dashboard--main--active-features">

						<?php if ( ! self::$page['plugin'] ) { ?>
							<?php // There needs to be a hidden h2 for the Admin Notices to be shown in the correct position, as WP directly inserts it after the first h1 or h2 in the .wrap class. ?>
							<h2 class="visually-hidden" aria-hidden="true"></h2>
						<?php } ?>

						<div class="greyd_dashboard--main--active-features--top">
							<div class="greyd_dashboard--main--active-features--top-left">
								<h2><?php esc_html_e( 'Active Features', 'greyd-wp' ); ?></h2>
								<p><?php esc_html_e( 'These are the features of the Greyd Theme. Use them now or learn more about them in our Helpcenter.', 'greyd-wp' ); ?></p>
							</div>
							<div class="greyd_dashboard--main--active-features--top-right">
								<?php if ( self::$page['plugin'] ) { ?>
									<a class="greyd_admin_link--outline" href="https://helpcenter.greyd.io/?utm_source=wp-theme" target="_blank"><span class="text"><?php esc_html_e( 'Helpcenter →', 'greyd-wp' ); ?></span></a>
								<?php } else { ?>
									<a class="greyd_admin_link--outline" href="https://greyd.io/greyd-wp/#tutorial?utm_source=wp-theme" target="_blank"><span class="text"><?php esc_html_e( 'Theme Tutorial →', 'greyd-wp' ); ?></span></a>
								<?php } ?>
							</div>
						</div>

						<div class="greyd_dashboard--feature-grid greyd_dashboard--active-panels">
							<?php
							foreach ( $active_panels as $panel ) {

								if ( isset( $panel['cap'] ) && ! current_user_can( $panel['cap'] ) ) {
									continue;
								}

								echo sprintf(
									'<div class="greyd_dashboard--feature">
										<img class="greyd_dashboard--feature--image" src="%s" alt="%s">
										<div class="greyd_dashboard--feature--content">
											<h3 class="greyd_dashboard--feature--title">%s</h3>
											<div class="greyd_dashboard--feature--desc">
												<p class="greyd_dashboard--feature--desc-text">%s</p>
												<p class="greyd_dashboard--feature--helplink"><a href="%s" target="_blank">%s</a></p>
											</div>
											<div class="greyd_dashboard--feature--button">
												<a href="%s" class="greyd_admin_link">%s</a>
											</div>
										</div>
									</div>',
									esc_url( $panel['image'] ),
									isset( $panel['image-alt'] ) ? esc_attr( $panel['image-alt'] ) : '',
									esc_html( $panel['title'] ),
									isset( $panel['descr'] ) ? esc_html( $panel['descr'] ) : '',
									isset( $panel['help_url'] ) ? esc_url( $panel['help_url'] ) : '',
									isset( $panel['help_url'] ) ? esc_html__( 'More Information →', 'greyd-wp' ) : '',
									isset( $panel['btn_url'] ) ? esc_url( $panel['btn_url'] ) : '',
									isset( $panel['btn_text'] ) ? esc_html( $panel['btn_text'] ) : '',
								);
							}
							?>
						</div>
					</div>

					<?php if ( ! self::$page['plugin'] ) { ?>
						<div class="greyd_dashboard--main--more-features">
							<div class="greyd_dashboard--main--active-features--top">
								<div class="greyd_dashboard--main--active-features--top-left">
									<h2><?php esc_html_e( 'Discover more features', 'greyd-wp' ); ?></h2>
									<p><?php esc_html_e( 'We offer a lot more functionality in Greyd.Suite - your all-in-one WordPress suite. Watch a demo on our website and test Greyd.Suite for free.', 'greyd-wp' ); ?></p>
								</div>
								<div class="greyd_dashboard--main--active-features--top-right">
									<a class="greyd_admin_link--outline" href="https://greyd.io/demo/?utm_source=wp-theme" target="_blank"><span class="text"><?php esc_html_e( 'Watch a demo →', 'greyd-wp' ); ?></span></a>
								</div>
							</div>

							<div class="greyd_dashboard--feature-grid greyd_dashboard--discover-panels">
								<?php
								foreach ( $discover_panels as $panel ) {

									if ( isset( $panel['cap'] ) && ! current_user_can( $panel['cap'] ) ) {
										continue;
									}

									echo sprintf(
										'<div class="greyd_dashboard--feature">
											<img class="greyd_dashboard--feature--image" src="%s" alt="%s">
											<div class="greyd_dashboard--feature--content">
												<h3 class="greyd_dashboard--feature--title">%s</h3>
												<div class="greyd_dashboard--feature--desc">
													<p class="greyd_dashboard--feature--desc-text">%s</p>
													<p class="greyd_dashboard--feature--helplink"><a href="%s" target="_blank">%s</a></p>
												</div>
											</div>
										</div>',
										esc_url( $panel['image'] ),
										isset( $panel['image-alt'] ) ? esc_attr( $panel['image-alt'] ) : '',
										esc_html( $panel['title'] ),
										isset( $panel['descr'] ) ? esc_html( $panel['descr'] ) : '',
										isset( $panel['help_url'] ) ? esc_url( $panel['help_url'] ) : '',
										isset( $panel['help_url'] ) ? esc_html__( 'More Information →', 'greyd-wp' ) : '',
									);
								}
								?>
							</div>
						</div>
					<?php } ?>
				</section>

				<aside class="greyd_dashboard--sidebar">
					<div class="greyd_dashboard--sidebar--need-help">
						<h2><?php esc_html_e( 'Need Help?', 'greyd-wp' ); ?></h2>
						<p><?php esc_html_e( 'In case you need help with our theme, check out the following resources:', 'greyd-wp' ); ?></p>
						<ul>
							<li><a href="https://wordpress.org/support/theme/greyd-wp" target="_blank"><?php esc_html_e( 'Support Forum on WordPress.org →', 'greyd-wp' ); ?></a></li>
							<li>
								<?php if ( self::$page['plugin'] ) { ?>
									<a href="https://helpcenter.greyd.io/?utm_source=wp-theme" target="_blank"><?php esc_html_e( 'Helpcenter →', 'greyd-wp' ); ?></a>
								<?php } else { ?>
									<a href="https://greyd.io/greyd-wp/#tutorial?utm_source=wp-theme" target="_blank"><?php esc_html_e( 'Theme Tutorial →', 'greyd-wp' ); ?></a>
								<?php } ?>
							</li>
							<li><a href="https://greyd.io/greyd-wp/#faq/?utm_source=wp-theme" target="_blank"><?php esc_html_e( 'FAQs →', 'greyd-wp' ); ?></a></li>
						</ul>
					</div>
					<div class="greyd_dashboard--sidebar--changelog">
						<h2><?php esc_html_e( 'What\'s new?', 'greyd-wp' ); ?></h2>
						<div class="greyd-changelog">
							<?php echo wp_kses_post( self::get_changelog_content() ); ?>
						</div>
						<p><a href="https://greyd.io/changelog/?utm_source=wp-theme" target="_blank"><?php esc_html_e( 'See full changelog →', 'greyd-wp' ); ?></a></p>
					</div>
				</aside>
			</div>
		</div>

		<?php
	}


	/*
	====================================================================================
		Helper
	====================================================================================
	*/

	/**
	 * Render the greyd notice for the dashboard widget
	 */
	public static function render_greyd_notice() {
		// only render on our page
		$screen = get_current_screen();
		if ( $screen->base !== 'appearance_page_greyd-wp' ) {
			return;
		}

		$dismissed = get_option( 'greyd_theme_dismiss_admin_notice' );
		if ( $dismissed ) {
			return;
		}

		
		?>
		<div id="greyd_notice_dismiss" class="notice notice-info greyd_dashboard_notice">
			<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/greyd-logo-dark.svg' ); ?>" alt="<?php esc_attr__( 'Greyd Logo', 'greyd-wp' ); ?>" class="greyd_dashboard_notice--image">
			<div class="greyd_dashboard_notice--content">
				<h3><?php esc_html_e( 'Thank you for using the Greyd Theme', 'greyd-wp' ); ?></h3>
				<p><?php esc_html_e( 'Did you know that this theme is just the tip of the iceberg? We offer a lot more functionality in Greyd.Suite - your all-in-one WordPress suite. Watch a demo on our website and test Greyd.Suite for free.', 'greyd-wp' ); ?></p>
				<div class="greyd_dashboard_notice--buttons">
					<a class="greyd_admin_link greyd_admin_button--dark" href="https://greyd.io?utm_source=wp-theme" target="_blank"><span class="text"><?php esc_html_e( 'Visit our website →', 'greyd-wp' ); ?></span></a>
					<button class="greyd_admin_button greyd_admin_button--inline button-dismiss"><span class="text"><?php esc_html_e( 'Dismiss this notice', 'greyd-wp' ); ?></span><span class="dashicons dashicons-update"></span></button>
				</div>
			</div>
		</div>
		<?php
	}

	/**
	 * Save admin notice dismissal
	 */
	public static function hide_dismissible_admin_notice() {
		update_option( 'greyd_theme_dismiss_admin_notice', 'true' );
		echo 'Saving notice dismissal was successful';
	}

	/**
	 * Holds Admin color schemes.
	 */
	public static $wp_admin_css_colors;

	/**
	 * Get admin color schmemes. Called on 'admin_head'.
	 */
	public function get_wp_admin_css_colors() {
		global $_wp_admin_css_colors;
		self::$wp_admin_css_colors = $_wp_admin_css_colors;
	}

	/**
	 * Get admin bar color hex value.
	 *
	 * @return string
	 */
	public static function get_admin_bar_color() {
		if ( $admin_color_scheme = get_user_option( 'admin_color' ) ) {
			if ( isset( self::$wp_admin_css_colors[ $admin_color_scheme ] ) ) {
				return '--wp-admin-color-dark: ' . self::$wp_admin_css_colors[ $admin_color_scheme ]->colors[0];
			}
		}
		return '';
	}

	/**
	 * Get current changelog content.
	 *
	 * @return string
	 */
	public static function get_changelog_content() {
		$name = 'greyd_theme_changelog';
		$file = get_template_directory() . '/CHANGELOG.md';
		$changelog_content = get_transient( $name );

		if ( ! $changelog_content ) {
			if ( file_exists( $file ) ) {
				$file_contents = file_get_contents( $file );
				if ( $file_contents ) {
					$changelog_data = explode( '##', $file_contents );
					$changelog_content = '';

					foreach ( $changelog_data as $key => $value ) {
						
						$sections = explode( '**', $value ); 

						foreach ( $sections as $key => $value ) {
						
							if ( empty( $value ) ) {
								continue;
							}
				
							if ( $key === 0 ) {
								if ( str_contains( $value, '*' )) {
									$without_headline = explode( '*', $value );
									foreach ( $without_headline as $key => $value ) {
										if ( $key === 0 ) {
											$changelog_content .= '<h3>' . $value . '</h3>';
										} else {
											$changelog_content .= '<li>' . $value . '</li>';
										}
									}
									continue;
								}
							
								$changelog_content .= '<h3>' . $value . '</h3>';
							} else if ( $key === 1 || $key === 3 ) {
								$changelog_content .= '<h4>' . $value . '</h4>';
							} else {
								$entry = explode( '*', $value );

								if ( count($entry) > 1 ) {
									foreach ( $entry as $key => $value ) {
										if ( substr($value, 0, 1) == "\n" ) {
											$changelog_content .= '';
										} else {
											$changelog_content .= '<li>' . $value . '</li>';
										}
									}
								}
							}
							$changelog_content .= '</ul>';
						}
						$changelog_content .= '</br>';
					}

					set_transient(
						$name,
						$changelog_content,
						60 * 60 * 12 // 12 hours
					);
				}
			}
		}

		return empty( $changelog_content ) ? __( 'Changelog could not be loaded.', 'greyd-wp' ) : $changelog_content;
	}
}
