<?php
/**
 * Editor Functions.
 *
 * @package Greyd
 */
namespace Greyd\Theme;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

new Editor();
class Editor {

	/**
	 * Class constructor.
	 */
	public function __construct() {
		
		if ( is_admin() ) {
			add_action( 'enqueue_block_assets', array( $this, 'add_editor_assets' ), 12 );

			add_action( 'enqueue_block_editor_assets', array( $this, 'main_tag_warning' ) );
		}
		
	}

	/**
	 * Add a warning to the editor if no main tag or too many main tags are found.
	 */
	public function main_tag_warning() {
		wp_register_script(
			'greyd-main-tag-warning',
			get_template_directory_uri() . '/assets/js/editor-main-tag-warning.js',
			array( 'wp-i18n' ),
			wp_get_theme()->get( 'Version' ),
			true
		);
		wp_enqueue_script( 'greyd-main-tag-warning' );
		if ( function_exists( 'wp_set_script_translations' ) ) {
			wp_set_script_translations( 'greyd-main-tag-warning', 'greyd-wp' );
		}
	}

	/**
	 * Enqueue editor scripts.
	 *
	 * @return void
	 */
	public function add_editor_assets() {

		if ( ! is_admin() ) return;

		/**
		 * 'greyd-style', 'greyd-components' and 'greyd-tools' are the basic blockeditor
		 * scripts, usually provided by the greyd-blocks plugin.
		 * If the Theme runs without the greyd-blocks plugin, these scripts are not
		 * registered, so they are added here as fallback.
		 */
		global $wp_styles;
		global $wp_scripts;

		if ( ! isset( $wp_styles->registered['greyd-blocks-style'] ) ) {
			wp_register_style(
				'greyd-blocks-style',
				get_template_directory_uri() . '/assets/css/greyd-blocks/editor.css',
				array(),
				wp_get_theme()->get( 'Version' )
			);
			wp_enqueue_style( 'greyd-blocks-style' );
		}

		if ( ! isset( $wp_scripts->registered['greyd-tools'] ) ) {
			wp_register_script(
				'greyd-tools',
				get_template_directory_uri() . '/assets/js/greyd-blocks/tools.js',
				array( 'wp-blocks', 'wp-dom', 'wp-i18n', 'lodash' ),
				wp_get_theme()->get( 'Version' ),
				true
			);
			wp_enqueue_script( 'greyd-tools' );
		}

		if ( ! isset( $wp_scripts->registered['greyd-components'] ) ) {
			wp_register_script(
				'greyd-components',
				get_template_directory_uri() . '/assets/js/greyd-blocks/components.js',
				array( 'wp-blocks', 'wp-element', 'wp-block-editor', 'wp-components', 'wp-i18n', 'lodash' ),
				wp_get_theme()->get( 'Version' ),
				true
			);
			wp_enqueue_script( 'greyd-components' );
		}

		if ( ! isset( $wp_scripts->registered['greyd-button-editor-script'] ) ) {
			wp_register_script(
				'greyd-core-button-editor-script',
				get_template_directory_uri() . '/assets/js/greyd-blocks/extend-core-button.js',
				array( 'wp-blocks', 'wp-element', 'wp-block-editor', 'wp-components', 'wp-i18n', 'lodash' ),
				wp_get_theme()->get( 'Version' ),
				true
			);
			wp_enqueue_script( 'greyd-core-button-editor-script' );
		}

		/**
		 * New let's register the theme scripts
		 */

		wp_register_style(
			'greyd-wp-editor-controls',
			get_template_directory_uri() . '/assets/css/editor-controls.css',
			array(),
			wp_get_theme()->get( 'Version' )
		);
		wp_enqueue_style( 'greyd-wp-editor-controls' );

		wp_register_script(
			'greyd-wp-editor-tools',
			get_template_directory_uri() . '/assets/js/editor-tools.js',
			array( 'greyd-components', 'greyd-tools', 'wp-blocks', 'wp-element', 'wp-block-editor', 'wp-components', 'wp-i18n', 'lodash' ),
			wp_get_theme()->get( 'Version' ),
			true
		);
		wp_enqueue_script( 'greyd-wp-editor-tools' );

		wp_register_script(
			'greyd-wp-editor-components',
			get_template_directory_uri() . '/assets/js/editor-components.js',
			array( 'greyd-components', 'greyd-tools', 'wp-blocks', 'wp-element', 'wp-block-editor', 'wp-components', 'wp-i18n', 'lodash' ),
			wp_get_theme()->get( 'Version' ),
			true
		);
		wp_enqueue_script( 'greyd-wp-editor-components' );

		/**
		 * Set script translations.
		 *
		 * @see https://make.wordpress.org/core/2018/11/09/new-javascript-i18n-support-in-wordpress/
		 */
		if ( function_exists( 'wp_set_script_translations' ) ) {
			wp_set_script_translations( 'greyd-wp-editor-components', 'greyd-wp' );
			wp_set_script_translations( 'greyd-wp-editor-tools', 'greyd-wp' );
		}

	}
}
