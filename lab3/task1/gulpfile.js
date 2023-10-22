const { watch, series, parallel } = require('gulp');
const browsersync = require('browser-sync').create();
async function task1() {
    console.log("Hello world 1");
};

async function task2() {
    console.log("Hello world 2");
};

function browsersyncServe(cb){
  browsersync.init({
    server: {
      baseDir: '.'
    }
  });
  cb();
}

function browsersyncReload(cb){
  browsersync.reload();
  cb();
}

function watchTask(){
  watch('index.html', browsersyncReload);
  watch(['src/css/*.css', 'src/js/*.js'], browsersyncReload);
}

exports.openProject = series(
  browsersyncServe,
  watchTask
);

exports.sequential = series(
    task1,
    task2
);

exports.parallel = parallel(
    task1, 
    task2
);
