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
			'greyd-wp',
			get_template_directory_uri() . '/assets/css/theme.css',
			array(),
			wp_get_theme()->get( 'Version' )
		);
		wp_enqueue_style( 'greyd-wp' );

		// frontend script
		wp_register_script(
			'greyd-wp',
			get_template_directory_uri() . '/assets/js/public.js',
			array(),
			wp_get_theme()->get( 'Version' ),
			false
		);
		wp_enqueue_script( 'greyd-wp' );

	}

	/**
	 * Register Block Patterns
	 *
	 * @return void
	 */
	public function register_pattern_categories() {

		$pattern_categories = array(
			'greyd-cta'            => array(
				'label' => __( 'Greyd Call To Action', 'greyd-wp' ),
			),
			'greyd-columns'        => array(
				'label' => __( 'Greyd Columns', 'greyd-wp' ),
			),
			'greyd-content'        => array(
				'label' => __( 'Greyd Content', 'greyd-wp' ),
			),
			'greyd-general'        => array(
				'label' => __( 'Greyd General', 'greyd-wp' ),
			),
			'greyd-hero'           => array(
				'label' => __( 'Greyd Hero', 'greyd-wp' ),
			),
			'greyd-pages'          => array(
				'label' => __( 'Greyd Pages', 'greyd-wp' ),
			),
			'greyd-posts'          => array(
				'label' => __( 'Greyd Posts', 'greyd-wp' ),
			),
			'greyd-pricing'        => array(
				'label' => __( 'Greyd Pricing', 'greyd-wp' ),
			),
			'greyd-testimonial'    => array(
				'label' => __( 'Greyd Testimonials', 'greyd-wp' ),
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
				'fill'      => __( 'Primary button', 'greyd-wp' ),
				'outline'   => __( 'Secondary button', 'greyd-wp' ),
				'alternate' => __( 'Alternate button', 'greyd-wp' ),
				'clear'     => __( 'Clear', 'greyd-wp' ),
			),
			'core/navigation' => array(
				'button-fill' => __( 'Primary button', 'greyd-wp' ),
				'button-outline' => __( 'Secondary button', 'greyd-wp' ),
				'button-alternate' => __( 'Alternate button', 'greyd-wp' ),
				'button-chips' => __( 'Chip', 'greyd-wp' ),
				'clear'     => __( 'Clear', 'greyd-wp' ),
			),
			'core/navigation-submenu' => array(
				'button-fill' => __( 'Primary button', 'greyd-wp' ),
				'button-outline' => __( 'Secondary button', 'greyd-wp' ),
				'button-alternate' => __( 'Alternate button', 'greyd-wp' ),
				'button-chips' => __( 'Chip', 'greyd-wp' ),
				'clear'     => __( 'Clear', 'greyd-wp' ),
			),
			'core/navigation-link' => array(
				'button-fill' => __( 'Primary button', 'greyd-wp' ),
				'button-outline' => __( 'Secondary button', 'greyd-wp' ),
				'button-alternate' => __( 'Alternate button', 'greyd-wp' ),
				'button-chips' => __( 'Chip', 'greyd-wp' ),
				'clear'     => __( 'Clear', 'greyd-wp' ),
			),
			'core/separator'       => array(
				'bar' => __( 'Bar', 'greyd-wp' ),
			),
			'core/image'           => array(
				'rounded-corners' => __( 'Rounded', 'greyd-wp' ),
				'has-shadow'      => __( 'Shadow', 'greyd-wp' ),
				'diagonal-up'     => __( 'Diagonal (up)', 'greyd-wp' ),
				'diagonal-down'   => __( 'Diagonal (down)', 'greyd-wp' ),
				'rotate-left'     => __( 'Rotated (left)', 'greyd-wp' ),
				'rotate-right'    => __( 'Rotated (right)', 'greyd-wp' ),
				'tilt-left'       => __( '3D (left)', 'greyd-wp' ),
				'tilt-right'      => __( '3D (right)', 'greyd-wp' ),
			),
			'core/cover'       => array(
				'no-background' => __( 'No background', 'greyd-wp' ),
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
