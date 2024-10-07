<?php
/**
 * Advanced Global Styles.
 *
 * @package Greyd
 */
namespace Greyd\Theme;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

new Global_Styles();
class Global_Styles {

	/**
	 * Whether debug mode is enabled.
	 */
	const DEBUG = false;

	/**
	 * Class constructor.
	 */
	public function __construct() {

		add_filter( 'greyd_dashboard_active_panels', array( $this, 'add_greyd_dashboard_panel' ) );
		add_action( 'enqueue_block_editor_assets', array( $this, 'block_editor_scripts' ), 13 );

		// ajax handler
		add_action( 'wp_ajax_greyd_global_styles_ajax', array( $this, 'handle_greyd_ajax_request' ) );
		add_action( 'after_setup_theme', function() {

			/**
			 * @since 2.3.0
			 * By setting the query parameter ?repair_global_styles=1, users can fix faulty
			 * global-styles settings, often caused by core overwriting default settings for
			 * specific blocks.
			 */
			if ( isset( $_GET['repair_global_styles'] ) ) {
				$this->fix_global_styles_settings();
			}
		} );

		// fix fluid typography settings
		add_filter( 'wp_theme_json_data_user', array( $this, 'filter_theme_json_data_user_to_fix_fluid_typography_settings' ), 0 );
	}

	/**
	 * Add dashboard panel
	 *
	 * @see filter 'greyd_dashboard_panels'
	 */
	public function add_greyd_dashboard_panel( $panels ) {
		$panels[ 'greyd-global-styles' ] = true;
		return $panels;
	}

	/**
	 * Enqueue Block Editor Styles & Scripts.
	 */
	public function block_editor_scripts() {
		
		// editor styles
		wp_register_style(
			'greyd-wp-global-styles',
			get_template_directory_uri().'/assets/css/global-styles.css',
			array( ),
			wp_get_theme()->get( 'Version' )
		);
		wp_enqueue_style('greyd-wp-global-styles');

		// enqueue /assets/js/styles.js
		wp_register_script(
			'greyd-wp-global-styles-script',
			get_template_directory_uri() . '/assets/js/global-styles.js',
			array( 'greyd-components', 'wp-data', 'wp-blocks', 'wp-element', 'wp-editor', 'wp-components', 'wp-i18n', 'lodash' ),
			wp_get_theme()->get( 'Version' ),
			true
		);
		wp_enqueue_script( 'greyd-wp-global-styles-script' );

		// localize the script
		wp_localize_script(
			'greyd-wp-global-styles-script',
			'global_styles_admin',
			array(
				'ajax_url' => admin_url( 'admin-ajax.php' ),
				'nonce'    => wp_create_nonce( 'greyd-global-styles' ),
			)
		);

		// script translations
		if ( function_exists( 'wp_set_script_translations' ) ) {
			wp_set_script_translations( 'greyd-wp-global-styles-script', 'greyd-wp' );
		}

	}


	/**
	 * =================================================================
	 *                          AJAX HANDLER
	 * =================================================================
	 */

	/**
	 * Handle the basic ajax request
	 */
	public function handle_greyd_ajax_request() {

		// invalid ajax request
		if ( ! check_ajax_referer( 'greyd-global-styles' ) ) {
			$this->finish();
			return;
		}

		if ( ! current_user_can( 'edit_theme_options' ) ) {
			$this->finish();
			return;
		}

		// early exit
		if ( ! isset( $_POST['mode'] ) ) {
			wp_die( "error::The POST variable 'mode' needs to be set." );
		}

		// start
		$mode = $_POST['mode'];
		if ( self::DEBUG ) {
			echo "\r\n\r\n" . '------------- debug start -------------' . "\r\n\r\n" . 'MODE: ' . esc_html( $mode ) . "\r\n";
		}

		// get post-data
		if ( ! isset( $_POST['data'] ) ) {
			$this->finish( 'error::No data found.' );
		}
		$post_data = $_POST['data'];

		/**
		 * Get Global Styles Post ID
		 * create if not present
		 */
		if ( $mode === 'get_global_styles_id' ) {
			if ( self::DEBUG ) {
				echo "\r\n\r\n" . 'GET STYLES ID';
			}

			$id = $this->get_global_styles_id();

			if ( ! $id ) {
				$this->finish( 'error::unable to read global styles post' );
			}

			$this->finish( 'success::' . '{}' . '::' . $id );
		}

		/**
		 * Get merged Global Styles data
		 */
		if ( $mode === 'get_global_styles_data' ) {
			if ( self::DEBUG ) {
				echo "\r\n\r\n" . 'GET STYLES';
			}

			$id      = $this->get_global_styles_id();
			$content = $this->get_global_styles_data();

			if ( ! $id || empty( $content ) ) {
				$this->finish( 'error::unable to read global styles post' );
			}

			$this->finish( 'success::' . rawurlencode( wp_json_encode( $content ) ) . '::' . $id );
		}

		/**
		 * Set Global Styles.
		 */
		if ( $mode === 'set_global_styles' ) {
			if ( self::DEBUG ) {
				echo "\r\n\r\n" . 'MODIFY STYLES';
			}

			if ( ! isset( $post_data['id'] ) || ! isset( $post_data['values'] ) ) {
				$this->finish( 'error::unable to modify styles post: ' . $post_data['id'] );
			}

			$result = $this->set_global_styles( $post_data['id'], $post_data['values'] );

			// check if there was an error updating
			if ( is_wp_error( $result ) ) {
				if ( self::DEBUG ) {
					echo "\r\n" . esc_html( "* error updating styles post \"{$post_data['id']}\":" );
				}
				echo "\r\n" . esc_html( $result->get_error_message() );
			}

			if ( self::DEBUG ) {
				echo "\r\n" . esc_html( "* styles post \"{$post_data['id']}\" successfully updated." );
			}

			$this->fix_global_styles_settings();

			$this->finish( "success::styles post <strong>{$post_data['id']}</strong> modified with new values" );
		}

		$this->finish( 'error::unknown inquery' );
	}

	/**
	 * Get Global Styles Post ID.
	 * create if not present.
	 *
	 * @return int|null
	 */
	public function get_global_styles_id() {

		if ( class_exists( 'WP_Theme_JSON_Resolver_Gutenberg' ) ) {
			return \WP_Theme_JSON_Resolver_Gutenberg::get_user_global_styles_post_id();
		} elseif ( class_exists( 'WP_Theme_JSON_Resolver' ) ) {
			return \WP_Theme_JSON_Resolver::get_user_global_styles_post_id();
		}
		return null;
	}

	/**
	 * Get merged Global Styles data.
	 *
	 * @return array
	 */
	public function get_global_styles_data() {

		if ( class_exists( 'WP_Theme_JSON_Resolver_Gutenberg' ) ) {
			return \WP_Theme_JSON_Resolver_Gutenberg::get_merged_data()->get_settings();
		} elseif ( class_exists( 'WP_Theme_JSON_Resolver' ) ) {
			return \WP_Theme_JSON_Resolver::get_merged_data()->get_settings();
		}
		return array();
	}

	/**
	 * Update Global Styles post.
	 *
	 * @param int   $post_id          WP_Post ID of the global styles post.
	 * @param array $style_values   Values to be set.
	 *
	 * @return int|WP_Error         The post ID on success. The value 0 or WP_Error on failure.
	 */
	public function set_global_styles( $post_id, array $style_values ) {

		// get global-styles post content
		$content = get_post_field( 'post_content', $post_id );
		$data    = json_decode( $content );
		
		// set new values
		foreach ( $style_values as $key => $value ) {
			$data = $this->set_style( $data, $key, stripslashes($value) );
		}

		// generate new content
		$new_content = wp_json_encode( $data );
		if ( ! is_string( $new_content ) ) {
			return new \WP_Error( 422, 'Global styles post could not be encoded.' );
		}

		/**
		 * Update styles post.
		 * @see https://developer.wordpress.org/reference/functions/wp_update_post/
		 * 
		 * @since 1.10.0 added wp_slash() to fix newlines (\n) in global css.
		 * 
		 * @return int|WP_Error
		 */
		return wp_update_post(
			array(
				'ID'           => $post_id,
				'post_content' => wp_slash($new_content),
			)
		);
	}

	/**
	 * Set single Style to @param $data
	 *
	 * @param object $data json_decoded raw global_styles post content.
	 * @param string $key Name of css var to modify.
	 * @param string $value New Value of $key.
	 * @return object   $data with changed Value.
	 */
	public function set_style( $data, $key, $value ) {

		if ( self::DEBUG ) {
			echo esc_html( "\r\n\r\n" . "MODIFY: $key => $value" );
		}

		$fontSizes = array(
			'--wp--preset--font-size--tiny',
			'--wp--preset--font-size--small',
			'--wp--preset--font-size--base',
			'--wp--preset--font-size--medium',
			'--wp--preset--font-size--large',
			'--wp--preset--font-size--x-large',
			'--wp--preset--font-size--xx-large',
			'--wp--preset--font-size--xxx-large',
		);
		$fontFamilies = array(
			'--wp--preset--font-family--body',
			'--wp--preset--font-family--heading',
			'--wp--preset--font-family--highlight',
		);

		$spacingSizes = array(
			'--wp--preset--spacing--tiny',
			'--wp--preset--spacing--small',
			'--wp--preset--spacing--medium',
			'--wp--preset--spacing--large',
			'--wp--preset--spacing--x-large',
		);

		if ( in_array( $key, $fontSizes ) ) {
			// set fontsize
			$data  = $this->check_data_settings( $data, array( 'typography', 'fontSizes' ) );
			$slug  = str_replace( '--wp--preset--font-size--', '', $key );
			$sizes = $data->settings->typography->fontSizes->theme;
			for ( $i = 0; $i < count( $sizes ); $i++ ) {
				if ( $sizes[ $i ]->slug == $slug ) {
					// set theme value

					preg_match( "/\(([^,]*)(?:, [^,]*)*, ([^\)]*)\)*/", $value, $matches );
					if ( $matches ) {
						$min = $matches[ 1 ];
						$max = $matches[ 2 ];
						$data->settings->typography->fontSizes->theme[ $i ]->fluid = (object) array();
						$data->settings->typography->fontSizes->theme[ $i ]->fluid->min = $min;
						$data->settings->typography->fontSizes->theme[ $i ]->fluid->max = $max;
						$data->settings->typography->fontSizes->theme[ $i ]->size = $max;
					}
					else {
						$data->settings->typography->fontSizes->theme[ $i ]->fluid = false;
						$data->settings->typography->fontSizes->theme[ $i ]->size = $value;
					}
					break;
				}
			}
		}
		elseif ( in_array( $key, $fontFamilies ) ) {
			// set fontfamily
			$data  = $this->check_data_settings( $data, array( 'typography', 'fontFamilies' ) );
			$slug  = str_replace( '--wp--preset--font-family--', '', $key );
			$fonts = $data->settings->typography->fontFamilies->theme;
			for ( $i = 0; $i < count( $fonts ); $i++ ) {
				if ( $fonts[ $i ]->slug == $slug ) {
					// set theme value
					$font = Fonts::get_font_style( $value );
					$data->settings->typography->fontFamilies->theme[ $i ]->fontFamily = $font['fontFamily'];
					if ( $font['fontFace'] ) {
						$data->settings->typography->fontFamilies->theme[$i]->fontFace = $font['fontFace'];
					}
					else {
						unset($data->settings->typography->fontFamilies->theme[$i]->fontFace);
					}
					break;
				}
			}
		}
		elseif ( in_array( $key, $spacingSizes ) ) {
			// set fontsize
			$data  = $this->check_data_settings( $data, array( 'spacing', 'spacingSizes' ) );
			$slug  = str_replace( '--wp--preset--spacing--', '', $key );
			$sizes = $data->settings->spacing->spacingSizes->theme;
			for ( $i = 0; $i < count( $sizes ); $i++ ) {
				if ( $sizes[ $i ]->slug == $slug ) {
					// set theme value
					$data->settings->spacing->spacingSizes->theme[ $i ]->size = $value;
					break;
				}
			}
		}
		elseif ( strpos( $key, '--wp--custom--' ) === 0 ) {
			// set custom variable
			$slugs = explode( '--', str_replace( '--wp--', '', $key ) );
			for ( $i = 0; $i < count( $slugs ); $i++ ) {
				// make camelCase
				$slug = explode( '-', $slugs[ $i ] );
				if ( count( $slug ) > 1 ) {
					for ( $j = 1; $j < count( $slug ); $j++ ) {
						$slug[ $j ] = ucwords( $slug[ $j ] );
					}
				}
				$slugs[ $i ] = implode( '', $slug );
			}
			$data = $this->set_data_settings( $data, $slugs, $value );
		}

		return $data;
	}

	/**
	 * Set value theme data for Setting
	 *
	 * @param object $data json_decoded raw global_styles post content.
	 * @param array  $setting Path to Setting in theme.json.
	 * @param string $value Value to set.
	 * @return object   $data with updated setting value.
	 */
	public function set_data_settings( $data, $setting, $value ) {
		// Check theme data for Setting
		$data = $this->check_data_settings( $data, $setting );
		// search and set value
		$search = $data->settings;
		for ( $i = 0; $i < count( $setting ); $i++ ) {
			if ( $i == count( $setting ) - 1 ) {
				$search->{$setting[ $i ]} = $value;
			} else {
				$search = $search->{$setting[ $i ]};
			}
		}

		return $data;
	}

	/**
	 * Check theme data for Setting
	 * add default from theme.json if not present.
	 *
	 * @param object $data json_decoded raw global_styles post content.
	 * @param array  $setting Path to Setting in theme.json.
	 * @return object   $data with added default setting.
	 */
	public function check_data_settings( $data, $setting ) {

		if ( ! isset( $data->settings ) || is_array( $data->settings ) ) {
			$data->settings = (object) array();
		}

		$search = $data->settings;
		for ( $i = 0; $i < count( $setting ); $i++ ) {
			if ( ! isset( $search->{$setting[ $i ]} ) ) {
				if ( $i == count( $setting ) - 1 ) {
					$search->{$setting[ $i ]} = $this->get_default_settings( $setting );
				} else {
					$search->{$setting[ $i ]} = (object) array();
				}
			}
			$search = $search->{$setting[ $i ]};
		}

		return $data;
	}

	/**
	 * Get default values from theme data (theme.json)
	 *
	 * @param array $setting Path to Setting in theme.json.
	 * @return object   Default Values for Setting or empty object.
	 */
	public function get_default_settings( $setting ) {

		if ( class_exists( 'WP_Theme_JSON_Resolver_Gutenberg' ) ) {
			$data = \WP_Theme_JSON_Resolver_Gutenberg::get_theme_data()->get_settings();
		} elseif ( class_exists( 'WP_Theme_JSON_Resolver' ) ) {
			$data = \WP_Theme_JSON_Resolver::get_theme_data()->get_settings();
		}

		if ( ! empty( $data ) ) {
			$error = false;
			for ( $i = 0; $i < count( $setting ); $i++ ) {
				if ( isset( $data[ $setting[ $i ] ] ) ) {
					$data = $data[ $setting[ $i ] ];
				} elseif ( isset( $data->{$setting[ $i ]} ) ) {
					$data = $data->{$setting[ $i ]};
				} else {
					$error = true;
					break;
				}
			}
			if ( ! $error ) {
				return json_decode( wp_json_encode( $data ) );
			}
		}

		return (object) array();
	}

	/*
	 * Die and send answer back to JS
	 * basically the same as 'wp_die', but with debug logging
	 */
	public function finish( $msg = '' ) {
		if ( self::DEBUG ) {
			echo "\r\n\r\n" . '------------- debug end -------------' . "\r\n\r\n";
		}
		wp_die( esc_html( $msg ) );
	}

	/**
	 * Check for faulty global-styles settings->blocks.
	 * Sometimes some default settings are saved for specific block,
	 * while that is valid accoring to core, it messes up our global-styles.
	 * https://developer.wordpress.org/block-editor/how-to-guides/themes/theme-json/#settings
	 * Hence, we delete those faulty settings to fix Editor- and Rendering-Problems
	 */
	public function fix_global_styles_settings() {

		$post_id = $this->get_global_styles_id();

		if ( ! $post_id ) return;

		$content = get_post_field( 'post_content', $post_id );
		$data    = json_decode( $content );
		
		if (
			$data
			&& is_object($data)
			&& isset($data->settings)
			&& isset($data->settings->blocks)
		) {
			// remove faulty settings for blocks
			unset($data->settings->blocks);
			// Update styles post
			$new_content = wp_json_encode( $data );
			return wp_update_post(
				array(
					'ID'           => $post_id,
					'post_content' => wp_slash($new_content),
				)
			);
		}

	}
	
	/**
	 * Fix fluid font size presets build with dynamic units (vw, vh, %).
	 * @since 2.3.0
	 * 
	 * Current issues and limitations of the core implementation:
	 * * Fluid font sizes will only work where a font size is defined in px, em or rem units. For the
	 * * purposes of computing a “preferred font size” the algorithm will convert font sizes in px to
	 * * rem assuming a base size of `16px`, which is the equivalent of 1em or 1rem.
	 * @see https://make.wordpress.org/core/2022/10/03/fluid-font-sizes-in-wordpress-6-1/
	 *
	 * @param WP_Theme_JSON_Data $theme_json Class to access and update the underlying data.
	 * 
	 * @return WP_Theme_JSON_Data
	 */
	public function filter_theme_json_data_user_to_fix_fluid_typography_settings( $theme_json ) {

		if ( ! self::is_greyd_beta() ) {
			return $theme_json;
		}

		$update = false;
		$theme_json_data = $theme_json->get_data();

		// debug( $theme_json->get_data() );
		/**
		 * Array(
		 *   [settings] => Array(
		 *     [typography] => Array(
		 *       [fontSizes] => Array(
		 *         [theme] => Array( ... )
		 */

		if (
			isset( $theme_json_data['settings'] )
			&& isset( $theme_json_data['settings']['typography'] )
			&& isset( $theme_json_data['settings']['typography']['fontSizes'] )
			&& isset( $theme_json_data['settings']['typography']['fontSizes']['theme'] )
		) {
			foreach ( $theme_json_data['settings']['typography']['fontSizes']['theme'] as $key => $value ) {

				// debug( $value );
				/**
				 * Array(
				 *   [fluid] => Array(
				 *     [min] => .9rem
				 *     [max] => 1rem
				 *   ),
				 *   [name] => Tiny
				 *   [size] => 1rem
				 *   [slug] => tiny
				 * )
				 */

				// check if fluid is set and min and max are set
				if (
					isset( $value['fluid'] )
					&& is_array( $value['fluid'] )
					&& isset( $value['fluid']['min'] )
					&& isset( $value['fluid']['max'] )
				) {
					$min = strval( $value['fluid']['min'] );
					$max = strval( $value['fluid']['max'] );

					// if either min or max has the units: vw, vh, %
					if (
						strpos( $min, 'vw' ) !== false
						|| strpos( $min, 'vh' ) !== false
						|| strpos( $min, '%' ) !== false
						|| strpos( $max, 'vw' ) !== false
						|| strpos( $max, 'vh' ) !== false
						|| strpos( $max, '%' ) !== false
					) {
						// set static value
						$theme_json_data['settings']['typography']['fontSizes']['theme'][ $key ]['size'] = 'clamp(' . $min . ', calc((' . $min . ' + ' . $max . ') / 2 ), ' . $max . ')';

						// remove fluid to prevent core from converting it to rem
						unset( $theme_json_data['settings']['typography']['fontSizes']['theme'][ $key ]['fluid'] );

						$update = true;
					}
				}
			}
		}

		if ( $update ) {
			$theme_json->update_with( $theme_json_data );
		}

		return $theme_json;
	}
	
	/**
	 * @since 2.3.0 Is Greyd in Beta Mode?
	 */
	public function is_greyd_beta() {

		if ( defined( 'GREYD_ENABLE_BETA_BLOCKS') ) {
			return constant( 'GREYD_ENABLE_BETA_BLOCKS' );
		}

		if ( defined( 'IS_GREYD_BETA') ) {
			return constant( 'IS_GREYD_BETA' );
		}

		if ( defined( 'GUTENBERG_VERSION') ) {
			return true;
		}

		return false;
	}

}

/**
 * Debug Function
 */
if ( ! function_exists( 'debug' ) ) {
	function debug( $a, $b = false ) {
		echo '<pre>';
		! $b ? print_r( $a ) : var_dump( $a );
		echo '</pre>';
	}
}

if ( ! function_exists( 'var_error_log' ) ) {
	function var_error_log( $object = null ) {
		ob_start();                    // start buffer capture
		var_dump( $object );           // dump the values
		$contents = ob_get_contents(); // put the buffer into a variable
		ob_end_clean();                // end capture
		error_log( $contents );        // log contents of the result of var_dump( $object )
	}
}