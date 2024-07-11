<?php
/**
 * Fonts Functions.
 *
 * @package Greyd
 */
namespace Greyd\Theme;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

new Fonts();
class Fonts {

	/**
	 * debug mode.
	 */
	const DEBUG = false;

	/**
	 * Class constructor.
	 */
	public function __construct() {
		
		add_action( 'init', array( $this, 'init_google_fonts' ) );
		add_action( 'wp_head', array( $this, 'print_font_faces_preload' ), 49 );
		add_action( 'enqueue_block_editor_assets', array( $this, 'block_editor_scripts' ), 14 );

		// ajax handler
		add_action( 'wp_ajax_greyd_global_styles_font_ajax', array( $this, 'handle_greyd_ajax_request' ) );

		// bc frontend
		add_action( 'wp_footer', array( $this, 'enqueue_google_fonts_bc' ) );
		// bc admin
		add_action( 'admin_init', array( $this, 'editor_google_fonts_bc' ) );
	}

	/**
	 * Get google fonts list and save in option.
	 */
	public function init_google_fonts() {

		// check old google fonts list
		$fonts = get_option( 'greyd_gfonts', false );
		if ( $fonts ) {
			// remove old option
			delete_option( 'greyd_gfonts' );
		}

		// new fonts list, details and local definitions
		$fonts = get_option( 'greyd_fonts', array( 'google_fonts_list' => array() ) );
		if ( !$fonts || count($fonts['google_fonts_list']) == 0 ) {
			$gfonts = self::get_google_fonts();
			if ( $gfonts ) {
				$fonts = array(
					'google_fonts_list' => array(),
					'google_fonts' => array(),
				);
				foreach ( $gfonts as $slug => $font ) {
					$fonts['google_fonts_list'][] = $font['family'];
					$fonts['google_fonts'][] = $font;
				}
				update_option( 'greyd_fonts', $fonts );
			}
		}

	}

	public static function get_google_fonts() {

		$fonts = json_decode( self::remote_get( 'https://fonts.google.com/metadata/fonts' ) );
		if ( $fonts && isset($fonts->familyMetadataList) ) {
			// make list
			$data = array();
			foreach ($fonts->familyMetadataList as $gfont) {
				$slug = preg_replace( '/[^a-z0-9_\-]/', '', str_replace( ' ', '-', strtolower($gfont->family) ) );
				$data[$slug] = array( 
					"family" => $gfont->family,
					"category" => $gfont->category, 
					"variants" => array_keys( (array)$gfont->fonts ),
					"modified" => $gfont->lastModified
				);
			}
			return $data;
		}
		return false;

	}
	public static function get_google_font( $family ) {

		$css = self::remote_get( "https://fonts.googleapis.com/css2?family=".$family, 
			// get woff2 format
			// https://github.com/majodev/google-webfonts-helper/blob/master/server/config.ts
			array( 'user-agent' => 'Mozilla/5.0 (Windows NT 6.3; rv:39.0) Gecko/20100101 Firefox/39.0' ) 
		);
		if ( $css ) {
			$font = self::parse_font_css($css, 'woff2');
			return $font;
		}
		return false;
		
	}

	public static function remote_get( $url, $options = array() ) {

		$response = wp_remote_get( $url, $options );
		$return = false;
		if (
			!is_wp_error($response) &&
			isset($response['response']) &&
			$response['response']['code'] == 200
		) {
			$return = wp_remote_retrieve_body( $response );
		}
		return $return;

	}
	public static function parse_font_css($font, $format) {

		// parse all font-faces
		$expressions = array(
			'\/\* (?<subset>.*?) \*\/',
			'@font-face {(?<fontface>[^}]*?)}',
		);
		preg_match_all( '/'.implode('|', $expressions).'/', $font, $matches );
		// filter groups
		$matches = array_intersect_key($matches, array_flip(array('subset', 'fontface')));
	
		// font-faces
		$faces = array();
		for ( $i=0; $i<count($matches['subset']); $i++ ) {
			if ( empty($matches['subset'][$i]) ) {
				// no subset definition
				$faces[] = $matches['fontface'][$i];
			}
			else {
				// add subset name
				$i++;
				$faces[] = 'subset: '.$matches['subset'][$i-1].';'.$matches['fontface'][$i];
			}
		}
	
		$result = array();
		foreach ( $faces as $font_face ) {
			if ( strpos( $font_face, 'font-family' ) === false ) continue;
	
			// parse font-face rules
			$expressions = array(
				'font-family: \'(?<fontfamily>.*?)\'\;',
				'font-style: (?<fontstyle>.*?)\;',
				'font-weight: (?<fontweight>.*?);',
				'unicode-range: (?<unicoderange>.*?)\;',
				'subset: (?<subset>.*?)\;',
				'url\((?<url>.*?)\)',
				'format\(\'(?<format>.*?)\'\)',
			);
			preg_match_all( '/'.implode('|', $expressions).'/', $font_face, $matches );
			// filter groups
			$matches = array_intersect_key($matches, array_flip(array('fontfamily', 'fontstyle', 'fontweight', 'url', 'unicoderange', 'subset', 'format')));
			// clean matches
			$matches = array_map( function($value) { 
				// remove empty and re-index
				$value = array_values(array_filter($value));
				// flatten
				if ( count($value) == 0 ) $value = false;
				else if ( count($value) == 1 ) $value = $value[0];
				// return
				return $value;
			}, $matches);
	
			// add result
			if ( isset($matches['fontfamily']) ) {
				$slug = preg_replace( '/[^a-z0-9_\-]/', '', str_replace( ' ', '-', strtolower($matches['fontfamily']) ) );
				if ( !isset($result[$slug]) ) {
					// add font-family
					$result[$slug] = array(
						'family' => $matches['fontfamily'],
						'format' => $format,
						'faces' => array()
					);
				}
				// add font-face
				$result[$slug]['faces'][] = $matches;
			}
	
		}
	
		return $result;
	
	}

	/**
	 * add font preload 
	 * before wp_print_font_faces (prio 50)
	 */
	public function print_font_faces_preload() {
		// get font families
		$families = self::get_fontfamilies();
		$families = $families['custom']?? $families['theme']?? array();
		// get src
		$fonts = array( 
			'google' => array(),
			'local' => array(),
		);
		foreach ( $families as $font ) {
			// if a fontface is defined, the font is loaded by the wp-font-api
			if ( isset($font['fontFace']) && !empty($font['fontFace']) ) {
				foreach ( $font['fontFace'] as $fontface ) {
					if ( is_string( $fontface['src'] ) ) {
						if ( isset($fontface['src']) && !empty($fontface['src']) ) {
							if ( strpos($fontface['src'], 'https://fonts.gstatic.com') === 0 ) {
								$fonts['google'][] = $fontface['src'];
							}
							else $fonts['local'][] = $fontface['src'];
						}
					} else if ( is_array( $fontface['src'] ) ) {
						foreach ( $fontface['src'] as $src ) {
							if ( strpos($src, 'https://fonts.gstatic.com') === 0 ) {
								$fonts['google'][] = $src;
							}
							else $fonts['local'][] = $src;
						}
					}
				}
			}
		}
		// make preloads
		if ( count($fonts['google']) > 0 ) {
			echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="anonymous" />';
			foreach ( $fonts['google'] as $src ) {
				echo '<link rel="preload" href="' . esc_url( $src ) . '" as="font" crossorigin="anonymous">';
			}
		}
		if ( count($fonts['local']) > 0 ) {
			foreach ( $fonts['local'] as $src ) {
				echo '<link rel="preload" href="' . esc_url( $src ) . '" as="font" crossorigin="anonymous">';
			}
		}
	}

	public static function get_fontfamilies() {
		if ( class_exists( 'WP_Theme_JSON_Resolver_Gutenberg' ) ) {
			$theme_data = \WP_Theme_JSON_Resolver_Gutenberg::get_merged_data()->get_settings();
		} elseif ( class_exists( 'WP_Theme_JSON_Resolver' ) ) {
			$theme_data = \WP_Theme_JSON_Resolver::get_merged_data()->get_settings();
		}

		if ( empty( $theme_data ) || empty( $theme_data['typography'] ) || empty( $theme_data['typography']['fontFamilies'] ) ) {
			return false;
		}
		return $theme_data['typography']['fontFamilies'];
	}

	/**
	 * Enqueue Block Editor Scripts.
	 */
	public function block_editor_scripts() {
		
		// enqueue 
		wp_register_script(
			'greyd-wp-editor-fonts',
			get_template_directory_uri() . '/assets/js/editor-fonts.js',
			array( 'greyd-components', 'wp-data', 'wp-blocks', 'wp-element', 'wp-editor', 'wp-components', 'wp-i18n', 'lodash' ),
			wp_get_theme()->get( 'Version' ),
			true
		);
		wp_enqueue_script( 'greyd-wp-editor-fonts' );

		// localize the script
		wp_localize_script(
			'greyd-wp-editor-fonts',
			'greyd_fonts',
			get_option( 'greyd_fonts', array( 'google_fonts_list' => array(), 'google_fonts' => array() ) )
		);

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
		 * Fonts.
		 */
		if ( $mode == 'delete_font') {
			if ( self::DEBUG ) {
				echo "\r\n\r\n" . 'DELETE FONT';
			}

			$post_data = json_decode(stripslashes(rawurldecode($post_data)), true);
			if ( !isset( $post_data['family'] ) ) {
				$this->finish( 'error::no fontfamily' );
			}
			
			$fonts_folder = '/greyd_fonts';
			$upload_dir = wp_get_upload_dir();
			$folder     = $upload_dir['error'] ? WP_CONTENT_DIR.'/uploads'.$fonts_folder : $upload_dir['basedir'].$fonts_folder;

			$settings = array();

			$fonts = get_option( 'greyd_fonts', false );
			if ( $fonts ) {
				if ( isset($fonts['google_fonts_local']) ) {
					foreach ( $fonts['google_fonts_local'] as $fontslug => $faces ) {
						if ( $faces[0]['fontFamily'] == $post_data['family'] ) {
							// remove local font definitions
							unset($fonts['google_fonts_local'][$fontslug]);
							// delete files and folder
							$dirname = $folder.'/google/'.$fontslug;
							array_map('unlink', glob($dirname."/*.*"));
							rmdir($dirname);
							$settings[] = $fontslug;
							break;
						}
					}
				}
				if ( empty($settings) && isset($fonts['fonts_local']) ) {
					foreach ( $fonts['fonts_local'] as $fontslug => $faces ) {
						if ( $faces[0]['fontFamily'] == $post_data['family'] ) {
							// remove local font definitions
							unset($fonts['fonts_local'][$fontslug]);
							// delete files and folder
							$dirname = $folder.'/custom/'.$fontslug;
							array_map('unlink', glob($dirname."/*.*"));
							rmdir($dirname);
							$settings[] = $fontslug;
							break;
						}
					}
				}
			}

			if ( empty($settings) ) {
				$this->finish( 'error::fontfamily not found' );
			}
			update_option( 'greyd_fonts', $fonts );

			$this->finish( 'success::'.wp_json_encode($settings).'::'.$post_data['family'] );

		}
		if ( $mode == 'download_google_font') {
			if ( self::DEBUG ) {
				echo "\r\n\r\n" . 'GET GOOGLE FONT';
			}

			$post_data = json_decode(stripslashes(rawurldecode($post_data)), true);
			if ( !isset( $post_data['family'] ) ) {
				$this->finish( 'error::no fontfamily' );
			}

			$font = self::get_google_font( rawurlencode($post_data['family']) );
			if ( !$font ) {
				$this->finish( "error::fontfamily not available" );
			}

			// init filesystem and paths/urls
			global $wp_filesystem;
			if ( !function_exists( 'download_url' ) ) {
				include ABSPATH.'wp-admin/includes/file.php';
			}
			\WP_Filesystem();
			$google_fonts_folder = '/greyd_fonts/google';
			$upload_dir = wp_get_upload_dir();
			$folder     = $upload_dir['error'] ? WP_CONTENT_DIR.'/uploads'.$google_fonts_folder : $upload_dir['basedir'].$google_fonts_folder;
			$folder_url = $upload_dir['error'] ? WP_CONTENT_URL.'/uploads'.$google_fonts_folder : $upload_dir['baseurl'].$google_fonts_folder;
	
			$results = array();
			$settings = array();
			
			foreach ( $font as $fontslug => $fontdata ) {

				$settings[$fontslug] = array();
				
				foreach ( $fontdata['faces'] as $fontface ) {

					if ( !isset($fontface['fontfamily']) || !isset($fontface['url']) ) {
						$results[] = "error::fontface not available";
						continue;
					}
					
					$response = wp_remote_get( $fontface['url'] );

					if ( is_wp_error($response) ) {
						$results[] = "error::".implode("\r\n", $response->get_error_messages());
					}
					else if ( isset($response['response']) ) {
						if ( $response['response']['code'] == 200 ) {
							
							$fileinfo = pathinfo( str_replace( 'https://fonts.gstatic.com/s/', '', $fontface['url'] ) );
							list( $slug, $version ) = explode('/', $fileinfo['dirname'], 2);
							$filename = $slug.'-'.$version.'-'.$fontface['fontweight'].'-'.$fontface['fontstyle'].'.'.$fileinfo['extension'];

							$file = $folder.'/'.$fontslug.'/'.$filename;
							$file_url = $folder_url.'/'.$fontslug.'/'.$filename;
							if ( !is_dir( dirname( $file ) ) ) {
								wp_mkdir_p( dirname( $file ) );
							}

							$data = wp_remote_retrieve_body( $response );
							$success = $wp_filesystem->put_contents( $file, $data );
							if ( $success ) {

								$settings[$fontslug][] = array(
									"fontFamily" => $fontface['fontfamily'],
									"fontWeight" => $fontface['fontweight'],
									"fontStyle" => $fontface['fontstyle'],
									"src" => $fontface['url'],
									"local" => $file_url
								);

								$results[] = $file_url;

							}
							else {
								$results[] = "error::unable to write file";
							}
						}
						else {
							$results[] = "error::".$response['response']['code']."::".$response['response']['message'];
						}
					}
					else {
						$results[] = "error::unidentified error";
					}
				}
			}
			$errors = array_filter( $results, function($item) {
				return strpos( $item, 'error::') === 0;
			});
			$res = count($errors) == 0 ? 'success' : ( count($errors) == count($results) ? 'error' : 'warn' );

			if ( $res == 'success' ) {
				$fonts = get_option( 'greyd_fonts', array( 'google_fonts_local' => array() ) );
				if ( !isset($fonts['google_fonts_local']) ) {
					$fonts['google_fonts_local'] = array();
				}
				// add local font definitions
				foreach ( $settings as $fontslug => $faces ) {
					$fonts['google_fonts_local'][$fontslug] = $faces;
				}
				update_option( 'greyd_fonts', $fonts );
			}

			$this->finish( $res.'::'.wp_json_encode($settings).'::'.$post_data['family'] );

		}
		if ( $mode == 'upload_font') {
			if ( self::DEBUG ) {
				echo "\r\n\r\n" . 'UPLOAD CUSTOM FONT';
			}

			$post_data = json_decode(stripslashes(rawurldecode($post_data)), true);
			if ( !isset( $post_data['font'] ) || !isset( $post_data['font']['name'] ) || empty( $post_data['font']['faces'] ) ) {
				$this->finish( 'error::no font' );
			}
			if ( !isset( $post_data['font']['faces'] ) || empty($post_data['font']['faces']) || empty($_FILES) ) {
				$this->finish( 'error::no fontfaces' );
			}

			// init filesystem and paths/urls
			global $wp_filesystem;
			if ( !function_exists( 'download_url' ) ) {
				include ABSPATH.'wp-admin/includes/file.php';
			}
			\WP_Filesystem();
			$fonts_folder = '/greyd_fonts/custom';
			$upload_dir = wp_get_upload_dir();
			$folder     = $upload_dir['error'] ? WP_CONTENT_DIR.'/uploads'.$fonts_folder : $upload_dir['basedir'].$fonts_folder;
			$folder_url = $upload_dir['error'] ? WP_CONTENT_URL.'/uploads'.$fonts_folder : $upload_dir['baseurl'].$fonts_folder;
	
			$fontname = $post_data['font']['name'];
			$fontslug = sanitize_key($post_data['font']['name']);

			$results = array();
			$settings = array();
			$settings[$fontslug] = array();
			
			foreach ( $post_data['font']['faces'] as $fontweight ) {
				
				if ( !isset($_FILES[$fontweight]) ) {
					$results[] = "error::fontfile for '".$fontweight."' not available";
					continue;
				}

				$tmp_name = $_FILES[$fontweight]["tmp_name"];
				$filename = basename($_FILES[$fontweight]["name"]);

				$file = $folder.'/'.$fontslug.'/'.$filename;
				$file_url = $folder_url.'/'.$fontslug.'/'.$filename;
				if ( !is_dir( dirname( $file ) ) ) {
					wp_mkdir_p( dirname( $file ) );
				}

				$success = move_uploaded_file($tmp_name, $file);
				if ( $success ) {
					$weight = $fontweight;
					$style = 'normal';
					if ( strpos($weight, 'i') !== false ) {
						$weight = str_replace('i', '', $weight);
						$style = 'italic';
					}
					$settings[$fontslug][] = array(
						"fontFamily" => $fontname,
						"fontWeight" => $weight,
						"fontStyle" => $style,
						"src" => $file_url
					);

					$results[] = $file_url;

				}
				else {
					$results[] = "error::unable to write file";
				}
			}
			$errors = array_filter( $results, function($item) {
				return strpos( $item, 'error::') === 0;
			});
			$res = count($errors) == 0 ? 'success' : ( count($errors) == count($results) ? 'error' : 'warn' );

			if ( $res == 'success' ) {
				$fonts = get_option( 'greyd_fonts', array( 'fonts_local' => array() ) );
				if ( !isset($fonts['fonts_local']) ) {
					$fonts['fonts_local'] = array();
				}
				// add local font definitions
				$fonts['fonts_local'][$fontslug] = $settings[$fontslug];
				update_option( 'greyd_fonts', $fonts );
			}

			$this->finish( $res.'::'.wp_json_encode($settings).'::'.$fontname );


		}
		
		/**
		 * Convert/Deprecate Fonts.
		 * @since 1.13.0
		 */
		if ( $mode == 'convert_fonts') {
			if ( self::DEBUG ) {
				echo "\r\n\r\n" . 'CONVERT FONTS';
			}

			$post_data = json_decode(stripslashes(rawurldecode($post_data)), true);
			if ( !isset( $post_data['google'] ) && !isset( $post_data['custom'] ) && !isset( $post_data['create'] ) ) {
				$this->finish( 'error::no old fonts' );
			}

			$result = self::convert_fonts($post_data);

			if ( !empty($result['errors']) ) {
				$this->finish( 'error::error converting fonts::'.implode('::', $result['errors']) );
			}
			if ( empty($result['families']) && empty($result['created']) ) {
				$this->finish( 'error::no old fonts found' );
			}

			$this->finish( 'success::'.wp_json_encode($result['deleted']) );

		}

		/**
		 * Get Font Style.
		 * Formerly called when saving greyd global styles, now called from Editor.
		 * @since 2.1.0
		 */
		if ( $mode == 'get_font_style') {
			if ( self::DEBUG ) {
				echo "\r\n\r\n" . 'GET FONT STYLE';
			}

			$post_data = json_decode(stripslashes(rawurldecode($post_data)), true);
			if ( !isset( $post_data['family'] ) ) {
				$this->finish( 'error::no fontfamily' );
			}

			$font = self::get_font_style( $post_data['family'] );

			$this->finish( 'success::'.wp_json_encode($font) );

		}

		$this->finish( 'error::unknown inquery' );
	}

	/*
	 * Die and send answer back to JS
	 * basically the same as 'wp_die', but with debug logging
	 */
	public function finish( $msg = '' ) {
		if ( self::DEBUG ) {
			echo "\r\n\r\n" . '------------- debug end -------------' . "\r\n\r\n";
		}
		wp_die( wp_kses_post( $msg ) );
	}


	/**
	 * =================================================================
	 *                          functions
	 * =================================================================
	 */

	public static function get_font_style( $value ) {
		
		$greyd_fonts = get_option( 'greyd_fonts', array() );
		$google_fonts_local = $greyd_fonts['google_fonts_local'] ?? array();
		$fonts_local = $greyd_fonts['fonts_local'] ?? array();

		$fontfamily = $value;
		$fontfaces = false;
		
		if ( strpos($value, ':') !== false ) {
			list( $fontfamily, $params ) = explode(':', $value);
		}
		// google font
		if ( in_array($fontfamily, $greyd_fonts['google_fonts_list']) ) {
			$font = self::get_google_font( rawurlencode($value) );
			if ( $font ) {
				$fontfaces = array();
				foreach ( $font as $slug => $fontdata ) {
					foreach ( $fontdata['faces'] as $fontface ) {
						$face = array(
							"fontFamily" => $fontface['fontfamily'],
							"fontWeight" => $fontface['fontweight'],
							"fontStyle" => $fontface['fontstyle'],
							"fontDisplay" => "swap",
							"src" => $fontface['url'],
						);
						if ( isset($google_fonts_local[$slug]) ) {
							foreach ( $google_fonts_local[$slug] as $fontface_local ) {
								if ( $fontface_local['src'] == $fontface['url'] ) {
									$face['src'] = $fontface_local['local'];
									break;
								}
							}
						}
						$fontfaces[] = $face;
					}
				}
			}
		}
		else if ( !empty($fonts_local) ) {
			// custom font
			foreach ( $fonts_local as $slug => $fontdata ) {
				if ( $fontdata[0]['fontFamily'] == $value ) {
					$fontfaces = array();
					foreach ( $fontdata as $fontface ) {
						$fontfaces[] = $fontface;
					}
					break;
				}
			}
		}

		return array(
			'fontFamily' => str_replace( array( "\'", '\"' ), array( "'", "'" ), $fontfamily ),
			'fontFace' => $fontfaces
		);
	}


	/**
	 * =================================================================
	 *                          Backward compatibility (bc)
	 * =================================================================
	 */

	/**
	 * Enqueue frontend.
	 * @deprecated bc
	 */
	 public function enqueue_google_fonts_bc() {
		$url = self::get_gfonts_url();
		if ( !empty($url) ) {
			wp_enqueue_style( 'google-fonts', $url, array(), null );
		}
	}

	/**
	 * Enqueue editor styles.
	 * @deprecated bc
	 */
	public function editor_google_fonts_bc() {
		$url = self::get_gfonts_url();
		if ( !empty($url) ) {
			add_editor_style( array( $url ) );
		}
	}

	/**
	 * Get Google webfonts
	 * @deprecated bc
	 *
	 * @return $fonts_url
	 */
	public static function get_gfonts_url() {
		$families = self::get_fontfamilies();
		$families = $families['custom']?? $families['theme']?? array();
		if ( !$families || empty( $families ) ) {
			return '';
		}

		$greyd_fonts = get_option( 'greyd_fonts', array() );
		$gfonts = $greyd_fonts['google_fonts_list']?? array();

		$font_families = array();
		foreach ( $families as $font ) {
			// if a fontface is defined, the font is loaded by the wp-font-api
			if ( isset($font['fontFace']) && !empty($font['fontFace']) ) continue;
			if ( in_array( $font['fontFamily'], $gfonts ) ) {
				$font_families[] = 'family=' . str_replace( ' ', '+', $font['fontFamily'] );
			}
		}

		/**
		 * Filter the Google Font families.
		 * @see https://developers.google.com/fonts/docs/css2
		 * 
		 * @param array $font_families	Array of Google Font families.
		 * @param array $families		Theme JSON fontFamilies data.
		 * 
		 * @return array
		 */
		$font_families = apply_filters( 'greyd_theme_google_font_families_url_params', $font_families, $families );
		/** @example */
		// add_filter( 'greyd_theme_google_font_families_url_params', function( $fontFamilies ) {
		//     foreach ( $fontFamilies as $i => $fontFamilyParam ) {
		//         if ( $fontFamilyParam == 'family=Advent+Pro' ) {
		//             $fontFamilies[$i] = 'family=Advent+Pro:ital,wght@0,100;0,400;0,900;1,700';
		//         }
		//     }
		//     return $fontFamilies;
		// } );

		if ( empty( $font_families ) ) {
			return '';
		}

		// Make a single request for the theme or user fonts.
		return esc_url_raw( 'https://fonts.googleapis.com/css2?' . implode( '&', array_unique( $font_families ) ) . '&display=swap' );
	}


	/**
	 * =================================================================
	 *                          Convert/Deprecate
	 *                          @since 1.13.0
	 * =================================================================
	 */

	/**
	 * Convert Fonts to WP Font Library.
	 * Called from ajax.
	 */
	public static function convert_fonts( $post_data ) {

		$post_id = 0;
		if ( class_exists( 'WP_Theme_JSON_Resolver_Gutenberg' ) ) {
			$post_id = \WP_Theme_JSON_Resolver_Gutenberg::get_user_global_styles_post_id();
		} elseif ( class_exists( 'WP_Theme_JSON_Resolver' ) ) {
			$post_id = \WP_Theme_JSON_Resolver::get_user_global_styles_post_id();
		}

		if ( !$post_id ) {
			return array(
				'errors' => array( 'no global styles post ID' ),
				'families' => array(),
				'created' => array(),
				'deleted' => array(),
			);
		}

		/** 
		 * prepare data
		 */
		$content = get_post_field( 'post_content', $post_id );
		$data    = json_decode( $content );
		// set custom
		if ( !isset($data->settings->typography->fontFamilies->custom) ) {
			$data->settings->typography->fontFamilies->custom = array();
		}
		// insert function
		$insert_fontfamily = function( $fontfamily ) use( &$data ) {
			$family = self::check_family($data->settings->typography->fontFamilies->custom, (object)$fontfamily);
			array_push($data->settings->typography->fontFamilies->custom, $family);
			self::create_font_post($family);

			return $family;
		};


		/**
		 * prepare convert setting
		 */
		$convert = isset($post_data['convert']) && !empty($post_data['convert']);
		if ( $convert ) {
			// convert function
			$convert_font_setting = function( $type, $fontname, $new_fontslug ) use( $post_data, &$data ) {
				foreach ( $post_data['convert'] as $toconvert ) {
					if ( $toconvert['type'] != $type || $toconvert['value'] != $fontname ) continue;

					$old_var = '--wp--preset--font-family--'.$toconvert['slug'];
					$new_var = '--wp--preset--font-family--'.$new_fontslug;

					// replace
					$str = wp_json_encode($data);
					if ( strpos($str, $old_var) !== false ) {
						$str = str_replace($old_var, $new_var, $str);
						$data = json_decode($str);
					}

					// unset setting
					foreach ( $data->settings->typography->fontFamilies->theme as $i => $fontFamily ) {
						if ( $fontFamily->slug == $toconvert['slug'] ) {
							$data->settings->typography->fontFamilies->theme[$i]->fontFamily = "";
							unset($data->settings->typography->fontFamilies->theme[$i]->fontFace);
						}
					}
				}
			};
		}


		/**
		 * prepare delete font
		 */
		$delete = isset($post_data['delete_old']) && $post_data['delete_old'];
		if ( $delete ) {
			$fonts = get_option( 'greyd_fonts', false );
			if ( !$fonts ) $delete = false;
		}
		if ( $delete ) {
			// paths
			$fonts_folder = '/greyd_fonts';
			$upload_dir = wp_get_upload_dir();
			$folder     = $upload_dir['error'] ? WP_CONTENT_DIR.'/uploads'.$fonts_folder : $upload_dir['basedir'].$fonts_folder;
			// delete function
			$delete_local_font = function( $type, $fontslug ) use( $folder, &$fonts ) {

				$key = $type == 'google' ? 'google_fonts_local' : 'fonts_local';
				$sub = $type == 'google' ? 'google' : 'custom';

				// remove local font definitions
				unset($fonts[$key][$fontslug]);
				// delete files and folder
				$dirname = $folder.'/'.$sub.'/'.$fontslug;
				array_map('unlink', glob($dirname."/*.*"));
				rmdir($dirname);
				
			};
		}

		/**
		 * process data
		 */
		$families = array();
		$created = array();
		$deleted = array();
		$errors = array();

		// create google fonts
		if ( isset($post_data['create']) && !empty($post_data['create']) ) {

			foreach ( $post_data['create'] as $create ) {

				$fontname = str_replace("'", "", $create['value']['fontFamily']);
				$fontslug = $slug = preg_replace( '/[^a-z0-9_\-]/', '', str_replace( ' ', '-', strtolower($fontname) ) );
				$fontfamily = array(
					'fontFamily' => $fontname,
					'name' => $fontname,
					'slug' => $fontslug,
					'fontFace' => array()
				);

				foreach ( $create['value']['fontFace'] as $fontface ) {

					$fontface_new = self::download_font_file( $fontface );
					if ( is_object($fontface_new) ) {
						array_push( $fontfamily['fontFace'], $fontface_new );
					}
					else {
						array_push( $errors, $fontface_new );
					}
					
				}

				if ( !empty($fontfamily['fontFace']) ) {
					array_push( $families, (object)$fontfamily );

					// add font to settings
					$family = $insert_fontfamily( $fontfamily );
					
					// convert setting
					if ( $convert ) $convert_font_setting( 'google', $fontname, $family->slug );

				}

			}

		}

		// move google fonts
		if ( isset($post_data['google']) ) {

			foreach ( $post_data['google'] as $fontslug => $faces ) {

				$old_name = false;
				$fontfamily = array(
					'slug' => $fontslug,
					'fontFace' => array()
				);

				foreach ( $faces as $fontface ) {
					if ( !$old_name ) {
						$old_name = $fontface['fontFamily'];
					}

					$fontface['fontFamily'] = str_replace("'", "", $fontface['fontFamily']);

					if ( !isset($fontfamily['name']) ) {
						$fontfamily['fontFamily'] = $fontface['fontFamily'];
						$fontfamily['name'] = $fontface['fontFamily'];
					}

					$fontface_new = self::copy_font_file($fontface);
					if ( is_object($fontface_new) ) {
						array_push( $fontfamily['fontFace'], $fontface_new );
					}
					else {
						array_push( $errors, $fontface_new );
					}

				}

				if ( !empty($fontfamily['fontFace']) ) {
					array_push( $families, (object)$fontfamily );

					// add font to settings
					$family = $insert_fontfamily( $fontfamily );
					
					// convert setting
					if ( $convert ) $convert_font_setting( 'google', $old_name, $family->slug );

					if ( $delete ) {

						$delete_local_font( 'google', $fontslug );

						if ( !isset($deleted['google']) ) $deleted['google'] = array();
						array_push($deleted['google'], $fontslug );

					}

				}

			}

		}

		// move custom fonts
		if ( isset($post_data['custom']) ) {

			foreach ( $post_data['custom'] as $fontslug => $faces ) {

				$old_name = false;
				$new_slug = false;
				
				foreach ( $faces as $fontface ) {
					if ( !$old_name ) $old_name = $fontface['fontFamily'];
					$fontface['fontFamily'] = str_replace("'", "", $fontface['fontFamily']);
						
					$slug = $fontslug;
					$name = $fontface['fontFamily'];
					switch ( $fontface['fontWeight'] ) {
						case '100': $slug .= '-thin';		$name .= ' Thin'; break;
						case '200': $slug .= '-extralight';	$name .= ' Extra Light'; break;
						case '300': $slug .= '-light';		$name .= ' Light'; break;
						case '500': $slug .= '-medium';		$name .= ' Medium'; break;
						case '600': $slug .= '-semibold';	$name .= ' Semi Bold'; break;
						case '700': $slug .= '-bold';		$name .= ' Bold'; break;
						case '800': $slug .= '-extrabold';	$name .= ' Extra Bold'; break;
						case '900': $slug .= '-black';		$name .= ' Black'; break;
					}
					if ( $fontface['fontStyle'] == 'italic' ) {
						$slug .= '-italic';
						$name .= ' italic';
					}

					$fontfamily = array(
						'slug' => $slug,
						'name' => $name,
						'fontFamily' => $name,
						'fontFace' => array()
					);

					$fontface_new = self::copy_font_file(array(
						"fontFamily" => $name,
						"fontWeight" => $fontface['fontWeight'],
						"fontStyle" => $fontface['fontStyle'],
						"src" => $fontface['src']
					));
					if ( is_object($fontface_new) ) {
						array_push( $fontfamily['fontFace'], $fontface_new );
						array_push( $families, (object)$fontfamily );

						// add font to settings
						$family = $insert_fontfamily( $fontfamily );

						if ( !$new_slug ) $new_slug = $family->slug;
					}
					else {
						array_push( $errors, $fontface_new );
					}

				}
			
				if ( $old_name && $new_slug ) {

					// convert setting
					if ( $convert ) $convert_font_setting( 'custom', $old_name, $new_slug );

					if ( $delete ) {

						$delete_local_font( 'custom', $fontslug );

						if ( !isset($deleted['custom']) ) $deleted['custom'] = array();
						array_push($deleted['custom'], $fontslug );

					}

				}

			}
		}

		// finalize
		if ( empty($errors) && !empty($families) ) {

			// save global-styles post
			$new_content = wp_json_encode( $data );
			wp_update_post(
				array(
					'ID'           => $post_id,
					'post_content' => wp_slash($new_content),
				)
			);

			if ( $delete ) {
				update_option( 'greyd_fonts', $fonts );
			}
		}

		return array(
			'families' => $families,
			'created' => $created,
			'deleted' => $deleted,
			'errors' => $errors
		);

	}

	/**
	 * Copy local fontface src file to Font Library folder.
	 * @return object|string	new fontface object or error string.
	 */
	public static function copy_font_file( $fontface ) {
	
		global $wp_filesystem;
		if ( !function_exists( 'download_url' ) ) {
			include ABSPATH.'wp-admin/includes/file.php';
		}
		\WP_Filesystem();

		// new
		$folder_new     = function_exists( 'wp_get_font_dir' ) ? wp_get_font_dir()['path'] : WP_CONTENT_DIR.'/fonts';
		$folder_new_url = str_replace( WP_CONTENT_DIR, WP_CONTENT_URL, $folder_new );
		if ( is_ssl() && strpos( $folder_new_url, 'http:' ) === 0 ) {
			$folder_new_url = str_replace( 'http:', 'https:', $folder_new_url );
		}
		
		$file_old_url = isset($fontface['local']) ? $fontface['local'] : $fontface['src'];
		$file_old     = str_replace( WP_CONTENT_URL, WP_CONTENT_DIR, $file_old_url );

		$fileinfo = pathinfo( $file_old );
		$file_new = $folder_new.'/'.$fileinfo['basename'];
		if ( !is_dir( dirname( $file_new ) ) ) {
			wp_mkdir_p( dirname( $file_new ) );
		}
		$success = $wp_filesystem->copy( $file_old, $file_new, true );

		if ( $success ) {
			return (object)array(
				"fontFamily" => $fontface['fontFamily'],
				"fontWeight" => $fontface['fontWeight'],
				"fontStyle" => $fontface['fontStyle'],
				"src" => $folder_new_url.'/'.$fileinfo['basename']
			);
		}
		else {
			return "error::unable to copy file::".$file_old_url;
		}

	}

	/**
	 * Download fontface src file to Font Library folder.
	 * @return object|string	new fontface object or error string.
	 */
	public static function download_font_file( $fontface ) {

		$error = "";
		$response = wp_remote_get( $fontface['src'], array( 'timeout' => 30 ) );

		if ( is_wp_error($response) ) {
			$error = "error::".implode("\r\n", $response->get_error_messages());
		}
		else if ( isset($response['response']) ) {
			if ( $response['response']['code'] == 200 ) {
				
				global $wp_filesystem;
				if ( !function_exists( 'download_url' ) ) {
					include ABSPATH.'wp-admin/includes/file.php';
				}
				\WP_Filesystem();
		
				// new
				$folder     = function_exists( 'wp_get_font_dir' ) ? wp_get_font_dir()['path'] : WP_CONTENT_DIR.'/fonts';
				$folder_url = str_replace( WP_CONTENT_DIR, WP_CONTENT_URL, $folder );
				if ( is_ssl() && strpos( $folder_url, 'http:' ) === 0 ) {
					$folder_url = str_replace( 'http:', 'https:', $folder_url );
				}

				$fileinfo = pathinfo( str_replace( 'https://fonts.gstatic.com/s/', '', $fontface['src'] ) );
				list( $slug, $version ) = explode('/', $fileinfo['dirname'], 2);
				$filename = $slug.'_'.$fontface['fontStyle'].'_'.$fontface['fontWeight'].'.'.$fileinfo['extension'];

				$file = $folder.'/'.$filename;
				$file_url = $folder_url.'/'.$filename;
				if ( !is_dir( dirname( $file ) ) ) {
					wp_mkdir_p( dirname( $file ) );
				}

				$data = wp_remote_retrieve_body( $response );
				$success = $wp_filesystem->put_contents( $file, $data );
				if ( $success ) {
					return (object)array(
						"fontFamily" => $fontface['fontFamily'],
						"fontWeight" => $fontface['fontWeight'],
						"fontStyle" => $fontface['fontStyle'],
						"src" => $file_url
					);
				}
				else {
					$error = "error::unable to write file";
				}
			}
			else {
				$error = "error::".$response['response']['code']."::".$response['response']['message'];
			}
		}
		else {
			$error = "error::unidentified error";
		}

		return $error;
	}
	
	/**
	 * Check fontfamily for duplicate slugs in data.
	 * Add number if slug is already present, incrementing recursively.
	 * @return object	new fontface object.
	 */
	public static function check_family( $data, $family, $count=0 ) {
		
		$slug = $family->slug;
		if ( $count > 0 ) $slug .= '-'.($count+1);
		$found = false;
		foreach ( $data as $font ) {
			if ( $font->slug == $slug ) {
				$found = true;
				break;
			}
		}
		if ( $found ) {
			$family = self::check_family( $data, $family, $count+1 );
		}
		else if ( $count > 0 ) {
			$family->slug .= '-'.($count+1);
			$family->name .= ' '.($count+1);
		}
		return $family;

	}

	/**
	 * Creates a post for a font family.
	 * @return int|WP_Error		Post ID if the post was created, WP_Error otherwise.
	 */
	public static function create_font_post( $family ) {
		$post = array(
			'post_title'   => $family->name,
			'post_name'    => $family->slug,
			'post_type'    => 'wp_font_family',
			'post_content' => wp_json_encode( $family ),
			'post_status'  => 'publish',
		);

		$exists = false;
		$posts  = get_posts(
			array(
				'post_type'              => 'wp_font_family',
				'title'                  => $post['post_title'],
				'post_status'            => 'all',
				'numberposts'            => 1,
				'update_post_term_cache' => false,
				'update_post_meta_cache' => false,
				'orderby'                => 'post_date ID',
				'order'                  => 'ASC',
			)
		);
		if ( !empty($posts) ) {
			$exists = $posts[0];
		}

		if ( empty($exists) ) {
			$post_id = wp_insert_post( $post );
		}
		else {
			$post['ID'] = $exists->ID;
			$post_id = wp_update_post( $post );
		}
		if ( $post_id === 0 || is_wp_error( $post_id ) ) {
			return new \WP_Error( 'font_post_creation_failed', __( 'Font post creation failed', 'greyd-wp' ) );
		}
		return $post_id;
	}

}
