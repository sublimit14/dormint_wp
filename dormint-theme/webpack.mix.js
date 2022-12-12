// webpack.mix.js
let mix = require('laravel-mix');

mix.webpackConfig({
    stats: { children: true },
});
mix.sass('src/scss/style.scss', './style.css').setPublicPath('.');
