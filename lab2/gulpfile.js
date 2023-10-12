const gulp = require('gulp');
const browserSync = require('browser-sync').create();
const sass = require('gulp-sass');
const uglify = require('gulp-uglify');

// Компиляция SCSS в CSS
gulp.task('sass', function () {
  return gulp
    .src('./src/scss/*.scss')
    .pipe(sass())
    .pipe(gulp.dest('./dist/css'))
    .pipe(browserSync.stream());
});

// Минификация JavaScript
gulp.task('js', function () {
  return gulp
    .src('./src/js/*.js')
    .pipe(uglify())
    .pipe(gulp.dest('./dist/js'))
    .pipe(browserSync.stream());
});

// Задача для BrowserSync
gulp.task('browserSync', function () {
  browserSync.init({
    server: {
      baseDir: './src',
    },
  });

  gulp.watch('./src/*.html').on('change', browserSync.reload);
});

// Задача для отслеживания изменений
gulp.task('watch', function () {
  gulp.watch('./src/scss/*.scss', gulp.series('sass'));
  gulp.watch('./src/js/*.js', gulp.series('js'));
});

// Запуск всех задач
gulp.task('default', gulp.parallel('sass', 'js', 'browserSync', 'watch'));
