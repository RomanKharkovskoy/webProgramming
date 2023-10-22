const { src, dest, series } = require('gulp');
const puppeteer = require('puppeteer');

const urlsToVisit = [
  'https://vk.com/romankharkovskoy',
  'https://cssnano.co/',
  'https://sass-scss.ru/guide/',
];

const delayBetweenPages = 5000; // Задайте интервал между страницами в миллисекундах

// Функция для открытия страниц
async function openPages() {
  const browser = await puppeteer.launch();
  const page = await browser.newPage();

  for (const url of urlsToVisit) {
    await page.goto(url);
    await new Promise((resolve) => setTimeout(resolve, delayBetweenPages));
  }

  await browser.close();
}

// Задача Gulp для открытия страниц
exports.openWebPages = series(openPages);
