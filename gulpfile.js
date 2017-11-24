// Gulpfile

var gulp = require('gulp'),
gutil = require('gulp-util'),
imagemin = require('gulp-imagemin'),
uglify = require('gulp-uglify'),
sass = require('gulp-sass'),
concat = require('gulp-concat');

gulp.task('log', function(){
	gutil.log('==My Log Task==')
});

gulp.task('sass', function() {
  gulp.src('assets/styles/main.scss')
  .pipe(sass({style: 'expanded'}))
    .on('error', gutil.log)
  .pipe(gulp.dest('css'))
});

gulp.task('images', function() {
	gulp.src('assets/images/*')
		.pipe(imagemin([
			imagemin.gifsicle({interlaced: true}),
			imagemin.jpegtran({progressive: true}),
			imagemin.optipng({optimizationLevel: 5})
		]))
		.pipe(gulp.dest('images'))
});

gulp.task('watch', function() {
	gulp.watch('assets/styles/*/*.scss', ['sass']);
	gulp.watch('assets/styles/main.scss', ['sass']);
	gulp.watch('assets/images/*.*', ['images']);
});

gulp.task('default', ['sass', 'images']);



