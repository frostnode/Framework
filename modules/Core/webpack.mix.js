"use strict";

const { mix } = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */
mix.setPublicPath('public')
    .copy('public', __dirname + '/../../public/modules/core');

mix.js(__dirname + '/resources/assets/js/app.js', 'public/js')
    .sass( __dirname + '/resources/assets/sass/app.scss', 'public/css')
    .sourceMaps();

mix.copy(__dirname + '/resources/assets/images', 'public/images');

// https://browsersync.io/docs/options
mix.browserSync({
    proxy: '127.0.0.1:8000'
});

// version handling
if (mix.inProduction()) {
    mix.version();
}
