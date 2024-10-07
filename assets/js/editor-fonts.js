/**
 * Backend Block Editor Utils & Tools.
 * 
 * This file is loaded in the editor only.
 */
var greyd = greyd || { tools: {}, components: {} };

( function ( wp ) {

	var el = wp.element.createElement;
	var { __, _x, sprintf } = wp.i18n;
	var _ = lodash;

	if ( typeof greyd.tools === 'undefined' ) {
		greyd.tools = {};
	}

	greyd.tools.font = new function() {
		
		this.updatePreview = function( font ) {
			if ( this.isGoogle(font) ) {
				this.previewGoogle(font);
			}
			else if ( this.isCustom(font) ) {
				this.previewCustom(font);
			}
		}
		this.previewGoogle = function( font ) {

			font = font.split(' ').join('+');
			var name = this.getName(font);
			var id = 'google-font-preview-'+name+'-css';
			var href = 'https://fonts.googleapis.com/css2?family='+font+'&display=swap';

			if ( !document.getElementById( id ) ) {
				var stylesheet = document.createElement( 'link' );
				stylesheet.rel = 'stylesheet';
				stylesheet.id = id;
				stylesheet.href = href;
				document.getElementsByTagName( 'head' )[0].appendChild( stylesheet );
			}
			else {
				document.getElementById( id ).href = href;
			}
			// remove font-face from wp-font css
			var wpFonts = document.getElementById( 'wp-fonts-local' );
			if ( wpFonts ) for ( var i=wpFonts.sheet.rules.length-1; i>=0; i--) {
				if ( wpFonts.sheet.rules[i].cssText.indexOf( 'font-family: '+name) > -1 ) {
					wpFonts.sheet.removeRule(i);
				}
			};

			var iframe = document.getElementsByClassName( "edit-site-visual-editor__editor-canvas" );
			if ( iframe && iframe[0] ) {
					
				if ( !iframe[0].contentWindow.document.getElementById( id ) ) {
					var stylesheet = document.createElement( 'link' );
					stylesheet.rel = 'stylesheet';
					stylesheet.id = id;
					stylesheet.href = href;
					iframe[0].contentWindow.document.getElementsByTagName( 'head' )[0].appendChild( stylesheet );
				}
				else {
					iframe[0].contentWindow.document.getElementById( id ).href = href;
				}
				// remove font-face from wp-font css
				var wpFonts = iframe[0].contentWindow.document.getElementById( 'wp-fonts-local' );
				if ( wpFonts ) for ( var i=wpFonts.sheet.rules.length-1; i>=0; i--) {
					if ( wpFonts.sheet.rules[i].cssText.indexOf( 'font-family: '+name) > -1 ) {
						wpFonts.sheet.removeRule(i);
					}
				};

			}

		}
		this.previewCustom = function( font ) {

			var css = "";
			var name = font;
			var family = font;
			if ( family.indexOf(' ') > -1 && family.indexOf('"') == -1 && family.indexOf("'") == -1 ) {
				family = "\""+family+"\"";
			}
			if ( greyd_fonts.fonts_local ) Object.keys(greyd_fonts.fonts_local).forEach( (key) => {
				if ( greyd_fonts.fonts_local[key][0].fontFamily == font ) {
					name = key;
					greyd_fonts.fonts_local[key].forEach( (local) => {
						css += "@font-face{ "+
							"font-family: "+family+"; "+
							"font-weight: "+local.fontWeight+"; "+
							"font-style: "+local.fontStyle+"; "+
							"src: url('"+local.src+"'); "+
							"font-display: swap; "+
						"} ";
					} );
				}
			} );
			if ( css == "" ) return;

			var id = 'custom-font-preview-'+name+'-css';

			if ( !document.getElementById( id ) ) {
				var stylesheet = document.createElement( 'style' );
				stylesheet.id = id;
				stylesheet.innerText = css;
				document.getElementsByTagName( 'head' )[0].appendChild( stylesheet );
			}
			else {
				document.getElementById( id ).innerText = css;
			}
			// remove font-face from wp-font css
			var wpFonts = document.getElementById( 'wp-fonts-local' );
			if ( wpFonts ) for ( var i=wpFonts.sheet.rules.length-1; i>=0; i--) {
				if ( wpFonts.sheet.rules[i].cssText.indexOf( 'font-family: '+family) > -1 ) {
					wpFonts.sheet.removeRule(i);
				}
			};

			var iframe = document.getElementsByClassName( "edit-site-visual-editor__editor-canvas" );
			if ( iframe && iframe[0] ) {
					
				if ( !iframe[0].contentWindow.document.getElementById( id ) ) {
					var stylesheet = document.createElement( 'style' );
					stylesheet.id = id;
					stylesheet.innerText = css;
					iframe[0].contentWindow.document.getElementsByTagName( 'head' )[0].appendChild( stylesheet );
				}
				else {
					iframe[0].contentWindow.document.getElementById( id ).innerText = css;
				}
				// remove font-face from wp-font css
				var wpFonts = iframe[0].contentWindow.document.getElementById( 'wp-fonts-local' );
				if ( wpFonts ) for ( var i=wpFonts.sheet.rules.length-1; i>=0; i--) {
					if ( wpFonts.sheet.rules[i].cssText.indexOf( 'font-family: '+family) > -1 ) {
						wpFonts.sheet.removeRule(i);
					}
				};

			}
	
		}

		this.isGoogle = function( font ) {
			if ( font == "" ) return false;
			var fontName = this.getName(font);
			return greyd_fonts.google_fonts_list.indexOf(fontName) > -1;
		}
		this.getGoogleFonts = function() {
			return greyd_fonts.google_fonts_list;
		}
		this.getGoogleFont = function( font ) {
			return greyd_fonts.google_fonts.find( (obj) => {
				return obj.family === font;
			} );
		}
		this.getGoogleFontLocal = function( fontName ) {
			var font = false;
			if ( greyd_fonts.google_fonts_local ) {
				Object.keys(greyd_fonts.google_fonts_local).forEach( (key) => {
					if ( greyd_fonts.google_fonts_local[key][0]['fontFamily'] == fontName ) {
						font = greyd_fonts.google_fonts_local[key];
					}
				} );
			}
			return font;
		}

		this.isCustom = function( font ) {
			if ( font == "" ) return false;
			var found = false;
			if ( greyd_fonts.fonts_local ) {
				Object.keys(greyd_fonts.fonts_local).forEach( (key) => {
					if ( greyd_fonts.fonts_local[key][0].fontFamily == font ) {
						found = true;
					}
				} );
			}
			return found;
		}
		this.getCustomFonts = function() {
			var fonts = [];
			if ( greyd_fonts.fonts_local ) {
				Object.keys(greyd_fonts.fonts_local).forEach( (key) => {
					fonts.push( greyd_fonts.fonts_local[key][0].fontFamily );
				} );
			}
			return fonts;
		}
		this.getCustomFont = function( font ) {
			if ( font == "" ) return false;
			var found = false;
			if ( greyd_fonts.fonts_local ) {
				Object.keys(greyd_fonts.fonts_local).forEach( (key) => {
					if ( greyd_fonts.fonts_local[key][0].fontFamily == font ) {
						found = greyd_fonts.fonts_local[key];
					}
				} );
			}
			return found;
		}

		this.getName = function( value ) {
			var name = ""+value+"";
			if ( !_.isEmpty(value) && value.indexOf(':') > -1 ) {
				name = value.split(':')[0];
			}
			return name;
		}

		this.getWeights = function( value ) {
			var weights = [ '400' ];
			if ( !_.isEmpty(value) && value.indexOf(':') > -1 ) {
				var [ name, params ] = value.split(':');
				params = params.split('@');
				if ( params[0] == 'wght' ) {
					weights = params[1].split(';');
				}
				if ( params[0] == 'ital,wght' ) {
					weights = [];
					params = params[1].split(';');
					params.forEach( (param) => {
						param = param.split(',');
						if ( param[0] == '0' ) weights.push(param[1]);
						if ( param[0] == '1' ) weights.push(param[1]+'i');
					} );
				}
			}
	
			return weights;
		}
		this.setWeights = function( weights ) {
			var normal = weights.filter( (val) => val.indexOf('i') == -1 ).sort();
			var italic = weights.filter( (val) => val.indexOf('i') > -1 ).sort().map( (val) => val.replace('i', '') );
	
			var value = ""; // fontName;
			if ( normal.length > 0 && italic.length == 0 ) {
				value += ':wght@'+normal.join(';');
			}
			else {
				var weights = [];
				if ( normal.length > 0 ) {
					weights.push( '0,'+normal.join(';0,') );
				}
				if ( italic.length > 0 ) {
					weights.push( '1,'+italic.join(';1,') );
				}
				value += ':ital,wght@'+weights.join(';');
			}

			return value;
		}

		this.download = function( fontName, weights, callback ) {
			var family = fontName+this.setWeights( weights );

			// make post data
			var data = new FormData();
			data.append( 'action', 'greyd_global_styles_font_ajax' );
			data.append( '_ajax_nonce', global_styles_admin.nonce );
			data.append( 'mode', 'download_google_font' );
			data.append( 'data', encodeURIComponent( JSON.stringify( { 'family': family } ) ) );
			
			// call ajax
			this.call( data, (data) => {
				if ( data ) {
					// update local fonts data
					Object.keys(data).forEach( (key) => {
						if ( !greyd_fonts.google_fonts_local ) greyd_fonts.google_fonts_local = {};
						greyd_fonts.google_fonts_local[key] = data[key];
					} );
				}
				if ( typeof callback === 'function' ) {
					callback( data );
				}
			} );

		}
		this.upload = function( font, callback ) {

			// make post data
			var data = new FormData();
			data.append( 'action', 'greyd_global_styles_font_ajax' );
			data.append( '_ajax_nonce', global_styles_admin.nonce );
			data.append( 'mode', 'upload_font' );
			// add font files and weights as indexes
			var fontData = { name: font.name, faces: [] };
			font.faces.forEach( (face) => {
				fontData.faces.push(face.weight);
				data.append(face.weight, face.file[0]);
			} );
			data.append( 'data', encodeURIComponent( JSON.stringify( { 'font': fontData } ) ) );
			
			// call ajax
			this.call( data, (data) => {
				if ( data ) {
					// update local fonts data
					Object.keys(data).forEach( (key) => {
						if ( !greyd_fonts.fonts_local ) greyd_fonts.fonts_local = {};
						greyd_fonts.fonts_local[key] = data[key];
					} );
				}
				if ( typeof callback === 'function' ) {
					callback( data );
				}
			} );

		}
		this.delete = function( fontName, callback ) {

			// make post data
			var data = new FormData();
			data.append( 'action', 'greyd_global_styles_font_ajax' );
			data.append( '_ajax_nonce', global_styles_admin.nonce );
			data.append( 'mode', 'delete_font' );
			data.append( 'data', encodeURIComponent( JSON.stringify( { 'family': fontName } ) ) );
			
			// call ajax
			this.call( data, (data) => {
				if ( data ) {
					// update local fonts data
					if ( greyd.tools.font.isGoogle(fontName) ) {
						delete greyd_fonts.google_fonts_local[data[0]];
					}
					else if ( greyd.tools.font.isCustom(fontName) ) {
						delete greyd_fonts.fonts_local[data[0]];
					}
				}
				if ( typeof callback === 'function' ) {
					callback( data );
				}
			} );

		}
		this.call = function( data, callback ) {
			fetch( global_styles_admin.ajax_url, { 
				method: 'POST',
				body: data,
			} )
			.then( (response) => {
				// error handling
				if ( !response.ok ) {
					if ( typeof callback === 'function' ) {
						callback( false );
					}
					return Promise.reject( response.statusText );
				}
				// get text response
				return response.text();
			} )
			.then( (text) => {
				var data = false;
				// handle success
				if (text.indexOf('success::') > -1) {
					// valid success
					text = text.split('::', 3)[1];
					// console.info(JSON.parse(text));
					data = JSON.parse(text);
				}
				// handle error
				else if (text.indexOf('error::') > -1) {
					// valid error
					text = text.split('error::', 2)[1];
					console.warn(text);
				}
				if ( typeof callback === 'function' ) {
					callback( data );
				}
			} );
		}

		/**
		 * Convert/Deprecate google and custom Fonts.
		 * @since 1.13.0
		 */
		this.convert = function(callback) {

			// check for unsaved edits
			var edits = wp.data.select('core').__experimentalGetDirtyEntityRecords();
			if ( edits && !_.isEmpty(edits) ) {
				alert(
					__( 'You have unsaved changes inside the Site Editor.', 'greyd-wp' )+
					'\n'+
					__( 'Please save them first.', 'greyd-wp' )
				);
				if ( typeof callback === 'function' ) {
					callback( false );
				}
				return;
			}

			// setup
			var convertGoogle = true;
			var convertCustom = true;
			var setup = {
				delete_old: true,
				create: [],
				convert: [],
			};
			
			// make ajax data
			if ( convertGoogle ) {
				setup.google = greyd_fonts.google_fonts_local;
			}
			if ( convertCustom ) {
				setup.custom = greyd_fonts.fonts_local;
			}
			var isSelected = ( type, value ) => {
				if ( setup[type] ) {
					var found = false;
					Object.keys( setup[type] ).forEach( (fontslug) => {
						if ( setup[type][fontslug][0].fontFamily == value ) {
							found = true;
						}
					} );
					return found;
				}
				return false;
			};

			// get selected fonts (body/heading/highlight)
			greyd.tools.globalStyles.defaults.typography.fontFamilies.theme.forEach( ( family ) => {
				if ( family.fontFamily == "" ) return;
				// get value
				var slug = '--wp--preset--font-family--'+family.slug;
				var value = greyd.tools.globalStyles.vars[ 'font-family' ][ slug ];
				if ( convertGoogle && greyd.tools.font.isGoogle(value) ) {
					if ( !isSelected('google', value) ) {
						setup.create.push( { slug: family.slug, type: 'google', value: family } );
					}
					setup.convert.push( { slug: family.slug, type: 'google', value: family.fontFamily } );
				}
				else if ( convertCustom && greyd.tools.font.isCustom(value) && isSelected('custom', value) ) {
					setup.convert.push( { slug: family.slug, type: 'custom', value: value } );
				}
			} );
			console.log( { ...setup } );

			// make post data
			var data = new FormData();
			data.append( 'action', 'greyd_global_styles_font_ajax' );
			data.append( '_ajax_nonce', global_styles_admin.nonce );
			data.append( 'mode', 'convert_fonts' );
			data.append( 'data', encodeURIComponent( JSON.stringify( setup ) ) );
			
			// call ajax
			greyd.tools.font.call( data, (data) => {
				if ( data && setup.delete_old ) {
					// update local fonts data
					if ( data.google ) {
						data.google.forEach( (fontslug) => {
							delete greyd_fonts.google_fonts_local[fontslug];
						} );
					}
					if ( data.custom ) {
						data.custom.forEach( (fontslug) => {
							delete greyd_fonts.fonts_local[fontslug];
						} );
					}
				}
				if ( typeof callback === 'function' ) {
					callback( data );
				}
			} );

		}

		/**
		 * Get Font Style.
		 * Formerly called when saving greyd global styles, now called from Editor.
		 * @since 2.1.0
		 */
		this.getFontStyle = async function( fontName ) {

			// make post data
			var data = new FormData();
			data.append( 'action', 'greyd_global_styles_font_ajax' );
			data.append( '_ajax_nonce', global_styles_admin.nonce );
			data.append( 'mode', 'get_font_style' );
			data.append( 'data', encodeURIComponent( JSON.stringify( { 'family': fontName } ) ) );
			
			// call ajax
			return fetch( global_styles_admin.ajax_url, { 
				method: 'POST',
				body: data,
			} )
			.then( (response) => {
				// error handling
				if ( !response.ok ) {
					console.warn(response.statusText);
					return false;
				}
				// get text response
				return response.text();
			} )
			.then( (text) => {
				var data = false;
				// handle success
				if (text.indexOf('success::') > -1) {
					// valid success
					text = text.split('::', 3)[1];
					// console.info(JSON.parse(text));
					data = JSON.parse(text);
				}
				// handle error
				else if (text.indexOf('error::') > -1) {
					// valid error
					text = text.split('error::', 2)[1];
					console.warn(text);
					return false;
				}
				return data;
			} );

		}

	}

	/**
	 * Font Components (used for deprecation)
	 */

	if ( typeof greyd.components === 'undefined' ) {
		greyd.components = {};
	}

	greyd.components.ConvertFontControl = class extends wp.element.Component {
		constructor () {
			super();
			// state
			this.state = { converting: false };
		}
		componentWillMount() {
			this.initState( this.props );
		}
		componentWillReceiveProps( props ) {
			this.initState( props );
		}

		// state
		initState( props ) {
			this.setState( {
				...this.state,
				hasGoogleFonts: this.hasGoogleFonts(),
				hasLocalGoogleFonts: this.hasLocalGoogleFonts(),
				hasLocalCustomFonts: this.hasLocalCustomFonts()
			} );
		}
		hasGoogleFonts() {
			return greyd.tools.globalStyles.defaults.typography.fontFamilies.theme.filter( ( family ) => {
				// get value
				var slug = '--wp--preset--font-family--'+family.slug;
				var value = greyd.tools.globalStyles.vars?.[ 'font-family' ]?.[ slug ];
				if ( _.has(greyd.tools.globalStyles.new, slug) ) {
					value = greyd.tools.globalStyles.new[slug];
				}
				return greyd.tools.font.isGoogle(value);
			} ).length > 0;
		}
		hasLocalGoogleFonts() {
			return greyd_fonts.google_fonts_local && Object.keys(greyd_fonts.google_fonts_local).length > 0;
		}
		hasLocalCustomFonts() {
			return greyd_fonts.fonts_local && Object.keys(greyd_fonts.fonts_local).length > 0;
		}

		// strings
		makeTip() {
			var tip = [];
			if ( this.state.hasGoogleFonts && this.state.hasLocalGoogleFonts && this.state.hasLocalCustomFonts ) {
				tip.push( el( "p", {}, __( 'We detected local fonts and selected Google Fonts.', 'greyd-wp' ) ) );
			}
			else if ( this.state.hasLocalGoogleFonts && this.state.hasLocalCustomFonts ) {
				tip.push( el( "p", {}, __( 'We detected local Google Fonts and custom fonts.', 'greyd-wp' ) ) );
			}
			else if ( this.state.hasLocalGoogleFonts ) {
				tip.push( el( "p", {}, __( 'We detected local Google Fonts.', 'greyd-wp' ) ) );
			}
			else if ( this.state.hasLocalCustomFonts ) {
				tip.push( el( "p", {}, __( 'We detected local custom fonts.', 'greyd-wp' ) ) );
			}
			else if ( this.state.hasGoogleFonts ) {
				tip.push( el( "p", {}, __( 'We detected selected Google Fonts.', 'greyd-wp' ) ) );
			}
			tip.push( el( 'br' ) );
			tip.push( el( "i", {}, __( 'This feature is deprecated, please convert the fonts and use Global Styles Typography settings instead.', 'greyd-wp' ) ) );

			return [
				el( "p", {}, tip ),
				el( "br" )
			]
		}
		makeEditsTip() {
			var tip = [];
			if ( this.hasEdits() ) {
				tip = [
					el( "p", {}, [
						el( "b", {}, __( 'You have unsaved changes inside the Site Editor, please save them first.', 'greyd-wp' ) ),
						el( "br" ),
						el( "a", { 
							style: { cursor: 'pointer' },
							onClick: () => this.openSaveView()
						}, __( 'Save Global Styles →', 'greyd-wp' ) )
					] ),
					el( "br" )
				];
			}

			return tip;
		}
		makeButtonLabel() {
			var btn = __( 'Convert local fonts', 'greyd-wp' );
			if ( this.state.hasGoogleFonts && this.state.hasLocalGoogleFonts && this.state.hasLocalCustomFonts ) {
				btn = __( 'Convert fonts', 'greyd-wp' );
			}
			else if ( this.state.hasGoogleFonts ) {
				btn = __( 'Convert selected fonts', 'greyd-wp' );
			}

			return btn;
		}

		// unsaved edits
		hasEdits() {
			var edits = wp.data.select('core').__experimentalGetDirtyEntityRecords();
			return ( edits && !_.isEmpty(edits) );
		}
		openSaveView() {
			wp.data.dispatch('core/edit-site').setIsSaveViewOpened( true );
		}

		render() {

			if ( !greyd.tools.isPluginActive( 'gutenberg/gutenberg' ) ) {
				return;
			}

			if ( !this.state.hasGoogleFonts && !this.state.hasLocalGoogleFonts && !this.state.hasLocalCustomFonts ) {
				return;
			}

			return el( wp.components.PanelBody, {
				title: __( 'Convert', 'greyd-wp' ),
				initialOpen: true
			}, [
				el( wp.components.Tip, {}, [
					this.makeTip(),
					this.makeEditsTip(),
					el( wp.components.Button, {
						variant: 'primary',
						'aria-disabled': this.hasEdits(),
						onClick: () => {
							if ( this.hasEdits() ) return;
							if ( this.state.converting ) return;
							// convert
							this.setState( { ...this.state, converting: true } );
							greyd.tools.font.convert( (data) => {
								this.setState( { ...this.state, converting: false } );
								if ( data ) {
									console.log("reload!");
									location.reload();
									/**
									 * todo: just reload data
									 * reloading greyd styles works, but global-styles don't
									 */
								}
							} );

						}
					}, [
						this.state.converting ?
						el( wp.components.Spinner ) : 
						el( "div", {}, this.makeButtonLabel() ),
					] )
				] )
			] );

		}
	};

	greyd.components.DeprecatedFontControl = class extends wp.element.Component {
		constructor () {
			super();
		}

		makeNotice() {
			return [
				el( "p", {}, [
					this.props.type == 'google' ?
						__( 'Greyd Google Fonts are deprecated.', 'greyd-wp' ) :
						__( 'Greyd custom fonts are deprecated.', 'greyd-wp' ),
					el( 'br' ),
					__( 'Please use Global Styles Typography settings instead.', 'greyd-wp' )
				] ),
				el( "a", { 
					style: { cursor: 'pointer' },
					onClick: () => this.openGlobalStyles()
				}, __( 'Go to Global Styles →', 'greyd-wp' ) )
			];
		}

		openGlobalStyles() {
			wp.data.dispatch('core/edit-site').openGeneralSidebar('edit-site/global-styles');
		}

		render() {

			return el( wp.components.BaseControl, {}, [
				el( wp.components.Notice, { 
					status: 'warning',
					isDismissible: false
				}, this.makeNotice() ),
			] );

		}
	};

	greyd.components.GoogleFontControl = class extends wp.element.Component {
		constructor () {
			super();
			// state
			this.state = { saving: false };
		}

		getFontState() {

			var state = 'none';
			var fontName = greyd.tools.font.getName(this.props.value);
			var weights = greyd.tools.font.getWeights(this.props.value);

			if ( greyd.tools.font.isGoogle(fontName) ) {
				state = 'default';
				var font = greyd.tools.font.getGoogleFontLocal(fontName);
				if ( font ) {
					state = 'hosted';
					var localWeights = [];
					font.forEach( (face) => {
						var weight = face['fontWeight'];
						if ( face['fontStyle'] != 'normal' ) weight += 'i';
						localWeights.push(weight);
					} );
					weights.forEach( (weight) => {
						if ( localWeights.indexOf(weight) == -1 ) state = 'warning';
					} );
				}
			}

			return state;
		}

		downloadFont( fontName, weights ) {

			greyd.tools.font.download( fontName, weights, (data) => {
				if (data) {
					this.props.onChange(this.props.value);
					setTimeout(() => {
						greyd.tools.saveGlobalStyles();
					}, 0);
				}
				this.setState( { ...this.state, saving: false } );
			} );
			this.setState( { ...this.state, saving: true } );

		}

		deleteFont( fontName ) {
			
			greyd.tools.font.delete( fontName, (data) => {
				if (data) {
					this.props.onChange(this.props.value);
					setTimeout(() => {
						greyd.tools.saveGlobalStyles();
					}, 0);
				}
				else if ( typeof greyd.tools.showSnackbar === 'function' ) {
					greyd.tools.showSnackbar( __( "Error deleting font. Please see console for details.", 'greyd-wp' ), 'error' );
				}
				this.setState( { ...this.state, saving: false } );
			} );
			this.setState( { ...this.state, saving: true } );

		}
		
		render() {
			
			var fontName = greyd.tools.font.getName(this.props.value);
			var weights = greyd.tools.font.getWeights(this.props.value);

			return el( wp.components.BaseControl, {
				label: this.props.label?? null,
				className: "greyd-customfont-control"
			}, [

				this.getFontState() == 'default' && el( 'div', { className: 'greyd-font-options' }, [
					// default
					el( 'div', { className: 'greyd-font-status' }, "↗ font hosted on google" ),
					el( wp.components.Button, {
						variant: 'secondary',
						onClick: () => {
							if ( this.state.saving ) return;
							this.downloadFont( fontName, weights );
						}
					}, [
						this.state.saving ? 
						el( wp.components.Spinner ) : 
						el( 'span', {}, __( "Host font locally ↓", 'greyd-wp' ) )
					] ),
				] ),

				this.getFontState() == 'hosted' && el( 'div', { className: 'greyd-font-options' }, [
					// hosted
					el( 'div', { className: 'greyd-font-status ok' }, "✓ Font hosted locally" ),
					// remove
					el( wp.components.Button, {
						isDestructive: true,
						onClick: () => {
							if ( this.state.saving ) return;
							this.deleteFont( fontName );
						}
					}, [
						this.state.saving ? 
						el( wp.components.Spinner ) : 
						el( 'span', {}, __( "Delete local font ✕", 'greyd-wp' ) )
					] ),
				] ),

				this.getFontState() == 'warning' && el( 'div', { className: 'greyd-font-options' }, [
					// warning
					el( 'div', { className: 'greyd-font-status warning' }, "✕ font partially loaded" ),
					// update
					el( wp.components.Button, {
						variant: 'secondary',
						onClick: () => {
							if ( this.state.saving ) return;
							this.downloadFont( fontName, weights );
						}
					}, [
						this.state.saving ? 
						el( wp.components.Spinner ) : 
						el( 'span', {}, __( "Update local font ⟲", 'greyd-wp' ) )
					] ),
					// remove
					el( wp.components.Button, {
						isDestructive: true,
						onClick: () => {
							if ( this.state.saving ) return;
							this.deleteFont( fontName );
						}
					}, [
						this.state.saving ? 
						el( wp.components.Spinner ) : 
						el( 'span', {}, __( "Delete local font ✕", 'greyd-wp' ) )
					] ),
				] )

			] );

		}

	};

	greyd.components.CustomFontControl = class extends wp.element.Component {
		constructor () {
			super();
			// state
			this.state = { upload: false };
		}

		getOptions() {
			return [
				{ value: '100',  label: 'Thin 100' },
				{ value: '100i', label: 'Thin 100 Italic' },
				{ value: '200',  label: 'Extra Light 200' },
				{ value: '200i', label: 'Extra Light 200 Italic' },
				{ value: '300',  label: 'Light 300' },
				{ value: '300i', label: 'Light 300 Italic' },
				{ value: '400',  label: 'Regular 400' },
				{ value: '400i', label: 'Regular 400 Italic' },
				{ value: '500',  label: 'Medium 500' },
				{ value: '500i', label: 'Medium 500 Italic' },
				{ value: '600',  label: 'Semi Bold 600' },
				{ value: '600i', label: 'Semi Bold 600 Italic' },
				{ value: '700',  label: 'Bold 700' },
				{ value: '700i', label: 'Bold 700 Italic' },
				{ value: '800',  label: 'Extra Bold 800' },
				{ value: '800i', label: 'Extra Bold 800 Italic' },
				{ value: '900',  label: 'Black 900' },
				{ value: '900i', label: 'Black 900 Italic' },
			];
		}
		getWeightOptions() {
			var options = this.getOptions();
			this.state.font.faces.forEach( (face, index) => {
				var weight = face.weight?? '400';
				options = options.map( (option) => {
					if ( option.value == weight )
						option.disabled = true;
					return option;
				} );
			} );
			return options;
		}

		getNextWeight() {
			var weight = '400';

			var weights = [];
			this.state.font.faces.forEach( (face, index) => {
				weights.push(face.weight);
			} );

			var i = 0;
			while ( weights.indexOf(weight) != -1 && i < 17 ) {
				weight = parseInt(weight)+100;
				if ( weight > 900 ) weight = 100;
				weight = ''+weight+'';
				if ( i > 7 ) weight += 'i';
				i++;
			}

			return weight;
		}

		renderFontfaces() {
			var controls = [];

			this.state.font.faces.forEach( (face, index) => {
				controls.push(
					el( 'div', {
						className: 'components-greyd-controlgroup__item',
						style: { paddingBottom: '12px' }
					}, [
						// remove
						el( wp.components.Button, { 
							className: "components-greyd-controlgroup__remove",
							onClick: (event) => {
								var faces = this.state.font.faces;
								faces.splice(index, 1);
								this.setState( { ...this.state, font: { ...this.state.font, faces: faces } } );
							},
							title: __( 'Remove font-face', 'greyd-wp' )
						}, el( wp.components.Icon, { icon: 'no-alt' } ) ),
						// font-face
						el( greyd.components.OptionsControl, {
							style: { width: '100%' },
							value: face.weight?? '400',
							onChange: (value) => {
								var faces = this.state.font.faces;
								faces[index].weight = value;
								this.setState( { ...this.state, font: { ...this.state.font, faces: faces } } );
							},
							options: this.getWeightOptions(),
						} ),
						// file
						el( 'pre', {}, face.file && face.file[0]?.name ? face.file[0].name : __( 'No file selected', 'greyd-wp' ) ),
						face.file ? [
							// remove file
							el( wp.components.Button, {
								isDestructive: true,
								onClick: () => {
									var faces = this.state.font.faces;
									delete faces[index].file;
									this.setState( { ...this.state, font: { ...this.state.font, faces: faces } } );
								}
							}, [
								el( 'span', {}, __( "Remove font file", 'greyd-wp' ) )
							] ),
						] : [
							// select file
							el( wp.components.FormFileUpload, { 
								variant: 'secondary',
								accept: ".eot,.ttf,.woff,.woff2",
								onChange: (event) => {
									var faces = this.state.font.faces;
									faces[index].file = event.target.files;
									this.setState( { ...this.state, font: { ...this.state.font, faces: faces } } );
								},
							}, __( 'Select font file', 'greyd-wp' ) ),
						]
					] )
				);
			// }
			} );

			return controls
		}

		renderFontInfo() {
			var elements = [];
			var font = greyd.tools.font.getCustomFont(this.props.value);
			var options = this.getOptions();
			font.forEach( (fontface) => {
				var weight = fontface['fontWeight'];
				if ( fontface['fontStyle'] == 'italic' ) weight += 'i';
				options.forEach( (option) => {
					if ( option.value == weight ) {
						weight = option.label;
					}
				} );
				elements.push( 
					el( 'pre', {}, weight ),
					el( 'pre', { className: "panel_debug" }, fontface['src'] ),
				);
			} );
			// return elements;
			return el( wp.components.BaseControl, {
				label: __( "Uploaded:", 'greyd-wp' ),
				className: "greyd-customfont-control info",
			}, elements );
		}

		isValid() {
			// return true;
			if (
				!this.state.font ||
				this.state.font.name == '' ||
				!this.isValidName() ||
				this.state.font.faces.length == 0
			) return false;

			var valid = true;
			this.state.font.faces.forEach( (face) => {
				if ( !face.file ) valid = false;
			} );
			return valid;
		}

		isValidName() {
			var isGoogle = greyd.tools.font.isGoogle(this.state.font.name);
			var isCustom = greyd.tools.font.isCustom(this.state.font.name);
			return !isGoogle && !isCustom;
		}

		isCustomFont() {
			return greyd.tools.font.isCustom(this.props.value);
		}

		render() {
			
			return [

				this.isCustomFont() && el( 'div', { className: 'greyd-font-options' }, [
					// info
					this.renderFontInfo(),
					// remove
					el( wp.components.Button, {
						isDestructive: true,
						onClick: () => {
							if ( this.state.saving ) return;
							greyd.tools.font.delete( this.props.value, (data) => {
								if (data) this.props.onChange(this.props.value);
								else if ( typeof greyd.tools.showSnackbar === 'function' ) {
									greyd.tools.showSnackbar( __( "Error deleting font. Please see console for details.", 'greyd-wp' ), 'error' );
								}
								this.setState( { ...this.state, saving: false } );
							} );
							this.setState( { ...this.state, saving: true } );

						}
					}, [
						this.state.saving ? 
						el( wp.components.Spinner ) : 
						el( 'span', {}, __( "Delete custom font ✕", 'greyd-wp' ) )
					] ),
				] ),

				el( wp.components.BaseControl, {
					label: this.props.label?? null,
					className: "greyd-customfont-control"+(this.state.upload ? " active" : "")
				}, [
					
					this.state.upload && [

						// name
						el( wp.components.TextControl, {
							label: __( "Font name", 'greyd-wp' ),
							help: !this.isValidName() ? __( "Name is already used", 'greyd-wp' ) : "",
							style: { width: "100%" },
							value: this.state.font.name,
							onChange: ( newValue ) => this.setState( { ...this.state, font: { ...this.state.font, name: newValue } } ),
						} ),

						// faces
						el( 'div', { className: 'components-greyd-controlgroup'}, [

							this.renderFontfaces(),

							el( wp.components.Button, {
								className: 'components-greyd-controlgroup__add'+( this.state.font.faces.length === 0 ? ' group_is_empty': '' ),
								disabled: this.state.font.faces.length > 17,
								onClick: () => {
									var value = this.state.font.faces;
									value.push( { weight: this.getNextWeight() } );
									this.setState( { ...this.state, font: { ...this.state.font, faces: value } } );
								},
								title: __( 'Add font-face', 'greyd-wp' )
							}, [
								el( wp.components.Icon, { icon: 'plus-alt2' } ),
								this.state.font.faces.length === 0 ? el( 'span', {}, __( 'Add font-face', 'greyd-wp' ) ) : null
							] )
						] ),

						// upload
						el( wp.components.Button, {
							disabled: !this.isValid(),
							variant: 'secondary',
							onClick: () => {
								var newFont = { ...this.state.font };
								if ( newFont.name.indexOf('"') > -1) newFont.name = newFont.name.split('"').join("'");
								if ( newFont.name.indexOf(' ') > -1 && newFont.name.indexOf("'") == -1 ) {
									newFont.name = "'"+newFont.name+"'";
								}
								greyd.tools.font.upload(newFont, (data) => {
									if (data) this.props.onChange(newFont.name);
									else if ( typeof greyd.tools.showSnackbar === 'function' ) {
										greyd.tools.showSnackbar( __( "Error uploading font. Please see console for details.", 'greyd-wp' ), 'error' );
									}
									this.setState( { ...this.state, upload: !this.state.upload, font: null, saving: null } );
								} );
								this.setState( { ...this.state, saving: true } );
							}
						}, [
							this.state.saving ? 
							el( wp.components.Spinner ) : 
							el( 'span', {}, __( "Upload font ↑", 'greyd-wp' ) )
						] )

					],

					// toggle upload
					!this.state.saving && el( wp.components.Button, {
						variant: 'secondary',
						isDestructive: this.state.upload,
						onClick: () => {
							var font = this.state.font?? { name: '', faces: [] };
							this.setState( { ...this.state, upload: !this.state.upload, font: font } );
						}
					}, [
						this.state.upload ?
						el( 'span', {}, __( "Abort upload", 'greyd-wp' ) ) :
						el( 'span', {}, __( "Add new font", 'greyd-wp' ) )
					] )
					
				] )
			];

		}
	};

} )( window.wp );