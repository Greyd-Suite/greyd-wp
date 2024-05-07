/**
 * Greyd Theme Frontend Features.
 * Dynamic Grid
 */

document.addEventListener('DOMContentLoaded', () => {
	// vars
	const default_vars = {
		"sm": [ "576px", "1px" ],
		"md": [ "992px", "2px" ],
		"lg": [ "1200px", "3px" ],
		"xl": [ "1621px", "4px" ],
	}
	const regex_breakpoints = new RegExp('(min-width|max-width):\\s('+default_vars.sm.join('|')+'|'+default_vars.md.join('|')+'|'+default_vars.lg.join('|')+'|'+default_vars.xl.join('|')+')', 'g');
	const prefix_breakpoints = '--wp--custom--greyd--grid--breakpoint--';

	var all_vars = {
		"sm": default_vars.sm[0],
		"md": default_vars.md[0],
		"lg": default_vars.lg[0],
		"xl": default_vars.xl[0],
	};
	var found = {};
	var styleSheets = document.styleSheets;

	// functions
	const foundAll = () => {
		return found.sm && found.md && found.lg;
	};
	const searchRules = ( rules ) => {
		// skip empty rules
		if (typeof rules === 'undefined' || element.sheet.cssRules.length == 0) return;
		// loop stylesheet's cssRules
		for (var i=0; i<rules.length; i++) {
			// skip empty rules
			if (typeof rules[i].style === 'undefined' || rules[i].style.length == 0) continue;
			// loop stylesheet's cssRules' style (property names)
			for (var j=0; j<rules[i].style.length; j++) {
				// check prefix
				if (!rules[i].style[j].startsWith(prefix_breakpoints)) continue;
				// collect var key and value (uncomputed)
				var key = rules[i].style[j];
				all_vars[key.replace(prefix_breakpoints, '')] = rules[i].style.getPropertyValue(key);
				found[key.replace(prefix_breakpoints, '')] = true;
				// maybe stop
				if ( foundAll() ) break;
			}
			// maybe stop
			if ( foundAll() ) break;
		}
	};
	const injectRules = ( rules ) => {
		// skip empty rules
		if (typeof rules === 'undefined' || rules.length == 0) return;
		// loop stylesheet's cssRules
		for (var i=0; i<rules.length; i++) {
			// skip empty media rules
			if (typeof rules[i].media === 'undefined') continue;
			var media_text = rules[i].media.mediaText;
			var media = regex_breakpoints.exec(media_text);
			while (media != null) {
				var [ match, rule, value] = media;
				// get new breakpoint value
				var breakpoint = value;
				if (default_vars.sm.indexOf(value) > -1) breakpoint = all_vars.sm;
				else if (default_vars.md.indexOf(value) > -1) breakpoint = all_vars.md;
				else if (default_vars.lg.indexOf(value) > -1) breakpoint = all_vars.lg;
				else if (default_vars.xl.indexOf(value) > -1) breakpoint = all_vars.xl;
				// calculate max-width
				if (rule == "max-width") {
					breakpoint = (parseInt(breakpoint)-0.02)+"px";
				}
				// replace
				media_text = media_text.replace(match, rule+': '+breakpoint);
				// next media query match
				media = regex_breakpoints.exec(media_text);
			}
			if (rules[i].media.mediaText != media_text) {
				// set new media text
				rules[i].media.mediaText = media_text;
			}
		}
	};

	// get stylesheet by id
	var element = document.getElementById('global-styles-inline-css');
	// if found: get breakpoint values from this stylesheet
	if ( element?.sheet?.cssRules && element.sheet.cssRules.length > 0 ) {
		// search this stylesheets rules
		searchRules(element.sheet.cssRules);
	}
	// if not found: search through all stylesheets
	else {
		// loop each stylesheet to get breakpoint values from global styles
		for (var i=0; i<styleSheets.length; i++) {
			// skip css files
			if (styleSheets[i].href != null) continue;
			// search rules
			searchRules(styleSheets[i].cssRules);
			// maybe stop
			if ( foundAll() ) break;
		}
	}

	// loop each stylesheet and inject new breakpoint values
	for (var i=0; i<styleSheets.length; i++) {
		// skip inline css
		if (styleSheets[i].href == null) continue;
		// skip external
		if (styleSheets[i].href.indexOf(location.origin) !== 0) continue;
		// search rules
		injectRules(styleSheets[i].cssRules);
	}
});