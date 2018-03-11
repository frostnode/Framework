let mix = require('laravel-mix');

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

mix.setPublicPath(path.normalize('../../public'));

mix.js('resources/assets/js/app.js', 'core/js')
   .sass('resources/assets/sass/app.scss', 'core/css');

// https://browsersync.io/docs/options
mix.browserSync({
    proxy: 'frostnodecms.test'
});
