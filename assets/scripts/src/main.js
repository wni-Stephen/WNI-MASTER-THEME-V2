/**
 * WebsiteNI Starter Theme
 * Main JavaScript entry point.
 */

import '../../styles/scss/style.scss';

import 'what-input';

import Foundation from 'foundation-sites';

import '../functions.js';

/**
 * Make Foundation available globally for
 * project-specific JavaScript where required.
 */
window.Foundation = Foundation;

/**
 * Initialise Foundation.
 */
jQuery(function($) {
	$(document).foundation();
});