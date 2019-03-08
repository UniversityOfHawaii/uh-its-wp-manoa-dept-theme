'use strict';

var gulp = require('gulp');
var sass = require('gulp-sass');

sass.compiler = require('node-sass');

gulp.task('sass', function () {
  return gulp.src('./sass/**/*.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(gulp.dest('./css'));
});

gulp.task('sass:watch', function () {
  // This makes ctrl-c work to kill sass:watch
  process.once('SIGINT',function(){
      process.nextTick(() => process.exit(0));
  });
  gulp.watch('./sass/**/*.scss', gulp.series('sass'));
});
