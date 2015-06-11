var gulp           = require("gulp"),
    autoprefixer   = require("gulp-autoprefixer"),
    changed        = require("gulp-changed"),
    concat         = require("gulp-concat"),
    uglify         = require("gulp-uglify"),
    plumber        = require("gulp-plumber"),
    sourcemaps     = require("gulp-sourcemaps"),
    sass           = require('gulp-ruby-sass'),
    libs           = require("bower-files")(),
    browserSync    = require('browser-sync'),
    reload         = browserSync.reload,
		del            = require("del");


 gulp.task('default',    ['sync', 'browserSync']);
 gulp.task('libs',       ['vendorCSS', 'vendorJS']);
 gulp.task('build',      ['js', 'images', 'fonts', 'sass']);
 gulp.task('build-prod', ['vendorCSS', 'vendorJS', 'js', 'images', 'fonts', 'sass']);


gulp.task('sync', function() {
  gulp.watch('resources/assets/sass/**/*.scss',  ['sass']);
  gulp.watch('resources/assets/js/**/*.js',      ['js']);
  gulp.watch('resources/views/**/**/*.php',      ['blankTask', browserSync.reload]);
  gulp.watch('app/**/**/*.php',                  ['blankTask', browserSync.reload]);
});


gulp.task('clean', function(cb) {
  del(['public/css/**', 'public/js/**', 'public/images/**', 'public/fonts/**'], cb);
});

gulp.task('browserSync', function() {
  browserSync({
    proxy: "local.sapayol.com/",
    host: "192.168.1.4",
    port: 3002
  });
});

gulp.task('sass', function() {
  return sass('resources/assets/sass/main.scss', {
    container: "gulp-ruby-sass-api",
    sourcemap: true,
    style: 'nested',
    trace: true,
    verbose: true
  })
    .pipe(autoprefixer('last 5 version'))
    .on('error', function(err) {
      console.error('Error', err.message);
    })
    .pipe(sourcemaps.write('../maps'))
    .pipe(gulp.dest('public/css'))
    .pipe(reload({stream: true}));
});

gulp.task('js', function() {
  return gulp.src('resources/assets/js/**/*.js')
    .pipe(plumber())
    .pipe(sourcemaps.init())
      .pipe(concat('main.js'))
      .pipe(uglify())
    .pipe(sourcemaps.write('../maps'))
    .pipe(gulp.dest('public/js/'));
});

gulp.task('images', function() {
  return gulp.src('resources/assets/images/**/*')
    .pipe(plumber())
    .pipe(changed('public/images'))
    .pipe(gulp.dest('public/images'));
});

gulp.task('fonts', function() {
  return gulp.src(['resources/assets/fonts/**/*'])
    .pipe(gulp.dest('public/fonts/'));
});

gulp.task('blankTask', function() {
  return true;
});

gulp.task('vendorJS', function() {
  return gulp.src(libs.ext('js').files)
    .pipe(plumber())
    .pipe(uglify({ beautify: true, mangle: false }))
    .pipe(concat('vendor.js', { sourcesContent: true }))
    .pipe(gulp.dest('public/js/'))
});

gulp.task('vendorCSS', function() {
  return gulp.src(libs.match('!**/foundation.css').ext('css').files)
    .pipe(plumber())
    .pipe(concat('vendor.css', { sourcesContent: true }))
    .pipe(gulp.dest('public/css/'))
});






