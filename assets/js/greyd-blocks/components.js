/**
 * Greyd Block Editor Components.
 * 
 * This file is loaded in the editor.
 */
var greyd = greyd || {};

greyd.components = new function () {

	const _ = lodash;

	const {
		Component,
		createElement: el,
		Fragment
	} = wp.element;

	const {
		Icon,
		BaseControl,
		__experimentalUnitControl: UnitControl,
		__experimentalHStack: HStack,
		__experimentalTruncate: Truncate
	} = wp.components;

	const { __ } = wp.i18n;

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
	this.OptionsControl = class extends Component {
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
			return el( BaseControl, {
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
	 * @property {string} type Type of value to be returned (object|string).
	 * @property {object} labels Custom labels for the sides.
	 * @property {callback} onChange Callback function to be called when value is changed.
	 * 
	 * @returns {object} String values for each side (eg. {top: "1px", right: "12px", ... }).
	 *                   Empty object {} on default or if cleared.
	 */
	this.DimensionControl = class extends Component {

		constructor () {
			super();

			// bind keyword "this" inside functions to the class object
			// this.setConfig 			= this.setConfig.bind(this);
			// this.getMode 			= this.getMode.bind(this);
			// this.getUnit 			= this.getUnit.bind(this);
			// this.handleValueChange	= this.handleValueChange.bind(this);
			// this.handleUnitChange	= this.handleUnitChange.bind(this);
			// this.clear 				= this.clear.bind(this);
			this.switchMode = this.switchMode.bind( this );

			this.config = {
				units: [ "px", "%", "em", "rem", "vw", "vh" ], // Units available in the control.
				min: 0, // Minimum value, can be negative.
				max: {
					'': 100,
					'px': 200,
					'%': 100,
					'em': 100,
					'rem': 100,
					'vw': 100,
					'vh': 100,
				},
				step: {
					'': 1,
					'px': 0.1,
					'%': 0.1,
					'em': 0.01,
					'rem': 0.01,
					'vw': 0.1,
					'vh': 0.1,
				},
				sides: [ "top", "right", "bottom", "left" ],
				type: "object", // the type of value to return
				labels: {
					"top": __( "Top", 'greyd-theme' ),
					"right": __( "Right", 'greyd-theme' ),
					"bottom": __( "Bottom", 'greyd-theme' ),
					"left": __( "Left", 'greyd-theme' ),
					"topLeft": __( "Top left", 'greyd-theme' ),
					"topRight": __( "Top right", 'greyd-theme' ),
					"bottomRight": __( "Bottom right", 'greyd-theme' ),
					"bottomLeft": __( "Bottom left", 'greyd-theme' ),
					"all": __( "all sides", 'greyd-theme' )
				},
			};

			this.state = {
				mode: "simple",
				unit: "px"
			};
		}

		/**
		 * Called after the control is build and props are set.
		 * @source https://reactjs.org/docs/react-component.html#componentdidmount
		 */
		componentDidMount() {

			// set the config
			this.setConfig();

			// init the state
			if ( typeof this.props.value !== "undefined" ) {

				const state = {
					mode: this.getMode( this.props.value ),
					unit: this.getUnit( this.props.value ),
				};

				if ( state !== this.state ) {
					this.setState( state );
				}
			}
		}

		/**
		 * Get the current mode
		 * @param {string|object} value this.props.value
		 * @returns {string} 'simple'|'advanced'
		 */
		getMode( value ) {

			value = this.getValueAsObject( value );

			if ( typeof value === 'object' && !_.isEmpty( value ) ) {

				let lastVal = null;

				for ( const [ side, val ] of Object.entries( value ) ) {
					if ( !lastVal ) {
						lastVal = val;
					}
					else if ( !_.isEqual( lastVal, val ) ) {
						return 'advanced';
					}
				}
			}
			return 'simple';
		}

		/**
		 * Get the current unit
		 * @param {string|object} value this.props.value
		 * @returns {string}
		 */
		getUnit( value ) {

			value = this.getValueAsObject( value );

			if ( typeof value === 'object' && !_.isEmpty( value ) ) {

				for ( const [ side, val ] of Object.entries( value ) ) {

					// set unit
					const unit = this.getUnitValue( val );
					if ( !_.isEmpty( unit ) ) {
						return unit;
					}
				}
			}
			else if ( typeof value === 'string' ) {
				const unit = this.getUnitValue( value );
				if ( !_.isEmpty( unit ) ) {
					return unit;
				}
			}
			return 'px';
		}

		/**
		 * Get unit from string
		 * @param {string} value 
		 * @returns string|null
		 */
		getUnitValue = function ( value ) {
			value = String( value ).match( /(px|%|vw|vh|rem|em)/g );
			return _.isEmpty( value ) ? null : String( _.get( value, 0 ) );
		};

		/**
		 * Set the class configuration
		 */
		setConfig() {
			const { config, props } = this;

			// get any user config...
			const userConfig = _.pick( props, _.keys( config ) );

			// avoid errors...
			const finalConfig = _.clone( config );

			// merge labels recursive
			userConfig.labels = { ...finalConfig.labels, ...userConfig.labels };

			// merge
			_.assign( finalConfig, userConfig );

			// set max values
			if ( typeof finalConfig.max !== 'object' ) {
				finalConfig.max = config.max;
				finalConfig.max.px = userConfig.max;
			}

			finalConfig.units = this.modUnitsArray( finalConfig.units );

			this.config = finalConfig;
		}

		/**
		 * Modify array of units to be used for UnitControl
		 * @param {array} units
		 * @returns {array}
		 */
		modUnitsArray( units ) {
			const finalUnits = [];

			units.forEach( ( unit ) => {
				finalUnits.push( {
					label: unit,
					value: unit,
					default: 0,
				} );
			} );

			return finalUnits;
		}

		/**
		 * Convert the value into a javascript object
		 * @param {mixed} value
		 * @returns 
		 */
		getValueAsObject( value ) {
			if ( typeof value === "object" && !_.isEmpty( value ) ) {
				return value;
			}
			else if ( typeof value === "string" ) {

				let { sides } = this.config;
				let newValue = {};

				// shorthand property, eg. '4px 10px 3px'
				if ( !_.isEmpty( value.match( /[\d]+[^\d]+\s+[\d]+[^\d]?/g ) ) ) {
					let values = value.split( " " );
					for ( var i = 0; i < sides.length; i++ ) {
						const side = sides[ i ];
						let val = null;
						switch ( side ) {
							case 'top':
							case 'topLeft':
								val = values[ 0 ];
								break;
							case 'right':
							case 'topRight':
								val = _.has( values, 1 ) ? values[ 1 ] : values[ 0 ];
								break;
							case 'bottom':
							case 'bottomRight':
								val = _.has( values, 2 ) ? values[ 2 ] : values[ 0 ];
								break;
							case 'left':
							case 'bottomLeft':
								val = _.has( values, 3 ) ? values[ 3 ] : _.has( values, 1 ) ? values[ 1 ] : values[ 0 ];
								break;

						}
						newValue[ side ] = val;
					}
				}
				// simple string
				else if ( !_.isEmpty( value ) ) {
					for ( var i = 0; i < sides.length; i++ ) {
						newValue[ sides[ i ] ] = value;
					}
				}
				return newValue;
			}
			return {};
		}

		/**
		 * Handle change of a numeric value
		 * @param {string} side (top|right|...|all)
		 * @param {string} input 
		 */
		handleValueChange( side, input ) {
			const { value } = this.props;
			const { mode, unit } = this.state;
			const { type, sides } = this.config;
			const unitValue = this.getNumValue( input ) + unit;
			let newValue = {};

			if ( "all" === side ) {
				if ( type === 'string' ) {
					newValue = unitValue;
				}
				else {
					sides.forEach( side => {
						newValue[ side ] = unitValue;
					} );
				}
			}
			else {
				newValue = this.getValueAsObject( value );
				newValue[ side ] = unitValue;

				if ( type === 'string' ) {
					newValue = Object.values( newValue ).join( " " );
				}
			}

			this.props.onChange( newValue );
		}

		/**
		 * Handle change of a unit value.
		 * @param {string} input unit value
		 */
		handleUnitChange( input ) {
			const { value } = this.props;
			const state = this.state;
			const unit = this.getUnitValue( input );
			const { type, sides } = this.config;

			if ( !_.isEmpty( unit ) && unit !== state.unit ) {
				this.setState( {
					...state,
					unit: unit
				}, () => {

					const newValue = this.getValueAsObject( value );
					for ( const [ side, val ] of Object.entries( newValue ) ) {
						const numVal = this.getNumValue( val );
						if ( _.isEmpty( numVal ) ) {
							delete newValue[ side ];
						}
						else {
							newValue[ side ] = numVal + unit;
						}
					}
					if ( type === 'string' ) {
						newValue = Object.values( newValue ).join( " " );
					}

					this.props.onChange( newValue );
				} );
			}
		}

		/**
		 * Get numeric value from string
		 * @param {string} value 
		 * @returns string|null
		 */
		getNumValue = function ( value ) {
			value = String( value ).match( /[-]{0,1}[\d]*[.]{0,1}[\d]+/g );
			return _.isEmpty( value ) ? null : String( _.get( value, 0 ) );
		};

		/**
		 * Reduce object of values to the first value that is set.
		 */
		getFirstValue( value ) {
			if ( typeof value === 'string' ) {
				return value;
			}
			else if ( typeof value === "object" && !_.isEmpty( value ) ) {
				for ( const val of Object.values( value ) ) {
					if ( !_.isEmpty( val ) ) {
						return val;
					}
				}
			}
			return null;
		}

		/**
		 * Reset the value & mode (not the unit)
		 */
		clear() {
			this.setState( {
				unit: this.state.unit,
				mode: "simple"
			}, () => {
				this.props.onChange( {} );
			} );
		}

		/**
		 * Switch mode between simple and advanced
		 */
		switchMode() {
			let state = {
				...this.state,
				mode: this.state.mode === "simple" ? "advanced" : "simple"
			};

			let callback = null;
			if ( "simple" === state.mode ) {
				callback = this.handleValueChange( "all", this.getFirstValue( this.props.value ) );
			}

			this.setState( state, callback );
		}

		/**
		 * Render the control
		 */
		render() {
			const { type, labels, min, max, step, units, sides } = this.config;
			const { mode, unit } = this.state;
			const { label } = this.props;
			const value = this.getValueAsObject( this.props.value );

			return el( "div", { className: "dimension_control" }, [
				el( HStack, {
					className: "dimension_control__label",
					justify: "space-between"
				}, [
					el( 'label', {}, label ? label : '' ),
					el( Icon, {
						className: "switch_button",
						icon: mode === "simple" ? "admin-links" : "editor-unlink",
						onClick: this.switchMode
					} ),
				] ),
				el( "div", {},
					mode === "simple" ? (
						[
							el( HStack, {
								justify: "space-between"
							}, [
								el( 'label', {}, __( labels.all, 'greyd-theme' ) ),
								el( UnitControl, {
									value: this.getFirstValue( value ) + unit,
									min: min,
									max: max[ unit ],
									step: step[ unit ],
									units: units,
									onChange: ( newValue ) => this.handleValueChange( "all", newValue ),
									onUnitChange: ( newUnit ) => this.handleUnitChange( newUnit )
								} )
							] ),
						]
					) : (
						sides.map( ( side ) => {
							return el( HStack, {
								className: "dimension_control__inputs",
								justify: "space-between"
							}, [
								el( 'label', {}, __( labels[ side ], 'greyd-theme' ) ),
								el( UnitControl, {
									value: _.has( value, side ) ? value[ side ] : null,
									min: min,
									max: max[ unit ],
									step: step[ unit ],
									units: units,
									onChange: ( newValue ) => this.handleValueChange( side, newValue ),
									onUnitChange: ( newUnit ) => this.handleUnitChange( newUnit )
								} )
							] );
						} )
					)
				),
			] );
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
	this.BlockStyleControl = class extends Component {

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
					labelElement = el( BaseControl.VisualLabel, {
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

			return el( Fragment, {}, [
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
								el( Truncate, {
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
	this.ButtonGroupControl = class extends Component {

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
