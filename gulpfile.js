var gulp = require('gulp'),
  babel = require('gulp-babel'),
  uglify = require('gulp-uglify'),
  rename = require('gulp-rename'),
  autoprefixer = require('gulp-autoprefixer'),
  cleanCSS = require('gulp-clean-css'),
  browserify = require('browserify'),
  stream = require('vinyl-source-stream'),
  buffer = require('vinyl-buffer'),
  pkg = require('./package.json')

gulp.task('build-sagiri', function() {
  return browserify({
    entries: 'js/global/sagiri.js',
    debug: false,
    standalone: 'Sagiri'
  })
    .transform('browserify-versionify', {
      placeholder: '__VERSION__',
      version: pkg.version
    })
    .transform('babelify')
    .bundle()
    .on('error', function(error) {
      console.log(error.toString())
    })
    .pipe(stream('sagiri.min.js'))
    .pipe(buffer())
    .pipe(uglify())
    .pipe(gulp.dest('js'))
})

gulp.task('build-index', function() {
  return browserify({
    entries: 'js/modules/index.js',
    debug: false
  })
    .transform('babelify')
    .bundle()
    .on('error', function(error) {
      console.log(error.toString())
    })
    .pipe(stream('index.min.js'))
    .pipe(buffer())
    .pipe(uglify())
    .pipe(gulp.dest('js'))
})

gulp.task('build-type', function() {
  return browserify({
    entries: 'js/global/type/index.js',
    debug: false
  })
    .transform('babelify')
    .bundle()
    .on('error', function(error) {
      console.log(error.toString())
    })
    .pipe(stream('type.min.js'))
    .pipe(buffer())
    .pipe(uglify())
    .pipe(gulp.dest('js'))
})

gulp.task('build-css', function() {
  return gulp
    .src(['css/mix.css', 'css/iconfont.css'])
    .pipe(cleanCSS())
    .pipe(autoprefixer({ cascade: false }))
    .pipe(rename({ suffix: '.min' }))
    .pipe(gulp.dest('./css'))
})

gulp.task('build-util', function() {
  return gulp
    .src('util/!(*.min).js')
    .pipe(babel())
    .pipe(uglify())
    .pipe(rename({ suffix: '.min' }))
    .pipe(gulp.dest('util'))
})

gulp.task('start', function() {
  gulp.watch(['css/!(*.min).css'], gulp.parallel(['build-css']))

  gulp.watch(
    ['js/**/!(*.min).js'],
    gulp.parallel(['build-index', 'build-sagiri'])
  )

  gulp.watch(['util/!(*.min).js'], gulp.parallel(['build-util']))
})

gulp.task(
  'build',
  gulp.parallel([
    'build-index',
    'build-type',
    'build-sagiri',
    'build-css',
    'build-util'
  ])
)
