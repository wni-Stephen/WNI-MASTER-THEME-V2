var gulp 			= require('gulp'),
    gutil 			= require('gulp-util'),
    browserSync 	= require('browser-sync').create(),
    filter 			= require('gulp-filter'),
    plugin 			= require('gulp-load-plugins')();
    clean 			= require('gulp-clean');
    jshint 			= require('gulp-jshint');

const LOCAL_URL = 'http://domainname.com/';

const FOUNDATION = 'node_modules/foundation-sites';

const SOURCE = {
	scripts: [
	    'node_modules/what-input/dist/what-input.js',

		FOUNDATION + '/dist/js/plugins/foundation.core.js',
		FOUNDATION + '/dist/js/plugins/foundation.util.*.js',

		// FOUNDATION + '/dist/js/plugins/foundation.abide.js',
		FOUNDATION + '/dist/js/plugins/foundation.accordion.js',
		// FOUNDATION + '/dist/js/plugins/foundation.accordionMenu.js',
		// FOUNDATION + '/dist/js/plugins/foundation.drilldown.js',
		// FOUNDATION + '/dist/js/plugins/foundation.dropdown.js',
		// FOUNDATION + '/dist/js/plugins/foundation.dropdownMenu.js',
		FOUNDATION + '/dist/js/plugins/foundation.equalizer.js',
		FOUNDATION + '/dist/js/plugins/foundation.interchange.js',
		// FOUNDATION + '/dist/js/plugins/foundation.offcanvas.js',
		// FOUNDATION + '/dist/js/plugins/foundation.orbit.js',
		// FOUNDATION + '/dist/js/plugins/foundation.responsiveMenu.js',
		// FOUNDATION + '/dist/js/plugins/foundation.responsiveToggle.js',
		// FOUNDATION + '/dist/js/plugins/foundation.reveal.js',
		// FOUNDATION + '/dist/js/plugins/foundation.slider.js',
		FOUNDATION + '/dist/js/plugins/foundation.smoothScroll.js',
		// FOUNDATION + '/dist/js/plugins/foundation.magellan.js',
		// FOUNDATION + '/dist/js/plugins/foundation.sticky.js',
		FOUNDATION + '/dist/js/plugins/foundation.tabs.js',
		FOUNDATION + '/dist/js/plugins/foundation.responsiveAccordionTabs.js',
		// FOUNDATION + '/dist/js/plugins/foundation.toggler.js',
		// FOUNDATION + '/dist/js/plugins/foundation.tooltip.js',

		'assets/scripts/js/**/*.js',
    ],

	styles: 'assets/styles/scss/**/*.scss',

	images: 'assets/images/src/**/*',

	php: '**/*.php'
};

const ASSETS = {
	styles: 'assets/styles/',
	scripts: 'assets/scripts/',
	images: 'assets/images/',
	all: 'assets/'
};

const JSHINT_CONFIG = {
	"node": true,
	"globals": {
		"document": true,
		"jQuery": true
	}
};

gulp.task('scripts', function() {
	const CUSTOMFILTER = filter(ASSETS.scripts + 'js/**/*.js', {restore: true});

	return gulp.src(SOURCE.scripts)
		.pipe(plugin.plumber(function(error) {
            gutil.log(gutil.colors.red(error.message));
            this.emit('end');
        }))
		.pipe(plugin.sourcemaps.init())
		.pipe(plugin.babel({
			presets: ['es2015'],
			compact: true,
			ignore: ['what-input.js']
		}))
		.pipe(CUSTOMFILTER)
			.pipe(plugin.jshint(JSHINT_CONFIG))
			.pipe(plugin.jshint.reporter('jshint-stylish'))
			.pipe(CUSTOMFILTER.restore)
		.pipe(plugin.concat('script.js'))
		.pipe(plugin.uglify())
		.pipe(plugin.sourcemaps.write('.'))
		.pipe(gulp.dest(ASSETS.scripts))
});

gulp.task('styles', function() {
	return gulp.src(SOURCE.styles)
		.pipe(plugin.plumber(function(error) {
            gutil.log(gutil.colors.red(error.message));
            this.emit('end');
        }))
		.pipe(plugin.sourcemaps.init())
		.pipe(plugin.sass())
		.pipe(plugin.autoprefixer({
		    browsers: [
		    	'last 2 versions',
		    	'ie >= 9',
				'ios >= 7'
		    ],
		    cascade: false
		}))
		.pipe(plugin.cssnano())
		.pipe(plugin.sourcemaps.write('.'))
		.pipe(gulp.dest(ASSETS.styles))
		.pipe(browserSync.reload({
          stream: true
        }));
});

gulp.task('images', function() {
	return gulp.src(SOURCE.images)
		.pipe(plugin.imagemin())
		.pipe(gulp.dest(ASSETS.images))
});

gulp.task('translate', function() {
	return gulp.src(SOURCE.php)
	.pipe(plugin.wpPot({
		domain: 'domainname',
		package: 'WebsiteNI'
	}))
	.pipe(gulp.dest('file.pot'));
});

gulp.task('browsersync', function() {
    var files = [
    	SOURCE.php,
    ];

    browserSync.init(files, {
	    proxy: LOCAL_URL,
    });

    gulp.watch(SOURCE.styles, gulp.parallel('styles'));
    gulp.watch(SOURCE.scripts, gulp.parallel('scripts')).on('change', browserSync.reload);
    gulp.watch(SOURCE.images, gulp.parallel('images'));
});

gulp.task('watch', function() {
	gulp.watch(SOURCE.styles, gulp.parallel('styles'));
	gulp.watch(SOURCE.scripts, gulp.parallel('scripts'));
	gulp.watch(SOURCE.images, gulp.parallel('images'));
});

gulp.task('default', gulp.parallel('styles', 'scripts', 'images'));