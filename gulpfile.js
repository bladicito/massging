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
		'templates/massaging-dev/assets/js/jquery.js',
		'templates/massaging-dev/assets/js/terrific.js',
		'templates/massaging-dev/modules-terrific/*/js/*.js'
	]
;

gulp.task('concatenateJsFiles', function() {
	return gulp.src(jsFiles)
		.pipe(concat('scripts.js'))
		.pipe(gulp.dest('templates/massaging/js'));
});




