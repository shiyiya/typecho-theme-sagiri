var gulp = require('gulp'),
  babel = require('gulp-babel'),
  uglify = require('gulp-uglify'),
  rename = require('gulp-rename'),
  autoprefixer = require('gulp-autoprefixer'),
  cleanCSS = require('gulp-clean-css'),
  browserify = require('browserify'),
  stream = require('vinyl-source-stream'),
  buffer = require('vinyl-buffer'),
  pkg = require('./package.json'),
  sass = require('gulp-sass'),
  browserSync = require('browser-sync').create(),
  reload = browserSync.reload

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

gulp.task('build-css', function() {
  return gulp
    .src(['css/mix.css', 'css/iconfont.css'])
    .pipe(sass({ outputStyle: 'compressed' }))
    .pipe(cleanCSS({ compatibility: 'ie10', level: 2 }))
    .pipe(autoprefixer({ cascade: false }))
    .pipe(rename({ suffix: '.min' }))
    .pipe(gulp.dest('./css'))
})

gulp.task('build-util', function() {
  return gulp
    .src(['util/!(*.min).js', 'util/**/!(*.min).js'])
    .pipe(babel())
    .pipe(uglify())
    .pipe(rename({ suffix: '.min' }))
    .pipe(gulp.dest('util'))
})

gulp.task('start', function() {
  browserSync.init({
    proxy: 'localhost'
  })

  gulp.watch(['./*', './**/*']).on('change', reload)

  gulp.watch(
    ['css/!(*.min).css', 'css/**/!(*.min).css'],
    gulp.parallel(['build-css'])
  )

  gulp.watch(
    ['js/**/!(*.min).js'],
    gulp.parallel(['build-index', 'build-sagiri'])
  )

  gulp.watch(['util/!(*.min).js'], gulp.parallel(['build-util']))
})

gulp.task(
  'build',
  gulp.parallel(['build-index', 'build-sagiri', 'build-css', 'build-util'])
)
