/**
 * Created by bladimirardiles on 28/07/15.
 */

var gulp            = require('gulp'),
	util            = require('gulp-util'),
	webserver       = require('gulp-webserver'),
	less            = require('gulp-less'),
	autoprefixer    = require('gulp-autoprefixer'),
	minifyCss       = require('gulp-minify-css'),
	rename          = require('gulp-rename'),
	concat          = require('gulp-concat'),
	clean           = require('gulp-clean'),
	addsrc          = require('gulp-add-src'),
	uglify          = require('gulp-uglify'),

	jsFiles			= [
		'templates/massaging/assets/js/jquery.js',
		'templates/massaging/assets/js/terrific.js',
		'templates/massaging/assets/js/slick.js',
		'templates/massaging/modules-terrific/**/js/*.js'
	],

	lessFiles		= [
		'templates/massaging/assets/css/*.less',
		'templates/massaging/modules-terrific/**/css/*.less'
	],

	cssFiles	= [
		'templates/massaging/assets/css/*.css',
		'templates/massaging/cache/*.css'
	]
;

gulp.task('concatenateJsFiles', function() {
	return gulp.src(jsFiles)
		.pipe(concat('scripts.js'))
		.pipe(gulp.dest('templates/massaging/js'));
});

gulp.task('uglifyJsFiles', ['concatenateJsFiles'], function() {
	return gulp.src('templates/massaging/js/scripts.js')
		.pipe(uglify())
		.pipe(rename('templates/massaging/js/scripts.min.js'))
		.pipe(rename({dirname : ''}))
		.pipe(gulp.dest('templates/massaging/js'));
});



gulp.task('concatenateLessFiles', function() {
    return gulp.src(lessFiles)
        .pipe(concat('styles.less'))
        .pipe(gulp.dest('templates/massaging/cache'))
});


gulp.task('lessToCss', ['concatenateLessFiles'], function() {
	return gulp.src('templates/massaging/cache/*.less')
		.pipe(less())
		.pipe(rename({dirname : ''}))
		.pipe(gulp.dest('templates/massaging/cache'))
});

gulp.task('concatenateCss', ['lessToCss'], function() {
	return gulp.src(cssFiles)
		.pipe(concat('styles.css'))
		.pipe(gulp.dest('templates/massaging/css'))
});

gulp.task('watch', function () {
	gulp.watch('templates/massaging/assets/css/*.*', ['concatenateCss']);
	gulp.watch('templates/massaging/modules-terrific/**/css/*.less', ['concatenateCss']);
    gulp.watch('templates/massaging/modules-terrific/**/js/*.js', ['uglifyJsFiles']);
});



gulp.task('default', [ 'uglifyJsFiles', 'concatenateCss', 'watch']);








