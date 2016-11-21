'use strict';
/**
 * タスク設定ファイル
 */
module.exports = {
	IS_PRODUCTION: false,
	dist: 'public',
	autoTest: false,
	ejs: {
		minify: {
			collapseWhitespace: true,
			conservativeCollapse: true,
			decodeEntities: true,
			html5: true,
			minifyCSS: true,
			minifyJS: true,
			minifyURLs: false,
			preserveLineBreaks: false,
			preventAttributesEscaping: false,
			quoteCharacter: "",
			removeEmptyAttributes: true,
			removeRedundantAttributes: true,
			removeScriptTypeAttributes: true,
			removeStyleLinkTypeAttributes: true
		},
		ejsOptions: {}
	},
	style: {
		sass: {
			errLogToConsole: true,
			outputStyle: 'compressed',
			sourcemap: true,
			souceComments: 'normal',
			includePaths: [
				'assets/sass/',
				'node_modules/foundation-sites/scss'
			]
		},
		autoprefixer: {
			browsers: [
				'last 3 version',
				'ie 10',
				'Android 4.2'
			]
		},
		soucemaps: './maps'
	},
	js: {
		sourcemaps: './maps'
	},
	browserify: {
		bundleOption: {
			cache: {},
			packageCache: {},
			fullPaths: false,
			debug: true,
			entries: './assets/js/src/law-yamashita-app.js',
			extensions: 'js'
		},
		output: 'assets/js/pre-compress/',
		filename: 'apps.js'
	},
	server: {
		url: 'www.law-yamashita.dev/'
	},
	path: {
		php: {
			watch: '**/*.php'
		},
		ejs: {
			src: ['ejs/**/*.ejs', '!ejs/**/_*.ejs'],
			watch: 'ejs/**/*',
			dest: 'inc/html'
		},
		style: {
			src: ['assets/sass/**/*.scss', '!assets/sass/**/_*.scss'],
			watch: 'assets/sass/**/*.scss',
			dest: 'assets/css'
		},
		svg: {
			src: 'assets/svg/icon/*.svg',
			watch: 'assets/svg/*',
			dest: 'assets/svg',
		},
		js: {
			src: 'assets/js/pre-compress/**/*.js',
			watch: 'assets/js/pre-compress/**/*.js',
			dest: 'assets/js'
		},
		image: {
			src: 'assets/img/src/**/*',
			watch: 'assets/img/src/**/*',
			dest: 'assets/img/'
		}
	}
};