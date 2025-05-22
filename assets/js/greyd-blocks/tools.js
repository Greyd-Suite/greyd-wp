/**
 * Backend Block Editor Utils & Tools.
 * 
 * This file is loaded in the editor only.
 */
var greyd = greyd || {};

var { createElement: el } = wp.element;

if ( typeof greyd.tools === 'undefined' ) {
	greyd.tools = {};
}

if ( typeof greyd.tools.generateRandomID === 'undefined' ) {
	/**
	 * Generate a random ID.
	 * @param {int} length Length of the ID to generate.
	 * @return {string} The generated ID.
	 */
	greyd.tools.generateRandomID = function ( length = 6 ) {
		return Math.random().toString( 36 ).substr( 2, length );
	}
}

if ( typeof greyd.tools.showSnackbar === 'undefined' ) {
	/**
	 * Trigger a snackbar
	 * @param {string} text Text of the snackbar
	 * @param {string} style Can be one of: success, info, warning, error.
	 * @param {bool} isDismissible Whether the snackbar has a close icon
	 */
	greyd.tools.showSnackbar = function ( text, style, isDismissible ) {
		if ( lodash.isEmpty( text ) ) return;

		style = typeof style === 'undefined' ? 'info' : style;
		isDismissible = typeof isDismissible === 'undefined' ? true : isDismissible;

		wp.data.dispatch( "core/notices" ).createNotice(
			style,
			text,
			{
				type: "snackbar",
				isDismissible: isDismissible
			}
		);
	}
}

if ( typeof greyd.tools.getSpacingPresetFromCssVar === 'undefined' ) {
	/**
	 * Converts a CSS var into a spacing preset.
	 *
	 * @param {string} value CSS var string to convert, eg. 'var(--wp--preset--spacing--small)'
	 *
	 * @return {string | undefined} spacing preset value, eg. 'var:preset|spacing|small'
	 */
	greyd.tools.getSpacingPresetFromCssVar = function( value ) {

		if ( value && typeof value === 'string' ) {
			if ( value.indexOf('u002d') > -1 ) {
				value = value.replaceAll('u002d', '-');
			}

			if ( value.indexOf('var(--wp--preset--spacing--') === 0 ) {
				return value.replace('var(--wp--preset--spacing--', 'var:preset|spacing|').replace(')', '');
			}
		}

		return value;
	}
}

if ( typeof greyd.tools.ParseQuantityAndUnitFromRawValue === 'undefined' ) {
	/**
	 * Parse a raw value into a quantity and a unit.
	 * @since 2.3.0
	 * @param {mixed} value
	 * @returns {array} First element is the quantity, second element is the unit.
	 */
	greyd.tools.ParseQuantityAndUnitFromRawValue = function ( value ) {
		return [parsedQuantity, parsedUnit] = ( 0, wp.components.__experimentalParseQuantityAndUnitFromRawValue )( value );
	}
}

if ( typeof greyd.tools.getComputedSpacingValue === 'undefined' ) {
	/**
	 * Get the computed spacing value.
	 * @since 2.3.0
	 * @param {string} value Spacing value.
	 * @returns {string} Computed spacing value.
	 */
	greyd.tools.getComputedSpacingValue = function( value ) {

		if ( value && typeof value === 'string' ) {
			value = greyd.tools.getSpacingPresetFromCssVar( value );
		}

		const [parsedQuantity, parsedUnit] = greyd.tools.ParseQuantityAndUnitFromRawValue( value );

		const computedValue = ( 0, wp.blockEditor.isValueSpacingPreset )( value ) ? value : [ parsedQuantity, parsedUnit ].join('');

		// console.log( 'computedValue:', computedValue, '('+typeof computedValue+')', 'parsedQuantity:', 'parsedUnit:', parsedUnit );

		return computedValue;
	}
}

if ( typeof greyd.tools.getCoreIcon === 'undefined' ) {
	greyd.tools.getCoreIcon = function(icon) {
		// https://wp-icon.wild-works.net/
		// icon polyfills can be found in gutenberg plugin files
		var svg_atts = {
			'width': "24",
			'height': "24",
			'viewBox': "0 0 24 24",
			'xmlns': "http://www.w3.org/2000/svg"
		};
		return {
			// icons from core
			image: el( 'svg', svg_atts, el( 'path', {
				d: "M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zM5 4.5h14c.3 0 .5.2.5.5v8.4l-3-2.9c-.3-.3-.8-.3-1 0L11.9 14 9 12c-.3-.2-.6-.2-.8 0l-3.6 2.6V5c-.1-.3.1-.5.4-.5zm14 15H5c-.3 0-.5-.2-.5-.5v-2.4l4.1-3 3 1.9c.3.2.7.2.9-.1L16 12l3.5 3.4V19c0 .3-.2.5-.5.5z"
			} ) ),
			// query layout type
			layoutList: el( "svg", svg_atts, el( "path", {
				d: "M4 4v1.5h16V4H4zm8 8.5h8V11h-8v1.5zM4 20h16v-1.5H4V20zm4-8c0-1.1-.9-2-2-2s-2 .9-2 2 .9 2 2 2 2-.9 2-2z"
			} ) ),
			layoutFlex: el( "svg", svg_atts, el( "path", {
				d: "m3 5c0-1.10457.89543-2 2-2h13.5c1.1046 0 2 .89543 2 2v13.5c0 1.1046-.8954 2-2 2h-13.5c-1.10457 0-2-.8954-2-2zm2-.5h6v6.5h-6.5v-6c0-.27614.22386-.5.5-.5zm-.5 8v6c0 .2761.22386.5.5.5h6v-6.5zm8 0v6.5h6c.2761 0 .5-.2239.5-.5v-6zm0-8v6.5h6.5v-6c0-.27614-.2239-.5-.5-.5z",
				fillRule: "evenodd", clipRule: "evenodd"
			} ) ),
			// list format
			formatIndent: el( "svg", svg_atts, el( "path", {
				d: "M4 7.2v1.5h16V7.2H4zm8 8.6h8v-1.5h-8v1.5zm-8-3.5l3 3-3 3 1 1 4-4-4-4-1 1z"
			} ) ),
			formatOutdent: el( "svg", svg_atts, el( "path", {
				d: "M4 7.2v1.5h16V7.2H4zm8 8.6h8v-1.5h-8v1.5zm-4-4.6l-4 4 4 4 1-1-3-3 3-3-1-1z"
			} ) ),
			// text align
			textAlignLeft: el( "svg", svg_atts, el( "path", {
				d: "M4 19.8h8.9v-1.5H4v1.5zm8.9-15.6H4v1.5h8.9V4.2zm-8.9 7v1.5h16v-1.5H4z"
			} ) ),
			textAlignCenter: el( "svg", svg_atts, el( "path", {
				d: "M16.4 4.2H7.6v1.5h8.9V4.2zM4 11.2v1.5h16v-1.5H4zm3.6 8.6h8.9v-1.5H7.6v1.5z"
			} ) ),
			textAlignRight: el( "svg", svg_atts, el( "path", {
				d: "M11.1 19.8H20v-1.5h-8.9v1.5zm0-15.6v1.5H20V4.2h-8.9zM4 12.8h16v-1.5H4v1.5z"
			} ) ),
			// align
			alignLeft: el( "svg", svg_atts, el( "path", {
				d: "M9 9v6h11V9H9zM4 20h1.5V4H4v16z"
			} ) ),
			alignCenter: el( "svg", svg_atts, el( "path", {
				d: "M20 9h-7.2V4h-1.6v5H4v6h7.2v5h1.6v-5H20z"
			} ) ),
			alignRight: el( "svg", svg_atts, el( "path", {
				d: "M4 15h11V9H4v6zM18.5 4v16H20V4h-1.5z"
			} ) ),
			alignSpaceBetween: el( "svg", svg_atts, el( "path", {
				d: "M9 15h6V9H9v6zm-5 5h1.5V4H4v16zM18.5 4v16H20V4h-1.5z"
			} ) ),
			// justify
			justifyTop: el( "svg", svg_atts, el( "path", {
				d: "M15,20V9H9v11H15z M4,5.5h16V4H4V5.5z"
			} ) ),
			justifyCenter: el( "svg", svg_atts, el( "path", {
				d: "M15,20v-7.2h5v-1.6h-5V4H9v7.2H4v1.6h5V20H15z"
			} ) ),
			justifyBottom: el( "svg", svg_atts, el( "path", {
				d: "M9,4v11h6V4H9z M20,18.5H4V20h16V18.5z"
			} ) ),
			justifySpaceBetween: el( "svg", svg_atts, el( "path", {
				d: "M9,9v6h6V9H9z M4,4v1.5h16V4H4z M20,18.5H4V20h16V18.5z"
			} ) ),
			// table
			table: el( "svg", svg_atts, el( "path", {
				d: "M4 6v11.5h16V6H4zm1.5 1.5h6V11h-6V7.5zm0 8.5v-3.5h6V16h-6zm13 0H13v-3.5h5.5V16zM13 11V7.5h5.5V11H13z"
			} ) ),
			tableColumnBefore: el( "svg", svg_atts, el( "path", {
				d: "M6.4 3.776v3.648H2.752v1.792H6.4v3.648h1.728V9.216h3.712V7.424H8.128V3.776zM0 17.92V0h20.48v17.92H0zM12.8 1.28H1.28v14.08H12.8V1.28zm6.4 0h-5.12v3.84h5.12V1.28zm0 5.12h-5.12v3.84h5.12V6.4zm0 5.12h-5.12v3.84h5.12v-3.84z"
			} ) ),
			tableColumnAfter: el( "svg", svg_atts, el( "path", {
				d: "M14.08 12.864V9.216h3.648V7.424H14.08V3.776h-1.728v3.648H8.64v1.792h3.712v3.648zM0 17.92V0h20.48v17.92H0zM6.4 1.28H1.28v3.84H6.4V1.28zm0 5.12H1.28v3.84H6.4V6.4zm0 5.12H1.28v3.84H6.4v-3.84zM19.2 1.28H7.68v14.08H19.2V1.28z"
			} ) ),
			tableColumnDelete: el( "svg", svg_atts, el( "path", {
				d: "M6.4 9.98L7.68 8.7v-.256L6.4 7.164V9.98zm6.4-1.532l1.28-1.28V9.92L12.8 8.64v-.192zm7.68 9.472V0H0v17.92h20.48zm-1.28-2.56h-5.12v-1.024l-.256.256-1.024-1.024v1.792H7.68v-1.792l-1.024 1.024-.256-.256v1.024H1.28V1.28H6.4v2.368l.704-.704.576.576V1.216h5.12V3.52l.96-.96.32.32V1.216h5.12V15.36zm-5.76-2.112l-3.136-3.136-3.264 3.264-1.536-1.536 3.264-3.264L5.632 5.44l1.536-1.536 3.136 3.136 3.2-3.2 1.536 1.536-3.2 3.2 3.136 3.136-1.536 1.536z"
			} ) ),
			tableColumnMoveLeft: el( "svg", svg_atts, el( "path", {
				d: "M14.6 7l-1.2-1L8 12l5.4 6 1.2-1-4.6-5z"
			} ) ),
			tableColumnMoveRight: el( "svg", svg_atts, el( "path", {
				d: "M10.6 6L9.4 7l4.6 5-4.6 5 1.2 1 5.4-6z"
			} ) ),
			// custom icons
			// list layout position
			listPositionLeft: el( "svg", svg_atts, [
				el( 'ellipse', { ry: "2", rx: "2", cy: "12", cx: "6" } ),
				el( 'rect', { height: "1.5", width: "9", y: "11.25", x: "11" } )
			] ),
			listPositionTop: el( "svg", svg_atts, [
				el( 'ellipse', { ry: "2", rx: "2", cy: "9", cx: "12" } ),
				el( 'rect', { height: "1.5", width: "14", y: "14", x: "5" } ),
			] ),
			listPositionRight: el( "svg", svg_atts, [
				el( 'ellipse', { ry: "2", rx: "2", cy: "12", cx: "18" } ),
				el( 'rect', { height: "1.5", width: "9", y: "11.25", x: "4" } ),
			] ),
			listPositionBottom: el( "svg", svg_atts, [
				el( 'rect', { height: "1.5", width: "14", y: "9", x: "5" } ),
				el( 'ellipse', { ry: "2", rx: "2", cy: "15.5", cx: "12" } ),
			] ),
			// list layout align y
			listAlignYStart: el( "svg", svg_atts, [
				el( 'ellipse', { ry: "2", rx: "2", cy: "9", cx: "6" } ),
				el( 'rect', { height: "1.5", width: "9", y: "7.25", x: "11" } ),
				el( 'rect', { height: "1.5", width: "9", y: "14.25", x: "11" } ),
			] ),
			listAlignYFirst: el( "svg", svg_atts, [
				el( 'ellipse', { ry: "2", rx: "2", cy: "8", cx: "6" } ),
				el( 'rect', { height: "1.5", width: "9", y: "7.25", x: "11" } ),
				el( 'rect', { height: "1.5", width: "9", y: "14.25", x: "11" } ),
			] ),
			listAlignYCenter: el( "svg", svg_atts, [
				el( 'ellipse', { ry: "2", rx: "2", cy: "11", cx: "6" } ),
				el( 'rect', { height: "1.5", width: "9", y: "7.25", x: "11" } ),
				el( 'rect', { height: "1.5", width: "9", y: "14.25", x: "11" } ),
			] ),
			listAlignYEnd: el( "svg", svg_atts, [
				el( 'ellipse', { ry: "2", rx: "2", cy: "14", cx: "6" } ),
				el( 'rect', { height: "1.5", width: "9", y: "7.25", x: "11" } ),
				el( 'rect', { height: "1.5", width: "9", y: "14.25", x: "11" } ),
			] ),
			// list layout align x
			listAlignXStart: el( "svg", svg_atts, [
				el( 'ellipse', { ry: "2", rx: "2", cy: "10", cx: "7" } ),
				el( 'rect', { height: "1.5", width: "14", y: "15", x: "5" } ),
			] ),
			listAlignXCenter: el( "svg", svg_atts, [
				el( 'ellipse', { ry: "2", rx: "2", cy: "10", cx: "12" } ),
				el( 'rect', { height: "1.5", width: "14", y: "15", x: "5" } ),
			] ),
			listAlignXEnd: el( "svg", svg_atts, [
				el( 'ellipse', { ry: "2", rx: "2", cy: "10", cx: "17" } ),
				el( 'rect', { height: "1.5", width: "14", y: "15", x: "5" } ),
			] ),
			search: el( "svg", svg_atts, [
				el( 'path', { d: "M13.5 6C10.5 6 8 8.5 8 11.5c0 1.1.3 2.1.9 3l-3.4 3 1 1.1 3.4-2.9c1 .9 2.2 1.4 3.6 1.4 3 0 5.5-2.5 5.5-5.5C19 8.5 16.5 6 13.5 6zm0 9.5c-2.2 0-4-1.8-4-4s1.8-4 4-4 4 1.8 4 4-1.8 4-4 4z" } ),
			] ),
			edit: el( "svg", svg_atts, [
				el( 'path', { d: "M20.0668 5.08541L16.8221 1.94543L6.20085 12.671L4.89833 17.0827L9.42571 15.8309L20.0668 5.08541ZM4 20.75H12V19.25H4V20.75Z" } ),
			] ),
			add: el( "svg", svg_atts, [
				el( 'path', { d: "M11.25 12.75V18H12.75V12.75H18V11.25H12.75V6H11.25V11.25H6V12.75H11.25Z" } ),
			] ),
			trash: el( "svg", svg_atts, [
				el( 'path', {
					fillRule: "evenodd",
					clipRule: "evenodd",
					d: "M12 2.71429C10.7376 2.71429 9.71429 3.73764 9.71429 5.00001H4V7.00001H5.46699C5.46718 7.09832 5.47463 7.19803 5.4898 7.29857L7.17174 18.4414C7.3194 19.4196 8.16005 20.1429 9.14934 20.1429H14.8507C15.84 20.1429 16.6806 19.4196 16.8283 18.4414L18.5102 7.29858C18.5254 7.19803 18.5328 7.09832 18.533 7.00001H20V5.00001H14.2857C14.2857 3.73764 13.2624 2.71429 12 2.71429ZM16.8151 7.04271C16.8173 7.02833 16.8183 7.01407 16.8184 7.00001H7.18163C7.18165 7.01407 7.18271 7.02833 7.18489 7.04271L8.86683 18.1855C8.88792 18.3253 9.00801 18.4286 9.14934 18.4286H14.8507C14.992 18.4286 15.1121 18.3253 15.1332 18.1855L16.8151 7.04271Z"
				} ),
			] ),
			media: el( "svg", svg_atts, [
				el( 'path', {
					fillRule: "evenodd",
					clipRule: "evenodd",
					d: "M5.28571 4.5H18.7143C19.1482 4.5 19.5 4.85178 19.5 5.28571V18.7143C19.5 19.1482 19.1482 19.5 18.7143 19.5H5.28571C4.85178 19.5 4.5 19.1482 4.5 18.7143V5.28571C4.5 4.85178 4.85178 4.5 5.28571 4.5ZM3 5.28571C3 4.02335 4.02335 3 5.28571 3H18.7143C19.9767 3 21 4.02335 21 5.28571V18.7143C21 19.9767 19.9767 21 18.7143 21H5.28571C4.02335 21 3 19.9767 3 18.7143V5.28571ZM15 12L10 9V15L15 12Z"
				} ),
			] ),
			//caption
			caption: el( "svg", svg_atts, el( "path", {
				fillRule: "evenodd",
				clipRule: "evenodd",
				d: "M6 5.5h12a.5.5 0 0 1 .5.5v12a.5.5 0 0 1-.5.5H6a.5.5 0 0 1-.5-.5V6a.5.5 0 0 1 .5-.5ZM4 6a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6Zm4 10h2v-1.5H8V16Zm5 0h-2v-1.5h2V16Zm1 0h2v-1.5h-2V16Z"
			} ) ),
			// lock
			locked: el("svg", svg_atts, el( "path", {
				d: "M17 10h-1.2V7c0-2.1-1.7-3.8-3.8-3.8-2.1 0-3.8 1.7-3.8 3.8v3H7c-.6 0-1 .4-1 1v8c0 .6.4 1 1 1h10c.6 0 1-.4 1-1v-8c0-.6-.4-1-1-1zm-2.8 0H9.8V7c0-1.2 1-2.2 2.2-2.2s2.2 1 2.2 2.2v3z"
			} ) ),
			unlocked: el("svg", svg_atts, el( "path", {
				d: "M17 10h-1.2V7c0-2.1-1.7-3.8-3.8-3.8-2.1 0-3.8 1.7-3.8 3.8h1.5c0-1.2 1-2.2 2.2-2.2s2.2 1 2.2 2.2v3H7c-.6 0-1 .4-1 1v8c0 .6.4 1 1 1h10c.6 0 1-.4 1-1v-8c0-.6-.4-1-1-1z"
			} ) ),
			// other
			moreVertical: el( "svg", svg_atts, el( "path", {
				d: "M13 19h-2v-2h2v2zm0-6h-2v-2h2v2zm0-6h-2V5h2v2z"
			} ) ),
			check: el( "svg", svg_atts, el( "path", {
				d: "M16.7 7.1l-6.3 8.5-3.3-2.5-.9 1.2 4.5 3.4L17.9 8z"
			} ) ),
			undo: el( "svg", svg_atts, el( "path", {
				d: "M18.3 11.7c-.6-.6-1.4-.9-2.3-.9H6.7l2.9-3.3-1.1-1-4.5 5L8.5 16l1-1-2.7-2.7H16c.5 0 .9.2 1.3.5 1 1 1 3.4 1 4.5v.3h1.5v-.2c0-1.5 0-4.3-1.5-5.7z"
			} ) ),
		}[icon];
	}
}
