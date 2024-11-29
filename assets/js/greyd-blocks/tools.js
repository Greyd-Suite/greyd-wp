/**
 * Backend Block Editor Utils & Tools.
 * 
 * This file is loaded in the editor only.
 */
var greyd = greyd || {};

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
