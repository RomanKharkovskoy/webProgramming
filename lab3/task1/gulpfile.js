const { watch, series, parallel } = require('gulp');
const browsersync = require('browser-sync').create();

// Первая функция для последовательного/параллельного выполнения
async function task1() {
    console.log("Hello world 1");
};

// Вторая функция для последовательного/параллельного выполнения
async function task2() {
    console.log("Hello world 2");
};

// Запуск сервера BrowserSync
function browsersyncServe(){
  browsersync.init({
    server: {
      baseDir: '.' // Корневая директория -- текущий рабочий каталог '.'
    }
  });
}

// Функция для перезагрузки страницы
function browsersyncReload(){
  browsersync.reload();
}

// Функция, следящая за изменениями в файлах html, css, js
// Если функция watch() заметила изменение, то выполняется функция browsersyncReload()
function watchTask(){
  watch('index.html', browsersyncReload);
  watch(['src/css/*.css', 'src/js/*.js'], browsersyncReload);
}


// Таски для пункта а)
// Таск, запускающий последовательное выполнение функций 1-2
exports.sequential = series(
    task1,
    task2
);

// Таск, запускающий параллельное выполнение функций 1-2
exports.parallel = parallel(
    task1, 
    task2
);

// Таск для пункта б)
exports.openProject = series(
  browsersyncServe, // Отображение файлов проекта в браузере
  watchTask // Перезагрузка страницы при изменении одного из контролируемых файлов проекта
);
