const { src, dest, watch, series } = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const postcss = require('gulp-postcss');
const cssnano = require('cssnano');
const terser = require('gulp-terser');
const browsersync = require('browser-sync').create();

// Таск для компиляии Sass:
// Эта функция берет исходный файл Sass (style.scss), 
// компилирует его в CSS, применяет PostCSS с плагином для минификации (cssnano) 
// и сохраняет результат в папку dist с использованием sourcemaps.
function scssTask(){
  return src('src/scss/style.scss', { sourcemaps: true })
    .pipe(sass())
    .pipe(postcss([cssnano()]))
    .pipe(dest('dist', { sourcemaps: '.' }));
}

// JavaScript Task
// Эта функция берет исходный файл JavaScript (main.js), 
 // минифицирует его с использованием Terser 
 // и сохраняет результат в папку dist с sourcemaps.
function jsTask(){
  return src('src/js/main.js', { sourcemaps: true })
    .pipe(terser())
    .pipe(dest('dist', { sourcemaps: '.' }));
}

// Browsersync таск
// Функция инициализирует Browsersync и запускает сервер
function browsersyncServe(cb){
  browsersync.init({
    server: {
      baseDir: '.'
    }
  });
  cb();
}

// Функция выполняет перезагрузку браузера
function browsersyncReload(cb){
  browsersync.reload();
  cb();
}

// Watch Task
// Эта функция отслеживает изменения в файле index.html 
// и в файлах с расширениями .scss и .js в папках src/scss и src/js. 
// При изменении запускаются соответствующие задачи (scssTask, jsTask) 
// и происходит перезагрузка через Browsersync.
function watchTask(){
  watch('index.html', browsersyncReload);
  watch(['src/scss/*.scss', 'src/js/*.js'], series(scssTask, jsTask, browsersyncReload));
}

// Главная функция
// Функция включает в себя выполнение задач по компиляции Sass, 
// обработке JavaScript, запуску сервера Browsersync и отслеживанию изменений.
exports.openProject = series(
  scssTask,
  jsTask,
  browsersyncServe,
  watchTask
);
