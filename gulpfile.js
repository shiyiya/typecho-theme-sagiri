var gulp = require('gulp'),
  babel = require('gulp-babel'),
  uglify = require('gulp-uglify'),
  rename = require('gulp-rename'),
  autoprefixer = require('gulp-autoprefixer'),
  cleanCSS = require('gulp-clean-css'),
  clean = require('gulp-clean'),
  gulpSequence = require('gulp-sequence')

gulp.task('clean-scripts', function() {
  return gulp.src('js/*.min.js').pipe(clean({ force: true, read: true }))
  gulp.src('css/*.min.css').pipe(clean({ force: true, read: true }))
})

gulp.task('clean-css', function() {
  return gulp.src('css/*.min.css').pipe(clean({ force: true, read: true }))
})

gulp.task('build-scripts', function() {
  return gulp
    .src('js/*.js')
    .pipe(babel())
    .pipe(uglify())
    .pipe(rename({ suffix: '.min' }))
    .pipe(gulp.dest('js'))
})

gulp.task('build-css', function() {
  return gulp
    .src('css/*.css')
    .pipe(cleanCSS())
    .pipe(autoprefixer({ browsers: ['last 3 versions'], cascade: false }))
    .pipe(rename({ suffix: '.min' }))
    .pipe(gulp.dest('./css'))
})

gulp.task(
  'default',
  gulpSequence(
    'clean-scripts',
    'clean-css',
    'build-scripts',
    'build-css',
    function(err) {
      console.log(err)
    }
  )
)
