var gulp = require('gulp'),
	$ = require('gulp-load-plugins')(),
	browserSync = require('browser-sync');

var dir = {
	themes: 'www/wordpress/wp-content/themes/law-yamashita/',
	plugins: 'www/wordpress/wp-content/plugins/graph-paper/'
};
var theme = {
	css: dir.themes + 'assets/css/',
	sass: dir.themes + 'assets/sass/',
	js: dir.themes + 'assets/js/',
	precom: dir.themes + 'assets/js/pre-compress/',
	src: dir.themes + 'assets/js/src/',
	admin_src: dir.themes + 'assets/js/admin/',
	img: dir.themes + 'assets/img/',
	svg: dir.themes + 'assets/svg/',
	svgIcons: dir.themes + 'assets/svg/icons/',
};
var plugin = {
	css: dir.plugins + 'assets/css/',
	sass: dir.plugins + 'assets/sass/',
	js: dir.plugins + 'assets/js/',
	precom: dir.plugins + 'assets/js/pre-compress/',
	src: dir.plugins + 'assets/js/src/',
	admin_src: dir.plugins + 'assets/js/admin/',
	img: dir.plugins + 'assets/img/',
};

var pkg = require('./package.json');
var banner = ['/**',
	' * Theme Name: <%= pkg.themename %>',
	' * Theme URI: <%= pkg.themeuri %>',
	' * Author URI: <%= pkg.homepage %>',
	' * Description: <%= pkg.description %>',
	' * Author: <%= pkg.author %>',
	' * Version: <%= pkg.version %>',
	' * License: <%= pkg.license %>',
	' * License URI: license.txt',
	' * Tags: <%= pkg.keywords %>',
	' */',
''].join('\n');


/* =========================================  タスク  ================================ */
// $.compass
// Main CSS
gulp.task('style', function() {
	gulp.src( theme.sass + 'style.scss' )
		.pipe($.plumber({
			errorHandler: $.notify.onError('Error: <%= error.message %>')
		}))
		.pipe($.compass({
			config_file: './config.rb',
			css: dir.themes,
			sass: theme.sass,
			image: theme.img,
			javascript: theme.js,
			comments: true
		}))
		.pipe($.autoprefixer())
		.pipe($.cssmin())
		.pipe($.header(banner, {pkg: pkg}))
		.pipe(gulp.dest( dir.themes ))
		.pipe(browserSync.reload({ stream: true }));
});
// Editor Style
gulp.task( 'plugin-css', function() {
	gulp.src( plugin.sass + 'gp.scss' )
		.pipe( $.plumber({
			errorHandler: $.notify.onError( 'Error: <%= error.message %>' )
		}))
		.pipe( $.compass({
			config_file: plugin.sass + 'config.rb',
			css: plugin.css,
			sass: plugin.sass,
			image: plugin.img,
			javascript: plugin.js,
			comments: true
		}))
		.pipe( $.autoprefixer() )
		.pipe( $.cssmin() )
		.pipe( gulp.dest( theme.css ) )
		.pipe(browserSync.reload({ stream: true }));
});
// Editor Style
gulp.task( 'editor', function() {
	gulp.src( theme.sass + 'editor-style.scss' )
		.pipe( $.plumber({
			errorHandler: $.notify.onError( 'Error: <%= error.message %>' )
		}))
		.pipe( $.compass({
			config_file: 'config.rb',
			css: theme.css,
			sass: theme.sass,
			image: theme.img,
			javascript: theme.js,
			comments: true
		}))
		.pipe( $.autoprefixer() )
		.pipe( $.cssmin() )
		.pipe( $.header( banner, { pkg: pkg } ) )
		.pipe( gulp.dest( theme.css ) )
		.pipe(browserSync.reload({ stream: true }));
});


// SVG Icons & Images
// SVG
gulp.task('svg', function() {
	gulp.src( theme.svgIcons + '*.svg')
		.pipe( $.plumber({
			errorHandler: function(error) {
				console.log(error.messageFormatted);
				this.emit('end');
			}
		}))
		.pipe($.svgmin())
		.pipe($.svgstore({ inlineSvg: true }))
		.pipe($.cheerio({
			run: function ($) {
				$('svg').addClass('test');
				$('[fill]').removeAttr('fill');
			},
			parserOptions: { xmlMode: true }
		}))
		.pipe(gulp.dest(theme.svg))
		.pipe(browserSync.reload({ stream: true }));
});
gulp.task('svg2png', function() {
	gulp.src(theme.svgIcons + '*.svg')
		.pipe( $.plumber({
			errorHandler: function(error) {
				console.log(error.messageFormatted);
				this.emit('end');
			}
		}))
		.pipe($.svg2png())
		.pipe($.rename({
			prefix: 'icons.svg.'
		}))
		.pipe(gulp.dest(theme.svg))
		.pipe(browserSync.reload({ stream: true }));
});

// JAVASCRIPT
// For inline scripts
gulp.task('precom-scripts', function() {
	gulp.src( theme.precom + '*.js')
		.pipe($.plumber({
			errorHandler: $.notify.onError('Error: <%= error.message %>')
		}))
		.pipe($.uglify())
		.pipe($.rename({
			extname: '.min.js'
		}))
		.pipe(gulp.dest( theme.js ))
		.pipe(browserSync.reload({ stream: true }));
});
gulp.task('plugin-precom', function() {
	gulp.src( plugin.precom + '*.js')
		.pipe($.plumber({
			errorHandler: $.notify.onError('Error: <%= error.message %>')
		}))
		.pipe($.uglify())
		.pipe($.rename({
			extname: '.min.js'
		}))
		.pipe(gulp.dest( plugin.js ))
		.pipe(browserSync.reload({ stream: true }));
});
// Main theme App Javascript
gulp.task('src-js', function() {
	gulp.src( theme.src + '*.js')
		.pipe($.concat('law-yamashita-app.js'))
		.pipe($.plumber({
			errorHandler: $.notify.onError('Error: <%= error.message %>')
		}))
		.pipe($.uglify())
		.pipe($.rename({
			extname: '.min.js'
		}))
		.pipe(gulp.dest( theme.js ))
		.pipe(browserSync.reload({ stream: true }));
});
gulp.task('plugin-src', function() {
	gulp.src( plugin.src + '*.js')
		.pipe($.concat('gp-app.js'))
		.pipe($.plumber({
			errorHandler: $.notify.onError('Error: <%= error.message %>')
		}))
		.pipe($.uglify())
		.pipe($.rename({
			extname: '.min.js'
		}))
		.pipe(gulp.dest( plugin.js ))
		.pipe(browserSync.reload({ stream: true }));
});

// Browser Sync
gulp.task('server', function() {
	browserSync({
		proxy: 'www.law-yamashita.dev/'
	});
});
gulp.task('bs-reload', function() {
	browserSync.reload();
});

/* =========================================  WATCH  ================================ */
gulp.task('watch', [ 'style', 'precom-scripts', 'editor', 'src-js', 'server', 'svg' ], function() {
	gulp.watch( theme.sass + '{,/**/}{,/**/}{,/**/}{,/**/}*.scss', ['style', 'editor'] );
	gulp.watch( theme.precom + '*.js', ['precom-scripts'] );
	gulp.watch( theme.src + '*.js', ['src-js'] );
	gulp.watch( dir.themes + '{,/**/}{,/**/}{,/**/}{,/**/}*.php', ['bs-reload'] );
	gulp.watch( theme.svgIcons + '*.svg', ['svg'] );
});
gulp.task('default', ['watch']);
