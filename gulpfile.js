// $ npm install --save-dev gulp
// $ npm run build

var gulp           = require('gulp');

// Sass,CSS
//----------------------
var sass           = require('gulp-sass');
var sassLint       = require('gulp-sass-lint');
var csso           = require('gulp-csso');
var postcss        = require('gulp-postcss');
var autoprefixer   = require('autoprefixer');
//var cssnano        = require('cssnano');

var doiuse         = require('doiuse');
var mqpacker       = require('css-mqpacker');
var sassGlob       = require('gulp-sass-glob');

// JavaScript
//--------------------
//var jscs           = require('gulp-jscs');
//var jshint         = require('gulp-jshint');
//var stylish        = require('jshint-stylish');
//var uglify         = require('gulp-uglify');

// utility
//--------------------
//var rename         = require('gulp-rename');
//var watch          = require('gulp-watch');
var plumber        = require('gulp-plumber');
//var runSequence    = require('run-sequence');
//var concat         = require('gulp-concat');
//var browserSync    = require('browser-sync');

// ------------------------------------------------
// Auto-polyfill
// Corrective action due to travis error in autoprefixer.
// ------------------------------------------------
//require('es6-promise').polyfill();

// ------------------------------------------------
// Browsers setting
// ------------------------------------------------
var browsers = [
	'last 2 version',
	'> 50%'
];

// ------------------------------------------------
// Paths setting
// ------------------------------------------------
var paths = {
	src: {
		css : 'src/scss'
	},
	dist: {
		css : 'assets/css/'
	}
}

// ------------------------------------------------
// Sass Tasks
// ------------------------------------------------
gulp.task('scss', function () {
	return gulp.src(paths.src.css + '/**/*.scss')
		.pipe(sassGlob())
		.pipe(plumber())
		.pipe(sassLint())
		.pipe(sassLint.format())
		.pipe(sassLint.failOnError())
		.pipe(sass())
		.pipe(postcss([
			require('doiuse')({browsers: browsers}),
			require('autoprefixer')({browsers: browsers}),
			require('css-mqpacker')
		]))
		.pipe(csso())
		.pipe(gulp.dest(paths.dist.css));
});

// ------------------------------------------------
// Gulp Tasks
// ------------------------------------------------
gulp.task( 'default', function () {
	return gulp.watch(paths.src.css + '/**/*.scss',['scss']);
} );
