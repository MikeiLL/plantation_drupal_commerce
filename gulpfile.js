// Gulpfile

var gulp = require('gulp');

var gutil = require('gulp-util');

gulp.task('log', function(){
	gutil.log('==My Log Task==')
});

var sass = require('gulp-sass');

gulp.task('sass', function() {
  gulp.src('styles/main.scss')
  .pipe(sass({style: 'expanded'}))
    .on('error', gutil.log)
  .pipe(gulp.dest('css'))
});

var uglify = require('gulp-uglify'),
	concat = require('gulp-concat');

gulp.task('watch', function() {
	gulp.watch('styles/*/*.scss', ['sass']);
	gulp.watch('styles/main.scss', ['sass']);
});

gulp.task('default', ['sass']);



