/**
 * Greyd Block Editor Components.
 * 
 * This file is loaded in the editor.
 */
var greyd = greyd || {};

greyd.components = new function () {

	var { createElement: el } = wp.element;
	var { __ } = wp.i18n;
	var _ = lodash;

	/**
	 * SelectControl with optgroup capability
	 * 
	 * @property {string} label Label to be displayed.
	 * @property {string} help Help to be displayed.
	 * @property {object} style Style of Select.
	 * @property {string} className Class of Select.
	 * @property {array} options Array of objects with either label & value (option) or label & options (optgroup).
	 * @property {string} value Current value.
	 * @property {callback} onChange Callback function to be called when value is changed (params: value, event).
	 * 
	 * @returns {object} OptionsControl component.
	 */
	this.OptionsControl = class extends wp.element.Component {
		constructor () {
			super();
		}
		getOptions() {
			var options = [];
			var items = this.props.options;
			var value = this.props.value;
			for ( var i = 0; i < items.length; i++ ) {
				if ( _.has( items[ i ], 'options' ) ) {
					var optgroup = [];
					for ( var j = 0; j < items[ i ].options.length; j++ ) {
						if ( _.has( items[ i ].options[ j ], 'value' ) ) {
							var opt = items[ i ].options[ j ];
							var disabled = _.has( opt, 'disabled' );
							var selected = opt.value == value ? 'selected' : '';
							optgroup.push( el( 'option', { value: opt.value, disabled: disabled, selected: selected }, opt.label ) );
						}
					}
					options.push( el( 'optgroup', { label: items[ i ].label }, optgroup ) );
				}
				else if ( _.has( items[ i ], 'value' ) ) {
					var disabled = _.has( items[ i ], 'disabled' );
					var selected = items[ i ].value == value ? 'selected' : '';
					options.push( el( 'option', { value: items[ i ].value, disabled: disabled, selected: selected }, items[ i ].label ) );
				}
				else if ( typeof items[ i ] === 'string' ) {
					// new since global-styles dev
					var selected = items[ i ] == value ? 'selected' : '';
					options.push( el( 'option', { value: items[ i ], selected: selected }, items[ i ] ) );
				}
			}
			return options;
		}
		render() {
			return el( wp.components.BaseControl, {
				className: 'greyd-options-control',
				help: _.has( this.props, 'help' ) ? this.props.help : '',
			},
				( _.has( this.props, 'label' ) ) ? el( 'label', {}, this.props.label ) : '',
				el( 'select', {
					style: this.props.style,
					className: this.props.className,
					value: this.props.value,
					onChange: ( event ) => this.props.onChange( event.target.value, event ),
				}, this.getOptions() ),
			);
		}
	};


	/**
	 * Dimension Control with UnitControls for multiple sides.
	 * 
	 * @property {object|string} value Current value.
	 * @property {string} label Optional label to be displayed.
	 * @property {array} units Units to be supported.
	 * @property {int} min Minimum value.
	 * @property {int|object} max Maximum value. If integer, only the 'px'-max is set.
	 * @property {array} sides Sides to be supported.
	 * @property {string} type Type of the value ('object'|'string').
	 * @property {object} labels Custom labels for the sides.
	 * @property {callback} onChange Callback function to be called when value is changed.
	 * 
	 * @since 2.3.0 [BETA] SpacingSizesControl is used, to reflect the core control.
	 * 
	 * @returns {object} String values for each side (eg. {top: "1px", right: "12px", ... }).
	 *                   Empty object {} on default or if cleared.
	 */
	this.DimensionControl = class extends wp.element.Component {

		constructor() {
			super();
		}

		/**
		 * Convert the value into a javascript object
		 * @param {mixed} value
		 * @returns {object}
		 */
		explodeShorthandValue( value ) {
			if (typeof value === "object" && !_.isEmpty(value) ) {
				return value;
			}
			const {
				sides = [ 'top', 'right', 'bottom', 'left' ],
			} = this.props;

			// build default value
			let newValue = {};
			for (var i = 0; i < sides.length; i++) {
				newValue[ sides[i] ] = null;
			}
			
			if ( typeof value === "object" ) {
				newValue = {
					...newValue,
					value
				}
			}
			else if (typeof value === "string" ) {

				// shorthand property, eg. '4px 10px 3px'
				if ( !_.isEmpty(value.match(/[a-z\d]+\s+[a-z\d]?/g)) ) {
					let values = value.split(/\s+/);
					for (var i = 0; i < sides.length; i++) {
						let val = null;
						switch ( sides[i] ) {
							case 'top':
							case 'topLeft':
								val = values[0];
								break;
							case 'right':
							case 'topRight':
								val = _.has(values, 1) ? values[1] : values[0];
								break;
							case 'bottom':
							case 'bottomRight':
								val = _.has(values, 2) ? values[2] : values[0];
								break;
							case 'left':
							case 'bottomLeft':
								val = _.has(values, 3) ? values[3] : _.has(values, 1) ? values[1] : values[0];
								break;
								
						}
						newValue[ sides[i] ] = val;
					}
				}
				// simple string
				else if ( !_.isEmpty(value) ) {
					for (var i = 0; i < sides.length; i++) {
						newValue[ sides[i] ] = value;
					}
				}
			}

			return newValue;
		}

		/**
		 * Convert the object value into a shorthand css string
		 * @param {object} value 
		 * @returns {string}
		 */
		implodeShorthandValue( value ) {

			if ( typeof value !== 'object' ) {
				return value;
			}

			const newValue = [];
			for (const [side, val] of Object.entries(value)) {
				if ( val === null || val === '' || val === undefined ) {
					newValue.push('0');
				} else {
					newValue.push(val);
				}
			}
			return newValue.join(" ");
		}

		/**
		 * Render the control
		 */
		render() {

			/**
			 * @since 2.5.0 New control is used.
			 */
			// if ( ! greyd?.data?.is_greyd_beta ) {
			// 	return el( greyd.components.__DimensionControl, this.props );
			// }

			const {
				value,
				label,
				onChange,
				type,
				min: minimumCustomValue = 0,
				sides = [ 'top', 'right', 'bottom', 'left' ],
				...props
			} = this.props;

			let objectValue;
			if ( typeof value === 'string' ) {
				objectValue = this.explodeShorthandValue( value );
			}
			else if ( typeof value === 'object' &&  !_.isEmpty(value) ) {
				objectValue = value;
			}
			else {
				objectValue = {};
			}

			// convert individual values, otherwise the control only recognizes unit
			// value and css variables in the format 'var:preset|spacing|small'
			for (const [ key, val ] of Object.entries(objectValue)) {
				objectValue[ key ] = greyd.tools.getComputedSpacingValue( val )
			}

			const isBorderRadius = !_.isEmpty( sides ) && sides.length && sides.indexOf('topRight') > -1;

			return el( wp.components.BaseControl, {
				className: 'greyd-dimension-control',
				...props
			}, [

				// Core Spacing Sizes Control
				!isBorderRadius && el( wp.blockEditor.__experimentalSpacingSizesControl, {
					label: label,
					showSideInLabel: false,
					minimumCustomValue: minimumCustomValue,
					sides: sides,
					values: objectValue,
					onChange: val => {
						if ( type === 'string' ) {
							val = this.implodeShorthandValue( val );
						}
						onChange( val )
					}
				} ),

				// Core Border Radius Control
				isBorderRadius && el( wp.blockEditor.__experimentalBorderRadiusControl, {
					values: objectValue,
					label: label,
					onChange: ( val ) => {
						if ( type === 'string' ) {
							val = this.implodeShorthandValue( val );
						}
						onChange( val )
					},
					...props
				} ),
				
				// reset button
				value !== null && value !== '' && el( wp.components.Flex, {
					justify: 'flex-end'
				}, [
					el( wp.components.Button, {
						onClick: () => onChange( null ),
						icon: greyd.tools.getCoreIcon( 'undo' ),
						// iconPosition: 'right',
						isSmall: true,
						isTertiary: true,
						style: {
							color:  'rgb(117, 117, 117)',
							paddingInline: '4px',
						},
					}, __( "Reset", 'greyd_hub' ) )
				] )
			] )
		}
	};

	/**
	 * Block Style Variants like controls, similar to radio buttons.
	 * 
	 * @property {object} value Current value.
	 * @property {string} label Optional label to be displayed.
	 * @property {String|WPElement} help Optional help text to be displayed.
	 * @property {object[]} options [required] Array of option objects:
	 * 		@property {string} label Label of the option
	 * 		@property {string} icon Icon of the option (optional)
	 * 		@property {string} value Value of the option
	 * @property {callback} onChange Callback function to be called when value is changed.
	 */
	this.BlockStyleControl = class extends wp.element.Component {

		constructor() {
			super();
		}

		render() {
			const {
				options,
				value,
				onChange,
				label = '',
				layout = ''
			} = this.props;

			const hasEmptyOption = options.filter( option => { return _.isEmpty(option.value) } ).length > 0

			// show a label
			let labelElement = null;
			if ( !_.isEmpty(label) ) {
				if ( hasEmptyOption) {
					labelElement = el( wp.components.BaseControl.VisualLabel, {
						onClick: () => onChange( null ),
					}, label )
				} else {
					labelElement = el( greyd.components.AdvancedLabel, {
						label: label,
						initialValue: null,
						currentValue: value,
						onClear: () => onChange( null ),
					}, label )
				}
			}

			return el( wp.element.Fragment, {}, [
				labelElement,
				el( "div", {
					className: "block-editor-block-styles"
				}, [
					el( "div", {
						className: "block-editor-block-styles__variants" + ( layout == 'inline' ? ' layout--inline' : '' )
					}, [
						...options.map( option => {
							const isActive = value === option.value;
							return el( "button", {
								type: "button",
								"aria-current": isActive ? "true" : "false",
								className: "components-button block-editor-block-styles__item is-secondary" + ( isActive ? " is-active" : "" ),
								"aria-label": String( option.label ),
								onClick: () => onChange( option.value ),
							}, [
								el( wp.components.__experimentalTruncate, {
									numberOfLines: 1,
									className: "block-editor-block-styles__item-text"
								}, String( option.label ) )
							] );
						} )
					] ),
				] ),
				_.has( this.props, 'help' ) && (
					typeof this.props.help === 'string' ?
						el( "p", {
							className: 'components-base-control__help',
							style: {
								fontSize: 12,
								fontStyle: 'normal',
								color: ' rgb(117, 117, 117)'
							},
						}, this.props.help ) :
						this.props.help
				)
			] );
		}
	};

	/**
	 * Button Group Control, similar to radio buttons.
	 * 
	 * @property {object} value Current value.
	 * @property {string} label Optional label to be displayed.
	 * @property {String|WPElement} help Optional help text to be displayed.
	 * @property {object[]} options [required] Array of option objects:
	 * 		@property {string} label Label of the option
	 * 		@property {string} icon Icon of the option (optional)
	 * 		@property {string} value Value of the option
	 * @property {callback} onChange Callback function to be called when value is changed.
	 */
	this.ButtonGroupControl = class extends wp.element.Component {

		constructor() {
			super();
		}

		render() {
			return el( greyd.components.BlockStyleControl, {
				...this.props,
				layout: 'inline'
			} )
		}
	}
};
