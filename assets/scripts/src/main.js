import '../../styles/scss/style.scss';

import $ from 'jquery';
import 'what-input';
import 'foundation-sites';

import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';
import { ScrollSmoother } from 'gsap/ScrollSmoother';


/**
 * Make jQuery available to Foundation and
 * existing WebsiteNI theme scripts.
 */
window.$ = $;
window.jQuery = $;


/**
 * GSAP.
 */
gsap.registerPlugin(
	ScrollTrigger,
	ScrollSmoother
);

window.gsap = gsap;
window.ScrollTrigger = ScrollTrigger;
window.ScrollSmoother = ScrollSmoother;


/**
 * WebsiteNI theme functions.
 */
import '../functions.js';


/**
 * Foundation.
 */
$(document).foundation();