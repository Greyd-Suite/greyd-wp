=== Greyd WP ===
Contributors: greydsuite, sandrakurze, luminuu, jtgreyd, thomask42, annebovelett
Requires at least: 6.4
Tested up to: 6.7
Requires PHP: 7.4
Stable tag: 2.16.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Tags: accessibility-ready, block-patterns, block-styles, custom-colors, custom-header, custom-logo, editor-style, featured-images, full-site-editing, template-editing, theme-options, translation-ready

== Description ==

The Greyd Theme is a multipurpose WordPress theme designed to give you more options and flexibility in the context of Full Site Editing. The block theme offers additional Global Styles to cover all your needs that might not be covered by the core offering yet. These features include various global button styles, hover effects for buttons, fluid font sizes and more. The global spacing presets can easily be individualized to your likings. The Greyd Theme is accessibility-ready and responsive, as it automatically adapts to the screen size without you having to individually define layouts and sizes for each breakpoint. Just like you know it from intrinsic web design. 

The Greyd Theme is designed to fast and flexibly fit any WordPress website. It additionally comes with a variety of patterns and templates that are suitable for any kind of website and landing page. For an even easier visualization and customization all design adjustments are displayed in the preview with our handy set-up pattern. All these features let you do the work of professional developers without having profound knowledge.

== Copyright ==

Greyd WP, (C) 2024 Greyd GmbH.
The Greyd Theme is distributed under the terms of the GNU GPL.

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

== Images ==

All images used in this theme have been created by our team or generated with the assistance of tools such as Midjourney and PatternPad. As such, we hold full ownership and rights to these images. You are free to use them within the context of this theme in accordance with the theme's license agreement. If you have any questions regarding the usage or licensing of these images, please contact us.

* Midyourney terms of service:  https://docs.midjourney.com/docs/terms-of-service
* PatternPad terms of service:  https://patternpad.com/terms.html

== Installation ==

Before you start, make sure you're running WordPress 6.4 or later.

1. Start by downloading the theme.
2. Go to "Appearance → Themes → Add New"
3. Upload the ZIP.
4. Activate the theme.

== Changelog ==

= 2.16.0 - 2025-04-22 =
== Bugfixes ==
* Fixed a CSS selector
* Fixed a bug in the Greyd Global Styles that didn't allow opening some settings, throwing an error

= 2.15.0 - 2025-03-14 =
==Improvements==
* Improved definition of outline colors on links, buttons, etc
* Deprecated font sizes in Greyd Global Styles in favour of Core font sizes settings
* Improved an issue with orphaned http:// URLs in the font-family src attribute

==Bugfixes==
* Fixed styles in theme.json for alternate buttons
* Fixed label colors if they are in a group with a text color set
* Fixed an issue with custom breakpoints not being recognized

= 2.13.0 - 2025-01-29 =
==Improvements==
* Improved the site editor warning if no or too many main classes were found, added link to a help article
* Improved core and Greyd button styles

==Bugfixes==
* Fixed some small CSS issues.

= 2.11.1 - 2024-11-29 =
==Bugfixes==

* Remove lodash assignment in global scope to avoid issues with other scripts

= 2.11.0 - 2024-11-21 =
==Bugfixes==

* Fixed a compatibility issue with the "Simply Schedule Appointments" plugin.  
* Fixed an issue with child themes using the deprecated "hover" key in theme.json


= 2.10.0 - 2024-10-30 =
==Improvements==

* As for specificity changes in WP 6.7, button styles need separate CSS for the editor preview

==Bugfixes==

* Fixed an issue with CSS selector specificity in theme.css
* Fixed an issue with a wrong selector for a site editor class

= 2.9.0 - 2024-10-01 =
==Improvements==

* Adjust dashboard changelog for newer format
* Improved rendering of submenues in navigation

==Bugfixes==

* Fixes translation loading issues
* Fixes missing CSS variables on input fields

= 2.8.0 - 2024-09-03 =
==Features==

* Added theme support for the new section stylings in groups and columns

==Improvements==

* Reworked translations
* New notification directky inside the editor, when a wp-template is not using a main-element

==Bugfixes==

* Fixed an issue not displaying gradients when a preset color was removed in the global styles

= 2.7.0 - 2024-07-30 =
== Improvements ==

* Adjustments for compatibility with wordpress 6.6
* Improved navigation submenu CSS

== Bugfixes ==

* Fixed too small iframe in template editing mode
* Fixed a problem with changelog in Greyd Dashboard page

= 2.6.0 - 2024-07-10 =
== Improvements ==

* Theme JSON 3.0: Utilize new Features
* Conditional Content: Time-Based Live Conditions

== Bugfixes ==

* Fixed some problems with wordings
* Single Post Content is not rendered as expected with ARMember Plugin
* Fixed some issues with the theme assets import/export
* Fixed an issue with the Dynamic Tag "number of posts"
* Fixed an compatibility issue with Gutenberg 18.3
* Fixed a javascript issue when a wp-template was included inside a dynamic template
 
= 2.5.0 - 2024-06-21 =
== Improvements ==

- Added buttons focus outline
- Added uppercase & letter spacing as global styling option for greyd buttons

== Bugfixes ==

- Fixed an issue with missing break points

= 2.4.1 - 2024-06-07 =
- Re-added index.php to prevent error when using child themes

= 2.4.0 - 2024-05-22 =
- Fix an issue with font declarations in theme.json
- Make Google and custom fonts deprecation notice always visible in Greyd Global Styles
- Updates to translation strings

= 2.3.3 - 2024-05-17 =
- Re-add GREYD_THEME_CONFIG variable
- Fix an issue with font declarations in theme.json

= 2.3.2 - 2024-05-13 =
- Update screenshot

= 2.3.1 - 2024-05-10 =
- Remove unneeded variable

= 2.3.0 - 2024-05-08 =
- Pattern updates
- Various fixes and improvements

= 2.2.0 - 2024-04-12 =
- Adding patterns

= 2.1.0 - 2024-03-12 =
- Improved theme asset handling when switching to a child theme

= 2.0 - 2024-02-15 =
- Release of the new Full Site Editing Theme
