var gulp            = require("gulp"),
    autoprefixer    = require("gulp-autoprefixer"),
    changed         = require("gulp-changed"),
    concat          = require("gulp-concat"),
    uglify          = require("gulp-uglify"),
    plumber         = require("gulp-plumber"),
    rename          = require("gulp-rename"),
    sourcemaps      = require("gulp-sourcemaps"),
    sass            = require('gulp-ruby-sass'),
    minifycss       = require('gulp-minify-css'),
    libs            = require("bower-files")(),
    browserSync     = require('browser-sync'),
    runSequence     = require('run-sequence'),
		del             = require("del"),
    reload          = browserSync.reload,
    project_dev_url = "local.sapayol.com/"; // Нour project's address in your dev environment



gulp.task('default',    ['sync', 'browserSync']);
gulp.task('libs',       ['css-vendor', 'js-vendor']);

gulp.task('build', function(callback) {
  runSequence('clean', ['css', 'css-vendor', 'js', 'js-vendor'], ['images', 'fonts'], callback);
});

gulp.task('build-prod', function(callback) {
  runSequence('clean', ['css-prod', 'css-vendor-prod','js-prod', 'js-vendor-prod'], 'css-combine', ['images', 'fonts'], callback);
});


//===========================================================================//
//                                 GLOBAL TASKS                              //
//===========================================================================//

gulp.task('clean', function() {
  del(['public/css/**', 'public/js/**', 'public/images/**', 'public/fonts/**', '!public/css', '!public/js', '!public/images', '!public/fonts']);
});

gulp.task('images', function() {
  return gulp.src('resources/assets/images/**/*')
    .pipe(plumber())
    .pipe(changed('public/images'))
    .pipe(gulp.dest('public/images'));
});

gulp.task('fonts', function() {
  return gulp.src(['resources/assets/fonts/**/*'])
    .pipe(plumber())
    .pipe(gulp.dest('public/fonts/'));
});

gulp.task('blankTask', function() {
  return true;
});

gulp.task('sync', function() {
  gulp.watch('resources/assets/sass/**/*.scss',  ['css']);
  gulp.watch('resources/assets/js/**/*.js',      ['js']);
  gulp.watch('resources/views/**/**/*.php',      ['blankTask', browserSync.reload]);
  gulp.watch('app/**/**/*.php',                  ['blankTask', browserSync.reload]);
});

gulp.task('browserSync', function() {
  browserSync({
    proxy: project_dev_url,
    port: 3002
  });
});




//===========================================================================//
//                             CSS: Development Env                          //
//===========================================================================//

gulp.task('css', function() {
  return sass('resources/assets/sass/main.scss', {
    sourcemap: true,
    style: 'nested',
    trace: true,
    verbose: true
  })
    .pipe(plumber())
    .pipe(autoprefixer('last 5 version'))
    .on('error', function(err) {
      console.error('Error', err.message);
    })
    .pipe(sourcemaps.write('../maps'))
    .pipe(gulp.dest('public/css'))
    .pipe(browserSync.stream());
});

gulp.task('css-vendor', function() {
  return gulp.src(libs.match('!**/foundation.css').ext('css').files)
    .pipe(plumber())
    .pipe(concat('vendor.css', { sourcesContent: true }))
    .pipe(gulp.dest('public/css/'))
});




//===========================================================================//
//                             JS: Development Env                           //
//===========================================================================//

gulp.task('js', function() {
  return gulp.src('resources/assets/js/**/*.js')
    .pipe(plumber())
    .pipe(sourcemaps.init())
    .pipe(concat('main.js'))
    .pipe(uglify())
    .pipe(sourcemaps.write('../maps'))
    .pipe(gulp.dest('public/js/'));
});

gulp.task('js-vendor', function() {
  return gulp.src(libs.ext('js').files)
    .pipe(plumber())
    .pipe(uglify({ beautify: true, mangle: false }))
    .pipe(concat('vendor.js', { sourcesContent: true }))
    .pipe(gulp.dest('public/js/'))
});




//===========================================================================//
//                            CSS: Production Env                            //
//===========================================================================//

gulp.task('css-prod', function() {
  return sass('resources/assets/sass/main.scss')
    .pipe(plumber())
    .pipe(autoprefixer('last 5 version'))
    .pipe(gulp.dest('public/css'));
});

gulp.task('css-vendor-prod', function() {
  return gulp.src(libs.match('!**/foundation.css').ext('css').files)
    .pipe(plumber())
    .pipe(concat('vendor.css'))
    .pipe(gulp.dest('public/css/'))
});

gulp.task('css-combine', function() {
  return gulp.src(['public/css/vendor.css', 'public/css/main.css'])
    .pipe(plumber())
    .pipe(concat('combo.css'))
    .pipe(minifycss())
    .pipe(rename({suffix: '.min'}))
    .pipe(gulp.dest('public/css/'))
});




//===========================================================================//
//                             JS: Production Env                            //
//===========================================================================//

gulp.task('js-prod', function() {
  return gulp.src('resources/assets/js/**/*.js')
    .pipe(plumber())
    .pipe(concat('main.js'))
    .pipe(uglify({ beautify: false, mangle: true }))
    .pipe(rename({suffix: '.min'}))
    .pipe(gulp.dest('public/js/'));
});

gulp.task('js-vendor-prod', function() {
  // return gulp.src(libs.match('!**/foundation.js').ext('js').files)
  return gulp.src(libs.ext('js').files)
    .pipe(plumber())
    .pipe(concat('vendor.js'))
    .pipe(uglify({ beautify: false, mangle: true }))
    .pipe(rename({suffix: '.min'}))
    .pipe(gulp.dest('public/js/'))
});


