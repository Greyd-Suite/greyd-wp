/**
 * Backend Block Editor Utils & Tools.
 * 
 * This file is loaded in the editor only.
 */
var greyd = greyd || { tools: {}, components: {} };

( function( wp ) {

	const _ = lodash;

	if ( typeof greyd.tools === 'undefined' ) {
		greyd.tools = {};
	}

	/**
	 * hold list of active plugins
	 */
	var activePlugins = [];
	wp.apiFetch( { path: '/wp/v2/plugins' } )
	.then( ( plugins ) => {
		var active = [];
		plugins.forEach( ( plugin ) => {
			if ( plugin.status === 'active' || plugin.status === 'network-active' ) {
				active.push( plugin.plugin );
			}
		} );
		activePlugins = active;
	} );

	/**
	 * check if plugin is active
	 */
	greyd.tools.isPluginActive = ( plugin ) => {
		return activePlugins.indexOf(plugin) !== -1;
	};


	/**
	 * =================================================================
	 *                          Global Styles
	 * =================================================================
	 */

	/**
	 * globalStyles var
	 * just used as dummy for post-editor
	 * in site-editor it is overwritten by state state var
	 */
	greyd.tools.globalStyles = {};

	/**
	 * =================================================================
	 *                          Synced @since 1.14.0
	 * =================================================================
	 */

	/**
	 * Snyc functions
	 */
	greyd.tools.isObject = ( item ) => {
		return item && typeof item === 'object' && !Array.isArray(item);
	}
	greyd.tools.mergeDeep = ( target, source ) => {
		var output = Object.assign( {}, target );
		if ( greyd.tools.isObject(target) && greyd.tools.isObject(source) ) {
			Object.keys(source).forEach( (key) => {
				if ( greyd.tools.isObject(source[key]) ) {
					if ( !(key in target) )
						Object.assign( output, { [key]: source[key] }) ;
					else
						output[key] = greyd.tools.mergeDeep( target[key], source[key] );
				}
				else {
					Object.assign( output, { [key]: source[key] } );
				}
			} );
		}
		return output;
	}
	greyd.tools.flattenObj = ( obj, parent, glue = '_', res = {} ) => {
		for ( var key in obj ){
			var propKey = _.kebabCase(key);
			var propName = parent ? parent+glue+propKey : propKey;
			if ( greyd.tools.isObject(obj[key]) ) {
				greyd.tools.flattenObj( obj[key], propName, glue, res );
			}
			else {
				res[propName] = obj[key];
			}
		}
		return res;
	}


	/**
	 * tests
	 * @unused
	 */
	greyd.tools.getGlobalStylesDev = ( mode ) => {

		// id
		// is: greyd.tools.globalStyles.postId
		var id = wp.data.select('core').__experimentalGetCurrentGlobalStylesId();

		// all base styles - unmerged
		// is: theme.json
		var base = { ...wp.data.select('core').__experimentalGetCurrentThemeBaseGlobalStyles() };

		if ( mode == 'saved') {
			// saved styles - unmerged
			var saved = { ...wp.data.select('core').getGlobalStyles( id ) };

			// saved styles - merged
			// is: greyd.tools.globalStyles.defaults 
			return mergeDeep( base.settings, saved.settings );
		}

		if ( mode == 'unsaved' ) {
			// unsaved styles - unmerged
			var unsaved = { ...wp.data.select('core').getEditedEntityRecord( 'root', 'globalStyles', id ) };
			
			// unsaved styles - merged
			// is like: greyd.tools.globalStyles.vars (used for computing styles)
			// is: greyd.tools.globalStyles.defaults (on load)
			return greyd.tools.mergeDeep( base.settings, unsaved.settings );
		}

		return base.settings;
	}


	/**
	 * Get all current (unsaved) merged global styles
	 * @returns {object} all current settings
	 */
	greyd.tools.getMergedGlobalStyles = () => {

		// id
		var id = wp.data.select('core').__experimentalGetCurrentGlobalStylesId();

		if ( !id ) return false;

		return greyd.tools.mergeDeep(
			// all base styles - unmerged
			{ ...wp.data.select('core').__experimentalGetCurrentThemeBaseGlobalStyles()?.settings },
			// unsaved styles - unmerged
			{ ...wp.data.select('core').getEditedEntityRecord( 'root', 'globalStyles', id )?.settings }
		);
	}

	/**
	 * Get gobal styles value
	 * @param {string|array} key 	with xx.xx.xx syntax
	 * @returns {any}			false or keyed value in global styles settings
	 */
	greyd.tools.getGlobalStylesValue = ( key ) => {

		// get data
		var merged = greyd.tools.getMergedGlobalStyles();

		if ( !merged && greyd.globalStyles && greyd.globalStyles?.defaults ) {
			// get defaults (saved state)
			merged = { ...greyd.globalStyles?.defaults };
		}

		if ( !merged ) {
			// error
			return false;
		}

		var keys = ( typeof key === 'string' ) ? key.split('.') : key;
		var value = { ...merged };
		keys.forEach( (k) => {
			value = value[k];
			if ( typeof value === 'undefined' ) {
				value = false;
			}
		} );

		return value;

	}

	/**
	 * Set gobal styles value
	 * @param {string} key 		with css var syntax
	 * @param {string} value 	
	 * @returns {void}		triggers editEntityRecord
	 */
	greyd.tools.setGlobalStylesValue = ( key, value ) => {

		// get settings
		var id = greyd.tools.globalStyles.postId;
		var settings = { ...wp.data.select('core').getEditedEntityRecord( 'root', 'globalStyles', id )?.settings };
		var merged = greyd.tools.getMergedGlobalStyles();
		var updated = false;

		var fontSizes = [
			'--wp--preset--font-size--tiny',
			'--wp--preset--font-size--small',
			'--wp--preset--font-size--base',
			'--wp--preset--font-size--medium',
			'--wp--preset--font-size--large',
			'--wp--preset--font-size--x-large',
			'--wp--preset--font-size--xx-large',
			'--wp--preset--font-size--xxx-large',
		];
		var fontFamilies = [
			'--wp--preset--font-family--body',
			'--wp--preset--font-family--heading',
			'--wp--preset--font-family--highlight',
		];
		var spacingSizes = [
			'--wp--preset--spacing--tiny',
			'--wp--preset--spacing--small',
			'--wp--preset--spacing--medium',
			'--wp--preset--spacing--large',
			'--wp--preset--spacing--x-large',
		];

		// modify settings
		if ( fontSizes.indexOf( key ) !== -1) {
			if ( !settings.typography ) settings.typography = {};
			if ( !settings.typography.fontSizes ) settings.typography.fontSizes = merged.typography.fontSizes;
			if ( !settings.typography.fontSizes.theme ) settings.typography.fontSizes.theme = merged.typography.fontSizes.theme;
			var found = false;
			var slug = key.replace( '--wp--preset--font-size--', '' );
			settings.typography.fontSizes.theme.forEach( (size, i) => {
				if ( !found && size.slug == slug ) {
					var matches = value.match( /([\d\.]+[^0-9,)\s]+)/g );
					if ( matches.length > 1) {
						var min = matches[0];
						var max = matches[matches.length-1];
						settings.typography.fontSizes.theme[i].fluid = {
							min: min,
							max: max
						};
						settings.typography.fontSizes.theme[i].size = max;
					}
					else {
						settings.typography.fontSizes.theme[i].fluid = false;
						settings.typography.fontSizes.theme[i].size = value;
					}
					found = true;
				}
			} );

			// edit global-styles
			updated = true;
		}
		else if ( fontFamilies.indexOf( key ) !== -1) {
			if ( !settings.typography ) settings.typography = {};
			if ( !settings.typography.fontFamilies ) settings.typography.fontFamilies = merged.typography.fontFamilies;
			if ( !settings.typography.fontFamilies.theme ) settings.typography.fontFamilies.theme = merged.typography.fontFamilies.theme;
			var found = false;
			var slug = key.replace( '--wp--preset--font-family--', '' );
			settings.typography.fontFamilies.theme.forEach( async (family, i) => {
				if ( !found && family.slug == slug ) {
					settings.typography.fontFamilies.theme[i].fontFamily = greyd.tools.font.getName(value);
					greyd.tools.font.updatePreview(value);
					var call = await greyd.tools.font.getFontStyle(value);
					if ( call ) {
						settings.typography.fontFamilies.theme[i].fontFamily = call.fontFamily;
						if ( call.fontFace ) settings.typography.fontFamilies.theme[i].fontFace = call.fontFace;
						else delete settings.typography.fontFamilies.theme[i].fontFace;
						greyd.tools.font.updatePreview(value);
					}
					found = true;
				}
			} );

			// edit global-styles
			updated = true;
		}
		else if ( spacingSizes.indexOf( key ) !== -1) {
			if ( !settings.spacing ) settings.spacing = {};
			if ( !settings.spacing.spacingSizes ) settings.spacing.spacingSizes = merged.spacing.spacingSizes;
			if ( !settings.spacing.spacingSizes.theme ) settings.spacing.spacingSizes.theme = merged.spacing.spacingSizes.theme;
			var found = false;
			var slug = key.replace( '--wp--preset--spacing--', '' );
			settings.spacing.spacingSizes.theme.forEach( (size, i) => {
				if ( !found && size.slug == slug ) {
					settings.spacing.spacingSizes.theme[i].size = value;
					found = true;
				}
			} );

			// edit global-styles
			updated = true;
		}
		else if ( key.indexOf('--wp--custom--') === 0 ) {
			var data = settings;
			var slugs = key.replace('--wp--', '').split('--');
			slugs.forEach( (slug, i) => {
				slug = _.camelCase(slug);
				if ( slug == 'hover' ) {

					// if incorrect object exists with the plain 'hover' key, remove it
					if ( _.has( data, 'hover' ) ) {
						console.log('remove orphaned hover styles object for key', key);
						delete data['hover'];
					}

					slug = ':hover';
				}
				// next or set
				if (i < slugs.length-1) {
					// next
					if ( !data[slug] ) data[slug] = {};
					data = data[slug];
				}
				else {
					// set
					data[slug] = value;
				}
			} );

			// edit global-styles
			updated = true;
		}
		else if ( key.indexOf('--wp--style--global') === 0 ) {
			if ( key == '--wp--style--global--content-size' ) {
				if ( !settings.layout ) settings.layout = {};
				settings.layout.contentSize = value;
			}
			if ( key == '--wp--style--global--wide-size' ) {
				if ( !settings.layout ) settings.layout = {};
				settings.layout.wideSize = value;
			}

			// edit global-styles
			updated = true;
		}

		// update settings
		if ( updated ) {
			// check for edits
			var edits = wp.data.select('core').getEntityRecordEdits( 'root', 'globalStyles', id );
			if ( !edits || _.isEmpty(edits) || greyd.tools.globalStyles.state != 'dirty' ) {
				// dirty settings toggle (will be filtered out when saving)
				settings.dirty = !settings.dirty;
			}
			wp.data.dispatch('core').editEntityRecord( 'root', 'globalStyles', id, {
				// set new settings
				settings: settings
			}, {
				// todo: fix undo
				// https://developer.wordpress.org/block-editor/explanations/architecture/entities/
				// undo level is disabled, because clicking undo will break the editor preview
				undoIgnore: true
			} );
		}

	};


	/**
	 * Get global styles merged data and post id
	 * no more ajax
	 */
	greyd.tools.getGlobalStyles = ( callback ) => {

		// don't call more than once
		if ( greyd.tools.globalStyles.state === 'loading' ) {
			return;
		}
		
		// get data
		var id = wp.data.select('core').__experimentalGetCurrentGlobalStylesId();
		var merged = greyd.tools.getMergedGlobalStyles();

		if ( id && merged ) {
			// set new data
			greyd.tools.setGlobalStyles( {
				...greyd.tools.globalStyles,
				postId: id,
				defaults: merged,
				state: 'loaded',
				vars: {},
				new: {},
			} );
		}

		// callback
		if ( typeof callback === 'function' ) {
			callback();
		}

	}

	/**
	 * Save global styles
	 * no more ajax
	 */
	greyd.tools.saveGlobalStyles = async ( callback, params ) => {

		// don't call more than once
		if ( greyd.tools.globalStyles.state === 'saving' ) {
			return;
		}

		/**
		 * Hook Saving
		 * @since 1.13.0
		 */
		var edits = wp.data.select('core').getEntityRecordEdits( 'root', 'globalStyles', greyd.tools.globalStyles.postId );
		if ( edits && !_.isEmpty(edits) ) {
			console.log("save global styles");
			await wp.data.dispatch('core').saveEditedEntityRecord( 'root', 'globalStyles', greyd.tools.globalStyles.postId );
			// wait for saving and continue
		}
		
		// get new data
		greyd.tools.getGlobalStyles( () => {
			// callback
			if ( typeof callback === 'function' ) {
				callback( params );
			}
		} );

	}


	/**
	 * Init global styles
	 * used when site-editor is not initialised, e.g. from post-editor.
	 */
	greyd.tools.initGlobalStyles = ( callback ) => {
		
		// don't call more than once
		if ( greyd.tools.globalStyles.state === 'loading' ) {
			return;
		}
		
		// start resolving
		wp.data.select('core').__experimentalGetCurrentGlobalStylesId();
		wp.data.select('core').__experimentalGetCurrentThemeBaseGlobalStyles();

		const unsubscribe = wp.data.subscribe( () => {		
			if (
				!wp.data.select('core').hasFinishedResolution( '__experimentalGetCurrentGlobalStylesId' ) ||
				!wp.data.select('core').hasFinishedResolution( '__experimentalGetCurrentThemeBaseGlobalStyles' )
			) {
				// console.log( 'resolving...' );
			} 
			else {
				var id = wp.data.select('core').__experimentalGetCurrentGlobalStylesId();
				var merged = greyd.tools.getMergedGlobalStyles();
				// console.log( 'data received', id, merged );

				// set globalStyles object
				greyd.tools.globalStyles = {
					postId: id,
					defaults: merged,
					state: 'loaded',
					vars: {},
					new: {},
				};

				// done and unsubscribe
				unsubscribe();

				// callback
				if ( typeof callback === 'function' ) {
					callback();
				}
			}
		} );

	}


	/**
	 * =================================================================
	 *                          Utils
	 * =================================================================
	 */

	/**
	 * used by Blocks Plugin.
	 * inits global styles data.
	 */
	greyd.tools.getGlobalStylesData = ( callback ) => {
		greyd.tools.initGlobalStyles( callback );
	}

	/**
	 * used by Blocks Plugin.
	 * @returns all colors from global styles.
	 */
	greyd.tools.getThemeColors = function() {
		return greyd.tools.settings.getColors();
	}
	
	/**
	 * used by Blocks Plugin.
	 * @returns all gradients from global styles.
	 */
	greyd.tools.getThemeGradients = function() {
		return greyd.tools.settings.getGradients();
	}


	/**
	 * Convert an rgb color string to an color object
	 * @param {string} rgb 'rgb(255,255,255)'
	 * @returns {object} { r: int, g: int, b: int }
	 */
	greyd.tools.rgbString2rgba = function( rgb ) {
		var rgba = rgb.split('(');
		rgba = rgba[1].split(')');
		rgba = rgba[0].split(',');

		if ( !rgba || rgba.length < 3 ) return false;

		return {
			r: parseInt( rgba[ 0 ] ),
			g: parseInt( rgba[ 1 ] ),
			b: parseInt( rgba[ 2 ] ),
			a: rgba.length === 3 ? 1 : parseFloat( rgba[ 3 ] )
		};
	};

	greyd.tools.hex2rgba = function( hex ) {
		// Expand shorthand form (e.g. "03F") to full form (e.g. "0033FF")
		hex = hex.replace( /^#?([a-f\d])([a-f\d])([a-f\d])$/i, function( m, r, g, b ) {
			return r + r + g + g + b + b;
		} );
		// decode hex
		var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec( hex );
		return result ? {
			r: parseInt( result[ 1 ], 16 ),
			g: parseInt( result[ 2 ], 16 ),
			b: parseInt( result[ 3 ], 16 ),
			a: 1
		} : false;
	};

	greyd.tools.rgbToHex = function( rgb ) {
		var { r, g, b } = rgb;
		return "#" + ( ( 1 << 24 ) + ( r << 16 ) + ( g << 8 ) + b ).toString( 16 ).slice( 1 );
	};

	/**
	 * globals styles settings wrapper
	 */
	greyd.tools.settings = new function() {

		/**
		 * =================================================================
		 *                          Colors
		 * =================================================================
		 */

		/**
		 * Get all colors from global styles.
		 * @returns {object}
		 * 		@property {array} theme
		 * 		@property {array} standard
		 * 		@property {array} custom	(optional)
		 */
		this.getColors = () => {
			var colors = greyd.tools.getGlobalStylesValue( 'color.palette' );
			var allColors = [
				{ name: "theme", colors: colors.theme },
				{ name: "standard", colors: colors.default }
			];
			if ( colors.custom ) allColors.push( { name: "custom", colors: colors.custom } );
			return allColors;
		};

		/**
		 * Get a color value from global styles.
		 * @param {string} color color slug
		 * @returns {string} color value
		 */
		this.getColorValue = ( color ) => {
			var colors = greyd.tools.getGlobalStylesValue( 'color.palette' );
			var slug = typeof color === "undefined" ? "" : color.replace( "var(--wp--preset--color--", "" ).replace( ")", "" );
			colors.theme.forEach( ( element ) => {
				if ( slug == element.slug ) {
					color = element.color;
				}
			} );
			colors.default.forEach( ( element ) => {
				if ( slug == element.slug ) {
					color = element.color;
				}
			} );
			if ( colors.custom ) colors.custom.forEach( ( element ) => {
				if ( slug == element.slug ) {
					color = element.color;
				}
			} );
			return color;
		};

		/**
		 * Get a color variable from global styles.
		 * @param {string} color color value
		 * @returns {string} color variable
		 */
		this.getColorVariable = ( color ) => {
			var colors = greyd.tools.getGlobalStylesValue( 'color.palette' );
			colors.theme.forEach( ( element ) => {
				if ( color == element.color ) {
					color = "var(--wp--preset--color--" + element.slug + ")";
				}
			} );
			colors.default.forEach( ( element ) => {
				if ( color == element.color ) {
					color = "var(--wp--preset--color--" + element.slug + ")";
				}
			} );
			if ( colors.custom ) colors.custom.forEach( ( element ) => {
				if ( color == element.color ) {
					color = "var(--wp--preset--color--" + element.slug + ")";
				}
			} );
			return color;
		};


		/**
		 * =================================================================
		 *                          Gradients
		 * =================================================================
		 */

		/**
		 * Get all gradients from global styles.
		 * @returns {object}
		 * 		@property {array} theme
		 * 		@property {array} standard
		 * 		@property {array} custom	(optional)
		 */
		this.getGradients = () => {
			var gradients = greyd.tools.getGlobalStylesValue( 'color.gradients' );
			var gradients_theme = JSON.parse( JSON.stringify( gradients.theme ) );
			gradients_theme.forEach( ( element, index ) => {
				// vars to colors
				gradients_theme[ index ].gradient = this.getGradientValue( element.gradient );
			} );
			var allGradients = [
				{ name: "theme", gradients: gradients_theme },
				{ name: "standard", gradients: gradients.default }
			];
			if ( gradients.custom ) allGradients.push( { name: "custom", gradients: gradients.custom } );
			return allGradients;
		};

		/**
		 * Get a gradient value from global styles.
		 * @param {string} gradient gradient slug
		 * @returns {string} gradient value
		 */
		this.getGradientValue = ( gradient ) => {
			var colors = greyd.tools.getGlobalStylesValue( 'color.palette' );
			colors.theme.forEach( ( element ) => {
				var color = "var(--wp--preset--color--" + element.slug + ")";
				gradient = gradient.split( color ).join( element.color );
			} );
			colors.default.forEach( ( element ) => {
				var color = "var(--wp--preset--color--" + element.slug + ")";
				gradient = gradient.split( color ).join( element.color );
			} );
			return gradient;
		};

		/**
		 * Get a gradient variable from global styles.
		 * @param {string} gradient gradient value
		 * @returns {string} gradient variable
		 */
		this.getGradientVariable = ( gradient ) => {
			var colors = greyd.tools.getGlobalStylesValue( 'color.palette' );
			colors.theme.forEach( ( element ) => {
				var color = "var(--wp--preset--color--" + element.slug + ")";
				gradient = gradient.split( element.color ).join( color );
			} );
			colors.default.forEach( ( element ) => {
				var color = "var(--wp--preset--color--" + element.slug + ")";
				gradient = gradient.split( element.color ).join( color );
			} );

			return gradient;
		};


		/**
		 * =================================================================
		 *                          Fontfamilies
		 * =================================================================
		 */

		/**
		 * Get all font families.
		 * @returns {object[]} with @properties title, slug
		 */
		this.getFontFamilies = ( custom=false ) => {
			var values = greyd.tools.getGlobalStylesValue( 'typography.fontFamilies' );
			var families = [];
			if ( values ) {
				values.theme.forEach( ( family ) => {
					families.push( {
						title: family.name,
						slug: "--wp--preset--font-family--" + family.slug,
						family: family.fontFamily,
						faces: family.fontFace ?? []
					} );
				} );
				if ( custom && values.custom ) {
					values.custom.forEach( ( family ) => {
						families.push( {
							title: family.name,
							slug: "--wp--preset--font-family--" + family.slug,
							family: family.fontFamily,
							faces: family.fontFace ?? []
						} );
					} );
				}
			}
			return families;
		};

		/**
		 * Get all font family options.
		 * @returns {object[]} with @properties label, value
		 */
		this.getFontFamilyOptions = () => {
			var families = [];
			this.getFontFamilies(true).forEach( ( family ) => {
				families.push( {
					label: family.title + " (" + greyd.tools.globalStyles.vars[ 'font-family' ][ family.slug ] + ")",
					value: "var(" + family.slug + ")"
				} );
			} );
			return families;
		};


		/**
		 * =================================================================
		 *                          Fontsizes
		 * =================================================================
		 */

		/**
		 * Get all font sizes.
		 * @returns {object[]} with @properties title, slug
		 */
		this.getFontSizes = () => {
			var values = greyd.tools.getGlobalStylesValue( 'typography.fontSizes' );
			var sizes = [];
			if ( values ) {
				values.theme.forEach( ( size ) => {
					sizes.unshift( {
						title: size.name,
						slug: "--wp--preset--font-size--" + size.slug
					} );
				} );
			}
			return sizes;
		};

		/**
		 * Get all font size options.
		 * @returns {object[]} with @properties name, slug, size
		 */
		this.getFontSizeOptions = () => {
			var sizes = [];
			this.getFontSizes().forEach( ( size ) => {
				sizes.unshift( {
					name: size.title,
					slug: size.slug.replace( "--wp--preset--font-size--", "" ),
					size: greyd.tools.globalStyles.vars[ 'font-size' ][ size.slug ]
				} );
			} );
			return sizes;
		};

		/**
		 * Get font size value.
		 * @param {string} value Option variable.
		 * @returns {string} font size value.
		 */
		this.getFontSize = ( value ) => {
			if ( typeof value !== 'string' ) return value;
			var slug = value.replace( "var(--wp--preset--font-size--", "" ).replace( ")", "" );
			var sizes = this.getFontSizeOptions();
			for ( var i = 0; i < sizes.length; i++ ) {
				if ( sizes[ i ].slug == slug ) {
					return sizes[ i ].size;
				}
			}
			return value;
		};


		/**
		 * =================================================================
		 *                          Spacing
		 * =================================================================
		 */

		/**
		 * Get all spacing sizes.
		 * @returns {object[]} with @properties title, slug
		 */
		this.getSpacingSizes = () => {
			var values = greyd.tools.getGlobalStylesValue( 'spacing.spacingSizes' );
			var sizes = [];
			if ( values ) {
				values.theme.forEach( ( size ) => {
					sizes.unshift( {
						title: size.name,
						slug: "--wp--preset--spacing--" + size.slug
					} );
				} );
			}
			return sizes;
		};

		/**
		 * Get all spacing size options.
		 * @returns {object[]} with @properties name, slug, size
		 */
		this.getSpacingSizeOptions = () => {
			var sizes = [];
			this.getSpacingSizes().forEach( ( size ) => {
				sizes.unshift( {
					name: size.title,
					slug: size.slug.replace( "--wp--preset--spacing--", "" ),
					size: greyd.tools.globalStyles.vars[ 'spacing' ][ size.slug ]
				} );
			} );
			return sizes;
		};

		/**
		 * Get spacing size value.
		 * @param {string} value Option variable.
		 * @returns {string} spacing size value.
		 */
		this.getSpacingSize = ( value ) => {
			if ( typeof value !== 'string' ) return value;
			var slug = value.replace( "var(--wp--preset--spacing--", "" ).replace( ")", "" );
			var sizes = this.getSpacingSizeOptions();
			for ( var i = 0; i < sizes.length; i++ ) {
				if ( sizes[ i ].slug == slug ) {
					return sizes[ i ].size;
				}
			}
			return value;
		};

	}


} )( window.wp );
