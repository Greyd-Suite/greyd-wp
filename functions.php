<?php
/**
 * Main Theme Init.
 *
 * @package Greyd
 */
namespace Greyd\Theme;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// TODO: Remove?
// config vars
if ( ! defined( 'GREYD_THEME_CONFIG' ) ) {
	define(
		'GREYD_THEME_CONFIG',
		array(
			'theme_name_full' => 'Greyd Theme',
			'theme_name'      => 'greyd-theme',
			'theme_file'      => __FILE__,
			'theme_dir'       => __DIR__,
			'update_url'      => 'https://update.greyd.io/public/themes/greyd-theme/metadata.json',
		)
	);
}

/**
 * Main Theme.
 */
require_once get_template_directory() . '/inc/theme.php';

/**
 * Block editor.
 */
require_once get_template_directory() . '/inc/editor.php';

/**
 * Global Styles.
 */
require_once get_template_directory() . '/inc/global-styles.php';

/**
 * Global Fonts.
 * Keeping our own implementation for now, to help exisiting users migrate.
 */
require_once get_template_directory() . '/inc/fonts.php';

/**
 * Dashboard Interface.
 */
require_once get_template_directory() . '/inc/dashboard/dashboard.php';