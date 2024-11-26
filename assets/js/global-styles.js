/**
 * Greyd Theme Global Styles.
 * 
 * This style is loaded in the editor.
 */
( function ( wp ) {

	var { createElement: el } = wp.element;
	var { __ } = wp.i18n;
	var _ = lodash;

	if ( !_.has( wp, "editSite" ) ) return null;

	/**
	 * Wrap in a render function.
	 */
	const greydGlobalStyles = function () {

		/**
		 * If the site editor is openend with the following URL, open the Greyd global styles panel directly.
		 * site-editor.php?canvas=edit&greyd-styles=open
		 */
		const searchParams = new URLSearchParams( window.location.search );
		if ( searchParams.get( 'greyd-styles' ) === 'open' ) {
			wp.data.dispatch('core/edit-site').openGeneralSidebar('greyd-global-styles/greyd-global-styles');
		}

		/**
		 * Hook Saving
		 * @since 1.13.0
		 * @since 1.14.0 now to reload global styles and vars after saving
		 */
		var saving = [];
		var [ saveNext, setSaveNext ] = wp.element.useState(false);
		var unsubscribeSaving = wp.data.subscribe( () => {
			var currentlySaving = wp.data.select('core').__experimentalGetEntitiesBeingSaved();
			currentlySaving.filter( ( entity ) => {
				return (entity.key == greyd.tools.globalStyles.postId);
			} );
			if ( saving.length != currentlySaving.length ) {
				saving = currentlySaving;
				if ( saving.length == 0 ) {
					setSaveNext(true);
				}
			}
		} );
		if ( saveNext ) {
			setTimeout(() => {
				// trigger reload of global styles
				greyd.tools.setGlobalStyles( {
					...greyd.tools.globalStyles,
					state: false,
					postId: false,
				} );
			}, 0);
			setSaveNext(false);
		}


		/**
		 * useState
		 */
		[ greyd.tools.globalStyles, greyd.tools.setGlobalStyles ] = wp.element.useState( {
			/**
			 * The current state of the global styles.
			 * 
			 * @var bool|string		false|'loading'|'loaded'|'saving'|'dirty'|'failed'
			 */
			state: false,
			/**
			 * The default (saved) values of the global styles.
			 * 
			 * @var bool|object
			 */
			defaults: false,
			/**
			 * The current post id of wp_global_styles.
			 * 
			 * @var bool|int
			 */
			postId: false,
			/**
			 * The editor wrapper element (iframe contentWindow).
			 * 
			 * @var bool|object
			 */
			wrapper: false,
			/**
			 * The computed css vars from the editor wrapper styleSheets.
			 * 
			 * @var bool|object
			 */
			vars: false,
			/**
			 * The new values of the global styles to be saved.
			 * 
			 * @var object
			 */
			new: {}
		} );

		/**
		 * Check whether there are unsaved styles.
		 * 
		 * @returns {boolean}
		 */
		const hasUnsavedGlobalStyles = () => {
			return (
				greyd.tools.globalStyles.state === "dirty"
				|| !_.isEmpty( greyd.tools.globalStyles.new )
			);
		}
	
		/**
		 * Notify user about unsaved changes before leaving the page.
		 */
		window.onbeforeunload = () => {
			if ( hasUnsavedGlobalStyles() ) {
				return __( 'You have unsaved changes inside the Greyd Styles editor. Are you sure you want to leave?', 'greyd-wp' );
			}
		}

		/**
		 * =================================================================
		 *                          Menus
		 * =================================================================
		 */

		const menuItems = [
			{
				title: __( 'Font families', 'greyd-wp' ),
				slug: "font-families",
				icon: 'editor-paragraph',
				tip: __( 'Define up to three font families for your website. Reference them within your blocks or declare them as defaults for headlines, buttons, and more using the styles editor.', 'greyd-wp' )
			},
			{
				title: __( 'Font sizes', 'greyd-wp' ),
				slug: "font-sizes",
				icon: 'editor-textcolor',
				tip: __( "Define up to seven font sizes here, set to 'fluid' by default. Specify the minimum and maximum values, and the system automatically adjusts font sizes between screen sizes for optimal readability and visual consistency.", 'greyd-wp' )
			},
			{
				title: __( 'Buttons', 'greyd-wp' ),
				slug: "button",
				icon: 'button',
				menu: [
					{
						title: __( 'Basics', 'greyd-wp' ),
						slug: "basic",
						icon: 'admin-tools'
					},
					{
						title: __( 'Primary button', 'greyd-wp' ),
						slug: "prim",
						icon: 'button'
					},
					{
						title: __( 'Secondary button', 'greyd-wp' ),
						slug: "sec",
						icon: 'button'
					},
					{
						title: __( 'Alternate button', 'greyd-wp' ),
						slug: "trd",
						icon: 'button'
					},
					{
						title: __( 'Large button', 'greyd-wp' ),
						slug: "big",
						icon: 'editor-expand'
					},
					{
						title: __( 'Small button', 'greyd-wp' ),
						slug: "small",
						icon: 'editor-contract'
					},
				]
			},
			{
				title: __( 'Input fields', 'greyd-wp' ),
				slug: "input",
				icon: 'forms',
				menu: [
					{
						title: __( 'Basics', 'greyd-wp' ),
						slug: "basic",
						icon: 'admin-tools'
					},
					{
						title: __( 'Primary input', 'greyd-wp' ),
						slug: "prim",
						icon: 'button'
					},
					{
						title: __( 'Secondary input', 'greyd-wp' ),
						slug: "sec",
						icon: 'button'
					},
					{
						title: __( 'Labels', 'greyd-wp' ),
						slug: "label",
						icon: 'editor-paragraph'
					},
					/**
					 * @todo tooltips, multiselect
					 */
				]
			},
			{
				title: __( 'Spacing', 'greyd-wp' ),
				slug: "spacing",
				icon: 'align-center',
				tip: __( "Here you can set spacing sizes, which can be referenced when adjusting margins, gaps or paddings. By using more dynamic calculations, you can achieve native responsiveness without the need to define a static value for every breakpoint, try using options like 'clamp' combined with dynamic units like 'vw' (vieport width) or 'vh' (viewport height) to see what is possible.", 'greyd-wp' ),
			},
			{
				title: __('Grid', 'greyd-wp'),
				slug: "grid",
				icon: 'align-wide',
				// tip: __( "Customise the grid.", 'greyd-wp' ),
			},
		];

		const tabs = [
			{
				label: __( "Default", "greyd-wp" ),
				slug: ""
			},
			{
				label: __( "Hover", "greyd-wp" ),
				slug: "hover",
				previewClass: "has-button-hover"
			}
		];

		/**
		 * Get the current menu item.
		 * @param {string} slug name of the item
		 * @returns {object}
		 */
		const getMenuItem = ( slug ) => {
			let menuItem = false;
			const [ main, sub = "" ] = slug.split( '.' );
			menuItems.forEach( ( item ) => {
				if ( item.slug == main ) {
					menuItem = item;
				}
			} );
			return menuItem;
		};

		/**
		 * Get the current menu or submenu item (if any).
		 * @param {string} slug name of the item
		 * @returns {object}
		 */
		const getSubMenuItem = ( slug ) => {
			const [ main, sub = "" ] = slug.split( '.' );
			let menuItem = getMenuItem( slug );
			if ( menuItem && _.has( menuItem, 'menu' ) ) {
				menuItem.menu.forEach( ( item ) => {
					if ( item.slug == sub ) {
						menuItem = item;
					}
				} );
			}
			return menuItem;
		};


		/**
		 * =================================================================
		 *                          Utils
		 * =================================================================
		 */

		/**
		 * Get styles (css vars) from merged global styles
		 * @since 1.14.0
		 */
		const getStyles = () => {

			var custom_styles = {
				"font-size": {},
				"font-family": {},
				"spacing": {},
				"grid": {},
				"button": {},
				"input": {},
			};

			var merged = greyd.tools.getMergedGlobalStyles();

			// font-size
			if ( merged?.typography?.fontSizes?.theme ) {
				merged.typography.fontSizes.theme.forEach( (size) => {
					if ( size.fluid ) {
						var { min, max } = size.fluid;
						custom_styles[ "font-size" ][ "--wp--preset--font-size--"+size.slug ] = 'clamp(' + min + ', calc((' + min + ' + ' + max + ') / 2 ), ' + max + ')';
					}
					else custom_styles[ "font-size" ][ "--wp--preset--font-size--"+size.slug ] = size.size;
				} );
			}
			// font-family
			if ( merged?.typography?.fontFamilies?.theme ) {
				merged.typography.fontFamilies.theme.forEach( (family) => {
					custom_styles[ "font-family" ][ "--wp--preset--font-family--"+family.slug ] = family.fontFamily;
				} );
			}
			if ( merged?.typography?.fontFamilies?.custom ) {
				merged.typography.fontFamilies.custom.forEach( (family) => {
					custom_styles[ "font-family" ][ "--wp--preset--font-family--"+family.slug ] = family.fontFamily;
				} );
			}

			// spacing
			if ( merged?.spacing?.spacingSizes?.theme ) {
				merged.spacing.spacingSizes.theme.forEach( (size) => {
					custom_styles[ "spacing" ][ "--wp--preset--spacing--"+size.slug ] = size.size;
				} );
			}
			// grid
			custom_styles[ "grid" ] = greyd.tools.flattenObj( merged.custom.greyd.grid, '--wp--custom--greyd--grid', '--' );
			custom_styles[ "grid" ][ '--wp--style--global--content-size' ] = merged.layout.contentSize;
			custom_styles[ "grid" ][ '--wp--style--global--wide-size' ] = merged.layout.wideSize;

			// button
			custom_styles[ "button" ] = greyd.tools.flattenObj( merged.custom.greyd.button, '--wp--custom--greyd--button', '--' );
			// input
			custom_styles[ "input" ] = greyd.tools.flattenObj( merged.custom.greyd.input, '--wp--custom--greyd--input', '--' );

			return custom_styles;
		}

		/**
		 * Set style value (css var)
		 */
		const setStyle = ( key, value ) => {

			// set value
			setStyles( [ { key: key, value: value } ] );

		};

		/**
		 * Set multiple style values (css var)
		 */
		const setStyles = ( styles ) => {
			
			if (
				greyd.tools.globalStyles.state == 'loading' ||
				!greyd.tools.globalStyles.vars
			) return;

			var new_styles = {};
			for ( var i = 0; i < styles.length; i++ ) {
				var key = false;
				var value = false;
				if ( _.has( styles[i], 'key' ) && _.has( styles[i], 'value' ) ) {
					key = styles[i].key;
					value = styles[i].value;
				}
				else if ( styles[i].length == 2 ) {
					key = styles[i][0];
					value = styles[i][1];
				}
				if ( key && ( typeof value === 'undefined' || value === null ) ) {
					value = '';
				}
				if ( key && value ) {
					// set global styles value
					greyd.tools.setGlobalStylesValue( key, value );
					new_styles[key] = value;
				}
			}

			greyd.tools.setGlobalStyles( {
				...greyd.tools.globalStyles,
				state: 'dirty',
				vars: getStyles(),
				new: { ...greyd.tools.globalStyles.new, ...new_styles }
			} );
		};


		/**
		 * =================================================================
		 *                          Mode
		 * =================================================================
		 */
		var [ mode, setMode ] = wp.element.useState( "" );
		var current = getMenuItem( mode );

		/**
		 * get global styles
		 */
		if (
			!greyd.tools.globalStyles.postId &&
			greyd.tools.globalStyles.state !== 'loading'
		) {
			// get global styles
			greyd.tools.getGlobalStyles();
		}

		/**
		 * sync
		 */
		else if ( _.isEmpty(greyd.tools.globalStyles.vars) ) {
			// get vars
			greyd.tools.globalStyles.vars = getStyles();
		}

		/**
		 * Subscribe to visibility change
		 * reset mode and vars when navigating away
		 */
		var isSelected = wp.data.subscribe( () => {
			if ( mode != "" ) {
				var panel = document.getElementsByClassName( "greyd-styles-panel" );
				if ( !panel || panel.length == 0 ) {
					greyd.tools.setGlobalStyles( {
						...greyd.tools.globalStyles,
						vars: {}
					} );
					setMode( "" );
				}
			}
		} );


		/**
		 * =================================================================
		 *                          Render functions
		 * =================================================================
		 */

		/**
		 * Render either a submenu or a panel.
		 * @returns {WPElement[]}
		 */
		function renderSubmenuPanel() {

			return [

				( mode == current.slug ) ? [

					// sub menu
					el( 'div', { className: 'panel-menu' }, [
						current.menu.map( ( sub ) => el( wp.components.Button, {
							disabled: sub.disabled ? 'disabled' : '',
							className: 'panel-menu-item',
							icon: sub.icon,
							onClick: function () { setMode( current.slug + '.' + sub.slug ); }
						}, sub.title ) )
					] )

				] : [

					// individual
					current.menu.map( ( sub ) => {

						if ( mode == current.slug + '.' + sub.slug ) {
							// render panel
							return renderPanel( {
								parent: current.slug,
								item: sub,
								tip: _.has( current, 'tip' ) ? current.tip : null
							} );
						}

					} )
				]

			];
		}

		/**
		 * Render a styles Panel.
		 * @param {object} atts Attributes
		 * @returns {WPElement[]}
		 */
		function renderPanel( atts ) {

			var elements = [];

			// font families
			if ( atts.item.slug == 'font-families' ) {

				/**
				 * convert/deprecate google and custom fonts
				 * @since 1.13.0
				 */
				elements.push(
					el( greyd.components.ConvertFontControl )
				)

				elements.push( ...[
					greyd.tools.settings.getFontFamilies().map( ( family ) => {

						// get value
						var value = greyd.tools.globalStyles.vars?.[ 'font-family' ]?.[ family.slug ];
						if ( _.has(greyd.tools.globalStyles.new, family.slug) ) {
							value = greyd.tools.globalStyles.new[family.slug];
						}
						else if ( greyd.tools.font.isGoogle(value) && family.faces?.length > 0 ) {
							var weights = [];
							family.faces.forEach( (face) => {
								var weight = face.fontWeight;
								if ( face.fontStyle == 'italic' ) weight = weight+'i';
								weights.push(weight);
							} );
							value += greyd.tools.font.setWeights( weights );
						}
						
						// make preview
						var valuePreview = value;
						if ( greyd.tools.font.isGoogle(value) ) {
							valuePreview = greyd.tools.font.getName(value);
							var weights = greyd.tools.font.getWeights(value);
							var weightsPreview = [];
							if ( weights.length > 1 || ( weights.length == 1 && weights[0] != '400' ) ) {
								weights.forEach( (weight) => {
									if ( weight == '100' )  weightsPreview.push( '<span style="font-weight:100;font-style:normal"> '+valuePreview+' Thin 100 </span>' );
									if ( weight == '100i' ) weightsPreview.push( '<span style="font-weight:100;font-style:italic"> '+valuePreview+' Thin 100 Italic </span>' );
									if ( weight == '200' )  weightsPreview.push( '<span style="font-weight:200;font-style:normal"> '+valuePreview+' Extra Light 200 </span>' );
									if ( weight == '200i' ) weightsPreview.push( '<span style="font-weight:200;font-style:italic"> '+valuePreview+' Extra Light 200 Italic </span>' );
									if ( weight == '300' )  weightsPreview.push( '<span style="font-weight:300;font-style:normal"> '+valuePreview+' Light 300 </span>' );
									if ( weight == '300i' ) weightsPreview.push( '<span style="font-weight:300;font-style:italic"> '+valuePreview+' Light 300 Italic </span>' );
									if ( weight == '400' )  weightsPreview.push( '<span style="font-weight:400;font-style:normal"> '+valuePreview+' Regular 400 </span>' );
									if ( weight == '400i' ) weightsPreview.push( '<span style="font-weight:400;font-style:italic"> '+valuePreview+' Regular 400 Italic </span>' );
									if ( weight == '500' )  weightsPreview.push( '<span style="font-weight:500;font-style:normal"> '+valuePreview+' Medium 500 </span>' );
									if ( weight == '500i' ) weightsPreview.push( '<span style="font-weight:500;font-style:italic"> '+valuePreview+' Medium 500 Italic </span>' );
									if ( weight == '600' )  weightsPreview.push( '<span style="font-weight:600;font-style:normal"> '+valuePreview+' Semi Bold 600 </span>' );
									if ( weight == '600i' ) weightsPreview.push( '<span style="font-weight:600;font-style:italic"> '+valuePreview+' Semi Bold 600 Italic </span>' );
									if ( weight == '700' )  weightsPreview.push( '<span style="font-weight:700;font-style:normal"> '+valuePreview+' Bold 700 </span>' );
									if ( weight == '700i' ) weightsPreview.push( '<span style="font-weight:700;font-style:italic"> '+valuePreview+' Bold 700 Italic </span>' );
									if ( weight == '800' )  weightsPreview.push( '<span style="font-weight:800;font-style:normal"> '+valuePreview+' Extra Bold 800 </span>' );
									if ( weight == '800i' ) weightsPreview.push( '<span style="font-weight:800;font-style:italic"> '+valuePreview+' Extra Bold 800 Italic </span>' );
									if ( weight == '900' )  weightsPreview.push( '<span style="font-weight:900;font-style:normal"> '+valuePreview+' Black 900 </span>' );
									if ( weight == '900i' ) weightsPreview.push( '<span style="font-weight:900;font-style:italic"> '+valuePreview+' Black 900 Italic </span>' );
								} );
							}
							if ( weightsPreview.length > 0 ) {
								valuePreview += '<br>'+weightsPreview.join('<br>');
								valuePreview = el( 'div', { dangerouslySetInnerHTML: { __html: valuePreview } } );
							}
						}

						return el( wp.components.PanelBody, {
							title: __( family.title, 'greyd-wp' ),
							initialOpen: true
						}, [

							// preview
							el( greyd.components.StylesPreview, {
								mode: 'font',
								vars: greyd.tools.globalStyles.vars,
								slug: family.slug
							}, [
								el( 'div', {}, valuePreview )
							] ),

							// font-family
							el( greyd.components.FontfamilyControl, {
								value: value,
								onChange: ( newValue ) => setStyle( family.slug, newValue )
							} )
						] );
					} )
				] );

			}

			// font sizes
			if ( atts.item.slug == 'font-sizes' ) {

				elements.push( ...[
					greyd.tools.settings.getFontSizes().map( ( size ) => {
						return el( wp.components.PanelBody, {
							title: __( size.title, 'greyd-wp' ),
							initialOpen: true
						}, [
							el( greyd.components.ClampMinMaxControl, {
								value: greyd.tools.globalStyles.vars[ 'font-size' ][ size.slug ],
								modes: [ 'static', 'fluid' ],
								onChange: ( newValue ) => setStyle( size.slug, newValue )
							} )
						] );
					} )
				] );
			}

			// spacing
			if ( atts.item.slug == 'spacing' ) {

				elements.push( ...[
					greyd.tools.settings.getSpacingSizes().map( ( size ) => {
						return el( wp.components.PanelBody, {
							title: size.title,
							initialOpen: true
						}, [
							el( greyd.components.ClampMinMaxControl, {
								value: greyd.tools.globalStyles.vars[ 'spacing' ][ size.slug ],
								onChange: ( newValue ) => setStyle( size.slug, newValue )
							} )
						] );
					} )
				] );
			}

			// basics (button/input)
			if ( atts.item.slug == 'basic' ) {

				// controls
				elements.push( ...[

					// previews
					el( greyd.components.StylesPreview, {
						mode: atts.parent,
						vars: greyd.tools.globalStyles.vars,
						slug: [ 'prim', 'sec', 'trd' ],
						labels: {
							'prim': __( 'Primary', 'greyd-wp' ),
							'sec': __( 'Secondary', 'greyd-wp' ),
							'trd': __( 'Tertiary', 'greyd-wp' )
						}
					} ),

					// font
					el( greyd.components.GlobalStylesPanelBody, {
						title: __( 'Typography', 'greyd-wp' ),
					}, renderTypographyPanel( atts.parent ) ),

					// spacing
					el( greyd.components.GlobalStylesPanelBody, {
						title: __( 'Spacing', 'greyd-wp' ),
					}, renderSpacingPanel( atts.parent ) ),

				] );

			}

			// type (button/form/link)
			if ( atts.item.slug == 'prim' || atts.item.slug == 'sec' || atts.item.slug == 'trd' ) {

				elements.push( ...[

					// preview
					el( greyd.components.StylesPreview, {
						mode: atts.parent,
						vars: greyd.tools.globalStyles.vars,
						slug: atts.item.slug,
						labels: {
							'prim': __( 'Primary', 'greyd-wp' ),
							'sec': __( 'Secondary', 'greyd-wp' ),
							'trd': __( 'Tertiary', 'greyd-wp' )
						}
					} ),

					// color
					el( greyd.components.GlobalStylesPanelBody, {
						title: __( 'Colors', 'greyd-wp' ),
						tabs: tabs,
					}, renderColorPanel( atts.parent, atts.item.slug ) ),

				] );

				if ( atts.parent == 'link' ) {

					// text decoration
					elements.push( ...[
						el( greyd.components.GlobalStylesPanelBody, {
							title: __( 'Decoration', 'greyd-wp' ),
							tabs: tabs,
						}, renderDecorationPanel( atts.parent, atts.item.slug ) )
					] );
				}

				if ( atts.parent == 'button' || atts.parent == 'input' ) {

					elements.push( ...[

						// border-radius
						el( greyd.components.GlobalStylesPanelBody, {
							title: __( 'Border radius', 'greyd-wp' ),
						}, renderBorderRadiusPanel( atts.parent, atts.item.slug ) ),

						// border
						el( greyd.components.GlobalStylesPanelBody, {
							title: __( 'Border', 'greyd-wp' ),
							tabs: tabs,
						}, renderBorderPanel( atts.parent, atts.item.slug ) ),

						// shadow
						el( greyd.components.GlobalStylesPanelBody, {
							title: __( 'Box shadow', 'greyd-wp' ),
							tabs: tabs,
						}, renderShadowPanel( atts.parent, atts.item.slug ) ),
					] );
				}

			}

			// size (button)
			if ( atts.item.slug == 'big' || atts.item.slug == 'small' ) {

				// controls
				elements.push( ...[

					// previews
					el( greyd.components.StylesPreview, {
						mode: atts.parent,
						vars: greyd.tools.globalStyles.vars,
						slug: [ 'prim ' + atts.item.slug ],
						labels: {
							['prim ' + atts.item.slug]: atts.item.slug == 'big' ?  __( 'Large', 'greyd-wp' ) :  __( 'Small', 'greyd-wp' )
						}
					} ),

					// font
					el( greyd.components.GlobalStylesPanelBody, {
						title: __( 'Typography', 'greyd-wp' ),
					}, renderTypographyPanel( atts.parent, atts.item.slug ) ),

					// spacing
					el( greyd.components.GlobalStylesPanelBody, {
						title: __( 'Spacing', 'greyd-wp' ),
					}, renderSpacingPanel( atts.parent, atts.item.slug ) ),

				] );

			}

			// label (input)
			if ( atts.item.slug == 'label' ) {

				// controls
				elements.push( ...[

					// previews
					el( greyd.components.StylesPreview, {
						mode: atts.parent,
						vars: greyd.tools.globalStyles.vars,
						slug: atts.item.slug,
						labels: {
							'label': __( 'Label', 'greyd-wp' )
						}
					} ),

					// font
					el( greyd.components.GlobalStylesPanelBody, {
						title: __( 'Typography', 'greyd-wp' ),
					}, renderTypographyPanel( atts.parent, atts.item.slug ) ),

					// color
					el( greyd.components.GlobalStylesPanelBody, {
						title: __( 'Colors', 'greyd-wp' ),
					}, renderColorPanel( atts.parent, atts.item.slug ) ),

				] );

			}

			// grid
			if ( atts.item.slug == 'grid' ) {

				var labels = {
					sm: {
						label: __( 'Small breakpoint', 'greyd-wp' ),
						help: __( 'This breakpoint usually sets the mobile screen size.', 'greyd-wp' )
					},
					md: {
						label: __( 'Medium breakpoint', 'greyd-wp' ),
						help: __( 'This breakpoint usually sets the break between tablet and smaller desktops.', 'greyd-wp' )
					},
					lg: {
						label: __( 'Large breakpoint', 'greyd-wp' ),
						help: __( 'This breakpoint usually sets the break between smaller and larger desktops.', 'greyd-wp' )
					}
				};

				const isGreydPluginActive = greyd.tools.isPluginActive('greyd-plugin/init');

				// controls
				elements.push( ...[

					// breakpoints
					el( greyd.components.GlobalStylesPanelBody, {
						title: __( 'Breakpoints', 'greyd-wp' ),
						initialOpen: true
					}, [

						// breakpoint controls
						isGreydPluginActive && [ "sm", "md", "lg" ].map( ( breakpoint ) => {

							const value = parseInt( greyd.tools.globalStyles.vars?.[ 'grid' ]?.[ '--wp--custom--greyd--grid--breakpoint--' + breakpoint ] );
							const checkValue = ( bp, val ) => {
								var { min, max } = getMinMax( bp );
								val = parseInt( val );
								if ( val === '' ) val = value;
								if ( val > max ) val = max;
								if ( val < min ) val = min;
								return val + 'px';
							};
							const getMin = ( bp ) => {
								var { min, max } = getMinMax( bp );
								return min;
							};
							const getMax = ( bp ) => {
								var { min, max } = getMinMax( bp );
								return max;
							};
							const getMinMax = ( bp ) => {
								var min = 1;
								var max = 1920;
								if ( bp == "sm" ) {
									max = parseInt( greyd.tools.globalStyles.vars[ 'grid' ][ '--wp--custom--greyd--grid--breakpoint--md' ] ) - 1;
								}
								else if ( bp == "md" ) {
									min = parseInt( greyd.tools.globalStyles.vars[ 'grid' ][ '--wp--custom--greyd--grid--breakpoint--sm' ] ) + 1;
									max = parseInt( greyd.tools.globalStyles.vars[ 'grid' ][ '--wp--custom--greyd--grid--breakpoint--lg' ] ) - 1;
								}
								else if ( bp == "lg" ) {
									min = parseInt( greyd.tools.globalStyles.vars[ 'grid' ][ '--wp--custom--greyd--grid--breakpoint--md' ] ) + 1;
								}
								return { min: min, max: max };
							};
							
							return el( wp.components.BaseControl, {
								label: labels[ breakpoint ].label,
								help: labels[ breakpoint ].help,
							}, [
								el( wp.components.Flex, {}, [
									el( wp.components.FlexItem, { style: { flex: "1" } }, [
										el( wp.components.__experimentalUnitControl, {
											value: value,
											units: [ { value: 'px', label: 'px', default: 1 } ],
											min: getMin(breakpoint),
											max: getMax(breakpoint),
											onChange: ( newValue ) => {
												newValue = checkValue( breakpoint, newValue );
												setStyle( '--wp--custom--greyd--grid--breakpoint--' + breakpoint, newValue );
											},
										} ),
									] ),
									el( wp.components.FlexItem, { style: { flex: "2" } }, [
										el( wp.components.RangeControl, {
											withInputField: false,
											value: value,
											min: 1, max: 1920, step: 1,
											onChange: ( newValue ) => {
												newValue = checkValue( breakpoint, newValue+'px' );
												setStyle( '--wp--custom--greyd--grid--breakpoint--' + breakpoint, newValue );
											}
										} )
									] )
								] )
							] );

						} ),

						!isGreydPluginActive && el( wp.components.Tip, {}, [
							el( "div", {}, __( "If you are using the Greyd Plugin you can define up to four different screen sizes. Go to the Greyd Theme dashboard to install the plugin.", "greyd-wp" ) ),
						] )
					] ),

					// content size
					el( greyd.components.GlobalStylesPanelBody, {
						title: __( 'Content size', 'greyd-wp' ),
						initialOpen: true
					}, [
						el( greyd.components.ClampMinMaxControl, {
							enableCustom: true,
							help: __( 'This setting overwrites the default content size set inside the Global Styles panel.', 'greyd-wp' ),
							value: greyd.tools.globalStyles.vars?.[ 'grid' ]?.[ '--wp--style--global--content-size' ],
							onChange: ( newValue ) => setStyle( '--wp--style--global--content-size', newValue )
						} )
					] ),

					// wide size
					el( greyd.components.GlobalStylesPanelBody, {
						title: __( 'Wide size', 'greyd-wp' ),
						initialOpen: true
					}, [
						el( greyd.components.ClampMinMaxControl, {
							enableCustom: true,
							help: __( 'This setting overwrites the default wide size set inside the Global Styles panel.', 'greyd-wp' ),
							value: greyd.tools.globalStyles.vars?.[ 'grid' ]?.[ '--wp--style--global--wide-size' ],
							onChange: ( newValue ) => setStyle( '--wp--style--global--wide-size', newValue )
						} )
					] ),

					// spacing
					el( greyd.components.GlobalStylesPanelBody, {
						title: __( 'Spacing', 'greyd-wp' ),
						initialOpen: true
					}, [
						el( wp.components.BaseControl, {
							help: [
								el( "p", {}, [
									__( 'You can select the default block spacing in the Global Styles "Layout" settings.', 'greyd-wp' )
								] ),
								el( "a", { 
									style: { cursor: 'pointer' },
									onClick: () => wp.data.dispatch('core/edit-site').openGeneralSidebar('edit-site/global-styles')
								}, __( 'Go to Global Styles →', 'greyd-wp' ) )
							]
						} )
					] ),

				] );

			}

			// tip (all panels)
			if ( _.has( current, 'tip' ) ) {
				elements.unshift(
					el( wp.components.PanelBody, {
						title: __( 'Help', 'greyd-wp' ),
						initialOpen: false
					}, [
						el( wp.components.Tip, {}, [
							el( "div", {}, current.tip ),
						] )
					] )
				)
			}

			return elements;
		}


		/**
		 * panels render functions
		 */

		// font
		function renderTypographyPanel( slug, type = "" ) {
			var { pre, vars, defaults } = getRenderData( slug, type );

			return [
				// font
				el( greyd.components.FontSettingsControl, {
					values: {
						fontFamily: _.has( defaults.typography, "fontFamily" ) && {
							slug: pre + "typography--font-family",
							value: vars[ pre + "typography--font-family" ],
							options: greyd.tools.settings.getFontFamilyOptions(),
							default: defaults.typography.fontFamily
						},
						fontSize: _.has( defaults.typography, "fontSize" ) && {
							slug: pre + "typography--font-size",
							value: greyd.tools.settings.getFontSize( vars[ pre + "typography--font-size" ] ),
							options: greyd.tools.settings.getFontSizeOptions(),
							default: defaults.typography.fontSize
						},
						fontWeight: _.has( defaults.typography, "fontWeight" ) && {
							slug: pre + "typography--font-weight",
							value: vars[ pre + "typography--font-weight" ],
							default: defaults.typography.fontWeight
						},
						lineHeight: _.has( defaults.typography, "lineHeight" ) && {
							slug: pre + "typography--line-height",
							value: vars[ pre + "typography--line-height" ],
							default: defaults.typography.lineHeight
						},
						textTransform: _.has( defaults.typography, "textTransform" ) && {
							slug: pre + "typography--text-transform",
							value: vars[ pre + "typography--text-transform" ],
							default: defaults.typography.textTransform
						},
						letterSpacing: _.has( defaults.typography, "letterSpacing" ) && {
							slug: pre + "typography--letter-spacing",
							value: vars[ pre + "typography--letter-spacing" ],
							default: defaults.typography.letterSpacing
						},
						wordSpacing: _.has( defaults.typography, "wordSpacing" ) && {
							slug: pre + "typography--word-spacing",
							value: vars[ pre + "typography--word-spacing" ],
							default: defaults.typography.wordSpacing
						}
					},
					onChange: ( slug, newValue ) => {
						setStyle( slug, newValue );
					}
				} )
			];
		}

		// spacing
		function renderSpacingPanel( slug, type = "" ) {
			var { pre, vars, defaults } = getRenderData( slug, type );

			return [
				// spacing
				el( greyd.components.SpacingSettingsControl, {
					values: {
						margin: _.has( defaults.spacing, "margin" ) && {
							slug: {
								top: pre + "spacing--margin--top",
								bottom: pre + "spacing--margin--bottom"
							},
							value: {
								top: vars[ pre + "spacing--margin--top" ],
								bottom: vars[ pre + "spacing--margin--bottom" ]
							},
							default: defaults.spacing.margin
						},
						padding: _.has( defaults.spacing, "padding" ) && {
							slug: {
								top: pre + "spacing--padding--top",
								left: pre + "spacing--padding--left",
								right: pre + "spacing--padding--right",
								bottom: pre + "spacing--padding--bottom"
							},
							value: {
								top: vars[ pre + "spacing--padding--top" ],
								left: vars[ pre + "spacing--padding--left" ],
								right: vars[ pre + "spacing--padding--right" ],
								bottom: vars[ pre + "spacing--padding--bottom" ]
							},
							default: defaults.spacing.padding
						}
					},
					onChange: ( newValues ) => {
						setStyles( newValues );
					}
				} )
			];
		}

		// color
		function renderColorPanel( slug, type = "" ) {
			var { pre, vars, defaults } = getRenderData( slug, type );

			if ( !_.has( defaults, 'color' ) ) return null;

			var last = "";
			if ( _.has( defaults.color, 'text' ) ) last = "text";
			if ( _.has( defaults.color, 'placeholder' ) ) last = "placeholder";
			if ( _.has( defaults.color, 'background' ) ) last = "background";

			return [
				// text
				_.has( defaults.color, 'text' ) && el( greyd.components.GlobalStylesColorGradientPopupControl, {
					className: last == "text" ? 'single' : '',
					mode: 'color',
					label: __( "Text", "greyd-wp" ),
					value: vars[ pre + "color--text" ],
					onChange: ( newValue ) => {
						if ( newValue === '' ) newValue = defaults.color.text;
						setStyle( pre + "color--text", newValue );
					},
					hover: _.has( defaults, ':hover.color.text' ) && {
						value: vars[ pre + "hover--color--text" ],
						onChange: ( newValue ) => {
							if ( newValue === '' ) newValue = defaults[':hover'].color.text;
							setStyle( pre + "hover--color--text", newValue );
						},
					}
				} ),
				// placeholder
				_.has( defaults.color, 'placeholder' ) && el( greyd.components.GlobalStylesColorGradientPopupControl, {
					className: last == "placeholder" ? 'single' : '',
					mode: 'color',
					label: __( "Placeholder", "greyd-wp" ),
					value: vars[ pre + "color--placeholder" ],
					onChange: ( newValue ) => {
						if ( newValue === '' ) newValue = defaults.color.placeholder;
						setStyle( pre + "color--placeholder", newValue );
					},
					hover: _.has( defaults, ':hover.color.placeholder' ) && {
						value: vars[ pre + "hover--color--placeholder" ],
						onChange: ( newValue ) => {
							if ( newValue === '' ) newValue = defaults[':hover'].color.placeholder;
							setStyle( pre + "hover--color--placeholder", newValue );
						},
					}
				} ),
				// background
				_.has( defaults.color, 'background' ) && el( greyd.components.GlobalStylesColorGradientPopupControl, {
					className: last == "background" ? 'single' : '',
					label: __( "Background", "greyd-wp" ),
					value: vars[ pre + "color--background" ],
					enableAlpha: true,
					onChange: ( newValue ) => {
						if ( newValue === '' ) newValue = defaults.color.background;
						setStyle( pre + "color--background", newValue );
					},
					hover: _.has( defaults, ':hover.color.background' ) && {
						value: vars[ pre + "hover--color--background" ],
						onChange: ( newValue ) => {
							if ( newValue === '' ) newValue = defaults[':hover'].color.background;
							setStyle( pre + "hover--color--background", newValue );
						},
					}
				} ),
			];
		}

		// border-radius
		function renderBorderRadiusPanel( slug, type = "" ) {

			var { pre, vars, defaults } = getRenderData( slug, type );

			if ( !_.has( defaults, 'border.radius' ) ) {
				return null;
			}

			const getBorderRadiusValue = ( val ) => {
				if ( typeof val === 'undefined' || val === null ) {
					val = {
						topLeft: '0',
						topRight: '0',
						bottomRight: '0',
						bottomLeft: '0',
					}
				}
				else if ( val.match( /[^\s]+\s[^\s]+/ ) ) {
					var tmp = val.split( " " );
					val = {
						topLeft: tmp[ 0 ],
						topRight: tmp[ 1 ],
						bottomRight: _.has( tmp, '2' ) ? tmp[ 2 ] : tmp[ 0 ],
						bottomLeft: _.has( tmp, '3' ) ? tmp[ 3 ] : tmp[ 1 ],
					};
				}
				return val;
			};
			const setBorderRadiusValue = ( val ) => {
				if ( typeof val === 'undefined' || val === null ) {
					val = '0';
				}
				else if ( typeof val === 'object' ) {
					var tmp = [];
					tmp.push( typeof val.topLeft !== 'undefined' ? val.topLeft : '0px' );
					tmp.push( typeof val.topRight !== 'undefined' ? val.topRight : '0px' );
					tmp.push( typeof val.bottomRight !== 'undefined' ? val.bottomRight : '0px' );
					tmp.push( typeof val.bottomLeft !== 'undefined' ? val.bottomLeft : '0px' );
					val = tmp.join( " " );
				}
				return val;
			};

			return [
				el( wp.blockEditor.__experimentalBorderRadiusControl, {
					values: getBorderRadiusValue( vars[ pre + "border--radius" ] ),
					onChange: ( newValue ) => {
						if ( newValue === '' ) newValue = defaults.radius;
						setStyle( pre + "border--radius", setBorderRadiusValue( newValue ) );
					},
				} )
			];
		}

		// border
		function renderBorderPanel( slug, type = "" ) {

			/**
			 * For separate borders, we need to make sure that the value is not a variable
			 * because the variable usually points to another border value which could be
			 * looking like '1px 1px var(--wp--style--global--border--width) 1px'.
			 * The resulting value would then be something like
			 * '3px 3px 1px 1px var(--wp--style--global--border--width) 1px 3px' which leads
			 * to invalid CSS.
			 * 
			 * @since 1.15.0
			 */
			const doNotMakeVar = ( value, fallback ) => {
				if ( ! value || ! typeof value === 'string' ) {
					return fallback;
				}
				if ( value.indexOf( 'var(' ) > -1 ) {
					return fallback;
				}
				return value;
			};
			
			const getBorderValue = ( val, pre ) => {

				let newValue = {};

				let width = val[ pre + "border--width" ];
				let style = val[ pre + "border--style" ];
				let color = val[ pre + "border--color" ];

				/**
				 * Support for independant borders
				 */
				if (
					width && width.indexOf( ' ' ) > -1
					&& style && style.indexOf( ' ' ) > -1
					&& color && color.indexOf( ' ' ) > -1
				) {
					width = width.split( " " );
					style = style.split( " " );
					color = color.split( " " );

					newValue = {
						top: {
							width: doNotMakeVar( width[ 0 ], '0' ),
							style: doNotMakeVar( style[ 0 ], 'solid' ),
							color: doNotMakeVar( greyd.tools.settings.getColorValue( color[ 0 ] ), 'currentColor' )
						},
						right: {
							width: doNotMakeVar( width[ 1 ], '0' ),
							style: doNotMakeVar( style[ 1 ], 'solid' ),
							color: doNotMakeVar( greyd.tools.settings.getColorValue( color[ 1 ] ), 'currentColor' )
						},
						bottom: {
							width: doNotMakeVar( _.has( width, '2' ) ? width[ 2 ] : width[ 0 ], '0' ),
							style: doNotMakeVar( _.has( style, '2' ) ? style[ 2 ] : style[ 0 ], 'solid' ),
							color: doNotMakeVar( greyd.tools.settings.getColorValue( color[ 2 ] ), 'currentColor' )
						},
						left: {
							width: doNotMakeVar( _.has( width, '3' ) ? width[ 3 ] : width[ 1 ], '0' ),
							style: doNotMakeVar( _.has( style, '3' ) ? style[ 3 ] : style[ 1 ], 'solid' ),
							color: doNotMakeVar( greyd.tools.settings.getColorValue( color[ 3 ] ), 'currentColor' )
						}
					};
				}
				/**
				 * Synchronise border
				 */
				else {
					newValue = {
						width: width,
						style: style,
						color: greyd.tools.settings.getColorValue( color )
					};
				}

				return newValue;
			};

			const setBorderValue = ( val, pre, default_border ) => {

				/**
				 * Get single border values from object
				 * 
				 * @param {object} value Either:
				 *  - object with width, style, color
				 *  - object with top, left, right, bottom
				 * @returns {object} with width, style, color
				 */
				const getValues = ( value ) => {
					var singleBorderValue = {};
					if (
						typeof value.top !== 'undefined'
						&& typeof value.bottom !== 'undefined'
						&& typeof value.left !== 'undefined'
						&& typeof value.right !== 'undefined'
					) {
						singleBorderValue = {
							width: doNotMakeVar( value.top.width, 0 ) + " " + doNotMakeVar( value.right.width, 0 ) + " " + doNotMakeVar( value.bottom.width, 0 ) + " " + doNotMakeVar( value.left.width, 0 ),
							style: doNotMakeVar( value.top.style, "solid" ) + " " + doNotMakeVar( value.right.style, "solid" ) + " " + doNotMakeVar( value.bottom.style, "solid" ) + " " + doNotMakeVar( value.left.style, "solid" ),
							color: doNotMakeVar( value.top.color, "currentColor" ) + " " + doNotMakeVar( value.right.color, "currentColor" ) + " " + doNotMakeVar( value.bottom.color, "currentColor" ) + " " + doNotMakeVar( value.left.color, "currentColor" )
						};
					}
					else {
						if ( typeof value.width !== 'undefined' ) {
							singleBorderValue.width = doNotMakeVar( value.width, 0 );
						}
						if ( typeof value.style !== 'undefined' ) {
							singleBorderValue.style = doNotMakeVar( value.style, "solid" );
						}
						if ( typeof value.color !== 'undefined' ) {
							singleBorderValue.color = doNotMakeVar( value.color, "currentColor" );
						}
					}

					return singleBorderValue;
				};

				var newValue = getValues( val );
				if ( !_.isEmpty( newValue ) ) {
					newValue = {
						...default_border, ...newValue
					};
				}
				else {
					newValue = { ...default_border, ...getValues( val ) };
				}

				// convert colors to theme variable
				if ( newValue.color.indexOf( ' ' ) > -1 ) {
					newValue.color = newValue.color.split( " " ).map( ( color ) => {
						return greyd.tools.settings.getColorVariable( color );
					} ).join( " " );
				}
				else {
					newValue.color = greyd.tools.settings.getColorVariable( newValue.color );
				}

				return [
					[ pre + "border--width", newValue.width ],
					[ pre + "border--style", newValue.style ],
					[ pre + "border--color", newValue.color ]
				];
			};
			var { pre, vars, defaults } = getRenderData( slug, type );

			return [
				// border
				_.has( defaults, 'border' ) && el( wp.components.__experimentalBorderBoxControl, {
					__experimentalHasMultipleOrigins: true,
					withSlider: true,
					enableAlpha: true,
					colors: greyd.tools.settings.getColors(),
					value: getBorderValue( vars, pre ),
					onChange: ( newValue ) => {
						setStyles( setBorderValue( newValue, pre, defaults.border ) );
					},
					hover: _.has( defaults, ':hover.border' ) && {
						value: getBorderValue( vars, pre + "hover--" ),
						onChange: ( newValue ) => {
							setStyles( setBorderValue( newValue, pre + "hover--", defaults[':hover'].border ) );
						}
					}
				} )
			];
		}

		// shadow
		function renderShadowPanel( slug, type = "" ) {
			var { pre, vars, defaults } = getRenderData( slug, type );

			return [
				// shadow
				_.has( defaults, 'shadow' ) && el( greyd.components.GlobalStylesDropShadowControl, {
					value: vars[ pre + "shadow" ],
					onChange: ( newValue ) => {
						if ( newValue === '' ) newValue = defaults.shadow;
						setStyle( pre + "shadow", newValue );
					},
					hover: _.has( defaults, ':hover.shadow' ) && {
						value: vars[ pre + "hover--shadow" ],
						default: { var: "var(" + pre + "shadow)", value: vars[ pre + "shadow" ] },
						onChange: ( newValue ) => {
							if ( newValue === '' ) newValue = defaults[':hover'].shadow;
							setStyle( pre + "hover--shadow", newValue );
						},
					}
				} )
			];
		}

		// text-decoration
		function renderDecorationPanel( slug, type = "" ) {
			var { pre, vars, defaults } = getRenderData( slug, type );

			return [
				// decoration
				_.has( defaults, 'decoration' ) && el( greyd.components.TextDecorationControl, {
					label: __( "Text decoration", "greyd-wp" ),
					value: vars[ pre + "decoration" ],
					onChange: ( newValue ) => {
						if ( newValue === '' ) newValue = defaults.decoration;
						setStyle( pre + "decoration", newValue );
					},
					hover: _.has( defaults, ':hover.decoration' ) && {
						value: vars[ pre + "hover--decoration" ],
						default: { var: "var(" + pre + "decoration)", value: vars[ pre + "decoration" ] },
						onChange: ( newValue ) => {
							if ( newValue === '' ) newValue = defaults[':hover'].decoration;
							setStyle( pre + "hover--decoration", newValue );
						},
					}
				} )
			];
		}

		// get data for rendering 
		function getRenderData( slug, type = "" ) {
			var pre = "--wp--custom--greyd--" + slug + "--";
			var vars = greyd.tools.globalStyles.vars[ slug ];
			var defaults = greyd.tools.globalStyles.defaults.custom.greyd[ slug ];
			if ( type != "" ) {
				pre += type + "--";
				defaults = defaults[ type ];
			}
			return { pre: pre, vars: vars, defaults: defaults };
		}

		/**
		 * =================================================================
		 *                          Return
		 * =================================================================
		 */

		// show spinner while loading
		if ( !greyd.tools.globalStyles.state || greyd.tools.globalStyles.state == 'loading' ) {
			return el( 'div', {
				className: 'greyd-styles-panel',
				style: {
					textAlign: 'center'
				}
			}, [
				el( wp.components.Spinner ),
				el( 'p', {
					style: {
						marginTop: '2em'
					}
				}, __( 'Loading Global Styles...', 'greyd-wp' ) )
			] );
		}
		// loading failed
		if ( !greyd.tools.globalStyles.state || !greyd.tools.globalStyles.defaults ) {
			return el( 'div', {
				className: 'greyd-styles-panel',
				style: {
					textAlign: 'center',
					padding: 'calc(2 * var(--basic-padding))'
				}
			}, [
				el( greyd.components.Icon, {
					icon: 'warning',
					style: {
						color: 'red',
						marginBottom: 'var(--basic-padding)',
						fontSize: '32px',
						height: '32px',
						width: '32px',
					}
				} ),
				el( 'p', {
				}, __( 'Error loading Global Styles. Please see console for details.', 'greyd-wp' ) )
			] );
		}
		
		/**
		 * info when in Code Editor
		 * @since 1.13.0
		 */
		if ( wp.data.select( 'core/edit-site' ).getEditorMode() !== 'visual' ) {
			return el( 'div', {
				className: 'greyd-styles-panel',
				style: {
					textAlign: 'center'
				}
			}, [
				el( 'p', {
					style: {
						marginTop: '2em'
					}
				}, __( 'Switch to Visual Editor to edit Greyd Global Styles.', 'greyd-wp' ) )
			] );
		}

		// render panels
		return el( 'div', { className: 'greyd-styles-panel' }, [

			// top area
			el( "div", {
				className: 'panel-head'
			}, [

				el( 'div', {
					style: {
						display: 'flex',
						justifyContent: 'space-between',
						alignItems: 'center'
					}
				}, [

					// go back
					( mode != "" ) ? el( wp.components.Button, {
						variant: 'secondary',
						icon: 'arrow-left-alt',
						onClick: () => setMode( mode.indexOf( '.' ) > 0 ? current.slug : '' ),
					} ) : null,

					el( 'span', {
						className: "panel-title"
					}, (
						current ? _.get( getSubMenuItem( mode ), 'title' ) : __( 'Build your own theme', 'greyd-wp' )
					) ),

				] ),

			] ),

			// main
			(
				mode == ""
				? [
					// main menu
					el( 'div', { className: 'panel-menu' }, [
						menuItems.map( ( item ) => el( wp.components.Button, {
							disabled: item.disabled ? 'disabled' : '',
							style: item.hidden ? { display: 'none' } : {},
							className: 'panel-menu-item',
							icon: item.icon,
							onClick: function () { setMode( item.slug ); }
						}, item.title ) )
					] ),

					el( wp.components.PanelBody, {
						title: __( 'Help', 'greyd-wp' ),
						initialOpen: true
					}, [
						el( wp.components.Tip, {}, [
							el( "span", {}, __( 'You can customize your color palette inside the default Global Styles panel.', 'greyd-wp' ) ),
						] )
					] )
				]
				: [

					// individual panels
					menuItems.map( ( item ) => {

						if ( mode.indexOf( item.slug ) == 0 ) {
							if ( _.has( current, 'menu' ) ) {
								// render sub menu
								return renderSubmenuPanel();
							}
							else {
								// render panel
								return renderPanel( {
									parent: "",
									item: current,
								} );
							}
						}

					} )
				]
			),

			// dev panels
			(
				mode == "colors"
				? [
					// panel colors
					el( wp.components.PanelBody, { title: __( 'Colors', 'greyd-wp' ), initialOpen: true }, [
						el( greyd.components.DebugControl, { value: greyd.tools.globalStyles.vars[ 'color' ] } ),
						el( greyd.components.DebugControl, { value: greyd.tools.globalStyles.vars[ 'gradient' ] } ),
						el( greyd.components.DebugControl, { value: greyd.tools.globalStyles.vars[ 'duotone' ] } ),
						// controls
					] )
				] : (
					mode == "dev"
					? [
						el( wp.components.PanelBody, { title: __( 'dev', 'greyd-wp' ), initialOpen: true }, [
							el( greyd.components.DebugControl, { value: greyd.tools.globalStyles.vars[ 'custom' ] } ),
						] )
					]
					: null
				)
			)
		] );
	};

	/**
	 * Register as plugin.
	 */
	wp.plugins.registerPlugin( 'greyd-global-styles', {
		render: function () {
			return el(
				wp.editor?.PluginSidebar ?? wp.editSite.PluginSidebar,
				{
					name: 'greyd-global-styles',
					icon: el( wp.components.Icon, {
						icon: () => {
							return el( 'svg', {
								width: "24",
								height: "24",
								viewBox: "0 0 24 24",
								fill: "none",
								xmlns: "http://www.w3.org/2000/svg"
							}, [
								el( 'path', {
									fillRule: "evenodd",
									clipRule: "evenodd",
									d: "M19.7639 12.7434L22 14.7513C21.3043 16.2413 20.0173 17.1939 19.2619 17.5115L17.0854 15.3717L16.3003 14.2774L17.0755 16.3683L15.7437 17.6923C14.9089 17.3552 14.2877 16.5881 14.084 16.0703L15.4307 14.7464L15.8183 14.2725L6.76431 18L1 12.333C2.8585 8.2732 6.06861 6.28486 8.01159 5.44457L13.7809 11.1165L15.8232 13.9891L13.8157 8.50769L17.3836 5C20.2658 6.30442 21.4087 8.72757 21.7813 9.51409L18.1588 12.7775L16.3053 13.9891L19.7639 12.7434Z"
								} )
							] )
						}
					} ),
					title: __( 'Greyd Styles', 'greyd-wp' )
				},
				greydGlobalStyles()
			);
		},
	} );

} )(
	window.wp,
	greyd.components
);
