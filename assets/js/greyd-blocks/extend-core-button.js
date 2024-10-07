/**
 * Editor Script for Greyd Button Blocks.
 * 
 * This file is loaded in block editor pages and modifies the editor experience.
 */
( function ( wp ) {

	const {
		createElement: el
	} = wp.element;

	const _ = lodash;

	const { __ } = wp.i18n;

	/**
	 * Register custom attributes to core blocks.
	 * - core/button
	 *
	 * @hook blocks.registerBlockType
	 */
	const registerBlockTypeHook = function ( settings, name ) {

		if ( _.has( settings, 'apiVersion' ) && settings.apiVersion == 2 ) {

			if ( name == 'core/button' ) {
				settings.attributes.size = { type: 'string', default: '' };
			}

		}
		return settings;

	};

	wp.hooks.addFilter(
		'blocks.registerBlockType',
		'greyd/hook/button',
		registerBlockTypeHook
	);


	/**
	 * Add custom edit controls to core Blocks.
	 *
	 * @hook editor.BlockEdit
	 */
	const editBlockHook = wp.compose.createHigherOrderComponent( function ( BlockEdit ) {

		return function ( props ) {

			/**
			 * Extend the core button
			 */
			if ( props.name == "core/button" ) {
				const makeInspectorControls = function () {

					return [
						el( wp.components.PanelBody, {
							title: __( 'Size', 'greyd-wp' ),
							initialOpen: true
						}, [
							el( 'div', { className: "greyd-inspector-wrapper greyd-2" }, [
								el( greyd.components.ButtonGroupControl, {
									value: props.attributes?.size,
									options: [
										{ label: __( 'Small', 'greyd-wp' ), value: 'is-size-small' },
										{ label: __( 'Default', 'greyd-wp' ), value: '' },
										{ label: __( 'Large', 'greyd-wp' ), value: 'is-size-big' },
									],
									onChange: ( value ) => {
										var classNames = [];
										if ( _.has( props.attributes, 'className' ) && !_.isEmpty( props.attributes?.className ) ) {
											// remove 'is-big' and 'is-small
											var oldClasses = props.attributes?.className.split( /is-size-big\s*|is-size-small\s*/g );
											// add all other
											classNames.push( ...oldClasses );
										}
										if ( !_.isEmpty( value ) ) classNames.push( value );
										props.setAttributes( { size: value, className: classNames.join( ' ' ) } );
									}
								} )
							] )
						] )
					];
				};

				return el( wp.element.Fragment, {}, [
					// inspector
					el( wp.blockEditor.InspectorControls, {}, [
						// design and icon
						makeInspectorControls()
					] ),
					// original block
					el( BlockEdit, props )
				] );
			}

			// return original block
			return el( BlockEdit, props );
		};

	}, 'editBlockHook' );

	wp.hooks.addFilter(
		'editor.BlockEdit',
		'greyd/hook/button/edit',
		editBlockHook
	);

} )(
	window.wp
);