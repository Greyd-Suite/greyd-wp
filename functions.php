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