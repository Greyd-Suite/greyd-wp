<?php
/**
 * Main Theme Functions.
 *
 * @package Greyd
 */
namespace Greyd\Theme;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

new Theme();
class Theme {

	/**
	 * Class constructor.
	 */
	public function __construct() {

		// setup theme
		add_action( 'after_setup_theme', array( $this, 'theme_support' ) );

		// scripts & styles
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_theme_assets' ) );

		// block assets
		add_action( 'init', array( $this, 'register_block_styles' ) );
		add_action( 'init', array( $this, 'register_pattern_categories' ), 9 );
	}

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * @return void
	 */
	public function theme_support() {
		// Enqueue editor styles.
		add_editor_style(
			array(
				'./assets/css/theme.css',
			)
		);

		// Remove core block patterns.
		remove_theme_support( 'core-block-patterns' );

	}

	/**
	 * Enqueue styles.
	 *
	 * @return void
	 */
	public function enqueue_theme_assets() {

		// Register theme stylesheet
		wp_register_style(
			'greyd-theme',
			get_template_directory_uri() . '/assets/css/theme.css',
			array(),
			wp_get_theme()->get( 'Version' )
		);
		wp_enqueue_style( 'greyd-theme' );

		// frontend script
		wp_register_script(
			'greyd-theme',
			get_template_directory_uri() . '/assets/js/public.js',
			array(),
			wp_get_theme()->get( 'Version' ),
			false
		);
		wp_enqueue_script( 'greyd-theme' );

	}

	/**
	 * Register Block Patterns
	 *
	 * @return void
	 */
	public function register_pattern_categories() {

		$pattern_categories = array(
			'greyd-cta'            => array(
				'label' => __( 'Greyd Call To Action', 'greyd-theme' ),
			),
			'greyd-columns'        => array(
				'label' => __( 'Greyd Columns', 'greyd-theme' ),
			),
			'greyd-content'        => array(
				'label' => __( 'Greyd Content', 'greyd-theme' ),
			),
			'greyd-general'        => array(
				'label' => __( 'Greyd General', 'greyd-theme' ),
			),
			'greyd-hero'           => array(
				'label' => __( 'Greyd Hero', 'greyd-theme' ),
			),
			'greyd-pages'          => array(
				'label' => __( 'Greyd Pages', 'greyd-theme' ),
			),
			'greyd-posts'          => array(
				'label' => __( 'Greyd Posts', 'greyd-theme' ),
			),
			'greyd-pricing'        => array(
				'label' => __( 'Greyd Pricing', 'greyd-theme' ),
			),
			'greyd-testimonial'    => array(
				'label' => __( 'Greyd Testimonials', 'greyd-theme' ),
			),
		);

		foreach ( $pattern_categories as $name => $properties ) {
			register_block_pattern_category( $name, $properties );
		}
	}

	/**
	 * Register Block Styles.
	 *
	 * @see https://developer.wordpress.org/reference/functions/register_block_style/
	 */
	public function register_block_styles() {

		$block_styles = array(
			'core/button'          => array(
				'fill'      => __( 'Primary Button', 'greyd-theme' ),
				'outline'   => __( 'Secondary Button', 'greyd-theme' ),
				'alternate' => __( 'Alternate Button', 'greyd-theme' ),
				'clear'     => __( 'Clear', 'greyd-theme' ),
			),
			'core/navigation' => array(
				'button-fill' => __( 'Primary Button', 'greyd-theme' ),
				'button-outline' => __( 'Secondary Button', 'greyd-theme' ),
				'button-alternate' => __( 'Alternate Button', 'greyd-theme' ),
				'button-chips' => __( 'Chip', 'greyd-theme' ),
				'clear'     => __( 'Clear', 'greyd-theme' ),
			),
			'core/navigation-submenu' => array(
				'button-fill' => __( 'Primary Button', 'greyd-theme' ),
				'button-outline' => __( 'Secondary Button', 'greyd-theme' ),
				'button-alternate' => __( 'Alternate Button', 'greyd-theme' ),
				'button-chips' => __( 'Chip', 'greyd-theme' ),
				'clear'     => __( 'Clear', 'greyd-theme' ),
			),
			'core/navigation-link' => array(
				'button-fill' => __( 'Primary Button', 'greyd-theme' ),
				'button-outline' => __( 'Secondary Button', 'greyd-theme' ),
				'button-alternate' => __( 'Alternate Button', 'greyd-theme' ),
				'button-chips' => __( 'Chip', 'greyd-theme' ),
				'clear'     => __( 'Clear', 'greyd-theme' ),
			),
			'core/separator'       => array(
				'bar' => __( 'Bar', 'greyd-theme' ),
			),
			'core/image'           => array(
				'rounded-corners' => __( 'Rounded', 'greyd-theme' ),
				'has-shadow'      => __( 'Shadow', 'greyd-theme' ),
				'diagonal-up'     => __( 'Diagonal (up)', 'greyd-theme' ),
				'diagonal-down'   => __( 'Diagonal (down)', 'greyd-theme' ),
				'rotate-left'     => __( 'Rotated (left)', 'greyd-theme' ),
				'rotate-right'    => __( 'Rotated (right)', 'greyd-theme' ),
				'tilt-left'       => __( '3D (left)', 'greyd-theme' ),
				'tilt-right'      => __( '3D (right)', 'greyd-theme' ),
			),
			'core/cover'       => array(
				'no-background' => __( 'No Background', 'greyd-theme' ),
			),
		);

		foreach ( $block_styles as $block => $styles ) {
			foreach ( $styles as $style_name => $style_label ) {
				register_block_style(
					$block,
					array(
						'name'  => $style_name,
						'label' => $style_label,
					)
				);
			}
		}
	}
}
